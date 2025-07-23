<?php
session_start();
include 'db.php';

// Hardcoded demo users
$users = [
    'client' => [
        'username' => 'client1',
        'password' => 'clientpass'
    ],
    'admin' => [
        'username' => 'admin1',
        'password' => 'adminpass'
    ]
];

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';
$usertype = $_POST['usertype'] ?? '';

if ($usertype === 'client' && $username === $users['client']['username'] && $password === $users['client']['password']) {
    $_SESSION['username'] = $username;
    $_SESSION['usertype'] = 'client';
    header('Location: ../client_dashboard.php');
    exit();
} elseif ($usertype === 'admin' && $username === $users['admin']['username'] && $password === $users['admin']['password']) {
    $_SESSION['username'] = $username;
    $_SESSION['usertype'] = 'admin';
    header('Location: ../admin_dashboard.php');
    exit();
} else {
    // Redirect back to login with error
    header('Location: ../index.html?error=1');
    exit();
}
?> 