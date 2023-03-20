@extends('layouts.adminApp')
@section('title', 'titlequemao')
@section('subtitle', 'subquemao')
@section('content')
    <div class="card mb-3">
        <div class="row g-0">
            <div class="col-md-4">
                <img
                    src="https://laravel.com/img/logotype.min.svg" class="img-fluid rounded-start"
                ></img>
            </div>
            <div class="col-md-8">
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
                </div>
            </div>
            <form method="POST" action="{{ route('item.delete', ['id'=> $viewData['item']->getId()]) }}">
                @csrf
                @method("DELETE")
                <input type="submit" class="btn btn-danger" value={{__('actions.delete')}}>
            </form>
        </div>
    </div>
@endsection