<table class="table table-responsive" id="typeServices-table">
    <thead>
        <th>Name</th>
        <th>Price</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($typeServices as $typeService)
        <tr>
            <td>{!! $typeService->name !!}</td>
            <td>{!! $typeService->price !!}</td>
            <td>
                {!! Form::open(['route' => ['typeServices.destroy', $typeService->id_type_service], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('typeServices.show', [$typeService->id_type_service]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('typeServices.edit', [$typeService->id_type_service]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>