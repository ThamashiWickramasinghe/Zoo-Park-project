<?php
@include 'db_conn.php';

//asign values

if(isset($_POST['add_admin'])){
    $add_name=$_POST['add_name'];
    $add_email=$_POST['add_email'];
    $add_phonenumber=$_POST['add_phonenumber'];
    $password=$_POST['password'];
   
    //empty field validation

    if(empty($add_name) ||empty($add_email) ||empty($add_phonenumber) ||empty($password)){
        $message[]='Please fill out all';
    }else{
        $insert = "INSERT INTO admin_data(user_name,user_email,phonenumber,password)VALUES('$add_name','$add_email','$add_phonenumber','$password')";
        $upload = mysqli_query($conn, $insert);
            // data insert successfull message
            if($upload) {
              
               $message[]='new event added successfully';
            }
			else
			{
                $message[]='cloud not add the details';
			}
			
			
   }  
    };
// delete data
    if(isset($_GET['delete'])){
        $id = $_GET['delete'];
        mysqli_query($conn, "DELETE FROM admin_data WHERE id = $id");
        header('location:add_admin.php');
    }




?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Admin Page</title>
        <!--font awesome cdn link-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <!--custom css file link-->
        <link rel="stylesheet" href="style.css">
    </head>

    <body>
         

        <?php
        if(isset($message)){
            foreach($message as $message){
                echo'<span class="message">'.$message.'</span>';
            }
        }
        ?>
        <div class="container">
            <div class="admin-product-form-container">
                <form action="<?php $_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data">
                    <h3>Add Admin Panel</h3>
                    <input type="text" placeholder="enter  name" name="add_name" class="box">
                    <input type="text" placeholder="enter email" name="add_email" class="box">
                    <input type="text" placeholder="enter phonenumber" name="add_phonenumber" class="box">
                    <input type="text" placeholder="password" name="password" class="box">
                  
                    <input type="submit" class="btn" name="add_admin" value="add admin panel">
                </form>
            </div>

            <?php
            $select=mysqli_query($conn, "SELECT* FROM admin_data ");
            ?>


        <div class="event_display">
            <table class = "event_display_table">
                <thead>
                    <tr>
                        <th>Admin name</th>
                        <th>email</th>
                        <th>phonenumber</th>
                        <th>password</th>
                        <th colspan="2">action</th>
                    </tr>
                </thead>
                    <?php
                    while($row= mysqli_fetch_assoc($select)){ ?>
                    <tr>
                       
                        <td><?php echo $row['user_name'];?></td>
                        <td><?php echo $row['user_email'];?></td>
                        <td><?php echo $row['phonenumber'];?></td>
                        <td><?php echo $row['password'];?></td>
                       
                        <td>
                          
                            <a href="add_admin.php?delete=<?php echo $row['id'];?>" class="btn"><i class="fas fa-trash"></i>delete</a>
                        </td>
                    </tr>

                    <?php  }; ?>
                
            </table>
        </div>

        </div>

    </body>
</html>
