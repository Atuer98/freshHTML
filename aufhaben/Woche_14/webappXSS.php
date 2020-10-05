<!doctype html>
<style>
  body{
    background-color: #b3d4fc;
    text-align: center;
    font-family: "Cooper Black";
    font-size: 25px;
  }
  div{
    border: #cb798d 3px solid;
  }
</style>
<body>
<h1>Registrierung</h1>
<form method="post">
  <div>
    <fieldset>
      <h3>Hier erfolgt die registrierung</h3>
      <p>Geben Sie bitte folgendes ein!</p>
      <br>
      <div>
        <label>Benutzername:<br>
          <input type="text" name="name">
          <br>
          <label>Passwort:</label><br>
          <input type="password" name="passwort">
      </div>
      <br><br>
      <input type="submit" value="Abgeben">
    </fieldset>
  </div>
</form>
</body>
<?PHP
if (isset($_POST['name']) && isset($_POST['passwort'])) {
  //htmlspecialchars, strip_tags() -> php sanitize input
  $name = htmlspecialchars( $_POST['name']); //mit der benutzung von htmlspecialchars kann kein script ausgeführt werden
  $passwort = hash("sha384", $_POST['passwort']);
  $file = 'data.csv';
  $eingabe = $name . ';' . $passwort . "\n";

  if (file_put_contents($file, $eingabe, FILE_APPEND )) {
    echo "<script>alert('Registrierung erfolgreich abgeschlossen') </script>";
    echo '<script type="text/javascript">window.location.href="anmelde_Script.php";</script>';
  }
  die();
}
?>
