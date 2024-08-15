<?php
class Database{
    private $__conn;
    function __construct(){
        global $db_config;
        $this->__conn = Connection::getInstance($db_config);
    }

    function insert($tabel, $data){

        if (!empty($data)){
            $fieldStr = '';
            $valueStr = '';
            foreach ($data as $key=>$value){
                $fieldStr.=$key.',';
                $valueStr.="'".$value."',";
            }
            $fieldStr = rtrim($fieldStr, ',');
            $valueStr = rtrim($valueStr, ',');

            $sql = "INSERT INTO $tabel($fieldStr) VALUES ($valueStr)";

            $status = $this->query($sql);

            if ($status){
                return true;
            }
        }

        return false;
    }

    function delete($tabel, $condition=''){

        if (!empty($condition)){
            $sql = 'DELETE FROM '.$table.' WHERE '.$condition;
        }else{
            $sql = 'DELETE FROM '.$table;
        }

        $status = $this->query($sql);

        if ($status){
            return true;
        }

        return false;
    }

    function query($sql){

        $statement = $this->__conn->prepare($sql);

        $statement->execute();

        return $statement;
    }

    function lastInsertId(){

        return $this->__conn->lastInsertId();
    }
}