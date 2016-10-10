<table class="table table-responsive" id="components-table">
    <thead>
        <th>id</th>
        <th>Nama</th>
        <th>Harga</th>
        <th>Stock</th>
        <th colspan="3">Aksi</th>
    </thead>
    <tbody>
    @foreach($components as $component)
        <tr>
            <td>{!! $component->id_component !!}</td>
            <td>{!! $component->name !!}</td>
            <td>{!! $component->price !!}</td>
            <td>{!! $component->stock !!}</td>
            <td>
                {!! Form::open(['route' => ['components.destroy', $component->id_component], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('components.show', [$component->id_component]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('components.edit', [$component->id_component]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
