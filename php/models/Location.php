<?php

class Location
{
    protected $id;
    protected $created;
    protected $updated;
    protected $name;
    protected $latitude;
    protected $longitude;

    public function __construct($rec = null)
    {
        $this->id = -1;
        if ($rec !== NULL) {
            $this->id = (array_key_exists("id", $rec) && $rec['id'] !== NULL) ? $rec['id'] : -1;
            $this->created = (array_key_exists("created", $rec) && $rec['created'] !== NULL) ? $rec['created'] : null;
            $this->updated = (array_key_exists("updated", $rec) && $rec['updated'] !== NULL) ? $rec['updated'] : null;
            $this->name = (array_key_exists("name", $rec) && $rec['name'] !== NULL) ? $rec['name'] : null;
            $this->latitude = (array_key_exists("latitude", $rec) && $rec['latitude'] !== NULL) ? $rec['latitude'] : null;
            $this->longitude = (array_key_exists("longitude", $rec) && $rec['longitude'] !== NULL) ? $rec['longitude'] : null;
        }
    }

    public static function fromPost($post)
    {
        $rec1['id'] = !empty($post['location_id']) ? $post['location_id'] : -1;
        $rec1['name'] = $post['location_name'];
        $lat_lon = $post['location_latitude_longitude'];
        if (strpos($lat_lon, ",")) {
            $ar = explode(', ', $lat_lon);
            if (count($ar) == 2) {
                $rec1['latitude'] = $ar[0];
                $rec1['longitude'] = $ar[1];
            }
        }
        // $rec1['latitude'] = $post['location_latitude'];
        // $rec1['longitude'] = $post['location_longitude'];
        $new = new static($rec1);
        return $new;
    }

    public static function fromDatabase($db)
    {
        $rec1['id'] = $db['id'];
        $rec1['created'] = $db['created'];
        $rec1['updated'] = $db['updated'];
        $rec1['name'] = $db['name'];
        $rec1['latitude'] = $db['latitude'];
        $rec1['longitude'] = $db['longitude'];
        $new = new static($rec1);
        return $new;
    }

    public function id()
    {
        return intval($this->id);
    }
    public function created()
    {
        return $this->created;
    }
    public function updated()
    {
        return $this->updated;
    }
    public function name()
    {
        return $this->name;
    }
    public function latitude()
    {
        return ($this->latitude === NULL) ? null : floatval($this->latitude);
    }
    public function longitude()
    {
        return ($this->longitude === NULL) ? null : floatval($this->longitude);
    }

    public function lat_lon()
    {
        return ($this->latitude === NULL || $this->longitude === NULL) ? null : $this->latitude . ', ' . $this->longitude;
    }

    public function toString($pretty = false)
    {
        $obj = (object) [
            "id" => $this->id(),
            "created" => $this->created(),
            "updated" => $this->updated(),
            "name" => $this->name(),
            "latitude" => $this->latitude(),
            "longitude" => $this->longitude()
        ];

        if ($pretty === true)
            return json_encode(get_object_vars($obj), JSON_PRETTY_PRINT);

        return json_encode(get_object_vars($obj));
    }
}
