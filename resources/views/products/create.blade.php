@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('New product') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form action="{{ route('product.store') }}" method="post">

                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="title">{{ __('Title') }}</label>
                                <input class="form-control" type="text" name="title" id="title" value="{{ old('title') }}">
                                @if($errors->has('title'))
                                    <div class="alert-danger">{{$errors->first('title')}}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="price">{{ __('Price') }}</label>
                                <input class="form-control" type="number" name="price" id="price" value="{{ old('price') }}">
                                @if($errors->has('price'))
                                    <div class="alert-danger">{{$errors->first('price')}}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <input class="btn btn-success" type="submit" value="{{ __('Save') }}">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
