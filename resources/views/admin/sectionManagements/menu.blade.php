@extends('layouts.admin')
@section('title'){{ __('Menus') }} @endsection
@section('content')
@include('includes.page_header_index',['title'=>__('Menu Management'),'url'=>'','icon' => $icon??'pe-7s-menu','permission'=>''])
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <div class="table-responsive">
                    <form action="{{route('admin.menuManagement.save')}}" method="POST">
                        <button type="submit" class="btn btn-primary pull-right">Update All</button>
                        <br>
                        <br>
                        @csrf
                    <table id="" class="table table-striped table-hover table-bordered" style="width:100%;">
                        <thead>
                            <tr>
                                <th>Sl.</th>
                                <th>Title</th>
                                <th>Backgound Color</th>
                                <th>Show</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($userMenus as $userMenu)
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <input type="hidden" name="user_menu_ids[]" value="{{$userMenu->id}}">
                                <td><input max="30" autofocus class="form-control" type="text" name="menu_titles[]" value="{{$userMenu->menu_title}}"/></td>
                                <td>

                                    {{-- @if ($userMenu->background_color == null)
                                    type="hidden"
                                    @else --}}
                                    <input
                                    type="color"
                                    class="form-control" name="background_colors[]" value="{{$userMenu->background_color}}">
                                </td>
                                <td>
                                    <div class="form-group">
                                        <div class="custom-control custom-switch">
                                            <input name="show_status[]" value="{{$userMenu->id}}"
                                            @if ($userMenu->show_status == 1)
                                                checked
                                            @endif
                                            type="checkbox" class="custom-control-input" id="customSwitch{{ $userMenu->id }}">
                                            <label class="custom-control-label" for="customSwitch{{ $userMenu->id }}">{{ __('') }}</label>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td></td>
                                <td></td>
                                <td>No Data Found</td>
                                <td></td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <button type="submit" class="btn btn-primary pull-right">Update All</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

