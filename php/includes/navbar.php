<?php
require_once("sessions.php");
?>


<nav id="navbar" class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Kootlinf</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="/php/home.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/php/link.php">Link</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/php/contact.php">Contact</a>
        </li>
        <?php
        if (!is_admin() && is_logged()) {
          ?>
          <li class="nav-item">
          <a class="nav-link" href="/php/chatRoom.php">Chat</a>
        </li>
          <?php
        }
        
        ?>
        <li class="nav-item">
          <a class="nav-link" href="/php/profile.php">Profile</a>
        </li>
        <?php
        if (is_admin()) {
          ?>
          <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Actions
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="/php/category.php">Category</a></li>
            <li><a class="dropdown-item" href="/php/feedbackList.php">feedbackList</a></li>
          </ul>
        </li>
          <?php
        }
        
        ?>
      </ul>
    </div>
  </div>
</nav>