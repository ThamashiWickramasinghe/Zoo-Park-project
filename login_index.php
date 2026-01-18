<?php 
session_start(); 

include "db_conn.php"; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//validation
    
    function validate($data) {
        return htmlspecialchars(trim($data));
    }

    
    $email = validate($_POST['email']);
    $password = validate($_POST['password']);

  
    if (empty($email)) {
        header("Location: login.php?error=User Email is required");
        exit(); 
    } 
    if (empty($password)) {
        header("Location: login.php?error=Password is required");
        exit();
    } 

    
    $sql = "SELECT * FROM user_data WHERE user_email = '$email' AND password = '$password'";
    $result = mysqli_query($conn, $sql);

    
    if (mysqli_num_rows($result) == 1) {
        
        $row = mysqli_fetch_assoc($result);
//checking email and password
       
        if ($row['user_email'] === $email && $row['password'] === $password) {
            
            $_SESSION['user_email'] = $row['user_email']; 
            $_SESSION['id'] = $row['id'];

            
            header("Location: user_page.php"); 
            exit();
        } else {
            header("Location: login.php?error=Incorrect User email or password");
            exit(); // error message
        }
    } else {
        header("Location: login.php?error=Incorrect User email or password");
        exit(); //error message
    }
} else {
    header("Location: login.php");
exit();
}
?>
