class PeliculasController extends Controller {
  public function listado() {
    $peliculas = Pelicula::all();
    return view("listadoPeliculas", compact('peliculas'));
  }
}