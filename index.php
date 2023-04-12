<?php 
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;600;700&family=Poppins:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <script src="script.js" defer></script>
    <title> Login System </title>
</head>
<body>

    <div class="container">
        <header>
            <div class="menu">
                <div class="logo">
                    <h1> Tigernethost, OPC </h1>
                </div>
                <li>Home</li>
                <li>Products</li>
                <li>Current Files</li>
                <li>Member<li>
            </div>

            <div class="login-section">
                <?php if(isset($_SESSION['user_id'])) { ?>

                <li class="signup"> <?php echo $_SESSION['username'] ?> </li>
                <li class="login"> <a href="includes/logout.inc.php"> Log Out </a> </li>

                <?php } else { ?>
                    <li class="signup"> Sign Up </li>
                    <li class="login"> Log In </li>
                <?php } ?>
        
             </div>

            <div class="hamburger">
                <span class="material-icons">
                    menu
                    </span>
            </div>

            <div class="sidebar active-sidebar">
                <div class="close">
                   <p> &times;</p>
                </div>
                <nav>
                    <li>Home</li>
                    <li>Products</li>
                    <li>Current Files</li>
                    <li>Member<li>
                </nav>

            <div class="sidebar-section">

            <?php if(isset($_SESSION['user_id'])) { ?>

            <li class="signup"> <?php echo $_SESSION['username'] ?> </li>
            <li class="login"> <a href="includes/logout.inc.php"> Log Out </a> </li>

            <?php } else { ?>
                <li class="signup"> Sign Up </li>
                <li class="login"> Log In </li>
            <?php } ?>

            </div>

            </div>
        </header>
        <section class="hero">
            <div class="content">
                <div class="details-hero">
                    <img src="images/sub-image.jpg" alt="">
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eaque, iusto dolor. Officiis id quos impedit pariatur at blanditiis aliquam? Itaque necessitatibus eligendi earum, fugiat odio nobis dolore temporibus excepturi quidem!</p>
                </div>
                <div class="banner-hero">
                    <h1> We make professional gear </h1>
                    <button>find our client here</button>
                </div>
            </div>
        </section>

        <section class="forms">
            <form action="includes/signup.inc.php" method="post" class="white-form">
                <h1>sign up</h1>
                <p>Don't have an account yet? Sign up here!</p>
                <input type="text" name="username" placeholder="Username">
                <input type="password" name="password" placeholder="Password">
                <input type="password" name="re-type_p" placeholder="Re-type Password">
                <input type="text" name="email" placeholder="Email">

                <input type="submit" value="SIGN UP" name="signup" class="btn">
            </form>

            <form action="includes/login.inc.php" method="post" class="black-form">
                <h1>log in</h1>
                <p>Don't have an account yet? Sign up here!</p>
                <input type="text" name="username" placeholder="Username">
                <input type="password" name="password" placeholder="Password">

                <input type="submit" value="LOGIN" name="login" class="btn">
            </form>
        </section>
    </div>
    
</body>
</html>