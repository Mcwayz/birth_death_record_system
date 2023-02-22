<?php
session_start();
include "includes/dao.php";
include 'includes/header.php';
include 'includes/nav.php';
include 'includes/DBConfig.php';


?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <div class="row">

                            <div class="col-xl-3 col-md-6">
                            <?php
                                $sql = "Select Count(*)AS Birth From birth_tbl";
                                $result = mysqli_query($mysqli,$sql);
                                $row = $result->fetch_row();
                                                        {?>
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Births' Recorded</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="viewbirths.php"><?php echo $row[0];?></a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                                <?php }  ?>
                            </div>

                            <div class="col-xl-3 col-md-6">
                            <?php
                                $sql = "Select Count(*)AS Users From users_tbl WHERE user_role ='user'";
                                $result = mysqli_query($mysqli,$sql);
                                $row = $result->fetch_row();
                                                        {?>
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">System Users</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="viewusers.php"><?php echo $row[0];?></a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                                <?php }  ?>
                            </div>

                            <div class="col-xl-3 col-md-6">
                            <?php
                                $sql = "Select Count(*)AS DNA From dna_tbl";
                                $result = mysqli_query($mysqli,$sql);
                                $row = $result->fetch_row();
                                                    {?>
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">DNA Samples Recorded</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="dnasamples.php"><?php echo $row[0];?></a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                                <?php }  ?>
                            </div>

                            <div class="col-xl-3 col-md-6">
                            <?php
                                $sql = "Select Count(*)AS DNA From deceased_tbl";
                                $result = mysqli_query($mysqli,$sql);
                                $row = $result->fetch_row();
                                                        {?>
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">Deaths Recorded</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="viewdeaths.php"><?php echo $row[0];?></a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                                <?php }  ?>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-area mr-1"></i>
                                        Area Chart
                                    </div>
                                    <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>

                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-bar mr-1"></i>
                                        Bar Chart
                                    </div>
                                    <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>

                        </div>
                        
                        
                    </div>
                </main>
<?php
include 'includes/footer.php';
?>