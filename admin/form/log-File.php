<?php
include("../include/header.php");
?>

<body>
    <!-- Left Panel -->
    <?php include("../include/sidebar.php"); ?>
    <!-- Left Panel -->
    <div id="right-panel" class="right-panel">
        <?php include("../include/navbar.php"); ?>
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>LOG SEVER</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
            </div>
        </div>
        <div class="content mt-3">

            <div class="card">
                <div class="card-body">

                    <?php
                    $response = fileLog::getDir();
                    ?>

                    <table id="table" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>
                                    <div align="center">ลำดับ</div>
                                </th>
                                <th>
                                    <div align="center">ชื่อผู้ใช้งาน</div>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($response as $key => $value) {
                            ?>


                                <tr>
                                    <td align="center"><?php echo $i; ?></td>
                                    <td><a href="<?php echo $value['file_path'];?>" target="_blank" rel=""><?php echo $value['field_name'];?></a></td>
                                </tr>
                            <?php
                                $i++;
                            }
                            ?>

                        </tbody>
                    </table>

                    <!--/.row-->

                </div>


            </div>
        </div> <!-- .content -->
    </div>
    <?php include("../include/footer.php"); ?>
</body>

</html>
<script>
    $(document).ready(function() {
        LoadDatatable('table');
    });
</script>