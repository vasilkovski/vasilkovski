<?php  


function ErrorMessage() {
    $errorMsg = [
        'empty' => "You must fulfill this form first",
        'coverError' => 'Url field is required.',
        'titleError' => 'Title field is required.',
        'subtitleError' => 'Subtitle field is required.',
        'phone' => 'Phone field is required.',
        'location' => 'Location field is required.',
        'imgError' => 'Image field is required..',
        'descImgError' => 'Description field is required.',
        'descError' => 'Description field is required.',
        'msgError' => 'Message field is required.',
        'shortDesc' => 'You are description must be min 20 characters and max 1000 characters',
        'shortImgDesc' => 'You are description must be min 20 characters and max 1000 characters'   
    ];
    if(isset($_GET['error'])) {
        echo '<p class="alert alert-danger">'. $errorMsg[$_GET['error']]  .'</p>';
    }
}


