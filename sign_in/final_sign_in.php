<?php  

session_start();

if(isset($_SESSION['username']))
{
 header("location:../welcome_page/welcome_page.php");
}
else{

        $message = '';  
        $error = '';  

        //  function  createConfirmationmbox(){
        //     echo '<script type="text/javascript"> ';
        //     // echo 'newurl = "welcome/welcome.php";';
        //     echo ' function openulr(newurl) {';
        //     echo '  if (confirm("Signed in succesfully)) {';
        //     echo '    document.location = newurl;';
        //     echo '  }';
        //     echo '}';
        //     echo '</script>';
        // }

        if(isset($_POST["submit"]))  
        {  
            if(empty($_POST["username"]))  
            {  
                $error = "<label class='text-danger'> Kindly provide a username </label>";  
            }  
            else if(empty($_POST["password"]))  
            {  
                $error = "<label class='text-danger'>Please provide a password</label>";  
            }  
            else  
            {  
                if(file_exists('../users.json'))  
                {  
                        $current_data = file_get_contents('../users.json');  
                        $array_datas = json_decode($current_data);  
                            foreach($array_datas as $array_data)
                            {
                            if($array_data->username == $_POST["username"])
                                {
                                    if($array_data->password == $_POST["password"])
                                    {
                                        $message = "Login succesful";
                                        echo "<script type='text/javascript'>alert('$message');</script>";
                                        $_SESSION['username'] = 'username';
                                        echo "<script type='text/javascript'>window.location.href='../welcome_page/welcome_page.php';</script>"; 

                                    }
                                    else{
                                        $error = 'incorrect password';
                                    }
                                }
                                else{
                                    $error = 'You have not signed up,  <a href="../sign_up/final_sign_up.php">click here</a> to sign up;
                                }
                            }     
                }  
            }
        }  
    }
 ?>  
<!DOCTYPE html>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="hng.css" rel="stylesheet">
    <title>Sign in</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> 
</head>
    <style>
        
        .sign-up-link, .sign-up-btn, .sign-in-link{
            border-radius: 20px;
            border: 1px solid white;
            color: white !important;
            width: auto !important;
            padding: 10px 20px 7px !important;
            font-size: 14px;
            font-weight: bold;
            text-decoration: none;
        }
        .sign-in-btn{
            border-radius: 20px;
            border: 1px solid black;
            color: black !important;
            width: auto !important;
            padding: 10px 20px 7px !important;
            font-size: 14px;
            font-weight: bold;
            text-decoration: none;
        }
    </style>
<body>

<div id="content">

    <div class="one">
<h2 class="Header-text">Baygon</h2>
<h3 class="Sign-in">Sign In</h3>
<form method="post" action= "">
    <br />
    <h3 style="color:red; text-align:center;">   
        <?php   
            if(isset($error))  
        {  
            echo $error;  
        }  
        ?> 
    </h3>
<input type="text" value="username" name="username"/><br>
<input type= "password" value="password" name="password"/>

<input type="submit" name="submit" value="Sign In" class="btn btn-info sign-in-btn" /><br /> 
     
        <br /> 
        <h3 style="color:green; text-align:center;">                     
            <?php
            if(isset($message))  
            {  
                echo $message;  
            }  
            ?>  
        </h3>
</form>
<!-- <div>
<button type="button" href="sign_in.php">Sign in</button>
</div> -->
    
</div>
    
<div class="two">
    
    <h3 class="Header-two">Sign Up Today</h3>
    <p class="text-one">Don't have an account?</p>
    <p class="text-two">Create one now and get started.</p>

    <a href="../sign_up/final_sign_up.php" class="btn sign-up-link"> Sign up</a>
</div>
</div>





</body>
</html>
