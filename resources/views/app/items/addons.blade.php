<div class="modal fade" id="addons_item_modal{{$item->id}}">
    <div class="modal-dialog" role="document">
        <div class="modal-content ">
            <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close"><em class="icon ni ni-cross"></em></a>
            <div class="modal-header"><h5 class="modal-title">Add-ons for {{$item->name}}</h5></div>
            <div class="modal-body">
                <form class="add_addons_form">
                    <div class="form-group">
                        <label for="">Title</label>
                        <input type="text" placeholder="Eg: Add some Soft Drinks" required name="question" class="form-control">
                    </div> @csrf 
                    <input type="hidden" name="item_id" value="{{$item->id}}">
                    <input type="hidden" name="branch_id" value="{{$branch->id}}">
                    <div class="form-group">
                        <label for="">Select a category</label>
                        <select name="category" required class="form-control">
                            <option value="">Choose</option>
                            @foreach($addons as $addon)
                                @if($item->id != $addon->id && $item->parent_id != $addon->id)
                                    <option value="{{$addon->id}}">{{$addon->name}}</option>
                                @endif 
                            @endforeach
                        </select>
                    </div>
                    <div class="msg"></div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-sm">Add Add-ons</button>
                    </div>
                </form>
                <hr>
                <h6 class="text-center">All Add-ons</h6>

                <table class="table table-sm table-bordered text-center">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Category</th>
                            <th><i class="fa fa-close"></i></th>
                        </tr>
                    </thead>
                    <tbody id="addon_body{{$item->id}}">
                        @foreach($item->addons as $addon)
                            <tr>
                                <td>{{$addon->title}}</td>
                                <td>{{$addon->the_category->name}}</td>
                                <td>
                                    <a class="remove_addon" data='{{$addon->id}}' title="Remove" href="javascript:void(0)">
                                        <i class="fa fa-trash text-danger"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach 
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>