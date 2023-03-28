@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-danger text-white">
                    <h4>{{__('user.enoughMoney')}}</h4>
                </div>
                <div class="card-body">
                    <div class="alert alert-danger" role="alert">
                        <div class="row">
                            <div class="col-md-6">
                                <img src="{{ asset('images/sad.jpg') }}" class="img-fluid" alt="Compra exitosa">
                            </div>
                            <div class="col-md-6">
                                <p>{{__('user.failPurchase')}}</p>
                                <a href="/" class="btn btn-primary">{{__('user.goCart')}}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
