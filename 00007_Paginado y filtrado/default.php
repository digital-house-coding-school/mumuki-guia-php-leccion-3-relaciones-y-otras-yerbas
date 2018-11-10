class PeliculasController extends Controller {
  public function buenasPeliculas() {
    $peliculas = Pelicula::where("rating", ">", "8")->get();
    return view("buenasPeliculas", compact("peliculas"));
  }
}