<?php
    include("./shared/nav.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        include_once("shared/conn.php");

        // Start session if not started yet
        if (session_status() == PHP_SESSION_NONE) session_start();

        // Sign In Logic
        if (isset($_POST['signinEmail']) && isset($_POST['signinPassword'])) {
            $email = $_POST['signinEmail'];
            $passwordp = $_POST['signinPassword'];

            // Prepare and execute query to fetch hashed password and role
            if ($stmt = mysqli_prepare($conn, "SELECT password, role FROM users WHERE email=?")) {
                mysqli_stmt_bind_param($stmt, "s", $email);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_bind_result($stmt, $password, $role);
                mysqli_stmt_fetch($stmt);
                mysqli_stmt_close($stmt);
            }

            // Verify the password
            if (password_verify($passwordp, $password)) {
                // Successful login
                $_SESSION["logstatus"] = "t";
                $_SESSION["email"] = $email;
                $_SESSION["role"] = $role;

                // Redirect based on role
                switch ($role) {
                    case 'admin':
                        header("Location: admindashbord.php");
                        break;
                    case 'farmer':
                        header("Location: FarmerHome.php");
                        break;
                    case 'consumer':
                        header("Location: consumerdashbord.php");
                        break;
                    case 'supplier':
                        header("Location: supplierdashbord.php");
                        break;
                }
                exit();
            } else {
                echo "<script>alert('Incorrect email or password.');</script>";
            }
        }

        // Sign Up Logic
        elseif (isset($_POST['signup'])) {
            $username = $_POST['signupUsername'];
            $email = $_POST['signupEmail'];
            $contact = $_POST['signupcontact'];
            $password = $_POST['signupPassword'];
            $confirm_password = $_POST['signupConfirmPassword'];
            $role = $_POST['signupRole'];
            $address = $_POST['signupAddress'];

            if ($password !== $confirm_password) {
                echo "<script>alert('Passwords do not match!');</script>";
            } else {
                // Hash the password
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                // Check if email already exists
                $checkEmailQuery = "SELECT 1 FROM users WHERE email = ? LIMIT 1";
                $stmt = $conn->prepare($checkEmailQuery);
                $stmt->bind_param("s", $email);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    echo "<script>alert('Email already registered!');</script>";
                } else {
                    // Insert the new user into the database
                    $stmt = $conn->prepare("INSERT INTO users (username, password, contact, email, address, role) VALUES (?, ?, ?, ?, ?, ?)");
                    if ($stmt) {
                        $stmt->bind_param("ssssss", $username, $hashed_password, $contact, $email, $address, $role);

                        if ($stmt->execute()) {
                            echo "<script>alert('Sign up successful! Please sign in.');</script>";
                            header("Location: signin.php");  // Redirect to sign in page
                            exit();
                        } else {
                            echo "<script>alert('Error: " . $stmt->error . "');</script>";
                        }
                        $stmt->close();
                    }
                }
            }
        }

        mysqli_close($conn);
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In & Sign Up</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/site.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
    <style>
        body {
            background-color: #fff;
            font-family: 'Arial', sans-serif;
        }
        .form-container {
            margin-top: 60px;
            max-width: 700px;
            background-color: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0px 4px 10px gray;
        }
        .nav-tabs {
            border-bottom: 2px solid #17a2b8; /* Info color */
        }
        .nav-tabs .nav-link.active {
            background-color: #17a2b8;
            color: white;
            border: none;
        }
        .nav-tabs .nav-link {
            color: #333;
            border: none;
            font-weight: bold;
        }
        .form-control {
            border-radius: 25px;
            padding: 20px;
        }
        .btn-primary {
            background-color: #17a2b8;
            border: none;
            border-radius: 25px;
            padding: 10px 30px;
        }
        .btn-primary:hover {
            background-color: #0c6c8b;
        }
        .error-message {
            color: red;
            font-weight: bold;
            text-align: center;
        }
    </style>
</head>
<body>

<div class="container form-container">
    <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="signin-tab" data-bs-toggle="tab" href="#signin" role="tab" aria-controls="signin" aria-selected="true">Sign In</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="signup-tab" data-bs-toggle="tab" href="#signup" role="tab" aria-controls="signup" aria-selected="false">Sign Up</a>
        </li>
    </ul>

    <div class="tab-content" id="myTabContent">
        <!-- Sign In Tab -->
        <div class="tab-pane fade show active" id="signin" role="tabpanel" aria-labelledby="signin-tab">
            <form method="POST" action="">
                <div class="form-group mt-4">
                    <label for="signinEmail">Email</label>
                    <input type="email" class="form-control" id="signinEmail" name="signinEmail" required>
                </div>
                <div class="form-group">
                    <label for="signinPassword">Password</label>
                    <input type="password" class="form-control" id="signinPassword" name="signinPassword" required>
                </div>
                <button type="submit" class="btn btn-primary w-100 mt-2">Sign In</button>
            </form>
        </div>

        <!-- Sign Up Tab -->
        <div class="tab-pane fade" id="signup" role="tabpanel" aria-labelledby="signup-tab">
            <form method="POST" action="">
                <div class="form-group mt-3">
                    <label for="signupUsername">Full name</label>
                    <input type="text" class="form-control" id="signupUsername" name="signupUsername" placeholder="Enter your name" required>
                </div>
                <div class="form-group">
                    <label for="signupEmail">Email</label>
                    <input type="email" class="form-control" id="signupEmail" name="signupEmail" placeholder="Enter your email id" required>
                </div>
                <div class="form-group">
                    <label for="signupcontact">Contact</label>
                    <input type="number" class="form-control" id="signupcontact" name="signupcontact" placeholder="Enter your contact number" required>
                </div>
                <div class="form-group">
                    <label>Select Role</label>
                    <select class="form-control" id="signupRole" name="signupRole" required>
                        <option value="" disabled selected>Select your role</option>
                        <option value="farmer">Farmer</option>
                        <option value="supplier">Supplier</option>
                        <option value="consumer">Consumer</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="signupAddress">Address</label>
                    <textarea class="form-control" id="signupAddress" name="signupAddress" placeholder="Enter your Address" rows="3" required></textarea>
                </div>
                <div class="form-group">
                    <label for="signupPassword">Password</label>
                    <input type="password" class="form-control" id="signupPassword" name="signupPassword" placeholder="Enter your password" required>
                </div>
                <div class="form-group">
                    <label for="signupConfirmPassword">Confirm Password</label>
                    <input type="password" class="form-control" id="signupConfirmPassword" name="signupConfirmPassword" placeholder="Enter your confirm password" required>
                </div>
                <button type="submit" name="signup" class="btn btn-primary w-100 mt-3">Sign Up</button>
            </form>
        </div>
    </div>
</div>
<?php
      include("./shared/footer.php");
    ?>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>

<script src="./js/jquery.min.js"></script>
    <script src="./js/jquery.toaster.js"></script>
    <script src="./js/adminscripts.js"></script>
</body>
</html>
