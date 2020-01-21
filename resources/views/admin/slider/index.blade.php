@extends('layouts.app')

@section('title','Slider')

@push('css')
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">

@endpush 

@section('content')
	<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
            	<a href="{{ route('slider.create') }}" class="btn btn-primary">Add New Slider</a>
            	@include('layouts.partial.msg')
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">All Slider</h4>
                  
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="table" class="table table-striped table-bordered " style="width:100%">
                      <thead class=" text-primary">
                        <th>ID</th>
                        <th>Title</th>
                        <th>Sub Title</th>
                        <th>Image</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Action</th>
                      </thead>
                      <tbody>
                      	@foreach($sliders as $key=>$slider)
                      	<tr>
                      		<td>{{ $key + 1 }}</td>
                      		<td>{{ $slider->title }}</td>
                      		<td>{{ $slider->sub_title }}</td>
                      		<td><img class="img-responsive img-thumbnail" src="{{ asset('uploads/slider/'.$slider->image) }}" style="height: 100px; width: 100px" alt=""></td>
                      		<td>{{ $slider->created_at }}</td>
                      		<td>{{ $slider->updated_at }}</td>
                      		<td><a href="{{ route('slider.edit', $slider->id) }}" class="btn btn-info btn-sm"><i class="material-icons">mode_edit</i></a>
                      			<form id="delete-form-{{ $slider->id }}" method="POST" action="{{ route('slider.destroy', $slider->id) }}" style="display: none;">
                      				@csrf
                      				@method('DELETE')
                      			</form>
                      			<button type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure? You want to delete this?')){
                      				event.preventDefault();
                      				document.getElementById('delete-form-{{ $slider->id }}').submit();
                      			}else{
                      				event.preventDefault();
                      			}"><i class="material-icons">delete</i></button>
                      		</td>
                      	</tr>
                      	@endforeach
   
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection

@push('scripts')
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
	<script>
		$(document).ready(function() {
    		$('#table').DataTable();
		} );
	</script>
@endpush