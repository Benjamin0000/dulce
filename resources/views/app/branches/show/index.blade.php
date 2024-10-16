@extends('app.layout')
@section('content')
<div class="nk-block-head nk-block-head-sm">
    <div class="row">
        <div class="col-md-6">
            <h4 class="title">{{ucwords($branch->name)}} </h4>
        </div>
        <div class="col-md-6 text-end d-none d-lg-block d-md-block">
            {{-- <a data-bs-target="#assign_manager_modal" data-bs-toggle="modal" href="#"  class="btn btn-primary btn-sm">Assign Manager</a> --}}
            <a data-bs-target="#edit_branch" data-bs-toggle="modal" href="#"  class="btn btn-primary btn-sm">Edit Branch</a>
        </div>
    </div>
    
    <div class="col-md-6 d-lg-none d-md-none" style="margin-top:10px">
        {{-- <a data-bs-target="#assign_manager_modal" data-bs-toggle="modal" href="#"  class="btn btn-primary btn-sm">Assign Manager</a> --}}
        <a data-bs-target="#edit_branch" data-bs-toggle="modal" href="#"  class="btn btn-primary btn-sm">Edit Branch</a>
    </div>
    <div style="margin-top:10px;">
       <div>
            MANAGER : 
            @if($manager = $branch->manager) 
                {{$manager->name}}
                <span class="d-none d-sm-block">
                    <a data-bs-target="#remove_manager_modal" data-bs-toggle="modal" href="#"  class="badge bg-danger">Remove Manager</a>
                </span>
            @else 
                <span class="text-danger">Not Set</span> 
                <span class="d-none d-sm-inline-block">
                    <a data-bs-target="#assign_manager_modal" data-bs-toggle="modal" href="#"  class="badge bg-primary">Assign Manager</a>
                </span>
            @endif 
       </div>

        <div class="d-block d-sm-none">
            @if($manager = $branch->manager) 
                <a data-bs-target="#remove_manager_modal" data-bs-toggle="modal" href="#"  class="badge bg-danger">Remove Manager</a>
            @else
                <a data-bs-target="#assign_manager_modal" data-bs-toggle="modal" href="#"  class="badge bg-primary">Assign Manager</a>
            @endif 
        </div>
    </div>
</div>
@include('app.branches.show.modals')
@endsection 