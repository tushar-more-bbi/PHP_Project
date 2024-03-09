<?php

if (isset($_SESSION['loggedin']) || $_SESSION['loggedin']) {
  echo "<nav class='navbar navbar-expand-lg navbar-dark bg-dark'>
 <a class='navbar-brand' href='#'>iSecure</a>
 <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarNav' aria-controls='navbarNav' aria-expanded='false' aria-label='Toggle navigation'>
   <span class='navbar-toggler-icon'></span>
 </button>
 <div class='collapse navbar-collapse' id='navbarNav'>
   <ul class='navbar-nav'>
   <li class='nav-item'>
       <a class='nav-link' href='/LoginSystem/welcome.php'>Home</a>
     </li>
     <li class='nav-item'>
       <a class='nav-link' href='/LoginSystem/logout.php' >Logout</a>
     </li>
   </ul>
 </div>
</nav>";
} else {
  echo "<nav class='navbar navbar-expand-lg navbar-dark bg-dark'>
  <a class='navbar-brand' href='#'>iSecure</a>
  <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarNav' aria-controls='navbarNav' aria-expanded='false' aria-label='Toggle navigation'>
    <span class='navbar-toggler-icon'></span>
  </button>
  <div class='collapse navbar-collapse' id='navbarNav'>
    <ul class='navbar-nav'>
    <li class='nav-item'>
        <a class='nav-link' href='/LoginSystem/welcome.php'>Home</a>
      </li>
      <li class='nav-item'>
        <a class='nav-link' href='/LoginSystem/login.php'>Login</a>
      </li>
      <li class='nav-item'>
        <a class='nav-link' href='/LoginSystem/signup.php'>Signup</a>
      </li>
    </ul>
  </div>
 </nav>";
}
?>
<!-- 
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">iSecure</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
    <li class="nav-item">
        <a class="nav-link" href="/LoginSystem/welcome.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/LoginSystem/login.php">Login</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/LoginSystem/signup.php">Signup</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/LoginSystem/logout.php" >Logout</a>
      </li>
    </ul>
  </div>
</nav> -->