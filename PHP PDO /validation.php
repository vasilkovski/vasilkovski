<?php


if(!isset($_POST['cover_picture']) || empty($_POST['cover_picture']) ){
  header(('Location: form.php?error=coverError'));
    die( );
}

if(!isset($_POST['title']) || empty($_POST['title']) ){
    header("Location: form.php?error=titleError");
     die();
 }

 if(!isset($_POST['subtitle']) || empty($_POST['subtitle']) ){
    header("Location: form.php?error=subtitleError");
     die();
 }
 if(!isset($_POST['msg_for_us']) || empty($_POST['msg_for_us']) ){
    header("Location: form.php?error=msgError");
     die();
 }
 if(!isset($_POST['phone']) || empty($_POST['phone']) ){
    header("Location: form.php?error=phoneError");
     die();
 }
 if(!isset($_POST['location']) || empty($_POST['location']) ){
    header("Location: form.php?error=locationError");
     die();
 }
 if(!isset($_POST['first_picture']) || empty($_POST['first_picture']) ){
    header("Location: form.php?error=imgError");
     die();
 }
 if(!isset($_POST['first_picture_description']) || empty($_POST['first_picture_description']) ){
    header("Location: form.php?error=descImgError");
     die();
 }
 if(!isset($_POST['second_picture']) || empty($_POST['second_picture']) ){
    header("Location: form.php?error=imgError");
     die();
 }
 if(!isset($_POST['second_picture_desription']) || empty($_POST['second_picture_desription']) ){
    header("Location: form.php?error=descImgError");
     die();
 }
 if(!isset($_POST['third_picture']) || empty($_POST['third_picture']) ){
    header("Location: form.php?error=imgError");
     die();
 }
 if(!isset($_POST['third_picture_desription']) || empty($_POST['third_picture_desription']) ){
    header("Location: form.php?error=descImgError");
     die();
 }
 if(!isset($_POST['description_for_us']) || empty($_POST['description_for_us']) ){
    header("Location: form.php?error=descError");
     die();
 }
 
if(strlen($_POST['msg_for_us']) < 20 && strlen($_POST['msg_for_us']) > 1000) {
    header("Location: form.php?error=shortDesc");
     die();
}
if(strlen($_POST['first_picture_description']) < 20 && strlen($_POST['first_picture_description']) > 1000) {
    header("Location: form.php?error=shortImgDesc");
     die();
}
if(strlen($_POST['second_picture_desription']) < 20 && strlen($_POST['second_picture_desription']) > 1000) {
    header("Location: form.php?error=shortImgDesc");
     die();
}
if(strlen($_POST['third_picture_desription']) < 20 && strlen($_POST['third_picture_desription']) > 1000) {
    header("Location: form.php?error=shortImgDesc");
     die();
}

