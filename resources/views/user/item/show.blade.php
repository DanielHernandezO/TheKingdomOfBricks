@extends('layouts.app')
@section('title', __('admin.itemTitle'))
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
                    <form method="" action="">
                        @csrf
                        <div class="form-group mt-2">
                            <input type="submit" class="btn btn-danger" value={{__('actions.addtocart')}}>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
