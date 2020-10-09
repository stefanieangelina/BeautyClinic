<?php
    include("conn.php");
    session_start();

    if(isset($_POST["register"])) {
        $isi = true;
        if(empty($_POST['username']) || empty($_POST['nomor']) || empty($_POST['alamat'])
            || empty($_POST['jabatan']) || empty($_POST['password'])){
            $isi = false;
        }

        if($isi == true){
            $nama = $_POST["username"];
            $alamat = $_POST["alamat"];
            $nomorHp = $_POST["nomor"];
            $jabatan = $_POST["jabatan"];
            $password = $_POST["password"];

            //$sql = "SELECT * FROM STAFF WHERE JABATAN_STAFF='$jabatan'";
            $sql = "SELECT * FROM STAFF";
            $result = $conn->query($sql);
            $idx = $result->num_rows + 1;
            //$idX2;

            /*if($jabatan == "Admin"){
                $idx2 = "AN00" . $idx ." ";
            } else if($jabatan == "Beautician"){
                $idx2 = "BN00" . $idx;
            } else if($jabatan == "Beauty operator"){
                $idx2 = "BO00" . $idx;
            } else if($jabatan == "Beautician asssistant"){
                $idx2 = "BA00" . $idx;
            }*/
            
            $queryinsert = "INSERT INTO STAFF(ID_STAFF , NAMA_STAFF, ALAMAT_STAFF, TELEPON_STAFF, JABATAN_STAFF, PASSWORD_STAFF, STATUS_STAFF) 
                VALUES('$idx', '$nama', '$alamat', $nomorHp, '$jabatan', '$password', '1')";
            $ins = mysqli_query($conn , $queryinsert);

            echo "<script>alert('Berhasil mendaftarkan staff!')</script>";
        } else {
            echo "<script>alert('Gagal mendaftarkan staff!')</script>";
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
    <form action="MasterStaff.php" method="post">
        <button type="submit" class="btn btn-info">BACK</button>
    </form>
    <div class="container">
        <div class="card">
            <center><h2>Register Staff</h2> 
            <form method="post">
                <input name="username" type="text" placeholder="Nama Lengkap"/> <br/> 
                <input name="alamat" type="text" placeholder="Alamat"/> <br/> 
                <input name="nomor" type="text" placeholder="Nomor Telepon"/> <br/> 
                <select name="jabatan">
                    <option value="Beautician">Beautician</option>
                    <option value="Beauty operator">Beauty Operator</option>
                    <option value="Admin">Admin</option>
                    <option value="Beautician assistant">Beautician Assistant</option>
                </select> <br/>
                <input name="password" type="password" placeholder="Password"/><br/> <br/>
                <button name="register" type="submit" class="btn btn-info">Register</button> 
            </center>
            </form>
        </div>
    </div>
</body>
</html>