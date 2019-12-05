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
}