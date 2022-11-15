<?php
header("Location: ../skels/index.html");


$HP = $_POST['HP'];
$ATK = $_POST['ATK'];
$DEF = $_POST['DEF'];
$SPTK = $_POST['SPTK'];
$SPDEF = $_POST['SPDEF'];
$SPEED = $_POST['SPEED'];

if(isset( $_POST['HP']) && isset( $_POST['ATK'])  && isset( $_POST['DEF'])  && isset( $_POST['SPTK'])  && isset( $_POST['SPDEF'])  && isset( $_POST['SPEED'])){

if(is_numeric($HP) && is_numeric($ATK) && is_numeric($DEF) && is_numeric($SPTK) && is_numeric($SPDEF) && is_numeric($SPEED)){
    if($HP > 0 && $HP < 300 && $ATK > 0 && $ATK < 300 && $DEF > 0 && $DEF < 300 && $SPTK > 0 && $SPTK < 300 && $SPDEF > 0 && $SPDEF < 300 && $SPEED > 0 && $SPEED < 300){
    
    }else{
        echo "Inserire un numero compreso tra 1 e 300";
    }
}else{
    echo "I valori devono essere necessariamente dei numeri";
}
}else{
    echo "I campi non sono stati compilati correttamente";
}
?>