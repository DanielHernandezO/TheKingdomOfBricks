@extends('layouts.app')
@section('content')
    @forelse ($viewData["purchases"] as $order)
        <div class="card mb-4">
            <div class="card-header"><b>{{ __('commons.inputLabelWithValue', ['att' => __('user.orderId'), 'val' => $order->getId()])}}</b></div>
            <div class="card-body">
                {{ __('commons.inputLabelWithValue', ['att' => __('user.date'), 'val' => $order->getCreatedAt()])}}<br />
                {{ __('commons.inputLabelWithValue', ['att' => __('user.totalPaid'), 'val' => $order->getTotalAmount()])}}<br />
                <table class="table table-bordered table-striped text-center mt-3">
                    <thead>
                        <tr>
                            <th scope="col">{{__('commons.id')}}</th>
                            <th scope="col">{{__('commons.title')}}</th>
                            <th scope="col">{{__('commons.price')}}</th>
                            <th scope="col">{{__('commons.quantity')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order->getOrderItem() as $orderItem)
                            <tr>
                                <td>{{ $orderItem->getId() }}</td>
                                <td>
                                    <a class="link-success" href="{{ route('user.item.show', ['id' => $orderItem->getItem()->getId()]) }}">
                                        {{ $orderItem->getItem()->getTitle() }}
                                    </a>
                                </td>
                                <td>${{ $orderItem->getPrice() }}</td>
                                <td>{{ $orderItem->getQuantity() }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @empty
        <div class="alert alert-danger" role="alert">
            {{__('user.withNoPurchase')}}
        </div>
    @endforelse
    <div class="d-flex justify-content-center">
        {{ $viewData["purchases"]->render('pagination::bootstrap-4') }}
    </div>
@endsection
