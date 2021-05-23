<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account</title>
     <!---page icon--->
     <link rel="shourtcut icon" href="icon.png">
    <!--bootstrap-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <!--font awsome-->
    <script src="https://kit.fontawesome.com/a4bb5398ea.js" crossorigin="anonymous"></script>

    <!--custom stylesheet-->
    <link rel="stylesheet" href="Account.css">
    <style>
        
    </style>
</head>

<body>
    <header>

        <div class="container">
            <div class="row">

                <div class="col-md-4 col-12 text-right icons">
                    <p class="my-md-4 header-links">
                    <div class="right icon">
                        <a href="#cart.html"><i class="fas fa-shopping-bag fa-lg"></i></a>
                    </div>

                    <div class="dropdown middle icon">
                        <a class="btn" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                class="fas fa-globe fa-lg"></i>
                        </a>

                        <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                            <button class="dropdown-item lang" id="en" type="button">English</button>
                            <button class="dropdown-item lang" id="ar" type="button">العربية</button>

                        </div>
                    </div>


               

                    </p>
                </div>
                <div class="col-md-4 col-12 text-center imgdiv">

                    <img src="teama.jpeg" alt="logo">
                </div>
            </div>
        </div>
        <div class="container-fluid navig">
            <a href="#" class="toggle-button">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </a>
            <nav class="nav nav-pills flex-column flex-sm-row">
                <a class=" flex-sm-fill text-sm-center nav-link tr" key="home" href="index.html">HOME</a>
                <a class=" flex-sm-fill text-sm-center nav-link tr" key="collections"
                    href="Collection.html">COLLECTIONS</a>
                <a class=" flex-sm-fill text-sm-center nav-link tr" key="sales" href="Sales.html">SALES</a>
                <a class=" flex-sm-fill text-sm-center nav-link tr" key="your_account" href="Account.php">ACCOUNT</a>
            </nav>

        </div>
    </header>
    <main>
       <!--SIGN IN PAGE-->
        <div class="cont">
            <div class="form sign-in">
                <form method="POST">
                     <h2 class="tr"key="signin">Sign In</h2>
                     <label>
                         <span class="tr" key="email">Email Address</span>
                         <input type="email" name="email">
                     </label>
                     <label>
                         <span class="tr" key="pass">Password</span>
                         <input type="password" name="password">
                     </label>
                     <button class="submit tr" key="signin" type="submit" name='signin' >Sign In</button>
                     <p class="forgot-pass tr" key="forgot">Forgot Password ?</p>
                </form>
            </div>

            <?php

            include('db_connection.php');     
            if (isset($_POST['signin'])) {
            
                $email =$_POST['email'];
                $password =$_POST['password'];

                $query = "SELECT id FROM users WHERE email = '$email' AND password = '$password'";
                $result =mysqli_query($conn,$query);
                $count = mysqli_num_rows($result);

                if($count>0)
                {
                    header("Location: cart.html");
                echo "<script type='text/javascript'>alert('username exists')</script>";
                }
                else{
                echo "<script type='text/javascript'>alert('Invalid Username or Password')</script>";
                }
            }
            ?>

            <div class="sub-cont">
                <div class="img">
                    <div class="img-text m-up">
                        <h2 class="tr" key="new">New here?</h2>
                        <p class="tr" key="newsignup">Sign up Now</p>
                    </div>
                    <div class="img-text m-in">
                        <h2 class="tr" key="old">One of us?</h2>
                        <p class="tr" key="oldsignin">If you already have an account, sign in.</p>
                    </div>
                    <div class="img-btn">
                        <span class="m-up tr" key="signup">Sign Up</span>
                        <span class="m-in tr" key="signin">Sign In</span>
                    </div>
                </div>
                <!--SIGN UP PAGE-->
                <div class="form sign-up">
                    <form method="POST">
                        <h2 class="tr" key="signup">Sign Up</h2>

                        <label>
                            <span class="tr" key="username">Name</span>
                            <input type="text" name="username">
                        </label>
                        <label>
                            <span class="tr" key="email">Email</span>
                            <input type="email" name="email">
                        </label>
                        <label>
                            <span class="tr" key="password">Password</span>
                            <input type="password" name="password">
                        </label>
                        <label>
                            <span class="tr" key="conpass">Confirm Password</span>
                            <input type="password" name="conpassword">
                        </label>
                        <button class="submit tr" key="signup" type="submit" name="signup">Sign Up</button>
                    </form>
                </div>
                <?php
                include('db_connection.php');     

                if(isset($_POST['signup'])){
                
                    if(!empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['conpassword'])){
                        
                        $username =$_POST['username'];
                        $email =$_POST['email'];
                        $password =$_POST['password'];
                        $conpassword =$_POST['conpassword'];
                        
                        $sql= "INSERT INTO users (username,email,password,conpassword)
                        VALUES ('$username','$email','$password','$conpassword')";    
                
                
                        if (mysqli_query($conn, $sql)) {
                            
                            echo "<script type='text/javascript'>alert('Signed up Successfully')</script>";
                         } else {
                            echo "Error: " . $sql . "
                        " . mysqli_error($conn);
                         }
                         mysqli_close($conn);
                                 
                    }
                    else{
                        echo "<script type='text/javascript'>alert('All fields are requierd')</script>";
                    }
                }
                ?>
            </div>
        </div>
    </main>
    <footer></footer>



    <script type="text/javascript" src="jquery.min.js"> </script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
        crossorigin="anonymous"></script>
    <script>
        var langKey = new Array();
        langKey['en'] = new Array();
        langKey['ar'] = new Array();

        langKey['en']['home'] = 'HOME';
        langKey['en']['collections'] = 'COLLECTIONS';
        langKey['en']['sales'] = 'SALES';
        langKey['en']['your_account'] = 'ACCOUNT';
        langKey['en']['cart'] = 'Cart';
        langKey['en']['account'] = 'Create An Account';
        langKey['en']['signin'] = 'Sign In';
        langKey['en']['signup'] = 'Sign Up';
        langKey['en']['email'] = 'Email address';
        langKey['en']['pass'] = 'Password';
        langKey['en']['conpass'] = 'Confirm Password';
        langKey['en']['forgot'] = 'Forgot Password ?';
        langKey['en']['new'] = 'New here?';
        langKey['en']['name'] = 'Name';
        langKey['en']['newsignup'] = 'Sign up Now';
        langKey['en']['old'] = 'One of us?';
        langKey['en']['oldsignin'] = 'If you already have an account, sign in.';
        langKey['en']['submit'] = 'Submit';

        langKey['ar']['home'] = 'الرئيسية';
        langKey['ar']['collections'] = 'الفئات';
        langKey['ar']['sales'] = 'تنزيلات';
        langKey['ar']['your_account'] = 'حسابي';
        langKey['ar']['cart'] = 'حقيبة التسوق';
        langKey['ar']['account'] = 'سجل الدخول';
        langKey['ar']['signin'] = 'تسجيل الدخول';
        langKey['ar']['signup'] = 'تسجيل';
        langKey['ar']['name'] = 'الإسم';
        langKey['ar']['email'] = 'البريد الالكتروني';
        langKey['ar']['pass'] = 'كلمة المرور';
        langKey['ar']['conpass'] = 'تأكيد كلمة المرور';
        langKey['ar']['forgot'] = 'هل نسيت كلمة المرور ؟';
        langKey['ar']['new'] = 'عضو جديد ؟';
        langKey['ar']['newsignup'] ='سجل الآن';
        langKey['ar']['old'] = 'لديك حساب ؟';
        langKey['ar']['oldsignin'] ='إن كان لديك حساب ، سجل الدخول الآن';
        langKey['en']['submit'] = 'سجل';


        $(document).ready(function () {

            $('.lang').click(function () {

                var lang = $(this).attr('id');

                $('.tr').each(function (i) {
                    $(this).text(langKey[lang][$(this).attr('key')]);
                });

            });

        });
        document.querySelector('.img-btn').addEventListener('click', function () {
            document.querySelector('.cont').classList.toggle('s-signup')
        }
        );

    </script>

</body>

</html>