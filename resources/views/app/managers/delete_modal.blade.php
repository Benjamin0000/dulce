
<div class="modal fade" id="delete_manager{{$manager->id}}">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content ">
            <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close"><em class="icon ni ni-cross"></em></a>
            <div class="modal-header"><h5 class="modal-title">Delete Manager</h5></div>
            <div class="modal-body">
                <table class="table table-bordered">
                    <tr>
                        <td>Manager</td>
                        <td>{{$manager->name}}</td>
                    </tr>
                    <tr>
                        <td>Branch</td>
                        <td>@if($manager->branch) {{$manager->branch->name}} @else None @endif</td>
                    </tr>
                </table>
                <br>
                <h6 class="text-center">Are you sure you want to continue?</h6>
                <form method="POST" action="{{route('admin.manager.destroy', $manager->id)}}">
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