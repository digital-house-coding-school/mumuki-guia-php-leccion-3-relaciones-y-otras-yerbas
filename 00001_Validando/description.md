**Aclaración: En este ejercicio no es necesario que agregues la línea `use App\Pelicula;` Podes asumir que ya esta incluido el archivo**

Una vez más recibimos el siguiente formulario para realizar la inserción de una película:

``` html
<form action="/peliculas/almacenar" method="POST">
  {{csrf_field}}
  <input type="text" name="title">
  <input type="text" name="rating">
  <input type="text" name="awards">
</form>
``` 

Esta vez sin embargo te vamos a pedir también que lo valides previo a almacenarla. Las reglas de validación serán las siguientes:

> 1. Para el campo **title** queremos que sea obligatorio, con un máximo de 255 caracteres y unico en la tabla **movies** en la columna **title**

> 2. Para el rating queremos que sea obligatorio, numérico, con un mínimo de 0 y un máximo de 10

> 3. Los premios queremos que sea obligatorio y un integer con un mínimo de 0

Te dejamos un link a mano para que puedas revisar las reglas de validación de Laravel:

[https://laravel.com/docs/5.1/validation](https://laravel.com/docs/5.1/validation)