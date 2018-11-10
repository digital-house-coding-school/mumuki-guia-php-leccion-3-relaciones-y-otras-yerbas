**Aclaración: En este ejercicio no es necesario que agregues la línea `use App\Pelicula;` Podes asumir que ya esta incluido el archivo**

¿Sabías que se puede complementar el paginado con un filtro where o con un orderBy?

¿Cómo funciona? En vez de terminar la consulta utilizando el método `get` se puede terminar la consulta utilizando el método `paginate`.

Dado esto, te pedimos que modifiques la función `buenasPeliculas` para que envie a la vista películas páginadas de a 10 por página.