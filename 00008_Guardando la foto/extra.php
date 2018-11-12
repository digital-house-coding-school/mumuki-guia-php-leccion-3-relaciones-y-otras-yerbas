$pasePorView = false;
$pasePorRedirect = false;
$pasePorSave = false;
$pasePorValidate = false;

$id = null;

$request = null;

function view($route, $vac = []) {
  global $pasePorView;
  
  $pasePorView = true;
  
  if ($route == "peliculasAceptables") {

    
  } else {
    
  }
  
  return $route;
}

function redirect($route) {
  global $pasePorRedirect;
  
  $pasePorRedirect = true;
  
  if ($route == "peliculas/listado" || $route === "/peliculas/listado") {

    
  } else {
    throw new Exception("Tras insertar la película se debería redirigir a la URL /peliculas/listado");
  }
  
  return $route;
}

class Route {
  public static $routesGet = [];
  public static $routesPost = [];

  public static function get($route, $action) {
    $newRoute = [
      "route" => $route,
      "action" => $action
    ];
    
    Route::$routesGet[] = $newRoute;
  }
  
  public static function post($route, $action) {
    $newRoute = [
      "route" => $route,
      "action" => $action
    ];
    
    Route::$routesPost[] = $newRoute;
  }

}

class Controller {
  public function validate(Request $req, Array $reglas, Array $mensajes = []) {
    global $pasePorValidate;
    
    $pasePorValidate = true;
    
    if (count($reglas) != 3) {
      throw new Exception("Recordá que deberías validar 3 campos y por eso, el array de reglas debería tener 3 posiciones");
    }
    
    if (!isset($reglas["title"])) {
      throw new Exception("Falta la regla para validar el campo title");
    }
    if (!isset($reglas["rating"])) {
      throw new Exception("Falta la regla para validar el campo rating");
    }
    if (!isset($reglas["awards"])) {
      throw new Exception("Falta la regla para validar el campo awards");
    }
    
    if (!is_string($reglas["title"])) {
      throw new Exception("Las reglas para validar el título deben estar en formato string");
    }
    if (!is_string($reglas["rating"])) {
      throw new Exception("Las reglas para validar el rating deben estar en formato string");
    }
    if (!is_string($reglas["awards"])) {
      throw new Exception("Las reglas para validar los premios deben estar en formato string");
    }
    
    $reglasTitle = explode("|", $reglas["title"]);
    $reglasRating = explode("|", $reglas["rating"]);
    $reglasAwards = explode("|", $reglas["awards"]);
    
    if (count($reglasTitle) != 3) {
      throw new Exception("Debería haber 3 reglas para validar el titulo separadas por el caracter |");
    }
    
    if (count($reglasRating) != 4) {
      throw new Exception("Debería haber 4 reglas para validar el rating separadas por el caracter |");
    }
    
     if (count($reglasAwards) != 3) {
      throw new Exception("Debería haber 3 reglas para validar el rating separadas por el caracter |");
    }
    
    if (!in_array("required", $reglasTitle)) {
      throw new Exception("Falta la regla required para validar el titulo");
    }
    
    if (!in_array("max:255", $reglasTitle)) {
      throw new Exception("Falta la regla max:255 para validar el titulo");
    }
    
    if (!in_array("unique:movies,title", $reglasTitle)) {
      throw new Exception("Falta la regla unique:movies,title para validar el titulo");
    }
    
    if (!in_array("required", $reglasRating)) {
      throw new Exception("Falta la regla required para validar el rating");
    }
    
    if (!in_array("numeric", $reglasRating)) {
      throw new Exception("Falta la regla numeric para validar el rating");
    }
    
    if (!in_array("min:0", $reglasRating)) {
      throw new Exception("Falta la regla min:0 para validar el rating");
    }
    
    if (!in_array("max:10", $reglasRating)) {
      throw new Exception("Falta la regla max:10 para validar el rating");
    }
    
    if (!in_array("required", $reglasAwards)) {
      throw new Exception("Falta la regla required para validar los premios");
    }
    
    if (!in_array("integer", $reglasAwards)) {
      throw new Exception("Falta la regla integer para validar los premios");
    }
      
    if (!in_array("min:0", $reglasAwards)) {
      throw new Exception("Falta la regla min:0 para validar los premios");
    }
  }
}

class Model {
  public function getPrimaryKey() {
    if (isset($this->primaryKey)) {
      return $this->primaryKey;
    }
    return 'id';
  }
  
