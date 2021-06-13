<?php
/* upload one file */
$upload_dir = 'csv';
$name = basename($_FILES["myfile"]["name"]);
$target_file = "$upload_dir/$name";

if (!move_uploaded_file($_FILES["myfile"]["tmp_name"], $target_file))
    echo 'error: '.$_FILES["myfile"]["error"].' see /var/log/apache2/error.log for permission reason';
else {
    if (isset($_POST['data'])) print_r($_POST['data']);
    echo "\n filename : {$name}";
}
