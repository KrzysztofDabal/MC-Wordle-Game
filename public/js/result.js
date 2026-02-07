let gameName = '';
let gameResult = '';
let nextGame = '';


function renderResultTable(){
    (async () => {
        const guessNames = mobGuesses[1].guesses.map(guess => guess.name);
        const rows = await getResultRows(guessNames);
        generateResultTable(rows);
    })();
}

async function generateResultTable(rows, {prepend = true, replace} = {}){
    const tbody = document.querySelector('#result_table tbody');

    const html = prepend ? [...rows].reverse().join('') : rows.join('');

    tbody.insertAdjacentHTML('afterbegin', html);
    
    document.querySelector('#result').classList.remove('hidden');
}

async function getResultRows(guess_names){
    const promises = guess_names.map(name =>
        generateResultRow(name)
    );

    const rows = await Promise.all(promises);

    return rows;
}

function generateResultRow(guess_name){
    return new Promise((resolve, reject) => {
        $.ajax({
            url: '/mob-guesser/compare-to-daily',
            method: 'POST',
            data: {
                guess_to_compare: guess_name
            },
            success: function(response){
                resolve(`
                    <tr>
                        <td><div class="result_table_cell ${response.name_is_correct}"></div></td>
                        <td><div class="result_table_cell ${response.game_version_is_correct}"></div></td>
                        <td><div class="result_table_cell ${response.health_is_correct}"></div></td>
                        <td><div class="result_table_cell ${response.height_is_correct}"></div></td>
                        <td><div class="result_table_cell ${response.behavior_is_correct}"></div></td>
                        <td><div class="result_table_cell ${response.spawn_is_correct}"></div></td>
                        <td><div class="result_table_cell ${response.classification_is_correct}"></div></td>
                    </tr>
                `);
            },
            error: reject
        });

    });
}