<?php
// ============================================================
// CUSTOM 404 ERROR PAGE
// ============================================================
define('SSU_SYSTEM', true);

require_once __DIR__ . '/config/constants.php';
require_once __DIR__ . '/config/session.php';
require_once __DIR__ . '/includes/functions.php';

http_response_code(404);

$isLogged = is_logged_in();
$role = $isLogged ? current_user_role() : null;

// Determine dashboard link
$dashLink = BASE_URL . 'auth/login.php';
$dashText = 'Go to Login';
if ($isLogged) {
    $dashMap = [
        'admin'     => ['url' => BASE_URL . 'admin/dashboard.php', 'label' => 'Admin Dashboard'],
        'registrar' => ['url' => BASE_URL . 'registrar/dashboard.php', 'label' => 'Registrar Dashboard'],
        'student'   => ['url' => BASE_URL . 'student/dashboard.php', 'label' => 'Student Dashboard'],
    ];
    if (isset($dashMap[$role])) {
        $dashLink = $dashMap[$role]['url'];
        $dashText = $dashMap[$role]['label'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>404 — Page Not Found — <?= SITE_NAME ?></title>
<link rel="icon" type="image/png" href="<?= logo_url() ?>">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

<style>
body {
    margin: 0;
    font-family: 'Inter', sans-serif;
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    background: linear-gradient(135deg, #0A2A66 0%, #1D4E9C 100%);
    padding: 30px 20px;
    color: #1A1F36;
}
.wrap {
    max-width: 600px;
    width: 100%;
    background: #fff;
    border-radius: 22px;
    padding: 50px 40px;
    text-align: center;
    box-shadow: 0 20px 60px rgba(0,0,0,0.25);
    position: relative;
    overflow: hidden;
}
.wrap::before {
    content: '';
    position: absolute;
    top: -100px; right: -100px;
    width: 280px; height: 280px;
    border-radius: 50%;
    background: radial-gradient(circle, rgba(244,196,48,0.18) 0%, transparent 70%);
}
.logo {
    height: 80px;
    margin-bottom: 20px;
    position: relative;
}
.err-code {
    font-size: 110px;
    font-weight: 900;
    line-height: 1;
    background: linear-gradient(135deg, #0A2A66, #1D4E9C);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    letter-spacing: -6px;
    position: relative;
}
.err-code span {
    background: linear-gradient(135deg, #F4C430, #B8860B);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}
.wrap h1 {
    color: #0A2A66;
    font-size: 26px;
    font-weight: 800;
    margin: 15px 0 10px;
    letter-spacing: -0.5px;
    position: relative;
}
.wrap p {
    color: #6B7280;
    font-size: 15px;
    line-height: 1.7;
    margin: 0 0 28px;
    position: relative;
}
.actions {
    display: flex;
    gap: 12px;
    justify-content: center;
    flex-wrap: wrap;
    position: relative;
}
.btn {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 13px 26px;
    border-radius: 11px;
    font-weight: 700;
    font-size: 14px;
    text-decoration: none;
    transition: all 0.25s;
}
.btn.primary {
    background: linear-gradient(135deg, #0A2A66, #1D4E9C);
    color: #fff;
    box-shadow: 0 6px 18px rgba(10,42,102,0.3);
}
.btn.primary:hover {
    color: #fff;
    transform: translateY(-2px);
    box-shadow: 0 10px 26px rgba(10,42,102,0.4);
}
.btn.outline {
    background: transparent;
    color: #0A2A66;
    border: 2px solid #0A2A66;
}
.btn.outline:hover {
    background: #0A2A66;
    color: #fff;
}
.foot-note {
    margin-top: 30px;
    font-size: 12.5px;
    color: #9CA3AF;
    position: relative;
}
</style>
</head>
<body>
<div class="wrap">
    <img src="<?= logo_url() ?>" alt="SSU Logo" class="logo">

    <div class="err-code">4<span>0</span>4</div>

    <h1>Page Not Found</h1>
    <p>
        The page you're looking for doesn't exist or may have been moved.
        <br>Please check the URL or use the buttons below.
    </p>

    <div class="actions">
        <a href="<?= e($dashLink) ?>" class="btn primary">
            <i class="fas fa-tachometer-alt"></i> <?= e($dashText) ?>
        </a>
        <a href="<?= BASE_URL ?>index.php" class="btn outline">
            <i class="fas fa-home"></i> Homepage
        </a>
    </div>

    <div class="foot-note">
        Sulu State University — Student Information &amp; Enrollment System
    </div>
</div>
</body>
</html>