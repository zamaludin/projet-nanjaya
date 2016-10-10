@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            type_transportation
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($typeTransportation, ['route' => ['typeTransportations.update', $typeTransportation->id], 'method' => 'patch']) !!}

                        @include('typeTransportations.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection