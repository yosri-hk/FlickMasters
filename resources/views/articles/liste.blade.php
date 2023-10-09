@extends('articles.layout')
@section('content')

    <!-- liste article -->
        <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <h1 class="text-center">Liste d'Articles</h1>
                <hr>
                <div class="d-flex justify-content-center">
                    <a href="/ajouterArticle" class="btn btn-info">Ajouter un article</a>
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
                            <th class="text-center">Titre de l'article</th>
                            <th class="text-center">Contenu de l'article</th>
                            <th class="text-center">Date de publication</th>
                            <th class="text-center">Auteur de l'article</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($articles as $article)
                        <tr class="article-row">
                            <td class="text-center">{{$article->titre}}</td>
                            <td class="text-center">
                                {{$article->contenu}}
                            </td>
                            <td class="text-center">{{$article->datePublication}}</td>
                            <td class="text-center">{{$article->auteur}}</td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <a href="{{route('article.edit',['article'=>$article])}}" class="btn btn-primary" style="margin-right: 5px">Modifier</a>
                                    <form method="post" action="{{route('article.delete',['article'=>$article])}}">
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

