<!DOCTYPE html>
<html>
<head>
    <title>Login Operator</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Login Operator</h2>

<form action="proses_operator.php" method="POST">
    Username :
    <input type="text" name="username" required>
    <br><br>

    Password :
    <input type="password" name="password" required>
    <br><br>

    <button type="submit">Login</button>
</form>

<br>
<a href="login_member.php">Login Sebagai Member</a>

</body>
</html>
