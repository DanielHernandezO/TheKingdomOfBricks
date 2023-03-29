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
                        @if($viewData['item']->getStock()>0)
                        <form method="POST" action="{{ route('user.cart.add', ['id'=> $viewData['item']->getId()]) }}">
                            <div class="row">
                                @csrf
                                <div class="col-auto">
                                    <div class="input-group col-auto">
                                        <div class="input-group-text">{{__('commons.quantity')}}</div>
                                        <input type="number" min="1" max={{$viewData['item']->getStock()}} class="form-control quantity-input" name="quantity" value="1">
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <button class="btn bg-primary text-white" type="submit">{{__('user.addToCart')}}</button>
                                </div>
                            </div>
                        </form>                        
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">{{ __('user.addReview') }}</div>
            <div class="card-body d-flex justify-content-between align-items-center">
                <form method="POST" action="{{ route('user.item.review', ['itemId'=> $viewData['item']->getId()]) }}" class="w-100">
                    @csrf
                    <div class="form-group w-100">
                        <label for="ratingInput" class="card-subtitle text-muted">{{ __('commons.inputLabel', ['att' => __('commons.rating')]) }}</label>
                        <select name="rating" id="rating" class="form-control">
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>
                    <div class="form-group w-100">
                        <label for="commentInput" class="card-subtitle text-muted">{{ __('commons.inputLabel', ['att' => __('commons.comment')]) }}</label>
                        <textarea name="comment" id="comment" rows="3" class="form-control"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">{{ __('commons.send') }}</button>
                </form>
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
