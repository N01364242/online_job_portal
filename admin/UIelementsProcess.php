<?php


class UIelementsProcess
{
    public function updateBusinessStreams($db,$businessName,$businessId)
    {

        $sql = "UPDATE business_stream set business_stream_name =:businessName   where id=:businessId";
        $pdostm = $db->prepare($sql);
        $pdostm->bindValue(':businessName', $businessName, PDO::PARAM_STR);
        $pdostm->bindValue(':businessId', $businessId, PDO::PARAM_INT);
        $count  = $pdostm->execute();
        return $count;
    }

    public function deleteBusinessStreams($db,$businessId){
        $sql ="Delete from business_stream where id= :businessId";
        echo $sql;
        $pdostm = $db->prepare($sql);
        $pdostm->bindValue(':businessId', $businessId, PDO::PARAM_INT);
        $count  = $pdostm->execute();
        return $count;
    }
    public function addBusinessStreams($db,$businessName){
        $sql ="INSERT into business_stream (`id`, `business_stream_name`) VALUES (NULL, :businessName)";
        $pdostm = $db->prepare($sql);
        $pdostm->bindValue(':businessName', $businessName, PDO::PARAM_STR);
        $count  = $pdostm->execute();
        return $count;
    }
}