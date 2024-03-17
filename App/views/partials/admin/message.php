<?php

if(isset($_SESSION['user_deleted_successfully'])){
    echo '<div class="alert alert-success">'.$_SESSION["user_deleted_successfully"].'</div>';
    unset($_SESSION['user_deleted_successfully']);
}

if(isset($_SESSION['user_deleted_no_successfully'])){
    echo '<div class="alert alert-danger">'.$_SESSION["user_deleted_no_successfully"].'</div>';
    unset($_SESSION['user_deleted_no_successfully']);
}


if(isset($_SESSION['userUpdatedSuccessfully'])){
    echo '<div class="alert alert-success">'.$_SESSION["userUpdatedSuccessfully"].'</div>';
    unset($_SESSION['userUpdatedSuccessfully']);
}

if(isset($_SESSION['userRegisteredSuccessfully'])){
    echo '<div class="alert alert-success">'.$_SESSION["userRegisteredSuccessfully"].'</div>';
    unset($_SESSION['userRegisteredSuccessfully']);
}
if(isset($_SESSION['youHaveNotPermission'])){
    echo '<div class="alert alert-danger">'.$_SESSION["youHaveNotPermission"].'</div>';
    unset($_SESSION['youHaveNotPermission']);
}
if(isset($_SESSION['VideoUploadedSuccessfully'])){
    echo '<div class="alert alert-success">'.$_SESSION["VideoUploadedSuccessfully"].'</div>';
    unset($_SESSION['VideoUploadedSuccessfully']);
}
if(isset($_SESSION['completeUserInfo'])){
    echo '<div class="alert alert-danger">'.$_SESSION["completeUserInfo"].'</div>';
    unset($_SESSION['completeUserInfo']);
}
if(isset($_SESSION['completeUserCover'])){
    echo '<div class="alert alert-danger">'.$_SESSION["completeUserCover"].'</div>';
    unset($_SESSION['completeUserCover']);
}
if(isset($_SESSION['userCompleteInfoSuccessfully'])){
    echo '<div class="alert alert-success">'.$_SESSION["userCompleteInfoSuccessfully"].'</div>';
    unset($_SESSION['userCompleteInfoSuccessfully']);
}

//userRegisteredSuccessfully