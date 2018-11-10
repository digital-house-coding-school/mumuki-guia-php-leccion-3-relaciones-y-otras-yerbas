public function testPelicula(): void {
  $pelicula = new Pelicula();
  
  $this->assertTrue($pelicula->getTable() === "movies", "La tabla de la tabla de peliculas debe llamarse 'movies'");
  
  $this->assertTrue($pelicula->getPrimaryKey() === "id", "La primary key de la tabla de peliculas debe llamarse 'id'"); 
  
  $this->assertTrue($pelicula->getTimestamps() === true, "Es necesario aclarar que la tabla de generos si tiene los timestamps");
  
  $this->assertTrue(is_array($pelicula->getGuarded()), "El atributo guarded debe ser un array");
  
  $this->assertTrue($pelicula->getGuarded() === [], "El atributo guarded debe ser un array vacío para que todas las columnas de la tabla sean escribibles");
  
  $this->assertTrue(method_exists("Pelicula", "esRecomendada"), "Falta el método esRecomendada en la clase Pelicula");
  
  $pelicula->rating = 9;
  
  $this->assertTrue($pelicula->esRecomendada() === true, "Una película con rating 9 debería retornar true al preguntar si es es recomendada");
  
  $pelicula->rating = 7.9;
  
  $this->assertTrue($pelicula->esRecomendada() === false, "Una película con rating 7.9 debería retornar false al preguntar si es es recomendada");
  
  $this->assertTrue(method_exists("Pelicula", "genero"), "Falta el método genero en la clase Pelicula");
  
  $genero = $pelicula->genero();
  
  $this->assertTrue($pelicula->belongsTo, "La función genero debe llamar a belongsTo");
  
  $this->assertTrue(is_array($genero) && count($genero) == 2,"Recordá que el método genero debe RETORNAR el resultado de belongsTo");
  
  $this->assertTrue(is_string($genero[0]), "El primer parámetro enviado a belongsToMany debe ser un string");
  
  $this->assertTrue(is_string($genero[1]), "El segundo parámetro enviado a belongsToMany debe ser un string");
  
  $this->assertTrue($genero[0] === "App\Genero", "Se esperaba que el primer parámetro recibido por belongsTo diga 'App\Genero'");
  
  $this->assertTrue($genero[1] === "genre_id", "Se esperaba que el segundo parámetro recibido por belongsTo diga 'genre_id'");
  
  $actores = $pelicula->actores();
  
  $this->assertTrue($pelicula->belongsToMany, "La función actores debe llamar a belongsToMany");
  
  $this->assertTrue(is_array($actores) && count($actores) == 4,"Recordá que el método actores debe RETORNAR el resultado de belongsToMany");
  
  $this->assertTrue(is_string($actores[0]), "El primer parámetro enviado a belongsTo debe ser un string");
  
  $this->assertTrue(is_string($actores[1]), "El segundo parámetro enviado a belongsTo debe ser un string");
  
    $this->assertTrue(is_string($actores[2]), "El tercer parámetro enviado a belongsToMany debe ser un string");
  
  $this->assertTrue(is_string($actores[3]), "El cuarto parámetro enviado a belongsToMany debe ser un string");
  
  $this->assertTrue($actores[0] === "App\Actor", "Se esperaba que el primer parámetro recibido por belongsToMany diga 'App\Actor'");
  
  $this->assertTrue($actores[1] === "actor_movie", "Se esperaba que el segundo parámetro recibido por belongsToMany diga 'actor_movie' haciendo referencia a la tabla intermedia");
  
  $this->assertTrue($actores[2] === "movie_id", "Se esperaba que el tercer parámetro recibido por belongsToMany diga 'movie_id' haciendo referencia a la clave foránea a la clase Pelicula");
  
  $this->assertTrue($actores[3] === "actor_id", "Se esperaba que el cuarto parámetro recibido por belongsToMany diga 'actor_id' haciendo referencia a la clave foránea a la clase Actor");
}