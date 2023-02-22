<?php
session_start();
include "includes/dao.php";
include "includes/user_API.php";
include "includes/header.php";
include "includes/nav.php";
include "includes/DBConfig.php";

$DNA = new userAPI();
$records = $DNA->getDnaData();

if(isset($_GET['del']))
{
    $id=intval($_GET['del']);
    $DNA->deleteDnaRecord($id);
}

if(isset($_POST['submit']))
{
    $DNA->exportDNAdata();
}
?>

<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">DNA Records</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">DNA Sample Records</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                The Data Table is a summary of DNA Samples that are present in the system database, please keep in mind that all operations performed cannot be reversed. 
                                For Data Extraction Click <a target="_blank" href="#">"Extract All DNA Records in Excel"</a>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                DNA Data Table
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>DNA Host Name</th>
                                                <th>Host Gender</th>
                                                <th>ID</th>
                                                <th>ID No</th>
                                                <th>DNA Sample</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>DNA Host Name</th>
                                                <th>Host Gender</th>
                                                <th>ID</th>
                                                <th>ID No</th>
                                                <th>DNA Sample</th>
                                                <th>Actions</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        <?php while ($row = $records->fetch(PDO::FETCH_ASSOC)){?>
                                            <tr>
                                                <td><?=$row['collected_from']?></td>
                                                <td><?=$row['host_gender']?></td>
                                                <td><?=$row['national_id_type']?></td>
                                                <td><?=$row['national_id']?></td>
                                                <td><?=$row['sample']?></td>
                                                <td>
                                                    <a title="View" href="viewdna.php?id=<?=$row['DNA_id']?>"  class=" btn-sm btn-success">View</a>
                                                    <a title="Delete" href="dnasamples.php?del=<?=$row['DNA_id']?>" class="btn-sm delete btn-danger">Del</a>
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