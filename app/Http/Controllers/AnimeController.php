<?php

namespace App\Http\Controllers;

use App\Models\Anime;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class AnimeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $animes = Anime::all();
        /* Exemplo para paginação
            $animes = Anime::paginate();
            na view {{ $animes->links() }}
        */
        return view('animes.index', compact('animes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('animes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->only(['nome','episodios','status','estreia','musicas']);

        if ($request->hasFile('imagem')) {
            $imagem = $request->file('imagem');
            $caminhoImagem = $imagem->store('public/images');
            $data['imagem'] = str_replace('public/', '', $caminhoImagem);
        }

    
        Anime::create($data);

        return redirect()->route('animes.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Anime $anime)
    {
        //
        $anime = Anime::findOrFail($anime->id);
        return view('animes.show', compact('anime'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Anime $anime)
    {
        //
        return view('animes.edit', compact('anime'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Anime $anime)
    {
        //
        
        $data = $request->only(['nome','episodios','status','estreia','musicas']);

        if ($request->hasFile('imagem')) {
            $imagem = $request->file('imagem');
            $caminhoImagem = $imagem->store('public/images');
            $data['imagem'] = str_replace('public/', '', $caminhoImagem);
        }

        $anime->update($data);

        return redirect()->route('animes.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $anime = Anime::findOrFail($id);
        $anime->delete();

        return redirect()->route('animes.index');
    }
}
