@extends('layouts.default')

@push('css')
@endpush

@push('js')
@endpush

@section('content')
<section class="py-5">
	<div class="container">
		<div class="row">
			<div class="col-md-5">
				<img src="/img/sample.jpg" class="img-fluid mx-auto d-block">
			</div>
			<div class="col-md-7">
				<h4 class="mb-4">{{ $product->title }}</h4>
				<h5 class="font-weight-bold mb-0">SGD {{ number_format($product->price, 0) }}</h5>
				<div class="mt-5">
					<form action="{{ route('cart.store') }}" method="POST">
						{{ csrf_field() }}
						{!! Form::hidden('id', $product->id) !!}
						{!! Form::hidden('title', $product->title) !!}
						{!! Form::hidden('price', $product->price) !!}
						<div class="row">
							<div class="col-md-2 form-group">
								<label>Quantity</label>
								{!! Form::number('quantity', 1, ['class' => 'form-control', 'min' => 0]) !!}
							</div>
						</div>
						<button tyle="submit" class="btn btn-success">Add to Cart</button>
					</form>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="mt-5">
					{!! $product->content !!}
				</div>
			</div>
		</div>
	</div>
</section>
@endsection