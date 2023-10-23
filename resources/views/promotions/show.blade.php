@extends('stores.layout')

@section('content')
    <div class="container">
        <h1>Promotion Details</h1>
        <p><strong>Code Percentage:</strong> {{ $promotion->code_percentage }}</p>
        <p><strong>Start Date:</strong> {{ $promotion->start_date }}</p>
        <p><strong>End Date:</strong> {{ $promotion->end_date }}</p>
    </div>
    <a href="{{ route('promotions.index') }}" class="btn btn-primary">Back</a>
@endsection

