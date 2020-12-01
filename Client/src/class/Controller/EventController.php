<?php

namespace App\Controller;

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
        $id = $_SESSION['auth']['id'];



        $prepAddr = str_replace(' ','+',$eventAddress);
        $geocode=file_get_contents('https://maps.google.com/maps/api/geocode/json?address='.$prepAddr.'&key=' . getenv('GOOGLE_MAPS_KEY'));
        $output= json_decode($geocode);
        $latitude = $output->results[0]->geometry->location->lat;
        $longitude = $output->results[0]->geometry->location->lng;

        try{
            $event = new EventRepository();
            $event->InsertEvent($eventName, $eventDescription, $eventAddress, $eventCity, $eventZipCode, $eventStartDate, $eventEndDate, $latitude, $longitude, $id);
            header(EventController::$headerLocation);
        }catch(Error $e){
            echo $e->getMessage();
        }
    }

    public static function DeleteEvent(){

        // URI parameter
        $uri = $_SERVER['REQUEST_URI'];
        $id = explode('/', $uri)[4];

        try{
            $event = new EventRepository();
            $event->DeleteEventById($id);
            header(EventController::$headerLocation);
        }catch(Error $e){
            echo $e->getMessage();
        }
    }
}

?>