@extends('layouts.default')

@push('css')
@endpush

@push('js')
@endpush

@section('content')
<section class="py-5">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="card mb-4">
					<div class="card-header">
						Shopping Cart
					</div>
					<div class="table-responsive">
				    	<table class="table table-striped table-bordered table-hover card-table	sortable">
				    		<thead>
				    			<tr>
				    				<th scope="col">Title</th>
				                    <th scope="col">Price</th>
				                    <th scope="col">Quantity</th>
				                    <th scope="col">Subtotal</th>
				                    <th scope="col"></th>
				    			</tr>
				    		</thead>
				    		<tbody>
				    			@if(Cart::isEmpty())
				    			<tr>
				    				<td colspan="5" class="text-center">No items in cart. <a href="{{ route('home') }}">Continue shopping</a></td>
				    			</tr>
				    			@else
				    			@foreach (Cart::getContent() as $item)
				    			<tr>
				    				<td><a href="{{ route('product.show', $item->model->slug) }}">{{ $item->model->title }}</a></td>
				    				<td>SGD {{ number_format($item->model->price) }}</td>
				    				<td>{{ $item->quantity }}</td>
				    				<td>SGD {{ number_format(($item->quantity * $item->model->price)) }}</td>
				    				<td><a href="{{ route('cart.remove', $item->model->id) }}" class="btn btn-sm btn-danger">Remove</a></td>
				    			</tr>
				    			@endforeach
				    			<tr class="font-weight-bold bg-light">
				    				<td colspan="3">Grand total: </td>
				    				<td colspan="2">SGD {{ number_format(Cart::getTotal()) }}</td>
				    			</tr>
				    			@endif
				    		</tbody>
				    	</table>
				    </div>
				</div>
			</div>
		</div>
		<div class="row justify-content-between align-items-center">
			<div class="col-auto">
				<a href="{{ route('cart.clear') }}" class="btn btn-sm btn-secondary">Clear Cart</a>
			</div>
			<div class="col-auto">
				<a href="{{ route('checkout.index') }}" class="btn btn-sm btn-success">Checkout</a>
			</div>
		</div>
	</div>
</section>
@endsection