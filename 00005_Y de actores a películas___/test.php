public function testActor(): void {
  $actor = new Actor();
  
  $this->assertTrue($actor->getTable() === "actors", "La tabla de la tabla de actores debe llamarse 'actors'");
  
  $this->assertTrue($actor->getPrimaryKey() === "id", "La primary key de la tabla de actores debe llamarse 'id'"); 
  
  $this->assertTrue($actor->getTimestamps() === true, "Es necesario aclarar que la tabla de actores si tiene los timestamps");
  
  $this->assertTrue(is_array($actor->getGuarded()), "El atributo guarded debe ser un array");
  
  $this->assertTrue($actor->getGuarded() === [], "El atributo guarded debe ser un array vacío para que todas las columnas de la tabla sean escribibles");
  
  $this->assertTrue(method_exists("Actor", "peliculas"), "Falta el método peliculas en la clase Actor");
  
  $peliculas = $actor->peliculas();
  
  $this->assertTrue($actor->belongsToMany, "La función peliculas debe llamar a belongsToMany");
  
  $this->assertTrue(is_array($peliculas) && count($peliculas) == 4,"Recordá que el método peliculas debe RETORNAR el resultado de belongsToMany");
  
  $this->assertTrue(is_string($peliculas[0]), "El primer parámetro enviado a belongsToMany debe ser un string");
  
  $this->assertTrue(is_string($peliculas[1]), "El segundo parámetro enviado a belongsToMany debe ser un string");
  
    $this->assertTrue(is_string($peliculas[2]), "El tercer parámetro enviado a belongsToMany debe ser un string");
  
  $this->assertTrue(is_string($peliculas[3]), "El cuarto parámetro enviado a belongsToMany debe ser un string");
  
  $this->assertTrue($peliculas[0] === "App\Pelicula", "Se esperaba que el primer parámetro recibido por belongsToMany diga 'App\Pelicula'");
  
  $this->assertTrue($peliculas[1] === "actor_movie", "Se esperaba que el segundo parámetro recibido por belongsToMany diga 'actor_movie' haciendo referencia a la tabla intermedia");
  
  $this->assertTrue($peliculas[2] === "actor_id", "Se esperaba que el tercer parámetro recibido por belongsToMany diga 'actor_id' haciendo referencia a la clave foránea a la clase Actor");
  
  $this->assertTrue($peliculas[3] === "movie_id", "Se esperaba que el cuarto parámetro recibido por belongsToMany diga 'movie_id' haciendo referencia a la clave foránea a la clase Pelicula");
}