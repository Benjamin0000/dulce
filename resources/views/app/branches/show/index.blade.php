@extends('app.layout')
@section('content')
<div class="nk-block-head nk-block-head-sm">
    <div class="row">
        <div class="col-6"><h4 class="title">Branch <i class="fa-solid fa-arrow-right"></i> {{ucwords($branch->name)}} </h4></div>
        <div class="col-6 text-end">
            <a data-bs-target="#create_branch" data-bs-toggle="modal" href="#" id="create_btn" class="btn btn-primary">Add Manager</a>
            <a data-bs-target="#edit_branch" data-bs-toggle="modal" href="#" id="edit_btn" class="btn btn-primary">Edit Branch</a>
        </div>
    </div>
</div>
@include('app.branches.show.modals')
@endsection 