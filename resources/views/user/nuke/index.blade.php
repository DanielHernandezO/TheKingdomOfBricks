@extends('layouts.app')
@section('title', __('user.itemTitle'))
@section('content')
    <!-- Show nukes-->
    <div class="row">
        @foreach ($viewData['bombs'] as $bomb)
            <div class="col-md-4 col-lg-3 mb-2">
                <div class="card">
                    <img src="{{ $bomb['url'] }}" class="card-img-top img-card">
                    <div class="card-body text-center">
                        <p>{{ $bomb['id'] }}. {{ $bomb['name'] }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
