<?php
// ============================================================
// PUBLIC HOMEPAGE
// Sulu State University - Enrollment System
// ============================================================

define('SSU_SYSTEM', true);

require_once __DIR__ . '/config/constants.php';
require_once __DIR__ . '/config/session.php';
require_once __DIR__ . '/config/database.php';
require_once __DIR__ . '/includes/functions.php';

$pageTitle = 'Home';

// ------------------------------------------------------------
// Fetch live stats from the database
// ------------------------------------------------------------
try {
    $totalStudents  = (int) db()->query("SELECT COUNT(*) FROM students")->fetchColumn();
    $totalPrograms  = (int) db()->query("SELECT COUNT(*) FROM programs WHERE status='active'")->fetchColumn();
    $totalSubjects  = (int) db()->query("SELECT COUNT(*) FROM subjects WHERE status='active'")->fetchColumn();
    $totalSections  = (int) db()->query("SELECT COUNT(*) FROM sections WHERE status='open'")->fetchColumn();
} catch (Exception $e) {
    $totalStudents = $totalPrograms = $totalSubjects = $totalSections = 0;
}

// ------------------------------------------------------------
// Fetch active programs
// ------------------------------------------------------------
$programs = db()->query("SELECT program_id, program_code, program_name, description, total_units, duration_years
                         FROM programs WHERE status='active' ORDER BY program_id")->fetchAll();

$programIcons = [
    'BSCS' => ['icon' => 'fa-laptop-code', 'class' => 'bscs'],
    'BSIT' => ['icon' => 'fa-network-wired', 'class' => 'bsit'],
    'BSIS' => ['icon' => 'fa-chart-line', 'class' => 'bsis'],
];

require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/includes/navbar.php';
?>

<!-- =============================
     HERO SECTION
     ============================= -->
<section class="hero">
    <div class="hero-content">
        <div class="hero-badge">
            <i class="fas fa-graduation-cap"></i> Sulu State University
        </div>
        <h1>
            Welcome to the <span>Enrollment System</span>
        </h1>
        <p>
            Your gateway to a fast, secure, and paperless academic experience.
            Enroll in subjects, view your schedule, track your grades, and manage your
            student records — all in one place.
        </p>
        <div class="hero-buttons">
            <?php if (is_logged_in()): ?>
                <a href="<?= is_admin() ? BASE_URL . 'admin/dashboard.php' : BASE_URL . 'student/dashboard.php' ?>" class="btn-hero-primary">
                    <i class="fas fa-tachometer-alt"></i> Go to Dashboard
                </a>
            <?php else: ?>
                <a href="<?= BASE_URL ?>auth/register.php" class="btn-hero-primary">
                    <i class="fas fa-user-plus"></i> Get Started
                </a>
                <a href="<?= BASE_URL ?>auth/login.php" class="btn-hero-outline">
                    <i class="fas fa-sign-in-alt"></i> Sign In
                </a>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- =============================
     STATS BAR
     ============================= -->
<div class="container">
    <div class="stats-bar">
        <div class="row g-0">
            <div class="col-md-3 col-6">
                <div class="stat-item">
                    <div class="stat-icon"><i class="fas fa-user-graduate"></i></div>
                    <div class="stat-number" data-target="<?= $totalStudents ?>">0</div>
                    <div class="stat-label">Enrolled Students</div>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="stat-item">
                    <div class="stat-icon"><i class="fas fa-book"></i></div>
                    <div class="stat-number" data-target="<?= $totalPrograms ?>">0</div>
                    <div class="stat-label">Degree Programs</div>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="stat-item">
                    <div class="stat-icon"><i class="fas fa-file-alt"></i></div>
                    <div class="stat-number" data-target="<?= $totalSubjects ?>">0</div>
                    <div class="stat-label">Active Subjects</div>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="stat-item">
                    <div class="stat-icon"><i class="fas fa-chalkboard-teacher"></i></div>
                    <div class="stat-number" data-target="<?= $totalSections ?>">0</div>
                    <div class="stat-label">Open Sections</div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- =============================
     FEATURES SECTION
     ============================= -->
<section class="section" id="features">
    <div class="container">
        <div class="section-header">
            <div class="section-tag">What We Offer</div>
            <h2>Everything You Need in One System</h2>
            <p>Simplify your academic life with powerful features designed for students, faculty, and staff of the College of Computing Studies.</p>
        </div>

        <div class="row g-4">
            <div class="col-lg-4 col-md-6">
                <div class="feature-card">
                    <div class="feature-icon"><i class="fas fa-user-plus"></i></div>
                    <h4>Online Enrollment</h4>
                    <p>Enroll in your subjects in just a few clicks — no more long lines or paper forms.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="feature-card">
                    <div class="feature-icon"><i class="fas fa-calendar-alt"></i></div>
                    <h4>Real-Time Schedule</h4>
                    <p>View your class schedule instantly — days, times, rooms, and instructors — all updated live.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="feature-card">
                    <div class="feature-icon"><i class="fas fa-chart-bar"></i></div>
                    <h4>Grade Tracking</h4>
                    <p>Monitor your academic performance with secure access to your grades every semester.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="feature-card">
                    <div class="feature-icon"><i class="fas fa-bell"></i></div>
                    <h4>Instant Notifications</h4>
                    <p>Get real-time updates on enrollment approvals, announcements, and deadlines.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="feature-card">
                    <div class="feature-icon"><i class="fas fa-shield-alt"></i></div>
                    <h4>Secure &amp; Private</h4>
                    <p>Your data is protected with industry-standard encryption and secure authentication.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="feature-card">
                    <div class="feature-icon"><i class="fas fa-mobile-alt"></i></div>
                    <h4>Responsive Design</h4>
                    <p>Access the system anytime, anywhere — on desktop, tablet, or mobile device.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- =============================
     ABOUT SECTION
     ============================= -->
<section class="section section-alt" id="about">
    <div class="container">
        <div class="about-grid">

            <div class="about-image-wrap">
                <div class="about-image">
                    <div style="text-align:center;padding:30px;">
                        <img src="<?= logo_url() ?>" alt="SSU Logo" style="max-width:180px;background:#fff;padding:14px;border-radius:50%;box-shadow:0 10px 40px rgba(0,0,0,0.2);">
                    </div>
                </div>
                <div class="about-badge">
                    <div class="num">1982</div>
                    <div class="lbl">Founded</div>
                </div>
            </div>

            <div class="about-text">
                <div class="section-tag" style="padding-left:0;padding-right:0;">About the System</div>
                <h2>Empowering the Future of Computing Education</h2>
                <p>
                    The Student Information and Enrollment System of the College of Computing Studies
                    is designed to modernize and streamline academic processes at Sulu State University.
                    Built with security, speed, and usability in mind, it serves students, faculty, and
                    administrators with a unified digital platform.
                </p>

                <ul class="about-list">
                    <li><i class="fas fa-check-circle"></i> <span>Fully online enrollment and subject registration</span></li>
                    <li><i class="fas fa-check-circle"></i> <span>Real-time class schedules and instructor assignments</span></li>
                    <li><i class="fas fa-check-circle"></i> <span>Secure grade viewing and academic record management</span></li>
                    <li><i class="fas fa-check-circle"></i> <span>Automated notifications and announcements</span></li>
                    <li><i class="fas fa-check-circle"></i> <span>Comprehensive reporting for administrators</span></li>
                </ul>

                <a href="<?= BASE_URL ?>auth/register.php" class="btn-hero-primary" style="background: <?= COLOR_PRIMARY ?>; color:#fff; box-shadow: 0 8px 24px rgba(10,42,102,0.25);">
                    <i class="fas fa-rocket"></i> Get Started Now
                </a>
            </div>
        </div>
    </div>
</section>

<!-- =============================
     PROGRAMS SECTION
     ============================= -->
<section class="section" id="programs">
    <div class="container">
        <div class="section-header">
            <div class="section-tag">Our Programs</div>
            <h2>Degree Programs Offered</h2>
            <p>Choose from our industry-aligned computing programs designed to prepare you for the digital future.</p>
        </div>

        <div class="row g-4">
            <?php foreach ($programs as $p):
                $code = $p['program_code'];
                $meta = $programIcons[$code] ?? ['icon' => 'fa-graduation-cap', 'class' => 'bscs'];
            ?>
                <div class="col-lg-4 col-md-6">
                    <div class="program-card">
                        <div class="program-header <?= $meta['class'] ?>">
                            <i class="fas <?= $meta['icon'] ?>"></i>
                            <h3><?= e($code) ?></h3>
                            <p><?= e($p['program_name']) ?></p>
                        </div>
                        <div class="program-body">
                            <p><?= e($p['description']) ?></p>
                            <div class="program-meta">
                                <span><i class="fas fa-clock"></i> <?= (int)$p['duration_years'] ?> Years</span>
                                <span><i class="fas fa-book"></i> <?= (int)$p['total_units'] ?> Units</span>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- =============================
     CTA SECTION
     ============================= -->
<section class="section">
    <div class="container">
        <div class="cta-section">
            <h2>Ready to Begin Your Journey?</h2>
            <p>
                Join hundreds of students who have made their academic life easier with our
                modern enrollment system. Register today and take control of your future.
            </p>
            <div class="cta-buttons">
                <?php if (is_logged_in()): ?>
                    <a href="<?= is_admin() ? BASE_URL . 'admin/dashboard.php' : BASE_URL . 'student/dashboard.php' ?>" class="btn-hero-primary">
                        <i class="fas fa-tachometer-alt"></i> Go to Dashboard
                    </a>
                <?php else: ?>
                    <a href="<?= BASE_URL ?>auth/register.php" class="btn-hero-primary">
                        <i class="fas fa-user-plus"></i> Create Account
                    </a>
                    <a href="<?= BASE_URL ?>auth/login.php" class="btn-hero-outline">
                        <i class="fas fa-sign-in-alt"></i> Sign In
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>