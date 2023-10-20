@extends('stores.layout')
@section('content')
    <div class="container">
        <h1>Promotions</h1>
        <a href="{{ route('promotions.create') }}" class="btn btn-primary mb-3">Create Promotion</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Percentage</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($promotions as $promotion)
                    <tr>
                        <td>{{ $promotion->name }}</td>
                        <td>{{ $promotion->code_percentage }}</td>
                        <td>{{ $promotion->start_date}}</td>
                        <td>{{ $promotion->end_date}}</td>
                        <td>
                            <a href="{{ route('promotions.show', $promotion->id) }}" class="btn btn-sm btn-info">View</a>
                            <a href="{{ route('promotions.edit', $promotion->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('promotions.destroy', $promotion->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this promotion?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
