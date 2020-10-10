<?php
    include("conn.php");
    session_start();

    $idx = $_SESSION['idInput'];

    if(isset($_POST["btnSubmit"])) {
        $isi = true;
        if(empty($_POST['obat']) || empty($_POST['beautician'])){
            $isi = false;
        }

        if($isi == true){
            $obat = implode(",", $_POST['obat']);
            $beautician = $_POST["beautician"];
            
            $queryinsert = "INSERT INTO DTRANS(ID_TRANS , ID_OBAT) 
                VALUES('$idx', '$obat')";
            $ins = mysqli_query($conn , $queryinsert);

            $queryinsert = "UPDATE HTRANS SET ID_BEAUTICIAN='$beautician' WHERE ID_TRANS='$idx'";
            $ins = mysqli_query($conn , $queryinsert);

            echo "<script>alert('Berhasil!')</script>";
        } else {
            echo "<script>alert('Gagal!')</script>";
        }
    }

    // $sql = "SELECT * FROM STAFF WHERE NAMA_STAFF='$username'";
    // $result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <title>Beauty Clinic</title>
    <link href='Asset/logoBC.png' rel='shortcut icon'>
</head>
    <body>
        <br/>
        <div class="container">
            <form action="AssistantPage.php" method="post">
                    <button type="submit" class="btn btn-info">BACK</button>
            </form> <br/>
            <center><h1>Detail Transaksi</h1></center> 
            <?php
                $sql = "SELECT * FROM HTRANS WHERE ID_TRANS='$idx'";
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();

                $idPelanggan = $row['ID_PELANGGAN'];
                $sql2 = "SELECT * FROM PELANGGAN WHERE ID_PELANGGAN='$idPelanggan'";
                $result2 = $conn->query($sql2);
                $row2 = $result2->fetch_assoc();

                $idPerawatan = $row['ID_PERAWATAN'];
                $sql3 = "SELECT * FROM PERAWATAN WHERE ID_PERAWATAN = '$idPerawatan'";
                $result3 = $conn->query($sql3);
                $row3 = $result3->fetch_assoc();

                $sql4 = "SELECT * FROM STAFF WHERE JABATAN_STAFF = 'Beautician'";
                $result4 = $conn->query($sql4);
                $row4 = $result4->fetch_all();

                if($idPerawatan == "TR001"){
                    $sql5 = "SELECT * FROM OBAT WHERE ID_OBAT LIKE 'FA%'";
                } else if($idPerawatan == "TR002"){
                    $sql5 = "SELECT * FROM OBAT WHERE ID_OBAT LIKE 'AC%'";
                } else if ($idPerawatan == "TR003") {
                    $sql5 = "SELECT * FROM OBAT WHERE ID_OBAT LIKE 'SK%'";
                }
                $result5 = $conn->query($sql5);
                $row5 = $result5->fetch_all();
            ?>
            ID Transaksi: <?= $row['ID_TRANS']; ?> <br/>
            Tanggal Transaksi:<?= $row['TANGGAL_TRANS']; ?> <br/>

            Nama Pelanggan: <?= $row2['NAMA_PELANGGAN']; ?> <br/>
            Nomor Telepon Pelanggan: <?= $row2['TELEPON_PELANGGAN']; ?> <br/>

            Perawatan: <?= $row3['NAMA_PERAWATAN']; ?> <br/>
            Nama Beautician:
            <select name="beautician">
                <?php for ($i=0; $i < 4; $i++) { ?>
                    <option value="<?= $row4[$i][0]; ?>"><?= $row4[$i][1]; ?></option>
                <?php } ?>
            </select> <br/>
            Obat: <br/>
            <?php for ($i=0; $i < 5; $i++) { ?>
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                <input type="checkbox" name="obat[]" value="<?= $row5[$i][0]; ?>">
                &nbsp; <label><?= $row5[$i][1]; ?></label><br/>
            <?php } ?>
            Harga: Rp <?= $row['TOTAL_TRANS']; ?> <br/>
            <button type="submit" name="btnSubmit" class="btn btn-warning">Update</button>
        </div>
    </body>
</html>

