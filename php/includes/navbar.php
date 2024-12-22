
<nav class="navbar">
      <div id="logoName">
        <!-- <img src="../../images/logoUE1.png" alt="" id="logo" /> -->
        <a href="index.html" id="siteName">Kootlinf</a>
      </div>
      <div id="sideNav" class="lien">
        <ul>
          <li><a href="/php/acceuil.html">Home</a></li>
          <li><a href="/php/pageLink.html">Link</a></li>
          <li><a href="/php/contact.php">Contact</a></li>
          <li><a href="/php/link.php">link</a></li>
          <li><a href="/php/profile.php">Profile</a></li>
          <?php 
          include ("sessions.php");
          if (is_admin()) {
            echo "<li><a href='/php/category.php'>category</a></li>";
            echo "<li><a href='/php/feedbackList.php'>feedback</a></li>";
          }
          ?>
        </ul>
      </div>
      <a href="#" id="openBtn" onclick="openNav()">
        <span class="menuBurger">
          <span></span>
          <span></span>
          <span></span>
        </span>
      </a>
</nav>