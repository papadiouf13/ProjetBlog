@extends('layouts.base')
@section('title')
    Modifier un article
@endsection

@section('contenu')
    <h1>@yield('title')</h1>

    <form action="{{ route('modifier') }}" method="POST">
        @csrf
        @if (session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif
        @if ($errors)
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger">{{ $error }}</div>
            @endforeach
        @endif
        <input type="hidden" name="id" value="{{ $article->id }}">
        <div class="mb-3">
            <label for="titre" class="form-label">Titre</label>
            <input type="text" class="form-control" id="titre" name="titre" value="{{ $article['titre'] }}" placeholder="Donnez un titre">
        </div>
        <div class="mb-3">
            <label for="categorie" class="form-label">Categorie</label>
            <input type="text" class="form-control" id="categorie" value="{{ $article['categorie'] }}" name="categorie"  placeholder="Donnez une categorie">
        </div>
        <div class="mb-3">
            <label for="contenu" class="form-label">Contenu</label>
            <textarea class="form-control" id="contenu" name="contenu" rows="3">{{ $article['contenu'] }}</textarea>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-outline-dark">Modifier l'article</button>
        </div>
    </form>
@endsection
