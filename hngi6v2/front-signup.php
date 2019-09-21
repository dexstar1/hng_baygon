<?php  
 $message = '';  
 $error = '';  
 
   
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
                   echo $message = "<label class='text-success'>You have registered Successful</p>"; 
                  
                }  
           }  
           else  
           {  
                $error = 'Error saving file';  
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
            <p class="account">Already have an account? &nbsp; &nbsp; <button class="sign_in" href ="sign_in.html"> SIGN IN</button></p>
            <h2> BAYGON </h2>
            <p> Create your account by filling </p>
            <p> the form below </p>
            <form>
                Full Name: <br>
                <input type="text" name="Full Name"><br><br>
                Username: <br>
                <input type="email" name="Username"><br><br>
                Password: <br>
                <input type="password" name="Password"><br><br>
                Confirm Password: <br>
                <input type="password" name="Confirm Password"><br><br>
                <span class="sign_up"><button href="sign_up.html">SIGN UP </button></span>
            </form>
        </div>
    </div>
</body>
</html>