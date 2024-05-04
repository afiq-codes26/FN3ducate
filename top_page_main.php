<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/top_page.css">
</head>
<body class="top">
    <header class="main-top">
        <section class="top_page">
            <a href="main_page.php">  <img class="logo" src="resources/LOGO_FN3.png"></a>
                <nav id="nav1">
                    <a href="main_page.php#home" class="active">Home</a>
                    <a href="main_page.php#about_us" >About us</a>
                    <a href="main_page.php#tutors" >Tutors</a>
                    <a href="main_page.php#our-teams">Our Team</a>
                </nav>
        </section>
        <section class="btn">
            <a href="login.php" class="login-btn">
                Login
            </a>
            <a href="signup.php" class="rgstr-btn">
                Register
            </a>
        </section>
    </header>
    <script>
            document.addEventListener("DOMContentLoaded", function() {
                var nav1Links = document.querySelectorAll('#nav1 a');

                nav1Links.forEach(function(link, index) {
                    link.addEventListener('click', function(e) {
                        // Remove active class from all links in nav1 and nav2
                        nav1Links.forEach(link => link.classList.remove('active'));

                        // Add active class to clicked link in nav1 and corresponding link in nav2
                        this.classList.add('active');
                });
            });
        });
    </script>
</body>
</html>