@extends('layouts.app')

@section('content')

<script>
    let mobNames;
    let mobGuesses;
    $(document).ready(function (){
        const version = {{ $version }};
        console.log("JS działa! Aktualna versia gry to ", version);
        mobGuesses = localStorage.getItem('mobGuesses');
        if(!mobGuesses){
            console.log("mobGuesses nie istnieje");
        } else{
            mobGuesses = JSON.parse(mobGuesses);

            if(mobGuesses[0].version == version){
                console.log("Poprawna wersja mobGuesses", mobGuesses);
            } else{
                localStorage.removeItem('mobGuesses');
                console.log("Niepoprawna wersja mobGuesses został usunięty");
            }
        }


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
            }
        });
    });

    function guesses_table(guess){
        console.log('wywołanie dodawanie wiersza do tabeli');
        const tbody = document.querySelector('#guesses_tab tbody');
        
        const row = document.createElement("tr");
        row.innerHTML = `
            <td>${guess.name}</td>
        `;
        tbody.prepend(row);
    }

    function add_guess_to_ls(guess){
        mobGuesses = localStorage.getItem('mobGuesses');
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
            mobGuesses = JSON.parse(mobGuesses);

            let alreadyguessed = mobGuesses[1].guesses.some(g => g.name === guess.name);
            if(!alreadyguessed){
                mobGuesses[1].guesses.push({name: guess.name});
                if(guess.is_guess_corect){
                    mobGuesses[2].is_guessed = guess.is_guess_corect;
                }
                localStorage.setItem('mobGuesses', JSON.stringify(mobGuesses));
            }
            else{
                console.log('Już istnieje taka odpowiedź');
            }
        }
        
        guesses_table(guess);
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
                console.log('Odpowiedź backendu', response);
                add_guess_to_ls(response)
            },
            error: function(xhr){
                console.log('Backend nie odpowiada: ', xhr.responseText)
            }
        });
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
                                <!-- <th>Health</th>
                                <th>Height</th>
                                <th>Nature</th> -->
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