<?php
 /*   $temp = '123456';
    $key = 'test';
    var_dump($temp);
    echo "<br>";
    //$password = $this->encrypt->encode($temp,$key);
    $password = password_hash($temp, PASSWORD_BCRYPT);
    var_dump($password);
    //$result = $this->encrypt->decode($password,$key);
    $result = password_verify($password, $temp);
    echo "<br>";
    var_dump($result);

*/
$hash   = password_hash('123456', PASSWORD_DEFAULT);
$verify = '123456';
if (  password_verify($verify, $hash)) {
    die('Passwords are the same...');
}






?>