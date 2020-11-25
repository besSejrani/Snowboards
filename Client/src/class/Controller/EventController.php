<?php

namespace App\Controller;
require (dirname(__DIR__, 3) . "/vendor/autoload.php");

use App\Repository\EventRepository;
use Error;

class EventController{

    static string $headerLocation ='Location: http://localhost:8000/admin/events';

    public static function AddEvent()
    {
        // POST values
        $eventName = $_POST['Name'];
        $eventDescription = $_POST['Description'];
        $eventAddress = $_POST['Address'];
        $eventCity = $_POST['City'];
        $eventZipCode = $_POST['Zip_Code'];
        $eventStartDate = $_POST['Start_Date'];
        $eventEndDate = $_POST['End_Date'];

        try{
            $event = new EventRepository();
            $event->InsertEvent($eventName, $eventDescription, $eventAddress, $eventCity, $eventZipCode, $eventStartDate, $eventEndDate);
            header(UserController::$headerLocation);
        }catch(Error $e){
            echo $e->getMessage();
        }
    }
}

?>