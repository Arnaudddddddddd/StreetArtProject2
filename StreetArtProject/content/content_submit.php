<html>

<!--<form method="POST" action="upload.php" enctype="multipart/form-data">
      On limite le fichier à 100Ko 
     <input type="hidden" name="MAX_FILE_SIZE" value="100000">
     Fichier : <input type="file" name="avatar">
     <input type="submit" name="envoyer" value="Envoyer le fichier">
</form>-->

<form action="upload.php" method="post" enctype="multipart/form-data">
   <input type="file" name="fichier"/>
   <label for="titre">Titre:</label>
   <input id="titre" type="text" name="titre" required="titre"/></div>
   <br>
   <input type="submit" value="envoyer" />
</form>

</html>