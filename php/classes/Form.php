<?php

class Form {

    public static function createForm(){
        echo "<form action='profile.php' method='POST'>";
        foreach (Category::getAll() as $ligne) {
            if ($ligne->getTypeOf()=="text") {
                echo "<label>".$ligne->getName()."</label>
                <input type='text' name='".$ligne->getName()."'/><br/>";
            } elseif ($ligne->getTypeOf()=="number") {
                echo " <label>".$ligne->getName()."</label>
                <input type='number' name='".$ligne->getName()."'/><br/>";
            } else {
                echo "<label>".$ligne->getName()."</label> <select name='".$ligne->getName().$ligne->getId()."'>";
                    foreach (Choice::getChoice($ligne->getId()) as $choice) {
                        echo "<option value='".$choice->getValue()."'>".$choice->getName()."</option>";
                    }
                echo "</select><br/>";
            }
        }
        echo "<input type='submit' value='envoyer'/></form>";
    }

}