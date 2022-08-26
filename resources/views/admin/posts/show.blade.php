@extends('layouts.app')

@section('content')
    <div class="">
        <div class="container d-flex align-items-center justify-content-center overflow-auto mt-5">
            <div class="row">
                <div class="col overflow-auto">
                    <div class="card border border-success rounded-4 border-3 border-opacity-50 p-3" style="width: 50rem;">
                        <a href="{{ route('admin.posts.index') }}" class="btn btn-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-activity">
                                <line x1="20" y1="12" x2="4" y2="12"></line>
                                <polyline points="10 18 4 12 10 6"></polyline>
                            </svg> Tutti i posts
                        </a>
                        <div class="card-body">
                            <h2>{{ $post->title }}</h2>
                            <hr>
                            <h3>Slug :</h3>
                            <p>{{ $post->slug }}</p>
                            <hr>
                            <h3>Contenuto :</h3>
                            <p class=" altezzaLine overflow-auto">{{ $post->content }}</p>
                            <hr>
                            <h3>Creatore :</h3>
                            <p>{{ $post->user->name }}</p>
                            <hr>
                            <h3>Categoria :</h3>
                            <p>{{ $post->category ? $post->category->name : '' }}</p>
                            <hr>
                            <h3>Tag :</h3>
                            <p>
                                {{-- la lettur va sempre fatta con $post->argomento ma essendo però un array di oggetti in quetso caso occore
                                    fare un ciclo "foreach" --}}
                                @foreach ($post->tags as $tag)
                                    {{ $tag->name }}

                                    {{-- se non è l'ultimo della lista metti il trattino --}}
                                    @if (!$loop->last)
                                        <span>, </span>
                                    @endif
                                @endforeach

                                {{-- invece di utilizzare il ciclo for però potremmo utilizzare la funzione "implode()"
                                    scrivendo semplicemente questo:

                                    {{ $post->tags->implode("name", ", ")}} --}}
                            </p>

                            <h3>Date :</h3>
                            <ul>
                                <li>Data Creazione: {{ $post->created_at }}</li>
                                <li>Data Ultima Modifica: {{ $post->updated_at }}</li>
                            </ul>
                        </div>
                        <div>
                            <div class="d-flex justify-content-end align-items-center">
                                <a href="{{ route('admin.posts.edit', ['post' => $post->slug]) }}"
                                    class="btn btn-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path
                                            d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                        <path fill-rule="evenodd"
                                            d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                    </svg>
                                </a>

                                <div class="p-2">
                                    <div class="vl">

                                    </div>
                                </div>

                                <form action="{{ route('admin.posts.destroy', ['post' => $post->slug]) }}" method="post">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                            <path
                                                d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
