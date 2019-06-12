<?php
/**
 * Created by IntelliJ IDEA.
 * User: eftimije
 * Date: 13.6.2019
 * Time: 00:09
 */


include  "header.php";

if(isset($_GET['store'])) {

    $storeName=$_GET['store'];

}

?>
    <div class="mapa">
        <iframe width="900" height="500" frameborder="0" style="border:0 "
                src="https://www.google.com/maps/embed/v1/search?q=<?=$storeName?>+Slovenija+Maribor&key=AIzaSyDBdSDsXj7LBupenVmQ18GUlaQvoLYNCrA" allowfullscreen>
        </iframe>
    </div>

<?php

include "footer.php";

?>