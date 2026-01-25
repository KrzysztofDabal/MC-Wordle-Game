@extends('layouts.app')

@section('content')
<script>
    const mobsList = @json($mobs);
    const game_version = {{ $version }};
</script>
<script src="{{ asset('js/mobguesser.js') }}"></script>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <input type="text" id="mobSearch" placeholder="Wpisz nazwę moba..." class="guess_input">

        </div>
        <div class="table-responsive">
            <table class="guess_table hidden" id="guesses_tab">
                <thead> 
                    <tr>
                        <th>Name</th>
                        <th>Version</th>
                        <th>Health</th>
                        <th>Height</th>
                        <th>Behavior</th>
                        <th>Spawn</th>
                        <th>Classification</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection