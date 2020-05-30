@extends('layouts.app')

@section('content')
<section class="py-5">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<div class="row justify-content-between align-items-center">
							<div class="col-auto">
								Products
							</div>
							<div class="col-auto">
								{!! Form::btnCreate(route('admin.product.create')) !!}
							</div>
						</div>
					</div>
					<div class="table-responsive">
				    	<table class="table table-striped table-bordered table-hover card-table	sortable">
				    		<thead>
				    			<tr>
				    				<th scope="col">ID</th>
				    				<th scope="col">Title</th>
				                    <th scope="col">Publish</th>
				                    <th scope="col"></th>
				    			</tr>
				    		</thead>
				    		<tbody>
				    			@foreach ($products as $product)
				    			<tr>
				    				<td>{{ $product->id }}</td>
				    				<td>
				    					<a href="{{ route('admin.product.show', $product) }}">{{ $product->title }}</a>
				    				</td>
				                    <td>
				                        @if ($product->is_publish == 1)
				                            <i class="fas fa-check text-success"></i>
				                        @else
				                            <i class="fas fa-times text-danger"></i>
				                        @endif
				                    </td>
				    				<td>
				                        {!! Form::btnView(route('admin.product.show', $product)) !!}
				                        {!! Form::btnEdit(route('admin.product.edit', $product)) !!}            
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
</section>
@endsection