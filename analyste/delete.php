<html>
<?php require_once 'php_action/core.php'; ?>	
<?php require_once 'includes/header.php'; ?>
    <head>
        <script type="text/javascript">
        function dele()
        {
            var r=confirm("");
            if(r== true)
            {

            }else{
                
                window.location='who';
            }

        }
        </script>
    </head>
    <body onload="dele()">
<?php 
if(isset($_GET['id_number']))
{
 error_reporting(1);
 $con=mysql_pconnect('localhost','root','fidele')or die("cannot connect to server");
 mysql_select_db('mudb_ims_db')or die("cannot connect to database");
 $id = $_SESSION['userId'];
 $user_query=mysql_query("select *  from users where user_id='$id'")or die(mysql_error());
 $rowclo=mysql_fetch_array($user_query); 
 $directorate = $rowclo['directorate'];
 error_reporting(0);
 $con=mysql_pconnect('localhost','root','fidele')or die("cannot connect to server");
 mysql_select_db('mudb_ims_db')or die("cannot connect to database");
 // Include PHPMailerAutoload.php library file
 include ("lib/PHPMailerAutoload.php");
 $repoid=$_GET['id_number'];
 
    

 $backup=mysql_query("INSERT INTO report_archive(report_id,province,district,sector,cell,latitude,longitude,geodescription,dateincident,dateentry,incident,incident_name,keyword,keyword_name,subkeword,message,actorgroup,actorgoup_name,Institution,institution_name,actor,actor_name,memebers,member_name,actor_desrciption,memberdescription,classification,classification_name,credibility,credidbility_name,reliabaility,reliability_name,source,source_name,povince_name,district_name,sector_name,cell_name,subject,noattachments,directorate,neighbor_country,neighbor_province,neighbor_district,user_id) select report_id,province,district,sector,cell,latitude,longitude,geodescription,dateincident,dateentry,incident,incident_name,keyword,keyword_name,subkeword,message,actorgroup,actorgoup_name,Institution,institution_name,actor,actor_name,memebers,member_name,actor_desrciption,memberdescription,classification,classification_name,credibility,credidbility_name,reliabaility,reliability_name,source,source_name,povince_name,district_name,sector_name,cell_name,subject,noattachments,directorate,neighbor_country,neighbor_province,neighbor_district,user_id from reports where report_id='".$repoid."'") ;
                
                
 if($backup)
 {
    $del=mysql_query("DELETE FROM `mudb_ims_db`.`reports` WHERE `reports`.`report_id` = '".$repoid."'");
     
    $up=mysql_query("UPDATE `mudb_ims_db`.`report_archive` SET  `user_id` = '".$id."' WHERE `report_archive`.`report_id` = '".$repoid."'");
     
     if($up && $del)
     {
         $up2=mysql_query("UPDATE `mudb_ims_db`.`report_archive` SET `Status`='Archive_Deleted' WHERE `report_archive`.`report_id` = '".$repoid."'");
         if($up2){
     echo "<script>alert('Report Delted Successfully!!!')</script>";
         echo "<script>window.location='who';</script>";
         }else{
             echo "<script>alert('Error!!!')</script>";
         // echo "<script>window.location='who';</script>";
         }
     }
     else{
         echo "<script>alert('Report Not save Try again')</script>";
         echo mysql_error();
         // echo "<script>window.location='who';</script>";
     }
 }
 else{
     
     echo "<script>alert('Report Not save Try again')</script>";
         echo "<script>window.location='edit_report';</script>";
     
 }
 
}
?>

    </body>
</html>