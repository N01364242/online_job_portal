<?php


class BusinessStream
{
    public function listBusiness($db){

        $sql = "SELECT * FROM business_stream";
        $pdostm = $db->prepare($sql);

        $pdostm->setFetchMode(PDO::FETCH_OBJ);
        $pdostm->execute();
        $buss = $pdostm->fetchAll(PDO::FETCH_OBJ);
        return $buss;
    }
}