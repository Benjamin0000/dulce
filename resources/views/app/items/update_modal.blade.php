<div class="modal fade" id="update_item_modal{{$item->id}}">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close"><em class="icon ni ni-cross"></em></a>
            <div class="modal-header"><h5 class="modal-title">Update {{$item->name}}</h5></div>
            <div class="modal-body">
                <form class="update_item_form" enctype="multipart/form-data">
                    <div class="text-center">
                        <img width="50" src="{{Storage::url($item->logo)}}" alt="">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Item Name</label>
                        <div class="form-control-wrap">
                            <input name="name" type="text" value="{{$item->name}}" class="form-control" value="" required/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Item Logo</label>
                        <div>
                            <input type="file" name="logo" accept="image/jpeg, image/png, image/jpg, image/gif, image/webp">
                        </div>
                    </div>
                    @csrf 
                    @if($item->type == ITEM)
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Cost Price</label>
                                    <div>
                                        <input type="number" value="{{$item->cost_price}}" class="form-control" name="cost_price" required step="any">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-block d-sm-none"><br></div>
                                <div class="form-group">
                                    <label class="form-label">Selling Price</label>
                                    <div>
                                        <input type="number" value="{{$item->selling_price}}" class="form-control" name="selling_price" required step="any">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="">Short Description (optional)</label>
                            <textarea name="description" placeholder="Write a short note for buyers" class="form-control desc">{{$item->des}}</textarea>
                        </div>
                    @endif 
                    <input type="hidden" name="id" value="{{$item->id}}">
                    <input type="hidden" name="type" value="{{$item->type}}">
                    <input type="hidden" name="branch_id" value="{{$branch->id}}">
                    <input type="hidden" name="parent_id" value="{{$parent_id}}">
                    <div class="msg"></div>
                    <div class="form-group">
                        <button class="btn btn-primary">Update {{ $item->type == ITEM ? 'Item' : 'Category' }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>