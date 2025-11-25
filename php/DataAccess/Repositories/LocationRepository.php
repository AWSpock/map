<?php

require_once("/var/www/map/php/models/Location.php");

class LocationRepository
{
    private $db;
    private $category_id;

    private $records = [];
    private $loaded = false;

    public $actionDataMessage;

    public function __construct(DatabaseV2 $db, $category_id)
    {
        $this->db = $db;
        $this->category_id = $category_id;
    }

    public function getRecordById($id)
    {
        if (!array_key_exists($id, $this->records)) {
            $sql = "
                SELECT a.`id`, a.`created`, a.`updated`, a.`date`, a.`odometer`, a.`price`, a.`description`, a.`garage`
                FROM location a
                WHERE a.`category_id` = ?
                    AND a.`id` = ?
            ";

            $result = $this->db->query($sql, [
                $this->category_id,
                $id
            ], "ii");

            if ($result) {
                $rec = Location::fromDatabase($result->fetch_array(MYSQLI_ASSOC));
                $this->records[$id] = $rec;
            } else {
                $this->records[$id] = null;
            }
        }
        return $this->records[$id];
    }

    public function getRecords()
    {
        if ($this->loaded) {
            $recs = [];
            foreach ($this->records as $key => $rec) {
                if ($rec->id() > 0)
                    $recs[$key] = $rec;
            }
            return $recs;
        }

        $sql = "
            SELECT a.`id`, a.`created`, a.`updated`, a.`date`, a.`odometer`, a.`price`, a.`description`, a.`garage`
            FROM location a
            WHERE a.`category_id` = ?
            ORDER BY a.`date` DESC, a.`odometer` DESC
        ";

        $result = $this->db->query($sql, [
            $this->category_id
        ], "i");

        $this->loaded = true;
        $this->records = [];
        foreach ($result->fetch_all(MYSQLI_ASSOC) as $rec) {
            $this->records[$rec['id']] = Location::fromDatabase($rec);
        }
        return $this->records;
    }

    public function insertRecord(Location $rec)
    {
        $this->actionDataMessage = "Failed to insert Location";

        if (empty($rec->date()) || !is_int($rec->odometer()) || !is_float($rec->price()) || empty($rec->description())) {
            $this->actionDataMessage = "Missing required fields to insert Location";
            return 0;
        }

        $this->db->beginTransaction();

        $sql = "
            INSERT INTO location (`category_id`,`date`,`odometer`,`price`,`description`,`garage`)
            VALUES (?,?,?,?,?,?)
        ";

        $result = $this->db->query($sql, [
            $this->category_id,
            $rec->date(),
            $rec->odometer(),
            $rec->price(),
            $rec->description(),
            $rec->garage()
        ], "isidss");

        if (is_int($result) && $result > 0) {
            $this->actionDataMessage = "Location Inserted";
            $this->db->commit();
            return $result;
        }
        $this->db->rollback();
        return 0;
    }

    public function updateRecord(Location $rec)
    {
        $this->actionDataMessage = "Failed to update Location";

        if (empty($rec->date()) || !is_int($rec->odometer()) || !is_float($rec->price()) || empty($rec->description())) {
            $this->actionDataMessage = "Missing required fields to update Location";
            return 0;
        }

        $this->db->beginTransaction();

        $sql = "
            UPDATE location
            SET `date` = ?,
                `odometer` = ?,
                `price` = ?,
                `description` = ?,
                `garage` = ? 
            WHERE `id` = ? 
            AND `category_id` = ?
        ";

        $result = $this->db->query($sql, [
            $rec->date(),
            $rec->odometer(),
            $rec->price(),
            $rec->description(),
            $rec->garage(),
            $rec->id(),
            $this->category_id
        ], "sidssii");

        if ($result !== false) {
            if ($result !== 1) {
                $this->actionDataMessage = "Location Unchanged";
                return 2;
            }
            $this->actionDataMessage = "Location Updated";
            $this->db->commit();
            return 1;
        }

        $this->db->rollback();
        return false;
    }

    public function deleteRecord(Location $rec)
    {
        $this->actionDataMessage = "Failed to delete Location";

        $this->db->beginTransaction();

        $sql = "
            DELETE FROM location 
            WHERE `id` = ? 
            AND `category_id` = ?
        ";

        $result = $this->db->query($sql, [
            $rec->id(),
            $this->category_id
        ], "ii");

        if (is_int($result) && $result > 0) {
            $this->actionDataMessage = "Location Deleted";
            $this->db->commit();
            return 1;
        }
        $this->db->rollback();
        return 0;
    }
}
