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
                            <form method="POST" action="{{ route('admin.item.save') }}">
                                @csrf
                                <input type="text" class="form-control mb-2" placeholder="{{ __('commons.placeholder', ['att' => __('commons.title')]) }}" name="title"
                                    value="{{ old('title') }}" />
                                <select class="form-control mb-2" placeholder="{{__('commons.placeholder', ['att' => __('commons.type')])}}" name="type"
                                    value="{{ old('type') }}" selected>
                                    <option value="head">{{__('commons.head')}}</option>
                                    <option value="chest">{{__('commons.chest')}}</option>
                                    <option value="legs">{{__('commons.legs')}}</option>
                                    <option value="box">{{__('commons.box')}}</option>
                                </select>
                                <input type="number" class="form-control mb-2" placeholder="{{__('commons.placeholder', ['att' => __('commons.price')])}}" name="price"
                                    value="{{ old('price') }}" />
                                <input type="text" class="form-control mb-2" placeholder="{{__('commons.placeholder', ['att' => __('commons.guide')])}}" name="guide"
                                    value="{{ old('guide') }}" />
                                <input type="number" class="form-control mb-2" placeholder="{{__('commons.placeholder', ['att' => __('commons.pieces')])}}" name="pieces"
                                    value="{{ old('pieces') }}" />
                                <input type="number" class="form-control mb-2" placeholder="{{__('commons.placeholder', ['att' => __('commons.stock')])}}" name="stock"
                                    value="{{ old('stock') }}" />
                                <input type="submit" class="btn btn-primary" value={{__('actions.send')}} />
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
