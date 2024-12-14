<?php
require_once "autoload.php";
include("includes/header.php");


$systeme = Category::getOne($_GET["id"]);

?>

<form action="functions/fcategoryupdate.php" method="POST">
    <input type="hidden" name="id" value="<?php echo ($_GET["id"]); ?>">
    Nom <input type="text" name="name" value="<?php echo ($systeme->getName()) ?>"/>
    <input type="hidden" name="typeOf" value="<?php echo ($systeme->getTypeOf()); ?>">
    <input type="submit" value="OK">
</form>


<?php
include("includes/footer.php");
?>