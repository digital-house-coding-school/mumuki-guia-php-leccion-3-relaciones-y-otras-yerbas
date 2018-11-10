class Pelicula extends Model {
  protected $table = "movies";
  protected $guarded = [];
  
  public function esRecomendada() {
     return $this->rating > 8;
  }
  
  public function genero() {
     return $this->belongsTo("App\Genero","genre_id");
  }
}