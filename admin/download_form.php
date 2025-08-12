<?php
include("../include/header.php");
if (!empty($_GET['downloadId'])) {
    $downloadId = $_GET['downloadId'];
    $response = Download::getDataDownload($downloadId);
    if ($response) {
        $download_name = $response['download_name'];
        $download_link = $response['download_link'];
        $download_detail = $response['download_detail'];
        $proc = "edit";
    } else {
        header("Location: download.php");
    }
}
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
                        <h1>Add Download</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
            </div>
        </div>
        <div class="content mt-3">
            <div class="card">
                <div class="card-body">
                    <form id="FrmDownload" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="proc" id="proc" value="<?php echo isset($proc) ? $proc : 'add'; ?>">
                        <input type="hidden" name="download_id" id="download_id" value="<?php echo isset($downloadId) ? $downloadId : ''; ?>">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Download Name</label>
                            <input type="text" class="form-control" id="download_name" placeholder="Enter download name" name="download_name" aria-required="true" alert="Please enter download name" value="<?php echo isset($download_name) ? $download_name : ''; ?>" required>

                        </div>
                        <div class="mb-3">
                            <label for="download_detail" class="form-label">Detail Download</label>
                            <textarea class="form-control" id="download_detail" name="download_detail" rows="10"><?php echo $download_detail ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="download_link" class="form-label">Download Link</label>
                            <textarea class="form-control" id="download_link" name="download_link" rows="10"><?php echo $download_link ?></textarea>
                        </div>
                        <div>
                            <center>
                                <button type="submit" class="btn btn-success">SaveData</button>
                            </center>
                        </div>
                    </form>
                </div>
            </div>
        </div> <!-- .content -->
    </div>
    <?php include("../include/footer.php"); ?>
</body>

</html>
<script>
    $(document).ready(function() {
        $('#FrmDownload').on('submit', function(e) {
            e.preventDefault(); // Prevent the form from submitting the traditional way

            var formData = $('#FrmDownload').serialize();
            var error = 0;
            $(".form-control").each(function(index) {
                if ($(this).attr("aria-required") == "true") {
                    if ($(this).val() == "") {
                        Swal.fire({
                            title: $(this).attr('alert'),
                            text: "",
                            icon: "error",
                            confirmButtonText: "ok",
                        });
                        error++
                        return false;
                    }
                }
            });
            if (error == 0) {

                Swal.fire({
                    title: "Confirm Save Data",
                    text: "",
                    icon: "question",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "yes, save it!",
                    cancelButtonText: "cancel"
                }).then((result) => {
                    if (result.isConfirmed) {


                        $.ajax({
                            type: "POST",
                            url: './save/DownloadProc.php',
                            data: formData,
                            //async: false,
                           /*  cache: false,
                            contentType: false,
                            processData: false, */
                            dataType: 'json',
                            beforeSend: function() {
                                showLoadingPage()
                            },
                            success: function(response) {
                                if (response.Status == true) {
                                    swal.close();
                                    location.href = "download.php";
                                    Swal.fire({
                                        title: "save data success",
                                        text: "",
                                        icon: "success"
                                    });
                                } else {
                                    Swal.fire({
                                        title: "error",
                                        text: "",
                                        icon: "error"
                                    });
                                }
                            }
                        });
                    } else if (
                        result.dismiss === Swal.DismissReason.cancel
                    ) {
                        swal.close()
                    }


                });

            }
        });
    });
</script>