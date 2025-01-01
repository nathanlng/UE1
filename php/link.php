<?php
    require_once "autoload.php";
    include ("includes/header.php");
    include_once("sessions.php");
    ?>

<div class="container">
<?php
echo "<div id='filter'><form method='POST' action='filter.php'>";
foreach (Category::getAll() as $category) 
{
    if ($category->getTypeOf()=="select") 
    {
        echo $category->getName();
        ?>

        <select name="<?php echo $category->getName()?>" >
            <?php
            foreach ($category->getChoices($category->getId()) as $choice)
            {
                echo "<option value='".$choice->getValue()."'";
                echo ">".$choice->getName()."</option>";
            }
            ?>
        </select>
        <?php
        
    } 
    else if ($category->getTypeOf()=="number")
    {
        echo $category->getName();
        ?>
        <label>min</label>
        <input type="number" name="min<?php echo $category->getName()?>">
        <label>max</label>
        <input type="number" name="max<?php echo $category->getName()?>">
        <?php
    }
}
?>
<input type="submit" value="filtrer">
<?php
echo "</form></div>";


foreach (Player::getAll() as $player) 
{
    if ($player->getName() != " " and $player->getFirstName() != " " and $player->getFirstName() != "" and $player->getName() != "" and $player->getDisplay()==1) 
    {
        ?>
        <div class="playerCard">
        <img src="<?php echo $player->getPicture(); ?>" alt="" class="playerImg">
        <div class="username"><?php echo $player->getFirstName()." ".$player->getName(); ?></div>
        
        <div class="features">  
            <div><?php echo $player->getAge() ?></div>
            <?php
            foreach ($player->getFeatures() as $feature) 
            {
                if ($feature->getValue() != null or $feature->getValue() != "") 
                {
                    echo "<div class='feature'>".$feature->getValue()."</div>";
                }
            }
            ?>
        </div>
        <a href="playerProfile.php?id=<?php echo $player->getId()?>"> go to profile </a>
        <?php
            if (is_admin()) 
            {
            ?>
            <a href="functions/fhidecard.php?id=<?php echo $player->getId()?>">hide</a>
            <?php
            }
        ?>
    </div>
    
    <?php
    }
}
?>
</div>
