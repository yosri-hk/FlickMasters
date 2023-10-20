@extends('stores.layout')
@section('content')

<section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <!-- store Listing -->
        <div class="container">
          <h1>Store List</h1>
          <div class="d-flex justify-content-end">
            <a class="btn btn-info" href="{{ route('stores.create') }}">Create store</a>
          </div>
          <hr>
          @if (session("status"))
          <div class="alert alert-success">
            {{session("status")}}
          </div>
          @endif
          <table class="table">
            <thead>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach($stores as $store)
              <tr>
                <td>{{ $store->id }}</td>
                <td>{{ $store->name }}</td>
                <td>{{ $store->description }}</td>
                <td>
                  <div class="btn-group">
                    
                    <a href="{{ route('stores.edit', $store->id) }}" class="btn btn-primary">Edit</a>
                    <form method="POST" action="{{ route('stores.destroy', $store->id) }}" style="display: inline;">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this store?')">Delete</button>
                    </form>
                  </div>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <!-- store Listing -->
      </div>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        
        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        <!-- right col -->
      </div>
      <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
  </section>
  
@endsection