<?php


class JobType
{
    public function listjobtype($db){

        $sql = "SELECT * FROM job_type";
        $pdostm = $db->prepare($sql);

        $pdostm->setFetchMode(PDO::FETCH_OBJ);
        $pdostm->execute();
        $jobtype = $pdostm->fetchAll(PDO::FETCH_OBJ);
        return $jobtype;
    }

    public function listlocationtype($db){

        $sql = "SELECT * FROM location";
        $pdostm = $db->prepare($sql);

        $pdostm->setFetchMode(PDO::FETCH_OBJ);
        $pdostm->execute();
        $loc = $pdostm->fetchAll(PDO::FETCH_OBJ);
        return $loc;
    }

}