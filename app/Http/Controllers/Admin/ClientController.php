<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ClientDataTable;
use App\Helpers\FileHelper;
use App\Http\Requests;
use App\Http\Requests\ClientCreateRequest;
use App\Http\Requests\ClientUpdateRequest;
use App\Models\Client;
use App\Http\Controllers\AppBaseController;

class ClientController extends AppBaseController
{

    private $icon = 'pe-7s-menu';


    public function index(ClientDataTable $clientDataTable)
    {
        $this->authorize('Client-view');
        $icon = $this->icon;
        return $clientDataTable->render('admin.clients.index',compact('icon'));
    }


    public function create()
    {
        $this->authorize('Client-create');
        return view('admin.clients.create')->with('icon', $this->icon);
    }


    public function store(ClientCreateRequest $request)
    {
        $this->authorize('Client-create');
        $status = $request->status ?? 0;
        $imageName = FileHelper::uploadImage($request,null,[],200,150);
        Client::create(array_merge($request->all(),['status'=>$status,'image' => $imageName,'user_id'=>auth()->id()]));
        notify()->success(__("Successfully Created"), __("Success"));
        return redirect(route('admin.clients.index'));
    }


    public function show(Client $client)
    {
        $this->authorize('Client-view');
        return view('admin.clients.show',compact('client'))->with('icon', $this->icon);
    }


    public function edit(Client $client)
    {
        $this->authorize('Client-update');
        return view('admin.clients.edit',compact('client'))->with('icon', $this->icon);
    }


    public function update(Client $client, ClientUpdateRequest $request)
    {
        $this->authorize('Client-update');
        $imageName = FileHelper::uploadImage($request, $client,[],200,150);
        $status = $request->status ?? 0;
        $client->fill(array_merge($request->all(), ['image' => $imageName,'status'=>$status]))->save();
        notify()->success(__("Successfully Updated"), __("Success"));
        return redirect(route('admin.clients.index'));
    }


    public function destroy(Client $client)
    {
        $this->authorize('Client-delete');
        FileHelper::deleteImage($client);
        $client->delete();
    }
}
