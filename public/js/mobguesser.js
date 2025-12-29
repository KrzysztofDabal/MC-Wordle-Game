
    let mobNames;
    let mobGuesses;
    let mobStorage;
    $(document).ready(function (){
        mobStorage = localStorage.getItem('mobGuesses');
        if(!mobStorage){
            // console.log("Start strony mobGuesses nie istnieje");
        } else{
            mobGuesses = JSON.parse(mobStorage);

            if(mobGuesses[0].version != game_version){
                // console.log('mobGuesses[0].version: ', mobGuesses[0].version);
                localStorage.removeItem('mobGuesses');
                mobStorage = null;
                mobGuesses = null;
            } else{
                mobGuesses[1].guesses.forEach(guess => {
                    guesses_table(guess.name);
                });
                // console.log('Start, guessed: ');
            }
        }

        // --AUTOCOMPLETE INITIALIZATION--
        mobNames = mobsList.map(map => ({
                    label: map.name,
                    value: map.id
                }));
                // console.log(mobNames);
        $('#mobSearch').autocomplete({
            source: mobNames,
            select: function(event, ui) {
                // console.log('Wybrano ID:', ui.item.value);
                check_mob(ui.item.value);
                $('#mobSearch').val('');
                event.preventDefault();
            }
        });
        if(mobGuesses){
            check_if_guessed(mobGuesses[2].is_guessed);
        } else {
            $('#mobSearch').prop('disabled', false).autocomplete("enable");
        }
    });

    function check_if_guessed(is_guessed){
        // console.log('is_guessed = ', is_guessed);
        if(is_guessed){
            // console.log('Wywołano blokadę');
            $('#mobSearch').prop('disabled', true).autocomplete("disable");
        } else {
            $('#mobSearch').prop('disabled', false).autocomplete("enable");
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
                const name_class = response.name_is_correct ? "correct" : "wrong";
                const version_class = response.game_version_is_correct ? "correct" : "wrong";
                const health_class = response.health_is_correct ? "correct" : "wrong";
                const height_class = response.height_is_correct ? "correct" : "wrong";
                const behavior_class = response.behavior_is_correct ? "correct" : "wrong";
                const spawn_class = response.spawn_is_correct ? "correct" : "wrong";
                const classification_class = response.classification_is_correct ? "correct" : "wrong";
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
            // console.log("mobGuesses nie istnieje");
            let new_data = [
                {version: guess.version},
                {guesses: [
                    {name: guess.name}
                ]},
                {is_guessed: guess.is_guess_corect}
            ]
            localStorage.setItem('mobGuesses', JSON.stringify(new_data));
            // console.log("Utworzono mobGuesses");
        } else{
            // console.log("mobGuesses istnieje");
            mobGuesses = JSON.parse(mobStorage);

            let alreadyguessed = mobGuesses[1].guesses.some(g => g.name === guess.name);
            if(!alreadyguessed){
                mobGuesses[1].guesses.push({name: guess.name});
                if(guess.is_guess_corect){
                    mobGuesses[2].is_guessed = guess.is_guess_corect;
                }
                localStorage.setItem('mobGuesses', JSON.stringify(mobGuesses));
                
            } else {return;}
        }
        guesses_table(guess.name);
        check_if_guessed(guess.is_guess_corect);
        return;
    }

    function check_mob(mobId){
        // console.log('Wywołano funkcje checkMob', mobId)
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
                // console.log('Backend nie odpowiada: ', xhr.responseText)
            }
        });
        return;
    }