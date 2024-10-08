@extends('layouts.app')

@section('content')
    <h1>{{ $post->title }}</h1>
    <div>
        <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-warning">
            <i class="fa-solid fa-pencil"></i>
        </a>
        @include('admin.partials.formdelete', [
            'route' => route('admin.posts.destroy', $post),
            'message' => "confermi l eliminazione del post $post->title ?",
        ])
    </div>

    <p>{{ $post->txt }}</p>
    <p>Slug: {{ $post->slug }}</p>

    <p><strong>Tempo di lettura:</strong> {{ $post->reading_time }} minuti</p>
    {{-- Se la categoria esiste la stampa senno stampa nessuna categoria --}}
    <p>Categoria: {{ $post->category ? $post->category->name : 'Nessuna categoria' }}</p>
    @if ($post->tags)
        <ul>
            @foreach ($post->tags as $tag)
                <li>
                    <span class="badge bg-warning">
                        {{ $tag->name }}
                    </span>
                </li>
            @endforeach
        </ul>
    @endif
    {{-- Immagine --}}
    <div>
        <img class="w-50" src="{{ asset('storage/' . $post->path_image) }}" alt="{{ $post->image_original_name }}"
            onerror="this.src='/img/no-image.png'">
        <p>{{ $post->image_original_name }}</p>
    </div>
    <a href="{{ route('admin.posts.index') }}" class="btn btn-primary">Torna alla lista dei post</a>
@endsection
