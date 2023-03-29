@extends('layouts.app')

@section('content')
    <div class = "card">
        <div class="container">
            <div class="col-md-3 mx-auto mt-3">
                <div id="carouselHead" class="carousel slide" data-interval="false">
                    <div class="carousel-inner">
                        @foreach ($viewData['heads'] as $head)
                        <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                            <img src="{{ URL::asset('storage/item/'.$head->getImage()) }}" class="d-block w-100" alt="{{ $head->getTitle() }}" data-headId = {{$head->getId()}}>
                        </div>
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#carouselHead" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    </a>
                    <a class="carousel-control-next" href="#carouselHead" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    </a>
                </div>
            </div>
            <div class="col-md-3 mx-auto mt-3">
                <div id="carouselChest" class="carousel slide" data-interval="false">
                    <div class="carousel-inner">
                        @foreach ($viewData['chests'] as $chest)
                        <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                            <img src="{{ URL::asset('storage/item/'.$chest->getImage()) }}" class="d-block w-100" alt="{{ $head->getTitle() }}" data-chestId = {{$chest->getId()}}>
                        </div>
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#carouselChest" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    </a>
                    <a class="carousel-control-next" href="#carouselChest" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    </a>
                </div>
            </div>
            <div class="col-md-3 mx-auto mt-3">
                <div id="carouselLegs" class="carousel slide" data-interval="false">
                    <div class="carousel-inner">
                        @foreach ($viewData['legs'] as $legs)
                        <div class="carousel-item {{ $loop->first ? 'active' : '' }}" >
                            <img src="{{ URL::asset('storage/item/'.$legs->getImage()) }}" class="d-block w-100" alt="{{ $legs->getTitle() }}" data-legsId = {{$legs->getId()}}>
                        </div>
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#carouselLegs" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    </a>
                    <a class="carousel-control-next" href="#carouselLegs" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    </a>
                </div>
            </div>
        </div>
        <div>
            <form id="update-form" method="POST" action="{{ route('character.update') }}">
                @csrf
                @method('PUT')
                <input type="hidden" name="head-id" id="head-id">
                <input type="hidden" name="chest-id" id="chest-id">
                <input type="hidden" name="legs-id" id="legs-id">
                <div class="d-flex justify-content-center align-items-center">
                    <div class="form-group mr-2">
                        <label for="name">{{ __('commons.inputLabel', ['att' => __('commons.name')]) }}</label>
                        <input type="text" name="name" id="name" class="form-control mb-2" >
                        <button type="submit" class="btn btn-primary mb-2">{{__('commons.update')}}</button>
                    </div>
                </div>
                
            </form>
        </div>
    </div>
    <script src="{{ asset('js/carousel.js') }}"></script>

@endsection