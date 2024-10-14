@extends('app.layout')
@section('content')
<style>
    .branch_link{
        color:black; 
    }
    .branch_con{
        box-shadow: 0px 0px 2px 2px #ddd; 
    }
    .branch_details_con{
        padding:10px; 
    }
    .branch_img_con{ 
        height: 200px;
        overflow: hidden;
    }
    .branch_img_con img{
        width: 100%;
        height: auto;
        display: block; 
        object-fit: cover;
        transition: transform 0.3s ease; 
    }
    .branch_link:hover img {
        transform: scale(1.1); /* Scales the image to 110% of its original size on hover */
    }
    .branch_link:hover{
        color:darkblue;
    }
</style>
<div class="nk-block-head nk-block-head-sm">
    <div class="row">
        <div class="col-6"><h4 class="title">Branches</h4></div>
        <div class="col-6 text-end"><a data-bs-target="#create_branch" data-bs-toggle="modal" href="#" id="create_btn" class="btn btn-primary">Create Branch</a></div>
    </div>
</div>
<div class="row">
    @foreach($branches as $branch)
        <div class="col-md-4">
            <a href="{{route('admin.branch.show', $branch->id)}}" class="branch_link">
                <div class="branch_con">
                    <div class="branch_img_con"><img src="{{Storage::url($branch->poster)}}" alt=""></div>
                    <div class="branch_details_con">
                        <h6>{{$branch->name}}</h6>
                        <div><i class="fa-solid fa-landmark text-primary"></i> {{$branch->state}} <i class="fa-solid fa-arrow-right"></i> {{$branch->city}}</div>
                        <div><i class="fa-solid fa-location-dot text-danger"></i> {{$branch->address}}</div>
                    </div>
                </div>
            </a>
        </div>
    @endforeach 
</div>
{{$branches->links()}}
@include('app.branches.create_modal')
@stop 