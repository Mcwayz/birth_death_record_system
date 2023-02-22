<?php

class userAPI
{
    

    //------------------------USER RELATED FUNCTIONS START HERE------------------------------//



     //function that gets user details 


     public function getUsers()
     {
         $db = new DBconnection();
         $dbConn = $db->getConnection();
         $sql ="SELECT * FROM users_tbl WHERE user_role ='user' ORDER BY user_id DESC";
         return $dbConn->query($sql);
     }


    //function that gets user details 


    public function getUser($id)
    {
        $db = new DBconnection();
        $dbConn = $db->getConnection();
        $sql ="SELECT * FROM users_tbl WHERE user_id ='$id'";
        return $dbConn->query($sql);
    }


    //function to add users to the system


    public function addUser($fullname, $user_email, $user_role, $usr_pass)
    {
        $db = new DBconnection();
        $dbConn = $db->getConnection();
        $sql = "INSERT INTO `users_tbl` VALUES (NULL, :fullname, :user_email, :user_role, :user_pass)";
          $query = $dbConn->prepare($sql);
          $query->bindparam(':fullname', $fullname);
          $query->bindparam(':user_email', $user_email);
          $query->bindparam(':user_role', $user_role);
          $query->bindparam(':user_pass', $usr_pass);
          if ($query->execute())
          {
              echo"<script>alert('User Successfully Added');</script>";
              echo"<script>window.location.href = 'viewusers.php'</script>";
          }

    }


    //function to edit user details

    public function editUser($id, $fullname, $user_email, $user_role, $usr_pass)
    {
        $db = new DBconnection();
        $dbConn = $db->getConnection();
        $sql = "UPDATE `users_tbl` SET `fullname`=:fullname,`user_email`=:user_email,
        `user_role`=:user_role,`user_password`=:user_pass WHERE `user_id`=:usr_id";
          $query = $dbConn->prepare($sql);
          $query->bindparam(':usr_id', $id);
          $query->bindparam(':fullname', $fullname);
          $query->bindparam(':user_email', $user_email);
          $query->bindparam(':user_role', $user_role);
          $query->bindparam(':user_pass', $usr_pass);
          if ($query->execute())
          {
              echo"<script>alert('Record Successfully Updated');</script>";
              echo"<script>window.location.href = 'viewusers.php'</script>";
          }

    }


    //function that gets user details 


    public function deleteUser($id)
    {
        $db = new DBconnection();
        $dbConn = $db->getConnection();
        $sql ="DELETE FROM users_tbl WHERE user_id=:usr_id";
        $query = $dbConn->prepare($sql);
        $query->bindparam(':usr_id', $id);
        if ($query->execute())
        {
            echo"<script>alert('User Successfully Deleted');</script>";
            echo"<script>window.location.href = 'viewusers.php'</script>";
        }
        
    }

//------------------------DECEASED RELATED FUNCTIONS END HERE------------------------------//



//------------------------BIRTH RELATED FUNCTIONS START HERE------------------------------//


//function that inserts birth information into the DB

public function addBirthRecord($Full_name, $Tob, $Gender, $Pob, $Fname, $Mname, $Reg_Date, $Usr_ID)
{
    $db = new DBconnection();
    $dbConn = $db->getConnection();
    $sql = "INSERT INTO `birth_tbl` VALUES (NULL,:Full_name, :Tob, :Gender, :Pob, :Fname, :Mname, :Reg_Date, :usr_id)";
    $query = $dbConn->prepare($sql);
    $query->bindparam(':Full_name', $Full_name);
    $query->bindparam(':Tob', $Tob);
    $query->bindparam(':Gender', $Gender);
    $query->bindparam(':Pob', $Pob);
    $query->bindparam(':Fname', $Fname);
    $query->bindparam(':Mname', $Mname);
    $query->bindparam(':Reg_Date', $Reg_Date);
    $query->bindparam(':usr_id', $Usr_ID);
    if ($query->execute())
    {
        echo"<script>alert('Record Successfully Added');</script>";
        echo"<script>window.location.href = 'viewbirths.php'</script>";
    }
}


//function that Edits birth information in the DB

public function editBirthRecord($id, $Full_name, $Tob, $Gender, $Pob, $Fname, $Mname, $Usr_ID)
{
    $db = new DBconnection();
    $dbConn = $db->getConnection();
    $sql = "UPDATE  `birth_tbl` SET `full_name`=:Full_name,`time_of_birth`=:Tob, 
    `birth_gender`=:Gender, `place_of_birth`=:Pob, `fathers_fullname`=:Fname,
    `mothers_fullname`=:Mname, `user_id`=:usr_id WHERE birth_id=:birth_id";
    $query = $dbConn->prepare($sql);
    $query->bindparam(':birth_id', $id);
    $query->bindparam(':Full_name', $Full_name);
    $query->bindparam(':Tob', $Tob);
    $query->bindparam(':Gender', $Gender);
    $query->bindparam(':Pob', $Pob);
    $query->bindparam(':Fname', $Fname);
    $query->bindparam(':Mname', $Mname);
    $query->bindparam(':usr_id', $Usr_ID);
    if ($query->execute())
    {
        echo"<script>alert('Record Successfully Updated');</script>";
        echo"<script>window.location.href = 'viewbirths.php'</script>";
    }
}


//function that deletes birth records in the DB

