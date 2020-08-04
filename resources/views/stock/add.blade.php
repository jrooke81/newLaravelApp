@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add Book') }}</div>
                @if(Session::has('success'))
                <div class="alert alert-info">{{Session::get('success')}}</div>
                @endif
                <div class="card-body">
                    <form method="POST" action="{{route('add_submit')}}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="book_title" class="col-md-4 col-form-label text-md-right">{{ __('Book Title') }}</label>

                            <div class="col-md-6">
                                <input id="book_title" type="text" class="form-control @error('book_title') is-invalid @enderror" name="book_title" value="{{ old('book_title') }}" required autofocus>

                                @error('book_title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="author" class="col-md-4 col-form-label text-md-right">{{ __('Author') }}</label>

                            <div class="col-md-6">
                                <input id="author" type="text" class="form-control @error('author') is-invalid @enderror" name="author" value="{{ old('author') }}" required>

                                @error('author')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="publication_year" class="col-md-4 col-form-label text-md-right">{{ __('Publication Year') }}</label>

                            <div class="col-md-6">
                                <input id="publication_year" type="text" class="form-control @error('publication_year') is-invalid @enderror" name="publication_year" value="{{ old('publication_year') }}" required>

                                @error('publication_year')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="stock_quantity" class="col-md-4 col-form-label text-md-right">{{ __('Stock Quantity') }}</label>

                            <div class="col-md-6">
                                <input id="stock_quantity" type="number" min="0" max="32766" class="form-control @error('stock_quantity') is-invalid @enderror" name="stock_quantity" value="{{ old('stock_quantity') }}" required>

                                @error('stock_quantity')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Price') }}</label>
                            <div class="input-group col-md-6">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">£</span>
                                </div>
                                <input id="price" type="number" class="form-control currency @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" placeholder="0.00" step="0.01" data-number-to-fixed="2" required>

                                @error('price')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="catagories" class="col-md-4 col-form-label text-md-right">{{ __('Catagories') }}</label>
                            <div class="input-group col-md-6">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="computing_checkbox" name="computing_checkbox" value="1">
                                    <label class="form-check-label" for="computing_checkbox">{{__('Computing')}}</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="business_checkbox" name="business_checkbox" value="2">
                                    <label class="form-check-label" for="business_checkbox">{{__('Business')}}</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="languages_checkbox" name="languages_checkbox" value="3">
                                    <label class="form-check-label" for="languages_checkbox">{{__('Languages')}}</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="book_cover" class="col-md-4 col-form-label text-md-right">{{ __('Book Cover Image') }}</label>
                            <div class="input-group col-md-6">
                                <input id="book_cover" type="file" name="book_cover">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary w-100">
                                    {{ __('Add book') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection