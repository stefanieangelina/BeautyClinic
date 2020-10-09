<?php
    include("conn.php");
    session_start();

    if(isset($_POST['btnAktif'])){
        $idx = $_POST['idx'];
        $sql = "UPDATE member SET STATUS_MEMBER='1' WHERE ID_MEMBER='$idx'";
        $result = $conn->query($sql);

        if($result){
            echo "<script>alert('Berhasil mengaktifkan kembali member!')</script>";
        }
    }
    if(isset($_POST['btnNon'])){
        $idx = $_POST['idx'];
        $sql = "UPDATE member SET STATUS_MEMBER='0' WHERE ID_MEMBER='$idx'";
        $result = $conn->query($sql);

        if($result){
            echo "<script>alert('Berhasil menonaktifkan member!')</script>";
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
    
    <title>Beauty Clinic</title>
    <link href='Asset/logoBC.png' rel='shortcut icon'>
</head>
<body>
    <br/>
    <div class="container">
        <form action="AdminPage.php" method="post">
                <button type="submit" class="btn btn-info">BACK</button>
        </form> <br/>
        <center><h1>Table Obat</h1></center> 
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th>NAMA MEMBER</th>
                        <th>ALAMAT MEMBER</th>
                        <th>TELEPON MEMBER</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $sql = "SELECT * FROM MEMBER";
                        $result = $conn->query($sql);
                        $ctr = 1;
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                            ?>
                                <tr>
                                    <td><?= $row["NAMA_MEMBER"]; ?></td>
                                    <td><?= $row["ALAMAT_MEMBER"]; ?></td>
                                    <td><?= $row["TELEPON_MEMBER"]; ?></td>
                                    <td>
                                        <form method="post">
                                            <?php if($row['STATUS_MEMBER'] == "1") {?>
                                                <input type="hidden" name="idx" value="<?= $ctr++ ?>">
                                                <button name="btnNon" type="submit" class="btn btn-danger">Non-aktifkan</button>
                                            <?php } else if($row['STATUS_MEMBER'] == "0"){?>
                                                <input type="hidden" name="idx" value="<?= $ctr++ ?>">
                                                <button name="btnAktif" type="submit" class="btn btn-success">Aktifkan</button>
                                            <?php } ?>
                                        </form>
                                    </td>
                                </tr> 
                            <?php
                            }
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </body>
</body>
</html>

