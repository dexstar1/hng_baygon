<?php 

session_start();  
$message="";
if(!isset($_SESSION['username']))
{
 echo "<script type='text/javascript'>alert('You are not authorised to view this page');</script>";
//  header("location:../sign_in/final_sign_in.php");
}
else{
    $msg = 'Your are logged in';
}
?>
<!doctype html>
<html>
    <head>
        <title> Welcome Page </title>
        <style>
            a {
                text-decoration: none;
            }
            body {
                background-image:url(https://cdn.pixabay.com/photo/2016/03/09/09/22/workplace-1245776_960_720.jpg);
                background-repeat: no-repeat;
                background-size: cover;
            }
            p {
                color: blue;
                font-size: 40px;
                
            }
            
        .sign-out-btn{
            border-radius: 20px !important;
            border: 1px solid black !important;
            color: black !important;
            width: auto !important;
            padding: 10px 20px 7px !important;
            font-size: 14px !important;
            font-weight: bold !important;
            text-decoration: none !important;
        }
        </style>
    </head>
    <body>
        <h2 style="color:red;"><?php echo $message; ?></h2>
        <p><b> Baygon</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Start A Project&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Workshops &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Meet The Team&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        
            <button href="../sign_out.php" classs="sign-out sign-out-btn btn" > SIGN OUT</button>
    
        </p>
    </body>
        
        
