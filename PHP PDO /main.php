<?php
require_once 'db.php';
require_once 'functions.php';

$coverPicture = $title = $subtitle = $msgForUs = $phone = $location = $material = $img1 = $img1Description = $img2 = $img2Description = $img3 = $img3Description = $descriptionForUs = $twitter = $facebook = $instagram = $googlePlus = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once 'validation.php';
    $id = $_POST['id'];
    $coverPicture = $_POST['cover_picture'];
    $title = $_POST['title'];
    $subtitle = $_POST['subtitle'];
    $msgForUs = $_POST['msg_for_us'];
    $phone = $_POST['phone'];
    $location = $_POST['location'];
    $img1 = $_POST['first_picture'];
    $img1Description = $_POST['first_picture_description'];
    $img2 = $_POST['second_picture'];
    $img2Description = $_POST['second_picture_desription'];
    $img3 = $_POST['third_picture'];
    $img3Description = $_POST['third_picture_desription'];
    $descriptionForUs = $_POST['description_for_us'];
    $twitter = $_POST['twitter'];
    $facebook = $_POST['facebook'];
    $instagram = $_POST['instagram'];
    $googlePlus = $_POST['google_plus'];
    $material = $_POST['select_services'];
} else {
    header('Location: form.php?error=empty');
     die();
 }


$sql = "INSERT INTO company 
(cover_picture,title,subtitle,msg_for_us,phone,location,select_option,first_picture,first_description_picture,second_picture,second_description_picture,third_picture ,third_descritpion_picture, description, instagram,facebook,twitter,google) 
VALUES (:cover_picture, :title, :subtitle, :msg_for_us, :phone, :location, :select_option, :first_picture, :first_description_picture, :second_picture, :second_description_picture, :third_picture ,:third_descritpion_picture , :description, :instagram, :facebook, :twitter, :google)";
$stmt = $conn->prepare($sql);
$stmt->execute([
    "cover_picture" => $coverPicture, "title" => $title, "subtitle" => $subtitle, "msg_for_us" => $msgForUs, "phone" => $phone, "location" => $location, "select_option" => $material,
    "first_picture" => $img1, "first_description_picture" => $img1Description, "second_picture" => $img2, "second_description_picture" => $img2Description, "third_picture" => $img3, "third_descritpion_picture" => $img3Description, "description" => $descriptionForUs, "instagram" => $instagram, "facebook" => $facebook, "twitter" => $twitter, "google" => $googlePlus
]);

$comapny_id = $conn->lastInsertId();
$sel = "SELECT * FROM company WHERE id = $comapny_id";
$stmt = $conn->query($sel);
$row = $stmt->fetch();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <style>
        .front_img {
            background-image: url(<?= $row['cover_picture'] ?>);
        }
    </style>
</head>

<body>
    <!-- -----------NAVBAR-------- -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-info">

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item ">
                    <a class="nav-link hover" href="#home">Дома </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link hover" href="#for_us">За нас </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link hover" href="#service"><?= $row['select_option'] ?? "" ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link hover" href="#contact">Контакт</a>
                </li>

            </ul>

        </div>
    </nav>

    <div class="container-fluid p-0 bg-warning">
        <div class="front_img centered" id="home">

            <h1 class="text-white border rounded text-title p-2"><?= $row['title'] ?? "" ?></h1>
            <h4 class="text-white  text-title p-2"><?= $row['subtitle'] ?? "" ?></42>

            <!-- ----------------- CONTENT ---------------- -->
        </div>
        <div class="container">
            <div id="for_us" class=" row p-3 m-0">
                <div class="col-lg-8 col-md-12  col-sm-12 p-3">
                    <h3>За нас</h3>
                    <p><?= $row['msg_for_us'] ?? "" ?></p>
                </div>
                <div class="col-lg-4  col-md-10 text-center p-3 phone">
                    <h5>Телефон:</h5>
                    <p><?= $row['phone'] ?? "" ?></p>
                    <h5>Локација:</h5>
                    <p><?= $row['location'] ?? "" ?></p>
                </div>
            </div>
            <div id="service" class="row m-0 ">
                <h3 class="services"><?= $row['select_option'] ?? "" ?></h3>
            </div>
            <div class="row m-0" >
                <div class="card-deck py-5 m-0">
                    <div class="card ml-2 bg-transparent">
                        <img class="card-img-top" src="<?= $row['first_picture'] ?? "" ?>" alt="Card image cap">
                        <div class="card-body ">

                            <p class="card-text"><?= $row['first_description_picture'] ?? "" ?></p>
                        </div>
                    </div>
                    <div class="card p-0 ml-2 bg-transparent">
                        <img class="card-img-top" src="<?= $row['second_picture'] ?? "" ?>" alt="Card image cap">
                        <div class="card-body">

                            <p class="card-text"><?= $row['second_description_picture'] ?? "" ?></p>
                        </div>
                    </div>
                    <div class="card p-0 ml-2 bg-transparent">
                        <img class="card-img-top" src="<?= $row['third_picture'] ?? "" ?>" alt="Card image cap">
                        <div class="card-body">

                            <p class="card-text"><?= $row['third_descritpion_picture'] ?? "" ?></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row p-lg-3 p-md-0" id="contact">
                <h2 class="services">Контакт</h2>
            </div>
            <div class="row m-0 p-lg-3 p-md-0">
                <div class="col-lg-6  col-md-12 ">
                    <h4>Текст</h4>
                    <p>
                        <?= $row['description'] ?? "" ?>
                    </p>
                </div>
                <div class="col-lg-6  col-md-12">
                    <div class="table_form p-2 border border-dark rounded">
                        <label class="d-block">Име</label>
                        <input type="text" class="d-block w-100 " placeholder="Внеси име">
                        <label class="d-block">Емаил</label>
                        <input type="text" class="d-block w-100" placeholder="Внеси емаил">
                        <label class="d-block">Порака</label>
                        <textarea class="w-100 text-muted" name="" id="" cols="30" rows="5">Вашата порака</textarea>
                        <button class="btn btn-primary">Испрати</button>

                    </div>
                </div>
            </div>
        </div>
        <footer class="bg-info">
            <div class="row m-0 p-2 cent">
                <div class="col-lg-8 col-md-6 text-center ">
                    <p class="m-0"> Copyright &copy; <?= $row['title'] ?></p>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="mt-lg-2 ml-md-5 ">
                        <a href="<?= $row['instagram'] ?? "" ?>" target="_blank" class="p-2"><i class="fa fa-instagram fa-2x  bg-warning p-1"></i></a>
                        <a href="<?= $row['facebook'] ?? "" ?>" target="_blank" class="p-2"><i class="fa fa-facebook fa-2x  bg-warning p-1"></i></a>
                        <a href="<?= $row['twitter'] ?? "" ?>" target="_blank" class="p-2"><i class="fa fa-twitter-square fa-2x  bg-warning p-1"></i></a>
                        <a href="<?= $row['googlePlus'] ?? "" ?>" target="_blank" class="p-2"><i class="fa fa-google-plus-square fa-2x bg-warning p-1"></i></a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

</html>