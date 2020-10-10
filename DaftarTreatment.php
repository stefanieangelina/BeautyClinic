<?php
    include("conn.php");

    if(isset($_POST["daftar"])) {
        $isi = true;
        if(empty($_POST['nama']) || empty($_POST['nomorHp']) || empty($_POST['tanggal']) 
            || empty($_POST['pembayaran'] || empty($_POST['perawatan']))){
            $isi = false;
        }

        if($isi == true){
            // input pelanggan
            $sql = "SELECT * FROM PELANGGAN";
            $result = $conn->query($sql);
            $idx = $result->num_rows + 1;
            $nama = $_POST["nama"];
            $nomorHp = $_POST["nomorHp"];
            $idMember = $_POST["idMember"];
            $pembayaran = $_POST['pembayaran'];
            $idPerawatan = $_POST['perawatan'];

            $queryinsert = "INSERT INTO PELANGGAN(ID_PELANGGAN , NAMA_PELANGGAN, TELEPON_PELANGGAN, ID_MEMBER) 
                VALUES('$idx', '$nama', '$nomorHp', '$idMember')";
            $ins = mysqli_query($conn , $queryinsert);
            
            // input htrans
            $sql = "SELECT * FROM HTRANS";
            $result = $conn->query($sql);
            $idx2 = $result->num_rows + 1;
            $harga = 0;
            $jenisTreatment = $_POST["jenisTreatment"];
            if($jenisTreatment == "TR001"){
                $harga = 350000;
            } else if($jenisTreatment == "TR002"){
                $harga = 250000;
            } else{
                $harga = 550000;
            }
            $tanggal = $_POST["tanggal"];

            $queryinsert = "INSERT INTO HTRANS(ID_TRANS , TOTAL_TRANS, TANGGAL_TRANS, ID_PELANGGAN, ID_PERAWATAN, PEMBAYARAN, STATUS_TRANS) 
                VALUES('$idx2', $harga, '$tanggal', '$idx', '$idPerawatan','$pembayaran', '0')";
            $ins = mysqli_query($conn , $queryinsert);

            // input dtrans
            $queryinsert = "INSERT INTO DTRANS(ID_TRANS , ID_PERAWATAN) 
                VALUES('$idx2', '$jenisTreatment')";
            $ins = mysqli_query($conn , $queryinsert);

            echo "<script>alert('Berhasil mendaftar!')</script>";
        } else {
            echo "<script>alert('Gagal mendaftar!')</script>";
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
        <div class="gambar"><img src="asset/BC.png" width="500px" height="100px" left="32%"></div>
        <div class="card">
            <form method="post">
                <!-- Nomor Pelanggan &nbsp; &nbsp; &nbsp; : 
                    <input type="text" placeholder="No. Pelanggan"><br> -->
                Nomor Member   &nbsp;  &nbsp; &nbsp; &nbsp; : 
                    <input name="idMember" type="text"> <br> 
                Nama Lengkap    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : 
                    <input name="nama" type="text"> <br>
                Nomor Handphone &nbsp; : 
                    <input name="nomorHp" type="text"> <br>
                Jam dan tanggal &nbsp; &nbsp; &nbsp; &nbsp; : 
                    <input name="tanggal" type="datetime-local"><br> 
                Jenis Treatment &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: 
                <select name="jenisTreatment">
                    <option value="TR001">Face Care</option>
                    <option value="TR002">Acne Care</option>
                    <option value="TR003">Sensitive Allergy Atopy</option>
                </select>
                <select name="pembayaran">
                    <option value="Tunai">Tunai</option>
                    <option value="Debit">Debit</option>
                </select>
                <br><br/>
                <center><button name="daftar" type="submit" class="btn btn-info">Daftar</button></center>
            </form>
        </div>
    </div>
</body>
</html>