<!-- Number Plate Field -->
<div class="form-group col-sm-6">
    {!! Form::label('number_plate', 'Number Plate:') !!}
    {!! Form::text('number_plate', null, ['class' => 'form-control']) !!}
</div>

<!-- Info Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('info', 'Info:') !!}
    {!! Form::textarea('info', null, ['class' => 'form-control']) !!}
</div>

<!-- Id User Field -->
<div class="form-group col-sm-6">
  <div class="form-group col-sm-4 pull-left">
  {!! Form::label('id_user', 'Pilih User:') !!}
  <select class="form-control" name="id_user" id="id_user" onchange="getKelurahan('sampai....')">
    <option  value="0" selected>Pilih User</option>
    
  </select>
  </div>
  <div class="col-sm-2">
    <div class='btn'>test</div>
  </div>
</div> 

<!-- Id Type Transportation Field -->
<div class="form-group col-sm-6">

  
    {!! Form::label('id_type_transportation', 'Pilih Jenis Kendaraan:') !!}
    <select class="form-control" name="id_type_transportation" id="id_type_transportation" >

      <option  value="0" >Pilih Tipe Transportasi </option>
      
    </select>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('vehicles.index') !!}" class="btn btn-default">Cancel</a>
</div>
