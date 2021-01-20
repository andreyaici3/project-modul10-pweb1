
<?php 

    session_start();

    if (isset($_SESSION['status'])){
        header("Location: index.php");
    }

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <title>Halaman Login</title>
</head>
<body class="bg-dark">
    <div class="container">
        <div class="row mt-5 justify-content-center">
            <div class="col-md-4">
                <div class="text-center text-white">
                    <h3><b>CATATAN PULSA & PPOB</b></h3>
                    <p style="font-size: 12px; margin-top: -8px;">&copy; Tugas Project Modul 10 - Andrey Andriansyah</p>
                </div>
                <div class="card">
                    <div class="card-body">
                        <form action="proseslogin.php" method="POST">
                            <div class="form-group">
                                <label for="user">Username</label>
                                <input type="text" name="user" placeholder="Masukan Username ..." class="form-control">
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="pass" placeholder="Masukan Password" class="form-control">
                            </div>
                            <br>
                            <div class="form-group">
                                <button type="submit" class="btn btn-dark" name="login">LOGIN</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>


</body>
</html>
