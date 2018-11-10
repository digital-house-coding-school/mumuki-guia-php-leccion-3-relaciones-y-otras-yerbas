class Pelicula extends Model {
  protected $table = "movies";
  protected $guarded = [];
  
  public function esRecomendada() {
     return $this->rating > 8;
  }
}