<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ServiceDataTable;
use App\Http\Requests;
use App\Http\Requests\ServiceCreateRequest;
use App\Http\Requests\ServiceUpdateRequest;
use App\Models\Service;
use App\Http\Controllers\AppBaseController;
use App\Models\AdditionalInfo;

class ServiceController extends AppBaseController
{

    private $icon = 'pe-7s-menu';


    public function index(ServiceDataTable $serviceDataTable)
    {
        $this->authorize('Service-view');
        $icon = $this->icon;
        $serviceInfo = AdditionalInfo::where('user_id',auth()->id())->where(function($query){
            $query->where('key','service_text')->orWhere('key','service_description');
        })->get();
        return $serviceDataTable->render('admin.services.index',compact('icon','serviceInfo'));
    }


    public function create()
    {
        $this->authorize('Service-create');
        return view('admin.services.create')->with('icon', $this->icon);
    }


    public function store(ServiceCreateRequest $request)
    {
        $this->authorize('Service-create');
        $request['user_id'] = auth()->id();
        Service::create($request->all());
        notify()->success(__("Successfully Created"), __("Success"));
        return redirect(route('admin.services.index'));
    }


    public function show(Service $service)
    {
        $this->authorize('Service-view');
        return view('admin.services.show',compact('service'))->with('icon', $this->icon);
    }


    public function edit(Service $service)
    {
        $this->authorize('Service-update');
        return view('admin.services.edit',compact('service'))->with('icon', $this->icon);
    }


    public function update(Service $service, ServiceUpdateRequest $request)
    {
        $this->authorize('Service-update');
        $service->fill($request->all())->save();
        notify()->success(__("Successfully Updated"), __("Success"));
        return redirect(route('admin.services.index'));
    }


    public function destroy(Service $service)
    {
        $this->authorize('Service-delete');
        //FileHelper::deleteImage($service);
        $service->delete();
    }
}
