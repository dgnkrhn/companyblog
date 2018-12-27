<?php
include "config.php";

    $sql_query = "SELECT p.id, u.username, p.title, p.body, p.date FROM Posts p JOIN Users u ON p.userid = u.id ORDER BY p.date";
    $result = mysqli_query($db, $sql_query);

    if (mysqli_num_rows($result) > 0) {
        $list = '';
        // output data of each row
        $postnumber = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            if ($list != '') {
                $list = $list . ',';
            }

            $list = $list . '{ "Postnumber":' . $postnumber . ',"postid":' . $row["id"] . ', "username":"' . $row["username"] . '", "title":"' .
                $row["title"] . '", "body":"' . $row["body"] . '", "date":"' . $row["date"] . '"}';

                $postnumber += 1;
        }
        //echo 1;
        
        echo ("[$list]");
        //echo json_encode($list);
        //echo ("{\"posts\":[$list], \"err\":\"\"}");
    } else {
        echo ('{"posts":[], "err":"0 results"}');
    }

    mysqli_close($db);
?>