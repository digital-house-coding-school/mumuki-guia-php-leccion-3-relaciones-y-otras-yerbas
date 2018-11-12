class PeliculasController extends Controller {
  public function almacenar(Request $req) {
    $this->validate($req,[
      "title" => "required|max:255|unique:movies,title",
      "rating" => "required|numeric|min:0|max:10",
      "awards" => "required|integer|min:0"
    ]);
    
    $pelicula = new Pelicula();
    $pelicula->title = $req["title"];
    $pelicula->rating = $req["rating"];
    $pelicula->awards = $req["awards"];
    
    $pelicula->save();
  
    return redirect("peliculas/listado");
  }
}