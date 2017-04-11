<?php
  session_start();
  if (isset($_SESSION['id'])) unset($_SESSION['id']);
  session_destroy();

  require_once ('system/data.php');
  require_once ('system/security.php');

  $db = get_db_connection();

  $error = false;
  $error_msg = "";
  $success = false;
  $success_msg = "";

  if(isset($_POST['start'])){
    if (!empty($_POST['vorname']) && !empty($_POST['nachname']) && !empty($_POST['geburtsdatum']) && !empty($_POST['email'])) {
      $vorname = filter_data($_POST['vorname']);
      $nachname = filter_data($_POST['nachname']);
      $geburtsdatum = filter_data($_POST['geburtsdatum']);
      $email = filter_data($_POST['email']);
      $register_id = register($vorname, $nachname, $geburtsdatum, $email);
      //$register_id = mysqli_fetch_assoc($result);
      echo $register_id;
      $success = true;

      session_start();
      $_SESSION['id'] = $register_id;
      header("Location:umfrage.php");
    }else {
      $error = true;
      $error_msg .= "Bitte fülle alle Felder aus.<br/>";
    }
  }

?>
<!DOCTYPE html>
<html lang="de">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Startseite</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="css/layout.css" rel="stylesheet">


</head>

<body>

    <div class="container content hintergrund">
        <div class="row">

            <!--Login Button-->
            <div class="col-md-offset-11 col-md-1">
                <div id="login" class="btn-group">
                  <a href="login.php"><button  type="button" class="">Login</button></a>
                </div>
            </div>

            <!--Welcome Text-->
            <div class="col-md-12">
                <div class="col-md-offset-1 col-md-5" style="padding-top:10%; text-align: justify;">
                    <h1 style="padding-bottom:5%;">Dein <br> PERSÖNLICHKEITSTEST</h1>
                    <p style="padding-bottom:5%;">Du bist dir nicht sicher, was für ein Typ du bist? Welcher Beruf zu dir passt?
                        Bist du eher ein Bastler oder doch der Denker? Oder gar beides. <br>
                        Wir helfen dir bei der Suche.
                        Einfach die nötigen Angaben ausfüllen, auf den Startbutton klicken und du kommst zur Umfrage.
                    </p>
                    <p>
                        <b>Viel Spass!</b>
                    </p>
                </div>
            </div>

            <!--Inputfelder-->
            <div class="col-md-12">
                <div class="col-md-offset-1 col-md-5" style="padding-top:3%;">
                    <form action="index.php" method="post">
                        <!--Vorname-->
                        <div class="form-group">
                            <label for="InputVorname">Vorname</label>
                            <input type="text" name="vorname" class="" id="vorname" placeholder="Vorname" value="Urs">
                        </div>
                        <!--Nachname-->
                        <div class="form-group">
                            <label for="InputNachname">Nachname</label>
                            <input type="text" name="nachname" class="" id="nachname" placeholder="Nachname" value="Thöny">
                        </div>
                        <!--Geburtsdatum-->
                        <div class="form-group">
                            <label for="InputGeburtsdatum">Geburtsdatum</label>
                            <input type="date" name="geburtsdatum" class="" id="geburtsdatum" placeholder="tt.mm.jjjj" value="01.01.2000">
                        </div>
                        <!--eMail-->
                        <div class="form-group">
                            <label for="InputEmail">E-Mail Adresse</label>
                            <input type="email" name="email" class="" id="email" placeholder="E-Mail" value="urs@thoeny.ch">
                        </div>
                        <div>
                            <input type="submit" name="start" class="" value="Start">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php
      if($error == true) {
    ?>
      <div class="col-md-12">
        <div class="col-md-offset-3 col-md-6" >
          <div style="margin-top:10%;" class="alert alert-danger" role="alert"><?php echo $error_msg; ?></div>
        </div>
      </div>
    <?php
      }
    ?>


    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
