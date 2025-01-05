<?php
    include ("includes/header.php");
    require ("autoload.php");
    include_once("fonctions.php");
    include_once("sessions.php");
    include_once("db.php");

    ?>

<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Feedback list </th>
    </tr>
  </thead>
  <tbody>
  <?php foreach(Feedback::getAll() as $ligne){?>
    <tr>
        <td><?php echo $ligne->getId(); ?></td>
        <td><?php echo $ligne->getIdUser(); ?></td>
        <td><?php echo $ligne->getDateTime(); ?></td>
        <td><?php echo $ligne->getTitle(); ?></td>
        <td><?php echo $ligne->getFeedback(); ?></td>
        <td><?php echo $ligne->getNote(); ?></td>
        <td>
        <a href="functions/ffeedbackdelete.php?id=<?php echo ($ligne->getId()); ?>">Supprimer</a>
        </td>
    </tr>
    <?php }?>
</tbody>
</table>

<form method="post">
    <input type="number" name="fbIdUser"/>
    <input type="submit" value="envoyer"/>
</form>

<?php
if (!empty($_POST["fbIdUser"]))
{
    $result = User::getOne($_POST["fbIdUser"])->getFeedback($_POST["fbIdUser"]);
    ?>
  <label>feedback List</label>
  <table class="table table-hover">

  <tbody>
  <?php foreach($result as $ligne){?>
    <tr>
        <td><?php echo $ligne->getId(); ?></td>
        <td><?php echo $ligne->getUser()->getLogin(); ?></td>
        <td><?php echo $ligne->getDateTime(); ?></td>
        <td><?php echo $ligne->getTitle(); ?></td>
        <td><?php echo $ligne->getFeedback(); ?></td>
        <td><?php echo $ligne->getNote(); ?></td>
        <td><?php echo $ligne->getMail(); ?></td>
        <td>
        <a href="functions/ffeedbackdelete.php?id=<?php echo ($ligne->getId()); ?>">Supprimer</a>
        </td>
    </tr>
    <?php }?>
</tbody>
</table>
<?php
};
?>