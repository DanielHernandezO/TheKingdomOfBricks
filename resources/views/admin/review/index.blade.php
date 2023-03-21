@extends('layouts.adminApp')
@section('title', __('admin.reviewTitle'))
@section('content')
<div class="row">
  @foreach ($viewData["reviews"] as $review)
  <div class="col-md-4 col-lg-3 mb-2">
    <div class="card">
      <img src="https://laravel.com/img/logotype.min.svg" class="card-img-top img-card">
      <div class="card-body text-center">
        <p>{{  __('commons.ratingSpan', ['value' => $review->getRating()]) }} </p>
        <a href=" {{ route('admin.review.show', ['id'=> $review->getId()]) }}"
          class="btn bg-primary text-white">{{  __('commons.review', ['id' => $review->getId()]) }}</a>
      </div>
    </div>
  </div>
  @endforeach
</div>
@endsection