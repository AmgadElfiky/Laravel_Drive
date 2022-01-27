@extends('layouts.app')

@section('content')

<h1 class="text text-center text-alert mx-auto w-25">Add Drive Page</h1>
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
            <form action="{{ route('drives.store') }}" method="POST" enctype="multipart/form-data"> {{-- لازم جزء ال enctype ينكتب --}}
                @csrf
                <div class="form-group">
                    <label for="">Drive Name</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Drive Description</label>
                    <input type="text" name="description" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Drive level</label>
                    <select id="inputState" name="level" class="form-control">
                        <option selected>Easy</option>
                        <option>Moderate</option>
                        <option>Hard</option>
                      </select>
                </div>
                <div class="form-group">
                    <label for="">Upload File</label>
                    <input type="file" name="inputFile" class="form-control">
                </div>
                <div class="form-group text-left text-warning ">
                    <label>Note That Will Be In User {{ Auth::user()->id }} Whose name is {{ Auth::user()->name }}</label>
                </div>
                <button class="btn btn-info">Save Data</button>
            </form>
        </div>
    </div>
</div>

@endsection
