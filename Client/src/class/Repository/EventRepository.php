<?php

namespace App\Repository;

use App\Model\Mysql;

class EventRepository{
    public function InsertEvent($eventName, $eventDescription, $eventAddress, $eventCity, $eventZipCode, $eventStartDate, $eventEndDate, $id)
    {
        $sql = "INSERT INTO snows_bes.event (name, description, address, city, zipcode, start_date, end_date) VALUES ('$eventName', '$eventDescription', '$eventAddress', '$eventCity', '$eventZipCode', '$eventStartDate', '$eventEndDate', '$id') where id='$id'";
        $db = new Mysql();
        return $db->executeQuery($sql);
    }
}
?>