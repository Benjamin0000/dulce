@extends('app.layout')
@section('content')
<div class="nk-block-head nk-block-head-sm">
    <div class="row">
        <div class="col-6"><h4 class="title">Branch Managers</h4></div>
        <div class="col-6 text-end"><a data-bs-target="#create_manager" data-bs-toggle="modal" href="#" id="create_btn" class="btn btn-primary">Create Manager</a></div>
    </div>
</div>
<div class="card card-bordered h-100">
    <div class="card-inner border-bottom">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Branch</th>
                        <th>Created</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no = tableNumber(10) @endphp 
                    @foreach($managers as $manager)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>
                                {{$manager->name}}
                                <div>@{{$manager->username}}</div>
                            </td>
                            <td></td>
                            <td>
                                {{$manager->created_at->isoFormat('lll')}}
                                <div>{{$manager->created_at->diffForHumans()}}</div> 
                            </td>
                            <td>
                                <button data-bs-toggle="modal" data-bs-target="#update_manager{{$manager->id}}" class="btn btn-primary btn-sm">Update</button>
                                <form action="" method="POST" style="display: inline">
                                    @csrf 
                                    <button class="btn btn-danger btn-sm">Delete</button>
                                </form>
                                @include('app.managers.update_modal')
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{$managers->links()}}
    </div>
</div> 
@include('app.managers.create_modal')

<script>
    window.onload = ()=>{
        $(document).on('submit', "#create_manager_form", function(e){
            e.preventDefault(); // Prevent the default form submission
            var form = $(e.currentTarget);
            var btn = form.find('button')
            var btn_content = btn.text(); 
            var msg = form.find('.msg')
            loadButton(btn)
            var formData = new FormData(form[0]); // Create FormData object with form elements
            $.ajax({
                type: 'POST',
                url: '{{route('admin.manager.create')}}', // Replace with your server endpoint
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


        $(document).on('submit', ".update_manager_form", function(e){
            e.preventDefault(); // Prevent the default form submission
            var form = $(e.currentTarget);
            var btn = form.find('button')
            var btn_content = btn.text(); 
            var msg = form.find('.msg')
            loadButton(btn)
            var formData = new FormData(form[0]); // Create FormData object with form elements
            $.ajax({
                type: 'POST',
                url: '{{route('admin.manager.update')}}', // Replace with your server endpoint
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
@stop 