<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login php</title>
    <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      margin: 0;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
    }

    .styled-button {
      background-color: #3498db;
      color: #fff;
      padding: 15px 30px;
      border: none;
      border-radius: 4px;
      font-size: 18px;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    .styled-button:hover {
      background-color: #2980b9;
    }
  </style>
    
</head>
<body>
<button class="styled-button" onclick="goToAnotherPage()">Grįžti atgal į pagrindinį puslapį!</button>

<script>
  function goToAnotherPage() {
    // js funkcija paspaudus sugrįžti į pagrindinį puslapį.
    window.location.href = "index.php";
  }
</script>
<?php
// Formos tikrinimas
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Patikrinimas ar įvesti duomenys atitinka jau nurodytus
    if ($username === "test" && $password === "123") {
        // gavus tinkamus duomenis, vartotojas perkeliamas
        header("Location: edit-form.php");
        exit();
    } else {
        echo '<script>alert("Invalid username or password. Please try again.");</script>';
    }
}
?>
</body>
</html>
