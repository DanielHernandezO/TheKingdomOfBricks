@extends('layouts.adminApp')
@section('title', __('admin.reviewTitle'))
@section('content')

<!-- Filter form -->
<form action="{{ route('admin.user.index') }}" method="GET">
  <div class="container">
    <div class="row">
      <div class="col-sm">
        <label class="text-light" for="id">{{ __('commons.id') }}</label>
        <input type="number" name="id" id="id" class="form-control" value="{{ $viewData['id'] }}" min="1">
      </div>
      <div class="col-sm mt-3">
        <button type="submit" class="btn btn-primary mt-2">{{ __('commons.filter') }}</button>
      </div>
    </div>
  </div>
</form>

<!-- Show reviews-->
<table class="table table-light mt-3">
  <thead class="table-light">
    <tr>
      <th scope="col">{{ __('commons.id') }}</th>
      <th scope="col">{{ __('commons.name') }}</th>
      <th scope="col">{{ __('commons.email') }}</th>
      <th scope="col">{{ __('commons.role') }}</th>
      <th scope="col">{{ __('actions.delete') }}</th>
    </tr>
  </thead>
  <tbody>
      @if(count($viewData["users"]) > 0)
      @foreach ($viewData["users"] as $user)
      <tr>
        <td>{{ $user->getId() }}</td>
        <td>{{ $user->getName() }}</td>
        <td>{{ $user->getEmail() }}</td>
        <td>{{ $user->getRole() }}</td>
        <td>
          <form method="POST" action="{{ route('admin.user.delete', ['id'=> $user->getId()]) }}">
            @csrf
            @method("DELETE")
            <div class="form-group mt-2">
                <input type="submit" class="btn btn-danger" value={{__('actions.delete')}}>
            </div>
          </form>
        </td>
      </tr>
      @endforeach
      @else
      <p class="mt-2 text-danger">{{ __('admin.noUsersFound')}}</p>
      @endif
  </tbody>
</table>
<div class="d-flex justify-content-center">
  {{ $viewData["users"]->render('pagination::bootstrap-4') }}
</div>
@endsection