 <?php 
    // header('Access-Control-Allow-Headers: Access-Control-Allow-Origin, Content-Type');
    // header('Access-Control-Allow-Origin:' ,'http://localhost:61580');
    // header('Content-Type: application/json, charset=utf-8');
    //get data from json post 
    $json = file_get_contents('php://input');
    $data = json_decode($json,true);
    $username = $data['username'];
    $email = $data['email'];
    $password = $data['password'];

    $headers = "MIME-Version: 1.0" . "\r\n"; 
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 
    $headers = "From: hammamiwissem21@gmail.com";
    //mail config 
    $dest = $email;
    $sujet = "Testing";
    $message = "Username : " . $username . " || Password: " . $password;
  

    //testing of mail
    if (mail($dest, $sujet, $message, $headers)) {
        $array = array('result' => 'OK');
        echo json_encode($array);
    } else {
        $array = array('result' => 'NO');
        echo json_encode($array);
    }
?> 