@extends('layouts.adminApp')
@section("title", $viewData["title"])
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{__('admin.createReview')}}</div>
          <div class="card-body">
            @if($errors->any())
            <ul id="errors" class="alert alert-danger list-unstyled">
              @foreach($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
            @endif
            @if(session('success'))
              <div class="alert alert-success">
                  {{session('success')}}
              </div>
            @endif
            <form method="POST" action="{{ route('admin.review.save') }}">
              @csrf
              <input type="text" class="form-control mb-2" placeholder="{{ __('commons.placeholder', ['att' => __('commons.comment')]) }}" name="comment" value="{{ old('comment') }}" />
              <input type="text" class="form-control mb-2" placeholder="{{ __('commons.placeholder', ['att' => __('commons.rating')]) }}" name="rating" value="{{ old('rating') }}" />
              <input type="submit" class="btn btn-primary" value="{{__('commons.send')}}" />
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection