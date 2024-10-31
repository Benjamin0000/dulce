<table class="table">
    <thead>
        <tr>
            <th>No</th>
            <th>Region</th>
            <th>Cost</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            @php $no = tableNumber(10) @endphp 
            @foreach ($locations as $location)
                <tr>
                    <td>{{$no++}}</td>
                    <td>{{$location->region}}</td>
                    <td>{{format_with_cur($location->cost)}}</td>
                    <td>
                        <form action="{{route('admin.delete_location', $location->id)}}" method="POST">
                            @csrf 
                            @method('delete')
                            <button class="btn btn-danger btn-sm">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tr>
    </tbody>
</table>
<div id="location_paginator">
    {{$locations->links()}}
</div>