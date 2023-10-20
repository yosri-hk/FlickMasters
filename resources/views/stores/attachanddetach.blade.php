@extends('stores.layout')

@section('content')
    <div class="container">
        <h1>Attach and Detach Promotions</h1>

        <form action="{{ route('stores.attach-promotion', ['store' => $store->id]) }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="promotion">Promotion:</label>
                <select name="promotion_id" id="promotion" class="form-control">
                    @if (!is_null($promotions) && count($promotions) > 0)
                        @foreach ($promotions as $promo)
                            <option value="{{ $promo->id }}">{{ $promo->name }}</option>
                        @endforeach
                    @else
                        <option value="">No promotions available</option>
                    @endif
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Attach Promotion</button>
        </form>

        <hr>

        <h2>Attached Promotions</h2>

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
                @if (!is_null($store->promotions) && count($store->promotions) > 0)
                    @foreach ($store->promotions as $attachedPromo)
                        <tr>
                            <td>{{ $attachedPromo->name }}</td>
                            <td>{{ $attachedPromo->code_percentage }}</td>
                            <td>{{ $attachedPromo->start_date }}</td>
                            <td>{{ $attachedPromo->end_date }}</td>
                            <td>
                                <form action="{{ route('stores.detach-promotion', ['store' => $store->id, 'promotion' => $attachedPromo->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Detach Promotion</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="3">No promotions attached to this store.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
@endsection
