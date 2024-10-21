<div class="modal fade" id="qty{{$item->id}}">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close"><em class="icon ni ni-cross"></em></a>
            <div class="modal-header">
                <h5 class="modal-title">{{$item->name}}</h5>
            </div>
            <div class="modal-body">
                <div>
                    <img width="50" src="{{Storage::url($item->logo)}}" alt="">
                </div>
                <form class="add_qty text-start">
                    <div class="form-group">
                        <label for="">Quantity</label>
                        <input type="number" value="{{$item->total}}" class="form-control" required name="qty">
                    </div>@csrf 
                    <input type="hidden" name="item_id" value="{{$item->id}}">
                    <input type="hidden" name="branch_id" value="{{$branch_id}}">
                    <div class="msg"></div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-block">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>