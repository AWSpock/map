<?php
require_once("/var/www/map/php/DataAccess/Database.php");
require_once("/var/www/map/php/DataAccess/Repositories/CategoryRepository.php");
require_once("/var/www/map/php/DataAccess/Repositories/LocationRepository.php");

class DataAccess
{
    private $db;
    private $categoryRepository = [];
    private $fillupRepository = [];
    private $locationRepository = [];
    private $tripRepository = [];
    private $tripCheckpointRepository = [];

    public function __construct(mysqli $db = null)
    {
        $this->db = $db ?? new DatabaseV2();
    }

    public function categories($userid)
    {
        if (!array_key_exists($userid, $this->categoryRepository)) {
            $this->categoryRepository[$userid] = new CategoryRepository($this->db, $userid);
        }
        return $this->categoryRepository[$userid];
    }

    public function locations($category_id)
    {
        if (!array_key_exists($category_id, $this->locationRepository)) {
            $this->locationRepository[$category_id] = new LocationRepository($this->db, $category_id);
        }
        return $this->locationRepository[$category_id];
    }

    //

    public function beginTransaction()
    {
        $this->db->beginTransaction();
    }
    public function commit()
    {
        $this->db->commit();
    }
    public function rollback()
    {
        $this->db->rollback();
    }
    public function close()
    {
        $this->db->close();
    }
    public function getDb()
    {
        return $this->db;
    }
}
