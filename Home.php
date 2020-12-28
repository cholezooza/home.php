<?php
    session_start();
    if (isset($_SESSION['type'])) {
        if ($_SESSION['type'] == 'admin') {
            header('location: adminhome.php');
        }
    }
    else{
        header('location: Loginmain.php');
    }
?>


<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "dbms";

    $conn=mysqli_connect($servername,$username,$password,$dbname);
    if (!$conn) {
        die('error'.mysql_error($conn));
    }
    $sql="select * from video";
    $res=mysqli_query($conn,$sql);

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>HotFlix: Watch TV,Movies,Anime</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/material-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Allura">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,700">
    <link rel="stylesheet" href="assets/css/card-image-zoom-on-hover.css">
    <link rel="stylesheet" href="assets/css/dh-navbar-inverse.css">
    <link rel="stylesheet" href="assets/css/Footer-Dark.css">
    <link rel="stylesheet" href="assets/css/Navigation-with-Button.css">
    <link rel="stylesheet" href="assets/css/News-Cards.css">
    <link rel="stylesheet" href="assets/css/sticky-dark-top-nav-with-dropdown.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <!-- <link rel="stylesheet" href="assets/fonts/ionicons.min.css"> -->
    <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Arbutus+Slab"> -->
    <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Slab:300,400"> -->
    <!-- <link rel="stylesheet" href="assets/css/Navigation-with-Search.css"> -->
    <!-- <link rel="stylesheet" href="assets/css/Registration-Form-with-Photo.css"> -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css"> -->
    <!-- <link rel="stylesheet" href="assets/css/Login-Form-Dark.css"> -->
    <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"> -->
    
    <!-- <style type="text/css">
    .dropdown:hover .dropdown-menu {
        display: block;
        margin-top: 0; 
    }
    </style> -->
</head>

<body style="height: auto;">
    <div style="width: 994px;">
        <nav class="navbar navbar-light navbar-expand-md fixed-top navigation-clean-button">
            <div class="container-fluid">
                <a class="navbar-brand" style="color:#1eb53a;font-family:Allura, cursive;font-size:40px;" href="#">HotFlix</a>
                <button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1">
                    <span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navcol-1" style="max-width:160px;">
                    <span class="navbar-text actions"> 
                        <a class="btn btn-light action-button" role="button" style="padding-top:8px;background-color:rgb(65,161,231);" href="signout.php">Sign Out</a>
                    </span>
                </div>
            </div>
        </nav>
    </div>
    <div class="carousel slide border rounded " data-ride="carousel" id="carousel-1" style="max-width: 100%;padding: 0px;padding-top: 0px;height: 494px;width: 80%;margin: 0px;margin-top: 10%;margin-left: 10%;">
        <div class="carousel-inner border rounded" role="listbox" style="max-width:100%;height:100%;">
            <div class="carousel-item active" style="height:100%;"><img class="w-100 d-block" style="height:100%;" src="assets/img/naruto.jpg" alt="Slide Image"></div>
            <div class="carousel-item"><img class="w-100 d-block" src="assets/img/GOT.jpg" alt="Slide Image" style="height: 494px;"></div>
            <div class="carousel-item"><img class="w-100 d-block" src="assets/img/johnwick2.jpg" alt="Slide Image" style="height: 494px;"></div>
        </div>
        <div>
            <a class="carousel-control-prev" href="#carousel-1" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carousel-1" role="button" data-slide="next">
                <span class="carousel-control-next-icon"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <ol
            class="carousel-indicators">
            <li data-target="#carousel-1" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-1" data-slide-to="1"></li>
            <li data-target="#carousel-1" data-slide-to="2"></li>
        </ol>
    </div>

    <div style="display: inline-block;">

        <?php
        while ($row=mysqli_fetch_array($res)) {
            
            echo '  <div class="col-lg-4 col-md-4 col-12" style="top:21px;">
                        <div class="card" style="width: 370px">
                          <img class="card-img-top" src="uploadImage/'.$row["img"].'" alt="card-image">
                              <div class="card-body">
                                <h4 class="card-text">'.$row['name'].'</h4>
                               <p>Genre: '.$row["genre"].' &nbsp Dur: '.$row["duration"].'(hr.) &nbsp Rating: '.$row["rating"].' </p>
                                 
                                <button class="btn btn-secondary" data-toggle="modal" data-target="#movie'.$row['id'].'" ><i style="font-size:14px" class="fa">&#xf152;</i> Play</button>

                                <div class="modal fade bg-transparent" id="movie'.$row['id'].'">
                               <div class="modal-dialog modal-xl modal-dialog-centered">
                                <div class="modal-content border-0 bg-transparent">
      
       
                                   <div class="modal-body">

                                    <div class=" my-auto">
                                       <button type="button" class="btn btn-default float-right mx-n2 pb-0 border-0 text-white" data-dismiss="modal">X</button>
                                       </div>
                                    <div class="embed-responsive embed-responsive-16by9">
                                  <video  controls><source src="uploadVideo/'.$row['video'].'" type="video/mp4"> </video>
                                  </div>
                                 </div>
        
       
                                </div>
                              </div>
                            </div>


                              </div>
                        </div>
                       
                  </div>';
        }



        ?>
        
    </div> 
    <div class="footer-dark" style="margin: 0px;margin-top: 32px;padding: 0px;padding-top: 1px;">
        <footer>
            <div class="container">
                <p class="copyright">Made with &hearts; by Suyash Misra.<br>HotFlix © 2019</p>
            </div>
        </footer>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <!-- <script src="assets/js/Dynamically-Queue-Videos1.js"></script> -->
    <!-- <script src="https://www.youtube.com/iframe_api"></script> -->
</body>

</html>