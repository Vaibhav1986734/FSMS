<?php
   include("./shared/nav.php");
?>

    <!-- Hero Section -->
    <header class="bg-primary text-white text-center py-5">
        <div class="container">
            <h1 class="display-4">Welcome to Food Safety Supply Chain</h1>
            <p class="lead">Ensuring safe food practices for a healthier life</p>
            <a href="#services" class="btn btn-light btn-lg">Learn More</a>
        </div>
    </header>

    <!-- About Section -->
    <section id="about" class="py-5">
        <div class="container">
            
            <h2>About Us </h2>
            <div class="row">
                <div class="col-lg-6 col-md-6 pt-md-0 text-justify animate__animated animate__backInLeft p-0 m-0 ">
                    
                    <p>The Commissioner of Food Safety is appointed by the state government under Section 30 to ensure 
                        “efficient implementation” of the FSSA and its accompanying rules and regulations. Sections 30(2)(a) 
                        to (e) cover specific functions of the Commissioner of Food Safety (carrying out surveys, training programmes,
                         and approving prosecution for offences, etc.); Section 30(2)(f) gives the Commissioner a broad mandate — “such 
                         other functions as the State Government may, in consultation with the Food Authority, prescribe”.
                        In addition, Section 94(2)(c) allows the state government to make rules for “any other matter 
                        which is required to be, or may be prescribed or in respect of which provision is to be made by 
                        rules by the State Government”.
                        Section 94(3) requires that the rule must be placed before the state legislature for approval “as 
                        soon as may be”.
                    </p>
                </div>
                <div class="col-lg-6 col-md-6  animate__animated animate__backInRight">
                    <img src="./images/veg.jpg" class="img-fluid img-thumbnail" alt="About Us Image">
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
<section id="services" class="py-5">
    <div class="container animate__animated" id="zoom">
    <h2 class="text-center mb-4">Our Services</h2>
        <div class="row">
            <div class="col-md-4 mb-1">
                <div class="card" onclick="toggleReveal(this)">
                    <img src="./images/card1.jpg" class="card-img-top" alt="Mountain">
                    <div class="card-body">
                        <h5 class="card-title">Inspection and Compliance</h5>
                        <p class="card-text">Conduct regular inspections of food establishments to ensure adherence to health regulations. Provide guidance on compliance with local and national food safety standards.</p>
                        <a href="#" class="btn btn-primary">Read More</a>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 mb-1">
                <div class="card" onclick="toggleReveal(this)">
                    <img src="./images/card2.jpg" class="card-img-top" alt="Mountain">
                    <div class="card-body">
                        <h5 class="card-title">Training and Education</h5>
                        <p class="card-text">Offer comprehensive training programs for food handlers and staff on safe food handling practices. Educate the community about food safety through workshops and seminars.</p>
                        <a href="#" class="btn btn-primary">Read More</a>
                    </div>
                </div>
            </div>
    
            <div class="col-md-4 mb-1">
                <div class="card" onclick="toggleReveal(this)">
                    <img src="./images/card3.jpg" class="card-img-top" alt="Mountain">
                    <div class="card-body">
                        <h5 class="card-title">Risk Assessment and Management</h5>
                        <p class="card-text">Perform risk assessments to identify potential food safety hazards. Develop strategies to mitigate risks and enhance food safety protocols within organizations.</p>
                        <a href="#" class="btn btn-primary">Read More</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4 mb-1">
                <div class="card" onclick="toggleReveal(this)">
                    <img src="./images/card4.jpeg" class="card-img-top" alt="Mountain">
                    <div class="card-body">
                        <h5 class="card-title">Sustainability Practices</h5>
                        <p class="card-text">Advise on sustainable practices in food safety, including waste reduction and environmentally friendly sourcing. Promote practices that ensure food safety.</p>
                        <a href="#" class="btn btn-primary">Read More</a>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 mb-1">
                <div class="card" onclick="toggleReveal(this)">
                    <img src="./images/card5.png" class="card-img-top" alt="Mountain">
                    <div class="card-body">
                        <h5 class="card-title">Food Safety Research</h5>
                        <p class="card-text">Engage in research initiatives to advance food safety knowledge. Publish findings and best practices to inform the industry and public about emerging food safety issues.</p>
                        <a href="#" class="btn btn-primary">Read More</a>
                    </div>
                </div>
            </div>
    
            <div class="col-md-4 mb-1">
                <div class="card" onclick="toggleReveal(this)">
                    <img src="./images/card6.jpg" class="card-img-top" alt="Mountain">
                    <div class="card-body">
                        <h5 class="card-title">Labeling and Packaging Guidance</h5>
                        <p class="card-text">Provide assistance with food labeling and packaging, ensuring compliance with regulatory standards. Help businesses develop clear and informative labels. </p>
                        <a href="#" class="btn btn-primary  justify-content-center">Read More</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
