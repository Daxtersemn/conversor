<?php
class CurrencyConverter {
  private $bolivares;
  private $dolares;

  public function __construct($bolivares, $dolares) {
    $this->bolivares = $bolivares;
    $this->dolares = $dolares;
  }

  public function convertToDollars() {
    return $this->bolivares / 35;
  }

  public function convertToBolivares() {
    return $this->dolares * 35;
  }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $version = $_POST["version"];
  $bolivares = $_POST["bolivares"];
  $dolares = $_POST["dolares"];

  if ($version == "1") {
    $converter = new CurrencyConverter($bolivares, null);
    $result = $converter->convertToDollars();
    echo "<h1>Convertidor de moneda</h1>";
    
  } else if ($version == "2") {
    $converter = new CurrencyConverter(null, $dolares);
    $result = $converter->convertToBolivares();
    echo "<h1>Convertidor de moneda</h1>";

  }
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Convertidor de moneda</title>
    <link rel="stylesheet" type="text/css" href="estilo.css">
</head>
<body>
	<form method="post">
		<label for="version">Selecciona la versión:</label>
		<select name="version" id="version">
			<option value="1">Bolívares a dólares</option>
			<option value="2">Dólares a bolívares</option>
		</select><br><br>

		<label for="bolivares">Bolívares:</label>
		<input type="number" name="bolivares" id="bolivares"><br><br>

		<label for="dolares">Dólares:</label>
		<input type="number" name="dolares" id="dolares"><br><br>

		<input type="submit" value="Convertir">
	</form>
  <h1>Alejandro Rodrigues T2-inf-seccion 1 30478440</h1>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if ($version == "1") {
    echo "<p>$bolivares bolívares son $result dólares.</p>";
  } else if ($version == "2") {
    echo "<p>$dolares dólares son $result bolívares.</p>";
  }
}
?>
</body>
</html> 