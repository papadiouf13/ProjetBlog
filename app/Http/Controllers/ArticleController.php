<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view("article.create");
    }

    public function list()
    {
        //
        $articles = Article::all();
        return view("article.liste", compact('articles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'titre' => 'required',
            'contenu' => 'required',
        ]);
        $article = new Article();
        $article->titre = $request->titre;
        $article->contenu = $request->contenu;
        $article->categorie = $request->categorie;
        $article->save();

        return redirect()->route('index')->with('status','article enregistré avec success');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
        $article = Article::find($id);
        return view('article.edit', compact('article')); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    public function modifier(Request $request)
    {
        //
        $request->validate([
            'titre' => 'required',
            'contenu' => 'required',
        ]);
        $article = Article::find($request->id);
        $article->titre = $request->titre;
        $article->contenu = $request->contenu;
        $article->categorie = $request->categorie;
        $article->update();

        return redirect()->route('edit', $request->id)->with('status','article modifié avec success');

    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
