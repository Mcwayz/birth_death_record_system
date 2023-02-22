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
    $id_type = $_POST['in_ID'];
    $id_no = $_POST['in_No'];
    $fname = $_POST['in_Fname'];
    $cod = $_POST['in_COD'];
    $gender = $_POST['in_Gender'];
    $pod = $_POST['in_POD'];
    $dod = null;
    $tod = $_POST['in_TOD'];
    $burial = $_POST['in_BP'];

    $db = new DBconnection();
    $dbConn = $db->getConnection();
    $sql ="SELECT * FROM deceased_tbl WHERE national_id ='$id_no' AND national_id_type='$id_type'";
    $query = $dbConn->query($sql);
      if ($query->rowCount() >= 1)
        {
            echo"<script>alert('Record Already in Exists');</script>";
        }
        else
        {
            $user->addDeathRecord($id_type, $id_no, $fname, $cod, $gender, $pod, $dod, $tod, $burial, $id); 
        }
}
?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Deceased Person's Details</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Death Record</li>
                        </ol>
                       
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Add New Death Record
                            </div>
                            <div class="card-body">
                                        <form method="POST">
                                        <div class="form-row">
                                        <div class="col-md-6">
                                                  <div class="form-group">
                                                        <label class="small mb-1" for="in_ID">National ID</label>
                                                        <select class="form-control" id='in_ID' name='in_ID' required>
                                                            <option value="">- Select ID -</option>
                                                            <option value="NRC">NRC</option> 
                                                            <option value="Driving License">Driving License</option>
                                                            <option value="Birth Certificate">Birth Certificate</option>
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
                                                        <label class="small mb-1" for="in_Fname">Fullname</label>
                                                        <input class="form-control" name="in_Fname" id="in_Fname" type="text" placeholder="Enter fullname" />
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="in_COD">Cause of Death</label>
                                                        <input class="form-control" name="in_COD" id="in_COD" type="text"/>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-row">
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

                                                <div class="col-md-6">
                                                 <div class="form-group">
                                                    <label class="small mb-1" for="in_POD">Place of Death</label>
                                                    <input class="form-control" name="in_POD"  id="in_POD" type="text" placeholder="E.g.. Lusaka Levy Hospital" />
                                                 </div>
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="col-md-6">
                                                 <div class="form-group">
                                                    <label class="small mb-1" for="in_Time">Date / Time of Death</label>
                                                    <input class="form-control" name="in_TOD" id="in_TOD" type="datetime-local"/>
                                                 </div>
                                                </div>

                                                <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="in_BP">Burial Place</label>
                                                    <input class="form-control" name="in_BP" id="in_BP" type="Text" placeholder="E.g.. Leopards Hill" />
                                                </div>
                                                </div>
                                            </div>

                                                <div class="form-group">
                                                    <input class="btn btn-secondary" id="submit" type="submit" name="submit" value="Add Record">
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
