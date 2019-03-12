@extends('master')

@section('title','Welcome Home')

@section('page-name','ข้อมูลโครงการ')

@section('navi')
<div class="col-sm-6">
  <ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active">Starter Page</li>
  </ol>
</div><!-- /.col -->
@stop

@section('content')
        <div class="container-fluid">
          <div class="row">
            <div id="app">
              <user></user>
          </div>
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
@stop


