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
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Baygon - Signup</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
      </head>  
      <body>  
           <br />  
           <div class="container" style="width:500px;">  
                <h3 align="">Sign Up</h3><br />                 
                <form method="post">  
                     <?php   
                     if(isset($error))  
                     {  
                          echo $error;  
                     }  
                     ?>  
                     <br />  
                     <label>Full Name</label>  
                     <input type="text" name="full_name" class="form-control" /><br />  
                     <label>Username</label>  
                     <input type="text" name="username" class="form-control" /><br />  
                     <label>Password</label>  
                     <input type="text" name="password" class="form-control" /><br />  
                     <label>Confirm Password</label>  
                     <input type="text" name="confirm_password" class="form-control" /><br />  
                     <input type="submit" name="submit" value="Append" class="btn btn-info" /><br />                      
                     <?php  
                     if(isset($message))  
                     {  
                          echo $message;  
                     }  
                     ?>  
                </form>  
           </div>  
           <br />  
      </body>  
 </html>  