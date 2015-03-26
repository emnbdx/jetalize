
<div id="container_left">

	<form method="post" action="pages/envoi.php">
    <p>
    <label for="objet">Objet de votre message : </label>
    <br />
    <input type="text" name="objet" style="width: 500px;" id="objet" />
    <br />
    <label for="message">Votre message : </label>
    <br />
    <textarea name="message" id="message" style="width: 500px; height:100px;"></textarea>
	<br />
    <label for="nom">Nom : </label>
    <br />
    <input type="text" name="nom" style="width: 500px;" id="nom" />
    
    <br />
    <label for="email">E-Mail : </label>
    <br />
    <input type="text" name="email" style="width: 500px;" id="email" />
    <br />
    
    <div style="width: 100%; text-align: right; padding-right: 0px;"><input type="submit" name="envoyer" value="Envoyer" /></div>
    </p>
    </form>
<?php
if(isset($_GET['form'])) { 
	if ($_GET['form'] == 'y') { echo '<div style="font-style: italic;">Votre demande a bien été envoyée.</div>'; } 
	elseif ($_GET['form'] == 'n')  { echo '<div style="font-style: italic;">Echec de l\'envoi.</div>'; }
}
?>   

Liens amis :    

<ul class="lien">
	<li><a href="http://www.cyclotrott.com/" target="_blank">Cyclo Trott</a></li>
	<li><a href="http://www.artcollectivephotographies.fr/" target="_blank">Photographies de surf en Charente-Maritime</a></li>
	<li><a href="http://www.accrokite.com/" target="_blank">Accrokite, écolde de KiteSurf</a></li>
</ul>    
    
</div>
           
<div id="container_top_right">
	<img src="images/contact.jpg" alt="JetAlizé" />      
</div>

<div style="clear: both;"></div>
            
