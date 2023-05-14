<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Informia</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Noto+Sans&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans&amp;display=swap">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/Banner-Heading-Image-images.css">
    <link rel="stylesheet" href="assets/css/Features-Cards-icons.css">
    <link rel="stylesheet" href="assets/css/Gamanet_Pagination_bs5.css">
    <link rel="stylesheet" href="assets/css/Hover-Button-1.css">
    <link rel="stylesheet" href="assets/css/Ludens---Show-Details-v2.css">
    <link rel="stylesheet" href="assets/css/Navbar---App-Toolbar--LG--MD---Mobile-Nav--SM--XS-navbar-breakpoint-override.css">
    <link rel="stylesheet" href="assets/css/Navbar---App-Toolbar--LG--MD---Mobile-Nav--SM--XS.css">
    <link rel="stylesheet" href="assets/css/Navbar-Centered-Brand-icons.css">
    <link rel="stylesheet" href="assets/css/Search-Input-Responsive-with-Icon.css">
    <link rel="stylesheet" href="assets/css/Search-Input-responsive.css">
    <link rel="stylesheet" href="assets/css/Signup-page-with-overlay.css">
</head>

<body>
<?php 
require "connect.php";//connect to the db

if(isset($_GET["training_id"])){//check the id
  $id = $_GET["training_id"];
  $query = "SELECT Trainings.*,session.*
          FROM trainningcenter
         where `training_id`= $id
          ";
}
  ?>
    <nav class="navbar navbar-light navbar-expand-md py-3 navbg fixed-top">
        <div class="container"><a class="navbar-brand d-flex align-items-center" href="trainings.php"><span class="bs-icon-sm bs-icon-rounded bs-icon-primary d-flex justify-content-center align-items-center me-2 bs-icon"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-text-indent-left" style="padding-right: 0px;margin-right: 0px;font-size: 27px;">
                        <path d="M2 3.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm.646 2.146a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1 0 .708l-2 2a.5.5 0 0 1-.708-.708L4.293 8 2.646 6.354a.5.5 0 0 1 0-.708zM7 6.5a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 3a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm-5 3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z"></path>
                    </svg></span><span class="fw-bold" id="logo-1">Informia</span></a><a class="navbar-brand d-flex align-items-center" href="#"><span></span></a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item"></li>
                    <li class="nav-item"><a class="nav-link" href="trainings.php"><i class="fa fa-th-large fa-fw"></i>Trainings</a></li>
                    <li class="nav-item"></li>
                    <li class="nav-item"></li>
                    <li class="nav-item"></li>
                    <li class="nav-item dropdown"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href=""><i class="fa fa-navicon fa-fw"></i><span style="color: var(--bs-navbar-active-color);">Registrations</span></a>
                        <div class="dropdown-menu"><a class="dropdown-item" href="recents.php"><i class="fa fa-spinner fa-fw"></i>Recents</a><a class="dropdown-item" href="archive.php"><i class="fa fa-archive fa-fw"></i>Archieve</a></div>
                    </li>
                </ul>
                <div class="dropdown no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"><span class="d-none d-lg-inline me-2 text-gray-600 small">hussein bouik</span><img class="border rounded-circle img-profile" src="assets/img/avatars/avatar5.jpeg"></a>
                    <div class="dropdown-menu shadow dropdown-menu-end animated--grow-in"><a class="dropdown-item" href="profile.php"><i class="fas fa-user fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Profile</a><a class="dropdown-item" href="#"><i class="fas fa-cogs fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Settings</a><a class="dropdown-item" href="#"><i class="fas fa-list fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Activity log</a>
                        <div class="dropdown-divider"></div><a class="dropdown-item" href="#"><i class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <div class="container mt-5" style="padding-bottom: 45px;padding-top: 44px;">
        <div class="col" style="color: #858796;margin: 16px;margin-left: 0px;"><a style="text-decoration: none;" href="trainings.php"><span class="fs-5 mt-5 mb-5" style="margin-bottom: 20px;color: rgb(133,135,150);"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none">
                        <path d="M1.02698 11.9929L5.26242 16.2426L6.67902 14.8308L4.85766 13.0033L22.9731 13.0012L22.9728 11.0012L4.85309 11.0033L6.6886 9.17398L5.27677 7.75739L1.02698 11.9929Z" fill="currentColor"></path>
                    </svg>Volver</span></a></div>
        <div>
            <h2 class="fw-normal text-center mb-3" style="color: #858796;">Training details</h2>
        </div>
        <div class="card shadow-sm">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3" style="margin-top: 12px;"><label class="col-form-label fs-1 fw-bold">Training</label></div>
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3" style="margin-top: 12px;"><label class="form-label fs-6 fw-bold">Subjects</label>
                        <h5 class="fs-6">23442</h5>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3" style="margin-top: 12px;"><label class="form-label fs-6 fw-bold">Category</label>
                        <h5 class="fs-6">uncategorized</h5>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3" style="margin-top: 12px;"><label class="form-label fs-6 fw-bold">Total hours</label>
                        <h5 class="fs-6">200 hours</h5>
                    </div>
                </div>
                <hr>
                <hr class="mb-0 pb-0">
            </div>
            <div class="card-body"><label class="form-label fs-4 fw-bold">Descriptions</label>
                <div class="row">
                    <div class="col-12" style="margin-top: 12px;">
                        <h6 class="fs-6" style="text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</h6>
                    </div>
                </div>
                <hr>
            </div>
            <div class="row" style="margin: 4px;margin-top: 5px;">
                <div class="col-12" style="margin-bottom: 14px;margin-top: -13px;">
                    <h4 class="fs-4 fw-bold mb-4 mt-4">Sessions</h4>
                </div>
                <div class="col-12">
                    <div class="table-responsive th-tabla">
                        <table class="table table-borderless">
                            <thead style="padding-top: 0px;">
                                <tr class="mb-5">
                                    <th class="text-center" style="padding-top: 10px;padding-bottom: 10px;">Places</th>
                                    <th class="text-center">Start Date</th>
                                    <th class="text-center">End Date</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Trainer</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center">8/30</td>
                                    <td class="text-center">11-05-2020</td>
                                    <td class="text-center">5-07-2018</td>
                                    <td class="text-center">Completed</td>
                                    <td class="text-center">Einstein</td>
                                    <td style="text-align: center;"><a class="btn btn-primary btn-circle btnCircular" role="button" data-bss-hover-animate="tada" href="#">Register</a></td>
                                </tr>
                                <tr class="text-center">
                                    <td class="text-center">20/50</td>
                                    <td class="text-center">12-04-2025</td>
                                    <td class="text-center">06-07-2030</td>
                                    <td class="text-center">Open for Registration</td>
                                    <td class="text-center">Isaac Newton</td>
                                    <td class="text-center"><a class="btn btn-primary btn-circle btnCircular" role="button" data-bss-hover-animate="tada" href="#">Register</a></td>
                                </tr>
                                <tr>
                                    <td class="text-center">399/400</td>
                                    <td class="text-center">15-05-2023</td>
                                    <td class="text-center">16-05-2023</td>
                                    <td class="text-center">Upcoming</td>
                                    <td class="text-center">Dounia Batema</td>
                                    <td style="text-align: center;"><a class="btn btn-primary btn-circle btnCircular" role="button" data-bss-hover-animate="tada" href="#">Register</a></td>
                                </tr>
                                <tr class="text-center"></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="pagination" class="d-flex justify-content-center"><a class="pagination-item disabled" href="#"><img src="assets/img/icon_arrow-left.svg"><span>Previos</span></a><a class="pagination-item active" href="#">1</a><a class="pagination-item" href="#">2</a><a class="pagination-item" href="#">3</a><a class="pagination-item" href="#">...</a><a class="pagination-item" href="#"><span>Next</span><img src="assets/img/icon_arrow-right.svg"></a></div>
    <footer>
        <div class="container py-4 py-lg-5">
            <div class="row justify-content-center">
                <div class="col-sm-4 col-md-3 text-center text-lg-start d-flex flex-column">
                    <h3 class="fs-6">Services</h3>
                    <ul class="list-unstyled">
                        <li><a class="link-secondary" href="#">Web design</a></li>
                        <li><a class="link-secondary" href="#">Development</a></li>
                        <li><a class="link-secondary" href="#">Hosting</a></li>
                    </ul>
                </div>
                <div class="col-sm-4 col-md-3 text-center text-lg-start d-flex flex-column">
                    <h3 class="fs-6">About</h3>
                    <ul class="list-unstyled">
                        <li><a class="link-secondary" href="#">Company</a></li>
                        <li><a class="link-secondary" href="#">Team</a></li>
                        <li><a class="link-secondary" href="#">Legacy</a></li>
                    </ul>
                </div>
                <div class="col-sm-4 col-md-3 text-center text-lg-start d-flex flex-column">
                    <h3 class="fs-6">Careers</h3>
                    <ul class="list-unstyled">
                        <li><a class="link-secondary" href="#">Job openings</a></li>
                        <li><a class="link-secondary" href="#">Employee success</a></li>
                        <li><a class="link-secondary" href="#">Benefits</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 text-center text-lg-start d-flex flex-column align-items-center order-first align-items-lg-start order-lg-last">
                    <div class="fw-bold d-flex align-items-center mb-2"><span class="bs-icon-sm bs-icon-rounded bs-icon-primary d-flex justify-content-center align-items-center bs-icon me-2"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-text-indent-left" style="font-size: 29px;">
                                <path d="M2 3.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm.646 2.146a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1 0 .708l-2 2a.5.5 0 0 1-.708-.708L4.293 8 2.646 6.354a.5.5 0 0 1 0-.708zM7 6.5a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 3a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm-5 3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z"></path>
                            </svg></span><span>Informia</span></div>
                    <p class="text-muted">Your journey to success starts here.</p>
                </div>
            </div>
            <hr>
            <div class="d-flex justify-content-between align-items-center pt-3">
                <p class="text-muted mb-0">Copyright © 2023 Informia</p>
                <ul class="list-inline mb-0">
                    <li class="list-inline-item"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-facebook">
                            <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"></path>
                        </svg></li>
                    <li class="list-inline-item"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-twitter">
                            <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"></path>
                        </svg></li>
                    <li class="list-inline-item"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-instagram">
                            <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"></path>
                        </svg></li>
                </ul>
            </div>
        </div>
    </footer>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="https://geodata.solutions/includes/countrystate.js"></script>
</body>

</html>