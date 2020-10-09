<?php
    include("conn.php");
    session_start();

    if(isset($_POST['register'])){
        header("location: RegisterObat.php");
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
        <form action="AdminPage.php" method="post">
                <button type="submit" class="btn btn-info">BACK</button>
        </form> <br/>
        <center><h1>Table Obat</h1></center> 
        <form method="post" style="float:right">
            <button type="submit" name="register" class="btn btn-info">Input Obat Baru</button>
        </form> <br/> <br/>
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th>ID OBAT</th>
                        <th>NAMA OBAT</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody name="tObat">
                    <?php
                        $sql = "SELECT * FROM OBAT WHERE STATUS_OBAT='1'";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                            ?>
                                <tr>
                                    <td><?= $row["ID_OBAT"]; ?></td>
                                    <td><?= $row["NAMA_OBAT"]; ?></td>
                                    <td>
                                        <form method="post">
                                            <button name="btnEdit" type="submit" class="btn btn-success">Edit</button>
                                            <button name="btnDelete" type="submit" class="btn btn-danger">Delete</button>
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
</html>

