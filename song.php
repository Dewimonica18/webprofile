<?php
$host       = "localhost";
$user       = "root";
$pass       = "";
$db         = "uts";

$koneksi    = mysqli_connect($host, $user, $pass, $db);
if (!$koneksi) { //cek koneksi
    die("Tidak bisa terkoneksi ke database");
}
$title        = "";
$singer       = "";
$genre     = "";
$rating   = "";
$sukses     = "";
$error      = "";

if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}
if($op == 'delete'){
    $id         = $_GET['id'];
    $sql1       = "delete from song_list where id = '$id'";
    $q1         = mysqli_query($koneksi,$sql1);
    if($q1){
        $sukses = "Song is successfully deleted";
    }else{
        $error  = "Failed delete the song";
    }
}
if ($op == 'edit') {
    $id         = $_GET['id'];
    $sql1       = "select * from song_list where id = '$id'";
    $q1         = mysqli_query($koneksi, $sql1);
    $r1         = mysqli_fetch_array($q1);
    $title        = $r1['title'];
    $singer       = $r1['singer'];
    $genre     = $r1['genre'];
    $rating   = $r1['rating'];

    if ($title == '') {
        $error = "Song Not Found";
    }
}
if (isset($_POST['save'])) { //untuk create
    $title       = $_POST['title'];
    $singer       = $_POST['singer'];
    $genre     = $_POST['genre'];
    $rating   = $_POST['rating'];

    if ($title && $singer && $genre && $rating) {
        if ($op == 'edit') { //untuk update
            $sql1       = "update song_list set title = '$title',singer='$singer',genre = '$genre',rating='$rating' where id = '$id'";
            $q1         = mysqli_query($koneksi, $sql1);
            if ($q1) {
                $sukses = "Song updated successfully";
            } else {
                $error  = "Song failed to update";
            }
        } else { //untuk insert
            $sql1   = "insert into song_list(title,singer,genre,rating) values ('$title','$singer','$genre','$rating')";
            $q1     = mysqli_query($koneksi, $sql1);
            if ($q1) {
                $sukses     = "Successfully entered new song";
            } else {
                $error      = "Failed to enter song";
            }
        }
    } else {
        $error = "Please enter all data";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Get To Know With Dewi Monica</title>
    <link rel="stylesheet" type="text/css" href="gaya.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <style>
        .mx-auto {
            width: 800px
        }
        .card{
            margin-top:20px
        }

    </style>
</head>

<body>
    <div id="song">
        <div class="col">
            <div class="heading" >
                <h3 class="fw-light">Song List</h3>
            </div>
         </div>  
        <div class="mx-auto">
            <!-- untuk memasukkan data -->
            <div class="card">
                <div class="card-header">
                    Create / Edit Song
                </div>
                <div class="card-body">
                    <?php
                    if ($error) {
                    ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $error ?>
                        </div>
                    <?php
                        header("refresh:2;url=index.php");//5 : detik
                    }
                    ?>
                    <?php
                    if ($sukses) {
                    ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo $sukses ?>
                        </div>
                    <?php
                        header("refresh:2;url=index.php?data=song");
                    }
                    ?>
                    <form action="" method="POST">
                        <div class="mb-3 row">
                            <label for="title" class="col-sm-2 col-form-label">Title</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="title" name="title" value="<?php echo $title ?>">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="singer" class="col-sm-2 col-form-label">Singer</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="singer" name="singer" value="<?php echo $singer ?>">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="genre" class="col-sm-2 col-form-label">Genre</label>
                            <div class="col-sm-10">
                            <select class="form-control" name="genre" id="genre">
                                    <option value="">- Choose the genre -</option>
                                    <option value="Pop" <?php if ($genre == "Pop") echo "selected" ?>>Pop</option>
                                    <option value="RnB" <?php if ($genre == "RnB") echo "selected" ?>>RnB</option>
                                    <option value="Reggae" <?php if ($genre == "Reggae") echo "selected" ?>>Reggae</option>
                                    <option value="Country" <?php if ($genre == "Country") echo "selected" ?>>Country</option>
                                    <option value="Jazz" <?php if ($genre == "Jazz") echo "selected" ?>>Jazz</option>
                                    <option value="Hip Hop" <?php if ($genre == "Hip Hop") echo "selected" ?>>Hip Hop</option>
                                    <option value="Rock" <?php if ($genre == "Rock") echo "selected" ?>>Rock</option>
                                    <option value="Indie" <?php if ($genre == "Indie") echo "selected" ?>>Indie</option>
                                    <option value="Ballad" <?php if ($genre == "Ballad") echo "selected" ?>>Ballad</option>
                                    <option value="Blues" <?php if ($genre == "Blues") echo "selected" ?>>Blues</option>
                                    <option value="Classic" <?php if ($genre == "Classic") echo "selected" ?>>Classic</option>
                                    <option value="EDM" <?php if ($genre == "EDM") echo "selected" ?>>EDM</option>
                                    <option value="K-Pop" <?php if ($genre == "K-Pop") echo "selected" ?>>K-Pop</option>
                                    <option value="J-Pop" <?php if ($genre == "J-Pop") echo "selected" ?>>J-Pop</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="rating" class="col-sm-2 col-form-label">Rating</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="rating" id="rating">
                                    <option value="">- Choose the rating -</option>
                                    <option value="1" <?php if ($rating == "1") echo "selected" ?>>1</option>
                                    <option value="2" <?php if ($rating == "2") echo "selected" ?>>2</option>
                                    <option value="3" <?php if ($rating == "3") echo "selected" ?>>3</option>
                                    <option value="4" <?php if ($rating == "4") echo "selected" ?>>4</option>
                                    <option value="5" <?php if ($rating == "2") echo "selected" ?>>5</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <input type="submit" name="save" value="Save" class="btn btn-primary" />
                        </div>
                    </form>
                </div>
            </div>

            <!-- untuk mengeluarkan data -->
            <div class="card">
                <div class="card-header text-white bg-secondary">
                    Song list
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Singer</th>
                                <th scope="col">Genre</th>
                                <th scope="col">Rating</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql2   = "select * from song_list order by id";
                            $q2     = mysqli_query($koneksi, $sql2);
                            $urut   = 1;
                            while ($r2 = mysqli_fetch_array($q2)) {
                                $id         = $r2['id'];
                                $title       = $r2['title'];
                                $singer       = $r2['singer'];
                                $genre     = $r2['genre'];
                                $rating   = $r2['rating'];

                            ?>
                                <tr>
                                    <th scope="row"><?php echo $urut++ ?></th>
                                    <td scope="row"><?php echo $title ?></td>
                                    <td scope="row"><?php echo $singer ?></td>
                                    <td scope="row"><?php echo $genre ?></td>
                                    <td scope="row"><?php echo $rating ?></td>
                                    <td scope="row">
                                        <a href="song.php?op=edit&id=<?php echo $id ?>"><button type="button" class="btn btn-outline-warning">Edit</button></a>
                                        <a href="song.php?op=delete&id=<?php echo $id?>" onclick="return confirm('Yakin mau delete data?')"><button type="button" class="btn btn-outline-danger">Delete</button></a>            
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                        
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>