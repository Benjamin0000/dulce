
<div class="modal fade" id="update_manager{{$manager->id}}">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close"><em class="icon ni ni-cross"></em></a>
            <div class="modal-header"><h5 class="modal-title">Update Manager</h5></div>
            <div class="modal-body">
                <form method="POST" class="update_manager_form">
                    <div class="form-group">
                        <label class="form-label">Full name</label>
                        <div class="form-control-wrap">
                            <input name="name" type="text" class="form-control" value="{{$manager->name}}" required/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Username</label>
                        <div class="form-control-wrap">
                            <input name="username" type="text" class="form-control" value="{{$manager->username}}" required/>
                        </div>
                    </div> @csrf 
                    <input type="hidden" name="id" value="{{$manager->id}}">
                    <div class="form-group">
                        <label class="form-label">Login Password</label>
                        <div class="form-control-wrap">
                            <input name="password" type="text" class="form-control" value="" required/>
                        </div>
                    </div>
                    <br>
                    <div class="msg"></div>
                    <div class="form-group">
                        <button class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>