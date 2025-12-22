@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center mt-5">
    <div class="d-flex flex-column align-items-center gap-2">
        <a href="{{ route('mobguesser') }}">
            <button class="minecraft-btn mx-auto text-center text-white truncate p-1 border-2 border-b-4 hover:text-yellow-200">Mobs</button>
        </a>
        <a href="{{ route('blockguesser') }}">
            <button class="minecraft-btn mx-auto text-center text-white truncate p-1 border-2 border-b-4 hover:text-yellow-200">Blocks</button>
        </a>
        
        <a href="{{ route('itemguesser') }}">
            <button class="minecraft-btn mx-auto text-center text-white truncate p-1 border-2 border-b-4 hover:text-yellow-200">Items</button>
        </a>
        
    </div>
</div>
@endsection