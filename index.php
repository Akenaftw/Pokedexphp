<?php
declare(strict_types=1);

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

if(empty($_POST["id"])){
    $pokemons = file_get_contents("https://pokeapi.co/api/v2/pokemon/1");
}
else {
    $pokemons = file_get_contents("https://pokeapi.co/api/v2/pokemon/" . $_POST["id"] . "");



}

$pokemon = json_decode($pokemons, true);
$pokemonDescription =
    array(
        $pokeOrder = $pokemon['id'],
        $pokeName = $pokemon['name'],
        $pokeSprite = $pokemon['sprites']['front_default'],
        $pokeMoves = randomMoves($pokemon['moves']),
        $pokeType = $pokemon['types'][0]['type']['name'],
        $pokespecy = $pokemon['species']['url']
    );

$evolutionchain = file_get_contents($pokespecy);
$evochain = json_decode($evolutionchain,true);
$evochainarray =
    array(
    $pokeevochain = $evochain['evolution_chain']['url']
    );

$evolutionjson = file_get_contents($pokeevochain);
$evolution = json_decode($evolutionjson,true);
$evoarray =
    array(
      $pokeevolutionname = $evolution['chain']['evolves_to'][0]['evolves_to'][0]['species']['name']
    );


// make loop work and get the names first
// try to get a string with all the names, and then onclick fill in the names in the url. nested array
//watch out for eve non nested evolutions


function randomMoves($allMoves){
    $amountToDisplay = min(4, sizeof($allMoves));
    $moveNames = "";
    for ($i=0; $i<$amountToDisplay; $i++){
        $randomNumber = rand(0,sizeof($allMoves)-1);
        $moveNames .= $allMoves[$randomNumber]['move']['name']. ", ";
    }
        return $moveNames;
}

function evolutionGenerator(){
$displayamount = min(sizeof());
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="#" method="post" id="form">
    <input type="text" name="id">
    <input type="submit" value="submit">
</form>
<div class="id">
    <?php echo $pokeOrder; ?>
</div>
<div class="name">
    <?php echo $pokeName; ?>
</div>
<img src="<?php echo $pokeSprite ?>" alt="picture of the pokemon">
<div class="types">
    <?php echo $pokeType; ?>
</div>
<div class="moves">
    <?php echo $pokeMoves; ?>
</div>
<div class="evolutions">
    evolves to:
    <?php //add if else statement so that if the pokemon has no evolutions it doensn't generate errors.
     echo $pokeevolutionname; ?>
</div>
</body>
</html>

