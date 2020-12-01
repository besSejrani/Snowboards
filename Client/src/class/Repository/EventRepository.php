<?php

namespace App\Repository;

use App\Model\Mysql;

class EventRepository{
    public function InsertEvent($eventName, $eventDescription, $eventAddress, $eventCity, $eventZipCode, $eventStartDate, $eventEndDate, $lat, $lng, $id)
    {
        $sql = "INSERT INTO snows_bes.event (name, description, address, city, zipcode, start_date, end_date,lat, lng, id_users) VALUES ('$eventName', '$eventDescription', '$eventAddress', '$eventCity', '$eventZipCode', '$eventStartDate', '$eventEndDate','$lat','$lng','$id')";
        $db = new Mysql();
        $db->executeQuery($sql);
    }

    public function DeleteEventById($id)
    {
        $sql = "DELETE FROM snows_bes.event WHERE id='$id'";
        $db = new Mysql();
        $db->executeQuery($sql);
    }

    public function GetEvents():iterable
    {
        $sql = "SELECT id, name, address, concat(lat, ' - ', lng) as gps, sum(id_users) as participants, start_date, end_date FROM snows_bes.event group by id;";
        $db = new Mysql();
        return $db->executeQuery($sql);
    }
}
?>