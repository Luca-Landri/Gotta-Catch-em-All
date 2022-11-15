<?php
header("Location: ../skels/index.html");

$HP = $_POST['HP'];
$ATK = $_POST['ATK'];
$DEF = $_POST['DEF'];
$SPTK = $_POST['SPTK'];
$SPDEF = $_POST['SPDEF'];
$SPEED = $_POST['SPEED'];

if(isset( $_POST['HP']) && isset( $_POST['ATK'])  && isset( $_POST['DEF'])  && isset( $_POST['SPTK'])  && isset( $_POST['SPDEF'])  && isset( $_POST['SPEED'])){

}else{
    echo "I campi non sono stati compilati correttamente";
}
?>