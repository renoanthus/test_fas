@extends('cms.layouts.app')
@section('title')
Post
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

{{-- Select2 --}}
<link href="{{asset('adminto/dist/')}}/assets/libs/select2/select2.min.css" rel="stylesheet" type="text/css" />

<!-- Plugins css -->
<link href="{{ asset('adminto/dist') }}/assets/libs/quill/quill.core.css" rel="stylesheet" type="text/css" />
<link href="{{ asset('adminto/dist') }}/assets/libs/quill/quill.snow.css" rel="stylesheet" type="text/css" />


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
					<h4 class="mt-0 header-title">List Posts</h4>
				</div>
				<div class="col-md-3 mb-2">
					<button class="btn btn-block btn-primary" data-toggle="modal" data-target="#modalData"><i
							class="mdi mdi-plus"></i> Post</button>
				</div>
			</div>
			<div class="table-responsive">
				<table id="datatable" class="table table-bordered">
					<thead>
						<tr>
							<th>No.</th>
							<th>Category</th>
							<th>Title</th>
							<th>Slug</th>
							<th>Short Description</th>
							<th>Action</th>
						</tr>
					</thead>
				</table>
			</div>
		</div>
		<div id="modalData" class="modal modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
			aria-hidden="true">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title" id="myModalLabel">Add Post</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					</div>
					<div class="modal-body">
						<form id="formData" data-parsley-validate="" novalidate="" enctype="multipart/form-data">
							@csrf
							<div class="form-group">
								<label>Category of post</label>
								<select name="category_id" id="category_id" class="form-control select2">
									<option value="">Select a category</option>
									@foreach ($categories as $item)
									<option value="{{ $item->id }}">{{ $item->name }}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group">
								<label>Title of post</label>
								<input type="text" name="title" parsley-trigger="change" required=""
									placeholder="Input title of post" class="form-control" id="title">
							</div>
							<div class="form-group">
								<label>Short description of post</label>
								<input type="text" name="short_description" parsley-trigger="change" required=""
									placeholder="Input short description of post" class="form-control"
									id="short_description">
							</div>
							<div class="form-group">
								<label>Content of post</label>
								<div id="snow-editor" style="height: 300px;">
								</div>
							</div>
							<div class="form-group">
								<label id="label_image">Image of post</label>
								<input type="file" class="form-control" required name="image" id="file">
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

{{-- Select2 --}}
<script src="{{asset('adminto/dist')}}/assets/libs/select2/select2.min.js"></script>

<!-- Plugins js -->
<script src="{{ asset('adminto/dist') }}/assets/libs/katex/katex.min.js"></script>
<script src="{{ asset('adminto/dist') }}/assets/libs/quill/quill.min.js"></script>

<!-- init js -->
<script src="{{ asset('adminto/dist') }}/assets/js/pages/form-editor.init.js"></script>

<script type="text/javascript">
	$(".select2").select2();
	// $('#snow-editor').empty();
	$(".ql-editor").attr('contenteditable', true);
	$(".ql-tooltip").empty();



	window.table = $('#datatable').DataTable({
		processing: true,
		serverSide: true,
		ajax: {
			url: "{{ route('admin.post.data')}}",
		},
		columns: [
			{   
				data: 'DT_RowIndex', 
				orderable: false, 
				searchable: false,
				width:'10px',
			},
			{
				data: 'category.name',
				name: 'category.name',
				defaultContent: '-',
			},
			{
				data: 'title',
				name: 'title'
			},
			{
				data: 'slug',
				name: 'slug'
			},
			{
				data: 'short_description',
				name: 'short_description'
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
		var data = new FormData(this);
		var content = $('#snow-editor').html();
		data.append("content",content);
		$.ajax({
			url: "{{ route('admin.post.store') }}",
			type: "POST",
			data: data,
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
					url: "{{ route('admin.post.delete') }}",
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
		$('.modal-title').html('Edit Category');
		$('#label_image').html('Image of post<small> (optional)');
		$('#file').removeAttr('required');
		$.ajax({
			url : "{{ route('admin.post.index') }}/detail/"+id,
			type : "GET",
			datatype : "JSON",
			success : function(data){
				$('#category_id').val(data.category_id).trigger('change')
				$('#title').val(data.title)
				$('#short_description').val(data.short_description)
				var content = data.content;
				$('#snow-editor').empty();
				$('#snow-editor').append(content);
				$(".ql-editor").attr('contenteditable', true);
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