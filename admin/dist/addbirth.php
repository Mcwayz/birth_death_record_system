<?php
session_start();
include "includes/dao.php";
include "includes/header.php";
include "includes/nav.php";
include "includes/DBConfig.php";
include "includes/user_API.php";

$user = new userAPI();

if(isset($_POST['submit']))
{  
    $id = intval($_SESSION['user']);
    $fname = $_POST['in_Fname'];
    $tob = $_POST['in_TOB'];
    $gender = $_POST['in_Gender'];
    $pob = $_POST['in_POB'];
    $father = $_POST['in_Father'];
    $mother = $_POST['in_Mother'];
    $rd = date('d-M-Y');
    $user->addBirthRecord($fname, $tob, $gender, $pob, $father, $mother, $rd, $id);
}
?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Birth Details</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Add Birth</li>
                        </ol>
                       
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Add New Birth Record
                            </div>
                            <div class="card-body">
                                    <form method="post">
                                         <div class="form-row">
                                             <div class="col-md-6">
                                              <div class="form-group">
                                                 <label class="small mb-1" for="in_Fname">Fullname</label>
                                                 <input class="form-control" name="in_Fname" id="in_Fname" type="text" placeholder="Enter fullname" />
                                              </div>
                                             </div>

                                             <div class="col-md-6">
                                                  <div class="form-group">
                                                        <label class="small mb-1" for="in_Gender">Gender</label>
                                                        <select class="form-control" id='in_Gender' name='in_Gender' required>
                                                            <option value="Other">- Select Gender -</option>
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
                                                    <label class="small mb-1" for="in_Pob">Place of Birth</label>
                                                    <input class="form-control" name="in_POB"  id="in_POB" type="text" placeholder="E.g.. Lusaka Levy Hospital" />
                                                </div>
                                              </div>

                                                <div class="col-md-6">
                                                 <div class="form-group">
                                                        <label class="small mb-1" for="in_Time">Date / Time of Birth</label>
                                                        <input class="form-control" name="in_TOB" id="in_TOB"  type="datetime-local"/>
                                                 </div>
                                                 </div>
                                            </div>

                                            

                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="in_Father">Father's Fullname</label>
                                                        <input class="form-control" name="in_Father" id="in_Father" type="Text" placeholder="E.g.. John Doe" />
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                 <div class="form-group">
                                                        <label class="small mb-1" for="in_Mother">Mother's Fullname</label>
                                                        <input class="form-control" name="in_Mother" id="in_Mother" type="Text" placeholder="E.g.. Jane Doe" />
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
