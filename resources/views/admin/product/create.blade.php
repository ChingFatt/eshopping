@extends('layouts.app')

@section('form')
    {!! Form::open(['route' => 'admin.product.store', 'method' => 'post', 'files' => true]) !!}
@endsection

@section('content')
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <h6 class="card-header">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-auto">
                                Product Detail
                            </div>
                            <div class="col-auto">
                                {!! Form::btnBack(url()->previous()) !!}
                            </div>
                        </div>
                    </h6>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
    							@include('admin.product.form')
    						</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection