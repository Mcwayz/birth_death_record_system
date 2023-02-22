<?php
session_start();
include "includes/dao.php";
include "includes/user_API.php";
include "includes/header.php";
include "includes/nav.php";
include "includes/DBConfig.php";

$Birth = new userAPI();
$records = $Birth->getBirthRecords();

if(isset($_GET['del']))
{
    $id=intval($_GET['del']);
    $Birth->deleteBirthRecord($id);
}
if(isset($_POST['submit']))
{
    $Birth->exportBirthData();
}
?>

<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Birth Records</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Birth Records</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                The Data Table is a summary of birth records that are present in the system, Note that all operations performed cannot be reversed.
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Birth Data Table
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Birth Name</th>
                                                <th>Gender</th>
                                                <th>DOB</th>
                                                <th>Father</th>
                                                <th>Mother</th>
                                                <th>Registered By</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>No</th>
                                                <th>Birth Name</th>
                                                <th>Gender</th>
                                                <th>DOB</th>
                                                <th>Father</th>
                                                <th>Mother</th>
                                                <th>Registered By</th>
                                                <th>Actions</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        <?php while ($row = $records->fetch(PDO::FETCH_ASSOC)){?>
                                            <tr>
                                                <td><?=$row['birth_id']?></td>
                                                <td><?=$row['full_name']?></td>
                                                <td><?=$row['birth_gender']?></td>
                                                <td><?=$row['time_of_birth']?></td>
                                                <td><?=$row['fathers_fullname']?></td>
                                                <td><?=$row['mothers_fullname']?></td>
                                                <td><?=$row['staff']?></td>
                                                <td>
                                                    <a title="View" href="viewbirth.php?id=<?=$row['birth_id']?>"  class=" btn-sm btn-success">View</a>
                                                    <a title="Edit" href="editbirth.php?id=<?=$row['birth_id']?>"  class=" btn-sm btn-warning">Edit</a>
                                                    <a title="Delete" href="viewbirths.php?del=<?=$row['birth_id']?>" class="btn-sm delete btn-danger">Delete</a>
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