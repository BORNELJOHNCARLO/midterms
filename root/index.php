<?php
// Predefined users (email => password)
$users = [
    'admin@email.com' => 'admin123',
    'user2-user2@email.com' => 'password2',
    'user3-user3@email.com' => 'password3',
    'user4-user4@email.com' => 'password4',
    'user5-user5@email.com' => 'password5',
];

// Initialize variables
$email = $password = '';
$emailErr = $passwordErr = '';
$errorDetails = [];
$loginError = '';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validate email
    if (empty($email)) {
        $emailErr = 'Email is required.';
        $errorDetails[] = $emailErr; // Add error to details array
    }

    // Validate password
    if (empty($password)) {
        $passwordErr = 'Password is required.';
        $errorDetails[] = $passwordErr; // Add error to details array
    }

    // Check if both email and password are provided
    if (empty($emailErr) && empty($passwordErr)) {
        // Check if email exists in predefined users
        if (array_key_exists($email, $users)) {
            // Check if password matches the one in the array
            if ($users[$email] !== $password) {
                $errorDetails[] = 'Password is incorrect.';
            }
        } else {
            $errorDetails[] = 'Email not found.';
        }
    }

    // If there are errors, set the login error message
    if (!empty($errorDetails)) {
        $loginError = 'System Errors:';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="w-100" style="max-width: 400px;">
        <!-- Error Message for validation (form fields) -->
        <div id="error-box" class="alert alert-danger d-none" role="alert">
            Please fill in all the fields.
        </div>
        
        <!-- System Error Message -->
        <div id="system-error-box" class="alert alert-danger d-none" role="alert">
            A system error has occurred. Please try again later.
        </div>
        
        <!-- Login Form -->
        <div class="card shadow-sm">
            <div class="card-body">
                <h3 class="card-title text-center mb-4">Login</h3>
                <form id="login-form">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter email">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Password">
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Login</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    
</script>
<!-- Bootstrap and your script -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>