# Community Library Management System

A community library management system built with PHP 8 and MySQL/MariaDB. Grey and white interface with yellow accents. Compatible with UwAmp, XAMPP and WAMP.

## Included
- Administrator and student accounts with role-based access
- One-time first-admin setup; public registration creates student accounts only
- Book catalogue with author, ISBN, category, copy counts and descriptions
- Record book issues against registered students with due dates
- Record returns and automatically restore available copy counts
- Member directory, borrowing history, overdue report and printable circulation report
- Password hashing, PDO prepared statements, session regeneration and CSRF checks

## Install with UwAmp
1. Copy the project folder into UwAmp's www folder.
2. Start Apache and MySQL.
3. Open phpMyAdmin and import database.sql. It creates the community_library database and tables.
4. Check config.php and change the database host, username and password if your UwAmp settings differ. Defaults are localhost, root, and an empty password.
5. Open http://localhost/community-library-management-system/setup.php.
6. Create the first administrator using a strong password (10 characters or more).
7. Sign in at login.php. Students can register through register.php.

## Important
- Complete the first administrator setup yourself before sharing the public website. The first person to finish setup becomes administrator.
- After creating the administrator, remove setup.php from the public web folder.
- Use HTTPS and a strong database password on a public host. Keep database credentials private and back up the database.
- Online reservations and automated fines are not included in this initial version; overdue loans are flagged in reports.
