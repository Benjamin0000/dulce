<div>
    <button class="btn btn-primary btn-sm" data-bs-target="#create_category" data-bs-toggle="modal">Add Category</button>
    @if($parent_id)
        <button class="btn btn-primary btn-sm" data-bs-target="#add_item_modal" data-bs-toggle="modal">Add {{$parent->name}}</button>
    @endif 
</div>
<br>
@include('app.items.add_item_modal')
@include('app.items.create_category_modal')


