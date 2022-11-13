@extends('layouts.app')
@section('title', 'Create label')

@section('content')
<div class="container">
    <div class="mb-4">
        <a href="{{ route('items.index') }}"><i class="fas fa-long-arrow-alt-left"></i> Vissza a kezdőlapra</a>
    </div>
    <h1 class="mb-4">Címke létrehozása</h1>

    @if (Session::has('label_created'))
        <div class="alert alert-success">
            A címke létrehozása sikeres volt!
        </div>
    @endif

    <form method="post" action="{{ route('labels.store') }}">
        @csrf

        <div class="form-group row mb-3">
            <label for="name" class="col-sm-2 col-form-label">Kategória neve*</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                @error('name')
                    {{ $message }}
                @enderror
            </div>
        </div>

        <div class="form-group row mb-3">
            <label for="color" class="col-sm-2 col-form-label">Kategória színe (hexadecimális)*</label>
            <div class="col-sm-10 pt-2">
                <input type="text" class="form-control" id="color" name="color" value="{{ old('color') }}">
                @error('color')
                    {{ $message }}
                @enderror
            </div>
        </div>

        <div class="form-group row mb-3">
            <label for="name" class="col-sm-2 col-form-label">Kategória láthatósága</label>
            <div class="col-sm-10 pt-2">
                <input type="checkbox" class="form-check-input" id="flexCheckDefault" name="display" value="{{ old('display') }}">
            </div>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i>Címke felvétele</button>
        </div>

    </form>
</div>
@endsection
