<?php
class Consulta
{
  public function listarPeliculas($bd, $movies)
  {
    $sql = "select * from $movies";
    $query = $bd->prepare($sql);
    $query->execute();
    $peliculas = $query->fetchAll(PDO::FETCH_ASSOC);
    return $peliculas;
  }
  public function listarGeneros($bd, $genres)
  {
    $sql = "select * from $genres";
    $query = $bd->prepare($sql);
    $query->execute();
    $generos = $query->fetchAll(PDO::FETCH_ASSOC);
    return $generos;
  }
  public function guardarPelicula($bd, $movies, $pelicula)
  {
    $sql = "insert into $movies (title,rating,awards,release_date,length,genre_id) values (:title,:rating,:awards,:release_date,:length,:genre_id)";
    $query = $bd->prepare($sql);
    $query->bindValue(':title', $pelicula->getTitle());
    $query->bindValue(':rating', $pelicula->getRating());
    $query->bindValue(':awards', $pelicula->getAwards());
    $query->bindValue(':release_date', $pelicula->getReleaseDate());
    $query->bindValue(':length', $pelicula->getLength());
    $query->bindValue(':genre_id', $pelicula->getGenre());
    $query->execute();
    header('location:index.php');
  }
  public function detallePelicula($bd, $movies, $genres, $id)
  {
    $sql = "select $movies.*,$genres.name from $movies,$genres where $movies.genre_id =$genres.id and $movies.id = $id";
    $query = $bd->prepare($sql);
    $query->execute();
    $pelicula = $query->fetch(PDO::FETCH_ASSOC);

    return $pelicula;
  }
  public function buscarPelicula($bd, $tabla, $busqueda)
  {
    $sql = "select * from $tabla where title like :busqueda";
    $query = $bd->prepare($sql);
    $query->bindValue(':busqueda', "%" . $busqueda . "%");
    $query->execute();
    $peliculas = $query->fetchAll(PDO::FETCH_ASSOC);
    return $peliculas;
  }
  public function borrarpelicula($bd, $movies, $id)
  {
    $sql = "delete from $movies where id = :id";
    $query = $bd->prepare($sql);
    $query->bindvalue(':id', $id);
    $query->execute();
  }
  public function actualizarPelicula($bd, $movies, $pelicula, $id)
  {
    $sql = "update $movies set title=:title,rating=:rating,awards=:awards,release_date=:release_date, length=:length,genre_id=:genre_id where $movies.id=$id";
    $query = $bd->prepare($sql);
    $query->bindValue(':title', $pelicula->getTitle());
    $query->bindValue(':rating', $pelicula->getRating());
    $query->bindValue(':awards', $pelicula->getAwards());
    $query->bindValue(':release_date', $pelicula->getReleaseDate());
    $query->bindValue(':length', $pelicula->getLength());
    $query->bindValue(':genre_id', $pelicula->getGenre());
    $query->execute();
    header('location:index.php');
  }
}
