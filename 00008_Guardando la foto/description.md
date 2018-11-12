**Aclaración: En este ejercicio no es necesario que agregues la línea `use App\Pelicula;` Podes asumir que ya esta incluido el archivo**

Esta vez el validado y el guardado de la película ya viene armado ya que ... ya lo hicimos.

En este caso, vamos a considerar que en el formulario para ingresar una película se incluye también el siguiente campo:

``` html
<input type="file" name="poster">
```

A su vez, se agregó en la tabla de películas en la base de datos una columna, también llamada poster.

> Tu trabajo es modificar el método `almacenar` para que también guarde la foto en la carpeta **public** y le asigne el nombre del archivo a la columna poster en la base de datos antes de ejecutar el método `save`

¡Éxitos!
