<?php $data = dirname(__DIR__) . DIRECTORY_SEPARATOR . "Model" . DIRECTORY_SEPARATOR . "snow.php";
require_once($data);
?>

<div class="d-flex justify-content-between align-items-center my-2 mx-2">
    <h1>Our products</h1>
    <a href="snow_add">
        <button type="button" class="btn btn-primary">Add Snow</button>
    </a>
</div>

<?php
$db = new DB();
$snows = $db->getSnows();
$ligne = 1;

echo <<<EOT
    <table class="table table-dark">
    <thead>
      <tr>
        <th>ID</th>
        <th>Brand</th>
        <th>Boots</th>
        <th>Type</th>
        <th>Available</th>
      </tr>
    </thead>
    <tbody>
EOT;


foreach ($snows as $snow) {
    echo <<<EOT
          <tr>
            <td>$snow[idSnow]</td>
            <td>$snow[Marque]</td>
            <td>$snow[Boots]</td>
            <td>$snow[Type]</td>
            <td>$snow[Disponibilite]</td>
            <td><a href=snow_delete.php?idSnow="$snow[idSnow]">Détruire</a></td>
            <td><a href=snow_update.php?idSnow="$snow[idSnow]">Modifier</a></td>
          </tr>
    
 EOT;
}

echo <<<EOT
    </tbody>
    </table>   
EOT;

?>

<div class="d-flex align-items-center justify-content-center mt-5">
    <ul class="pagination">
        <li class="page-item disabled">
            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
        </li>
        <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item active" aria-current="page">
            <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
        </li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item">
            <a class="page-link" href="#">Next</a>
        </li>
    </ul>
</div>