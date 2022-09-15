<html>
<title>Get To Know With Dewi Monica </title>
<link rel="stylesheet" type="text/css" href="gaya.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

<head>
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
                <a class="nav-link active" href="index.php?data=home">Home</a>
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
                <a class="nav-link active" href="index.php?data=song">Activity</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="index.php?data=song">Contact Us</a>
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

        <center>
            <div class="answer"> <br>
            <?php
            if(isset($_POST['submit']))
            {
                echo "Email: ".$_POST['email']."<br>";
                echo "Detail: ".$_POST['detail']."<br>";
            }
        ?>
            </div>
        
        </center>

    

</body>

<head>

</html>