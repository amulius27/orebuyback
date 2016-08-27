<?php
    require_once __DIR__.'/../../functions/registry.php';
    
    //Open the database connection
    $db = DBOpen();
    
    //If the user has changed, then modify the user
    $username = filter_input(INPUT_POST, 'users', FILTER_SANITIZE_SPECIAL_CHARS);
    $role = filter_input(INPUT_POST, 'role', FILTER_SANITIZE_SPECIAL_CHARS);
    $currentRole = $db->fetchColumn('SELECT role FROM member_roles WHERE username= :user', array('user' => $username));
    if($role != $currentRole) {
        $db->update('member_roles', array('username' => $username), array('role' => $role));
    }
    
    DBClose($db);
    //Return back to the dashboard
    $location = 'http://' . $_SERVER['HTTP_HOST'];
    $location = $location . dirname($_SERVER['PHP_SELF']) . '/../../dashboard.php';
    header("Location: $location");

?>