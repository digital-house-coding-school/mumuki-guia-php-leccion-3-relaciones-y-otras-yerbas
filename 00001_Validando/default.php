class PeliculasController extends Controller {
  public function almacenar(Request $req) {
    $pelicula = new Pelicula();
    $pelicula->title = $req["title"];
    $pelicula->rating = $req["rating"];
    $pelicula->awards = $req["awards"];
    
    $pelicula->save();
    
    return redirect("peliculas/listado");
  }
}