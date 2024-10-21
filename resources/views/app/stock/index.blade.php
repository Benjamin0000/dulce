@extends('app.layout')
@section('content')
<br>
<h5>STOCKS</h5>
<div class="card card-bordered h-100">
    <div class="card-inner border-bottom">
        <div class="table-responsive">
            <table class="table text-center">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total Sold</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no = tableNumber(20) @endphp 
                    @foreach($items as $item)
                        <tr>
                            <td><img width="50" src="{{Storage::url($item->logo)}}" alt=""></td>
                            <td>{{$item->name}}</td>
                            <td>
                                @php $categories = get_item_category_gen($item->parent_id);@endphp 
                                @for($i = 0; $i < count($categories); $i++)
                                    @if($i > 0) | @endif  {{$categories[$i]}} 
                                @endfor
                            </td>
                            <td>{{format_with_cur($item->selling_price)}}</td>
                            <td>{{number_format($item->total)}}</td>
                            <td>{{number_format($item->sold)}}</td>
                            <td>
                                <button class="btn btn-sm btn-primary" data-bs-toggle='modal' data-bs-target='#qty{{$item->id}}'>Add Stock</button>
                                @include('app.stock.quantity_modal')
                            </td>
                        </tr>
                        
                    @endforeach
                </tbody>
            </table>
        </div>
        {{$items->links()}}
    </div>
</div> 

<script>
    window.onload = ()=>{
        $(document).on('submit', ".add_qty", function(e){
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
                url: '{{route('admin.stock.update')}}', // Replace with your server endpoint
                data: formData,
                contentType: false, // Required for file upload
                processData: false, // Don't process the files
                success: function (res) {
                    unLoadButton(btn, btn_content)
                    if(res.error){
                        msg.html('<p class="alert alert-danger">&#9432; '+res.error+'</p>');
                    }else if(res.success){
                        msg.html('<p class="alert alert-success">Stock updated</p>');
                        window.location.reload(); 
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