<?php
    include("conn.php");
    session_start();

    /*if(isset($_POST['btnInput'])){
        $idx = $_POST['idx'];
        $sql = "UPDATE member SET STATUS_MEMBER='1' WHERE ID_MEMBER='$idx'";
        $result = $conn->query($sql);

        if($result){
            echo "<script>alert('Berhasil mengaktifkan kembali member!')</script>";
        }
    }*/

    if(isset($_POST['btnSelesai'])){
        $idx = $_POST['idx'];
        $sql = "UPDATE HTRANS SET STATUS_TRANS='1' WHERE ID_TRANS='$idx'";
        $result = $conn->query($sql);

        if($result){
            echo "<script>alert('Berhasil menyelesaikan transaksi!')</script>";
        }
    }
    
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
        <form action="OpratorPage.php" method="post">
                <button type="submit" class="btn btn-info">BACK</button>
        </form> <br/>
        <center><h1>Table Appointment</h1></center> 
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th>ID TRANS</th>
                        <th>NAMA</th>
                        <th>TELEPON</th>
                        <th>TANGGAL</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody name="tObat">
                    <?php
                        $sql = "SELECT * FROM HTRANS WHERE STATUS_TRANS='0'";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $idxPelanggan = $row['ID_PELANGGAN'];
                                if($row['STATUS_TRANS'] == "0"){
                            ?>
                                <tr>
                                    <td><?= $row["ID_TRANS"]; ?></td>
                                    <?php
                                        $sql2 = "SELECT * FROM PELANGGAN WHERE ID_PELANGGAN='$idxPelanggan'";
                                        $result = $conn->query($sql2);
                                        $row2= $result->fetch_assoc();
                                    ?>
                                    <td><?= $row2["NAMA_PELANGGAN"]; ?></td>
                                    <td><?= $row2["TELEPON_PELANGGAN"]; ?></td>
                                    <td><?= $row["TANGGAL_TRANS"]; ?></td>
                                    <td>
                                        <form method="post">
                                            <input type="hidden" name="idx" value="<?= $row["ID_TRANS"]; ?>">
                                            <button name="btnInput" type="submit" class="btn btn-info">Input Obat</button>
                                            <button name="btnSelesai" type="submit" class="btn btn-success">SELESAI</button>
                                        </form>
                                    </td>
                                </tr> 
                            <?php
                                }
                            }
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </body>
</html>