</section>

    <!-- Contact Section -->
    <section id="contact" class="py-5">
        <div class="container">
            <h2 class="text-center mb-4">Contact Us</h2>
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <form method="post" action="submit.php">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Your Name" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">Message</label>
                            <textarea class="form-control" name="message" id="message" rows="3" placeholder="Your Message" required></textarea>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </section>

    <?php
      include("./shared/footer.php");
    ?>
    
<script>
    function toggleReveal(card) {
        card.classList.toggle('reveal');
    }
</script>

<!-- Custom JavaScript to toggle forms -->
<script>
    document.getElementById('showSignupForm').addEventListener('click', function (e) {
        e.preventDefault();
        document.getElementById('signinForm').classList.add('d-none');
        document.getElementById('signupForm').classList.remove('d-none');
        document.getElementById('authModalLabel').textContent = 'Sign Up'; // Change the modal title
    });

    document.getElementById('showSigninForm').addEventListener('click', function (e) {
        e.preventDefault();
        document.getElementById('signupForm').classList.add('d-none');
        document.getElementById('signinForm').classList.remove('d-none');
        document.getElementById('authModalLabel').textContent = 'Sign In'; // Change the modal title back
    });
</script>

    
    <script>
        // Show or hide the "Back to Top" button
        window.onscroll = function() {
            if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
                document.getElementById("backToTop").style.display = "block";
            } else {
                document.getElementById("backToTop").style.display = "none";
            }
        };

        // Scroll to top functionality
        function scrollToTop() {
            window.scrollTo({top: 0, behavior: 'smooth'});
        }
    </script>

<script>
    $(document).ready(function () {
        // jQuery counterUp
        $('[data-toggle="counter-up"]').counterUp({
            delay: 10,
            time: 1000
        });

        // Adding animations with Waypoints
        $('#left').waypoint(function () {
            $('#left').addClass('animate__backInLeft');
        }, {
            offset: '100%'
        });

        $('#right').waypoint(function () {
            $('#right').addClass('animate__backInRight');
        }, {
            offset: '100%'
        });

        $('#zoom').waypoint(function () {
            $('#zoom').addClass('animate__zoomIn');
        }, {
            offset: '100%'
        });

        $('#col1').waypoint(function () {
            $('#col1').addClass('animate__backInLeft');
        }, {
            offset: '100%'
        });

        $('#col2').waypoint(function () {
            $('#col2').addClass('animate__zoomIn');
        }, {
            offset: '100%'
        });

        $('#col3').waypoint(function () {
            $('#col3').addClass('animate__backInRight');
        }, {
            offset: '100%'
        });

        $('#card1').waypoint(function () {
            $('#card1').addClass('animate__backInLeft');
        }, {
            offset: '100%'
        });

        $('#card2').waypoint(function () {
            $('#card2').addClass('animate__zoomIn');
        }, {
            offset: '100%'
        });

        $('#card3').waypoint(function () {
            $('#card3').addClass('animate__backInRight');
        }, {
            offset: '100%'
        });

        $('#whydiv').waypoint(function () {
            $('#whydiv').addClass('animate__backInLeft');
        }, {
            offset: '100%'
        });

        $('#cardDiv').waypoint(function () {
            $('#cardDiv').addClass('animate__backInRight');
        }, {
            offset: '100%'
        });

        $('#profcard').waypoint(function () {
            $('#profcard').addClass('animate__zoomIn');
        }, {
            offset: '100%'
        });
    });
</script>
</body>
</html>