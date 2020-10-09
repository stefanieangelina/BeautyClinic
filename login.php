<?php
    include("conn.php");
    session_start();

    if(isset($_POST["login"])) {
        $username = $_POST["username"];
        $pass = $_POST["password"];
        $sql = "SELECT * FROM STAFF WHERE NAMA_STAFF='$username'";
        $result = $conn->query($sql);
    
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                if ($row["PASSWORD_STAFF"] == $pass) {
                    echo "<script>alert('Selamat datang!')</script>";
                    
                    if($row["JABATAN_STAFF"] == "Beauty operator"){
                        header("location: OpratorPage.php");
                    } else if($row["JABATAN_STAFF"] == "Beautician"){
                        header("location: AssistantPage.php");
                    } else if($row["JABATAN_STAFF"] == "Beautician assistant"){
                        // header("location: home.php");
                    } else if($row["JABATAN_STAFF"] == "Admin"){
                        header("location: AdminPage.php");
                    }
                } else {
                    echo "<script>alert('Password yang Anda masukan salah!')</script>";
                }
            }
        } else {
            echo "<script>alert('username tidak ada')</script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beauty Clinic</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!-- <link rel="stylesheet" type="text/css" href="style.css"> -->
    <link href='Asset/logoBC.png' rel='shortcut icon'>
    <style>
        .btn-whatever{
            background-color: #ff78fd ;
            color: white;
            width: 100%
        }
        .container {
            width: 100%;
            height: 100%;
        }

        .card{
            position: absolute;
            top: 32%;
            left: 32%;
            width: 500px;
            height: 250px;
            padding: 20px;
            border-color: solid black 1px
        }

        .gambar{
            position : absolute;
            left: 31%;
            top: 5%;
            width:"500px";
            height: "100px";
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="gambar"><img src="Asset/BC.png" width="500px" height="150px"></div>
        <div class="card">
            <center><h2>Login</h2> <br/>
            <form method="post">
                <div class="form-group"><input name="username" type="text" class="form-control" placeholder="Username"/></div>
                <div class="form-group"><input name="password" type="password" class="form-control" placeholder="Password"/></div>
                <button name="login" type="submit" class="btn btn-whatever">Login</button>
                <!-- <button name="register" type="submit" class="btn btn-info">Register</button>  -->
            </center>
            </form>
        </div>
    </div>
</body>
</html>