<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';
require_once 'Database.php';
require_once 'JobSeekerProfile.php';

session_start();
$email = $_SESSION['user'];
$job_title = $_SESSION['job_title'];
$user_id = $_SESSION['user_id'];

$j = new JobSeekerProfile();

$user = $j->jobseekerDetailsById(Database::getDb(), $user_id);

$userfname = $user->user_firstname;


$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
   // $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'aproject258@gmail.com';                 // SMTP username
    $mail->Password = 'Hetansh18091998*';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;
    // TCP port to connect to
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );
    //Recipients
    $mail->setFrom('aproject258@gmail.com', 'Job Stock');
    $mail->addAddress($email, $userfname);     // Add a recipient



    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $userfname.', We have received your resume for '.$job_title;
    $mail->Body    = 'Hello '. $userfname .' , <br/><br/><p>We have just received your job application towards the position of '.$job_title.' and we truly appreciate your interest. </p><br/><br/> <p>Thank you.</p> ';
    $mail->AltBody = 'Hello '. $userfname .' , \n We have just received your job application towards the position of '.$job_title.' and we truly appreciate your interest ';

    $mail->send();
    //echo 'Message has been sent';
    echo "<script>
                alert('Job application submitted successfully.');
                window.location.href='home.php';
                </script>";
} catch (Exception $e) {
    echo $email;
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}