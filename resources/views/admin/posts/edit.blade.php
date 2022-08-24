@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-center m-5">
        <h1 class=" text-success border border-success rounded-pill border-3 border-opacity-50 p-3">MODIFICA POST</h1>
    </div>
    <div class="container">
        <form action="{{ route('admin.posts.update', ['post'=>$post->slug]) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <div class="form-group">
                    <label>Titolo</label>
                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                        placeholder="Inserisci il titolo" value="{{ old('title') }}" required>
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label>Contenuto</label>
                <textarea name="content" class="form-control @error('content') is-invalid @enderror" rows="10"
                    placeholder="Inizia a scrivere qualcosa..." required>{{ old('content') }}</textarea>
                @error('content')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </form>
    </div>
@endsection