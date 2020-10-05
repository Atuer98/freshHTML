<!doctype html>
<style>
  *{
    box-sizing: border-box;
    text-align: center;
    font-family: "Cooper Black";
    background-color: lavender;
    font-size: 30px;
    padding: 5px;
  }
  option:hover{
    background-color: #cb798d;
  }
  div{
    border: paleturquoise 5px solid;
  }

  textarea {
    margin: 1rem;
    display: block;
    width: 80vw;
    height: 20vh;
  }
  input {
    margin: 1rem;
  }
</style>
<body>
<h1>WWW-Navigator</h1>
<form method="post">
  <fieldset>
    <div>
      <p>Es funktioniert in dem man erst das Thema, dann die Spezialisierung dieses Themas und am ende <br> können Sie einfach das Eingabefeld erweitern und Speichern</p>
      <h3>Wähle einer dieser Oberthemen um die zu ergenzen</h3>
    </div>
      <div>
    <select name="mainTopic">
      <option value="html">HTML</option>
      <option value="css">CSS</option>
      <option value="javascript">JavaScript</option>
      <option value="other">Other</option>
    </select>
    </div>
    <div>
      <p>Jetzt wählen Sie einer der folgenden Unterthemen</p>
    <select name="topic">
    </select>
    </div>
    <div>
      <p>Jetzt können Sie los legen!</p>
    <textarea name="eingabefeld"></textarea>
    <input type="submit" value="Abgeben">
    </div>
  </fieldset>
</form>
</body>
<?PHP
$file = 'wwwNavigator.json';
$contents = file_get_contents($file);
$json = json_decode($contents, true);

if (isset($_POST['mainTopic']) && isset($_POST['topic']) && isset($_POST['eingabefeld'])) {
  $mainTopic = $_POST['mainTopic'];
  $topic = $_POST['topic'];
  $eingabefeld = $_POST['eingabefeld'];
  $json[$mainTopic][$topic] = $eingabefeld;
  if (file_put_contents($file, json_encode($json, true))) {
    echo "<script>alert('Ihre Eingabe wurde gespeichert! Danke')</script>";
  }
}
?>
<script>
    let json = <?PHP echo json_encode($json) ?>;
    const mainTopic = document.querySelector('select[name="mainTopic"]');
    const topic = document.querySelector('select[name="topic"]');
    mainTopic.addEventListener('change',e => {
        Object.keys(json[e.target.value]).forEach(key => {
            const option = document.createElement('option' );
            option.value =key;
            option.innerText =key;
            topic.append( option);
        });
    });
</script>
