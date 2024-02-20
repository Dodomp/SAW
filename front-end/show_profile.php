<?php
session_start();
include '../back-end/function/function.php';
if (!isLogged()) header("Location: index.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="Style/show_profile.css">
    <link rel="stylesheet" type="text/css" href="Style/navbar.css">
    <script src="js/show_profile.js"></script>


</head>

<body>

<?php
include '../back-end/navbar.php';
?>

<!-- div per il popup di conferma -->
<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
    <div id="toast" class="toast bg-dark text-white rounded" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <strong class="me-auto" style="color: #212529;">Notification</strong>
        </div>
        <div class="toast-body" id="toast-body-content" style="background-color: #212529;">
            x <!-- x viene modificato dinamicamente -->
        </div>
    </div>
</div>


<div class="container" id="main-container">
    <div class="row gutters">
        <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
            <div class="card h-100">
                <div class="card-body">
                    <div class="account-settings">
                        <div class="user-profile">
                            <div class="user-avatar">
                                <img src="assets/user_logo.png" alt="Default Avatar" />
                            </div>
                            <h5 class="user-name" id="firstname-h5"></h5>
                            <h6 class="user-email" id="email-h6"></h6>
                        </div>
                        <div class="about">
                            <h5>About</h5>
                            <textarea class="form-control" id="description" placeholder="No description yet" style="width: 100%; height: 50px; max-height: 200px;"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
            <div class="card h-100">
                <div class="card-body">
                    <div class="row gutters">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <h6 class="mb-2" style="color: #57aaee;">Personal Details</h6>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="firstname">First Name</label>
                                <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Enter first name">
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="email">email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required onchange="checkEmail()">
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="lastname">Last Name</label>
                                <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Enter last name">
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="age">Age</label>
                                <input type="int" class="form-control" id="age" name="age" placeholder="Insert your age">
                            </div>
                        </div>
                    </div>
                    <div class="row gutters">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <h6 class="mt-3 mb-2" style="color: #57aaee;">Address</h6>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="nationality">Nationality</label>
                                <input type="text" class="form-control" id="nationality" name="nationality" placeholder="Enter your nation">
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12" id="change-password">
                            <div class="form-group">
                                <label for="change-password-btn"></label>
                                <button type="submit" id="change-password-btn" name="submit" class="form-control" style="background-color: #0d6efd; color: white; cursor:pointer; border: 2px solid #adadad;">Change Password</button>
                            </div>
                        </div>
                        <div class="row gutters">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="text-right" style="margin-top: 20px;">
                                    <button type="button" id="CancelBtn" name="submit" class="btn btn-secondary">Cancel</button>
                                    <button type="button" id="UpdateBtn" name="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- div al centro della pagina con i campi di inserimento new password e conferma new password -->
<div id="update-password" style="font-size: 20px;" hidden>
    <div class="close-button" onclick="closeUpdatePassword()">X</div>
    <div class="form-group" style="margin-top: 15px;">
        <label for="current-password" style="color: #fff; margin-bottom: 10px;">Current Password</label>
        <input type="password" class="form-password" id="current-password" placeholder="Enter current password">
    </div>
    <div class="form-group" style="margin-top: 15px;">
        <label for="new-password" style="color: #fff; margin-bottom: 10px;">New Password</label>
        <input type="password" class="form-password" id="new-password" placeholder="Enter new password">
    </div>
    <div class="form-group">
        <label for="confirm-password" style="color: #fff; margin-bottom: 10px;">Confirm New Password</label>
        <input type="password" class="form-password" id="confirm-password" placeholder="Confirm new password">
    </div>
    <button id="confirm-button" onclick="confirmUpdate()">Conferma</button>
</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
