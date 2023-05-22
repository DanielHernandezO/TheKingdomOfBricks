@extends('layouts.adminApp')
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
                    <div>
                        <form method="POST" action="{{ route('admin.item.update', ['id'=> $viewData['item']->getId()]) }}">
                            @method("PUT")
                            <div class="row">
                                @csrf
                                <div class="col-auto">
                                    <div class="input-group col-auto">
                                        <div class="input-group-text">{{__('commons.quantity')}}</div>
                                        <input name="stock" type="number" min="1" max=100 class="form-control quantity-input" name="quantity" value="1">
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <button class="btn bg-primary text-white" type="submit">{{__('admin.addStock')}}</button>
                                </div>
                            </div>
                        </form>  
                        <form method="POST" action="{{ route('admin.item.delete', ['id'=> $viewData['item']->getId()]) }}">
                            @csrf
                            @method("DELETE")
                            <div class="form-group mt-2">
                                <input type="submit" class="btn btn-danger" value={{__('commons.delete')}}>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
