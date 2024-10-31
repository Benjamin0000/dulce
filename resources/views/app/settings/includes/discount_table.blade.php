<table class="table">
    <thead>
        <tr>
            <th>No</th>
            <th>Code</th>
            <th>Minimum Purchase</th>
            <th>Expiry Date</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        @php $no = tableNumber(10) @endphp 
        @foreach ($discounts as $discount)
            <tr>
                <td>{{$no++}}</td>
                <td>{{$discount->code}}</td>
                <td>{{format_with_cur($discount->min_purchase)}}</td>
                <td>{{$discount->expiry_date->isoFormat('lll')}}</td>
                <td>
                    <form action="{{route('admin.delete_discount', $discount->id)}}" method="POST">
                        @csrf 
                        @method('delete')
                        <button class="btn btn-danger btn-sm">
                            <i class="fa-solid fa-trash-can"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<div id="discount_paginator">
    {{$discounts->links()}}
</div>