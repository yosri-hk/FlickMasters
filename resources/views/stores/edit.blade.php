@extends('stores.layout')
@section('content')

<section class="content">
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="panel panel-default">
            <div class="panel-heading"><h1>Edit Store</h1></div>
  
            <div class="panel-body">
              <form method="POST" action="{{ route('stores.update', $store->id) }}">
                @csrf
                @method('PUT')
  
               
  
  
                <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" name="name" class="form-control" value="{{ old('name', $store->name) }}" required>
                </div>
  
               
                <div class="form-group">
                  <label for="description">Description</label>
                  <input type="text" name="description" class="form-control" value="{{ old('description', $store->description) }}" required>
                </div>

               
  
  
                <div class="form-group">
                  <button type="submit" class="btn btn-primary">Update Store</button>
                </div>
              </form>
              <a href="{{ route('stores.index') }}" class="btn btn-secondary">Back to Stores</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  
@endsection