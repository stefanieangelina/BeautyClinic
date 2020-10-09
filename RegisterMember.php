<?php
    include("conn.php");
    session_start();

    if(isset($_POST["register"])) {
        $isi = true;
        if(empty($_POST['username']) || empty($_POST['nomor']) || empty($_POST['alamat'])
            || empty($_POST['email'])){
            $isi = false;
        }

        if($isi == true){
            $username = $_POST['username'];
            $alamat = $_POST['alamat'];
            $nomor = $_POST['nomor'];
            $jabatan = $_POST['email'];
    
            $sql = "SELECT * FROM MEMBER";
            $result = $conn->query($sql);
            $idx = $result->num_rows + 1;

            $queryinsert = "INSERT INTO MEMBER(ID_MEMBER , NAMA_MEMBER , ALAMAT_MEMBER , TELEPON_MEMBER , EMAIL_MEMBER, STATUS_MEMBER) 
                VALUES('$idx', '$username', '$alamat', '$nomor', '$jabatan','1')";
            $ins = mysqli_query($conn , $queryinsert);

            echo "<script>alert('Berhasil mendaftarkan member!')</script>";
        } else {
            echo "<script>alert('Gagal mendaftarkan member!')</script>";
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
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href='Asset/logoBC.png' rel='shortcut icon'>
</head>
<body>
    <form action="OpratorPage.php" method="post">
        <button type="submit" class="btn btn-info">BACK</button>
    </form> 

    <div class="container">
        <div class="card">
            <center><h2>Register Member</h2>
            <form method="post">
                <input name="username" type="text" placeholder="Nama Lengkap"/> <br/> 
                <input name="alamat" type="text" placeholder="Alamat"/> <br/> 
                <input name="nomor" type="text" placeholder="Nomor Telepon"/> <br/> 
                <input name="email" type="email" placeholder="Email"/><br/> <br/>
                <button name="register" type="submit" class="btn btn-info">Register</button> 
            </center>
            </form>
        </div>
    </div>
</body>
</html>