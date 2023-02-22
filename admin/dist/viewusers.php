<?php
session_start();
include "includes/dao.php";
include "includes/user_API.php";
include "includes/header.php";
include "includes/nav.php";
include "includes/DBConfig.php";

$User = new userAPI();
$records = $User->getUsers();

if(isset($_GET['del']))
{
    $id=intval($_GET['del']);
    $User->deleteUser($id);
}
?>

<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">User Records</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">System Users</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                The Data Table is a summary of all System Users that are present in the system database, please keep in mind that all operations performed cannot be reversed.
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Users Data Table
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>User ID</th>
                                                <th>Fullname</th>
                                                <th>Email Address</th>
                                                <th>System Role</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>User ID</th>
                                                <th>Fullname</th>
                                                <th>Email Address</th>
                                                <th>System Role</th>
                                                <th>Actions</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        <?php while ($row = $records->fetch(PDO::FETCH_ASSOC)){?>
                                            <tr>
                                                <td><?=$row['user_id']?></td>
                                                <td><?=$row['fullname']?></td>
                                                <td><?=$row['user_email']?></td>
                                                <td><?=$row['user_role']?></td>
                                                <td>
                                                    <a title="View" href="viewuser.php?id=<?=$row['user_id']?>"  class=" btn-sm btn-success">View</a>
                                                    <a title="Edit" href="edituser.php?id=<?=$row['user_id']?>"  class=" btn-sm btn-warning">Edit</a>
                                                    <a title="Delete" href="viewusers.php?del=<?=$row['user_id']?>" class="btn-sm delete btn-danger">Delete</a>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
<?php include 'includes/footer.php';?>