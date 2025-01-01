<?php

class Form 
{

    public static function createForm()
    {
        ?>
        <form action='<?php echo "functions/ffeatureinsert.php"?>' method='POST'>
            <label>nom</label>
            <input type='text' name='name' required/><br />
            <label>prenom</label>
            <input type='text' name='first_name' required/><br />
            <label>age</label>
            <input type='number' name='age'/><br />
            <label>biographie</label>
            <input type='text' name='description'/><br />

        <?php
        foreach (Category::getAll() as $category) 
        {
            Form::formType($category);
        }
        echo "<input type='submit' value='envoyer'/></form>";
    }

    public static function formType($ligne)
    {
            if ($ligne->getTypeOf()=="text") 
            {
                ?>

                <label><?php echo $ligne->getName(); ?></label>
                <input type='text' name="<?php echo $ligne->getName(); ?>"/><br/>
                <?php
            } 
            elseif ($ligne->getTypeOf()=="number") 
            {
                ?>
                 <label><?php echo $ligne->getName(); ?></label>
                <input type='number' name="<?php echo $ligne->getName(); ?>"/><br/>
                <?php
            } 
            else 
            {
                ?>
                <label><?php echo $ligne->getName(); ?></label> 
                <select name="<?php echo $ligne->getName(); ?>">
                    <?php
                    foreach ($ligne->getChoices($ligne->getId()) as $choice)
                    {
                        echo "<option value='".$choice->getValue()."'>".$choice->getName()."</option>";
                    }
                echo "</select><br/>";
            }
        }

}
?>