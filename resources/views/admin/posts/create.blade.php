@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-center m-5">
        <h1 class=" text-success border border-success rounded-pill border-3 border-opacity-50 p-3">CREA POST</h1>
    </div>
    <div class="container">
        <form action="{{ route('admin.posts.store') }}" method="post" enctype="multipart/form-data">
            @csrf
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
                <label>Selezione la tipologia</label>
                <select type="text" name="category_id" class="form-control @error('category_id') is-invalid @enderror"
                    placeholder="Inizia a scrivere qualcosa...">
                    <option value=""></option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Selezione Tag</label>
                <select type="text" name="tags[]" class="form-control @error('tags') is-invalid @enderror" multiple
                    placeholder="Inizia a scrivere qualcosa...">
                    <option value=""></option>
                    @foreach ($tags as $tag)
                        <option value="{{ $tag->id }}" >{{ $tag->name }}</option> {{-- {{old("tags", $post->tag_id) === $tag->id ? 'selected' : "" }} --}}
                    @endforeach
                </select>
                @error('tags')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
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
