@extends('layouts.app')

@section('content')

<h1 class="text text-center text-alert mx-auto w-25">Edit Drive NO.{{ $drive->id }}</h1>
<div class="container col-md-6">
    @if ($errors->any())
        <div class="alert alert-danger mx-auto w-50">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="card">
        <div class="card-body text-center">
            <form action="{{ route('drives.update', $drive->id) }}" method="POST" enctype="multipart/form-data"> {{-- لازم جزء ال enctype ينكتب --}}
                @csrf
                <div class="form-group">
                    <label for="">Drive Name</label>
                    <input value="{{ $drive->name }}" type="text" name="name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Drive Description</label>
                    <input value="{{ $drive->description }}" type="text" name="description" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Upload File</label>
                    <input value="{{ $drive->file }}" type="file" name="inputFile" class="form-control">
                </div>
                <button class="btn btn-info">Save Data</button>
            </form>
        </div>
    </div>
</div>

@endsection
