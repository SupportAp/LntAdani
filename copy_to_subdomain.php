<?php
     // Enter the status_id of Resolved and Closed by referring the ost_status table 

		require('secure.inc.php');

		require(INCLUDE_DIR.'ost-config.php');
        $type=DBTYPE;$host=DBHOST;$dname=DBNAME;$user=DBUSER;$pass=DBPASS;
         //echo($type.':host='.$host.';dbname='.$dname);
        $conOst = new PDO($type.':host='.$host.';dbname='.$dname,$user,$pass);
		
        if(isset($_POST['help-topic']) && !empty($_POST['help-topic'])) {
        	$tname=$_POST['help-topic'];
        	$variable="Success!";
            //error_log(print_r($tname,TRUE));
            if($tname=="SEPS (Security Entry Permit Syst" || $tname=="SSC (Security Service Charges)" || $tname=="TV (Traffic Violation)" || $tname=="LMS (Learning Management System)" || $tname=="ORSM (Online Recruitment & Selec" || $tname=="SCAT (Security Corrective Action" || $tname=="DTS (Driver Training System)" || $tname=="EPS- Genetec Interface for OTH E" || $tname=="AIM (Action Improvement System)")
            {

            	//delete code
            	$sqld = 'DELETE FROM ost_list_items '
                . 'WHERE id > :project_id';

        		$stmt = $conOst->prepare($sqld);

        		$stmt->execute([':project_id' => 100]);
            	/////////////////////////////

            	$array_text=array("Non-functioning of Application","Non-functionality of Interface","Dashboard not Working","Non-functionality of Schedules","Software/DB Service Malfunctioning","Application-DB Connectivity Issue","Malfunctioning of IIS on Application Server","Application Working on Lower/non-Supported .NET Framework");
            	$array_extras=array(1,2,3,4,5,6,7,8);
            	$array_ids=array(121,122,123,124,125,126,127,128);
            	$properties='\'[]\'';
            	$insert_sql = array(); 
            	for($x = 0; $x < count($array_text); $x++) {
  					$insert_sql[]='('.$array_ids[$x].',11,1,\''.$array_text[$x].'\','.$array_extras[$x].',1,'.$properties.')';
				}
				
    			$vals=array();
    			for($x = 0; $x < count($insert_sql); $x++)
    				$vals = array_merge($vals, (array)$insert_sql[$x]);

    			$final_stmt="INSERT INTO ost_list_items(id,list_id,status,value,extra,sort,properties) VALUES ".implode(",",$vals)."";
    			//error_log(print_r($final_stmt,TRUE));
    			//error_log(print_r($vals,TRUE));	
				$final_stmt = $conOst->prepare($final_stmt);
				$final_stmt = $final_stmt->execute();

            }
        	echo json_encode(array("imp"=>$variable));
    	}
    	else
    	{
    		$variable="Empty fields";
    		echo json_encode(array("imp"=>$variable));
    	}
    	$conOst=null;
?>