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
                                    <label for="title">{{ __('commons.inputLabel', ['att' => __('commons.title')]) }}</label>
                                    <input type="text" class="form-control" id="title" placeholder="{{ __('commons.placeholder', ['att' => __('commons.title')]) }}" name="title"
                                        value="{{ old('title') }}" />
                                </div>
                                <div class="form-group">
                                    <label for="type">{{ __('commons.inputLabel', ['att' => __('commons.type')]) }}</label>
                                    <select class="form-control" id="type" name="type" value="{{ old('type') }}">
                                        <option value="head">{{__('commons.head')}}</option>
                                        <option value="chest">{{__('commons.chest')}}</option>
                                        <option value="legs">{{__('commons.legs')}}</option>
                                        <option value="box">{{__('commons.box')}}</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="price">{{ __('commons.inputLabel', ['att' => __('commons.price')]) }}</label>
                                    <input type="number" class="form-control" id="price" placeholder="{{__('commons.placeholder', ['att' => __('commons.price')])}}" name="price"
                                        value="{{ old('price') }}" />
                                </div>
                                <div class="form-group">
                                    <label for="guide">{{ __('commons.inputLabel', ['att' => __('commons.guide')]) }}</label>
                                    <input type="text" class="form-control" id="guide" placeholder="{{__('commons.placeholder', ['att' => __('commons.guide')])}}" name="guide"
                                        value="{{ old('guide') }}" />
                                </div>
                                <div class="form-group">
                                    <label for="pieces">{{ __('commons.inputLabel', ['att' => __('commons.pieces')]) }}</label>
                                    <input type="number" class="form-control" id="pieces" placeholder="{{__('commons.placeholder', ['att' => __('commons.pieces')])}}" name="pieces"
                                        value="{{ old('pieces') }}" />
                                </div>
                                <div class="form-group">
                                    <label for="stock">{{ __('commons.inputLabel', ['att' => __('commons.stock')]) }}</label>
                                    <input type="number" class="form-control" id="stock" placeholder="{{__('commons.placeholder', ['att' => __('commons.stock')])}}" name="stock"
                                        value="{{ old('stock') }}" />
                                </div>
                                <span> {{ __('commons.inputLabel', ['att' => __('commons.image')]) }} </span>
                                <div class="form-group mb-2">
                                    <label class="form-control"> {{__('commons.enterImage')}}
                                        <input type="file" class="invisible" id="image" name="image">
                                    </label>
                                </div>
                                <button type="submit" class="btn btn-primary">{{__('commons.send')}}</button>
                            </form> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
