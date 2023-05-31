@extends('layouts.template')

@section('title', 'Register Siswa')

@section('content')

    <div class="col-md-12">
        @if (Session::has('success'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('success') }}
            </div>
        @endif
        @if (Session::has('error'))
            <div class="alert alert-danger" role="alert">
                {{ Session::get('error') }}
            </div>
        @endif
        <form action="{{ route('siswa.register') }}" method="POST">
            @csrf
            <div class="form-row mb-3">
                <input type="text" name="nim" class="form-control" placeholder="NIM" value="{{ old('nim') }}"
                    required autofocus>
                @error('nim')
                    <small class="form-text text-muted"> {{ $message }}</small>
                @enderror
            </div>
            <div class="form-row mb-3">
                <input type="text" name="name" class="form-control" placeholder="Nama Lengkap"
                    value="{{ old('name') }}" required>
                @error('name')
                    <small class="form-text text-muted"> {{ $message }}</small>
                @enderror
            </div>
            <div class="form-row mb-3">
                <select name="prodi" id="" class="form-control" required>
                    <option value="">Pilih Prodi</option>
                    @foreach ($prodis as $prodi)
                        <option value="{{ $prodi->id }}">{{ $prodi->name }}</option>
                    @endforeach
                </select>
                @error('prodi')
                    <small class="form-text text-muted"> {{ $message }}</small>
                @enderror
            </div>
            <div class="form-row mb-3">
                <input type="password" name="password" class="form-control" placeholder="Password" required>
                @error('password')
                    <small class="form-text text-muted"> {{ $message }}</small>
                @enderror
            </div>
            <div class="form-row mb-3">
                <button class="btn btn-primary btn-block">REGISTER</button>
            </div>
        </form>
    </div>
@endsection
