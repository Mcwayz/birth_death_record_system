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

?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Birth Details</h1>
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
                                        <form>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="in_Fullname">Fullname</label>
                                                        <input class="form-control" name="in_Fullname" id="in_Fullname" type="text" value="<?=$row['full_name']?>" disabled/>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                  <div class="form-group">
                                                        <label class="small mb-1" for="in_faculty">Gender</label>
                                                        <select class="form-control" id='in_gender' name='in_gender' disabled>
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
                                                    <label class="small mb-1" for="in_Pob">Place of Birth</label>
                                                    <input class="form-control" name="in_Pob"  id="in_Pob" type="text" value="<?=$row['place_of_birth']?>" disabled />
                                                </div>
                                            </div>

                                                <div class="col-md-6">
                                                 <div class="form-group">
                                                        <label class="small mb-1" for="inputTime">Time of Birth</label>
                                                        <input class="form-control" id="in_TOB" type="Text" value="<?=$row['time_of_birth']?>" disabled/>
                                                 </div>
                                                 </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="in_Father">Father's Fullname</label>
                                                        <input class="form-control" id="in_Father" type="Text" value="<?=$row['fathers_fullname']?>" disabled/>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                 <div class="form-group">
                                                        <label class="small mb-1" for="in_Mother">Mother's Fullname</label>
                                                        <input class="form-control" id="in_Mother" type="Text" value="<?=$row['mothers_fullname']?>" disabled/>
                                                 </div>
                                                 </div>
                                            </div>
                                            <div class="form-group">
                                                        <label class="small mb-1" for="in_Mother">Registered By</label>
                                                        <input class="form-control" id="in_Mother" type="Text" value="<?=$row['staff']?>" disabled/>
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