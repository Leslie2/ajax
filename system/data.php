<?php
<<<<<<< HEAD
  function get_db_connection()
  {
      $db = mysqli_connect('localhost', '199010_6_1', '0iQBtXwNfSZU', '199010_6_1')
       or die('Fehler beim Verbinden mit dem MySQL-Server.');
      mysqli_query($db, "utf8");
      return $db;
  }


  function get_result($sql)
  {
    $db = get_db_connection();
    //echo $sql;
    $result = mysqli_query($db, $sql);
    mysqli_close($db);
    return $result;
    }



/*   **************************************************************** */
/*    index.php
/*   **************************************************************** */



  function get_insert_result($sql)
  {
    $db = get_db_connection();
    //echo $sql;
    $result = mysqli_query($db, $sql);
    $last_id = mysqli_insert_id($db);
    mysqli_close($db);
    return $last_id;
  }


//registrierung
  function register($nachname, $vorname, $email)
  {
    $sql = "INSERT INTO user (nachname, vorname, email) VALUES ('$nachname', '$vorname', '$email');";
    return get_insert_result($sql);
  }








/* *****************************************************************************
/*  umfrage.php
/* ************************************************************************** */


  function get_fragen()
  {
    $sql = "SELECT * FROM fragen;";
    return get_result($sql);
  }

  function get_antworten($f_id)
  {
    $sql = "SELECT * FROM antworten WHERE f_id = $f_id;";
    return get_result($sql);
  }

  function insert_antworten($user_id, $kat_id)
  {
    $sql = "INSERT INTO user_antworten (user_id, kat_id) VALUES ($user_id, $kat_id);";
    return get_result($sql);
  }

  function evaluate($user_id)
  {
    $sql = "SELECT bezeichnung, user_id, kat_id, COUNT(kat_id) as total
            FROM `user_antworten`
            RIGHT JOIN Kategorien USING(kat_id)
            WHERE user_id = $user_id
            GROUP BY kat_id;";
    return get_result($sql);
  }

  function insert_ergebnis($user_id, $anteil_kat_1, $anteil_kat_2, $anteil_kat_3, $anteil_kat_4)
  {
    $sql = "INSERT INTO resultat (user_id, anteil_kat_1, anteil_kat_2, anteil_kat_3, anteil_kat_4) VALUES ($user_id, $anteil_kat_1, $anteil_kat_2, $anteil_kat_3, $anteil_kat_4);";
    return get_result($sql);
  }

  /* *****************************************************************************
  /* backend_fragen.php
  /* ************************************************************************** */

  function show_fragen()
  {
    $sql = "SELECT * FROM fragen;";
    return get_result($sql);
  }

  function save_fragen($text, $f_id)
  {
    $sql = "UPDATE fragen SET frage = '$text' WHERE f_id = $f_id;";
    return get_result($sql);
  }

  /* *****************************************************************************
  /* backend_antworten.php
  /* ************************************************************************** */

  function show_antworten()
  {
    $sql = "SELECT * FROM antworten;";
    return get_result($sql);
  }

  function save_antworten($text, $a_id)
  {
    $sql = "UPDATE antworten SET antwort = '$text' WHERE a_id = $a_id;";
    return get_result($sql);
  }

  /* *****************************************************************************
  /* backend_resultate.php
  /* ************************************************************************** */

  function show_ergebnis()
  {
    $sql = "SELECT resultat.*, user.email FROM resultat LEFT JOIN user USING(user_id);";
    return get_result($sql);
  }


  function delete_resultat($user_id)
  {
    $sql = "DELETE FROM resultat WHERE user_id = $user_id";
    return get_result($sql);
  }

  /* *****************************************************************************
  /* ergebnis.php
  /* ************************************************************************** */





//SELECT user_id, kat_id, COUNT(kat_id) FROM `user_antworten` WHERE user_id = 114 GROUP BY kat_id;
=======
 
>>>>>>> 83dd99e82c8d008b3eece057fe534e5c5e317fd1

 ?>
