@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card p-4">
        <h1 class="mb-4 text-center">{{ __('user.myProfile') }}</h1>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header text-center">
                        <h5 class="card-title">{{ __('user.information')}}</h5>
                    </div>
                    <div class="card-body">
                        <div class="col-md-6">
                            <p class="fw-bold">{{ __('commons.inputLabel', ['att' => __('commons.name')]) }}</p>
                            <p>{{ $viewData['user']->getName() }}</p>
                            <p class="fw-bold">{{ __('commons.inputLabel', ['att' => __('commons.email')]) }}</p>
                            <p>{{ $viewData['user']->getEmail() }}</p>
                            <p class="fw-bold">{{ __('commons.inputLabel', ['att' => __('user.accountBalance')]) }}</p>
                            <p>{{ $viewData['user']->getAccountBalance() }}$</p>
                            <p class="fw-bold">{{ __('commons.inputLabel', ['att' => __('user.characterPrice')]) }}</p>
                            <p>{{ $viewData['totalPrice'] }}$</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card mb-3">
                    <div class="card-header text-center">
                        <h5 class="card-title">{{$viewData['characterName']}}</h5>
                    </div>
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center">
                        <img src="{{ URL::asset('storage/item/'.$viewData['head']->getImage()) }}" alt="{{$viewData['head']->getTitle()}}" class="character-image">
                        <img src="{{ URL::asset('storage/item/'.$viewData['chest']->getImage()) }}" alt="{{$viewData['chest']->getTitle()}}" class="character-image">
                        <img src="{{ URL::asset('storage/item/'.$viewData['legs']->getImage()) }}" alt="{{$viewData['legs']->getTitle()}}" class="character-image">
                        </div>
                        <div class="text-center mt-3">
                        <a href="{{ route('character.editView') }}" class="btn btn-primary">{{ __('commons.edit')}}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection