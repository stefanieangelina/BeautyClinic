<?php
    include("conn.php");
    session_start();

    if(isset($_POST['register'])){
        header("location: RegisterStaff.php");
    }

    if(isset($_POST['btnDelete'])){
        $idx = $_POST['idx'];
        $sql = "UPDATE STAFF SET STATUS_STAFF='0' WHERE ID_STAFF='$idx'";
        $result = $conn->query($sql);

        if($result){
            echo "<script>alert('Berhasil menghapus staff!')</script>";
            header('Location: MasterStaff.php');
        }
    }
    if(isset($_POST['btnEdit'])){
        /*$idx = $_POST['idx'];
        $sql = "UPDATE member SET STATUS_STAFF='0' WHERE ID_STAFF='$idx'";
        $result = $conn->query($sql);

        if($result){
            echo "<script>alert('Berhasil menghapus staff!')</script>";
        }*/
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
        <center><h1>Table Staff</h1></center> 
        <form method="post" style="float:right">
            <button type="submit" name="register" class="btn btn-info">Register New Staff</button>
        </form> <br/> <br/>
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th>ID STAFF</th>
                        <th>NAMA STAFF</th>
                        <th>JABATAN STAFF</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $sql = "SELECT * FROM STAFF WHERE STATUS_STAFF='1'";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                if($row["STATUS_STAFF"] == '1') {
                            ?>
                                <tr>
                                    <td><?= $row["ID_STAFF"]; ?></td>
                                    <td><?= $row["NAMA_STAFF"]; ?></td>
                                    <td><?= $row["JABATAN_STAFF"]; ?></td>
                                    <td>
                                        <form method="post">
                                            <input type="hidden" name="idx" value="<?= $row["ID_STAFF"]; ?>">
                                            <button name="btnEdit" type="submit" class="btn btn-success">Edit</button>
                                            <button name="btnDelete" type="submit" class="btn btn-danger">Delete</button>
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
</body>
</html>

