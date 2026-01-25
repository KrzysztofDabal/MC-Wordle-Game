
    let mobNames;
    let mobGuesses;
    let mobStorage;
    $(document).ready(function (){
        mobStorage = localStorage.getItem('mobGuesses');
        if(!mobStorage){}
        else{
            mobGuesses = JSON.parse(mobStorage);

            if(mobGuesses[0].version != game_version){
                localStorage.removeItem('mobGuesses');
                mobStorage = null;
                mobGuesses = null;
            }
            else{
                (async () => {
                    const guessNames = mobGuesses[1].guesses.map(guess => guess.name);
                    const rows = await get_rows(guessNames);
                    render_table(rows);
                })();
            }
        }

        // --AUTOCOMPLETE INITIALIZATION--
        mobNames = mobsList.map(map => ({
                    label: map.name,
                    value: map.id
                }));
        $('#mobSearch').autocomplete({
            source: mobNames,
            select: function(event, ui) {
                check_mob(ui.item.value);
                $('#mobSearch').val('');
                event.preventDefault();
            }
        });
        
        if(mobGuesses?.[2]?.is_guessed){
            $('#mobSearch').prop('disabled', true).autocomplete("disable");
        }
        else{
            $('#mobSearch').prop('disabled', false).autocomplete("enable");
        }


    });

    async function get_rows(guess_names){
        const promises = guess_names.map(name =>
            generate_table_row(name)
        );

        const rows = await Promise.all(promises);

        return rows;
    }

    async function row_for_selected_guess(name){
        const rows = await get_rows([name]);
        render_table(rows);
    }

    async function render_table(rows, {prepend = true, replace} = {}){
        const tbody = document.querySelector('#guesses_tab tbody');

        const html = prepend ? [...rows].reverse().join('') : rows.join('');

        tbody.insertAdjacentHTML('afterbegin', html);
        document.querySelector('#guesses_tab').classList.remove('hidden');
    }

    function generate_table_row(guess_name){
        return new Promise((resolve, reject) => {
            $.ajax({
                url: '/mobguesser/compare_to_daily',
                method: 'POST',
                data: {
                    guess_to_compare: guess_name
                },
                success: function(response){
                    resolve(`
                        <tr>
                            <td><div class="guess_table_cell ${response.name_is_correct}">${response.name}</div></td>
                            <td><div class="guess_table_cell ${response.game_version_is_correct}">${response.game_version}</div></td>
                            <td><div class="guess_table_cell ${response.health_is_correct}">${response.health}</div></td>
                            <td><div class="guess_table_cell ${response.height_is_correct}">${response.height}</div></td>
                            <td><div class="guess_table_cell ${response.behavior_is_correct}">${response.behavior}</div></td>
                            <td><div class="guess_table_cell ${response.spawn_is_correct}">${Array.isArray(response.spawn) ? response.spawn.join(', ') : JSON.parse(response.spawn).join(', ')}</div></td>
                            <td><div class="guess_table_cell ${response.classification_is_correct}">${response.classification}</div></td>
                        </tr>
                    `);
                },
                error: reject
            });

        });
    }

    function add_guess_to_ls(guess){
        mobStorage = localStorage.getItem('mobGuesses');
        mobGuesses = JSON.parse(mobStorage); 
        if(!mobGuesses){
            let new_data = [
                {version: guess.version},
                {guesses: [
                    {name: guess.name}
                ]},
                {is_guessed: guess.is_guess_corect}
            ]
            localStorage.setItem('mobGuesses', JSON.stringify(new_data));
        }
        else{
            mobGuesses = JSON.parse(mobStorage);

            let alreadyguessed = mobGuesses[1].guesses.some(g => g.name === guess.name);
            if(!alreadyguessed){
                mobGuesses[1].guesses.push({name: guess.name});
                if(guess.is_guess_corect){
                    mobGuesses[2].is_guessed = guess.is_guess_corect;
                    $('#mobSearch').prop('disabled', true).autocomplete("disable");
                }
                else{
                    $('#mobSearch').prop('disabled', false).autocomplete("enable");
                }
                localStorage.setItem('mobGuesses', JSON.stringify(mobGuesses));
                
            }
            else {return;}
        }
        row_for_selected_guess(guess.name)
        return;
    }

    function check_mob(mobId){
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
            }
        });
        return;
    }