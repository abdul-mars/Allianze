<?php
    include_once 'includes/header.php';
    $email = $_SESSION['email'];
    $insurNo = $_SESSION['insurNo'];
    $sql = mysqli_query($con, "SELECT * FROM `personal` WHERE email = '$email'");
    if (mysqli_num_rows($sql) < 1) {
        header("location: details.php");
    }
        $cssClass1 = 'ads';
        $cssClass = 'djlffds';
?>
<!-- Showcase -->
<section class="bg-dark text-light p-5 p-lg-0 pt-lg- text-center text-sm-start">
    <div class="container">
        <div class="d-sm-flex align-items-center justify-content-between">
            <div class="col-md-6">
                <?php
                    if (@$_GET['msg']) { ?>
                        <?php if(@$_GET['cssClass']){ $cssClass = $_GET['cssClass'] ?>
                        <div class="alert <?= $cssClass; ?> text-center" role="alert">
                            <i class="<?php if($cssClass == 'alert-danger'){ echo 'fas fa-exclamation-triangle'; }else{echo 'fas fa-check';} ?>"></i> <?= $_GET['msg']; ?>
                        </div>
                    <?php } }
                ?>
                <h1>Let your vehicle be <span class="text-warning">Insured</span></h1>
                <p class="lead my-4">vehicle for you
                    At Allianze vehicle insurance we take care and cost of your vehicle in case of damage, accident, theft and many more. With us you dont need to worry about your car expenses.
                </p>
                <!-- <button class="btn btn-primary btn-lg " data-bs-toggle="" data-bs-target="insured.php">Get Ensured</button> -->
                <?php $sql = mysqli_query($con, "SELECT * FROM `insured` WHERE insure_no = '$insurNo'");
                    if (mysqli_num_rows($sql) < 1) { ?>
                        <a href="insured.php" class="btn btn-primary btn-lg" <?php if(mysqli_num_rows($sql) > 0) echo 'style="pointer-events: none"'; ?>>Get Ensured</a>
                    <?php } else { ?>
                        <button class="btn btn-primary btn-lg" onclick="alreadyInsured()">Get Insured</button>
                    <?php }
                ?>
                <?php $sql = mysqli_query($con, "SELECT * FROM `claims` WHERE insure_no = '$insurNo'");
                    if (mysqli_num_rows($sql) < 1) { ?>
                        <a href="claims.php" class="btn btn-light btn-lg ">Claim Insurance</a> 
                    <?php } else { ?>
                        <button class="btn btn-light btn-lg" onclick="alreadyClaim()">Claim Insurance</button>
                    <?php }
                ?><br> <p id="alreadyInsured" class="text-light"></p>
                <!-- <a href="claims.php" class="btn btn-light btn-lg ">Claim Insurance</a> <br> <p id="alreadyInsured" class="text-light"></p> -->
            </div>
            <script type="text/javascript">
                // $(document).ready(function(){
                    function alreadyInsured() {
                        // $('#alreadyInsured').html('You Already Insured Your Vehicle');
                        document.getElementById('alreadyInsured').innerHTML = 'You Already Insured Your Vehicle';
                    }
                    document.getElementById('alreadyInsured').click(function(){
                        alreadyInsured();
                    });
                    function alreadyClaim() {
                        // $('#alreadyInsured').html('You Already Insured Your Vehicle');
                        document.getElementById('alreadyInsured').innerHTML = 'You Have Insurance Claim That Is Served Yet';
                    }
                    document.getElementById('alreadyClaim').click(function(){
                        alreadyInsured();
                    });
                // })
            </script>
            <img class="img-fluid w-50 d-none d-sm-block" src="img/car 5.png" alt="image">
        </div>
    </div>
