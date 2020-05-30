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
				<h1>Products</h1>
			</div>
		</div>
		<div class="row">
			@foreach ($products as $product)
			<div class="col-md-4">
				 <div class="card">
				 	<div class="card-header p-0">
				 		<img src="/img/sample.jpg" class="img-fluid mx-auto d-block">
				 	</div>
				 	<div class="card-body">
				 		<h4 class="mb-4">{{ $product->title }}</h4>
				 		<h5 class="font-weight-bold mb-0 text-right">SGD {{ number_format($product->price, 0) }}</h5>
				 	</div>
				 	<a href="{{ route('product.show', $product->slug) }}" class="stretched-link"></a>
				 </div>
			</div>
			@endforeach
		</div>
	</div>
</section>
@endsection

@push('script')
@endpush