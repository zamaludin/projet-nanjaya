<!-- Id Type Transportation Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_type_transportation', 'Id Type Transportation:') !!}
    {!! Form::number('id_type_transportation', null, ['class' => 'form-control']) !!}
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('typeTransportations.index') !!}" class="btn btn-default">Cancel</a>
</div>
