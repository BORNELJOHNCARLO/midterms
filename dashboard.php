<?php
// Start the session
session_start();
include('header.php');
// Check if the user is logged in by checking the session variable
if (!isset($_SESSION['email'])) {
    // Redirect to login page if user is not logged in
    header('Location: index.php');
    exit;
}

// Get the logged-in user's email
$userEmail = $_SESSION['email'];
?>


    <div class="container mt-5">
        <div>
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1>Welcome to the System, <?php echo $userEmail; ?>!</h1>
                <a href="logout.php" class="btn btn-danger">Logout</a>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Add a Subject</h5>
                        <p class="card-text">This section allows you to add a new subject in the system. Click the button below to proceed with the adding process.</p>
                        <a href="#" class="btn btn-primary">Add Subject</a>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Register a Student</h5>
                        <p class="card-text">This section allows you to register a new student in the system. Click the button below to proceed with the registration process.</p>
                        <a href="student/register.php" class="btn btn-primary width-100">Register</a>
                    </div>
                </div>
            </div>
        </div>
    </div>