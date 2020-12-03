<?php

use App\Form\Seo;
use App\Repository\EventRepository;

// SEO
$seo = new Seo();
$seo->myTitle("Snowboards | Events")
    ->myDescription("This is a description");

// Events
$db = new EventRepository();
$events = $db->GetEvents();
?>


<div class="d-flex align-items-center vh-100">
    <div class="justify-content-start  h-100">
        <?php require dirname(__DIR__,3) . "/layout/sidebar.php"?>
    </div>

    <div class="d-flex flex-column justify-content-center align-items-center h-100 w-100">

        <div style="width: 900px;">
            <div class="d-flex flex-row justify-content-between">
                <h1>Events</h1>
                <div class="d-flex justify-content-end align-items-center w-35">
                    <a class="mx-3" href="/admin/events/addEvent">
                        <button type="button" style="width:130px;" class="btn btn-primary">
                            <span class="material-icons">
                                add
                            </span>
                            Add Event
                        </button>
                    </a>
                </div>


            </div>

            <?php


echo <<<EOT
    <table class="table table-dark container mb-5 table-hover">
    <thead>
    <tr>
    <th>Name</th>
    <th>Address</th>
    <th>GPS</th>
    <th>Participants</th>
    <th>Start Date</th>
    <th>End Date</th>
    <th>Actions</th>
    </tr>
    </thead>
    <tbody>
EOT;



foreach ($events as $event) {
    echo <<<EOT
        <tr>
        <td>$event[name]</td>
        <td>$event[address]</td>
        <td>$event[gps]</td>
        <td>$event[participants]</td>
        <td>$event[start_date]</td>
        <td>$event[end_date]</td>
        <td>
            <a href=/api/events/update/$event[id]>
                <span class="material-icons text-warning">
                    create
                </span></a>
            </a>
            <a href=/api/events/delete/$event[id]>
                <span class="material-icons text-danger">
                    delete
                </span>
            </a>
        </td>
        </tr>
    EOT;
}

    echo <<<EOT
        </tbody>
        </table>   
    EOT;

?>

            <?require dirname(__DIR__,3) . "/layout/pagination.php" ?>
        </div>
    </div>
</div>




<?php
$js = '';