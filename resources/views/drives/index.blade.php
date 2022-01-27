@extends('layouts.app')

@section('content')

<div class="container col-md-6">
    @if (Session::has('done'))
        <div class="alert alert-success mx-auto w-50">
            {{ Session::get('done') }}
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            <table class="table table-dark text-center ">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Descripition</th>
                    <th colspan="4">Actions</th>
                </tr>
                @foreach ($drives as $data)
                    <tr>
                        <th>{{ $data->id }}</th>
                        <th>{{ $data->name }}</th>
                        <th>{{ $data->description }}</th>
                        <th><a href="{{ route('drives.show', $data->id) }}"><i class="far fa-eye text-info" style="font-size: 20px"></i></a></th>
                        <th><a href="{{ route('drives.edit', $data->id) }}"><i class="far fa-edit text-warning" style="font-size: 20px;"></i></a></th>
                        <th><a href="{{ route('drives.destroy', $data->id) }}"><i class="fas fa-trash text-danger" style="font-size: 20px;"></i></a></th>
                        <th><a href="{{ route('drives.download', $data->id) }}"><i class="fas fa-download text-success" style="font-size: 20px;"></i></a></th>                        
                    </tr>
                @endforeach
            </table>
            {{-- {{ $drives->links() }} --}}
        </div>
    </div>
</div>

@endsection