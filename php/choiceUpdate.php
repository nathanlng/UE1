<?php
require_once "autoload.php";
include("includes/header.php");


$systeme = Choice::getOne($_GET["id"]);

?>

<form action="functions/fchoiceupdate.php" method="POST">
    <input type="hidden" name="id" value="<?php echo ($_GET["id"]); ?>">
    Nom <input type="text" name="name" value="<?php echo ($systeme->getName()) ?>"/>
    <input type="text" name="value" value="<?php echo ($systeme->getValue()); ?>">
    <input type="hidden" name="idFeature" value="<?php echo ($systeme->getIdFeature()); ?>">
    <input type="submit" value="OK">
</form>


<?php
include("includes/footer.php");
?>