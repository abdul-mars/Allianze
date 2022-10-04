<?php session_start();
    require_once '../includes/database.php';
    if (isset($_SESSION['email']) && isset($_SESSION['role']) && isset($_SESSION['name'])) {
      $email = $_SESSION['email']; ?>
        <!DOCTYPE html>
        <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link rel="stylesheet" href="../styles/bootstrap.min.css">
                <link rel="stylesheet" href="../styles/style.css">
                <link rel="stylesheet" href="../styles/bootstrap-icons.css">
                <link rel="stylesheet" type="text/css" href="../styles/all.css">
                <title>Allianze Vehicle Insurance</title>
            </head>
            <body>
                <!-- Navbar -->
                <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 fixed-top shadow">
                    <div class="container">
                        <a href="index.php" class="navbar-brand">Allianze Insurance</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu">
                        <span class="navbar-toggler-icon"></span>
                        </button> <p class="text-light"></p>
                        <div class="collapse navbar-collapse" id="navmenu">
                            <ul class="navbar-nav ms-auto">
                                <li class="nav-item">
                                    <a href="index.php" class="nav-link">Home</a>
                                </li>
                                <!-- <li class="nav-item ">
                                    <a href="my_insure.php" class="nav-link">My Insurance</a>
                                </li> -->
                                <!-- <li class="nav-item">
                                    <a href="services.php" class="nav-link">Services</a>
                                </li> -->
                                <!-- <li class="nav-item">
                                    <a href="#instructors" class="nav-link">About</a>
                                </li> -->
                                <!-- <li class="nav-item">
                                    <a href="#contact" class="nav-link">Contact</a>
                                </li> -->
                            </ul>
                            <div class="m-2">
                                <a href="../logout.php" class="text-light">
                                    <i class="fa fa-power-off"></i> Log Out
                                </a>
                            </div>
                        </div>
                    </div>
                </nav>
    <?php } else {
    header("location: login.php");
    exit();
}
?>

