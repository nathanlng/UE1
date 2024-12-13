<?php
    include ("includes/header.php");
    require ("autoload.php");
include_once("db.php");
include_once("fonctions.php");
include_once("sessions.php");
?>

<h2>Mon formulaire de contact</h2>
      <form method="POST" action="functions/ffeedbackinsert.php">
      <div id="formulaire" class="tableau">
        <div class="celluleTab">
          <div class="cellule">prenom</div>
          <input
            type="text"
            name="fbFirstName"
            placeholder="toto"
            required
            class="inputForm"
          />
        </div>
        <div class="celluleTab">
          <div class="cellule">nom</div>
          <input
            type="text"
            name="fbName"
            placeholder="tutu"
            required
            class="inputForm"
          />
        </div>
        <div class="celluleTab">
          <div class="cellule">votre pays</div>
          <select required name="fbCountry" class="inputForm">
            <option value="">--choisissez--</option>
            <option value="1" selected>France</option>
            <option value="2">autre</option>
          </select>
        </div>
        <div class="celluleTab">
          <div class="cellule">Votre ville</div>
          <input
            type="text"
            name="fbCity"
            placeholder="Tombouctou"
            class="inputForm"
            required
          />
        </div>
        <div class="celluleTab">
          <div class="cellule">Votre mail</div>

          <input
            type="mail"
            name="fbMail"
            placeholder="toto.tutu@mail.com"
            class="inputForm"
            required
          />
        </div>
        <div class="celluleTab">
          <div class="cellule">Votre titre</div>

          <input
            type="mail"
            name="fbTitle"
            class="inputForm"
            required
          />
        </div>
        <div class="celluleTab">
          <div class="cellule">Votre commentaire</div>

          <textarea
            name="feedback"
            required 
            id=""
            placeholder="Mon avis ..."
            class="inputForm"
          ></textarea>
        </div>
        <div class="celluleTab">
          <div class="cellule">Votre note</div>

          <input
            type="range"
            name="fbNote"
            value="5"
            min="0"
            max="5"
            step="0.5"
            class="inputForm"
          />
        </div>
      </div>
      <div id="conditionPar">
        <input type="checkbox" name="condition"  required />
          <label for="condition">
            accepter les
            <a href="#" target="_blank" class="conditionPartage"
              >condition d'utilisation et de partage</a
            >
          </label>
        </div>
        <button type="submit" class="buttonStyle">envoyer</button>
        <button type="reset" class="buttonStyle">réinitialiser</button>
      </form>

      <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Nom</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach(Feedback::getAllFeedback($_SESSION["sid"]) as $ligne){?>
    <tr>
        <td><?php echo $ligne->getId(); ?></td>
        <td><?php echo $ligne->getDateTime(); ?></td>
        <td><?php echo $ligne->getTitle(); ?></td>
        <td><?php echo $ligne->getFeedback(); ?></td>
        <td><?php echo $ligne->getNote(); ?></td>
        <td>
        <a href="choiceUpdate.php?id=<?php echo ($ligne->getId()); ?>">Modifier</a>
        <a href="functions/fchoicedelete.php?id=<?php echo ($ligne->getId()); ?>">Supprimer</a>
        </td>
    </tr>
    <?php }?>
</tbody>
</table>