@extends('articles.layout')
@section('content')

<!-- liste categorie -->
<div class="container" id="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <h1 class="text-center">Liste de categories</h1>
            <hr>
            <div class="d-flex justify-content-center">
                <a href="/ajouterCategorie" class="btn btn-info" id="btn">Ajouter une categorie</a>
            </div>
            <hr>
            @if (session("status"))
            <div class="alert alert-success">
                {{ session("status") }}
            </div>
            @endif
            <table class="table">
            <thead>
              <tr>
                <th>Nom</th>
                <th>Description</th>
                <th>Operations</th>
              </tr>
            </thead>
            <tbody>
              @foreach($categories as $categorie)
              <tr>
                <td>{{ $categorie->name }}</td>
                <td>{{ $categorie->description }}</td>
                <td>
                  <div class="btn-group">
                    <a href="{{ route('categorie.edit', ['categorie' => $categorie]) }}" class="btn btn-info" id="btn-up">Modifier</a>
                    <form method="post" action="{{ route('categorie.delete', ['categorie' => $categorie]) }}">
                    @csrf
                    @method("delete")
                    <input type="submit" value="Supprimer" class="btn btn-danger">
                    </form>
                  </div>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>

            <!-- Pagination links -->
            <div class="d-flex justify-content-center">
                {{ $categories->onEachSide(1)->links('pagination::bootstrap-4', ['class' => 'custom-pagination']) }}
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

<!-- liste categorie -->

@endsection

