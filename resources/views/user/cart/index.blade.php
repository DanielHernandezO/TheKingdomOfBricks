@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">Items in Cart</div>
    <div class="card-body">
        <table class="table table-bordered table-striped text-center">
            <thead>
                <tr>
                    <th scope="col">{{__('commons.id')}}</th>
                    <th scope="col">{{__('commons.title')}}</th>
                    <th scope="col">{{__('commons.price')}}</th>
                    <th scope="col">{{__('user.quantity')}}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($viewData["items"] as $item)
                <tr>
                    <td>{{ $item->getId() }}</td>
                    <td>{{ $item->getTitle() }}</td>
                    <td>${{ $item->getPrice() }}</td>
                    <td>{{ session('items')[$item->getId()] }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="row">
            <div class="text-end">
                <a class="btn btn-outline-secondary mb-2">
                    <b>{{ __('commons.inputLabelWithValue', ['att' => __('user.total'), 'val' => $viewData['total']])}}</b>
                </a>
                @if(count($viewData["items"])>0)
                    <a href="{{ route('user.cart.purchase') }}" class="btn bg-primary text-white mb-2">{{__('user.purchase')}}</a>
                    <a href="{{ route('user.cart.delete') }}">
                        <button class="btn btn-danger mb-2">{{__('user.removeCart')}}</button>
                    </a>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
