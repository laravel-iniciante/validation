<?php

namespace App\Http\Controllers\Admin;

use App\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * Class ClientsController
 * @package App\Http\Controllers\Admin
 */
class ClientsController extends Controller
{

    public function index()
    {
        $clients = \App\Client::all();
        return view('admin.clients.index', compact('clients'));
    }

    public function create()
    {
        return view('admin.clients.create',['client'=> new Client()]);
    }

    public function store(Request $request)
    {
        $this->_validate($request);
        $data = $request->all();
        $data['defaulter'] = $request->has('defaulter');
        Client::create($data);
        return redirect()->route('clients.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $client = Client::findOrFail($id);
        return view('admin.clients.edit', compact('client'));
    }

    public function update(Request $request, $id)
    {
        $client = Client::findOrFail($id);
        $this->_validate($request);
        $data = $request->all();
        $data['defaulter'] = $request->has('defaulter');
        $client->fill($data);
        $client->save();
        return redirect()->route('clients.index');
    }

    public function destroy($id)
    {
        //
    }

    protected function _validate(Request $request){
        $maritalStatus = implode( ',', array_keys(Client::MARITAL_STATUS) );
        $this->validate($request, [
            'name'                  => 'required|max:255',
            'document_number'       => 'required',
            'email'                 => 'required|email',
            'phone'                 => 'required',
            'date_birth'            => 'required|date',
            'marital_state'         => "required|in: $maritalStatus",
            'sex'                   => 'required:in: s,m',
            'physical_disability'   => 'max:255'
        ]);
    }

}
