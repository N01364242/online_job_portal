<?php
require_once 'Database.php';

session_start();
$email=$_SESSION['user'];
$db = Database::getDb();

$cnameError = "";
$cdescError = "";
$cbusinessError = "";
$cebstdateError = "";
$curlError = "";

$companyname = "";
$companydesc = "";
$business = "";
$establishment = "";
$companyurl = "";


if(isset($_POST['save'])){
    $companyname = $_POST['cname'];;
    $companydesc = $_POST['desc'];;
    $business = $_POST['business'];;
    $establishment = $_POST['estdate'];;
    $companyurl = $_POST['curl'];;
    $db = Database::getDb();

    if($companyname == "" || $companydesc == "" || $business == "" || $establishment== "" || $companyurl =="") {
        if($companyname == "") {
            $cnameError = "Please fill the First Name field.";
        }

        if($companydesc == "") {
            $cdescErrorr = "Please fill the Last Name field.";
        }

        if($business == "") {
            $cbusinessError = "Please fill the Email field.";
        }

        if($establishment == "") {
            $cebstdateError = "Please fill the Password field.";
        }

        if($companyurl == "") {
            $curlError = "Please fill the Phone field.";
        }
    }else {

        $sql1 = "Select * from user_details inner join login on useraccid = user_id where login.username = '$email'";
        $pstd = $db->prepare($sql1);
        $pstd->execute();
        $data = $pstd->fetchAll(PDO::FETCH_OBJ);
        foreach ($data as $r){
            $empid = $r->user_id;
        }

        $sql = "INSERT INTO company (company_name, company_desc, business_stream_id, establishment_date, company_url, employerid) 
                  VALUES (:company_name, :company_desc, :business_stream_id, :establishment_date, :company_url, $empid) ";
        $pst = $db->prepare($sql);
        $pst->bindParam(':company_name', $companyname);
        $pst->bindParam(':company_desc', $companydesc);
        $pst->bindParam(':business_stream_id', $business);
        $pst->bindParam(':establishment_date', $establishment);
        $pst->bindParam(':company_url', $companyurl);
        $count = $pst->execute();
        if ($count) {
            echo "Employer details added sucessfully";
        } else {
            echo "Problem adding a Employer details";
        }
    }
    header("Location:EmployerProfile.php");
}

?>
