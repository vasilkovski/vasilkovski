
<?php
if (!empty($_POST["add_record"])) {
  require_once("db.php");
  $sql = "INSERT INTO BRAINSTER ( student_name, company_name, mail, phone, Category ) VALUES ( :student_name, :company_name, :mail, :phone, :Category )";
  $pdo_statement = $pdo_conn->prepare($sql);

  $result = $pdo_statement->execute(array(':student_name' => $_POST['student_name'], ':company_name' => $_POST['company_name'], ':mail' => $_POST['mail'], ':phone' => $_POST['phone'], ':Category' => $_POST['Category']));
  if (!empty($result)) {
    header('location:index.php');
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous" />
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="style.css" />
    <title>Вработи наш студент</title>
</head>

<body>
    <div class="nav-shadow">
    <nav class="navbar navbar-expand-md navbar-light ml-lg-5 ml-md-5 m-sm-0 ">
    <a class=" navbar-brand  d-flex flex-column logo-size mar_small " href="index.php">
      <img src="img/ logo.png " class="w-75 " /><small class="logo-size ml-1 logo-none-md">Brainster</small>
    </a>
    <button class="navbar-toggler mar_small" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon  "></span>
    </button>
    <div class="collapse navbar-collapse justify-content-around small" id="navbar">
      <ul class="navbar-nav ">
        <li class="nav-item  position-relative wobble-vertical-on-hover ml-1">
          <a class="nav-link font-weight-bold a-nav text-md-center text-sm-right" href="https://marketpreneurs.brainster.co/" target="_blank">
            Академија за маркетинг</a>
        </li>
        <li class="nav-item  position-relative wobble-vertical-on-hover ml-1">
          <a class="nav-link font-weight-bold a-nav text-md-center text-sm-right" href="http://codepreneurs.co/" target="_blank">Академија за програмирање
          </a>
        </li>
        <li class="nav-item position-relative wobble-vertical-on-hover">
                <a class="nav-link font-weight-bold a-nav text-md-center text-sm-right" href="#"
                  >Академија за data science
                </a>
              </li>
        <li class="nav-item  position-relative wobble-vertical-on-hover ml-1">
          <a class="nav-link font-weight-bold a-nav text-md-center text-sm-right" href="https://design.brainster.co/" target="_blank">Академија за дизајн
          </a>
        </li>
      </ul>
      <form class="form-inline  pulse-grow-on-hover">
        <button class="btn btn-danger  btn-nav-hover font-weight-bold"><a href="vraboti.php" class="text-white">
            Вработи наш студент
         </a> </button>
      </form>
    </div>
  </nav>
    </div>
    <div class="container-fluid mt-5 p-0">
        <div class="w-100 my-3">
            <h1 class="text-center">Вработи студенти</h1>
        </div>

        <div class="frm-add">
            <form name="frmAdd" action="" method="POST">
                <div class="row my-3 mx-0">
                    <div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1 col-sm-12 ">
                        <div class="row mt-5 mx-0">

                            <div class="col-lg-6 col-md-6 col-sm-12 my-2">
                                <label>Име и презиме</label>
                                <input type="text" name="student_name" class="form-control font-italic text-muted" placeholder="Вашето име и презиме" required />
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 my-2">
                                <label>Име на компанијата</label>
                                <input type="text" name="company_name" class="form-control font-italic text-muted" placeholder="Име на вашата компанија" required />
                            </div>
                        </div>


                        <div class="row mt-2 mx-0">
                            <div class="col-lg-6 col-md-6 col-sm-12 my-2">
                                <label>Контакт емејл </label>
                                <input type="text" name="mail" class="form-control font-italic text-muted" placeholder="Контакт емаил на вашата компанија" required />
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 my-2">
                                <label>Контакт телефон</label>
                                <input type="phone" name="phone" class="form-control font-italic text-muted" placeholder="Контакт телефон на вашата компанија" required />
                            </div>
                        </div>
                        <div class="row mt-4 mx-0">
                            <div class="col-lg-6 col-md-6 col-sm-12 ">
                                <div class="form-group">
                                    <label for="SelectCategory">Тип на студент</label> 
                                   <select class="form-control " id="SelectCategory" name="Category">
                                        <option  class="d-none" >Изберете тип на студент</option>
                                        <option  value="Student od marketing"> Студент од маркетинг</option>
                                        <option  value="Student od programiranje">Студент од програмирање</option>
                                        <option  value="Student od dizajn">Студент од дизајн</option>
                                        <option  value="Student od data science">Студент од data science</option>
                                  </select>   
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 my-4">
                                <input name="add_record" type="submit" value="Испрати" class="btn btn-danger btn-block">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <footer class="text-center text-light  w-100">
            <div class="footer-vraboti py-2 bg-dark w-100">Изработено со <span class="text-danger">&hearts;</span> од Никола </div></footer>
    </div>

</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</html>