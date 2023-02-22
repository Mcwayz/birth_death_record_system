<?php
session_start();
include "includes/dao.php";
include "includes/user_API.php";
include "includes/header.php";
include "includes/nav.php";
include "includes/DBConfig.php";

$user = new userAPI();

if(isset($_POST['submit']))
{   
    $id = intval($_SESSION['user']);
    $fname = $_POST['in_Fname'];
    $gender = $_POST['in_Gender'];
    $id_no = $_POST['in_No'];
    $id_type = $_POST['in_ID'];
    $sample = $_POST['in_Sample'];
    $sample_details = $_POST['in_Details'];
    $user->addDnaRecord($fname, $gender, $id_type, $id_no, $sample, $sample_details, $id); 
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
                                Add DNA Sample
                            </div>
                            <div class="card-body">
                                        <form method="POST">
                                        <div class="form-row">
                                            <div class="col-md-6">
                                              <div class="form-group">
                                                 <label class="small mb-1" for="in_Fname">Person's Fullname</label>
                                                 <input class="form-control" name="in_Fname" id="in_Fname" type="text" placeholder="Enter fullname" />
                                              </div>
                                            </div>
                                            <div class="col-md-6">
                                                  <div class="form-group">
                                                        <label class="small mb-1" for="in_Gender">Gender</label>
                                                        <select class="form-control" id='in_Gender' name='in_Gender' required>
                                                            <option value="">- Select Gender -</option>
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
                                                            <option value="">- Select ID -</option>
                                                            <option value="NRC">NRC</option> 
                                                            <option value="Driving License">Driving License</option>
                                                            <option value="Birth Certificate">Birth Certificate Number</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="in_No">ID Number</label>
                                                        <input class="form-control" name="in_No" id="in_No" type="text" placeholder="E.G.. NRC Number..." />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-row">
                                              <div class="col-md-6">
                                              <div class="form-group">
                                                        <label class="small mb-1" for="in_Sample">DNA Sample</label>
                                                        <input class="form-control" name="in_Sample" id="in_Sample" type="text" placeholder="E.G.. Saliva, Hair.." />
                                                    </div>
                                             </div>

                                            <div class="col-md-6">
                                              <div class="form-group">
                                                <label class="small mb-1" for="in_POD">Sample Details</label>
                                                <input class="form-control" name="in_Details"  id="in_Details" type="text" placeholder="DNA Sample Details" />
                                              </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input class="btn btn-secondary" id="submit" type="submit" name="submit" value="Add Sample">
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
<?php include 'includes/footer.php'; ?>
 
