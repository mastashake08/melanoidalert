@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Give Support</div>

                <div class="panel-body">
                  This application is free to use, however it is not free to maintain.
                  Your donation of $10 goes towards maintaing server fees and paying for the automated text messages.
                  Please help keep this vital service running.

                    <form action="{{url('/charge')}}" method="POST">

                      <script
                        src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                        data-key="{{env('STRIPE_KEY')}}"
                        data-amount="1000"
                        data-name="Melanoid Alert"
                        data-description="Donation"
                        data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                        data-locale="auto"
                        data-label="Donate To Melanoid Alert">
                      </script>
                      {{ csrf_field() }}
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
