<?php $currentPage = basename($_SERVER['SCRIPT_FILENAME']); ?>

     <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">PHP Coding Events App</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
        <li <?php if ($currentPage == 'welcome.php') {
    echo 'class="active"'; } ?>><a class="nav-link" href="welcome.php" <?php if ($currentPage == 'welcome.php') {
    echo 'id="here"'; } ?>>Home</a></li>
          <li <?php if ($currentPage == 'create.php') {
    echo 'class="active"'; } ?>><a class="nav-link" href="create.php" <?php if ($currentPage == 'create.php') {
    echo 'id="here"'; } ?>>Create Event</a></li>
          <li <?php if ($currentPage == 'list.php') {
    echo 'class="active"'; } ?>><a class="nav-link" href="list.php" <?php if ($currentPage == 'list.php') {
    echo 'id="here"'; } ?>>All Events</a></li>
    <li><a class='nav-link' href='../../../index.php'>Logout</a></li>
        </ul>
      </div>
    </div>
  </nav>
    <?php
    /*
    When the PHP engine encounters an include command, it stops processing PHP at the beginning of the
external file and resumes at the end. That’s why the include files contain only raw HTML. If you want the
external file to use PHP code, the code must be enclosed in PHP tags. Because the external file is processed
as part of the PHP file that includes it, an include file can have any filename extension.
    */
    ?>