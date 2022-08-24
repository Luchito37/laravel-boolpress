@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-center m-5">
        <h1 class=" text-success border border-success rounded-pill border-3 border-opacity-50 p-3">MODIFICA UTENTE</h1>
    </div>
    <div class="container">
        <form action="{{ route('admin.users.update', $user->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                        placeholder="Inserisci il nome" required value="{{ old('name', $user->name) }}" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input name="email" class="form-control @error('email') is-invalid @enderror" rows="10"
                    placeholder="Inizia a scrivere qualcosa..." required value="{{ old('email', $user->email)}}">
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Indirizzo</label>
                <input name="address" class="form-control @error('address') is-invalid @enderror" rows="10"
                {{-- faccio l'if ternario perchè devo capire se "user->details" ha un valore e in caso contrario mettere una stringa vuota --}}
                    placeholder="Inizia a scrivere qualcosa..." required value="{{ old('address' , $user->details ? $user->details->address : '')}}">
                @error('address')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Città</label>
                <input name="city" class="form-control @error('city') is-invalid @enderror" rows="10"
                {{-- faccio l'if ternario perchè devo capire se "user->details" ha un valore e in caso contrario mettere una stringa vuota --}}
                    placeholder="Inizia a scrivere qualcosa..." required value="{{ old('city', $user->details ? $user->details->city : '')}}">
                @error('city')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Provincia</label>
                <input name="province" class="form-control @error('province') is-invalid @enderror" rows="10"
                {{-- faccio l'if ternario perchè devo capire se "user->details" ha un valore e in caso contrario mettere una stringa vuota --}}
                    placeholder="Inizia a scrivere qualcosa..." required value="{{ old('province', $user->details ? $user->details->province : '')}}">
                @error('province')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Telefono</label>
                <input name="phone_number" class="form-control @error('phone_number') is-invalid @enderror" rows="10"

                {{-- faccio l'if ternario perchè devo capire se "user->details" ha un valore e in caso contrario mettere una stringa vuota --}}
                    placeholder="Inizia a scrivere qualcosa..." required value="{{ old('phone_number', $user->details ? $user->details->phone_number : '')}}">
                @error('phone_number')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success">Salva </button>
            </div>
        </form>
    </div>
@endsection