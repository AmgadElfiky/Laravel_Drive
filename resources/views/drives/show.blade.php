@extends('layouts.app')

@section('content')

    <div class="container col-md-6">
        <h1 class="text text-center text-alert mx-auto w-25">Show File NO.{{ $drive->id }}</h1>
        <div class="card justify-content-center" style="width: 100%">
            <img src="{{ asset("upload/$drive->file") }}">
            <div class="card-body text-left">
                <h5>File Name: {{ $drive->name }}</h5><br>
                <h5>File Description: {{ $drive->description }}</h5>
                {{-- Skills --}}<br>
                <h5>Course Level: {{ $drive->level }}</h5>
                @if ($drive->level == 'Easy')
                    <div class="progress">
                        <div class="progress-bar bg-success progress-bar-striped progress-bar-animated" style="width:33%">
                            <div style="color: black">{{ $drive->level }}</div>
                        </div>
                    </div>
                @elseif ($drive->level == 'Moderate')
                    <div class="progress">
                        <div class="progress-bar bg-warning progress-bar-striped progress-bar-animated" style="width:66%">
                            <div style="color: black">{{ $drive->level }}</div>
                        </div>
                    </div>
                @else
                <div class="progress">
                    <div class="progress-bar bg-danger progress-bar-striped progress-bar-animated" style="width:100%">
                        <div style="color: black">{{ $drive->level }}</div>
                    </div>
                </div>
                @endif
            </div>
        </div>

    @endsection