  public function getTable() {
    if (isset($this->table)) {
      return $this->table;
    }
    return null;
  }
  
  public function getTimestamps() {
    if (isset($this->timestamps)) {
      return $this->timestamps;
    }
    return true;
  }
  
  public function getGuarded() {
    if (isset($this->guarded)) {
      return $this->guarded;
    }
    return null;
  }
}

class Pelicula extends Model {
  public $rating;
  public $title;

  public static function all() {
    $peli1 = new Pelicula();
    $peli1->id = 1;
    $peli1->title = "Toy Story";
    $peli1->rating = 9.5;
    
    $peli2 = new Pelicula();
    $peli2->id = 2;
    $peli2->title = "Buscando a Nemo";
    $peli2->rating = 8.2;
    
    $peli3 = new Pelicula();
    $peli3->id = 3;
    $peli3->title = "Cars";
    $peli3->rating = 7.0;
    
    return [$peli1, $peli2, $peli3];
  }
  
  public static function find($id) {
    $peliculas = Pelicula::all();
    return $peliculas[$id - 1];
  }
  
  public static function where($col, $operador, $value = null) {
    $consulta = new Consulta("movies");
    $consulta->where($col, $operador, $value);
    
    return $consulta;
  }
  
  public static function orderBy($col, $order = "ASC") {
    $consulta = new Consulta("movies");
    $consulta->orderBy($col, $order);
    
    return $consulta;
  }
  
  public function save() {
    global $request;
    global $pasePorSave;
    global $pasePorValidate;
    
    if (!$pasePorValidate) {
      throw new Exception("Deberías realizar la validación antes del llamado a save");
    }
    
    $pasePorSave = true;
    
    if (!isset($this->title)) {
      throw new Exception("La película que esta siendo almacenada no tiene título");
    }
    if ($this->title !== $request->title) {
      throw new Exception("La película que esta siendo almacenada no tiene el título dado en el request");
    }
    
    if (!isset($this->rating)) {
      throw new Exception("La película que esta siendo almacenada no tiene rating");
    }
    if ($this->rating !== $request->rating) {
      throw new Exception("La película que esta siendo almacenada no tiene el rating dado en el request");
    }
    
    if (!isset($this->awards)) {
      throw new Exception("La película que esta siendo almacenada no tiene premios");
    }
    if ($this->awards !== $request->awards) {
      throw new Exception("La película que esta siendo almacenada no tiene los premios dado en el request");
    }
    
    if (!isset($this->poster)) {
      throw new Exception("La película que esta siendo almacenada no tiene poster");
    }
    if ($this->poster !== $request->poster) {
      throw new Exception("La película que esta siendo almacenada no tiene asignada el poster que fue almacenado");
    }
  }
  
  public function delete() {
  
  }
}

class Consulta {
  public $where = [];
  public $order = [];
  public $table;
  public $get = false;
  
  public function __construct($table) {
    $this->table = $table;
  }
  
  public function where($col, $operador, $value = null) {
    if ($value === null) {
      $value = $operador;
      $operador = "=";
    }
    
    $where = [$col, $operador, $value];
    $this->where[] = $where;
    return $this;
  }

  public function orderBy($col, $order = "ASC") {
    $this->order[] = [$col, $order];
    return $this;
  }
  
  public function get() {
    $this->get = true;
    return $this;
  }
}

class Request implements ArrayAccess {
  public $pasePorFile = false;
  public $pasePorStore = false;
  
  public function offsetExists($offset) {
    return isset($this->$offset);
  }

  public function offsetGet($offset) {
    return $this->$offset;
  }

  public function offsetSet($offset , $value) {
    $this->$offset = $value;
  }

  public function offsetUnset($offset) {
    unset($this->$offset);
  }
  
  public function file($name) {
    $this->pasePorFile = true;
    
    if (!is_string($name)) {
      throw new Exception("El método file debería recibir un string");
    }
    
    if ($name !== "poster") {
      throw new Exception("El input del formulario se llama 'poster' para enviar el archivo");
    }
    
    return $this;
  }
  
  public function store($name) {
    $this->pasePorStore = true;
    
    if (!$this->pasePorFile) {
      throw new Exception("El método store debería ejecutarse luego del método file");
    }
    
    if (!is_string($name)) {
      throw new Exception("El método store debería recibir un string");
    }
    
    if ($name !== "public") {
      throw new Exception("Deberías almacenar el archivo en la carpeta public");
    }
    
    return "/public/" . $this->poster;
  }
}