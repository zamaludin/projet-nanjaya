<!-- Id Component Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_component', 'Id Component:') !!}
    {!! Form::number('id_component', null, ['class' => 'form-control', 'readonly']) !!}
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    <label for="name">Nama:</label>
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Price Field -->
<div class="form-group col-sm-6">
    <label for="price">Harga:</label>
    {!! Form::number('price', null, ['class' => 'form-control']) !!}
</div>

<!-- Stock Field -->
<div class="form-group col-sm-6">
    {!! Form::label('stock', 'Stock:') !!}
    {!! Form::number('stock', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('components.index') !!}" class="btn btn-default">Cancel</a>
</div>
