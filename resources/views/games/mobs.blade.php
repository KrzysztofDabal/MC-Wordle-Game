@extends('layouts.app')

@section('content')

<script>
    let mobNames;
    $(document).ready(function (){
        console.log("JS działa!");
        // TWORZENEI LOCAL STORAGE
        // // localStorage.setItem('mobGuesses', JSON.stringify([{version:1},{guesses:[{id:1}]},{corect:false}]));
        let mobGuesses = localStorage.getItem('mobGuesses');
        if(!mobGuesses){
            console.log("mobGuesses nie istnieje");
        } else{
            mobGuesses = JSON.parse(mobGuesses);
            // DODAWANIE I ZAPISYWANIE NOWEGO ELEMENTU DO LISTY
            // // mobGuesses[1].guesses.push({id:2});
            // // localStorage.setItem('mobGuesses', JSON.stringify(mobGuesses));
            console.log("mobGuesses istnieje", mobGuesses);
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
                        checkMob(mobId);
                    }
                });
            }
        });
    });

    function checkMob(mobId){
        console.log('Wywołano funkcje checkMob', mobId)
        $.ajax({
            url: '/mobguesser/check_guess',
            method: 'POST',
            data: {
                mob_id: mobId,
                // _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response){
                console.log('Odpowiedź backendu', response);
                //localstorage function
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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection