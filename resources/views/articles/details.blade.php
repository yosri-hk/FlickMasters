@extends('articles.layout')
@section('content')

<!-- details article -->
<div class="container" id="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <h1 class="text-center">Details d'Article</h1>
            <hr>
            <div class="row">
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            @if ($article->image)
                            <img src="{{ asset('storage/images/' . $article->image) }}" alt="Article Image" width="100" height="100">
                            @endif
                            <div class="card-body">
                                <h5 class="card-text">{{ $article->titre }}</h5>
                                <p class="card-text">{{ $article->contenu }}</p>
                                <p class="card-text"><small class="text-muted">{{ $article->datePublication }}</small></p>
                                <p class="card-text"><small class="text-muted">Auteur: {{ $article->auteur }}</small></p>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    
<!-- details article -->

@endsection

