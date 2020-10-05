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
<h1>Hier kann man sich Anmelden</h1>
<form method="post">
  <div>
    <fieldset>
      <h3>Bitte geben Sie folgendes ein:</h3>
      <div>
        <label>Benutzername:</label>
        <input type="text" name="name">
        <br>
        <label>Passwort:</label>
        <input type="password" name="passwort">
        <br><br>
        <input type="submit" value="Abgeben">
    </div>
    </fieldset>
  </div>
</form>
<div>
  <p>wenn Sie noch nich registriert sind, auf was warten sie??</p>
  <a href="./registrierung_script.php">Registrieren</a>
</div>
</body>
<div>
  <p>Und hier zur webseite ohne sich anzumelden</p>
  <a href="./homePage_Script.html">GO</a>
</div>
</body>
<?PHP
if (isset($_POST['name']) && $_POST['name'] != ""  && isset($_POST['passwort']) && $_POST['passwort'] != "") {
  $name =  $_POST['name'];
  $passwort = hash("sha384", $_POST['passwort']);
  $result = $name . ";" . $passwort;

  $loggedIn = false;

  if (($handle = fopen("data.csv", "r")) !== FALSE) {
    //performanter
    while (($data = fgetcsv($handle, 1000, "\n")) !== FALSE) {
      if($data[0] == $result) {
        $loggedIn = true;
        break;
      }
    }
    /*
     * wäre prinzipiell egal in diesem fall
    $file = file_get_contents('');
    if(strpos($file, $result)) {

    }
    */
    fclose($handle);
    if($loggedIn == true) {
      session_start();
      $_SESSION["name"] = $name;
      $_SESSION["passwort"] = $passwort;
      $_SESSION["loggedIn"] = $loggedIn;
      echo "<script>alert('Sie konnten sich erfolgreich anmelden')</script>";
      echo '<script type="text/javascript">window.location.href="homePage_Script.html";</script>';
      die();
    } else {
      echo "<script>alert('Anmelde Daten könnten falsch sein, überprüfe die nochmal')</script>";
      $_SESSION = array();
    }
  }
}
?>
