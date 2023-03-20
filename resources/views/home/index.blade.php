@extends('layouts.app')
@section('content')
<div class="jumbotron">
    <h1 class="display-4"> {{__('commons.brand')}}</h1>
    <p class="description">{{__('commons.welcomeDescription')}}</p>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 mb-6">
                <div class="card">
                    <img src="{{ asset('images/bowser.webp') }}" class="card-img-top" alt="Card 1">
                    <div class="card-body">
                        <a href="#" class="btn btn-primary"><i class="fas fa-info-circle"></i>{{__('commons.products')}}</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-6">
                <div class="card">
                    <img src="{{ asset('images/Ninjago.png') }}" class="card-img-top" alt="Card 2">
                    <div class="card-body">
                        <a href="#" class="btn btn-primary"><i class="fas fa-info-circle"></i>{{__('commons.about')}}</a>
                    </div>
                </div>
            </div>
        </div>
    </div> 
</div> 
@endsection
