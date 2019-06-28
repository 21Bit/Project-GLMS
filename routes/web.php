<?php

Auth::routes(['verify' => true]);

Auth::routes();

// =========  teacher-end Route File ========= //
include('web/teacher-end.php');
// ========= end of teacher-end Route File ========= //

// =========  Front-end Route File ========= //
include('web/front-end.php');
// ========= end of Front-end Route File ========= //

// =========  Student-end Route File ========= //
include('web/student-end.php');
// ========= end of Student-end Route File ========= //


// =========  Back-end Route File ========= //
include('web/back-end.php');
// ========= end of Back-end Route File ========= //


