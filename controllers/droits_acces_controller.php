<?php
function usersNotAcces($typeComptes = array()) {
    for($i = 0; $i<count($typeComptes); $i++) {
        if ($_SESSION['compte'] == $typeComptes[$i]) {
            header("Location: views/404.php");
        }
    }
}
