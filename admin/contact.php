<?php
  if (isset($_POST['message'])) {
    $title = "contact us";
    $message = $_POST['message'];

    ini_set("SMTP", "smtp.gre.ac.uk");
    ini_set("sendmail_from", "pm76@gre.ac.uk");
    mail("pm76@gre.ac.uk", "mail test", $message);
    $output = "Thank you for your message we will get back to you shortly";
  } else {
    $title = "contact us";
    ob_start();
    include 'templates/mailform.html.php';
    $output = ob_get_clean();
  }
  include 'templates/layout.html.php';