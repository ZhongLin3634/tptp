<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>THKD Pharmacy Portal</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="vendors/feather/feather.css">
    <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="css/vertical-layout-light/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="images/thkd/thkd-butterfly.png" />
    <!-- font awesome -->
    <script src="https://kit.fontawesome.com/abfec29e84.js" crossorigin="anonymous"></script>
</head>

<style>
.background {
        background-image: url('images/bg.png');
        background-size: cover;
        max-width: 100%;
        height: auto;
    }

.float-on-hover {
display: inline-block;
vertical-align: middle;
-webkit-transform: perspective(1px) translateZ(0);
transform: perspective(1px) translateZ(0);
box-shadow: 0 0 1px rgba(0, 0, 0, 0);
-webkit-transition-duration: 0.3s;
transition-duration: 0.3s;
-webkit-transition-property: transform;
transition-property: transform;
-webkit-transition-timing-function: ease-out;
transition-timing-function: ease-out;
}

.float-on-hover:hover,
.float-on-hover:focus,
.float-on-hover:active {
-webkit-transform: translateY(-8px);
transform: translateY(-8px);
}

.overlay {
position: fixed;
display: none;
width: 100%;
height: 100%;
top: 0;
left: 0;
right: 0;
bottom: 0;
background-color: rgba(0, 0, 0, 0.5);
z-index: 2;
}

.btn-blue {
color: #fff;
background-color: #025930;
border-color: #025930;
}

.btn-blue span {
cursor: pointer;
display: inline-block;
position: relative;
transition: 0.5s;
}

.btn-blue span:after {
content: '\f2f6';
font-family: FontAwesome;
font-weight: 400;
position: absolute;
opacity: 0;
top: 0;
right: -20px;
transition: 0.5s;
}

.btn-blue:hover span {
padding-right: 25px;
color: white;
}

.btn-blue:hover span:after {
opacity: 1;
right: 0;
}

.btn-blue:focus,
.btn-blue.focus {
color: #fff;
background-color: #025930;
border-color: #025930;
box-shadow: 0 0 0 0.2rem rgba(69, 156, 253, 0.5);
}

.btn-blue.disabled,
.btn-blue:disabled {
color: #fff;
background-color: #025930;
border-color: #025930;
}

.btn-blue:not(:disabled):not(.disabled):active,
.btn-blue:not(:disabled):not(.disabled).active,
.show>.btn-blue.dropdown-toggle {
color: #fff;
background-color: #025930;
border-color: #025930;
}

.btn-blue:not(:disabled):not(.disabled):active:focus,
.btn-blue:not(:disabled):not(.disabled).active:focus,
.show>.btn-blue.dropdown-toggle:focus {
box-shadow: 0 0 0 0.2rem rgba(69, 156, 253, 0.5);
}

.text-blue,
.list-wrapper .completed .remove {
color: #025930 !important;
}

a.text-blue:hover,
.list-wrapper .completed a.remove:hover,
a.text-blue:focus,
.list-wrapper .completed a.remove:focus {
color: #343276 !important;
}
</style>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0 background">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left py-5 px-4 px-sm-5 rounded shadow-lg">
                            <div class="brand-logo">
                                <img src="a.png" alt="logo" style="width: 100%;">
                            </div>
                            <div class="mt-3">
                                <button type="submit" class="btn btn-block btn-blue btn-lg font-weight-medium auth-form-btn" onclick="document.location='login.php'"><span>Login </span></button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left py-5 px-4 px-sm-5 rounded shadow-lg">
                            <div class="brand-logo">
                                <img src="images/pharmacy/phr.jpg" alt="logo" style="width: 100%;">
                            </div>
                            <div class="mt-3">
                                <button type="submit" class="btn btn-block btn-blue btn-lg font-weight-medium auth-form-btn" onclick="document.location='index1.php'"><span>Complain </span></button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src=" vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="js/off-canvas.js"></script>
    <script src="js/hoverable-collapse.js"></script>
    <script src="js/template.js"></script>
    <script src="js/settings.js"></script>
    <script src="js/todolist.js"></script>
    <!-- endinject -->

</body>

</html>