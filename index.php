<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    


<?php
$da = json_decode(file_get_contents("https://randomuser.me/api/"), true);
$data = $da["results"]["0"];
$nombre = $data["name"]["first"];
$apellido = $data["name"]["last"];
$email = $data["email"];
$imagen = $data["picture"]["large"];
?>
<div>
<h3>randomuse API - Buscar personas aleatoria</h3>
</div>
<div>
<img src="<?=$imagen?>">
<p><b>Nombre:</b> <?=$nombre, " " ,$apellido?></p>
<p><b>Email:</b> <?=$email?></p>
</div>

<form method="post">
    <button type="submit" class="btn btn-primary">Enviar</button>
</form>
<br><br>

<!-- FORMULARIO API DE ANIME  -->
<h3>Jikan API - obtiene animes</h3>
<form method="get">
<p><label>Ingresa el nombre del anime</label></P>
<input type="text" name="q">
<button type="submit">Obtener Anime</button>
</form>
<br><br>
<!-- FINAL FORMULARIO API ANIME  -->


<!-- INICIO FORMULARIO API RAZAS  -->
<h3>Dog API - obtiene razas</h3>
<form  method="get">
<p><label>Ingresa el nombre de la raza</label></p>
    <input type="text" name="dogs">
    <button type="submit">Obtener Raza</button>
</form>
<br><br>
<!-- FINAL FORMULARIO API RAZAS  -->

<?php
// API ANIME 
if(isset($_GET['q'])){

    $da = json_decode(file_get_contents("https://api.jikan.moe/v3/search/anime?q=".$_GET['q']), true);

    foreach ($da["results"] as $value) {
        echo "<img src=". $value['image_url'] .">";
        echo "<br>";
            echo "<p> TITULO:" . $value['title'] . "</p>";
        echo "<br>";

            echo "<p> SINOPSIS:". $value['synopsis']."</p>";

    }
}


// API ANIMALES
if(isset($_GET['dogs'])){
$animal = $_GET['dogs'];
$perros = json_decode(file_get_contents("https://dog.ceo/api/breed/".$animal."/images/random"), true);


echo "<img src='".$perros['message'] ."' width='200px'>";
echo "<b>La raza es: </b>" . $_GET['dogs'];

}
?>

</body>
</html>
