<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 col-sm-1 col-xs-12"></div>
            <div class="col-md-4 col-sm-10 col-xs-12 form">
                <form class="form-container" id="login">
                    <h1>LOGIN</h1>
                    <label>Username:</label>
                    <input type="text" class="form-control" placeholder="Username">
                    <label>Password:</label>
                    <input type="password" class="form-control" placeholder="Password">
                    <button type="submit" class="btn btn-block">Submit</button>
                    <p>Don't have an account yet?  <button type="button" onclick="register()">Register</button> </p>
                </form>
                <form class="form-container" id="register">
                    <h1>REGISTER</h1>
                    <label>Username:</label>
                    <input type="text" class="form-control" placeholder="Username">
                    <label>Password:</label>
                    <input type="password" class="form-control" placeholder="Password">
                    <button type="submit" class="btn btn-block">Submit</button>
                    <p>Already have an account   <button type = "button" onclick="login()">Login</button> </p>
                </form>
            </div>
            <div class="col-md-4 col-sm-1 col-xs-12"></div>
        </div>
    </div>

    <script>
        var x = document.getElementById("login");
        var y = document.getElementById("register");

        function register(){
            x.style.display = "none";
            y.style.display = "block";
        }

        function login(){
            x.style.display = "block";
            y.style.display = "none";
        }
    </script>

</body>
</html>