<!-- resources/views/animes/edit.blade.php -->
@extends('layouts.jhonson')
@include('layouts.navigation')

@section('content')

<h1>Editar Anime</h1>

<form action="{{ route('animes.update', $anime->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <label for="nome">Nome:</label>
    <input type="text" name="nome" id="nome" value="{{ $anime->nome }}" required>

    <label for="imagem">Imagem:</label>
    <input type="file" name="imagem" id="imagem" value="{{ $anime->imagem }}">

    <label for="episodios">Número de Episódios:</label>
    <input type="number" name="episodios" id="episodios" value="{{ $anime->episodios }}" required>

    <label for="status">Status:</label>
    <input type="text" name="status" id="status" value="{{ $anime->status }}" required>

    <label for="estreia">Estreia:</label>
    <input type="text" name="estreia" id="estreia" value="{{ $anime->estreia }}" required>

    <label for="musicas">Músicas:</label>
    <textarea name="musicas" id="musicas" required>{{ $anime->musicas }}</textarea>

    <button type="submit">Salvar</button>
</form>

@endsection