
<div class="modal fade" id="addons_item_modal{{$item->id}}">
    <div class="modal-dialog" role="document">
        <div class="modal-content ">
            <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close"><em class="icon ni ni-cross"></em></a>
            <div class="modal-header"><h5 class="modal-title">Add-ons for {{$item->name}}</h5></div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="">Title</label>
                    <input type="text" placeholder="Eg: Add some Soft Drinks" name="question" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Select a category</label>
                    <select name="category" id="" class="form-control">
                        <option value="">Choose</option>
                        <option value=""></option>
                    </select>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary btn-sm">Add Add-ons</button>
                </div>
                <hr>
                <h6 class="text-center">Added Add-ons</h6>
            </div>
        </div>
    </div>
</div>