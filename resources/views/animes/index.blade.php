<!-- resources/views/animes/index.blade.php -->
@extends('layouts.jhonson')
@include('layouts.navigation')

@section('content')

<h1>Animes</h1>

<a href="{{ route('animes.create') }}">Novo Anime</a>


<table>
    <thead>
        <tr>
            <th>Nome</th>
            <th>Imagem</th>
            <th>Número de Episódios</th>
            <th>Status</th>
            <th>Estreia</th>
            <th>Músicas</th>
            <th>Ações</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($animes as $anime)
        <tr>
            <td>{{ $anime->nome }}</td>
            <td><img src="{{ asset('storage/' . $anime->imagem) }}" alt="{{ $anime->nome }}" width="100"></td>
            <td>{{ $anime->episodios }}</td>
            <td>{{ $anime->status }}</td>
            <td>{{ $anime->estreia }}</td>
            <td>{{ $anime->musicas }}</td>
            <td>
                <a href="{{ route('animes.show', $anime->id) }}">Inspecionar</a>
            </td>
            <td>
                <a href="{{ route('animes.edit', $anime->id) }}">Editar</a>
            </td>
            <td>

                <form action="{{ route('animes.destroy', $anime->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Excluir</button>
                </form>
            </td>
        </tr>
        @endforeach
        {{-- {{ $animes->links('pagination::bootstrap-5') }} --}}
    </tbody>
</table>

@endsection

{{-- Route::get('/animes', [AnimeController::class, 'index'])->name('animes');


// Route::get('/animes/{id}', [AnimeController::class, 'show'])->name('animes.show');


Route::resource('animes', AnimeController::class); --}}