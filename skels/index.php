
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../static/css/style.css">
    <link rel="shortcut icon" href="../static/img/icon.png" type="image/x-icon">
    <title>Gotta Check'em All</title>
</head>
<body>
    <div id="page">
        <h1>Gotta Check'em All</h1>
        <p id="sottotitolo"> <span class="bold">Benvenuto</span>  nel tuo motore di ricerca per Pokémon. Potrai inserire le caratteristiche di un <span class="bold">Pokémon fittizio</span> e il back-end <br> cercherà grazie 
            all'argoritmo di Machine Leanring <span class="bold">KNN(K-Nearest Neighbors)</span> i 5 Pokémon più simili a quello che hai <br> inserito.</p> 
        </p>

        <form id="inputForm" action="./index.php" method="post">
            <div class="input-section">
                <div class="form-element">
                    <label for="vita"> <span class="bold">Punti Vita (HP)</span></label>
                    <input class="datas" name="vita" type="text" id="vita" placeholder="Inserisci un numero da 0 a 300" required>
                </div>
                    
                <div class="form-element">
                    <label for="attacco"> <span class="bold">Punti Attacco (Attack)</span></label>
                    <input class="datas" type="text" name="attacco" id="attacco" placeholder="Inserisci un numero da 0 a 300" required>
                </div>        
                    
                <div class="form-element">
                    <label for="difesa"> <span class="bold">Punti difesa (Defense)</span></label>
                    <input class="datas" type="text" id="difesa" name="difesa" placeholder="Inserisci un numero da 0 a 300" required>
                </div>  
    
                <div class="form-element">
                    <label for="attacco_speciale"> <span class="bold">Punti Attacco Speciale (Sp. Atk):</span></label>
                    <input class="datas" type="text" name="attspeciale" id="attacco_spaziale" placeholder="Inserisci un numero da 0 a 300" required>
                </div>
    
                <div class="form-element">
                    <label for="difesa_speciale"> <span class="bold">Punti Difesa Speciale (Sp. Defense)</span></label>
                    <input class="datas" type="text" name="difesapeciale" id="difesa_speciale" placeholder="Inserisci un numero da 0 a 300" required>
                </div>    
    
                <div class="form-element">
                    <label for="velocita"> <span class="bold">Punti Veocità (Speed)</span></label>
                    <input class="datas" required type="text" name="velocita" id="velocita" placeholder="Inserisci un numero da 0 a 300" required>
                </div>
            </div>
            <div id="bottone">
                <button id="ludovica" type="submit">CERCA</button>
            </div> 
        </form>
        <div class="cardcontainer">
            <?php

                function read_csv() {
                    $file = fopen("../data/pokemon.csv", "r");
                    $data = array();
                    while (($line = fgetcsv($file)) !== FALSE) {
                        $data[] = $line;
                    }
                    fclose($file);
                    return $data;
                }
                
                function get_pokemonById($id) {
                    $data = read_csv();
                    return $data[$id];
                }

                function euclidean_dist($HP, $ATK, $DEF, $SPTK, $SPDEF, $SPEED, $data) {
                    $dist = array();
                
                    echo "<br>";
                    for ($i = 1; $i < count($data); $i++) {
                        array_push($dist,
                            array("id" => $data[$i][0],
                            "dist" => sqrt(pow($HP - $data[$i][4], 2) + pow($ATK - $data[$i][5], 2) + pow($DEF - $data[$i][6], 2) + pow($SPTK - $data[$i][7], 2) + pow($SPDEF - $data[$i][8], 2) + pow($SPEED - $data[$i][9], 2))
                        ));
                    }
                    
                    return $dist;
                }
                
                function sort_dist($dist) {
                
                    usort($dist, function($a, $b) {
                        return $a['dist'] <=> $b['dist'];
                    });
                    return $dist;
                } 
                
                function get_KPokemon($k, $data) {
                    $kPokemon = array();
                    for ($i = 0; $i < $k; $i++) {
                        echo "<br>";
                        array_push($kPokemon, $data[$i]);
                    }
                    return $kPokemon;
                }
                
                if(isset( $_POST['vita']) && isset( $_POST['attacco'])  && isset( $_POST['difesa'])  && isset( $_POST['attspeciale'])  && isset( $_POST['difesapeciale'])  && isset( $_POST['velocita'])) {
                    
                    $HP = $_POST['vita'];
                    $ATK = $_POST['attacco'];
                    $DEF = $_POST['difesa'];
                    $SPTK = $_POST['attspeciale'];
                    $SPDEF = $_POST['difesapeciale'];
                    $SPEED = $_POST['velocita'];

                    if(is_numeric($HP) && is_numeric($ATK) && is_numeric($DEF) && is_numeric($SPTK) && is_numeric($SPDEF) && is_numeric($SPEED)) {
                
                        if($HP > 0 && $HP < 300 && $ATK > 0 && $ATK < 300 && $DEF > 0 && $DEF < 300 && $SPTK > 0 && $SPTK < 300 && $SPDEF > 0 && $SPDEF < 300 && $SPEED > 0 && $SPEED < 300){
                            echo "<br>";
                            $data = read_csv();
                            $euclidean = euclidean_dist($HP, $ATK, $DEF, $SPTK, $SPDEF, $SPEED, $data);
                            $sorted = sort_dist($euclidean);
                            $kPokemon = get_KPokemon(5, $sorted);
                
                            for ($i = 0; $i < count($kPokemon); $i++) {
                                $pokemon = get_pokemonById($kPokemon[$i]['id']);
                                echo "<br>";
                                echo '
                                    <div class="container">
                                        <div class="containerimg">
                                            <img class="cardimg" src="../static/images/'.$pokemon[0].'.png" alt="Immagine del pokemon: {nomepokemon}">
                                        </div>
                                        <div class="statscontainer">
                                            <h3 class="namecard">'.$pokemon[1].'</h3>
                                            <p class="gencard">gen. '.$pokemon[11].'</p>
                                            <p class="typescard">Tipi: <span class="bold">'.$pokemon[2].', '.$pokemon[3].'</span></p>
                                            <div class="statscard">
                                                <div>
                                                    <p>HP <span class="bold">'.$pokemon[5].'</span></p>
                                                    <p>Atk <span class="bold">'.$pokemon[6].'</span></p>
                                                    <p>Def <span class="bold">'.$pokemon[7].'</span></p>
                                                </div>
                                                <div>
                                                    <p>Sp. Atk <span class="bold">'.$pokemon[8].'</span></p>
                                                    <p>Sp. Def <span class="bold">'.$pokemon[9].'</span></p>
                                                    <p>Speed <span class="bold">'.$pokemon[10].'</span></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                ';
                            }
                        } else {
                            echo "Inserire un numero compreso tra 1 e 300";
                        }
                    } else {
                        echo "I valori devono essere necessariamente dei numeri";
                    }
                } else {
                }

            ?>
        </div>
    <script src="../static/js/script.js"></script>
</body>
</html>