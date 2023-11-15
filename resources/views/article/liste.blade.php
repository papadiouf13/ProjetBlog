@extends('layouts.base')
@section('title')
    Liste des articles
@endsection

@section('contenu')
    <h1>@yield('title')</h1>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Titre</th>
                <th scope="col">Categorie</th>
                <th scope="col">Contenu</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($articles as $article)
                <tr>
                    <th scope="row">{{ $article->id }}</th>
                    <td>{{ $article->titre }}</td>
                    <td>{{ $article->categorie }}</td>
                    <td>{{ $article->contenu }}</td>
                    <td>
                        <a href="{{ route('edit', $article->id) }}" class="btn btn-info">Modifier</a>
                        <a href="#" class="btn btn-danger">Supprimer</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
