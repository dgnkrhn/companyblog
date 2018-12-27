<?php
include "config.php";

    $sql_query = "SELECT c.id, c.postid, u.username, c.comment, c.date FROM Comments c JOIN Users u ON c.userid = u.id ORDER BY c.date";
    $result = mysqli_query($db, $sql_query);

    if (mysqli_num_rows($result) > 0) {
        $list = '';
        // output data of each row
        //$commentnumber = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            if ($list != '') {
                $list = $list . ',';
            }

            $list = $list . '{"commentid":' . $row["id"] . ',"postid":' . $row["postid"] . ', "username":"' . $row["username"] . '", "comment":"' .
                $row["comment"] . '", "date":"' . $row["date"] . '"}';

                //$commentnumber += 1;
        }
        echo ("[$list]");
    } else {
        echo ('{"comment read error"}');
    }

    mysqli_close($db);
?>