<!-- resources/views/animes/show.blade.php -->
@extends('layouts.jhonson')
@include('layouts.navigation')
@section('content')

<style>
    img {
  display: block;
  margin: 0 auto;
}

</style>
    <div class="container text-center">
        <h1>{{ $anime->nome }}</h1>
        <img src="{{ asset('storage/' . $anime->imagem) }}" alt="{{ $anime->nome }}" width="300" height="300">
        <p>Número de episódios: {{ $anime->episodios }}</p>
        <p>Status: {{ $anime->status }}</p>
        <p>Estreia: {{ $anime->estreia }}</p>
        <p>Músicas do anime:</p>
        <ul>{{$anime->musicas}}</ul>
    </div>

@section('content')