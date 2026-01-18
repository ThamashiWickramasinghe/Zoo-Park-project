<?php
@include 'db_conn.php';






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


    <h2>Calendar of Events</h2>
         

        <?php
        if(isset($message)){
            foreach($message as $message){
                echo'<span class="message">'.$message.'</span>';
            }
        }
        ?>
        

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
                        
                    </tr>
                </thead>
                    <?php
                    while($row= mysqli_fetch_assoc($select)){ ?>
                    <tr>
                        <td><img src="uploading_image/<?php echo $row['image'];?>" height="150" width="300" alt=""></td>
                        <td><?php echo $row['name'];?></td>
                        <td><?php echo $row['about'];?></td>
                        <td><?php echo $row['date'];?></td>
                        <td><?php echo $row['time'];?></td>
                        <td><?php echo $row['location'];?></td>
                        
                    </tr>

                    <?php  }; ?>
                
            </table>
        </div>

        </div>

    </body>
</html>
