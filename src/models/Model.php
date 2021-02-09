<?php 

// Criando a class Model que outras classes vao extender da Model

class Model { 

    // criando propriedades protegidas que vao definir mapeamento com o DB.
    protected static $tableName = '';
    protected static $columns = [];
    protected $values = [];


    //criando construtor recebe array
    function __construct($arr) { 
       $this->loadFromArray($arr);
    }

    public function loadFromArray($arr) {
        
        if($arr) { 
            foreach($arr as $key => $value) { 
                $this->$key = $value;
            }
        }
    }
    //usando metodos magicos --__get.
    public function __get($key) { 

        return $this->values[$key];
    }

    //usando metodos magicos --__set.
    public function __set($key, $value) { 

        $this->values[$key] = $value;

    }

    public static function get($filters = [], $columns = '*') {
        $objects = [];
        $result = static::getResultSetFromSelect($filters, $columns);
        if($result) { 
            $class = get_called_class();
            while($row = $result->fetch_assoc()) {
                array_push($objects, new $class($row));
            }

        }
        return $objects;

    }

    public static function getOne($filters = [], $columns = '*') {
        $class = get_called_class();
        $result = static::getResultSetFromSelect($filters, $columns);
        
        return $result ? new $class($result->fetch_assoc()) : null;
    }

    //$filters define a clausula WHERE
    public static function getResultSetFromSelect($filters = [], $columns = '*'){ 
        $sql = "SELECT {$columns} FROM "
            . static::$tableName
            . static::getFilters($filters);
        $result = Database::getResultFromQuery($sql);
        if($result->num_rows === 0) { 
            return null;
        }else { 
            return $result;
        }

    }

    private static function getFilters($filters) { 
        $sql = '';
        if(count($filters) > 0) { 
            $sql .= " WHERE 1 = 1";
            foreach($filters as $column => $value) { 
                $sql .= " AND {$column} = " . static::getFormatedValue($value);
            }
        }
        return $sql;
    }

    private static function getFormatedValue($value) { 
        if(is_null($value)) { 
            return "null";
        } else if (gettype($value) === 'string') { 
            return "'${value}'";
        }else { 
            return $value;
        }
    }

    public function insert() { 
        $sql = "INSERT INTO " . static::$tableName . " ("
                . implode(",", static::$columns) . ") VALUES (";
        foreach(static::$columns as $col) { 
            $sql .= static::getFormatedValue($this->$col) . ",";
        }
        $sql[strlen($sql) -1] = ')';
        $id = Database::executeSQL($sql);
        $this->id = $id;
    }

}