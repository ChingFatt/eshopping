@extends('layouts.checkout')

@push('css')
@endpush

@push('js')
@endpush

@section('content')
<section class="py-5">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						Checkout
					</div>
					<div class="card-body">
						<form action="{{ route('checkout.store') }}" method="POST" id="payment-form">
							{{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-12 form-group">
                                    <label>Email</label>
                                    {{ Form::text('email', null, ['class' => 'form-control', 'required' => true, 'id' => 'email']) }}
                                </div>
                                <div class="col-md-12 form-group">
                                    <label>Name</label>
                                    {{ Form::text('name', null, ['class' => 'form-control', 'required' => true, 'id' => 'name']) }}
                                </div>
                                <div class="col-md-12 form-group">
                                    <label>Address</label>
                                    {{ Form::text('address', null, ['class' => 'form-control', 'required' => true, 'id' => 'address']) }}
                                </div>
                                <div class="col-md-4 form-group">
                                    <label>City</label>
                                    {{ Form::text('city', null, ['class' => 'form-control', 'required' => true, 'id' => 'city']) }}
                                </div>
                                <div class="col-md-4 form-group">
                                    <label>State</label>
                                    {{ Form::text('state', null, ['class' => 'form-control', 'required' => true, 'id' => 'state']) }}
                                </div>
                                <div class="col-md-4 form-group">
                                    <label>Postal Code</label>
                                    {{ Form::text('postalcode', null, ['class' => 'form-control', 'required' => true, 'id' => 'postalcode']) }}
                                </div>
                                <div class="col-md-4 form-group">
                                    <label>Country</label>
                                    {{ Form::text('country', null, ['class' => 'form-control', 'required' => true, 'id' => 'country']) }}
                                </div>
                                <div class="col-md-5 form-group">
                                    <label>Phone</label>
                                    {{ Form::text('phone', null, ['class' => 'form-control', 'required' => true, 'id' => 'phone']) }}
                                </div>
                                <div class="col-md-3 form-group">
                                    <label>Total</label>
                                    {{ Form::text('total', number_format(Cart::getTotal()) , ['class' => 'form-control', 'required' => true, 'id' => 'total', 'readonly' => true]) }}
                                </div>
                                <div class="col-md-12 form-group">
                                    <label for="card-element">
                                        Credit or debit card
                                    </label>
                                    <div id="card-element"></div>
                                    <div id="card-errors" role="alert"></div>
                                </div>
                            </div>
                            <button type="submit" id="complete-order" class="btn btn-success font-weight-bold w-100">Complete Order</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection

@push ('script')
    // Create a Stripe client.
    var stripe = Stripe('{{ config('services.stripe.key') }}');

    // Create an instance of Elements.
    var elements = stripe.elements();

    // Custom styling can be passed to options when creating an Element.
    // (Note that this demo uses a wider set of styles than the guide below.)
    var style = {
        base: {
            color: '#32325d',
            fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
            fontSmoothing: 'antialiased',
            fontSize: '16px',
            '::placeholder': {
                color: '#aab7c4'
            }
        },
        invalid: {
            color: '#fa755a',
            iconColor: '#fa755a'
        }
    };

    // Create an instance of the card Element.
    var card = elements.create('card', {
        style: style,
        hidePostalCode: true
    });

    // Add an instance of the card Element into the `card-element` <div>.
    card.mount('#card-element');

    // Handle real-time validation errors from the card Element.
    card.on('change', function(event) {
        var displayError = document.getElementById('card-errors');
        if (event.error) {
            displayError.textContent = event.error.message;
        } else {
            displayError.textContent = '';
        }
    });

    // Handle form submission.
    var form = document.getElementById('payment-form');
    form.addEventListener('submit', function(event) {
        event.preventDefault();

        var options = {
            name: document.getElementById('name').value,
            address_line1: document.getElementById('address').value,
            address_city: document.getElementById('city').value,
            address_state: document.getElementById('state').value,
            address_zip: document.getElementById('postalcode').value
        };

        stripe.createToken(card, options).then(function(result) {
            if (result.error) {
        // Inform the user if there was an error.
        var errorElement = document.getElementById('card-errors');
        errorElement.textContent = result.error.message;
        } else {
        // Send the token to your server.
        stripeTokenHandler(result.token);
        }
        });
    });

    // Submit the form with the token ID.
    function stripeTokenHandler(token) {
        // Insert the token ID into the form so it gets submitted to the server
        var form = document.getElementById('payment-form');
        var hiddenInput = document.createElement('input');
        hiddenInput.setAttribute('type', 'hidden');
        hiddenInput.setAttribute('name', 'stripeToken');
        hiddenInput.setAttribute('value', token.id);
        form.appendChild(hiddenInput);

        // Submit the form
        form.submit();
    }
@endpush