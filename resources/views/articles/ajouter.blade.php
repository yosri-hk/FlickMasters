@extends('articles.layout')
@section('content')


  <!-- ajouter article -->
  <div id="ajouterContent">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <h1 class="text-center">Formulaire d'Ajout d'Article</h1>
                <hr>
                @if (session("status"))
                <div class="alert alert-success">
                  {{session("status")}}
                </div>
                @endif


                <form action="/ajouterArticle/traitement" method="POST" enctype="multipart/form-data">
                  @csrf
                    <div class="mb-3">
                        <label for="titre" class="form-label">Titre de l'article</label>
                        <input type="text" class="form-control" id="titre" name="titre" required>
                        @error('titre')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="contenu" class="form-label">Contenu de l'article</label>
                        <textarea class="form-control" id="contenu" name="contenu" required></textarea>
                        @error('contenu')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="datePublication" class="form-label">Date de publication</label>
                        <input type="date" class="form-control" id="datePublication" name="datePublication" required>
                        @error('datePublication')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="auteur" class="form-label">Auteur de l'article</label>
                        <input type="text" class="form-control" id="auteur" name="auteur" required>
                        @error('auteur')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Image de l'article</label>
                        <input type="file" class="form-control" id="image" name="image" required>
                        @error('image')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="categories" class="form-label">Catégories de l'article</label>
                        @foreach($categories as $categorie)
                        <div class="form-check">
                           <input class="form-check-input" type="checkbox" id="categorie-{{ $categorie->id }}" name="categories[]" value="{{ $categorie->id }}">
                           <label class="form-check-label" for="categorie-{{ $categorie->id }}">
                                {{ $categorie->name }}
                           </label>
                        </div>
                        @endforeach
                    </div>

                    <button type="submit" class="btn btn-primary" style="margin-right:20px">Ajouter</button>
                    <a class="btn btn-warning" href="/articles">Revenir à la liste d'articles</a>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </div>
    <!-- ajouter article -->
  @endsection
