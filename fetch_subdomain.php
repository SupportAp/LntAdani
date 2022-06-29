<?php

/*
Create lists using Admin Panel, then come here and replicate code based on Helptopic
where list_id is
12 for VMS/Surveillance
13 for ATCS/ITMS
14 for Smart Elements
15 for EGOV
16 for rest
*/
      require('secure.inc.php');
      require(INCLUDE_DIR.'ost-config.php');
      $type=DBTYPE;$host=DBHOST;$dname=DBNAME;$user=DBUSER;$pass=DBPASS;
      $conOst = new PDO($type.':host='.$host.';dbname='.$dname,$user,$pass);
        if(isset($_POST['help-topic']) && !empty($_POST['help-topic'])) 
        {
         $tname=$_POST['help-topic'];
            if($tname=="SEPS (Security Entry Permit Syst")
            {

               $sql_f_subd = "SELECT * FROM ost_list_items WHERE list_id=2";
               $stmtz = $conOst->prepare($sql_f_subd);
               $stmtz->execute();
               echo '<option value="0">Select Subdomain</option>'; 
               while($row = $stmtz->fetch())
                  echo '<option value="'.$row['id'].'">'.$row['value'].'</option>';

            }
            else if($tname=="SSC (Security Service Charges)")
            {

               $sql_f_subd = "SELECT * FROM ost_list_items WHERE list_id=2";
               $stmtz = $conOst->prepare($sql_f_subd);
               $stmtz->execute();
               echo '<option value="0">Select Subdomain</option>'; 
               while($row = $stmtz->fetch())
                  echo '<option value="'.$row['id'].'">'.$row['value'].'</option>';
            }
            else if($tname=="TV (Traffic Violation)")
            {
               $sql_f_subd = "SELECT * FROM ost_list_items WHERE list_id=2";
               $stmtz = $conOst->prepare($sql_f_subd);
               $stmtz->execute();
               echo '<option value="0">Select Subdomain</option>'; 
               while($row = $stmtz->fetch())
                  echo '<option value="'.$row['id'].'">'.$row['value'].'</option>';
            }
            else if($tname=="LMS (Learning Management System)")
            {
               $sql_f_subd = "SELECT * FROM ost_list_items WHERE list_id=2";
               $stmtz = $conOst->prepare($sql_f_subd);
               $stmtz->execute();
               echo '<option value="0">Select Subdomain</option>'; 
               while($row = $stmtz->fetch())
                  echo '<option value="'.$row['id'].'">'.$row['value'].'</option>';
            }
            else if($tname=="ORSM (Online Recruitment & Selec")
            {
               $sql_f_subd = "SELECT * FROM ost_list_items WHERE list_id=2";
               $stmtz = $conOst->prepare($sql_f_subd);
               $stmtz->execute();
               echo '<option value="0">Select Subdomain</option>'; 
               while($row = $stmtz->fetch())
                  echo '<option value="'.$row['id'].'">'.$row['value'].'</option>';
            }
            else if($tname=="SCAT (Security Corrective Action")
            {
               $sql_f_subd = "SELECT * FROM ost_list_items WHERE list_id=2";
               $stmtz = $conOst->prepare($sql_f_subd);
               $stmtz->execute();
               echo '<option value="0">Select Subdomain</option>'; 
               while($row = $stmtz->fetch())
                  echo '<option value="'.$row['id'].'">'.$row['value'].'</option>';
            }
            else if($tname=="DTS (Driver Training System)")
            {
               $sql_f_subd = "SELECT * FROM ost_list_items WHERE list_id=2";
               $stmtz = $conOst->prepare($sql_f_subd);
               $stmtz->execute();
               echo '<option value="0">Select Subdomain</option>'; 
               while($row = $stmtz->fetch())
                  echo '<option value="'.$row['id'].'">'.$row['value'].'</option>';
            }
            else if($tname=="EPS- Genetec Interface for OTH E")
            {
               $sql_f_subd = "SELECT * FROM ost_list_items WHERE list_id=2";
               $stmtz = $conOst->prepare($sql_f_subd);
               $stmtz->execute();
               echo '<option value="0">Select Subdomain</option>'; 
               while($row = $stmtz->fetch())
                  echo '<option value="'.$row['id'].'">'.$row['value'].'</option>';
            }
            else if($tname=="AIM (Action Improvement System)")
            {
               $sql_f_subd = "SELECT * FROM ost_list_items WHERE list_id=2";
               $stmtz = $conOst->prepare($sql_f_subd);
               $stmtz->execute();
               echo '<option value="0">Select Subdomain</option>'; 
               while($row = $stmtz->fetch())
                  echo '<option value="'.$row['id'].'">'.$row['value'].'</option>';
            }
            else
            {
               $sql_f_subd = "SELECT * FROM ost_list_items WHERE list_id=2";
               $stmtz = $conOst->prepare($sql_f_subd);
               $stmtz->execute();
               echo '<option value="0">Select Subdomain</option>'; 
               while($row = $stmtz->fetch())
                  echo '<option value="'.$row['id'].'">'.$row['value'].'</option>';
            }
      }
      $conOst=null;

?>