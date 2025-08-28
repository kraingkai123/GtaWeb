<?php
include("../include/header.php");
?>

<body>
    <!-- Left Panel -->
    <?php include("../include/sidebar-user.php"); ?>
    <!-- Left Panel -->
    <div id="right-panel" class="right-panel">
        <?php include("../include/navbar.php"); ?>
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>News</h1>
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
                    $response = news::listNews();
              
                    ?>
                      <a class="btn btn-primary" href="form_news.php" role="button">AddData</a>
                    <table id="table" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>
                                    <div align="center">No.</div>
                                </th>
                                <th>
                                    <div align="center">News Title</div>
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
                                    <td><?php echo $value['news_title'];?></td>
                                    <td>
                                       <a class="btn btn-primary" href="form_news.php?newsId=<?php echo $value['news_id'];?>" role="button">Edit</a>
                                        <button type="button" class="btn btn-danger" onclick="DeleteData('delete',<?php echo $value['news_id'];?>)">Deleted</button>
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
    function DeleteData(proc, id) {
        Swal.fire({
            title: "Confirm Delete Data",
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
                    url: './save/newsProc.php',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        proc: proc,
                        news_id: id
                    },
                    success: function(response) {
                        if (response.Status == true) {
                            Swal.fire({
                                title: "Delete data success",
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