@extends('layouts.adminApp')
@section('title', __('admin.reviewTitle'))
@section('content')

<!-- Filter form -->
<form action="{{ route('admin.review.index') }}" method="GET">
  <div class="container">
    <div class="row">
      <div class="col-sm">
        <label for="min_rating">{{ __('commons.minRating') }}</label>
        <input type="number" name="min_rating" id="min_rating" class="form-control" value="{{ $viewData['minRating'] }}" min="0" max="5" required>
      </div>
      <div class="col-sm">
        <label for="max_rating">{{ __('commons.maxRating') }}</label>
        <input type="number" name="max_rating" id="max_rating" class="form-control" value="{{ $viewData['maxRating'] }}" min="0" max="5" required>
      </div>
      <div class="col-sm mt-3">
        <button type="submit" class="btn btn-primary mt-2">{{ __('commons.filter') }}</button>
      </div>
    </div>
  </div>
</form>


<!-- Show reviews-->
<table class="table mt-3">
  <thead class="table-dark">
    <tr>
      <th scope="col">{{ __('commons.id') }}</th>
      <th scope="col">{{ __('commons.rating') }}</th>
      <th scope="col">{{ __('commons.show') }}</th>
    </tr>
  </thead>
  <tbody>
      @if(count($viewData["reviews"]) > 0)
      @foreach ($viewData["reviews"] as $review)
      <tr>
        <td>{{ $review->getId() }}</td>
        <td>{{  __('commons.ratingSpan', ['value' => $review->getRating()]) }}</td>
        <td>
          <a href=" {{ route('admin.review.show', ['id'=> $review->getId()]) }}"
          class="btn bg-primary text-white">                            
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
              <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
              <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
          </svg>
          </a>
        </td>
      </tr>
      @endforeach
      @else
      <p>{{ __('commons.noReviewsFound')}}</p>
      @endif
  </tbody>
</table>
{{ $viewData["reviews"]->render('pagination::bootstrap-4') }}
@endsection