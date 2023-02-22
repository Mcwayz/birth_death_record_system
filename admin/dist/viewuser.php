<?php
session_start();
include "includes/dao.php";
include "includes/user_API.php";
include "includes/header.php";
include "includes/nav.php";
include "includes/DBConfig.php";

$View = new userAPI();

$id = intval($_GET['id']);
$Profile = $View->getUser($id);
$row = $Profile->fetch(PDO::FETCH_ASSOC);

?>
 <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Profile Details</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Profile Details</li>
                        </ol>
                       
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                <?=$row['fullname']?>'s User Profile
                            </div>
                            <div class="card-body">
                                        <form method="POST">
                                        <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="in_Fullname">Fullname</label>
                                                        <input class="form-control" name="in_Fullname" id="in_Fullname" type="text" value="<?=$row['fullname']?>" disabled/>
                                                    </div>
                                                </div>


                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="in_POB">User Email</label>
                                                        <input class="form-control" name="in_Email"  id="in_Email" type="text" value="<?=$row['user_email']?>" disabled/>
                                                    </div>
                                                 </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="col-md-6">
                                                  <div class="form-group">
                                                        <label class="small mb-1" for="in_faculty">User Role</label>
                                                        <select class="form-control" id='in_Role' name='in_Role' disabled>
                                                        <option value="<?=$row['user_role'] ?>"><?=$row['user_role']?></option>
                                                            <option value="">- Select Role -</option>
                                                            <option value="user">User</option> 
                                                            <option value="admin">Administrator</option>
                                                        </select>
                                                    </div>
                                                </div>

                                              <div class="col-md-6">
                                                <div class="form-group">
                                                        <label class="small mb-1" for="in_Father">Password</label>
                                                        <input class="form-control" name="in_Pass" id="in_Pass" type="Text" value="<?=$row['user_password']?>" disabled/>
                                                    </div>
                                             </div>
                                                 
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
