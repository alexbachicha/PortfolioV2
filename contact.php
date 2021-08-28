<?php
 
// Email address verification
function isEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}
 
if($_POST) {
    // Email that receivew message
    $emailTo = 'agbachicha@outlook.com';
    
    $name = addslashes(trim($_POST['name']));
    $email = addslashes(trim($_POST['email']));
    $subject = addslashes(trim($_POST['subject']));
    $message = addslashes(trim($_POST['message']));
 
    $array = array('nameMessage' => '','emailMessage' => '', 'subjectMessage' => '', 'messageMessage' => '');
    
    if($name == '') {
        $array['nameMessage'] = 'Empty name!';
    }
    if(!isEmail($email)) {
        $array['emailMessage'] = 'Invalid email!';
    }
    if($subject == '') {
        $array['subjectMessage'] = 'Empty subject!';
    }
    if($message == '') {
        $array['messageMessage'] = 'Empty message!';
    }
    if(isEmail($email) && $name != '' && $subject != '' && $message != '') {
        // Send email
        $headers = "From: " . $email . " <" . $email . ">" . "\r\n" . "Reply-To: " . $email;
        mail($emailTo, $subject . " (bootstrap contact form tutorial)", $message, $headers);
    }
 
    echo json_encode($array);
 
}
 
?>