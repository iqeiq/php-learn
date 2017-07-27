<?php
    $user = $_POST["user"];

    $host = "mysql01";
    $mysqli = new mysqli($host, 'root', 'root', 'learn');
    if ($mysqli->connect_error){
        print("connect error：" . $mysqli->connect_error);
        exit();
    }
    $stmt = $mysqli->prepare("SELECT id FROM user WHERE user = ? and pass = ?");
    $stmt->bind_param('ss', $user, $_POST["pass"]);
    if($stmt->execute()) {
        $stmt->store_result();
        $stmt->bind_result($userid);
        $stmt->fetch();
        if($userid) {
            print("login success: " . $user);
            print("id: " . $userid);
        } else {
            print("login failure: " . $user);
        }
    } else {
        print("error: " . $mysqli->error);
    }
    $stmt->close();
    $mysqli->close();
?>
