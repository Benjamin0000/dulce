<div class="modal fade" id="create_category">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close"><em class="icon ni ni-cross"></em></a>
            <div class="modal-header"><h5 class="modal-title">Create Category</h5></div>
            <div class="modal-body">
                <form id="create_category_form" enctype="multipart/form-data">
                    @if($parent)
                        <div class="alert alert-info">Parent Category: {{$parent->name}}</div>
                        <input type="hidden" name="parent_id" value="{{$parent_id}}">
                        <br>
                    @endif 
                    <div class="form-group">
                        <label class="form-label">Category Name</label>
                        <div class="form-control-wrap">
                            <input name="name" type="text" class="form-control" value="" required/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Category Logo</label>
                        <div>
                            <input type="file" name="logo" required accept="image/jpeg, image/png, image/jpg, image/gif, image/webp">
                        </div>
                    </div>
                    @csrf 
                    <input type="hidden" name="type" value="0">
                    <input type="hidden" name="branch_id" value="{{$branch->id}}">
                    <div class="msg"></div>
                    <div class="form-group">
                        <button class="btn btn-primary">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    window.onload = ()=>{
        $(document).on('submit', "#create_category_form", function(e){
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
                url: '{{route('admin.items.create_item')}}', // Replace with your server endpoint
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


        $(document).on('submit', "#add_item_form", function(e){
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
                url: '{{route('admin.items.create_item')}}', // Replace with your server endpoint
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

        $(document).on('submit', ".update_item_form", function(e){
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
                url: '{{route('admin.items.update_item')}}', // Replace with your server endpoint
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


        $(document).on('submit', ".add_addons_form", function(e){
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
                url: '{{route('admin.items.add_addon')}}', // Replace with your server endpoint
                data: formData,
                contentType: false, // Required for file upload
                processData: false, // Don't process the files
                success: function (res) {
                    unLoadButton(btn, btn_content)
                    if(res.error){
                        msg.html('<p class="alert alert-danger">&#9432; '+res.error+'</p>');
                    }else if(res.id){
                        msg.html('<p class="alert alert-success">Addon added</p>');
                        $("#addon_body"+res.id).html(res.view); 
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

        $(document).on('click', '.remove_addon', function(e){
            var btn = $(e.currentTarget);
            var id = $(btn).attr('data');
            var btn_content = btn.html();
            $.ajax({
                type: 'post',
                url: '{{route('admin.items.remove_addon')}}', // Replace with your server endpoint
                data: {'id': id},
                success: function (res) {
                    unLoadButton(btn, btn_content)
                    if(res.error){
                        Swal.fire(res.error,'','error')
                    }else if(res.id){
                        $("#addon_body"+res.id).html(res.view); 
                    }
                },
                error: function (xhr, status, error) {
                    unLoadButton(btn, btn_content);
                    if (xhr.status === 0) {
                        Swal.fire("Network error: Please check your internet connection.",'','error')
                    } else {
                        Swal.fire("Something went wrong please try again",'','error')
                    }
                }
            });
        })
    }
</script>