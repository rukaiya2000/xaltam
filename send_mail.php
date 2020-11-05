<?php

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && (isset($_POST["csrf"]) && $_POST["csrf"] == $_SESSION["token"])){

    require dirname(__FILE__).'/utilities/phpmailer/PHPMailerAutoload.php';

    $errors=[];
    $_SESSION = array();
    session_destroy();
    $to_email='contact@xaltam.com';

    if(isset($_POST['full_name'])){
        $full_name= filter_var($_POST['full_name'],FILTER_SANITIZE_STRING);
    }else{
        $errors["full_name"] = "Name is empty";
    }

    if(isset($_POST['email']) && $_POST["email"]!=""){
        $email= filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $errors["email"] = "Email id is not valid";
        }
    }else{
        $errors["email"] = "Email id is empty";
    }

    if(isset($_POST['phone'])){
        $phone= filter_var($_POST['phone'],FILTER_SANITIZE_STRING);
    }else{
        $errors["phone"] = "Phone number is empty";
    }


    if(isset($_POST['subject']) && $_POST["subject"]!=""){
        $subject= filter_var($_POST['subject'],FILTER_SANITIZE_STRING);
    }else{
        $errors["subject"] = "Subject is empty";
    }
    if(isset($_POST['message']) && strlen($_POST['message']) > 50){
        $mssg= filter_var($_POST['message'],FILTER_SANITIZE_STRING);
    }else{
        $errors['message']="Message length must greater than 50 characters";
    }


    if(count($errors)==0){
        $body='<table align="left" rules="none" border="1" cellpadding="5" cellspacing="0" width="600">'.
            '<tr><td>Name</td><td>'.$full_name.'</td></tr>'.
            '<tr><td>Email</td><td>'.$email.'</td></tr>'.
            '<tr><td>Phone</td><td>'.$phone.'</td></tr>'.
            '<tr><td>Subject</td><td>'.$subject.'</td></tr>'.
            '<tr><td>Message</td><td>'.$mssg.'</td></tr>'.
            '</table>';
        $mail = new PHPMailer;
        //$mail->isSMTP();
        $mail->Host = 'mail.xaltam.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'no-reply@xaltam.com';
        $mail->Password = 'TTvj#kUbW_w#';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 465;
        $mail->setFrom('no-reply@xaltam.com', 'no-reply');
        $mail->addAddress($to_email, $to_email);
        $mail->isHTML(true);
        $mail->Subject = 'Contact Form Web';
        $mail->Body    = $body;
        $mail->AltBody = $body;
        if(!$mail->send()) {
            echo $mail->ErrorInfo;
        } else {
            echo 'ok';
        }
    }else{
        echo json_encode($errors);
    }

}else{
    echo 'POST ERROR';
}

?>
