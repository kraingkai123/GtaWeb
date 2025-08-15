<?php
include("../include/header.php");
if (!empty($_GET['charId'])) {
    $charId = $_GET['charId'];
    $response = Character::getCharacterById($charId);
    if ($response) {
        $news_title = $response['news_title'];
        $detail_news = $response['detail_news'];
        $news_image = $response['news_image'];
    } else {
        header("Location: player.php");
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
                        <h1>Charecter Data</h1>
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
                         <input type="hidden" name="proc" id="proc" value="<?php echo isset($proc) ? $proc : 'updateData'; ?>">
                        <input type="hidden" name="charId" id="charId" value="<?php echo isset($charId) ? $charId : ''; ?>">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="playerName">Player Name</label>
                                    <input type="text" class="form-control" id="playerName" name="playerName" value="<?php echo isset($response['playerName']) ? $response['playerName'] : ''; ?>" aria-required="true" alert="Please enter player name">
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <?php for ($i = 0; $i <= 12; $i++) {
                                    ?> <label for="playerWeapon">playerWeapon<?php echo $i; ?></label>
                                        <input type="text" class="form-control" id="playerWeapon<?php echo $i; ?>" name="playerWeapon<?php echo $i; ?>" value="<?php echo isset($response['playerWeapon' . $i]) ? $response['playerWeapon' . $i] : ''; ?>">
                                    <?php
                                    } ?>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <?php for ($i = 0; $i <= 12; $i++) {
                                    ?> <label for="playerAmmo">playerAmmo<?php echo $i; ?></label>
                                        <input type="text" class="form-control" id="playerAmmo<?php echo $i; ?>" name="playerAmmo<?php echo $i; ?>" value="<?php echo isset($response['playerAmmo' . $i]) ? $response['playerAmmo' . $i] : ''; ?>">
                                    <?php
                                    } ?>
                                </div>
                            </div>

                        </div>
                        <center>
                            <button type="submit" class="btn btn-success">SaveData</button>
                        </center>
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

            var formData = $('#FrmNews').serialize();
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
                            url: './save/CharacterProc.php',
                            data: formData,
                            //async: false,
        
                            dataType: 'json',
                            beforeSend: function() {
                                showLoadingPage()
                            },
                            success: function(response) {
                                if (response.Status == true) {
                                    swal.close();
                                    location.href = "player.php";
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