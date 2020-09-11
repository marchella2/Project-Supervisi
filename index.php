<html>
    <head>
        <title>Login Form</title>
        <link rel="stylesheet" href="assets/css/login.css">     
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </head>
    <body>
        <div class="loginbox">
            <img src="assets/image/user.png" class="user">
            <h1>Silahkan login</h1>
            <form action="cek_login.php" method="post">
                <p>Username</p>
                <input type="text" name="username" placeholder="Username">
                <p>Password</p>
                <input type="password" class="form-password" name="password" placeholder="Password">
                <br>
                <input type="checkbox" class="form-checkbox" name="show">
                <label for="show">Lihat Password</label>
                <input type="submit" value="Login">
            </form>
        </div>
        <script type="text/javascript">
            $(document).ready(function(){	
                var cek = $('.form-checkbox').val();	
                $('.form-checkbox').click(function(){
                    if($(this).is(':checked')){
                        $('.form-password').attr('type','text');
                    }else{
                        $('.form-password').attr('type','password');
                    }
                });
            });
        </script>
    </body>
</html> 