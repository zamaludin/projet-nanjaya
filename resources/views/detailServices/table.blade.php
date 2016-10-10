<table class="table table-responsive" id="detailServices-table">
    <thead>
        <th>Component</th>
        <th>Price</th>
        <th>Amount</th>
        <th>Subtotal</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($detailServices as $detailService)
        <tr>
            <td>{!! $detailService->component !!}</td>
            <td>{!! $detailService->price !!}</td>
            <td>{!! $detailService->amount !!}</td>
            <td>{!! $detailService->subtotal !!}</td>
            <td>
                {!! Form::open(['route' => ['detailServices.destroy', $detailService->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('detailServices.show', [$detailService->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('detailServices.edit', [$detailService->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>