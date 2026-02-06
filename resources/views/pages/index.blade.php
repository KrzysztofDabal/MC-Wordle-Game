@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center mt-5">
    <div class="d-flex flex-column align-items-center gap-2">
        <a href="{{ route('about') }}">about</a>
        <div class="minecraft-btn-big">
            <a href="{{ route('mob_guesser') }}">
                <button class="minecraft-btn mx-auto text-center text-white truncate hover:text-yellow-200">Mobs</button>
            </a>
        </div>
        <div class="minecraft-btn-big">
            <a href="">
                <button class="minecraft-btn mx-auto text-center text-white truncate hover:text-yellow-200">Blocks<p>(Work in progress)</p></button>
            </a>
        </div>
        <div class="minecraft-btn-big">
            <a href="">
                <button class="minecraft-btn mx-auto text-center text-white truncate hover:text-yellow-200">Items<p>(Work in progress)</p></button>
            </a>
        </div>
        
    </div>
</div>
@endsection