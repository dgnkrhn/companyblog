<?php
include "config.php";

$username = mysqli_real_escape_string($db,$_POST['username']);
$password = mysqli_real_escape_string($db,$_POST['password']);

if ($username != "" && $password != ""){

    $sql_query = "SELECT id FROM Users WHERE ( username=\"$username\" OR email=\"$email\") AND password=\"$password\"";
    $result = mysqli_query($db, $sql_query);
    $row = mysqli_fetch_array($result);

    $count = $row['id'];

    if ($count > 0) {
        $row = mysqli_fetch_assoc($result);
        //echo 1;
        echo ($count);
        //echo ('{"userid":' . $row["id"] . ', "islogin":true, "err":""}');
    } else {
        echo 0;
        //echo ('{"userid":-1, islogin":false, "err":"User not found."}');
        //echo ('{"userid":-1, islogin":false, "err":"User not found."}');
    }

    mysqli_close($db);

}
?>