@extends('stores.layout')
@section('content')
<!-- bootstrap mta3i -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<!-- bootstrap mta3i -->  
  <link href="{{ asset('ArticleCss/Ajout.css') }}" rel="stylesheet">
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0"></h1>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
<section class="content">
  <div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <!-- ajouter article -->
        <div id="ajouterContent">
        <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <h1 class="text-center">Add Store</h1>
            <hr>
            @if (session("status"))
            <div class="alert alert-success">
              {{session("status")}}
            </div>
            @endif


            <div>
    @if($errors->any())
    <ul>
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
           </ul>
           @endif
           </div>
              <form method="POST" action="{{ route('stores.store') }}">
                @csrf
  
               
               
                <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" name="name" class="form-control" required>
                </div>
  
                <div class="form-group">
                  <label for="description">Description</label>
                  <input type="text" name="description" class="form-control" required>
                </div>

                <div class="form-group">
                  <button type="submit" class="btn btn-primary">Create Store</button>
                </div>
              </form>
            </div>
          </div>
      </div>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
              </div>
              <!-- ajouter article -->
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
</div>
@endsection