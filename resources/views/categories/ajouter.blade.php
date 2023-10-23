@extends('articles.layout')
@section('content')

<!-- ajouter categorie -->
  <div id="ajouterContent">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <h1 class="text-center">Formulaire d'Ajout de Categorie</h1>
                <hr>
                @if (session("status"))
                <div class="alert alert-success">
                  {{session("status")}}
                </div>
                @endif


                <form action="/ajouterCategorie/traitement" method="POST">
                  @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nom de la categorie</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                        @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description de la categorie</label>
                        <textarea class="form-control" id="description" name="description" required></textarea>
                        @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary" style="margin-right:20px">Ajouter</button>
                    <a class="btn btn-warning" href="/categories">Revenir à la liste de categories</a>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</div>

<!-- ajouter categorie -->

@endsection
