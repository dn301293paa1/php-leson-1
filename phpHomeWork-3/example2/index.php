<?php
require_once 'data/dataManager.php';
require_once 'data/DisplayData.php';
require_once 'data/SaveData.php';
require_once 'User/Authenticator.php';
require_once 'User/ProfileManager.php';
require_once 'User/User.php';
require_once 'File/File.php';
require_once 'File/FileManager.php';
require_once 'Order/Order.php';
require_once 'Order/OrderProcessor.php';
require_once 'Order/OrderInfoDisplay.php';


$authenticator = new Authenticator();
$profileManager = new ProfileManager();

$user = new User($authenticator, $profileManager);


$username = 'Test';
$password = 'password';
$role = 'user';
$user->authenticate($username, $password, $role);
$userId = 123;
$user->displayProfile($userId);


