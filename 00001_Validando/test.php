public function testInsert(): void {
  global $pasePorRedirect;
  global $request;
  global $pasePorSave;
  
  $request = new Request();
  
  $this->assertTrue(method_exists("PeliculasController",'almacenar'),"Falta el método almacenar dentro de PeliculasController");
  
  $r = new ReflectionMethod("PeliculasController", "almacenar");
  $params = $r->getParameters();
  
  $this->assertTrue(count($params) === 1, "El método almacenar debe recibir un parámetro");
  
  $this->assertTrue($params[0]->getType() !== null && $params[0]->getType()->getName() === "Request", "El parámetro recibido por almacenar debe ser de tipo Request");
  
  $pasePorRedirect = false;
  
  $pc = new PeliculasController();
  
  $request->title = "El rey león";
  $request->rating = 9.2;
  $request->awards = 5;
  
  try {
    $resul = $pc->almacenar($request);
  } catch(Exception $e) {
    $this->assertTrue(false, $e->getMessage());
  }
  
  $request->title = "Wall-e";
  $request->rating = 8.1;
  $request->awards = 4;
  
  try {
    $resul = $pc->almacenar($request);
  } catch(Exception $e) {
    $this->assertTrue(false, $e->getMessage());
  }
  
  $this->assertTrue($pasePorSave, "Mmm...parecería que no estas almacenando nada");
  
  $this->assertTrue($pasePorRedirect, "Parecería que no estas llamando a la función redirect");
  
  $this->assertTrue(is_string($resul), "¿Estas retornando el resultado de la funcion redirect?");
  
  
}