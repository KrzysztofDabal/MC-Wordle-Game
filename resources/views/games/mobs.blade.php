@extends('layouts.app')

@section('next-game', 'blocks')

@section('content')
<script>
    const mobsList = @js($mobs);
    const game_version = @js($version);
</script>
<script src="{{ asset('js/mob_guesser.js') }}"></script>

<div class="container">
    <div class="row justify-content-center">
        <div class="col_auto">
            <div class="guess_panel">
                <div class="guess_content">
                    <input type="text" id="mobSearch" placeholder="Input mob name..." class="guess_input">

                    @include('games.partials.results')
                    <div class="table-responsive">
                        <table class="guess_table hidden" id="guesses_tab">
                            <thead> 
                                <tr>
                                    <th></th>
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
        </div>
    </div>
</div>
@endsection