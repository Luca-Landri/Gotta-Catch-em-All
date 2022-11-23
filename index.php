<?php
$HP = $_POST['vita'];
$ATK = $_POST['attacco'];
$DEF = $_POST['difesa'];
$SPTK = $_POST['attspeciale'];
$SPDEF = $_POST['difesapeciale'];
$SPEED = $_POST['velocita'];

function read_csv() {
    $file = fopen("data/pokemon.csv", "r");
    $data = array();
    while (($line = fgetcsv($file)) !== FALSE) {
        $data[] = $line;
    }
    fclose($file);
    return $data;
}



if(isset( $_POST['vita']) && isset( $_POST['attacco'])  && isset( $_POST['difesa'])  && isset( $_POST['attspeciale'])  && isset( $_POST['difesapeciale'])  && isset( $_POST['velocita'])) {

    if(is_numeric($HP) && is_numeric($ATK) && is_numeric($DEF) && is_numeric($SPTK) && is_numeric($SPDEF) && is_numeric($SPEED)) {
        if($HP > 0 && $HP < 300 && $ATK > 0 && $ATK < 300 && $DEF > 0 && $DEF < 300 && $SPTK > 0 && $SPTK < 300 && $SPDEF > 0 && $SPDEF < 300 && $SPEED > 0 && $SPEED < 300){
            $data = read_csv();
            for ($i = 1; $i < count($data); $i++) {
                echo "<br>";
                for ($j = 0; $j < count($data[$i]); $j++) {
                    echo $data[$i][$j] . " ";
                }
            }
        } else {
            echo "Inserire un numero compreso tra 1 e 300";
        }
    } else {
        echo "I valori devono essere necessariamente dei numeri";
    }
} else {
    echo "I campi non sono stati compilati correttamente";
}
?>