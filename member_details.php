<?php
@include 'db_conn.php';


if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM user_data WHERE id = $id");
    header('location:member_details.php');
}






?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Admin Page</title>
        <!--font awesome cdn link-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
       
        

        <!--custom css file link-->
        <link rel="stylesheet" href="style.css">
    </head>

    <body>


    <h2>Zoo Parc Members</h2>
         <!--alert message-->

        <?php
        if(isset($message)){
            foreach($message as $message){
                echo'<span class="message">'.$message.'</span>';
            }
        }
        ?>
        <!--connect db to table-->

            <?php
            $select=mysqli_query($conn, "SELECT* FROM user_data ");
            ?>


        <div class="event_display">
            <table class = "event_display_table">
                <thead>
                    <tr>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Phonenumber</th>
                        <th>Password</th>
                        <th colspan="2">action</th>
                        
                    </tr>
                </thead>
                    <?php
                    while($row= mysqli_fetch_assoc($select)){ ?>
                    <tr>
                        
                        <td><?php echo $row['name'];?></td>
                        <td><?php echo $row['user_email'];?></td>
                        <td><?php echo $row['address'];?></td>
                        <td><?php echo $row['phonenumber'];?></td>
                        <td><?php echo $row['password'];?></td>

                        <td>
                            
                            <a href="member_details.php?delete=<?php echo $row['id'];?>" class="btn"><i class="fas fa-trash"></i>delete</a>
                        </td>
                        
                    </tr>

                    <?php  }; ?>
                
            </table>
        </div>

        </div>

    </body>
</html>
