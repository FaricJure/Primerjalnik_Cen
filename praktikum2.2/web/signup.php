<?php
require "header.php";
?>
    <main>


                <?php
                if (isset($_GET["error"])) {
                    if ($_GET["error"] == "emptyfields") {
                        echo '<p class= "signuperror">Fill in all fields!</p>';
                    } else if ($_GET["error"] == "invaliduidmail") {
                        echo '<p class= "signuperror">Invalid username and e-mail!</p>';

                    } else if ($_GET["error"] == "invalidmail") {
                        echo '<p class= "signuperror">Invalid e-mail!</p>';

                    } else if ($_GET["error"] == "passwordCheck") {
                        echo '<p class= "signuperror">Your passwords do not match!</p>';

                    } else if ($_GET["error"] == "usertaken") {
                        echo '<p class= "signuperror">Username is already taken!</p>';

                    }

                } elseif (isset($_GET["signup"]) == "success") {
                    echo '<p class= "signupsuccess">Signup successful!</p>';


                }
                ?>


                    <div class="container">
                        <!-- row -->
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="product-details">
                                    <div class="section-title">
                                        <h3 class="title">Signup</h3>
                                    </div>
                                    <form class="form-signup" action="signup.inc.php" method="post">
                                        <div class="form-group">
                                            <input class="input" type="text" name="uid" placeholder="Username">
                                        </div>
                                        <div class="form-group">
                                            <input class="input" type="text" name="mail" placeholder="E-mail">
                                        </div>
                                        <div class="form-group">
                                            <input class="input" type="password" name="pwd" placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                            <input class="input" type="password" name="pwd-repeat" placeholder="Repeat password">
                                        </div>
                                        <button class="primary-btn cta-btn" type="submit" name="signup-submit">Signup</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>



    </main>

<?php
require "footer.php";
?>