<?php
session_start();
include "includes/dao.php";
include "includes/user_API.php";
include "includes/header.php";
include "includes/nav.php";
include "includes/DBConfig.php";

$DNA = new userAPI();

$id = intval($_GET['id']);
$records = $DNA->getDNA($id);
$row = $records->fetch(PDO::FETCH_ASSOC);

if(isset($_POST['submit']))
{   
    $id = intval($_GET['id']);
    $fname = $_POST['in_Fname'];
    $gender = $_POST['in_Gender'];
    $id_no = $_POST['in_No'];
    $id_type = $_POST['in_ID'];
    $sample = $_POST['in_Sample'];
    $sample_details = $_POST['in_Details'];
    $DNA->editDnaRecord($fname, $gender, $id_type, $id_no, $sample, $sample_details, $id); 
}
?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">DNA Sample Details</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">DNA Sample Record</li>
                        </ol>
                       
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                DNA Sample
                            </div>
                            <div class="card-body">
                                        <form method="POST">
                                        <div class="form-row">
                                            <div class="col-md-6">
                                              <div class="form-group">
                                                 <label class="small mb-1" for="in_Fname">Person's Fullname</label>
                                                 <input class="form-control" name="in_Fname" id="in_Fname" value="<?=$row['collected_from']?>" type="text" placeholder="Enter fullname" />
                                              </div>
                                            </div>
                                            <div class="col-md-6">
                                                  <div class="form-group">
                                                        <label class="small mb-1" for="in_faculty">Gender</label>
                                                        <select class="form-control" id='in_Gender' name='in_Gender' required>
                                                        <option value="<?=$row['host_gender']?>"><?=$row['host_gender']?></option> 
                                                            <option value="Male">Male</option> 
                                                            <option value="Female">Female</option>
                                                            <option value="Other">Other</option>
                                                        </select>
                                                   </div>
                                                </div>
                                            </div>
                                        
                                       
                                        <div class="form-row">
                                        <div class="col-md-6">
                                                  <div class="form-group">
                                                        <label class="small mb-1" for="in_ID">National ID</label>
                                                        <select class="form-control" id='in_ID' name='in_ID' required>
                                                        <option value="<?=$row['national_id_type']?>"><?=$row['national_id_type']?></option>
                                                            <option value="NRC">NRC</option> 
                                                            <option value="Driving License">Driving License</option>
                                                            <option value="Birth Certificate">Birth Certificate Number</option>
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
                                                        <label class="small mb-1" for="in_Sample">DNA Sample</label>
                                                        <input class="form-control" name="in_Sample" id="in_Sample" value="<?=$row['sample']?>" type="text" placeholder="E.G.. Saliva, Hair.." />
                                                    </div>
                                             </div>

                                            <div class="col-md-6">
                                              <div class="form-group">
                                                <label class="small mb-1" for="in_POD">Sample Details</label>
                                                <input class="form-control" name="in_Details"  id="in_Details" value="<?=$row['sample_details']?>" type="text" placeholder="DNA Sample Details" />
                                              </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="small mb-1" for="in_POD">Recorded By</label>
                                            <input class="form-control" name="in_RB"  id="in_RB" value="<?=$row['staff']?>" type="text" placeholder="Staff Name" disabled/>
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