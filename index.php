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
                        <span class="h5 text-secondary fw-lighter">Coming Soon</span>
                        <h1 class="display-huge mt-3 mb-3 lh-1">Roleplay Classic</h1>
                    </div>
                    <div class="col-12 col-xl-8">
                        <p class="lead text-secondary">You can join Discord</p>
                    </div>
                    <div class="col-12 text-center">
                        <a href="https://discord.gg/6s6QG5d8" target="_blank" class="btn btn-xl btn-light">Join us
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-arrow-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-dark">
            <div class="container px-vw-5 py-vh-5">
                <div class="row d-flex align-items-center">
                    <div class="col-12 col-lg-7 text-lg-end" data-aos="fade-right">
                        <span class="h5 text-secondary fw-lighter"><?php echo date('Y-m-d'); ?></span>
                        <h2 class="display-4">header</h2>
                    </div>
                    <div class="col-12 col-lg-5" data-aos="fade-left">
                        <h3 class="pt-5">header2</h3>
                        <p class="text-secondary">content1<br>
                            <a href="#" class="link-fancy link-fancy-light me-2">view detail</a>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                class="bi bi-arrow-right-circle" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z" />
                            </svg>
                        </p>
                        <h3 class="border-top border-secondary pt-5 mt-5">header2</h3>
                        <p class="text-secondary">content2<br>
                            <a href="#" class="link-fancy link-fancy-light me-2">view detail</a>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                class="bi bi-arrow-right-circle" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z" />
                            </svg>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-black py-vh-3">
            <div>
                <div class="container bg-black px-vw-5 py-vh-3 rounded-5 shadow">
                    <div class="row">
                        <?php
                         for ($i=0; $i <5 ; $i++) { 
                            ?>
                            <div class="col-12 col-md-6">
                            <div class="card bg-transparent mb-5" data-aos="zoom-in-up">
                                <div class="bg-dark shadow rounded-5 p-0">
                                    <img src="img/webp/abstract3.webp" width="582" height="327" alt="abstract image"
                                        class="img-fluid rounded-5 no-bottom-radius" loading="lazy">
                                    <div class="p-5">
                                        <h2 class="fw-lighter">Ipsum dolor est</h2>
                                        <p class="pb-4 text-secondary">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam
                                            nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat.</p>
                                        <a href="#" class="link-fancy link-fancy-light">Read more<?php echo $i;?></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                            <?php 
                         }?>
                    </div>

                </div>
              <!--   <div class="container-fluid px-vw-5 position-relative" data-aos="fade">
                    <div class="position-absolute w-100 h-50 bg-black top-0 start-0"></div>
                    <div class="position-relative py-vh-5 bg-cover bg-center rounded-5"
                        style="background-image: url(img/webp/abstract12.webp)">
                        <div class="container bg-black px-vw-5 py-vh-3 rounded-5 shadow">
                            <div class="row d-flex align-items-center">

                                <div class="col-6 d-flex align-items-center bg-dark shadow rounded-5 p-0" data-aos="zoom-in-up">
                                    <div class="row d-flex justify-content-center">
                                        <div class="col-12">
                                            <img src="img/webp/person103.webp" width="684" height="457" alt="our CEO with some nice numbers"
                                                class="img-fluid rounded-5" loading="lazy">
                                        </div>
                                        <div class="col-12 col-lg-10 col-xl-8 text-center my-5">
                                            <p class="lead border-bottom pb-4 border-secondary">"Lorem ipsum dolor sit amet, consetetur sadipscing
                                                elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam
                                                voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea
                                                takimata sanctus est Lorem ipsum dolor sit amet."</p>
                                            <p class="text-secondary text-center">Jane Doe, CEO</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-5 offset-1">
                                    <span class="h5 text-secondary fw-lighter">The numbers</span>
                                    <h2 class="display-huge fw-bolder" data-aos="zoom-in-left">+400</h2>
                                    <p class="h4 fw-lighter text-secondary">
                                        Lorem ipsum dolor sit amet, consetetur sadipscing elitr.
                                    </p>

                                    <h2 class="display-huge fw-bolder border-top border-secondary pt-5 mt-5" data-aos="zoom-in-left">78.981
                                    </h2>
                                    <p class="h4 fw-lighter text-secondary">
                                        Lorem ipsum dolor sit amet, consetetur sadipscing elitr.
                                    </p>
                                    <h2 class="display-huge fw-bolder border-top border-secondary pt-5 mt-5" data-aos="zoom-in-left">98%</h2>
                                    <p class="h4 fw-lighter text-secondary">
                                        Lorem ipsum dolor sit amet, consetetur sadipscing elitr.
                                    </p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>        -->   
    </main>
    <?php include './include/footer-user.php'; ?>
</body>