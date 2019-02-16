@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
<h1>
    Barang
</h1>
@stop

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="box box-danger">
        	<div class="box-header with-border">
			    {{ request()->segment(2) == 'create' ? 'Tambah Data' : 'Edit' }}
			</div>
            <div class="box-body">
				
				@include("flash")

				{!! Form::model($model) !!}
					<div class="form-group">
	                	{!! Form::label('satuan') !!}
	                	{!! Form::select('satuan_id',$satuan,null,['class'=>'form-control']) !!}
	                </div>
	                <div class="form-group">
	                	{!! Form::label('kode') !!}
	                	{!! Form::text('kode',null,['class'=>'form-control']) !!}
	                </div>
	                <div class="form-group">
	                	{!! Form::label('nama') !!}
	                	{!! Form::text('nama',null,['class'=>'form-control']) !!}
	                </div>
	                <div class="form-group">
	                	{!! Form::label('harga_modal') !!}
	                	{!! Form::number('harga_modal',null,['class'=>'form-control']) !!}
	                </div>
	                <div class="form-group">
	                	{!! Form::label('harga_jual') !!}
	                	{!! Form::number('harga_jual',null,['class'=>'form-control']) !!}
	                </div>
					<div class="box-footer">
				        <button type="submit" class="btn btn-primary">
				        	{{ request()->segment(2) == 'create' ? 'Simpan' : 'Update' }}
				        </button>
				    </div>
				{!! Form::close() !!}
			</div>
		</div>
    </div>
</div>
@stop

