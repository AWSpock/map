<?php

require_once("/var/www/map/php/models/Category.php");

class CategoryRepository
{
    private $db;
    private $userid;

    private $records = [];
    private $loaded = false;

    public $actionDataMessage;

    public function __construct(DatabaseV2 $db, $userid)
    {
        $this->db = $db;
        $this->userid = $userid;
    }

    public function getRecordById($id)
    {
        if (!array_key_exists($id, $this->records)) {
            $sql = "
                SELECT a.`id`, a.`created`, a.`updated`, a.`name`, if(isnull(b.`category_id`),'No','Yes') AS `favorite`, ifnull(c.`role`,'Owner') AS `role`
                FROM category a
                    LEFT OUTER JOIN category_favorite b
                        ON a.`id` = b.`category_id`
                        AND b.`userid` = ?
                    LEFT OUTER JOIN category_share c
                        ON a.`id` = c.`category_id`
                        AND c.`userid` = ?
                WHERE a.`id` = ? 
                    AND (
                        a.`userid` = ?
                        OR a.`id` IN (
                            SELECT `category_id`
                            FROM category_share
                            WHERE `userid` = ?
                        )
                    )
            ";

            $result = $this->db->query($sql, [
                $this->userid,
                $this->userid,
                $id,
                $this->userid,
                $this->userid,
            ], "iiiii");

            if ($result) {
                $rec = Category::fromDatabase($result->fetch_array(MYSQLI_ASSOC));
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
            SELECT a.`id`, a.`created`, a.`updated`, a.`name`, if(isnull(b.`category_id`),'No','Yes') AS `favorite`, ifnull(c.`role`,'Owner') AS `role`
            FROM category a
                LEFT OUTER JOIN category_favorite b
                    ON a.`id` = b.`category_id`
                    AND b.`userid` = ?
                LEFT OUTER JOIN category_share c
                    ON a.`id` = c.`category_id`
                    AND c.`userid` = ?
            WHERE a.`userid` = ?
                OR a.`id` IN (
                    SELECT `category_id`
                    FROM category_share
                    WHERE `userid` = ?
                )
            ORDER BY `favorite` DESC, `name`
        ";

        $result = $this->db->query($sql, [
            $this->userid,
            $this->userid,
            $this->userid,
            $this->userid
        ], "iiii");

        $this->loaded = true;
        $this->records = [];
        foreach ($result->fetch_all(MYSQLI_ASSOC) as $rec) {
            $this->records[$rec['id']] = Category::fromDatabase($rec);
        }
        return $this->records;
    }

    public function insertRecord(Category $rec)
    {
        $this->actionDataMessage = "Failed to insert Category";

        if (empty($rec->name())) {
            $this->actionDataMessage = "Name is required to insert Category";
            return 0;
        }

        $this->db->beginTransaction();

        $sql = "
            INSERT INTO category (`name`,`userid`)
            VALUES (?,?)
        ";

        $result = $this->db->query($sql, [
            $rec->name(),
            $this->userid
        ], "si");

        if (is_int($result) && $result > 0) {
            $this->actionDataMessage = "Category Inserted";
            $this->db->commit();
            return $result;
        }
        $this->db->rollback();
        return 0;
    }

    public function updateRecord(Category $rec)
    {
        $this->actionDataMessage = "Failed to update Category";

        if (empty($rec->name())) {
            $this->actionDataMessage = "Name is required to update Category";
            return 0;
        }

        $this->db->beginTransaction();

        $sql = "
            UPDATE category 
            SET `name` = ?, 
            WHERE `id` = ? 
            AND `userid` = ?
        ";

        $result = $this->db->query($sql, [
            $rec->name(),
            $rec->id(),
            $this->userid
        ], "sii");

        if ($result !== false) {
            if ($result !== 1) {
                $this->actionDataMessage = "Category Unchanged";
                return 2;
            }
            $this->actionDataMessage = "Category Updated";
            $this->db->commit();
            return 1;
        }

        $this->db->rollback();
        return false;
    }

    public function deleteRecord(Category $rec)
    {
        $this->actionDataMessage = "Failed to delete Category";

        $this->db->beginTransaction();

        $sql = "
            DELETE a, b, c, d, e
            FROM category a
                LEFT OUTER JOIN category_favorite b ON a.`id` = b.`category_id`
                LEFT OUTER JOIN category_share c ON a.`id` = b.`category_id`
                LEFT OUTER JOIN location d ON a.`id` = d.`category_id`
            WHERE a.`id` = ? 
            AND a.`userid` = ?
        ";

        $result = $this->db->query($sql, [
            $rec->id(),
            $this->userid
        ], "ii");

        if (is_int($result) && $result > 0) {
            $this->actionDataMessage = "Category Deleted";
            $this->db->commit();
            return 1;
        }
        $this->db->rollback();
        return 0;
    }

    //

    public function setFavorite($id)
    {
        $this->actionDataMessage = "Failed to Add Favorite Category";

        $this->db->beginTransaction();

        $sql = "
            INSERT INTO category_favorite (`category_id`, `userid`)
            VALUES (?,?)
        ";

        $result = $this->db->query($sql, [
            $id,
            $this->userid
        ], "ii");

        if ($result === true) {
            $this->actionDataMessage = "Added Favorite Category";
            $this->db->commit();
            return true;
        }

        $this->db->rollback();
        return false;
    }

    public function removeFavorite($id)
    {
        $this->actionDataMessage = "Failed to Remove Favorite Category";

        $this->db->beginTransaction();

        $sql = "
            DELETE FROM category_favorite
            WHERE `category_id` = ? 
            AND `userid` = ?
        ";

        $result = $this->db->query($sql, [
            $id,
            $this->userid
        ], "ii");

        if (is_int($result) && $result > 0) {
            $this->actionDataMessage = "Removed Favorite Category";
            $this->db->commit();
            return true;
        }

        $this->db->rollback();
        return false;
    }
}