</section>
<!-- Boxes -->
<section class="p-5" id="services">
    <div class="container">
        <h2 class="text-center mb-4">What We Cover</h2>
        <div class="row text-center g-4">
            <div class="col-md-6">
                <div class="card h-100 bg-primary text-light">
                    <div class="card-body text-center">
                        <div class="h1 mb-3">
                        </div>
                        <h3 class="card-titile mb-3">Accident</h3>
                        <p class="card-text">
                            Been in a car accident? Keep calm, we cover damages your car sustains in an accident.
                        </p>
                        <a href="#" class="btn btn-dark">Read More</a>
                    </div>
                </div>
            </div>

            <!-- <div class="col-md-6">
                <div class="card h-100 bg-primary text-light">
                    <div class="card-body text-center">
                        <div class="h1 mb-3">
                        </div>
                        <h3 class="card-titile mb-3">Personal accident cover</h3>
                        <p class="card-text">
                            Your safety is our priority, in case of injuries due to a car.
                        </p>
                        <a href="#" class="btn btn-dark">Read More</a>
                    </div>
                </div>
            </div> -->
            <div class="col-md-6">
                <div class="card h-100 bg-dark text-light">
                    <div class="card-body text-center">
                        <div class="h1 mb-3">
                        </div>
                        <h3 class="card-titile mb-3">Natural calamities</h3>
                        <p class="card-text">
                            Calamities can wreak havoc and your car is not immune to them, but your finances are!
                        </p>
                        <a href="#" class="btn btn-primary">Read More</a>
                    </div>
                </div>
            </div>
            <!-- <div class="col-md-6">
                <div class="card h-100 bg-primary text-light">
                    <div class="card-body text-center">
                        <div class="h1 mb-3">
                        </div>
                        <h3 class="card-titile mb-3">Third-party liability</h3>
                        <p class="card-text">
                            We cover damages to a third party property or injuries sustained by a third party.
                        </p>
                        <a href="#" class="btn btn-dark">Read More</a>
                    </div>
                </div>
            </div> -->
            <div class="col-md-6">
                <div class="card h-100 bg-dark text-light">
                    <div class="card-body text-center">
                        <div class="h1 mb-3">
                        </div>
                        <h3 class="card-titile mb-3">Fire</h3>
                        <p class="card-text">
                            We won't let a fire or an explosion burn your finances to ashes, be rest assured your car.
                        </p>
                        <a href="#" class="btn btn-primary">Read More</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card h-100 bg-primary text-light">
                    <div class="card-body text-center">
                        <div class="h1 mb-3">
                            <!-- <i class="bi bi-people"></i> -->
                        </div>
                        <h3 class="card-titile mb-3">Theft</h3>
                        <p class="card-text">
                            Your car getting stolen could be your worst nightmare come true, but we ensure your peace.
                        </p>
                        <a href="#" class="btn btn-dark">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Learn Sections -->
<section id="learn" class="p-5">
    <div class="container">
        <div class="row align-items-center justify-content-between">
            <div class="col-md">
                <img src="img/car icon.png" class="img-fluid" alt="">
            </div>
            <div class="col-md p-5">
                <h4>Are you looking for a vehicle insurance in Ghana?</h4>
                <p class="">
                    At Alliance Insurance you can compare over 28 Ghanaian vehicle insurance companies. Comparing vehicle insurance at  is Alliance Insurance fast and easy. Whether you want to beat your current provider’s renewal quote or insure a new vehicle.
                </p>
                <!-- <a href="#" class="btn btn-light mt-3">
                    <i class="bi bi-chevron-right"></i> Read More
                </a> -->
            </div>
        </div>
    </div>
</section>
<section id="contact" class="p-4 bg-dark text-light">
    <div class="container">
        <div class="row align-items-center justify-content-between">
            <div class="col-md">
                <img src="img/car 6.png" class="img-fluid" alt="">
            </div>
            <div class="col-md p-">
                <h4>Contact Up on <a href="tel:+233249393898">+233249393898</a> or leave a message</h4>
                <!-- <p class="lead"> -->
                   <form action="handlers/messages_handler.php?operation=msg_send" method="post">
                       <div class="form-group">
                           <div class="row">
                            <?php
                                $sql = mysqli_query($con, "SELECT `firstname`, `lastname`, `email` FROM logins WHERE email = '$email'");
                                $data = mysqli_fetch_assoc($sql);
                                $name = $data['lastname'].' '.$data['firstname'];
                            ?>
                                <div class="mb-1">
                                    <label for="email" class="form-label">Email address</label>
                                    <input type="email" name="email" value="<?= $data['email']; ?>" class="form-control" id="email" placeholder="Your email address">
                                </div>
                                <div class="mb-1">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" name="name" value="<?= $name; ?>" class="form-control" id="name" placeholder="Your name">
                                </div>
                                <div class="mb-1">
                                    <label for="message" class="form-label">Message</label>
                                    <textarea class="form-control" name="message" id="message" rows="3"></textarea>
                                </div>
                                <div>
                                    <button class="btn btn-light" type="submit" name="msgSubmit">Send</button>
                                </div>
                           </div>
                       </div>   
                   </form>
                <!-- </p> -->
               <!--  <a href="#" class="btn btn-light mt-3">
                    <i class="bi bi-chevron-right"></i> Read More
                </a> -->
            </div>
        </div>
    </div>
