<?php
@include 'db_conn.php';

//asign values

if(isset($_POST['add_event'])){
    $event_name=$_POST['event_name'];
    $event_about=$_POST['event_about'];
    $event_date=$_POST['event_date'];
    $event_time=$_POST['event_time'];
    $event_location=$_POST['event_location'];
    $event_image=$_FILES['event_image']['name'];
    $event_image_tmp_name=$_FILES['event_image']['tmp_name'];
    $event_image_folder='uploading_image/'.$event_image;

    //empty field validation

    if(empty($event_name) ||empty($event_about) ||empty($event_date) ||empty($event_time) ||empty($event_location) ||empty($event_image)){
        $message[]='Please fill out all';
    }else{
        $insert = "INSERT INTO event_data(name,about,date,time,location,image)VALUES('$event_name','$event_about','$event_date','$event_time','$event_location','$event_image')";
        $upload = mysqli_query($conn, $insert);
            // data insert successfull message
            if($upload) {
               move_uploaded_file($event_image_tmp_name,$event_image_folder);
               $message[]='new event added successfully';
            }
			else
			{
                $message[]='cloud not add the event';
			}
			
			
   }  
    };
// delete data
    if(isset($_GET['delete'])){
        $id = $_GET['delete'];
        mysqli_query($conn, "DELETE FROM event_data WHERE id = $id");
        header('location:admin_page.php');
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
                    <h3>Add New Events & Program</h3>
                    <input type="text" placeholder="enter event/program name" name="event_name" class="box">
                    <input type="text" placeholder="Short discription" name="event_about" class="box">
                    <input type="date" placeholder="date" name="event_date" class="box">
                    <input type="text" placeholder="time" name="event_time" class="box">
                    <input type="text" placeholder="location" name="event_location" class="box">
                    <input type="file" name="event_image" class="box" accept="image/png, image/jpeg, image/jpg">
                    <input type="submit" class="btn" name="add_event" value="add event/program">
                </form>
            </div>

            <?php
            $select=mysqli_query($conn, "SELECT* FROM event_data ");
            ?>


        <div class="event_display">
            <table class = "event_display_table">
                <thead>
                    <tr>
                        <th>event image</th>
                        <th>event name</th>
                        <th>event discription</th>
                        <th>event date</th>
                        <th>event time</th>
                        <th>event location</th>
                        <th colspan="2">action</th>
                    </tr>
                </thead>
                    <?php
                    while($row= mysqli_fetch_assoc($select)){ ?>
                    <tr>
                        <td><img src="uploading_image/<?php echo $row['image'];?>" height="150" width="250" alt=""></td>
                        <td><?php echo $row['name'];?></td>
                        <td><?php echo $row['about'];?></td>
                        <td><?php echo $row['date'];?></td>
                        <td><?php echo $row['time'];?></td>
                        <td><?php echo $row['location'];?></td>
                        <td>
                            <a href="admin_update.php?edit=<?php echo $row['id'];?>" class="btn"><i class="fas fa-edit"></i>edit</a>
                            <a href="admin_page.php?delete=<?php echo $row['id'];?>" class="btn"><i class="fas fa-trash"></i>delete</a>
                        </td>
                    </tr>

                    <?php  }; ?>
                
            </table>
        </div>

        </div>

    </body>
</html>
