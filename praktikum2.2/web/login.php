<?php
/**
 * Created by IntelliJ IDEA.
 * User: Bojana
 * Date: 03.6.2019
 * Time: 00:13
 */
include "header.php";
?>

    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-sm-6">
                <div class="product-details">
                    <div class="section-title">
                        <h3 class="title">Login</h3>
                    </div>
    <form action="login.inc.php" method="post">
    <div class="form-group">
        <input class="input" type="text" name="mailuid" placeholder="Username">
    </div>
    <div class="form-group">
        <input class="input" type="password" name="pwd" placeholder="Password">
    </div>
        <button  class="primary-btn cta-btn" type="submit" name="login-submit">Login</button>
    </form>
    </div>
            </div>
        </div>
    </div>
<br>
<?php
//require "login.inc.php";
include "footer.php";