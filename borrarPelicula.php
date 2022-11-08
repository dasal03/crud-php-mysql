<?php
require_once('loader.php');
$consulta->borrarPelicula($bd, 'movies', $_GET['id']);
header('location:index.php');
