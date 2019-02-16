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
			    <a href="{{ url("satuan/create") }}" class="btn btn-primary btn-sm">
						Tambah Data
				</a>
			</div>
            <div class="box-body">
				@include("flash")
				<table class="table">
                	<thead>
                		<tr>
	                		<th>Satuan</th>
	                		<th>-</th>
	                	</tr>
                	</thead>
                	<tbody>
                		@foreach($satuan as $row)
	                		<tr>
	                			<td>{{ $row->satuan }}</td>
	                			<td>
	                				<a href="{{ url('satuan/update/'.$row->id) }}" class="btn btn-success btn-sm">
	                					Edit
	                				</a>

	                				<a href="{{ url('satuan/delete/'.$row->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin menghapus data ini ?')">
	                					Hapus
	                				</a>
	                			</td>
	                		</tr>
	                	@endforeach
                	</tbody>
                </table>
			</div>
            <!-- /.box-body -->
        </div>
    </div>
</div>
@stop
@push('js')
<script type="text/javascript">
	$(document).ready(function(){
		$(".table").DataTable({
			"bLengthChange": false,
			"oLanguage": {
				"sSearch": "Pencarian:"
			}
		});
	});
</script>
@endpush
