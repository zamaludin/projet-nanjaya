<table class="table table-responsive" id="typeTransportations-table">
    <thead>
        <th>Name</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($typeTransportations as $typeTransportation)
        <tr>
            <td>{!! $typeTransportation->name !!}</td>
            <td>
                {!! Form::open(['route' => ['typeTransportations.destroy', $typeTransportation->id_type_transportation], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('typeTransportations.show', [$typeTransportation->id_type_transportation]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('typeTransportations.edit', [$typeTransportation->id_type_transportation]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
