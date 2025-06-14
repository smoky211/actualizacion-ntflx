<?php
// captcha.php
session_start();
$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $answer = trim($_POST["captcha"]);
    if ($answer === "12") {
        header("Location: index.html"); // redirection vers index.html
        exit();
    } else {
        $error = "❌ Mauvaise réponse. Réessaie.";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Vérification humaine</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    body { font-family: Arial; background: #111; color: white; display: flex; justify-content: center; align-items: center; height: 100vh; }
    .box { background: #222; padding: 30px; border-radius: 10px; text-align: center; width: 300px; }
    input, button {
      width: 100%; padding: 10px; margin-top: 10px;
      border-radius: 5px; border: none;
    }
    button {
      background: #e50914; color: white;
      font-weight: bold; cursor: pointer;
    }
    .error { color: #ff5e5e; margin-top: 10px; }
  </style>
</head>
<body>
  <div class="box">
    <h2>🤖 Vérification</h2>
    <form method="POST">
      <label>Combien font 6 + 6 ?</label>
      <input type="text" name="captcha" placeholder="Ta réponse..." required>
      <button type="submit">Valider</button>
    </form>
    <?php if ($error) echo "<div class='error'>$error</div>"; ?>
  </div>
</body>
</html>
