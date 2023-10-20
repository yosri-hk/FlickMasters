@extends('stores.layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit Promotion') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('promotions.update', $promotion->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group row">
                                <label for="code_percentage" class="col-md-4 col-form-label text-md-right">{{ __('Code Percentage') }}</label>

                                <div class="col-md-6">
                                    <input id="code_percentage" type="text" class="form-control @error('code_percentage') is-invalid @enderror" name="code_percentage" value="{{ old('code_percentage', $promotion->code_percentage) }}" required autocomplete="code_percentage" autofocus>

                                    @error('code_percentage')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="start_date" class="col-md-4 col-form-label text-md-right">{{ __('Start Date') }}</label>

                                <div class="col-md-6">
                                    <input id="start_date" type="date" class="form-control @error('start_date') is-invalid @enderror" name="start_date" value="{{ old('start_date', $promotion->start_date) }}" required autocomplete="start_date">

                                    @error('start_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="end_date" class="col-md-4 col-form-label text-md-right">{{ __('End Date') }}</label>

                                <div class="col-md-6">
                                    <input id="end_date" type="date" class="form-control @error('end_date') is-invalid @enderror" name="end_date" value="{{ old('end_date', $promotion->end_date) }}" required autocomplete="end_date">

                                    @error('end_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4 d-flex">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Update') }}
                                    </button>
                                    <a href="{{ route('promotions.index') }}" class="btn btn-secondary ml-auto">{{ __('Back to Promotions List') }}</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
