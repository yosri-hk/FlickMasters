@extends('articles.layout')
@section('content')

<!-- liste article -->
<div class="container" id="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <h1 class="text-center">Liste d'Articles</h1>
            <hr>
            <div class="d-flex justify-content-center">
                <a href="/ajouterArticle" class="btn btn-info" id="btn">Ajouter un article</a>
            </div>
            <hr>
            @if (session("status"))
            <div class="alert alert-success">
                {{ session("status") }}
            </div>
            @endif
            <div class="row">
              @if (count($articles) > 0)
                @foreach($articles as $article)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            @if ($article->image)
                            <img src="{{ asset('storage/images/' . $article->image) }}" alt="Article Image" width="100" height="100">
                            @endif
                            <div class="card-body">
                                <div class="d-flex justify-content-end">
                                    <a href="{{ route('article.details', ['id' => $article->id]) }}" class="btn btn-primary" id="details-button">
                                        Détails
                                        <svg aria-hidden="true" fill="none" focusable="false" height="20" viewBox="0 0 20 20" width="20" id="cds-react-aria-30" class="css-0"><path fill-rule="evenodd" clip-rule="evenodd" d="M16.793 9.5L9.646 2.354l.708-.708L18.707 10l-8.353 8.354-.708-.707 7.147-7.147H2v-1h14.793z" fill="currentColor"></path></svg>
                                    </a>
                                </div>
                                <h5 class="card-text">Titre: {{ $article->titre }}</h5>
                                <p class="card-text">Contenu: {{ $article->contenu }}</p>
                                <p class="card-text"><small class="text-muted">datePublication: {{ $article->datePublication }}</small></p>
                                <p class="card-text"><small class="text-muted">Auteur: {{ $article->auteur }}</small></p>
                            </div>
                            <div class="card-footer">
                                <div class="btn-group" role="group" aria-label="Actions">
                                    <a href="{{ route('article.edit', ['article' => $article]) }}" class="btn btn-primary" id="btn">Modifier</a>
                                    <form method="post" action="{{ route('article.delete', ['article' => $article]) }}">
                                        @csrf
                                        @method("delete")
                                        <input type="submit" value="Supprimer" class="btn btn-danger" id="btn">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                @else
                <div class="col-md-12">
                    <p>Aucun article n'a été trouvé.</p>
                </div>
                @endif
            </div>

            <!-- Pagination links -->
            <div class="d-flex justify-content-center">
                {{ $articles->onEachSide(1)->links('pagination::bootstrap-4', ['class' => 'custom-pagination']) }}
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <!-- <script>
        const articleMore = document.getElementById("article-more");
        const readMoreLink = document.getElementById("read-more-link");

        readMoreLink.addEventListener("click", function (e) {
            e.preventDefault();
            if (articleMore.style.display === "none") {
                articleMore.style.display = "inline";
                readMoreLink.textContent = "Voir moins";
            } else {
                articleMore.style.display = "none";
                readMoreLink.textContent = "Voir plus";
            }
        });
    </script> -->
    <!-- liste article -->

@endsection

