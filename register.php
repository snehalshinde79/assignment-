<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php
    include_once "connection.php";
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $email=$_POST['email'];
    $pwd=$_POST['pwd'];
    $res=mysqli_query($sql,"select * from users where email='$email'");
    if (mysqli_num_rows($res)>0)
        exit('0');
    else{
        $res=mysqli_query($sql,"insert into users values(0,'$fname','$lname','$email','$pwd')");
        if ($res){?>
            <div class="container">
                <h3>MY DATA</h3>
                <p>Name: <?php echo $_POST['fname']." ".$_POST['lname']?></p>
                <p>Email: <?php echo $_POST['email'];?></p>
            </div>
    <?php
        }
    }
?>

</body>
</html>

