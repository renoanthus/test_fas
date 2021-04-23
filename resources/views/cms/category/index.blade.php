@extends('cms.layouts.app')
@section('title')
Category
@endsection

@section('css')

<!-- third party css -->
{{-- Data table --}}
<link href="{{asset('adminto/dist/')}}/assets/libs/datatables/dataTables.bootstrap4.css" rel="stylesheet"
	type="text/css" />
<link href="{{asset('adminto/dist/')}}/assets/libs/datatables/responsive.bootstrap4.css" rel="stylesheet"
	type="text/css" />
<link href="{{asset('adminto/dist/')}}/assets/libs/datatables/buttons.bootstrap4.css" rel="stylesheet"
	type="text/css" />
<link href="{{asset('adminto/dist/')}}/assets/libs/datatables/select.bootstrap4.css" rel="stylesheet" type="text/css" />


<!-- third party css end -->
@endsection
@section('content')
<div class="row">
	<div class="col-12">
		@if ($errors->any())
		@foreach ($errors->all() as $error)
		<div class="alert alert-danger alert-dismissible fade show" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			</button>
			<strong>Error</strong> {{ $error }}
		</div>
		@endforeach
		@endif
		@if ($message = Session::get('success'))
		<div class="alert alert-success alert-dismissible fade show" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			</button>
			<strong>Success</strong> {{ $message }}
		</div>
		@endif
		@if ($message = Session::get('error'))
		<div class="alert alert-danger alert-dismissible fade show" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			</button>
			<strong>Error</strong> {{ $message }}
		</div>
		@endif
		<div class="card-box">
			<div class="row head_table">
				<div class="col-md-9">
					<h4 class="mt-0 header-title">List Categories</h4>
				</div>
				<div class="col-md-3 mb-2">
					<button class="btn btn-block btn-primary" data-toggle="modal" data-target="#modalData"><i
							class="mdi mdi-plus"></i> Category</button>
				</div>
			</div>
			<div class="table-responsive">
				<table id="datatable" class="table table-bordered">
					<thead>
						<tr>
							<th>No.</th>
							<th>Name</th>
							<th>Slug</th>
							<th>Action</th>
						</tr>
					</thead>
				</table>
			</div>
		</div>
		<div id="modalData" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
			aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title" id="myModalLabel">Add Category</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					</div>
					<div class="modal-body">
						<form id="formData" data-parsley-validate="" novalidate="">
							@csrf
							<div class="form-group">
								<label>Name of category</label>
								<input type="text" name="name" parsley-trigger="change" required=""
									placeholder="Input name of category" class="form-control" id="name">
							</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary waves-effect"
							data-dismiss="modal">Cancel</button>
						<button type="submit" class="btn btn-primary waves-effect waves-light">Save</button>
						</form>
					</div>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div>
	</div>
</div> <!-- end row -->
@endsection

@section('js')
{{-- Datatable --}}
<script src="{{asset('adminto/dist/')}}/assets/libs/datatables/jquery.dataTables.min.js"></script>
<script src="{{asset('adminto/dist/')}}/assets/libs/datatables/dataTables.bootstrap4.js"></script>
<script src="{{asset('adminto/dist/')}}/assets/libs/datatables/dataTables.responsive.min.js"></script>
<script src="{{asset('adminto/dist/')}}/assets/libs/datatables/responsive.bootstrap4.min.js"></script>
<script src="{{asset('adminto/dist/')}}/assets/libs/datatables/dataTables.keyTable.min.js"></script>
<script src="{{asset('adminto/dist/')}}/assets/libs/datatables/dataTables.select.min.js"></script>

<!-- Validation js (Parsleyjs) -->
<script src="{{asset('adminto/dist/')}}/assets/libs/parsleyjs/parsley.min.js"></script>

<!-- validation init -->
<script src="{{asset('adminto/dist/')}}/assets/js/pages/form-validation.init.js"></script>

<script type="text/javascript">
	window.table = $('#datatable').DataTable({
		processing: true,
		serverSide: true,
		ajax: {
			url: "{{ route('admin.category.data')}}",
		},
		columns: [
			{   
				data: 'DT_RowIndex', 
				orderable: false, 
				searchable: false,
				width:'10px',
			},
			{
				data: 'name',
				name: 'name'
			},
			{
				data: 'slug',
				name: 'slug'
			},
			{
				data: 'action',
				name: 'action',
				classUsername : 'text-center',
				width:'100px',
				orderable: false
			},
		]
	});

	$('#formData').on('submit', function(e){
		e.preventDefault();
		$.ajax({
			url: "{{ route('admin.category.store') }}",
			type: "POST",
			data: new FormData(this),
			dataType: 'JSON',
			contentType: false,
			cache: true,
			processData: false,
		})
		.done(function(response) {
			if (response.status) {
				Swal.fire("Success", response.message, "success");
				$('#modalData').on('hidden.bs.modal', function(e){
					$('#formData')[0].reset();
				});
				$('#modalData').modal('hide');
				setTimeout(function(){
					table.ajax.reload()
				}, 500)
			} else {
				Swal.fire("Failed", response.message, "warning");
			}
		})
		.fail(function() {
			Swal.fire("Oopss..","Something went wrong","error");
		});
		return false;
	});

	function deleteData(id){
		Swal.fire({
			title: 'Are you sure?',
			text: 'Data Will Permanent Delete',
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes'
		}).then(result =>{
			if(result.value){
				$.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
				});
				$.ajax({
					type: "POST",
					url: "{{ route('admin.category.delete') }}",
					data: {
						"id": id,
						"_token": "{{ csrf_token() }}",
					},
					dataType: "JSON",
				})
				.done(function(response){
					if (response.status) {
						Swal.fire("Success", response.message, "success");
						setTimeout(function(){
							table.ajax.reload()
						}, 500)
					} else {
						Swal.fire("Failed", response.message, "warning");
					}
				})
				.fail(function() {
					Swal.fire("Oopss..","Something went wrong","error");
				});
			}
		});
	}

	function editData(id){
		$('#modalData').modal('show');
		$('.modal-title').html('Edit Category')
		$.ajax({
			url : "{{ route('admin.category.index') }}/detail/"+id,
			type : "GET",
			datatype : "JSON",
			success : function(data){
				$('#name').val(data.name)
				$('<input>').attr({
					type: 'hidden',
					name: 'id',
					value: id,
				}).appendTo('#formData');
			}
		});
	}
</script>
@endsection