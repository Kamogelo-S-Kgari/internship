<?php
    use PHPMailer\PHPMailer\PHPMailer;

    if (isset($_POST['name']) && isset($_POST['email'])) {
        $name = $_POST['name'];
        $lname = $_POST['lname'];
        $companyname = $_POST['companyname'];
        $phonenumber = $_POST['phonenumber'];
        $email = $_POST['email'];
        $message = $_POST['message'];
        $about = $_POST['about'];
        $wholeBody ="";

        $wholeBody .= "From: " . $name. " " . $lname . "<br>";
        $wholeBody .= "Company Name: " . $companyname . "<br>";
        $wholeBody .= "Phone Number: " . $phonenumber . "<br>";
        $wholeBody .= "Email: " . $email . "<br>";
        $wholeBody .= "Message: " . $message . "<br>";
        $wholeBody .= "Where did you hear about this solution: " . $about ;

        require_once "PHPMailer/PHPMailer.php";
        require_once "PHPMailer/SMTP.php";
        require_once "PHPMailer/Exception.php";

        $mail = new PHPMailer();

        //SMTP Settings
        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->Username = "#";
        $mail->Password = '#';
        $mail->Port = 465; //587
        $mail->SMTPSecure = "ssl"; //tls

        //Email Settings
        $mail->isHTML(true);
        $mail->setFrom($email, $name);
        $mail->addAddress("#");
        $mail->Subject = $companyname;
        $mail->Body = $wholeBody;

        if ($mail->send()) {
            $status = "success";
            $response = "Your Message is sent!";
        } else {
            $status = "failed";
            $response = "Something is wrong: <br><br>" . $mail->ErrorInfo;
        }

        exit(json_encode(array("status" => $status, "response" => $response)));
    }
?>
