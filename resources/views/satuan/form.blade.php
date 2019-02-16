@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
<h1>
    Satuan
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
	                	{!! Form::text('satuan',null,['class'=>'form-control']) !!}
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

