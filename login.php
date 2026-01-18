
<html>
    <head>
        <title></title>
        <link rel="stylesheet" href="login.css">
    </head>

    <body>
        <div class="container">
            <h2 class="title"> Member Login Form</h2>
            <form action="login_index.php" method="post" autocomplete="off">
                    <?php if (isset($_GET['error'])) { ?>
     		            <p class="error"><?php echo $_GET['error']; ?></p>
     	            <?php } ?>
            
                <div class="main-user-info">
                    
                    <div class="user-input-box">
                        <label for="email">User Email</label>
                        <input type="email" id="email" name="email" placeholder="Enter Your Email"/>
                    </div>
                    
                    <div class="user-input-box">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" placeholder="Enter Password"/>
                    </div>
                    
                        
                    
                </div>

                

                <div class="form-submit-btn">
                    <input type="submit" value="Login" name="submit">
                    <a href="registration.php" ><input type="button" value="SignUp"></a>
                </div>
            </form>
        </div>
    </body>
</html>