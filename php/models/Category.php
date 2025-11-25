<?php

class Category
{
    protected $id;
    protected $created;
    protected $updated;
    protected $name;
    protected $favorite;
    protected $role;

    protected $bill_types;

    public function __construct($rec = null)
    {
        $this->id = (array_key_exists("id", $rec) && $rec['id'] !== NULL) ? $rec['id'] : -1;
        $this->created = (array_key_exists("created", $rec) && $rec['created'] !== NULL) ? $rec['created'] : null;
        $this->updated = (array_key_exists("updated", $rec) && $rec['updated'] !== NULL) ? $rec['updated'] : null;
        $this->name = (array_key_exists("name", $rec) && $rec['name'] !== NULL) ? $rec['name'] : null;
        $this->favorite = (array_key_exists("favorite", $rec) && $rec['favorite'] !== NULL) ? $rec['favorite'] : null;
        $this->role = (array_key_exists("role", $rec) && $rec['role'] !== NULL) ? $rec['role'] : null;
    }

    public static function fromPost($post)
    {
        $rec1['id'] = !empty($post['category_id']) ? $post['category_id'] : -1;
        $rec1['name'] = $post['category_name'];
        $new = new static($rec1);
        return $new;
    }

    public static function fromDatabase($db)
    {
        $rec1['id'] = $db['id'];
        $rec1['created'] = $db['created'];
        $rec1['updated'] = $db['updated'];
        $rec1['name'] = $db['name'];
        $rec1['favorite'] = $db['favorite'];
        $rec1['role'] = $db['role'];
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
    public function favorite()
    {
        return $this->favorite;
    }
    public function role()
    {
        return $this->role;
    }
    public function isOwner()
    {
        return boolval($this->role == "Owner");
    }
    public function isManager()
    {
        return boolval($this->role == "Manager");
    }
    public function isViewer()
    {
        return boolval($this->role == "Viewer");
    }

    public function toString($pretty = false)
    {
        $obj = (object) [
            "id" => $this->id(),
            "created" => $this->created(),
            "updated" => $this->updated(),
            "name" => $this->name(),
            "favorite" => $this->favorite()
        ];

        if ($pretty === true)
            return json_encode(get_object_vars($obj), JSON_PRETTY_PRINT);

        return json_encode(get_object_vars($obj));
    }

    //

    // public function bill_types()
    // {
    //     return $this->bill_types;
    // }
    // public function store_bill_type(BillType $rec)
    // {
    //     if ($this->bill_types === null)
    //         $this->bill_types = [];
    //     $this->bill_types[$rec->id()] = $rec;
    // }
    // public function store_bill_types(array $recs)
    // {
    //     $this->bill_types = [];

    //     foreach ($recs as $rec) {
    //         if (!$rec instanceof BillType)
    //             throw new InvalidArgumentException("Array must contain only instances of BillType");
    //         $this->bill_types[$rec->id()] = $rec;
    //     }
    // }
}
