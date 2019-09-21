<?php  
 $message = '';  
 $error = '';  
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
           if(file_exists('users.json'))  
           {  
                $current_data = file_get_contents('users.json');  
                $array_datas = json_decode($current_data);  
                    foreach($array_datas as $array_data)
                    {
                    if($array_data->username == $_POST["username"])
                         {
                              if($array_data->password == $_POST["password"])
                              {
                                   $message = "Login succesful";
                                       header("location: welcome.php");
                              }
                              else{
                                   $error = 'incorrect password';
                              }
                         }
                         else{
                              $error = 'incorrect username';
                         }
                    }     
          }  
      }
 }  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Baygon - Signin</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
      </head>  
      <body>  
           <br />  
           <div class="container" style="width:500px;">  
                <h3 align="">Sign In</h3><br />                 
                <form method="post">  
                     <?php   
                     if(isset($error))  
                     {  
                          echo $error;  
                     }  
                     ?>  
                     <br />  
                     <label>Username</label>  
                     <input type="text" name="username" class="form-control" /><br />  
                     <label>Password</label>  
                     <input type="text" name="password" class="form-control" /><br /> 
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