</section>
<!-- Question Accordion -->
<section id="questions" class="p-5">
    <div class="container">
        <h2 class="text-center mb-4">Frequently Asked Questions</h2>
        <div class="accordion accordion-flush" id="questions">
            <!-- accordion item 1 -->
            <div class="accordion-item">
                <h2 class="accordion-header">
                <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#question-one">
                Where exactly are you located?
                </button>
                </h2>
                <div id="question-one" class="accordion-collapse collapse" data-bs-parent="#questions">
                    <div class="accordion-body">
                        Our Head office is located at the Tamale Technical University (TaTU) but we have branch offices around the nation
                    </div>
                </div>
            </div>
            <!-- accordion item 2 -->
            <div class="accordion-item">
                <h2 class="accordion-header">
                <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#question-two">
                How much does it cost to sign up?
                </button>
                </h2>
                <div id="question-two" class="accordion-collapse collapse" data-bs-parent="#questions">
                    <div class="accordion-body">
                        It costs nothing to sign up. signing up an account is absolutely free you only need to pay for the insurance that you registed
                    </div>
                </div>
            </div>
            <!-- accordion item 3 -->
            <div class="accordion-item">
                <h2 class="accordion-header">
                <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#question-three">
                What do i need to know?
                </button>
                </h2>
                <div id="question-three" class="accordion-collapse collapse" data-bs-parent="#questions">
                    <div class="accordion-body">
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Expedita, consequuntur neque totam atque cum dignissimos quod eveniet eum illum iusto laudantium labore unde nemo consectetur quam corporis voluptatum delectus molestias quibusdam architecto enim tenetur hic reprehenderit ut? Ullam a delectus quidem dolorum. Excepturi consectetur vero earum expedita mollitia ab at?
                    </div>
                </div>
            </div>
            <!-- accordion item 4 -->
            <div class="accordion-item">
                <h2 class="accordion-header">
                <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#question-four">
                How do i sign up?
                </button>
                </h2>
                <div id="question-four" class="accordion-collapse collapse" data-bs-parent="#questions">
                    <div class="accordion-body">
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Expedita, consequuntur neque totam atque cum dignissimos quod eveniet eum illum iusto laudantium labore unde nemo consectetur quam corporis voluptatum delectus molestias quibusdam architecto enim tenetur hic reprehenderit ut? Ullam a delectus quidem dolorum. Excepturi consectetur vero earum expedita mollitia ab at?
                    </div>
                </div>
            </div>
            <!-- accordion 5 -->
            <div class="accordion-item">
                <h2 class="accordion-header">
                <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#question-five">
                What kind of vehicles do your insurance cover?
                </button>
                </h2>
                <div id="question-five" class="accordion-collapse collapse" data-bs-parent="#questions">
                    <div class="accordion-body">
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Expedita, consequuntur neque totam atque cum dignissimos quod eveniet eum illum iusto laudantium labore unde nemo consectetur quam corporis voluptatum delectus molestias quibusdam architecto enim tenetur hic reprehenderit ut? Ullam a delectus quidem dolorum. Excepturi consectetur vero earum expedita mollitia ab at?
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Instructors -->
<section id="instructors" class="p-5 bg-primary">
    <div class="container">
        <h2 class="text-center text-white">Our Developers</h2>
        <p class="lead text-center text-white mb-5">
            Our Developers all have 3+ years working as web Developers in the industry
        </p>
        <div class="row g-4">
            <div class="col-md-6 col-lg-4">
                <div class="card bg-light h-100">
                    <div class="card body text-center">
                        <img src="img/rashid.jpg" class="rounded-circle mb-3" alt="">
                        <h3 class="card-title mb-3">John Doe</h3>
                        <p class="card-text">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium, consectetur molestias. Est tempore eos enim.
                            <br><br>
                            <a href="#"><i class="fab fa-twitter fa-2x text-dark mx-1"></i></a>
                            <a href="#"><i class="fab fa-facebook-square fa-2x text-dark mx-1"></i></a>
                            <a href="#"><i class="fab fa-linkedin fa-2x text-dark mx-1"></i></a>
                            <a href="#"><i class="fab fa-instagram fa-2x text-dark mx-1"></i></a>
                        </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="card bg-light h-100">
                        <div class="card body text-center">
                            <img src="img/rashid.jpg" class="rounded-circle mb-3" alt="">
                            <h3 class="card-title mb-3">John Doe</h3>
                            <p class="card-text">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium, consectetur molestias. Est tempore eos enim.
                                <br><br>
                                <a href="#"><i class="fab fa-twitter fa-2x text-dark mx-1"></i></a>
                                <a href="#"><i class="fab fa-facebook-square fa-2x text-dark mx-1"></i></a>
                                <a href="#"><i class="fab fa-linkedin fa-2x text-dark mx-1"></i></a>
                                <a href="#"><i class="fab fa-instagram fa-2x text-dark mx-1"></i></a>
                            </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="card bg-light h-100">
                            <div class="card body text-center">
                                <img src="img/rashid.jpg" class="rounded-circle mb-3" alt="">
                                <h3 class="card-title mb-3">John smith</h3>
                                <p class="card-text">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium, consectetur molestias. Est tempore eos enim.
                                    <br><br>
                                    <a href="#"><i class="fab fa-twitter fa-2x text-dark mx-1"></i></a>
                                    <a href="#"><i class="fab fa-facebook-square fa-2x text-dark mx-1"></i></a>
                                    <a href="#"><i class="fab fa-linkedin fa-2x text-dark mx-1"></i></a>
                                    <a href="#"><i class="fab fa-instagram fa-2x text-dark mx-1"></i></a>
                                </p>
                                    <!-- <a href="#"><i class="bi bi-twitter text-dark mx-1"></i></a>
                                    <a href="#"><i class="bi bi-facebook text-dark mx-1"></i></a>
                                    <a href="#"><i class="bi bi-linkedin text-dark mx-1"></i></a>
                                    <a href="#"><i class="bi bi-instagram text-dark mx-1"></i></a></p> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Contact and Map -->
            <section class="p-5">
                <div class="container">
                    <div class="row g-5">
                        <div class="col-md-6">
                            <h2 class="text-center mb-4">Contact Info</h2>
                            <ul class="list-group list-group-flush lead">
                                <li class="list-group-item">
                                    <span class="fw-bold">Main Location: </span> Technical University, Tamale
                                </li>
                                <li class="list-group-item">
                                    <span class="fw-bold">Our Phone: </span> +233 249 393 898
                                </li>
                                <li class="list-group-item">
                                    <span class="fw-bold">Second Phone </span> +233 249 393 898
                                </li>
                                <li class="list-group-item">
                                    <span class="fw-bold">Our Email: </span> abdulmars@gmail.com
                                </li>
                                <li class="list-group-item">
                                    <span class="fw-bold">Second Email: </span> abdulmars@gmail.com
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <!-- <h2 class="text-center mb-4">Our Location</h2> -->
                            <iframe src="https://maps.google.com/maps?q=<?php echo 'tamale-technical-university'; ?>&output=embed" frameborder="2" width="100%" height="100%"></iframe>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Newsletter -->
            <section class="bg-primary text-light p-3">
                <div class="container">
                    <div class="d-md-flex justify-content-between align-items-center">
                        <h3 class="mb-3 mb-md-0">Sign Up For Our Newsletter</h3>
                        <div class="input-group news-input">
                            <input type="text" placeholder="Enter Email" class="form-control">
                            <button class="btn btn-lg btn-dark" type="button">Subscribe</button>
                        </div>
                    </div>
                </div>
            </section>
            <div class="bg-light p-1"></div>
            
            <!-- Modal -->
            <!-- <div class="modal fade" id="enroll" tabindex="-1" aria-labelledby="enrollLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="enrollLabel">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p class="lead">Fill out this form and we will get back to you</p>
                            <form>
                                <div class="">
                                    <label for="first-name" class="col-form-label">First Name:</label>
                                    <input type="text" class="form-control" id="first-name">
                                </div>
                                <div class="">
                                    <label for="last-name" class="col-form-label">Last Name:</label>
                                    <input type="text" class="form-control" id="last-name">
                                </div>
                                <div class="">
                                    <label for="email-name" class="col-form-label">Email Name:</label>
                                    <input type="text" class="form-control" id="email-name">
                                </div>
                                <div class="">
                                    <label for="phone-name" class="col-form-label">Phone Number:</label>
                                    <input type="number" class="form-control" id="phone-name">
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
            </div> -->
<?php include_once 'includes/footer.php'; ?>