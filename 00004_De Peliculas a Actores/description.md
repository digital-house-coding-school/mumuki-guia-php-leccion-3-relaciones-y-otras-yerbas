Vamos a seguir completando la clase `Pelicula`, en este caso para indicar su relación con la clase `Actor`.

Para esto, te pedimos que agregues un método llamado `actores` que retornará los actores asociados mediante el método `$this->belongsToMany` ya que la relación en este caso es de muchos a muchos.

No olvides que `belongsToMany` recibe cuatro parámetros:

1. El nombre de la clase a retornar en un string. Si la clase relacionada se llamase `Sarasa` habría que esribir **"App\Sarasa"**
2. El nombre de la clave tabla intermedia que compone a la relación.
3. El nombre de la clave foránea que apunta a la clase en la que estamos parados. En este caso, la clave foránea a la tabla de peliculas
4. El nombre de la clave foránea que apunta a la relación que estamos armando. En este caso, la clave foránea a la tabla de actores.


Como un recuerdo, la tabla intermedia se llama **actor_movie** y tiene 3 columnas:

1. id
2. actor_id
3. movie_id
