<?php

if(isset($_SESSION['user_deleted_successfully'])){
    echo '<div class="alert alert-success">'.$_SESSION["user_deleted_successfully"].'</div>';


    unset($_SESSION['user_deleted_successfully']);

}

if(isset($_SESSION['user_deleted_no_successfully'])){
    echo '<div class="alert alert-danger">'.$_SESSION["user_deleted_no_successfully"].'</div>';
    unset($_SESSION['user_deleted_no_successfully']);
}


