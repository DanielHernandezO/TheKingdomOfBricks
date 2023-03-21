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
                    <h5 class="card-title">{{ $viewData['item']->getTitle() }}</h5>
                    <p class="card-text">{{ $viewData['item']->getId() }}</p>
                    <p class="card-text">{{ __('commons'.'.'.$viewData['item']->getType()) }}</p>
                    <p class="card-text">{{ $viewData['item']->getPrice() }}</p>
                    <p class="card-text">{{ $viewData['item']->getGuide() }}</p>
                    <p class="card-text">{{ $viewData['item']->getPieces() }}</p>
                    <p  @if ($viewData['item']->getStock() == 0)
                            class="card-text text-danger"
                        @else
                            class="card-text"
                        @endif
                    >{{ $viewData['item']->getStock() }}</p>
                    <form method="POST" action="{{ route('admin.item.delete', ['id'=> $viewData['item']->getId()]) }}">
                        @csrf
                        @method("DELETE")
                        <div class="form-group mt-2">
                            <input type="submit" class="btn btn-danger" value={{__('actions.delete')}}>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
