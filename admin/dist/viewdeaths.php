<?php
session_start();
include "includes/dao.php";
include "includes/user_API.php";
include "includes/header.php";
include "includes/nav.php";
include "includes/DBConfig.php";

$Death = new userAPI();
$records = $Death->getDeceasedRecords();

if(isset($_GET['del']))
{
    $id=intval($_GET['del']);
    $Death->deleteDeathRecord($id);
}

if(isset($_POST['submit']))
{
    $Death->exportDeathData();
}

?>

<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Death Records</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Death Records</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                The Data Table is a summary of death records that are present in the system database, Note that all Delete operations performed cannot be reversed.
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Deceased Data Table
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Gender</th>
                                                <th>Cause</th>
                                                <th>Death Place</th>
                                                <th>D.O.D</th>
                                                <th>Doctor</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>

                                                <th>Name</th>
                                                <th>Gender</th>
                                                <th>Cause</th>
                                                <th>Death Place</th>
                                                <th>D.O.D</th>
                                                <th>Doctor</th>
                                                <th>Actions</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        <?php while ($row = $records->fetch(PDO::FETCH_ASSOC)){?>
                                            <tr>
                                                <td><?=$row['name_of_deceased']?></td>
                                                <td><?=$row['gender_of_deceased']?></td>
                                                <td><?=$row['cause_of_death']?></td>
                                                <td><?=$row['place_of_death']?></td>
                                                <td><?=$row['time_of_death']?></td>
                                                <td><?=$row['staff']?></td>
                                                <td>
                                                    <a title="View" href="viewdeath.php?id=<?=$row['decease_id']?>"  class=" btn-sm btn-success">View</a>
                                                    <a title="Edit" href="editdeath.php?id=<?=$row['decease_id']?>"  class=" btn-sm btn-warning">Edit</a>
                                                    <a title="Del" href="viewdeaths.php?del=<?=$row['decease_id']?>" onclick="return confirm("Do you want to delete");" class="btn-sm delete btn-danger">Del</a>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                    <form method="POST"><input class=" btn-sm btn-success" id="submit" type="submit" name="submit" value="Export All Data"></form>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
<?php include 'includes/footer.php';?>