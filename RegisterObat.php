<?php
    include("conn.php");
    session_start();

    if(isset($_POST["register"])) {
        $isi = true;
        if(empty($_POST['nama']) || empty($_POST['harga']) 
            || empty($_POST['stok']) || empty($_POST['perawatan'])){
            $isi = false;
        }

        if($isi == true){
            $nama = $_POST["nama"];
            $harga = $_POST["harga"];
            $stok = $_POST["stok"];
            $perawatan = $_POST["perawatan"];

            //$sql = "SELECT * FROM STAFF WHERE JABATAN_STAFF='$jabatan'";
            $sql = "SELECT * FROM OBAT";
            $result = $conn->query($sql);
            $idx = $result->num_rows + 1;
            
            //$idx2 = $perawatan . "00" . $idx;
            
            $queryinsert = "INSERT INTO OBAT(ID_OBAT , NAMA_OBAT, STOK_OBAT, STATUS_OBAT) 
                VALUES('$idx', '$nama', $stok, '1')";
            $ins = mysqli_query($conn , $queryinsert);

            echo "<script>alert('Berhasil menambahkan obat baru!')</script>";
        } else {
            echo "<script>alert('Gagal mendaftarkan obat baru!')</script>";
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
    <form action="MasterObat.php" method="post">
        <button type="submit" class="btn btn-info">BACK</button>
    </form>
    <div class="container">
        <div class="card">
            <center><h2>Register Obat</h2> 
            <form method="post">
                <input name="nama" type="text" placeholder="Nama Obat"/> <br/> 
                <input name="harga" type="text" placeholder="Harga Obat"/> <br/> 
                <input name="stok" type="number" placeholder="Stok" min="1"/> <br/> 
                <select name="perawatan" class="custom-select" style="width:200px">
                    <option value="AC">Acne Care</option>
                    <option value="FA">Face Care</option>
                    <option value="SK">Sensitive Allergy Atopy</option>
                </select> <br/><br/>
                <button name="register" type="submit" class="btn btn-info">Register</button> 
            </center>
            </form>
        </div>
    </div>
</body>
</html>