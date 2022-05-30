<?php  
if (!isset($_SESSION['admin']) and $_SESSION['admin'] != 'nafi7457@gmail.com') {
    # code...
    header("location:admin.php");
}
else {
    # code...
}
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<input type="text" name="fname" placeholder="full name" id="full-name">
<span class="text-capitalize" style=<?=$nameErr?> id="spanErr">full name required</span>

<input type="mail" name="email" placeholder="email" id="signup-email">
<span class="text-capitalize" style=<?=$emailErr?> id="spanErr">email required</span>

<input type="text" name="number" placeholder="phone number" id="number">
<span class="text-capitalize" style=<?=$numberErr?> id="spanErr">phone number required</span>

<input type="password" name="password" placeholder="password" id="password">
<span class="password text-capitalize" id="spanErr"></span>

<input type="password" name="conf" placeholder="confirm password" id="conf-password">
<span class="text-capitalize" id="spanErr" style=<?=$passErr?>>password not match</span>
</body>
</html>