<?php


class UIelementsProcess
{
    public function updateUIElements($db,$name,$id, $ui)
    {
        $sql ='';
        if($ui == 'Business Stream'){
        $sql = "UPDATE business_stream set business_stream_name =:name  where id=:id";
        }else if($ui == 'SkillSet'){
            $sql = "UPDATE skill_set set skill_name =:name  where skill_id=:id";
        }else{
            $sql = "UPDATE skill_level set level_name =:name  where skill_level_id=:id";
        }
        $pdostm = $db->prepare($sql);
        $pdostm->bindValue(':name', $name, PDO::PARAM_STR);
        $pdostm->bindValue(':id', $id, PDO::PARAM_INT);
        $count  = $pdostm->execute();
        return $count;
    }

    public function deleteUIElements($db,$id,$ui){
        $sql='';
        if($ui == 'Business Stream') {
            $sql = "Delete from `business_stream` where `id`= :id";
        }else if($ui == 'SkillSet') {
            $sql = "Delete from `skill_set` where `skill_id`= :id";
        }else{
            $sql = "Delete from `skill_level` where `skill_level_id`= :id";
        }

        $pdostm = $db->prepare($sql);
        $pdostm->bindValue(':id', $id, PDO::PARAM_INT);
        $count  = $pdostm->execute();
        return $count;
    }
    public function addUIElements($db,$name,$ui){
        $sql='';
        if($ui == 'Business Stream') {
            $sql = "INSERT into business_stream (`id`, `business_stream_name`) VALUES (NULL, :name)";
        }else if($ui == 'SkillSet'){
            $sql = "INSERT into skill_set (`skill_id`, `skill_name`) VALUES (NULL, :name)";
        }else{
            $sql = "INSERT into skill_level (`skill_level_id`, `level_name`) VALUES (NULL, :name)";

        }
        $pdostm = $db->prepare($sql);
        $pdostm->bindValue(':name', $name, PDO::PARAM_STR);
        $count  = $pdostm->execute();
        return $count;
    }
}