@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center mt-5">
    <div class="d-flex flex-column align-items-center gap-2">
        <a href="{{ route('mobguesser') }}" class="btn btn-secondary btn-xl">
            Mobs
        </a>
        <a href="{{ route('blockguesser') }}" class="btn btn-secondary btn-xl">
            Blocks
        </a>
        <a href="{{ route('itemguesser') }}" class="btn btn-secondary btn-xl">
            Items
        </a>
    </div>
</div>
@endsection