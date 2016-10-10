<table class="table table-responsive" id="customers-table">
    <thead>
        <th>Name</th>
        <th>Phone Number</th>
        <th colspan="3">Action</th>
        <th>plat</th>
    </thead>
    <tbody>
    @foreach($customers as $customer)
        <tr>
            <td>{!! $customer->name !!}</td>
            <td>{!! $customer->phone_number !!}</td>

            <td>
                {!! Form::open(['route' => ['customers.destroy', $customer->id_customer], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('customers.show', [$customer->id_customer]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('customers.edit', [$customer->id_customer]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>{!! $customer->vehicle !!}</tr>
            <td>
        </tr>
    @endforeach
    </tbody>
</table>
