<div class="modal fade" id="edit_branch">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close"><em class="icon ni ni-cross"></em></a>
            <div class="modal-header"><h5 class="modal-title">Update Branch</h5></div>
            <div class="modal-body">
                <form id="update_branch_form" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="form-label">Branch Name</label>
                        <div class="form-control-wrap">
                            <input name="name" type="text" class="form-control" value="{{$branch->name}}" required/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Branch Poster</label>
                                <div>
                                    <input type="file" name="poster" accept="image/jpeg, image/png, image/jpg, image/gif, image/webp">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <img src="{{Storage::url($branch->poster)}}" width="100" alt="">
                        </div>
                    </div>

                    
                    <div class="row">   @csrf @method('put')
                        <div class="col-md-6">
                            <div class="d-lg-none d-md-none"><br></div>
                            <div>
                                <label class="form-label">State</label>
                                {{-- <select name="country" class="form-control">
                                    <option value="">Select</option>
                                    <option value=""></option>
                                </select> --}}
                                <input type="text" name="state" value="{{$branch->state}}" required class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-lg-none d-md-none"><br></div>
                            <div>
                                <label class="form-label">City</label>
                                <input type="text" name="city" value="{{$branch->city}}" required class="form-control">
                                {{-- <select name="country" class="form-control">
                                    <option value="">Select</option>
                                    <option value=""></option>
                                </select> --}}
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <label class="form-label">Branch Address</label>
                        <div class="form-control-wrap"><input type="text" class="form-control" name="address" value="{{$branch->address}}" /></div>
                    </div>
                    <div id="msg"></div>
                    <div class="form-group">
                        <button class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="assign_manager_modal">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close"><em class="icon ni ni-cross"></em></a>
            <div class="modal-header"><h5 class="modal-title">Assign Manager</h5></div>
            <div class="modal-body">
                <table class="table table-bordered">
                    <tr>
                        <td>Current Manager</td>
                        <td>
                            @if($branch->manager)
                                {{$branch->manager->name}}
                            @else 
                                None
                            @endif 
                        </td>
                    </tr>
                </table>
                <form method="POST" id="assign_manager_form">
                    <div class="form-group">
                        <label class="form-label">Select Manager</label>
                        <select name="manager" class="form-control" required>
                            <option value="">Choose</option>
                            @foreach($managers as $manager)
                                <option value="{{$manager->id}}">{{$manager->name}}</option>
                            @endforeach
                        </select>
                    </div> @csrf  
                    <input type="hidden" name="branch" value="{{$branch->id}}">
                    <div class="msg"></div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-block">Assign</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@if($manager = $branch->manager) 
<div class="modal fade" id="remove_manager_modal">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close"><em class="icon ni ni-cross"></em></a>
            <div class="modal-header"><h5 class="modal-title">Unassign Manager</h5></div>
            <div class="modal-body">
                <table class="table table-bordered">
                    <tr>
                        <td>Manager</td>
                        <td>{{ucwords($manager->name)}}</td>
                    </tr>
                    <tr>
                        <td>Branch</td>
                        <td>{{$branch->name}}</td>
                    </tr>
                </table>
                <br>
                <h6 class="text-center">Are you sure you want to continue?</h6>
                <form method="POST" action="{{route('admin.manager.unassign', $branch->id)}}">
                   @csrf 
                   @method('put')
                   <br>
                    <div class="form-group text-center">
                        <button class="btn btn-danger btn-block">Unassign Manager</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endif

<script>
    window.onload = ()=>{
        $(document).on('submit', "#update_branch_form", function(e){
            e.preventDefault(); // Prevent the default form submission
            $("#msg").html(''); 
            var form = $(e.currentTarget);
            console.log(form)
            var btn = form.find('button')
            var btn_content = btn.text(); 
            loadButton(btn)
            var formData = new FormData(form[0]); // Create FormData object with form elements
            $.ajax({
                type: 'POST',
                url: '{{route('admin.branch.update', $branch->id)}}', // Replace with your server endpoint
                data: formData,
                contentType: false, // Required for file upload
                processData: false, // Don't process the files
                success: function (res) {
                    unLoadButton(btn, btn_content)
                    if(res.error){
                        $('#msg').html('<p class="alert alert-danger">&#9432; '+res.error+'</p>');
                    }else if(res.success){
                        $('#msg').html('<p class="alert alert-success">'+res.success+'</p>');
                        setTimeout(() => {
                            window.location.reload(); 
                        }, 1000);
                    }
                },
                error: function (xhr, status, error) {
                    unLoadButton(btn, btn_content);
                    if (xhr.status === 0) {
                        $("#msg").html("<div class='alert alert-danger'><i class='fa-solid fa-circle-info'></i> Network error: Please check your internet connection.</div>");
                        // This indicates the error is likely caused by no internet connection
                    } else {
                        $("#msg").html("<div class='alert alert-danger'><i class='fa-solid fa-circle-info'></i> Something went wrong please try again</div>");
                    }
                }
            });
        })


        $(document).on('submit', "#assign_manager_form", function(e){
            e.preventDefault(); // Prevent the default form submission
            var form = $(e.currentTarget);
            var msg = form.find('.msg'); 
            var btn = form.find('button'); 
            var btn_content = btn.text(); 
            msg.html(''); 
            loadButton(btn)
            var formData = new FormData(form[0]); // Create FormData object with form elements
            $.ajax({
                type: 'POST',
                url: '{{route('admin.manager.assign')}}', // Replace with your server endpoint
                data: formData,
                contentType: false, // Required for file upload
                processData: false, // Don't process the files
                success: function (res) {
                    unLoadButton(btn, btn_content)
                    if(res.error){
                        msg.html('<p class="alert alert-danger">&#9432; '+res.error+'</p>');
                    }else if(res.success){
                        msg.html('<p class="alert alert-success">'+res.success+'</p>');
                        setTimeout(() => {
                            window.location.reload(); 
                        }, 1000);
                    }
                },
                error: function (xhr, status, error) {
                    unLoadButton(btn, btn_content);
                    if (xhr.status === 0) {
                        msg.html("<div class='alert alert-danger'><i class='fa-solid fa-circle-info'></i> Network error: Please check your internet connection.</div>");
                        // This indicates the error is likely caused by no internet connection
                    } else {
                        msg.html("<div class='alert alert-danger'><i class='fa-solid fa-circle-info'></i> Something went wrong please try again</div>");
                    }
                }
            });
        })
    }
</script>