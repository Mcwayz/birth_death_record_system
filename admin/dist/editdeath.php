<?php
session_start();
include "includes/dao.php";
include "includes/user_API.php";
include "includes/header.php";
include "includes/nav.php";
include "includes/DBConfig.php";

$id = intval($_GET['id']);
$record = new userAPI();
$death = $record->getDeathRecord($id);
$row = $death->fetch(PDO::FETCH_ASSOC);

if(isset($_POST['submit']))
{   
    $id = intval($_SESSION['user']);
    $DID = intval($_GET['id']);
    $id_type = $_POST['in_ID'];
    $id_no = $_POST['in_No'];
    $fname = $_POST['in_Fname'];
    $cod = $_POST['in_COD'];
    $gender = $_POST['in_Gender'];
    $pod = $_POST['in_POD'];
    $dod = null;
    $tod = $_POST['in_TOD'];
    $burial = $_POST['in_BP'];
    $record->editDeathRecord($DID, $id_type, $id_no, $fname, $cod, $gender, $pod, $dod, $tod, $burial, $id); 
}
?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Update Deceased Person's Details</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Death Record</li>
                        </ol>
                       
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Edit Death Record
                            </div>
                            <div class="card-body">
                                        <form method="POST">
                                        <div class="form-row">
                                        <div class="col-md-6">
                                                  <div class="form-group">
                                                        <label class="small mb-1" for="in_ID">National ID</label>
                                                        <select class="form-control" id='in_ID' name='in_ID' required>
                                                            <option value="<?=$row['national_id_type']?>"><?=$row['national_id_type']?></option>
                                                            <option value="NRC">NRC</option> 
                                                            <option value="Driving License">Driving License</option>
                                                            <option value="Birth Certificate">Birth Certificate</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="in_No">ID Number</label>
                                                        <input class="form-control" name="in_No" id="in_No" value="<?=$row['national_id']?>" type="text" placeholder="E.G.. NRC Number..." />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="in_Fname">Fullname</label>
                                                        <input class="form-control" name="in_Fname" id="in_Fname" value="<?=$row['name_of_deceased']?>" type="text" placeholder="Enter fullname" />
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="in_COD">Cause of Death</label>
                                                        <input class="form-control" name="in_COD" id="in_COD" value="<?=$row['cause_of_death']?>" type="text"/>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-row">
                                              <div class="col-md-6">
                                                  <div class="form-group">
                                                        <label class="small mb-1" for="in_faculty">Gender</label>
                                                        <select class="form-control" id='in_Gender' name='in_Gender' required>
                                                            <option value="<?=$row['gender_of_deceased']?>"><?=$row['gender_of_deceased']?></option> 
                                                            <option value="Male">Male</option> 
                                                            <option value="Female">Female</option>
                                                            <option value="Other">Other</option>
                                                        </select>
                                                   </div>
                                             </div>

                                            <div class="col-md-6">
                                              <div class="form-group">
                                                <label class="small mb-1" for="in_POD">Place of Death</label>
                                                <input class="form-control" name="in_POD"  id="in_POD" value="<?=$row['place_of_death']?>" type="text" />
                                              </div>
                                            </div>
                                        </div>

                                            <div class="form-row">
                                                <div class="col-md-6">
                                                 <div class="form-group">
                                                        <label class="small mb-1" for="in_Time">Date / Time of Death</label>
                                                        <input class="form-control" name="in_TOD" id="in_TOD" value="<?=$row['time_of_death']?>" type="datetime-local"/>
                                                 </div>
                                                 </div>

                                                 <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="in_BP">Burial Place</label>
                                                        <input class="form-control" name="in_BP" id="in_BP" value="<?=$row['place_of_burial']?>" type="Text"/>
                                                    </div>
                                                </div>
                                            </div>

                                            
                                                <div class="form-group">
                                                    <label class="small mb-1" for="in_BP">Registered By</label>
                                                    <input class="form-control" name="in_RB" id="in_RB" value="<?=$row['staff']?>" type="Text" disabled/>
                                                </div>
                                    

                                            <div class="form-group">
                                                    <input class="btn btn-secondary" id="submit" type="submit" name="submit" value="Update Record">
                                                </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
<?php
include 'includes/footer.php';
?>
