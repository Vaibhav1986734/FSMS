<?php
      header("Cache-conntrol: no-cache, must-revalidate");

      if (session_status() == PHP_SESSION_NONE) 
             session_start();

      include("shared/checkuserlogin.php");
      include("shared/conn.php");      

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $food_quality = intval($_POST['food-quality']);
    $comments = trim($_POST['comments']);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format.";
        exit();
    }

    $stmt = $conn->prepare("INSERT INTO feedback (name, email, food_quality, comments) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssis", $name, $email, $food_quality, $comments);

    if ($stmt->execute()) {
        echo "<div class='alert alert-success'>Feedback submitted successfully!</div>";
    } else {
        echo "<div class='alert alert-danger'>Error: " . $stmt->error . "</div>";
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Safety Feedback Form</title>
    <link rel="stylesheet" href="css/all.min.css" />
      <link rel="stylesheet" href="css/bootstrap.min.css" />
      <link rel="stylesheet" href="css/admincss.css" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .rating {
            display: flex;
            justify-content: space-between;
        }

        .rating input[type="radio"] {
            display: none;
        }

        .rating label {
            font-size: 30px;
            color: #ccc;
            cursor: pointer;
        }
        
        .rating input[type="radio"]:checked ~ label,
        .rating input[type="radio"]:hover ~ label {
            color: #f7b500;
        }

        .rating label:hover ~ label {
            color: #f7b500;
        }
    </style>
</head>
<body class="sb-nav-fixed" >
<?php include_once("shared/adminpagetop.php") ?>
<div id="layoutSidenav">
<?php include_once("shared/adminsidenav.php") ?>
<div id="layoutSidenav_content">
 <main> 
<div class="container mt-1">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-body m-4">
                    <h2 class="text-center p-2 bg-info" style="border-radius: 9px; font-weight:500;">Food Safety Feedback Form</h2>

                    <form action="" method="POST">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name:</label>
                            <input type="text" id="name" name="name" class="form-control" required placeholder="Enter your Name">
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" id="email" name="email" class="form-control" required placeholder="Enter your email ID">
                        </div>

                        <div class="mb-3">
                            <label class="form-label"> Rating:</label>
                            <div class="rating">
                                <input type="radio" id="star5" name="food-quality" value="5" required>
                                <label for="star5" class="star">&#9733;</label>

                                <input type="radio" id="star4" name="food-quality" value="4">
                                <label for="star4" class="star">&#9733;</label>

                                <input type="radio" id="star3" name="food-quality" value="3">
                                <label for="star3" class="star">&#9733;</label>

                                <input type="radio" id="star2" name="food-quality" value="2">
                                <label for="star2" class="star">&#9733;</label>

                                <input type="radio" id="star1" name="food-quality" value="1">
                                <label for="star1" class="star">&#9733;</label>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="comments" class="form-label">Comments:</label>
                            <textarea id="comments" name="comments" class="form-control" rows="4" placeholder="Enter your comments"></textarea>
                        </div>

                        <button type="submit" class="btn btn-success w-100">Submit Feedback</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</main>
<?php
mysqli_close($conn); 
include_once("shared/adminpagebottom.php") 
?>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    const stars = document.querySelectorAll('.rating input');
    stars.forEach(star => {
        star.addEventListener('change', () => {
            const ratingValue = star.value;
            console.log(`Selected Rating: ${ratingValue}`);
        });
    });
</script>

</body>
</html>
