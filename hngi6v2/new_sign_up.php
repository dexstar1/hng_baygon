<?php  
 $message = '';  
 $error = '';  
 if(isset($_POST["submit"]))  
 {  
      if(empty($_POST["full_name"]))  
      {  
           $error = "<label class='text-danger'>Kindly provide a full name</label>";  
      }  
      else if(empty($_POST["username"]))  
      {  
           $error = "<label class='text-danger'> Kindly provide a username </label>";  
      }  
      else if(empty($_POST["password"]))  
      {  
           $error = "<label class='text-danger'>Please provide a password</label>";  
      }  
      else if(empty($_POST["confirm_password"]))  
      {  
           $error = "<label class='text-danger'>Please confirm your password</label>";  
      }  
      else  
      {  
           if(file_exists('users.json'))  
           {  
                $current_data = file_get_contents('users.json');  
                $array_data = json_decode($current_data, true);  
                $extra = array(  
                     'full_name' => $_POST['full_name'],  
                     'username' =>  $_POST["username"],  
                     'password' =>  $_POST["password"]
                );  
                $array_data[] = $extra;  
                $final_data = json_encode($array_data);  
                if(file_put_contents('users.json', $final_data))  
                {  
                     $message = "<label class='text-success'>Registration Successful</p>";  
                }  
           }  
           else  
           {  
                $error = 'Error saving file';  
           }  
      }  
 }  
 ?>  
<!doctype html>
<html>
<head>
    <title> Sign Up Page </title>
    <style>
        body {
            background-image: url(tablet.jpg);
            background-repeat: no-repeat;
            background-size: cover;
        }
        #text{
            position: absolute;
            top: 50%;
            left: 50%;
            height:500px;
            width:500px;
            border-radius:50px;
            font-size:120%;
            font-family:sans-serif;
            background-color: white;
            color: black;
            transform: translate(-50%,-50%);
            -ms-transform;
            margin-top:50px;
            padding-left:100px;
            padding-right:100px;
            padding-top:50px;
            padding-bottom:50px;
            clear:both;
        }
        input{
            border-top:none;
            border-right:none;
            border-left:none;
            border-bottom:2px solid black;
            width:350px;
        }
        form{
            text-align:left;
        }
        button{
            background-color:black;
            color:white;
            padding:10px 20px;
            border-radius:50px;
        }
        .sign_in{
            background-color:white;
            border:2px solid black;
            color:black;
        }
        .sign_in:hover{
            background-color:black;
            border:3px solid blue;
            color:white;
        }
        .sign_up{
            margin-left: 185px;
            align-content: center;
        }
        button:hover{
            color:black;
            background-color:white;
            border:3px solid green;
            cursor:pointer;
        }
        
        .account{
            margin-left:150px;
        }
    </style>

</head>
<body>
        



 
    <div id="overlay">
        <div id="text">
            <!-- <p class="account">Already have an account? &nbsp; &nbsp; <button class="sign_in"; onclick="window.location.href = 'sign_in/hng.html';"> SIGN IN</button></p> -->
            <h2> BAYGON </h2>
            <p> Create your account by filling </p>
            <p> the form below </p>
                    <?php   
                        if(isset($error))  
                     {  
                          echo $error;  
                     }  
                     ?>  
            <form method="POST" action="sign_up.php">
                Full Name: <br>
                <input type="text" name="full_name" required><br><br>
                Username: <br>
                <input type="text" name="username" required><br><br>
                Password: <br>
                <input type="password" name="password" required><br><br>
                <label>Confirm Password</label>  
                <input type="text" name="confirm_password" required/><br />  
                <input type="submit" name="submit" value="SIGNUP" class="btn btn-info" /><br />                      
                     <?php
                        if(isset($message))  
                     {  
                          echo $message;  
                     }  
                     ?>  
            
        </div>
    </div>
</form> 
</body>
</html>