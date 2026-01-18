<?php
@include 'db_conn.php';

//asign values

if(isset($_POST['add_information'])){
    $edu_topic=$_POST['edu_topic'];
    $edu_about=$_POST['edu_about'];
    $writer=$_POST['writer'];
    $edu_image=$_FILES['edu_image']['name'];
    $edu_image_tmp_name=$_FILES['edu_image']['tmp_name'];
    $edu_image_folder='uploading_image/'.$edu_image;

    //empty field validation

    if(empty($edu_topic) ||empty($edu_about) ||empty($writer) ||empty($edu_image)){
        $message[]='Please fill out all';
    }else{
        $insert = "INSERT INTO educational_data(topic,	about	,image	,author	)VALUES('$edu_topic','$edu_about','$edu_image','$writer')";
        $upload = mysqli_query($conn, $insert);
            // data insert successfull message
            if($upload) {
               move_uploaded_file($edu_image_tmp_name,$edu_image_folder);
               $message[]='educational information added successfully';
            }
			else
			{
                $message[]='cloud not add the information';
			}
			
			
   }  
    
    }

    // delete data
    if(isset($_GET['delete'])){
        $id = $_GET['delete'];
        mysqli_query($conn, "DELETE FROM educational_data WHERE id = $id");
        header('location:educational_page.php');
    }




?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Educational Page</title>
        <!--font awesome cdn link-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

        <!--custom css file link-->
        <link rel="stylesheet" href="style.css">
    </head>

    <body><!--Message alert-->
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
                    <h3>Add Educational Informations</h3>
                    <input type="text" placeholder="enter topic" name="edu_topic" class="box">
                    <input type="text" placeholder="Short discription" name="edu_about" class="box">
                    <input type="text" placeholder="writer name" name="writer" class="box">
                    <input type="file" name="edu_image" class="box" accept="image/png, image/jpeg, image/jpg">
                    <input type="submit" class="btn" name="add_information" value="add information">
                </form>
            </div>

            <!--connect to database data from table-->

            <?php
            $select=mysqli_query($conn, "SELECT* FROM educational_data ");
            ?>


        <div class="event_display">
            <table class = "event_display_table">
                <thead>
                    <tr>
                        <th>image</th>
                        <th>topic</th>
                        <th>discription</th>
                        <th>author</th>
                        <th colspan="1">action</th>
                        
                    </tr>
                </thead>
                    <?php
                    while($row= mysqli_fetch_assoc($select)){ ?>
                    <tr>
                        <td><img src="uploading_image/<?php echo $row['image'];?>" height="150" alt=""></td>
                        <td><?php echo $row['topic'];?></td>
                        <td><?php echo $row['about'];?></td>
                        <td><?php echo $row['author'];?></td>

                        <td>
                           
                            <a href="educational_page.php?delete=<?php echo $row['id'];?>" class="btn"><i class="fas fa-trash"></i>delete</a>
                        </td>
                        
                    </tr>

                    <?php  }; ?>
                
            </table>
        </div>

        </div>

    </body>
</html>
