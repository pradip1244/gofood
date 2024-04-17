<?php
$_REQUEST = $_SERVER['REQUEST_URL'];
$router= str_replace('gofood/GoFood.Project','',$request);

if($router == '/'){
    include('homepage.html');
}else if($router == '/signin'){
    include('signin.php');
}else if($router == '/signup'){
    include('signup.html');
}else {
    include('404.html');
}
?>
