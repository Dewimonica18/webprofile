<?php
//session
session_start();


?>
<html>
    <head><title>Get To Know With Dewi Monica </title>
        <link rel="stylesheet" type="text/css" href="gaya.css">
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    </head>
    <body>
        
        <nav class="navbar navbar-expand-lg navbar-light navbar sticky-top" style="background-color: #e9e8e6;">
            <div class="container-fluid">
                <a href=""><img class="logo" src="logo.png"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav" class="text-end">
                    <ul class="navbar-nav" class="fs-5">
                        <li class="nav-item">
                            <a class="nav-link active" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="index.php?data=education">Education</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="index.php?data=course">Course Schedule</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="index.php?data=activity">Activity</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="index.php?data=song">Song List</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="index.php?data=contact-us">Contact Us</a>
                        </li>
                        <?php
                            if(isset($_SESSION['username']))
                            {
                    
                        ?>
                            <li class="nav-item">
                                <a class="nav-link active" href="logout.php">Logout</a>
                            </li>
                            <?php
                            }else{
                            ?>
                                <li class="nav-item">
                                    <a class="nav-link active" href="index.php?data=login">Login</a>
                                </li>
                            <?php
                            }
                        ?>
                    </ul>
                </div>
            </div>
        </nav>
        
        <div id="home">
            <div class="container-menu">
                <div class="row">
                    <div class="col-sm-6">
                        <h4 class="fw-light">Get To Know With</h4>
                        <p class="fs-1">Dewi Monica</p>
                        <p class="fs-6" class="fw-lighter">Mahasiswa semester 5 prodi Business Information System<br>Angkatan 2019 di Universitas Pradita</p>
                        <p class="fs-5" class="fw-light">Mahasiswa Jurusan Sistem Informasi yang Baru <br>Memasuki Tahun Ketiga Perkuliahannya</p>
                    </div>   
                    <img src="logo.png" class="rounded float-end" alt="...">            
                </div>
            </div>
        </div>

        <?php
        //memasukan koneksi
        include("koneksi.php");

        //memanggil informasi pada halaman information.php
        if(isset($_GET['data']))
        {
        if ($_GET['data']=='education')
        {
            include("education.php");
        }
        else if ($_GET['data']=='course')
        {
            include("course.php");
        }
        else if ($_GET['data']=='activity')
        {
            include("activity.php");
        }
        else if ($_GET['data']=='song')
        {
            include("song.php");
        }
        else if ($_GET['data']=='contact-us')
        {
            include("contact-us.php");
        }
        else if ($_GET['data']=='login')
        {
            include("login.php");
        }
        else if ($_GET['data']=='logout')
        {
            include("logout.php");
        }
        else 
        {   
           
        }
        
        }

        ?>

        <div class="footer" class="fixed-bottom">
            <div class="social">
                <a href="https://www.youtube.com/channel/UC1tR6KbnxoNOqXFzZ3qy7yg" target="_blank"><i class="uil uil-youtube"></i></a>
                <a href="https://twitter.com/dewimonica18_" target="_blank"><i class="uil uil-twitter"></i></a>
                <a href="https://www.instagram.com/dewimonica18/" target="_blank"><i class="uil uil-instagram-alt"></i></a>
                <a href="https://www.facebook.com/dewi.monica.73" target="_blank"><i class="uil uil-facebook"></i></a> 
            </div>
            <ul class="menu">
                <li><a href="index.php">Home</a></li>
                <li><a href="index.php?data=education">Education</a></li>
                <li><a href="index.php?data=course">Course Schedule</a></li>
                <li><a href="index.php?data=activity">Activity</a></li>
                <li><a href="index.php?data=song">Song List</a></li>
                <li><a href="index.php?data=contact-us">Contact Us</a></li>
            </ul>
            <p class="copyright">
                @2021 Dewi Monica
            </p>   
        </div>    
    </body>
</html>