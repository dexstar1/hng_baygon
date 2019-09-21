<html>
    <head><title>sign up</title>



</head>
    <body>
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
 </body>
 </html>