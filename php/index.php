<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>kootlinf</title>
    <link rel="stylesheet" href="style.css" />
    <script src="index.js" defer></script>
  </head>
  <body>
    <header></header>


    </nav>
    <?php
            if(isset($_GET["page"]) && !empty($_GET["page"])){
                include_once($_GET["page"]);
            }
            else{
                echo "<h1>Bienvenue sur mon site</h1>";
            }

            require_once "autoload.php";
        ?>

  </body>