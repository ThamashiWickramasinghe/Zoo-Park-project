<?php
@include 'db_conn.php';
$id = $_GET['edit'];

if(isset($_POST['update_event'])){
    $event_name=$_POST['event_name'];
    $event_about=$_POST['event_about'];
    $event_date=$_POST['event_date'];
    $event_time=$_POST['event_time'];
    $event_location=$_POST['event_location'];
    $event_image=$_FILES['event_image']['name'];
    $event_image_tmp_name=$_FILES['event_image']['tmp_name'];
    $event_image_folder='uploading_image/'.$event_image;

    if(empty($event_name) ||empty($event_about) ||empty($event_date) ||empty($event_time) ||empty($event_location) ||empty($event_image)){
        $message[]='Please fill out all';
    }else{
        $update = "UPDATE event_data SET name='$event_name',about='$event_about',date='$event_date',time='$event_time',location='$event_location',image='$event_image'
        WHERE id =$id";
        $upload = mysqli_query($conn, $update);
            
            if($upload) {
               move_uploaded_file($event_image_tmp_name,$event_image_folder);
               
            }
			else
			{
                $message[]='cloud not add the event';
			}
			
			
   }  
    }
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Admin Update</title>
        <!--font awesome cdn link-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

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
            <div class="admin-product-form-container centered">
                <?php
                $select = mysqli_query($conn, "SELECT * FROM event_data WHERE id =$id");
                while($row = mysqli_fetch_assoc($select)){ ?>

                <form action="<?php $_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data">
                    <h3>Update Events & Program</h3>
                    <input type="text" placeholder="enter event/program name"  value = "<?php echo $row['name'];?>"name="event_name" class="box">
                    <input type="text" placeholder="Short discription" value = "<?php echo $row['about'];?>" name="event_about" class="box">
                    <input type="date" placeholder="date" value = "<?php echo $row['date'];?>" name="event_date" class="box">
                    <input type="text" placeholder="time" value = "<?php echo $row['time'];?> "name="event_time" class="box">
                    <input type="text" placeholder="location"  value = "<?php echo $row['location'];?>" name="event_location" class="box">
                    <input type="file" name="event_image" class="box" accept="image/png, image/jpeg, image/jpg">
                    <input type="submit" class="btn" name="update_event" value="update event/program">
                    <a href="admin_page.php" class="btn">go back</a>
                </form>

                <?php }; ?>
            </div>
        </div>
    </body>

</html>