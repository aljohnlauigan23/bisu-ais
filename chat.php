<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once 'config.php';
require_once 'helper.php';

if (empty($_SESSION['logged']) || ($_SESSION['logged'] == 'guest') || ($_SESSION['logged']['User_Type'] == 'admin')) {
    header('Location: ./index.php');
    die();
}

include_once 'models/sql_alumni.php';
$sql = new SQL_Alumni;

$user_key = $_SESSION['logged']['User_Key'];
$_SESSION['logged_profile'] = $sql->getUserProfile($user_key);
$_POST['batch_sel'] = $_SESSION['logged_profile']['Batch'];
$_POST['course_sel'] = $_SESSION['logged_profile']['Course_Name'];
$_POST['department_sel'] = $_SESSION['logged_profile']['Department'];

if (isset($_POST['send']) && $_POST['send'] == 'Chat') {
    if (!empty($_POST['chat_msg'])) {
        $sql->addChat($_POST['chat_msg'], $user_key);
    } else {
        $_POST['warning'] = 'Empty chat message.';
    }
}

$_SESSION['chat_room'] = $sql->getChatData($user_key);
require 'views/ui_chat.php';

?>