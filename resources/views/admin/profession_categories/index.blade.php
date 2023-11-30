@extends('layouts.admin')
@section('title'){{ __('Profession Categories') }} @endsection
@section('content')
@include('includes.page_header_index',['title'=>__('Profession Categories'),'url'=>route('admin.professionCategories.create'),'icon' => $icon??'','permission'=>'ProfessionCategory-create'])
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <div class="table-responsive">
                    @include('admin.profession_categories.table')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

