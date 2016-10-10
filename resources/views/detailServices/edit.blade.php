@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            detail_service
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($detailService, ['route' => ['detailServices.update', $detailService->id], 'method' => 'patch']) !!}

                        @include('detailServices.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection