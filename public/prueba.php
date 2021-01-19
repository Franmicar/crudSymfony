<html>
<head>

</head>

<body>
<h1>Hola mundo</h1>
<?php
$name = "Ras";
$num = 1;

//echo "<p>Bienvenido" , $name , "</p>";
//echo "<p>k wea </p>";

if ($name == "Ras"){
    echo "<p>Bienvenido" , $name , "</p>";
}else{
    echo "<p>k wea qliao</p>";
}
for ($i=1; $i<10; $i++){
    echo"<p>",$i,"</p>";
}

$monedas = array ("españa"=>"euros", "francia"=>"euros");
$monedas2 = ["españa"=>"euros", "francia"=>"euros"];
foreach ($monedas2 as $clave=>$valor){
    echo "<p>", $clave, "-->>", $valor, "</p>";
}
?>

<h2>sigo...</h2>

<?php
if( isset($_GET["user"])){
    echo "<p>", $_GET["user"] , "</p>";
}

?>

<p>Fin</p>
</body>
</html>


