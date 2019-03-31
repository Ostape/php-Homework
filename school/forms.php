<?php
require_once 'connection.php';

$link = mysqli_connect($host, $user, $password, $database)
or die("Ошибка " . mysqli_error($link));

mysqli_select_db($link, $database);

if(isset($_POST['username'])){

    $uname=$_POST['username'];
    $password=$_POST['password'];

    $query="select * from login_form where User='".$uname."'AND Pass='".$password."' limit 1";

    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link ));


    if(mysqli_num_rows($result)==1){
        echo " You Have Successfully Logged in";
        exit();
    }
    else{
        echo " You Have Entered Incorrect Password";
        exit();
    }
}
?>

<style>
    body{
        margin: 0 auto;
        background-size: 100% 720px;
    }

    .container{
        width: 500px;
        height: 300px;
        text-align: center;
        margin: 0 auto;
        background-color: rgba(44, 62, 80,0.7);
        margin-top: 160px;
    }

    input[type="text"],input[type="password"]{
        margin-top: 30px;
        height: 45px;
        width: 300px;
        font-size: 18px;
        margin-bottom: 20px;
        background-color: #fff;
        padding-left: 40px;
    }

    .form-input::before{
        padding-left: 07px;
        padding-top: 40px;
        position: absolute;
        font-size: 35px;
        color: #2980b9;
    }


    .btn-login{
        padding: 15px 25px;
        border: none;
        background-color: #27ae60;
        color: #fff;
    }
</style>

    <div class="container">
        <form method="POST" action="#">
            <div class="form-input">
                <input type="text" name="username" placeholder="Enter the User Name"/>
            </div>
            <div class="form-input">
                <input type="password" name="password" placeholder="password"/>
            </div>
            <input type="submit" type="submit" value="LOGIN" class="btn-login"/>
        </form>
    </div>
<div style="width: 100%; height: 100px"></div>

