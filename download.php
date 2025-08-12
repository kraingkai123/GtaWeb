<?php
include 'include/header-user.php';
?>

<body class="bg-black text-white mt-0" data-bs-spy="scroll" data-bs-target="#navScroll">
    <?php include 'include/navbar-user.php'; ?>
    <main>
        <div class="w-100 overflow-hidden position-relative bg-black text-white" data-aos="fade">
            <div class="position-absolute w-100 h-100 bg-black opacity-75 top-0 start-0"></div>
            <div class="container py-vh-4 position-relative mt-5 px-vw-5 text-center">
                <div class="row d-flex align-items-center justify-content-center py-vh-5">
                    <div class="col-12 col-xl-10">
                        <h1 class="display-huge mt-3 mb-3 lh-1">Download</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-dark">
            <div class="container px-vw-5 py-vh-5">
                DOWNLOAD
                <table width="100%" class="table table-dark table-striped">
                    <thead>
                        <tr>
                            <th width="80%">Description</th>
                            <th width="20%">Download</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <?php
                        $response = Download::listDownload();
                        foreach ($response as $key => $value) {
                        ?>
                            <tr>
                                <td><?php echo $value['download_name']; ?><br><?php echo $value['download_detail'];?></td>
                                <td><a href="<?php echo $value['download_link']; ?>" class="btn btn-primary" target="_blank">Download</a></td>
                            </tr>
                        <?php
                        }
                        ?>

                    </tbody>

                    
                </table>
            </div>
        </div>

    </main>
    <?php include './include/footer-user.php'; ?>
</body>