 public function deleteBirthRecord($id)
 {
    $db = new DBconnection();
    $dbConn = $db->getConnection();
    $sql = "DELETE FROM birth_tbl WHERE birth_id=:birth_id";
    $query = $dbConn->prepare($sql);
    $query->bindparam(':birth_id', $id);
        if ($query->execute())
        {
            echo"<script>alert('Record Successfully Deleted');</script>";
            echo"<script>window.location.href = 'viewbirths.php'</script>";
        }
 }


 //function that gets all birth records

public function getBirthRecords()
{
    $db = new DBconnection();
    $dbConn = $db->getConnection();
    $sql = "SELECT birth_tbl.birth_id, birth_tbl.full_name, birth_tbl.birth_gender, 
    birth_tbl.time_of_birth, birth_tbl.place_of_birth, birth_tbl.fathers_fullname, 
    birth_tbl.mothers_fullname, birth_tbl.reg_date, users_tbl.fullname AS staff FROM
    `birth_tbl` INNER JOIN users_tbl ON users_tbl.user_id = birth_tbl.user_id ORDER BY birth_tbl.birth_id DESC";
    return $dbConn->query($sql);

}


//function that gets a single birth record

public function getBirthRecord($id)
{
    $db = new DBconnection();
    $dbConn = $db->getConnection();
    $sql = "SELECT birth_tbl.birth_id, birth_tbl.full_name, birth_tbl.birth_gender, 
    birth_tbl.time_of_birth, birth_tbl.place_of_birth, birth_tbl.fathers_fullname, 
    birth_tbl.mothers_fullname, birth_tbl.reg_date, users_tbl.fullname AS staff FROM
    `birth_tbl` INNER JOIN users_tbl ON users_tbl.user_id = birth_tbl.user_id
     WHERE birth_tbl.birth_id='$id' LIMIT 1";
    return $dbConn->query($sql);
}


public function exportBirthData()
{
    $db = new DBconnection();
    $dbConn = $db->getConnection();
    $sql = "SELECT birth_tbl.birth_id, birth_tbl.full_name, birth_tbl.birth_gender, 
    birth_tbl.time_of_birth, birth_tbl.place_of_birth, birth_tbl.fathers_fullname, 
    birth_tbl.mothers_fullname, birth_tbl.reg_date, users_tbl.fullname AS staff FROM
    `birth_tbl` INNER JOIN users_tbl ON users_tbl.user_id = birth_tbl.user_id";
    $resultset = $dbConn->query($sql);
    $developer_records = array();
    while( $rows = $resultset->fetch(PDO::FETCH_ASSOC)) 
    {
        $developer_records[] = $rows;
    }
    $filename = "birth_data_export_".date('Ymd') . ".xls";			
	header("Content-Type: application/vnd.ms-excel");
	header("Content-Disposition: attachment; filename=\"$filename\"");	
	$show_coloumn = false;
	if(!empty($developer_records)) {
	  foreach($developer_records as $record) {
		if(!$show_coloumn) {
		  // display field/column names in first row
		  echo implode("\t", array_keys($record)) . "\n";
		  $show_coloumn = true;
		}
		echo implode("\t", array_values($record)) . "\n";
	  }
	}
	exit;  
}

//------------------------BIRTH RELATED FUNCTIONS ENDS HERE-----------------------------------//




