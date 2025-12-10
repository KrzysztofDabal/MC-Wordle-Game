@extends('layouts.app')

@section('content')

<script>
    let mobNames;
    let mobGuesses;
    let mobStorage;
    $(document).ready(function (){
        mobStorage = localStorage.getItem('mobGuesses');
        if(!mobStorage){
            console.log("Start strony mobGuesses nie istnieje");
        } else{
            mobGuesses = JSON.parse(mobStorage);

            if(mobGuesses[0].version != {{ $version }}){
                console.log('mobGuesses[0].version: ', mobGuesses[0].version);
                console.log('{{ $version }}: ', {{ $version }});
                localStorage.removeItem('mobGuesses');
            } else{
                mobGuesses[1].guesses.forEach(guess => {
                    guesses_table(guess.name);
                });
                console.log('Start, guessed: ');
            }
        }

        // autocomplete filling
        $.ajax({
            url: '/mobguesser/get_mobs',
            method: 'GET',
            success: function (data){
                mobNames = data.map(map => ({
                    label: map.name,
                    value: map.id
                }));

                $('#mobSearch').autocomplete({
                    source: mobNames,
                    select: function(event, ui) {
                        console.log('Wybrano ID:', ui.item.value);
                        let mobId = ui.item.value;
                        check_mob(mobId);
                        $('#mobSearch').val('');
                        return false;
                    }
                });
                if(mobGuesses){
                    check_if_guessed(mobGuesses[2].is_guessed);
                }
            }
        });
    });

    function check_if_guessed(is_guessed){
        console.log('is_guessed = ', is_guessed);
        if(is_guessed){
            console.log('Wywołano blokadę');
            $('#mobSearch').prop('disabled', true);
            $('#mobSearch').autocomplete("disable");
        }
        return;
    }

    function guesses_table(guess_name){
        const tbody = document.querySelector('#guesses_tab tbody');
        
        $.ajax({
            url: '/mobguesser/compare_to_daily',
            method: 'POST',
            data: {
                guess_to_compare: guess_name
            },
            success: function(response){
                const name_class = response.name_is_correct ? "table-success" : "table-danger";
                const version_class = response.game_version_is_correct ? "table-success" : "table-danger";
                const health_class = response.health_is_correct ? "table-success" : "table-danger";
                const height_class = response.height_is_correct ? "table-success" : "table-danger";
                const behavior_class = response.behavior_is_correct ? "table-success" : "table-danger";
                const spawn_class = response.spawn_is_correct ? "table-success" : "table-danger";
                const classification_class = response.classification_is_correct ? "table-success" : "table-danger";
                const row = document.createElement("tr");
                row.innerHTML = `
                    <td class="${name_class}">${response.name}</td>
                    <td class="${version_class}">${response.game_version}</td>
                    <td class="${health_class}">${response.health}</td>
                    <td class="${height_class}">${response.height}</td>
                    <td class="${behavior_class}">${response.behavior}</td>
                    <td class="${spawn_class}">${Array.isArray(response.spawn) ? response.spawn.join(', ') : JSON.parse(response.spawn).join(', ')}</td>
                    <td class="${classification_class}">${response.classification}</td>
                `;
                tbody.prepend(row);
            }
        });
        return;
    }

    function add_guess_to_ls(guess){
        mobStorage = localStorage.getItem('mobGuesses');
        mobGuesses = JSON.parse(mobStorage); 
        if(!mobGuesses){
            console.log("mobGuesses nie istnieje");
            let new_data = [
                {version: guess.version},
                {guesses: [
                    {name: guess.name}
                ]},
                {is_guessed: guess.is_guess_corect}
            ]
            localStorage.setItem('mobGuesses', JSON.stringify(new_data));
            console.log("Utworzono mobGuesses");
        } else{
            console.log("mobGuesses istnieje");
            mobGuesses = JSON.parse(mobStorage);

            let alreadyguessed = mobGuesses[1].guesses.some(g => g.name === guess.name);
            if(!alreadyguessed){
                mobGuesses[1].guesses.push({name: guess.name});
                if(guess.is_guess_corect){
                    mobGuesses[2].is_guessed = guess.is_guess_corect;
                }
                localStorage.setItem('mobGuesses', JSON.stringify(mobGuesses));
                
                guesses_table(guess.name);
            }
        }
        check_if_guessed(guess.is_guess_corect);
        return;
    }

    function check_mob(mobId){
        console.log('Wywołano funkcje checkMob', mobId)
        $.ajax({
            url: '/mobguesser/check_guess',
            method: 'POST',
            data: {
                mob_id: mobId,
            },
            success: function(response){
                add_guess_to_ls(response);
            },
            error: function(xhr){
                console.log('Backend nie odpowiada: ', xhr.responseText)
            }
        });
        return;
    }
</script>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('WITAJ') }}</div>

                <div class="card-body">
                    Mobki
                    <input type="text" id="mobSearch" placeholder="Wpisz nazwę moba..." class="form-control">

                    <table class="table table-bordered" id="guesses_tab">
                        <thead class="table-active"> 
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
    </div>
</div>
@endsection