<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style/sidebar.css">  <link rel="stylesheet" href="style/top_page.css"> </head>
<body>
  <div id="mySidenav" class="sidenav">
    <div class="logo-container">
      <img src="resources/LOGO_FN3.png" alt="Logo">
    </div>
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="main_page.php#home">
      <img src="resources/sidebar/home.png" alt="Home Icon"> Home page
    </a>
    <a href="dashboard.php">
      <img src="resources/sidebar/tutor-removebg-preview.png" alt="Dashboard Icon">Dashboard
    </a>
    <a href="">
      <img src="resources/sidebar/notification-removebg-preview.png" alt="Notifications Icon"> Notifications
    </a>
    <a href="contact_student.php">
      <img src="resources/sidebar/contact-removebg-preview.png" alt="Contact Icon"> Contact us
    </a>
    <a href="logout.php">
      <img src="resources/sidebar/sign_out-removebg-preview.png" alt="Sign out Icon"> Sign out
    </a>
  </div>

  <header class="main">
    <section class="top_page">
      <a class="menu-icon" style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</a>
      <a href="main_page.php#home"> 
        <img class="logo" src="resources/LOGO_FN3.png">
      </a>
      <nav>
        <a href="main_page.php#about_us" class="about">About us</a>
        <a href="main_page.php#tutors" class="about">Tutors</a>
        <a href="main_page.php#our-teams" class="about">Our Team</a>
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