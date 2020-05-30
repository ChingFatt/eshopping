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
								{{ $product->title }}
							</div>
							<div class="col-auto">
								{!! Form::btnEdit(route('admin.product.edit', $product)) !!}
							</div>
						</div>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-md-4">
								<label class="form-label">Slug</label>
                				<div class="font-weight-bold">
									{{ $product->slug }}
								</div>
							</div>
							<div class="col-md-4">
								<label class="form-label">Price</label>
                				<div class="font-weight-bold">
                					SGD {{ number_format($product->price, 0) }}
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection