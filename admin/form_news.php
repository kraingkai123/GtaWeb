<?php
include("../include/header.php");
if (!empty($_GET['newsId'])) {
    $newsId = $_GET['newsId'];
    $response = news::getDataNews($newsId);
    if ($response) {
        $news_title = $response['news_title'];
        $detail_news = $response['detail_news'];
        $news_image = $response['news_image'];
        $proc = "edit";
    } else {
        header("Location: news.php");
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
                        <h1>Add News</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
            </div>
        </div>
        <div class="content mt-3">
            <div class="card">
                <div class="card-body">
                    <form id="FrmNews" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="proc" id="proc" value="<?php echo isset($proc) ? $proc : 'add'; ?>">
                        <input type="hidden" name="news_id" id="news_id" value="<?php echo isset($newsId) ? $newsId : ''; ?>">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">News Title</label>
                            <input type="text" class="form-control" id="news_title" placeholder="Enter news title" name="news_title" aria-required="true" alert="Please enter news title" value="<?php echo isset($news_title) ? $news_title : ''; ?>" required>

                        </div>
                        <div class="mb-3">
                            <label for="detail_news" class="form-label">Detail News</label>
                            <textarea class="form-control" id="detail_news" name="detail_news" rows="10"><?php echo $detail_news?></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Photo News</label>
                            <input class="form-control" type="file" id="news_image" name="news_image">
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
        $('#FrmNews').on('submit', function(e) {
            e.preventDefault(); // Prevent the form from submitting the traditional way

            var formData = new FormData();
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
                        var file = $('#news_image')[0].files[0];
                        formData.append('news_title', $("#news_title").val());
                        formData.append('detail_news', $("#detail_news").val());
                        formData.append('news_image', file);
                        formData.append('news_id', $("#news_id").val());
                        formData.append('proc', $("#proc").val());

                        $.ajax({
                            type: "POST",
                            url: './save/newsProc.php',
                            data: formData,
                            //async: false,
                            cache: false,
                            contentType: false,
                            processData: false,
                            dataType: 'json',
                            beforeSend: function() {
                                showLoadingPage()
                            },
                            success: function(response) {
                                if (response.Status == true) {
                                    swal.close();
                                    location.href = "news.php";
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