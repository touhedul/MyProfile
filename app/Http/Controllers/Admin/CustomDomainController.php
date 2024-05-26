<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\CustomDomainDataTable;
use App\Http\Requests;
use App\Http\Requests\CustomDomainCreateRequest;
use App\Http\Requests\CustomDomainUpdateRequest;
use App\Models\CustomDomain;
use App\Http\Controllers\AppBaseController;

class CustomDomainController extends AppBaseController
{

    private $icon = 'pe-7s-menu';


    public function index(CustomDomainDataTable $customDomainDataTable)
    {
        $this->authorize('CustomDomain-view');
        $icon = $this->icon;
        return $customDomainDataTable->render('admin.custom_domains.index', compact('icon'));
    }


    public function create()
    {
        $this->authorize('CustomDomain-create');
        return view('admin.custom_domains.create')->with('icon', $this->icon);
    }


    public function store(CustomDomainCreateRequest $request)
    {
        $this->authorize('CustomDomain-create');
        $status = $request->status ?? 0;
        $is_sub_domain = $request->is_sub_domain ?? 0;
        CustomDomain::create(array_merge($request->all(), ['status' => $status, 'is_sub_domain' => $is_sub_domain]));
        notify()->success(__("Successfully Created"), __("Success"));
        return redirect(route('admin.customDomains.index'));
    }


    public function show(CustomDomain $customDomain)
    {
        $this->authorize('CustomDomain-view');
        return view('admin.custom_domains.show', compact('customDomain'))->with('icon', $this->icon);
    }


    public function edit(CustomDomain $customDomain)
    {
        $this->authorize('CustomDomain-update');
        return view('admin.custom_domains.edit', compact('customDomain'))->with('icon', $this->icon);
    }


    public function update(CustomDomain $customDomain, CustomDomainUpdateRequest $request)
    {
        $this->authorize('CustomDomain-update');

        $status = $request->status ?? 0;
        $is_sub_domain = $request->is_sub_domain ?? 0;
        $customDomain->fill(array_merge($request->all(), ['status' => $status, 'is_sub_domain' => $is_sub_domain]))->save();
        notify()->success(__("Successfully Updated"), __("Success"));
        return redirect(route('admin.customDomains.index'));
    }


    public function destroy(CustomDomain $customDomain)
    {
        $this->authorize('CustomDomain-delete');
        $customDomain->delete();
    }
}
