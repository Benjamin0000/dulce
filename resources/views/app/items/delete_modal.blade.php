
<div class="modal fade" id="delete_item_modal{{$item->id}}">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content ">
            <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close"><em class="icon ni ni-cross"></em></a>
            <div class="modal-header"><h5 class="modal-title">Delete {{$item->name}}</h5></div>
            <div class="modal-body">
                <br>
                <h6 class="text-center">Your are bout to delete {{$item->name}}</h6>
                <h6 class="text-center">Are you sure you want to continue?</h6>
                <form method="POST" action="{{route('admin.items.delete', $item->id)}}">
                   @csrf 
                   @method('delete')
                   <br>
                    <div class="form-group text-center">
                        <button class="btn btn-danger btn-block">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>