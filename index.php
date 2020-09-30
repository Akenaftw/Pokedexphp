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
        $pokeMoves = $pokemon['moves'][0]['move']['name'],
        $pokeType = $pokemon['types'][0]['type']['name']
    );
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
<img src="<?php echo $pokeSprite ?>">
<div class="types">
    <?php echo $pokeType ?>
</div>
<div class="moves">
    <?php echo $pokeMoves ?>
</div>
</body>
</html>

