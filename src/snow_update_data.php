
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Rent A Snow - Accueil</title>

</head>
<body>


    <h1>Modification de snow</h1>
  <?php
    require('modelcsv.php');

    //Solution 3: on réécrit tout le tableau mémoire
    $snowCherche=$_POST['fID'];
    $snows=getSnows();
    //Recherche du num de snow
    $i=0;
    $id=-1;
    foreach($snows as $snow){
        if ($snow['idSnow']==$snowCherche){
            $id=$i;
        }
        $i++;
    }
    echo $id."<br>";
    //Réécriture dans un tableau mémoire
    if ($id>=0){
        $snows[$id]=array('idSnow'=>$_POST['fID'],'Marque'=>$_POST['fMarque'],'Boots'=>$_POST['fBoots'],'Type'=>$_POST['fType'],'disponibilite'=>$_POST['fDispo']);
        updateSnows($snows);
    } else

    { //cas où on ne trouverait pas le snow
        echo "Pas trouvé le ".$_POST['fID'];
    }
    //Tout réécrire
    updateSnows($snows);
  ?>
    Le snow modifié est le <strong><?= @$_POST['fID'];?></strong> <br>
    <br><h3><a href='products.php'>Retour à la liste</a></h3>
</body>
</html>