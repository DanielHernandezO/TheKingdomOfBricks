@extends('layouts.app')
@section('title', __('user.itemTitle'))
@section('content')

    <!-- Filter form -->
    <form class="form-inline" action="{{ route('user.item.index') }}" method="GET">

        <div class="container">
            <div class="row">
                <div class="col-sm form-group mx-sm-3 mb-2">
                    <label class="text-light" for="type" class="mr-2">{{ __('commons.inputLabel', ['att' => __('commons.type')]) }}</label>
                    <select name="type" id="type" class="form-control" value="{{ $viewData['type'] }}" selected>
                        <option value="" @if($viewData['type'] == '') selected @endif>{{__('commons.all')}}</option>
                        <option value="head" @if($viewData['type'] == 'head') selected @endif>{{__('commons.head')}}</option>
                        <option value="chest" @if($viewData['type'] == 'chest') selected @endif>{{__('commons.chest')}}</option>
                        <option value="legs" @if($viewData['type'] == 'legs') selected @endif>{{__('commons.legs')}}</option>
                        <option value="box" @if($viewData['type'] == 'box') selected @endif>{{__('commons.box')}}</option>
                    </select>
                </div>
                <div class="col-sm mt-3">
                    <button type="submit" class="btn btn-primary mt-2">{{ __('commons.filter') }}</button>
                </div>
            </div>
        </div>
    </form>
    <!-- Show items-->
    <div class="row">
        @foreach ($viewData['items'] as $item)
            <div class="col-md-4 col-lg-3 mb-2">
                <div class="card">
                    <img src="{{ URL::asset('storage/item/'.$item->getImage()) }}" class="card-img-top img-card">
                    <div class="card-body text-center">
                    <p>{{ $item->getId() }}. {{ $item->getTitle() }}</p>
                        <a href="{{ route('user.item.show', ['id' => $item['id']]) }}"
                            class="btn bg-primary text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="d-flex justify-content-center">
        {{ $viewData["items"]->render('pagination::bootstrap-4') }}
    </div>
@endsection
