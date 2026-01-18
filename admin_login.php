<html>
    <head>
        <title></title>
        <link rel="stylesheet" href="login.css">
    </head>

    <body>
        <div class="container">
            <h2 class="title"> Admin Login Form</h2>
            <form action="admin_log.php" method="post" autocomplete="off">

                    <?php if (isset($_GET['error'])) { ?>
     		            <p class="error"><?php echo $_GET['error']; ?></p>
     	            <?php } ?>
            
                <div class="main-user-info">
                    
                    <div class="user-input-box">
                        <label for="email">User Email</label>
                        <input type="email" id="email" name="uemail" placeholder="Enter Your Email"/>
                    </div>
                    
                    <div class="user-input-box">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" placeholder="Enter Password"/>
                    </div>
                    
                        
                    
                </div>

                

                <div class="form-submit-btn">
                    <input type="submit" value="Login" name="submit">
                    
                </div>
            </form>
        </div>
    </body>
</html>