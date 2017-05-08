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

<!--Kontaktformular-->
    <div class="container content formular" >
        <div class="row">

                <!--Welcome Text-->
                <div class="col-md-12">
                    <div class="col-md-6" style="padding-top:; text-align: justify;">
                        <h1 style="padding-bottom:5%;">Registrierung für Newsletter<br><b>Kochen mit Toby</b></h1>
                        <p style="padding-bottom:5%;">Hier kannst du dich für den Newletter eintragen.
                        </p>
                        <p>
                            <b></b>
                        </p>
                    </div>

                <!--Kontaktdaten-->

                    <div class="col-md-6" style="padding-top:3%; padding-bottom:5%">
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
                            <!--eMail-->
                            <div class="form-group">
                                <label for="InputEmail">E-Mail Adresse</label>
                                <input type="email" name="email" class="" id="email" placeholder="E-Mail" value="urs@thoeny.ch">
                            </div>
                            <!--Start-->
                            <div class="col-md-offset-10 col-md-2">
                                <input type="submit" name="weiter" class="" value="weiter">
                            </div>
                        </form>
                    </div>

            </div>
        </div>
    </div>
    <br>
    <!--Gutschein-->
       <div class="container content formular" >
        <div class="row">

                <!--Welcome Text-->
                <div class="col-md-12">
                    <div class="col-md-6" style="padding-top:; text-align: justify;">
                        <h1 style="padding-bottom:5%;">Toby würde gerne wissen, <br><b>bist du...</b></h1>
                    </div>
                </div>

                <!--Kategorien-->
                <div class="col-md-offset-3 col-md-10">
                    <div class="col-md-2" style="padding-top:3%; padding-bottom:5%;">
                         <button type="button">Fleisch</button>
                    </div>
                    <div class="col-md-2" style="padding-top:3%; padding-bottom:5%">
                         <button type="button">Veggie</button>
                    </div>
                    <div class="col-md-2" style="padding-top:3%; padding-bottom:5%;">
                         <button type="button">Vegan</button>
                    </div>
                </div>

                <!--Gutscheine-->
                 <div class="col-md-12" style="padding-top:3%; padding-bottom:5%">
                    <form action="index.php" method="post">
                        <!--Gutschein 1-->
                        <div class="col-md-6">
                            <input type="submit" name="gutschein1" class="" value="Gutschein 1" style="padding-top:10%; padding-bottom:10%;">
                        </div>
                        <!--Gutschein 2-->
                        <div class="col-md-6" >
                            <input type="submit" name="gitschein2" class="" value="Gutschein 2" style="padding-top:10%; padding-bottom:10%;">
                        </div>
                    </form>
                </div>

                <!--Registrieren-->
                <div class="col-md-12" style="padding-top:3%; padding-bottom:5%">
                    <form action="index.php" method="post">
                        <!--Start-->
                        <div class="col-md-offset-10 col-md-2">
                            <input type="submit" name="registrieren" class="" value="Registrieren">
                        </div>
                    </form>
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
