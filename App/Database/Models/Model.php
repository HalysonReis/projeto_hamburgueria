<?php
namespace App\Database\Models;

use App\Database\Connection;

abstract class Model {
    private string $fields = "*";
    protected static string $table;
    protected array $attributes = [];

    public function __set(string $name, mixed $value){
        $this->attributes[$name] = $value;
    }

    public function __get(string $name){
        return $this->attributes[$name];
    }

    public function setFeilds($fields){
        $this->fields = $fields;
    }

    public function create(array $data){
        try {
            $table = static::$table;
            $sql = "insert into {$table} (";
            $sql .= implode(',', array_keys($data)). ") values (:";
            $sql .= implode(',:', array_keys($data)). ")";

            $connect = Connection::connect();
    
            $prepare = $connect->prepare($sql);
    
            return $prepare->execute($data);
            
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function update(string $field, string|int $fieldValue, array $data){
        try {
            $table = static::$table;
            $sql = "update {$table} set ";

            foreach($data as $key => $value){
                $sql .= "{$key} = :{$key},";
            }

            $sql = rtrim($sql, ',');

            $sql .= " where {$field} = :{$field}";

            $data[$field] = $fieldValue;

            $connect = Connection::connect();
    
            $prepare = $connect->prepare($sql);
    
            return $prepare->execute($data);
            
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function fetchAll(){
        try {
            $table = static::$table;
            $sql = "select {$this->fields} from {$table}";

            $connect = Connection::connect();
    
            $query = $connect->query($sql);
    
            return $query->fetchAll(\PDO::FETCH_ASSOC);
            
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function findBy(string $field = '', string $value = ''){
        try {
            $table = static::$table;
            $sql = "select {$this->fields} from {$table} where {$field} = :{$field}";

            $connect = Connection::connect();
    
            $prepare = $connect->prepare($sql);

            $prepare->execute([$field => $value]);
    
            return $prepare->fetch(\PDO::FETCH_ASSOC);
            
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function delete(string $field = '', string|int $value = ''){
        try {
            $table = static::$table;
            $sql = "delete from {$table} where {$field} = :{$field}";

            $connect = Connection::connect();
    
            $prepare = $connect->prepare($sql);
    
            return $prepare->execute([$field => $value]);
            
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }
}