<div class="modal fade" id="add_item_modal">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close"><em class="icon ni ni-cross"></em></a>
            <div class="modal-header"><h5 class="modal-title">New Item</h5></div>
            <div class="modal-body">
                <form id="add_item_form" enctype="multipart/form-data">
                    @if($parent)
                        <div>Category: {{$parent->name}}</div>
                        <input type="hidden" name="parent_id" value="{{$parent_id}}">
                        <br>
                    @endif 
                    <div class="form-group">
                        <label class="form-label">Item Name</label>
                        <div class="form-control-wrap">
                            <input name="name" type="text" class="form-control" value="" required/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Item Logo</label>
                        <div>
                            <input type="file" name="logo" required accept="image/jpeg, image/png, image/jpg, image/gif, image/webp">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Cost Price</label>
                                <div>
                                    <input type="number" class="form-control" name="cost_price" required step="any">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-block d-sm-none"><br></div>
                            <div class="form-group">
                                <label class="form-label">Selling Price</label>
                                <div>
                                    <input type="number" class="form-control" name="selling_price" required step="any">
                                </div>
                            </div>
                        </div>
                    </div>
                    @csrf
                    <input type="hidden" name="type" value="1">
                    <input type="hidden" name="branch_id" value="{{$branch->id}}">
                    <input type="hidden" name="parent_id" value="{{$parent_id}}">
                    
                    <div class="msg"></div>
                    <div class="form-group">
                        <button class="btn btn-primary">Add Item</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>