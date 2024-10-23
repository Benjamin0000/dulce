@extends('app.layout')
@section('content')
<h5>ITEMS  
    @foreach ($titles as $title) 
        <span> <i class="fa fa-arrow-right"></i> {{$title}}</span>
    @endforeach
</h5>
@php 
    $addons = get_addons(); 
@endphp 
@include('app.items.add_item_button')
<div class="card card-bordered h-100">
    <div class="card-inner border-bottom">
        <p>
            @if($parent && $parent->parent_id)
                <a href="{{route('admin.items.index', [$branch, $parent->parent_id])}}" class="btn btn-sm btn-primary"> <i class="fa fa-arrow-left"></i> &nbsp;Go Back</a>
            @elseif($parent && !$parent->parent_id)
                <a href="{{route('admin.items.index', $branch)}}" class="btn btn-sm btn-primary"> <i class="fa fa-arrow-left"></i> &nbsp;Go Back</a>
            @endif 
        </p>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Other</th>
                        <th>Created</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no = tableNumber(20) @endphp 
                    @foreach($items as $item)
                        <tr>
                            <td><img width="50" src="{{Storage::url($item->logo)}}" alt=""></td>
                            <td>
                                {{$item->name}}
                                @if($item->type == ITEM)
                                    <div><b>Short Note</b></div>
                                    <div>
                                        {{$item->des}}
                                    </div>
                                @endif 
                            </td>
                            <td>
                                @if($item->type == ITEM)
                                    <div>Cost Price : {{format_with_cur($item->cost_price)}}</div>
                                    <div>Selling Price: {{format_with_cur($item->selling_price)}}</div>
                                @else 
                                    Category
                                @endif 
                            </td>
                            <td>
                                {{$item->created_at->isoFormat('lll')}}
                                <div>{{$item->created_at->diffForHumans()}}</div> 
                            </td>
                            <td>
                                @if($item->type == CATEGORY)
                                    <a title="View Items" href="{{route('admin.items.index', [$branch, $item->id])}}" style="padding-top:0px;padding-bottom:0px" class="btn btn-sm btn-outline-info"><i class="fa fa-eye"></i> &nbsp;({{$item->total_childeren()}})</a>
                                @endif 
                                @if($item->type == ITEM)
                                    <a title="Add-ons" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#addons_item_modal{{$item->id}}" class="btn btn-outline-primary btn-sm"><i class="fa-solid fa-wine-glass-empty"></i></a>
                                @endif 

                                <a title="Edit Item" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#update_item_modal{{$item->id}}" class="btn btn-outline-primary btn-sm"><i class="fa fa-edit"></i></a>
                                <a title="Delete Item" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#delete_item_modal{{$item->id}}" class="btn btn-outline-danger btn-sm"><i class="fa fa-trash"></i></a>
                                @include('app.items.delete_modal')
                                @include('app.items.update_modal')
                                @include('app.items.addons')
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{$items->links()}}
    </div>
</div> 
@stop 