<?php
 
if(isset($_POST['email'])) {
 
     
 
    // EDIT THE 2 LINES BELOW AS REQUIRED
 
    $email_to = "reservatie@antwerpmeetingrooms.be";
 
    $email_subject = "Reservatie";
 
     
 
     
 
    function died($error) {
 
        // your error code can go here
 
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
 
        echo "These errors appear below.<br /><br />";
 
        echo $error."<br /><br />";
 
        echo "Please go back and fix these errors.<br /><br />";
 
        die();
 
    }
 
     
 
    // validation expected data exists
 
    if(!isset($_POST['name']) ||
       
        !isset($_POST['zaal']) ||
       
        !isset($_POST['dag']) ||
 
        !isset($_POST['email']) ||
       
        !isset($_POST['telefoon']) ||
       
        !isset($_POST['personen']) ||
       
        !isset($_POST['date']) ||
 
        !isset($_POST['message'])) {
 
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
 
    }    
        if (isset($_POST['beamer'])) 
        { $Beamer = "yes"; } 
        else { $Beamer = "no"; }
    
        if (isset($_POST['Flip-over'])) 
        { $Flipchart = "yes"; } 
        else { $Flipchart = "no"; }
    
        if (isset($_POST['Broodjeslunch'])) 
        { $Broodjeslunch = "yes"; } 
        else { $Broodjeslunch = "no"; }
    
        if (isset($_POST['koffie'])) 
        { $koffie = "yes"; } 
        else { $koffie = "no"; }
    
    
    $first_name = $_POST['name']; // required
    
    $zaal = $_POST['zaal']; // required
 
    $email_from = $_POST['email']; // required
 
    $comments = $_POST['message']; // required
    
    $telefoon = $_POST['telefoon']; // required
 
    $personen = $_POST['personen']; // required
    
    $dag = $_POST['dag']; // required
 
    $date = $_POST['date']; // required
 
     
 
    $error_message = "";
 
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$email_from)) {
 
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
 
  }
 
    $string_exp = "/^[A-Za-z .'-]+$/";
 
  if(!preg_match($string_exp,$first_name)) {
 
    $error_message .= 'The First Name you entered does not appear to be valid.<br />';
 
  }
 
  if(strlen($error_message) > 0) {
 
    died($error_message);
 
  }
 
    $email_message = "Form details below.\n\n";
 
     
 
    function clean_string($string) {
 
      $bad = array("content-type","bcc:","to:","cc:","href");
 
      return str_replace($bad,"",$string);
 
    }
 
    $email_message .= "zaal: ".clean_string($zaal)."\n";
    
    $email_message .= "First Name: ".clean_string($first_name)."\n";
 
    $email_message .= "Email: ".clean_string($email_from)."\n";
    
    $email_message .= "telefoon: ".clean_string($telefoon)."\n";
 
    $email_message .= "Aantal personen: ".clean_string($personen)."\n";
 
    $email_message .= "datum: ".clean_string($date)."\n";
    
    $email_message .= "Dag: ".clean_string($dag)."\n";
    
    $email_message .= "Beamer: ".clean_string($Beamer)."\n";
    
    $email_message .= "Flipchart: ".clean_string($Flipchart)."\n";
    
    $email_message .= "Broodjeslunch: ".clean_string($Broodjeslunch)."\n";
    
    $email_message .= "koffie: ".clean_string($koffie)."\n";
 
    $email_message .= "Comments: ".clean_string($comments)."\n";
 
 
// create email headers
 
$headers = 'From: '.$email_from."\r\n".
 
'Reply-To: '.$email_from."\r\n" .
 
'X-Mailer: PHP/' . phpversion();
 
@mail($email_to, $email_subject, $email_message, $headers);  
header('Location: dankuwelpagina.html');
?>
 
 
 
<!-- include your own success html here -->
 
Thank you for contacting us. We will be in touch with you very soon.
 
 
 
<?php


}
 
?>