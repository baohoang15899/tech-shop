<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/main.css')  }}" />
    <script src="https://kit.fontawesome.com/d3feac1540.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <div class="wrapper">
        <div class="adminForm">
            <div class="container">
                <div class="group">
                    <h3 class="title">Trang đăng nhập admin</h3>
                    <form action="/check" method="post">
                        @csrf
                        <input type="text" name="username" placeholder="username" required>
                        <input type="password" name="password" placeholder="password" required>
                        <input type="submit" class="button">
                    </form>
                    <?php 
                        if (isset($_POST['submit'])) {
                            $username = $_POST['username'];
                            $password = $_POST['password'];
                        }
                    ?>
                    <div class="mess">
                        <?php
                            $mess = Session::get("mess");
                            if($mess){
                                echo "<span>$mess</span>";
                                Session::put("mess",null); 
                            }    
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>