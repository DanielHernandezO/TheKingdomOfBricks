@extends('layouts.adminApp')
@section('title', __('admin.reviewTitle'))
@section('content')
<div class="card mb-3">
  <div class="row g-0">
    <div class="col-md-4 align-items-center d-flex">
      @if($viewData['review']->getRating() < 3)
      <i class="emoji bi bi-emoji-angry text-danger"></i>
      @elseif($viewData['review']->getRating() == 3)
      <i class="emoji bi bi-emoji-neutral text-warning"></i>
      @else
      <i class="emoji bi bi-emoji-heart-eyes text-success"></i>
      @endif
    </div>
    <div class="col-md-8 align-items-center d-flex">
      <div class="card-body">
          <p class="card-text">{{ __('commons.inputLabelWithValue', ['att' => __('commons.rating'), 'val' => $viewData['review']->getRating()])}}</p> 
          <p class="card-text">{{ __('commons.inputLabelWithValue', ['att' => __('commons.comment'), 'val' => $viewData['review']->getComment()])}}</p> 
          <form method="POST" action="{{ route('admin.review.delete', ['id'=> $viewData['review']->getId()]) }}">
          @csrf
          @method('DELETE')
            <div class="form-group mt-5">
                <input type="submit" class="btn btn-danger delete-review" value="{{__('commons.delete')}}">
            </div>
          </form>
      </div>
    </div>
    
  </div>
</div>
@endsection