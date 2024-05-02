<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Main Page</title>
  <link rel="stylesheet" href="style/sidebar.css">  <link rel="stylesheet" href="style/top_page.css"> </head>
<body>
  <div id="mySidenav" class="sidenav">
    <div class="logo-container">
      <img src="resources/LOGO_FN3.png" alt="Logo">
    </div>
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="main_page.php">
      <img src="resources/sidebar/home.png" alt="Home Icon"> Home page
    </a>
    <a href="">
      <img src="resources/sidebar/tutor-removebg-preview.png" alt="Dashboard Icon"> Dashboard Tutor
    </a>
    <a href="">
      <img src="resources/sidebar/notification-removebg-preview.png" alt="Notifications Icon"> Notifications
    </a>
    <a href="contact.html">
      <img src="resources/sidebar/contact-removebg-preview.png" alt="Contact Icon"> Contact us
    </a>
    <a href="sign_out.html">
      <img src="resources/sidebar/sign_out-removebg-preview.png" alt="Sign out Icon"> Sign out
    </a>
  </div>

  <header class="main">
    <section class="top_page">
      <a href="#" class="menu-icon" style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</a>
      <a href="#"> 
        <img class="logo" src="resources/LOGO_FN3.png">
      </a>
      <nav>
        <a href="#" class="about">About us</a>
        <a href="#" class="about">Tutors</a>
        <a href="#" class="about">Our Team</a>
      </nav>
    </section>
  </header>

  <script>
    function openNav() {
      document.getElementById("mySidenav").style.width = "250px";
    }

    function closeNav() {
      document.getElementById("mySidenav").style.width = "0";
    }
  </script>
</body>
</html>