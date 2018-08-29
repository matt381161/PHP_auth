<?php

namespace pro1\Model;

require('DBModel.php');
require('DBdata.php');

use pro1\Model\DBaccess;
use pro1\Model\DBconfig;

if (isset($_REQUEST['email'])) {
    $email = $_REQUEST['email'];
    $DB = new DBaccess();
    if ($DB->connect()) {
        $conn = mysqli_connect(
                    DBconfig::$servername,
                    DBconfig::$username,
                    DBconfig::$password,
                    DBconfig::$dbname
                );
        $sql = "select * from users where email='" . $email . "'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_fetch_row($result) == null) {
            echo '帳號可使用';
        } else {
            echo '帳號已被使用';
        }
    } else {
        return;
    }
}
