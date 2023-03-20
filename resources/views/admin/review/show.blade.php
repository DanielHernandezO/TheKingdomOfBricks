@extends('layouts.adminApp')
@section('title', __('commons.reviewTitle'))
@section('subtitle', __('commons.review', ['id' => $review->getId()]))
@section('content')
<div class="card mb-3">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="https://laravel.com/img/logotype.min.svg" class="img-fluid rounded-start">
    </div>
    <div class="col-md-8">
      <div class="card-body">
          <p class="card-text">{{  __('commons.ratingSpan', ['value' => $viewData['review']->getRating()]) }} </p> 
          <p class="card-text">{{ __('commons.commentSpan', ['value' => $viewData['review']->getComment()]) }}</p> 
          
      </div>
    </div>
    <form method="POST" action="{{ route('admin.review.delete', ['id'=> $viewData['review']->getId()]) }}">
      @csrf
      @method('DELETE')
        <div class="form-group">
            <input type="submit" class="btn btn-danger delete-review" value="{{__('commons.delete')}}">
        </div>
  </div>
</div>
@endsection