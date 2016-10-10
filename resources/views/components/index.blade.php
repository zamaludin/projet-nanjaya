@extends('layouts.app')

@section('content')
    <section class="content-header">
        @if ($statuscari == 1)
        <h1 class="pull-left">Hasil Pencarian Komponen</h1>
        @else
        <h1 class="pull-left">Komponen</h1>
        @endif
        <!-- search form (Optional) -->

        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('components.create') !!}">Add New</a>
        </h1>
    </section>


    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
              <form action="#" method="get" class="sidebar-form">
                  <div class="input-group">
                      <input type="text" name="q" class="form-control" placeholder="Search..."/>
                <span class="input-group-btn">
                  <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                  </button>
                </span>
                  </div>
              </form>
            </div>
        </div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('components.table')
                    <ul class="pagination">
                    @for ($i = 0 ; $i<$banyakData; $i++)
                      @if ($i+1 == $curpage)
                      <li class="active"><a href="?page={!!$i+1!!}">{!!$i+1!!}</a></li>
                      @else
                      <li><a href="?page={!!$i+1!!}">{!!$i+1!!}</a></li>
                      @endif

                    @endfor
                    </ul>
            </div>
        </div>
    </div>
@endsection
