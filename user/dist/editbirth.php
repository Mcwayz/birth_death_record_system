<?php
session_start();
include "includes/dao.php";
include "includes/user_API.php";
include "includes/header.php";
include "includes/nav.php";
include "includes/DBConfig.php";

$View = new userAPI();

$id = intval($_GET['id']);
$records = $View->getBirthRecord($id);
$row = $records->fetch(PDO::FETCH_ASSOC);


if(isset($_POST['submit']))
{   $id = intval($_GET['id']);
    $user = intval($_SESSION['user']);
    $fname = $_POST['in_Fullname'];
    $tob = $_POST['in_TOB'];
    $gender = $_POST['in_Gender'];
    $pob = $_POST['in_POB'];
    $father = $_POST['in_Father'];
    $mother = $_POST['in_Mother'];
    $View->editBirthRecord($id, $fname, $tob, $gender, $pob, $father, $mother, $user); 
}
?>
 <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Edit Birth Details</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Birth</li>
                        </ol>
                       
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                <?=$row['full_name']?>'s Birth Record
                            </div>
                            <div class="card-body">
                                        <form method="POST">
                                        <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="in_Fullname">Fullname</label>
                                                        <input class="form-control" name="in_Fullname" id="in_Fullname" type="text" value="<?=$row['full_name']?>" />
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                  <div class="form-group">
                                                        <label class="small mb-1" for="in_faculty">Gender</label>
                                                        <select class="form-control" id='in_Gender' name='in_Gender' required>
                                                        <option value="<?=$row['birth_gender'] ?>"><?=$row['birth_gender']?></option>
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
                                                        <label class="small mb-1" for="in_TOB">Time of Birth</label>
                                                        <input class="form-control" name="in_TOB" id="in_TOB" type="Text" value="<?=$row['time_of_birth']?>"/>
                                                 </div>
                                                 </div>

                                                 <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="in_POB">Place of Birth</label>
                                                        <input class="form-control" name="in_POB"  id="in_POB" type="text" value="<?=$row['place_of_birth']?>" />
                                                    </div>
                                                 </div>
                                            </div>

                                            

                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="in_Father">Father's Fullname</label>
                                                        <input class="form-control" name="in_Father" id="in_Father" type="Text" value="<?=$row['fathers_fullname']?>" />
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                 <div class="form-group">
                                                        <label class="small mb-1" for="in_Mother">Mother's Fullname</label>
                                                        <input class="form-control" name="in_Mother" id="in_Mother" type="Text" value="<?=$row['mothers_fullname']?>" />
                                                 </div>
                                                 </div>
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