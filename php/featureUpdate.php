<?php
require_once "autoload.php";
include("includes/header.php");


$feature = Feature::getOne($_GET["id"]);
$category= Category::getOne($feature->getIdCategory())
?>

<form action="functions/ffeatureupdate.php" method="POST">
    <label><?php echo ($category->getName()); ?></label>
    <input type="hidden" name="id" value="<?php echo ($_GET["id"]); ?>">
    <?php
    if ($category->getTypeOf()=="text") 
    {
        ?>
        <input type='text' name="value" value="<?php echo $feature->getValue(); ?>"/><br/>
        <?php
    } 
    elseif ($category->getTypeOf()=="number") 
    {
        ?>
        <input type='number' name="value" value="<?php echo $feature->getValue(); ?>"/><br/>
        <?php
    } 
    else 
    {
        ?>
        <select name="value">
            <?php
            foreach ($category->getChoices($category->getId()) as $choice)
            {
                echo "<option value='".$choice->getValue()."'";
                 if ($choice->getValue()== $feature->getValue()) {
                    echo "selected";
                }
                echo ">".$choice->getName()."</option>";
            }
        echo "</select><br/>";
    }
    ?>
    <input type="hidden" name="category" value="<?php echo (Category::getOne($feature->getIdCategory())->getId()); ?>">
    <input type="hidden" name="display" value="<?php echo ($feature->getDisplay()); ?>">
    <input type="submit" value="OK">
</form>


<?php
include("includes/footer.php");
?>