 //------------------------DECEASED RELATED FUNCTIONS START HERE------------------------------//

 

//function that inserts the deceased information into the DB

public function addDeathRecord($ID_Type, $ID, $Full_name, $Cod, $Gender, $Pod, $Dod, $Tod, $Pob, $Usr_ID)
{
    $db = new DBconnection();
    $dbConn = $db->getConnection();
    $sql = "INSERT INTO `deceased_tbl` VALUES (NULL, :Id_type, :Id_no, :Full_name, :Cod, :Gender, :Pod, :Dod, :Tod, :Pob, :usr_id)";
    $query = $dbConn->prepare($sql);
    $query->bindparam(':Id_type', $ID_Type);
    $query->bindparam(':Id_no', $ID);
    $query->bindparam(':Full_name', $Full_name);
    $query->bindparam(':Cod', $Cod);
    $query->bindparam(':Gender', $Gender);
    $query->bindparam(':Pod', $Pod);
    $query->bindparam(':Dod', $Dob);
    $query->bindparam(':Tod', $Tod);
    $query->bindparam(':Pob', $Pob);
    $query->bindparam(':usr_id', $Usr_ID);
    if ($query->execute())
    {
        echo"<script>alert('Record Successfully Added');</script>";
        echo"<script>window.location.href = 'viewdeaths.php'</script>";
    }
}


//function that edits the deceased information in the DB

public function editDeathRecord($DID, $ID_Type, $ID, $Full_name, $Cod, $Gender, $Pod, $Dod, $Tod, $Pob, $Usr_ID)
{
    $db = new DBconnection();
    $dbConn = $db->getConnection();
    $sql = "UPDATE `deceased_tbl` SET `national_id_type`=:Id_type, `national_id`=:Id_no,
     `name_of_deceased`=:Full_name, `cause_of_death`=:Cod,`gender_of_deceased`=:Gender,
     `place_of_death`=:Pod, `date_of_death`=:Dod, `time_of_death`=:Tod, `place_of_burial`=:Pob, 
     `user_id`=:usr_id WHERE `decease_id`=:DID";
    $query = $dbConn->prepare($sql);
    $query->bindparam(':DID', $DID);
    $query->bindparam(':Id_type', $ID_Type);
    $query->bindparam(':Id_no', $ID);
    $query->bindparam(':Full_name', $Full_name);
    $query->bindparam(':Cod', $Cod);
    $query->bindparam(':Gender', $Gender);
    $query->bindparam(':Pod', $Pod);
    $query->bindparam(':Dod', $Dob);
    $query->bindparam(':Tod', $Tod);
    $query->bindparam(':Pob', $Pob);
    $query->bindparam(':usr_id', $Usr_ID);
    if ($query->execute())
    {
        echo"<script>alert('Record Successfully Updated');</script>";
        echo"<script>window.location.href = 'viewdeaths.php'</script>";
    }
}


//function that deletes death records in the DB

public function deleteDeathRecord($id)
{
   $db = new DBconnection();
   $dbConn = $db->getConnection();
   $sql = "DELETE FROM deceased_tbl WHERE decease_id=:decease_id";
   $query = $dbConn->prepare($sql);
   $query->bindparam(':decease_id', $id);
       if ($query->execute())
       {
           echo"<script>alert('Record Successfully Deleted');</script>";
           echo"<script>window.location.href = 'viewdeaths.php'</script>";
       }
}


//function that gets deceased records

public function getDeceasedRecords()
{
    $db = new DBconnection();
    $dbConn = $db->getConnection();
    $sql = "SELECT deceased_tbl.decease_id, deceased_tbl.national_id_type, deceased_tbl.national_id, 
    deceased_tbl.name_of_deceased, deceased_tbl.cause_of_death, deceased_tbl.gender_of_deceased, 
    deceased_tbl.place_of_death, deceased_tbl.date_of_death, deceased_tbl.time_of_death, 
    deceased_tbl.place_of_burial, users_tbl.fullname AS staff FROM deceased_tbl 
    INNER JOIN users_tbl ON users_tbl.user_id = deceased_tbl.user_id ORDER BY deceased_tbl.decease_id DESC";
    return $dbConn->query($sql);
}


//function that gets a single death records

public function getDeathRecord($id)
{
    $db = new DBconnection();
    $dbConn = $db->getConnection();
    $sql = "SELECT deceased_tbl.decease_id, deceased_tbl.national_id_type, deceased_tbl.national_id, 
    deceased_tbl.name_of_deceased, deceased_tbl.cause_of_death, deceased_tbl.gender_of_deceased, 
    deceased_tbl.place_of_death, deceased_tbl.date_of_death, deceased_tbl.time_of_death, 
    deceased_tbl.place_of_burial, users_tbl.fullname AS staff FROM deceased_tbl 
    INNER JOIN users_tbl ON users_tbl.user_id = deceased_tbl.user_id WHERE deceased_tbl.decease_id='$id' LIMIT 1";
    return $dbConn->query($sql);
}


public function exportDeathData()
{
    $db = new DBconnection();
    $dbConn = $db->getConnection();
    $sql = "SELECT deceased_tbl.decease_id, deceased_tbl.national_id_type, deceased_tbl.national_id, 
    deceased_tbl.name_of_deceased, deceased_tbl.cause_of_death, deceased_tbl.gender_of_deceased, 
    deceased_tbl.place_of_death, deceased_tbl.date_of_death, deceased_tbl.time_of_death, 
    deceased_tbl.place_of_burial, users_tbl.fullname AS staff FROM deceased_tbl 
    INNER JOIN users_tbl ON users_tbl.user_id = deceased_tbl.user_id";
    $resultset = $dbConn->query($sql);
    $developer_records = array();
    while( $rows = $resultset->fetch(PDO::FETCH_ASSOC)) 
    {
        $developer_records[] = $rows;
    }
    $filename = "death_records_export_".date('Ymd') . ".xls";			
	header("Content-Type: application/vnd.ms-excel");
	header("Content-Disposition: attachment; filename=\"$filename\"");	
	$show_coloumn = false;
	if(!empty($developer_records)) {
	  foreach($developer_records as $record) {
		if(!$show_coloumn) {
		  // display field/column names in first row
		  echo implode("\t", array_keys($record)) . "\n";
		  $show_coloumn = true;
		}
		echo implode("\t", array_values($record)) . "\n";
	  }
	}
	exit;  

}


//------------------------DECEASED RELATED FUNCTIONS END HERE------------------------------//



//------------------------DNA RELATED FUNCTIONS START HERE---------------------------------//


//function that inserts the DNA information into the DB

public function addDnaRecord($Full_name, $Gender, $ID, $ID_Type, $Sample, $Sample_Details, $Usr_ID)
{
    $db = new DBconnection();
    $dbConn = $db->getConnection();
    $sql = "INSERT INTO `dna_tbl` VALUES (NULL, :Full_name, :Gender, :Id_type, :Id_no, :D_Sample, :Sample_Details, :usr_id)";
    $query = $dbConn->prepare($sql);
    $query->bindparam(':Full_name', $Full_name);
    $query->bindparam(':Gender', $Gender);
    $query->bindparam(':Id_no', $ID);
    $query->bindparam(':Id_type', $ID_Type);
    $query->bindparam(':D_Sample', $Sample);
    $query->bindparam(':Sample_Details', $Sample_Details);
    $query->bindparam(':usr_id', $Usr_ID);
    if ($query->execute())
    {
        echo"<script>alert('Record Successfully Added');</script>";
        echo"<script>window.location.href = 'dnasamples.php'</script>";
    }
}


//function that Updates the DNA information

public function editDnaRecord($Full_name, $Gender, $ID, $ID_Type, $Sample, $Sample_Details, $DNA_id)
{
    $db = new DBconnection();
    $dbConn = $db->getConnection();
    $sql = "UPDATE `dna_tbl` SET `collected_from`=:Full_name, `host_gender`=:Gender, `national_id`=:Id_no,
    `national_id_type`=:Id_type, `sample`=:D_Sample, `sample_details`=:Sample_Details WHERE `DNA_id`=:dna_id";
    $query = $dbConn->prepare($sql);
    $query->bindparam(':dna_id', $DNA_id);
    $query->bindparam(':Full_name', $Full_name);
    $query->bindparam(':Gender', $Gender);
    $query->bindparam(':Id_no', $ID);
    $query->bindparam(':Id_type', $ID_Type);
    $query->bindparam(':D_Sample', $Sample);
    $query->bindparam(':Sample_Details', $Sample_Details);
    if ($query->execute())
    {
        echo"<script>alert('Record Successfully Updated');</script>";
        echo"<script>window.location.href = 'dnasamples.php'</script>";
    }
}


//function that deletes death records in the DB

public function deleteDnaRecord($id)
{
   $db = new DBconnection();
   $dbConn = $db->getConnection();
   $sql = "DELETE FROM dna_tbl WHERE DNA_id=:DNA_id";
   $query = $dbConn->prepare($sql);
   $query->bindparam(':DNA_id', $id);
       if ($query->execute())
       {
           echo"<script>alert('Record Successfully Deleted');</script>";
           echo"<script>window.location.href = 'dnasamples.php'</script>";
       }
}


//function that gets Single DNA Sample

public function getDNA($id)
{
    $db = new DBconnection();
    $dbConn = $db->getConnection();
    $sql = "SELECT dna_tbl.DNA_id, dna_tbl.collected_from, dna_tbl.host_gender, 
    dna_tbl.national_id, dna_tbl.national_id_type,dna_tbl.sample, 
    dna_tbl.sample_details, users_tbl.fullname AS staff FROM dna_tbl 
    INNER JOIN users_tbl ON users_tbl.user_id = dna_tbl.user_id WHERE DNA_id='$id' LIMIT 1";;
    return $dbConn->query($sql);
}


//function that gets DNA Data

public function getDnaData()
{
    $db = new DBconnection();
    $dbConn = $db->getConnection();
    $sql = "SELECT dna_tbl.DNA_id, dna_tbl.collected_from, dna_tbl.host_gender, 
    dna_tbl.national_id, dna_tbl.national_id_type,dna_tbl.sample, 
    dna_tbl.sample_details, users_tbl.fullname AS staff FROM dna_tbl 
    INNER JOIN users_tbl ON users_tbl.user_id = dna_tbl.user_id ORDER BY DNA_id DESC";
    return $dbConn->query($sql);
}


public function exportDNAdata()
{
    $db = new DBconnection();
    $dbConn = $db->getConnection();
    $sql = "SELECT dna_tbl.DNA_id, dna_tbl.collected_from, dna_tbl.host_gender, 
    dna_tbl.national_id, dna_tbl.national_id_type,dna_tbl.sample, 
    dna_tbl.sample_details, users_tbl.fullname AS staff FROM dna_tbl 
    INNER JOIN users_tbl ON users_tbl.user_id = dna_tbl.user_id ORDER BY DNA_id DESC";
    $resultset = $dbConn->query($sql);
    $developer_records = array();
    while( $rows = $resultset->fetch(PDO::FETCH_ASSOC)) 
    {
        $developer_records[] = $rows;
    }
    $filename = "DNA_Data_export_".date('Ymd') . ".xls";			
	header("Content-Type: application/vnd.ms-excel");
	header("Content-Disposition: attachment; filename=\"$filename\"");	
	$show_coloumn = false;
	if(!empty($developer_records)) {
	  foreach($developer_records as $record) {
		if(!$show_coloumn) {
		  // display field/column names in first row
		  echo implode("\t", array_keys($record)) . "\n";
		  $show_coloumn = true;
		}
		echo implode("\t", array_values($record)) . "\n";
	  }
	}
	exit;  

}

//------------------------DNA RELATED FUNCTIONS END HERE---------------------------------//


}
?>