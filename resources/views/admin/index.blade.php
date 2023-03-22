@extends('layouts.adminApp')
@section('title', __('commons.title'))
@section('content')
<div class="jumbotron">
    <h1 class="display-4">{{__('admin.welcome')}}</h1>
    <h4 class="description">{{__('admin.description')}}</h4>
    <div class="container mt-5">
        <div class="row mt-5">
          <div class="col-sm-4 mb-4">
            <div class="card">
              <img src="{{ asset('images/superheros.jpeg') }}" class="card-img-top" alt="Imágen de Lego de Review">
              <div class="card-body">
                <h5 class="card-title">{{__('admin.manageReview')}}</h5>
                <p class="card-text">{{__('admin.reviewDescription')}}</p>
              </div>
            </div>
          </div>
          <div class="col-sm-4 mb-4">
            <div class="card">
              <img src="{{ asset('images/users.webp') }}" class="card-img-top" alt="Imágen de Lego de Usuarios">
              <div class="card-body">
                <h5 class="card-title">{{__('admin.manageUsers')}}</h5>
                <p class="card-text">{{__('admin.userDescription')}}</p>
              </div>
            </div>
          </div>
          <div class="col-sm-4 mb-4">
            <div class="card">
              <img src="{{ asset('images/item.jpg') }}" class="card-img-top" alt="Imágen de Lego de Items">
              <div class="card-body">
                <h5 class="card-title">{{__('admin.manageItem')}}</h5>
                <p class="card-text">{{__('admin.itemDescription')}}</p>
              </div>
            </div>
          </div>
        </div>
      </div>
</div>
@endsection
