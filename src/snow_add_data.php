
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Rent A Snow - Accueil</title>

</head>
<body>


    <h1>Ajout de snow</h1>
  <?php
    require('modelcsv.php');
    //
    //$fsnows=fopen('data/snows.csv','r+') or die("Fichier inexistant");
    
    // Solution 1: Crée la ligne à ajouter (solution en file_put_contents)
    //$ligneNew = $_POST['fID'].";".$_POST['fMarque'].";".$_POST['fBoots'].";".$_POST['fType'].";".$_POST['fDispo']."\n";
    //file_put_contents ('data/snows.csv', $ligneNew, FILE_APPEND);

    //Solution 2: en fputcsv()
    //$ligneNew = array($_POST['fID'],$_POST['fMarque'],$_POST['fBoots'],$_POST['fType'],$_POST['fDispo']);
    //while($dumb=fgetcsv($fsnows,1024,';')){}; //Faire passer le pointeur en dernière ligne
    //fputcsv($fsnows, $ligneNew,';'); // Ajouter la nouvelle entrée (tableau) dans le fichier
 
    //fclose($fsnows);

    //Solution 3: on réécrit tout le tableau mémoire
    //ajout dans un tableau mémoire
    if (!empty($_POST['fID'])) {
        $snows=getSnows();
        $snows[]=array('idSnow'=>$_POST['fID'],'Marque'=>$_POST['fMarque'],'Boots'=>$_POST['fBoots'],'Type'=>$_POST['fType'],'disponibilite'=>$_POST['fDispo']);
        updateSnows($snows);
        echo "Le snow ajouté est le <strong>".@$_POST['fID']. "</strong> <br>";
    } else
    {
        echo "moi j'accepte pas ce genre de id pour un snow <br>";
    }
  ?>
    <br><h3><a href='products.php'>Retour à la liste</a></h3>
</body>
</html>