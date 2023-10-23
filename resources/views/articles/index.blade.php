@extends('articles.welcome')
@section('content')
  
<link href="{{ asset('ArticleCss/ArticleFront.css') }}" rel="stylesheet">



<form id="filter-form" method="GET">
    <div class="form-row">
        <div class="col-md-4">
            <label for="categorie">Catégorie :</label>
            <select name="categorie" id="categorie" class="form-control">
                <option value="Toutes les catégories">Toutes les catégories</option>
                @foreach($categories as $categorie)
                    <option value="{{ $categorie->id }}">{{ $categorie->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-4">
            <label for="sort_by">Trier par date :</label>
            <select name="sort_by" id="sort_by" class="form-control">
                <option value="Tous les articles">Tous les articles</option>
                <option value="latest">Les plus récents en premier</option>
                <option value="oldest">Les plus anciens en premier</option>
            </select>
        </div>
    </div>
    <div>
        <button type="submit" class="btn btn-primary" id="filter-button">Filtrer</button>
    </div>
</form>




<!-- liste article -->
<div id="container">
    <h1 id="article-list-title">Liste d'Articles</h1>
    <div id="articles-list">
      @if (count($articles) > 0)
        @foreach($articles as $article)
            <div class="article">
                @if ($article->image)
                <img src="{{ asset('storage/images/' . $article->image) }}" alt="Article Image" id="article-image">
                @endif
                <div class="article-content">
                    <h2 class="article-title">{{ $article->titre }}</h2>
                    <div class="article-container">
                    <p class="article-description">
                    {{substr($article->contenu, 0, 5)}} 
                    </p>
                    <p class="article-description-full">
                    {{$article->contenu}}
                    </p>
                    <a href="#" class="read-more-link">Voir plus</a>
                    <a href="#" class="read-less-link" style="display: none;">Voir moins</a>
                    </div>    
                    <p class="article-meta">
                        <small>Publié le {{ $article->datePublication }} par {{ $article->auteur }}</small>
                    </p>
                </div>
                <div class="article-actions">
                <div class="likes-count">
                   <span class="likes-count-number">{{ $article->like_count }}</span>
                   <i class="fa fa-thumbs-up blue-icon"></i>
                </div>
 
                <form method="post" action="{{ route('article.like', ['article' => $article]) }}">
                            @csrf
                            <button type="submit" class="btn btn-like">
                                <i class="fa fa-thumbs-up"></i> Like
                            </button>
                </form>
                <form method="post" action="{{ route('article.dislike', ['article' => $article]) }}">
                            @csrf
                            <button type="submit" class="btn btn-dislike">
                                <i class="fa fa-thumbs-down"></i> Dislike
                            </button>
                </form>
                </div>
            </div>
        @endforeach
        @else
        <div class="col-md-12">
            <p>Aucun article n'a été trouvé!</p>
        </div>
        @endif
    </div>
    <!-- Pagination links -->
    <div class="pagination">
        {{ $articles->onEachSide(1)->links('pagination::bootstrap-4', ['class' => 'custom-pagination']) }}
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    

<script>
    document.getElementById('filter-button').addEventListener('click', function (e) {
        e.preventDefault();
        document.getElementById('filter-form').submit();
    });
</script>

<script>
    document.querySelectorAll('.read-more-link').forEach(function (readMoreLink) {
    readMoreLink.addEventListener("click", function (e) {
        e.preventDefault();
        const articleContainer = e.target.closest('.article-container');
        const articleDescription = articleContainer.querySelector('.article-description');
        const articleDescriptionFull = articleContainer.querySelector('.article-description-full');
        const readMoreLink = articleContainer.querySelector('.read-more-link');
        const readLessLink = articleContainer.querySelector('.read-less-link');
        
        articleDescription.style.display = "none";
        articleDescriptionFull.style.display = "block";
        readMoreLink.style.display = "none";
        readLessLink.style.display = "inline";
    });
});

    document.querySelectorAll('.read-less-link').forEach(function (readLessLink) {
    readLessLink.addEventListener("click", function (e) {
        e.preventDefault();
        const articleContainer = e.target.closest('.article-container');
        const articleDescription = articleContainer.querySelector('.article-description');
        const articleDescriptionFull = articleContainer.querySelector('.article-description-full');
        const readMoreLink = articleContainer.querySelector('.read-more-link');
        const readLessLink = articleContainer.querySelector('.read-less-link');
        
        articleDescription.style.display = "block";
        articleDescriptionFull.style.display = "none";
        readMoreLink.style.display = "inline";
        readLessLink.style.display = "none";
    });
});

</script>

<!-- liste article -->



@endsection