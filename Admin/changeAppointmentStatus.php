<?php 
require_once('conn/config.php');
 $_POST['val'];
 $_POST['apt_id'];

 $change_status_query=mysqli_query($conn,"UPDATE `appointment` SET `appointment_status`='". $_POST['val']."' WHERE `id`='".$_POST['apt_id']."' ");
 if($change_status_query){
 	//echo"Success";
 	$q = mysqli_query($conn,"SELECT * FROM `appointment` WHERE `id`='".$_POST['apt_id']."'");
 	$data = mysqli_fetch_assoc($q);
 	echo $data['appointment_status'];

 }

require '../PHPMailerAutoload.php';
require '../credential.php';

$mail = new PHPMailer;

$mail->SMTPDebug = 4;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = EMAIL;                 // SMTP username
$mail->Password = PASS;                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom(EMAIL, 'Mail by localhost');
$mail->addAddress($data['email'], 'Vaibhav Gangrade');     // Add a recipient
//$mail->addAddress('ellen@example.com');               // Name is optional
$mail->addReplyTo(EMAIL, 'Information');
// $mail->addCC('cc@example.com');
// $mail->addBCC('bcc@example.com');

//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Your Message status';
$mail->Body    = 'Your message status changed to'." "."<b>".$data['appointment_status']."<b>";



//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
  //$_SESSION['mail_success']="A mail sent to your email address for login details";
    echo 'Message has been sent';
   // header('location:login.php');
}

$_SESSION["chng_status"] = "Message status changed to "." ".$data['appointment_status']." and mail sent to '".$data['email']."'";


?>

