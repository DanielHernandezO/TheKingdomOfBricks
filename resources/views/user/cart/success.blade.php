@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-success text-white">
                    <h4>{{__('user.sucess')}}</h4>
                </div>
                <div class="card-body">
                    <div class="alert alert-success" role="alert">
                        <div class="row">
                            <div class="col-md-6">
                                <img src="{{ asset('images/item.jpg') }}" class="img-fluid" alt="Compra exitosa">
                            </div>
                            <div class="col-md-6">
                                <p>{{__('user.sucessPurchase')}}</p>
                                <p>{{ __('commons.inputLabelWithValue', ['att' => __('user.orderNumber'), 'val' => $viewData['order']->getId()])}}.</p>
                                <p>{{__('user.oderPurchaseSection')}}</p>
                                <a href="/" class="btn btn-primary">{{__('user.goPurchases')}}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
