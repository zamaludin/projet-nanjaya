<table class="table table-responsive" id="vehicles-table">
    <thead>
        <th>Info</th>
        <th>Id User</th>
        <th>Id Type Transportation</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($vehicles as $vehicle)
        <tr>
            <td>{!! $vehicle->info !!}</td>
            <td>{!! $vehicle->id_user !!}</td>
            <td>{!! $vehicle->id_type_transportation !!}</td>
            <td>
                {!! Form::open(['route' => ['vehicles.destroy', $vehicle->number_plate], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('vehicles.show', [$vehicle->number_plate]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('vehicles.edit', [$vehicle->number_plate]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
