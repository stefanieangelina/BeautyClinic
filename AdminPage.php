<?php
    include("conn.php");
    session_start();

    if(isset($_POST['masterMember'])){
        header("location: MasterMember.php");
    } 
    if(isset($_POST['masterStaff'])){
        header("location: MasterStaff.php");
    }
    if(isset($_POST['masterObat'])){
        header("location: MasterObat.php");
    }
    if(isset($_POST['laporan'])){
       // header("location: ");
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
    <form action="login.php" method="post">
        <button type="submit" class="btn btn-info">BACK</button>
    </form>

    <form method="post">
        <button type="submit" name="masterMember">Master Member</button>
        <button type="submit" name="masterStaff">Master Staff</button>
        <button type="submit" name="masterObat">Master Obat</button>
        <button type="submit" name="laporan">Laporan</button>
    </form>
</body>
</html>