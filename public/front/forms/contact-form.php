<?php

    require_once('../sendmail.php');

    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $website = filter_var($_POST['website'], FILTER_SANITIZE_STRING);
    $message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);

    $error = "";

    if (strlen($name) < 2) {
        $error['name'] = "Please enter your name";
    }

    if (!preg_match('/^[a-z0-9&\'\.\-_\+]+@[a-z0-9\-]+\.([a-z0-9\-]+\.)*+[a-z]{2}/is', $email)) {
        $error['email'] = "Please enter a valid email address";
    }

    if (!$error) {

        require_once('phpmailer/class.phpmailer.php');
        $mail = new PHPMailer();

        $mail->From = $email;
        $mail->FromName = $name;
        $mail->Subject = 'Contact Form';
        $mail->AddAddress($site_owners_email, $site_owners_name);
        $mail->IsHTML(true);
        $mail->Body = '<b>Name:</b><br/> '. $name .'<br/><br/><b>E-mail:</b><br/> '. $email .'<br/><br/><b>Website:</b><br/> '. $website .'<br/><br/><b>Message:</b><br/>' . $message;

        $mail->Send();

        echo "<div class='alert alert-success'  role='alert'>Thanks " . $name . ". Your message has been sent.</div>";

    } # end if no error
    else {

        $response = (isset($error['name'])) ? "<div class='alert alert-danger'  role='alert'>" . $error['name'] . "</div> \n" : null;
        $response .= (isset($error['email'])) ? "<div class='alert alert-danger'  role='alert'>" . $error['email'] . "</div> \n" : null;

        echo $response;
    } # end if there was an error sending

?>
