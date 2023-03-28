@extends('layouts.app')
@section('title', __('user.itemTitle'))
@section('content')
    <div class="card mb-3">
        <div class="row g-0">
            <div class="col-md-4 align-items-center d-flex ">
                <img
                    src="{{ URL::asset('storage/item/'.$viewData['item']->getImage()) }}" class="img-fluid rounded-start"
                ></img>
            </div>
            <div class="col-md-8 align-items-center d-flex">
                <div class="card-body">
                    <h5 class="card-title">{{ __('commons.inputLabelWithValue', ['att' => __('commons.title'), 'val' => $viewData['item']->getTitle()])}}</h5>
                    <p class="card-text">{{ __('commons.inputLabelWithValue', ['att' => __('commons.id'), 'val' => $viewData['item']->getId()])}}</p>
                    <p class="card-text">{{ __('commons.inputLabelWithValue', ['att' => __('commons.type'), 'val' => $viewData['item']->getType()])}}</p>
                    <p class="card-text">{{ __('commons.inputLabelWithValue', ['att' => __('commons.price'), 'val' => $viewData['item']->getPrice()])}}</p>
                    <p class="card-text">{{ __('commons.inputLabelWithValue', ['att' => __('commons.guide'), 'val' => $viewData['item']->getGuide()])}}</p>
                    <p class="card-text">{{ __('commons.inputLabelWithValue', ['att' => __('commons.pieces'), 'val' => $viewData['item']->getPieces()])}}</p>
                    <p  @if ($viewData['item']->getStock() == 0)
                            class="card-text text-danger"
                        @else
                            class="card-text"
                        @endif
                    >{{ __('commons.inputLabelWithValue', ['att' => __('commons.stock'), 'val' => $viewData['item']->getStock()])}}</p>
                    <div>
                        <a href="" class="btn btn-secondary">{{__('actions.addReview')}}</a>
                        @if($viewData['item']->getStock()>0)
                            <a href="" class="btn btn-primary">{{__('actions.addToCart')}}</a>
                        @else
                            <a href="" class="btn btn-primary disabled">{{__('actions.addToCart')}}</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="row g-0">
            @foreach ($viewData['reviews'] as $review)
                <div class="card mb-3">
                    <div class="card-body">
                        <h6 class="card-subtitle mb-2 text-muted">{{ __('commons.inputLabelWithValue', ['att' => __('commons.rating'), 'val' => $review->getRating()])}}</h6>
                        <p class="card-text">{{ __('commons.inputLabelWithValue', ['att' => __('commons.comment'), 'val' => $review->getComment()])}}</p>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-center">
            {{ $viewData["reviews"]->render('pagination::bootstrap-4') }}
        </div>
    </div>
@endsection
