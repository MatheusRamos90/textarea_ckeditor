<?php

require 'dataInfo.php';

class Info extends dataInfo{

    protected $table = 'ck_info';

    public function create(){

        $insert_val = "INSERT INTO $this->table(title,content) VALUES(:title,:content)";
        $stm = DB::prepare($insert_val);
        $stm->bindParam(':title',$this->title);
        $stm->bindParam(':content',$this->content);
        return $stm->execute();

    }

    public function getAll(){

        $all_val = "SELECT * FROM $this->table";
        $stm = DB::prepare($all_val);
        $stm->execute();
        return $stm->fetchAll();

    }

    public function delete($id){

        $del_val = "DELETE FROM $this->table WHERE id = :id";
        $stm = DB::prepare($del_val);
        $stm->bindParam(':id',$id);
        return $stm->execute();

    }

}