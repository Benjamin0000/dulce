@foreach($addons as $addon)
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