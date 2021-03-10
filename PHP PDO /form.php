<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="container-fluid main_form ">
        <div class=" centered p-5 ">
            <h2 class="p-3 mobile">Еден чекор ве дели од вашата веб страна:</h2>
            <di v class="text-left ">
                <form method="POST" action="main.php">
                    <?php require_once 'functions.php';
                    ErrorMessage() ?>
                    <input type="hidden" name="id">
                    <div class="row">
                        <div class="col-md-10 offset-md-1 col-sm-12">
                            <label class="">Напишете го линкот до cover сликата</label>
                            <input class="d-block w-100" type="text" name="cover_picture">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-10 offset-md-1 col-sm-12">
                            <label>Внесете го насловот:</label>
                            <input class="d-block w-100" type="text" name="title">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-10 offset-md-1 col-sm-12">
                            <label>Внесете го поднасловот:</label>
                            <input class="d-block w-100" type="text" name="subtitle">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-10 offset-md-1 col-sm-12">
                            <label>Внесете нешто за вас:</label>
                            <textarea rows="3" class="d-block w-100" name="msg_for_us"></textarea>
                            <small class="text-muted">Minimum 20 characters and maximum 1000 characters</small><br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-10 offset-md-1 col-sm-12">
                            <label>Внесете го вашиот телефон:</label>
                            <input class="d-block w-100" class="" type="text" name="phone">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-10 offset-md-1 col-sm-12">
                            <label>Внесете ја вашата локација:</label>
                            <input class="d-block w-100" type="text" name="location">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-10 offset-md-1 col-sm-12">
                            <hr class="d-block border-white">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-10 offset-md-1 col-sm-12">
                            <label>Одберете дали нудите сервиси или продукти:</label>
                            <select class="d-block w-100" name="select_services">
                                <?php
                                $selectOption = ['Сервиси', 'Продукти'];
                                foreach ($selectOption as $option) {
                                    echo "<option value='{$option}'>$option</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-10 offset-md-1 col-sm-12">
                            <label class="p-3">Внесете URL од слика и опис на вашите продукти или сервиси:</label><br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-10 offset-md-1 col-sm-12">
                            <label>URL од слика</label>
                            <input class="d-block w-100" type="text" name="first_picture">
                            <label>Опис за слика</label>
                            <textarea rows="3" class="d-block w-100" name="first_picture_description"></textarea>
                            <small class="text-muted">Minimum 20 characters and maximum 1000 characters</small><br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-10 offset-md-1 col-sm-12">
                            <label>URL од слика</label>
                            <input class="d-block w-100" name="second_picture">
                            <label>Опис за слика</label>
                            <textarea rows="3" class="d-block w-100" name="second_picture_desription"></textarea>
                            <small class="text-muted">Minimum 20 characters and maximum 1000 characters</small><br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-10 offset-md-1 col-sm-12">
                            <label>URL од слика</label>
                            <input class="d-block w-100" name="third_picture">
                            <label>Опис за слика</label>
                            <textarea rows="3" class="d-block w-100" name="third_picture_desription"></textarea>
                            <small class="text-muted">Minimum 20 characters and maximum 1000 characters</small><br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-10 offset-md-1 col-sm-12">
                            <hr class="d-block border-white">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-10 offset-md-1 col-sm-12">
                            <label>Напишете нешто за вашата фирма што луѓето треба да го знаат пред да ве контактираат:</label>
                            <textarea rows="3" class="d-block w-100" name="description_for_us"></textarea>
                            <small class="text-muted">Minimum 20 characters and maximum 1000 characters</small><br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-10 offset-md-1 col-sm-12">
                            <label>Instagram</label>
                            <input class="d-block w-100" type="text" name="instagram">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-10 offset-md-1 col-sm-12">
                            <label>Facebook</label>
                            <input class="d-block w-100" type="text" name="facebook">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-10 offset-md-1 col-sm-12">
                            <label>Twitter</label>
                            <input class="d-block w-100" type="text" name="twitter">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-10 offset-md-1 col-sm-12">
                            <label>Google+</label>
                            <input class="d-block w-100" type="text" name="google_plus">
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-10 offset-md-1 col-sm-12">
                            <hr class="d-block border-white">
                        </div>
                    </div>
                    <div class="row text-center">
                        <div class="col-md-10 offset-md-1 col-sm-12">
                            <button type="submit" class="btn-primary ">Потврди</button>
                        </div>
                    </div>
        </div>
        </form>
    </div>
    </div>
    </div>


</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

</html>