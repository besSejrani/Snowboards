<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
 </head>
 <body>
    <h1>Suppression de snow</h1>
  <?php
  require_once("modelcsv.php");
  // ------------ Suppression de snow ------------------------
   $snows=getSnows();
    //Recherche du num de snow
   $id=-1;
    for($i=0;$i<count($snows);$i++){
        if ($snows[$i]['idSnow']==$_GET['idSnow']){
            $id=$i;
        }
    }
    //Suppression
    if ($id>=0) { //cas où on l'a trouvé
        unset($snows[$id]);//suppression en mémoire
        $snows=array_slice($snows,0); //on bouche le trou
        updateSnows($snows);//réécrire le fichier json
    } else {
        echo "pas trouvé le ".$_GET['idSnow'];
    }
    ?>
    Le snow supprimé est le <strong><?= @$_GET['idSnow'];?></strong> <br>
    <br><h3><a href='products.php'>Retour à la liste</a></h3>

</body>
</html>