# Sulu State University - Student Information and Enrollment System (SIES)

A web-based platform for managing student information, enrollment, academic records, and fee management at Sulu State University.

---

## Table of Contents

- [Overview](#overview)
- [Features](#features)
- [Tech Stack](#tech-stack)
- [System Requirements](#system-requirements)
- [Installation](#installation)
- [Configuration](#configuration)
- [Database Setup](#database-setup)
- [Running the Application](#running-the-application)
- [User Roles](#user-roles)
- [Project Structure](#project-structure)
- [API Endpoints](#api-endpoints)
- [Testing](#testing)
- [Deployment](#deployment)
- [Contributing](#contributing)
- [License](#license)
- [Contact](#contact)

---

## Overview

The **Student Information and Enrollment System (SIES)** is a centralized web application designed for Sulu State University to digitize and streamline:

- Student records management
- Course enrollment and registration
- Academic grade tracking
- Fee assessment and payment monitoring
- Administrative reporting and analytics

The system replaces manual, fragmented record-keeping with a secure, role-based platform accessible to administrators, faculty, and students.

---

## Features

### Authentication & User Management
- Secure login with hashed passwords
- Role-based access control (Admin, Faculty, Student)
- User account creation with duplicate detection
- Password reset and change functionality

### Student Information Management
- Full CRUD operations for student records
- Document upload and verification (Form 138, Good Moral, PSA Birth Certificate, TOR, etc.)
- Applicant tracking from submission to approval
- Admission type support (Freshman, Transferee, Returness, Second Degree, Graduate)

### Enrollment Module
- Course browsing and registration
- Prerequisite validation
- Section assignment with capacity management
- Enrollment status tracking (Pending, Under Review, Approved, Needs Revision)
- Enrollment locking upon approval

### Academic Records
- Grade submission by faculty
- Grade viewing for students
- Automatic GPA/CGPA computation
- Transcript generation (unofficial/official)
- Academic progress dashboard

### Fee Management
- Automatic fee assessment based on enrollment
- Payment recording and tracking
- Outstanding balance reports

### Reporting & Analytics
- Enrollment statistics
- Grade distribution reports
- Financial collection reports
- Custom report builder (by school year, program, year level)

### Security & Compliance
- Data encryption in transit and at rest
- Audit logging of user activities
- Compliance with Philippine Data Privacy Act (RA 10173)

---

## Tech Stack

| Layer | Technology |
|-------|-----------|
| **Frontend** | React.js / Laravel Blade + Bootstrap / Tailwind CSS |
| **Backend** | Node.js + Express / Laravel (PHP) |
| **Database** | MySQL / PostgreSQL |
| **Authentication** | JWT / Laravel Sanctum |
| **Hosting** | AWS / DigitalOcean / On-premises |
| **Version Control** | Git + GitHub |

---

## System Requirements

### Development Environment
- **Node.js** v18+ (if using Node.js backend) **OR** **PHP** 8.1+ with Composer (if using Laravel)
- **MySQL** 8.0+ or **PostgreSQL** 14+
- **Git**
- Modern web browser (Chrome, Firefox, Edge, Safari)

### Production Environment
- Linux server (Ubuntu 22.04 LTS recommended)
- 2+ CPU cores, 4GB+ RAM
- 20GB+ storage
- SSL certificate (Let's Encrypt recommended)

---

## Installation

### 1. Clone the Repository

```bash
git clone https://github.com/your-org/ssu-sies.git
cd ssu-sies