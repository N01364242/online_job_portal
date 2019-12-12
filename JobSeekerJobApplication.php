<?php


class JobSeekerJobApplication
{
    public function jobDetailsById($db, $id){
        $sql = "SELECT * FROM job_post join job_type on job_post.job_type_id = job_type.id 
                join location on job_post.joblocation_id = location.loc_id WHERE job_id = :id";
        $pdostm = $db->prepare($sql);
        $pdostm->bindValue(':id', $id, PDO::PARAM_STR);
        $pdostm->execute();
        $job = $pdostm->fetch(PDO::FETCH_OBJ);
        return $job;
    }


    public function ApplyJob($db, $id, $employee_id, $application_status, $apply_date, $data){
        $sqlApply = "INSERT INTO job_application_request (job_id, employee_id, application_status, apply_date, resume) 
                  VALUES (:id, :employee_id, :application_status, :apply_date, :resume) ";
        $pst = $db->prepare($sqlApply);
        $pst->bindParam(':id', $id);
        $pst->bindParam(':employee_id', $employee_id);
        $pst->bindParam(':application_status', $application_status);
        $pst->bindParam(':apply_date', $apply_date);
        $pst->bindParam(':resume', $data);
        $count = $pst->execute();
        return $count;
    }


    public function AppliedJobs($db, $employee_id){
        $sql = "SELECT * FROM job_application_request join job_post on job_application_request.job_id = job_post.job_id 
        join job_type on job_post.job_type_id = job_type.id 
        join location on job_post.joblocation_id = location.loc_id 
        where employee_id= :employee_id";

        $pdostm = $db->prepare($sql);
        $pdostm->bindValue(':employee_id', $employee_id, PDO::PARAM_STR);
        $pdostm->execute();
        $jobs = $pdostm->fetchAll(PDO::FETCH_OBJ);
        return $jobs;
    }


}