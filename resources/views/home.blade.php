@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
<h1>
    Beranda
</h1>
@stop

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="box box-danger">
            <div class="box-body">
                <h3>Selamat Datang: {{ $auth->name }}</h3>
            </div>
            <!-- /.box-body -->
        </div>
    </div>
</div>
@stop
