public function testGenero(): void {
  $genero = new Genero();
  
  $this->assertTrue($genero->getTable() === "genres", "La tabla de la tabla de generos debe llamarse 'genres'");
  
  $this->assertTrue($genero->getPrimaryKey() === "id", "La primary key de la tabla de generos debe llamarse 'id'"); 
  
  $this->assertTrue($genero->getTimestamps() === false, "Es necesario aclarar que la tabla de generos no tiene los timestamps");
  
  $this->assertTrue(is_array($genero->getGuarded()), "El atributo guarded debe ser un array");
  
  $this->assertTrue($genero->getGuarded() === [], "El atributo guarded debe ser un array vacío para que todas las columnas de la tabla sean escribibles");
  
  $this->assertTrue(method_exists("Genero", "peliculas"), "Falta el método peliculas en la clase Genero");
  
  $peliculas = $genero->peliculas();
  
  $this->assertTrue($genero->hasMany, "La función peliculas debe llamar a hasMany");
  
  $this->assertTrue(is_array($peliculas) && count($peliculas) == 2,"Recordá que el método peliculas debe RETORNAR el resultado de hasMany");
  
  $this->assertTrue(is_string($peliculas[0]), "El primer parámetro enviado a hasMany debe ser un string");
  
  $this->assertTrue(is_string($peliculas[1]), "El segundo parámetro enviado a hasManny debe ser un string");
  
  $this->assertTrue($peliculas[0] === "App\Pelicula", "Se esperaba que el primer parámetro recibido por hasMany diga 'App\Pelicula'");
  
  $this->assertTrue($peliculas[1] === "genre_id", "Se esperaba que el segundo parámetro recibido por hasMany diga 'genre_id'");
}