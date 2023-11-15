@extends('layouts.base')
@section('title')
    Ajouter un article
@endsection

@section('contenu')
    <h1>@yield('title')</h1>

    <form action="{{ route('article.store') }}" method="POST">
        @csrf
        @if (session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif
        @if ($errors)
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger">{{ $error }}</div>
            @endforeach
        @endif
        <div class="mb-3">
            <label for="titre" class="form-label">Titre</label>
            <input type="text" class="form-control" id="titre" name="titre" value="{{ old('titre') }}" placeholder="Donnez un titre">
        </div>
        <div class="mb-3">
            <label for="categorie" class="form-label">Categorie</label>
            <input type="text" class="form-control" id="categorie" value="{{ old('categorie') }}" name="categorie"  placeholder="Donnez une categorie">
        </div>
        <div class="mb-3">
            <label for="contenu" class="form-label">Contenu</label>
            <textarea class="form-control" id="contenu" name="contenu" rows="3">{{ old('contenu') }}</textarea>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-outline-dark">Ajouter un article</button>
        </div>
    </form>
@endsection
