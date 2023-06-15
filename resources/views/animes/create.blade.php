<!-- resources/views/animes/create.blade.php -->
@extends('layouts.jhonson')
@include('layouts.navigation')


@section('content')
    
<h1>Novo Anime</h1>

<form action="{{ route('animes.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="nome">Nome:</label>
    <input type="text" name="nome" id="nome" required>
    
    <label for="imagem">Imagem:</label>
    <input type="file" name="imagem" id="imagem">
    
    <label for="episodios">Número de Episódios:</label>
    <input type="number" name="episodios" id="episodios" required>
    
    <label for="status">Status:</label>
    <input type="text" name="status" id="status" required>
    
    <label for="estreia">Estreia:</label>
    <input type="text" name="estreia" id="estreia" required>
    
    <label for="musicas">Músicas:</label>
    <textarea name="musicas" id="musicas" required></textarea>
    
    <button type="submit">Salvar</button>
</form>
    
@endsection