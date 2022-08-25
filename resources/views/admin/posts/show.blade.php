@extends('layouts.app')

@section('content')
    <div>
        <div class="container d-flex vh-100 align-items-center justify-content-center">
            <div class="row ">
                <div class="col">
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
                            <p>{{ $post->content }}</p>
                            <hr>
                            <h3>Creatore :</h3> 
                            <p>{{ $post->user->name }}</p>
                            <hr>
                            <h3>Categoria :</h3> 
                            <p>{{ $post->category ? $post->category->name : "" }}</p>

                            <h3>Date :</h3> 
                            <ul>
                                <li>Data Creazione: {{ $post->created_at }}</li>
                                <li>Data Ultima Modifica: {{ $post->updated_at }}</li>
                            </ul>
                        </div>
                        <div>
                            <div class="d-flex justify-content-end">
                                <form action="{{ route('admin.posts.destroy', $post->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
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
