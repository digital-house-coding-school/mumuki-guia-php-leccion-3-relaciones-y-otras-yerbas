Vamos a seguir completando la clase `Pelicula`, en este caso para indicar su relación con la clase `Genero`.

Para esto, te pedimos que agregues un método llamado `genero` que retornará el género asociado mediante el método `$this->belongsTo`.

No olvides que `belongsTo` recibe dos parámetros:

1. El nombre de la clase en un string. Si la clase relacionada se llamase `Sarasa` habría que esribir **"App\Sarasa"**
2. El nombre de la clave foránea. En este caso la clave es **genre_id**
