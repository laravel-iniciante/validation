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

    public function create(Request $request)
    {
        $clientType = Client::getClientType($request->client_type);
        return view('admin.clients.create',['client'=> new Client(), 'clientType' => $clientType ]);
    }

    public function store(Request $request)
    {
        $data = $this->_validate($request);
        $data['defaulter'] = $request->has('defaulter');
        $data['clinet_type'] = $Client::getClientType($request->client_type);
        Client::create($data);
        return redirect()->route('clients.index');
    }

    public function show(Client $client)
    {
        return view('admin.clients.show', compact('client'));
    }

    public function edit(Client $client) //Route Model Binding implícito
    {
        // Route Model Binding implicito
        // $client = Client::findOrFail($id);
        $clientType = $client->client_type;
        return view('admin.clients.edit', compact('client','clientType'));
    }

    public function update(Request $request, Client $client) //Route Model Binding implícito
    {
        // Route Model Binding
        // $client = Client::findOrFail($client);
        $data = $this->_validate($request);
        $data['defaulter'] = $request->has('defaulter');
        $client->fill($data);
        $client->save();
        return redirect()->route('clients.index');
    }

    public function destroy(Client $client) //Route Model Binding implícito
    {
        $client->delete();
        return redirect()->route('clients.index');
    }

    protected function _validate(Request $request){

        $client     = $request->route('client'); // 'client' = parametro que está na rota + route model binding
        $clientId   = $client instanceof Client ? $client->id : null;

        $rules = [
            'name'                  => 'required|max:255',
            'document_number'       => "required|unique:clients,document_number, $clientId",
            'email'                 => 'required|email',
            'phone'                 => 'required',
        ];

        $maritalStatus = implode( ',', array_keys(Client::MARITAL_STATUS) );
        $rulesIndividual = [
            'date_birth'            => 'required|date',
            'marital_state'         => "required|in: $maritalStatus",
            'sex'                   => 'required:in: s,m',
            'physical_disability'   => 'max:255'
        ];

        $rulesLegal = [
            'company_name'   => 'required|max:255'
        ];

        $clientType = Client::getClientType($request->client_type);
        $rulesFinal = ($clientType == Client::TYPE_INDIVIDUAL ) ? $rules + $rulesIndividual : $rules + $rulesLegal;

        return $this->validate($request, $rulesFinal );
    }

}
