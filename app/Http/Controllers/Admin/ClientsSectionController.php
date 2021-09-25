<?php

namespace App\Http\Controllers\Admin;

use App\Models\Client;
use App\Services\Perform;
use App\Models\ClientField;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ClientsRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ClientsFieldsRequest;

class ClientsSectionController extends Controller
{
    public function clientsSection()
    {
        $client = Perform::index(Client::class, 'clientsField');

        return view('admin.homepage.client', compact(['client']));
    }

    public function updateClientsSection(ClientsRequest $request)
    {
        Perform::update(Client::class, $request);

        return redirect()->route('home.clients')->with(['success' => 'changed updated successfully']);
    }

    public function storeClients(ClientsFieldsRequest $request)
    {
        Perform::store(Client::class, ClientField::class, $request, 'client_id');

        return redirect()->route('home.clients')->with(['success' => 'changed updated successfully']);
    }

    public function editClients($id)
    {
        $clientsField = ClientField::findorfail($id);

        return redirect()->route('home.clients')->with(['success' => 'clients Field has been updated.']);
    }

    public function deleteClients($id)
    {
        $clientsField = Perform::findFirstOrFailSmodel(ClientField::class, Client::class, $id, 'client_id');

        Storage::disk('uploads')->delete($clientsField->image);

        $clientsField->delete();

        return redirect()->route('home.clients')->with(['success' => 'clients Field has been deleted.']);
    }

    public function destroyClients(Request $request)
    {
        foreach ($request->ids as $id) {

            $clientsField = Perform::findFirstOrFailSmodel(ClientField::class, Client::class, $id, 'client_id');

            Storage::disk('uploads')->delete($clientsField->image);

            $clientsField->delete();
        }

        return redirect()->route('home.clients')->with(['success' => 'clients Fields has been deleted.']);
    }
}
