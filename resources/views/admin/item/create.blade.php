@extends('layouts.adminApp')
@section('title', __('admin.itemTitle'))
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{__('admin.createItem')}}</div>
                        <div class="card-body">
                            @if ($errors->any())
                                <ul id="errors" class="alert alert-danger list-unstyled">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            @endif
                            @if(session('success'))
                                <div class="alert alert-success">
                                    {{session('success')}}
                                </div>
                            @endif
                            <form method="POST" enctype="multipart/form-data" action="{{ route('admin.item.save') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="title">{{ __('commons.title') }}</label>
                                    <input type="text" class="form-control" id="title" placeholder="{{ __('commons.placeholder', ['att' => __('commons.title')]) }}" name="title"
                                        value="{{ old('title') }}" />
                                </div>
                                <div class="form-group">
                                    <label for="type">{{ __('commons.type') }}</label>
                                    <select class="form-control" id="type" name="type" value="{{ old('type') }}">
                                        <option value="head">{{__('commons.head')}}</option>
                                        <option value="chest">{{__('commons.chest')}}</option>
                                        <option value="legs">{{__('commons.legs')}}</option>
                                        <option value="box">{{__('commons.box')}}</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="price">{{ __('commons.price') }}</label>
                                    <input type="number" class="form-control" id="price" placeholder="{{__('commons.placeholder', ['att' => __('commons.price')])}}" name="price"
                                        value="{{ old('price') }}" />
                                </div>
                                <div class="form-group">
                                    <label for="guide">{{ __('commons.guide') }}</label>
                                    <input type="text" class="form-control" id="guide" placeholder="{{__('commons.placeholder', ['att' => __('commons.guide')])}}" name="guide"
                                        value="{{ old('guide') }}" />
                                </div>
                                <div class="form-group">
                                    <label for="pieces">{{ __('commons.pieces') }}</label>
                                    <input type="number" class="form-control" id="pieces" placeholder="{{__('commons.placeholder', ['att' => __('commons.pieces')])}}" name="pieces"
                                        value="{{ old('pieces') }}" />
                                </div>
                                <div class="form-group">
                                    <label for="stock">{{ __('commons.stock') }}</label>
                                    <input type="number" class="form-control" id="stock" placeholder="{{__('commons.placeholder', ['att' => __('commons.stock')])}}" name="stock"
                                        value="{{ old('stock') }}" />
                                </div>
                                <div class="form-group">
                                    <label for="image">{{ __('commons.image') }}</label>
                                    <input type="file" class="form-control-file" id="image" name="image" />
                                    <img class="img-fluid rounded mt-3" src="{{ URL::asset('storage/test.png') }}" />
                                </div>
                                <button type="submit" class="btn btn-primary">{{__('actions.send')}}</button>
                            </form> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
