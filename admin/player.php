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
                        <h1>Ban List</h1>
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
                    $response = Character::listChacter();
                    $i = 1;

                    ?>

                    <table id="table" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>
                                    <div align="center">No.</div>
                                </th>
                                <th>
                                    <div align="center">Player Name</div>
                                </th>
                                <th>
                                    <div align="center">Status</div>
                                </th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($response as $key => $value) {
                            ?>


                                <tr>
                                    <td align="center"><?php echo $i; ?></td>
                                    <td><?php echo $value['playerName']; ?></td>
                                    <td><?php echo $value['playerBanned'] =='0' ? "Active": "Banned"; ?></td>

                                    <td>
                                        <button type="button" class="btn <?php echo  $value['playerBanned'] ==0 ? "btn-danger" : "btn-success" ;?>" onclick="updateStatus('update',<?php echo $value['playerID']; ?>,'<?php echo $value['playerBanned']; ?>')"><?php echo  $value['playerBanned'] ==0 ? "Banned" : "Active" ;?></button>
                                    </td>
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

    function updateStatus(proc, id, status) {
        Swal.fire({
            title: "Update Status Player",
            text: "",
            icon: "question",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "yes, delete it!",
            cancelButtonText: "cancel"
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: './save/CharacterProc.php',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        proc: proc,
                        playerId: id,
                        status: status
                    },
                    success: function(response) {
                        if (response.Status == true) {
                            Swal.fire({
                                title: "Update data success",
                                text: "",
                                icon: "success"
                            }).then(() => {
                                location.reload();
                            });
                        } else {
                            Swal.fire({
                                title: "Error deleting data",
                                text: response.message,
                                icon: "error"
                            });
                        }
                    },
                    error: function() {
                        Swal.fire({
                            title: "Error",
                            text: "An error occurred while processing your request.",
                            icon: "error"
                        });
                    }
                });
            }
        });
    }
</script>