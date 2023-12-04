<?php require_once "controllerUserData.php"; ?>

<?php
$page_title = 'Edit Courses';
require_once('includes/load.php');

// Set Asia/Manila timezone
date_default_timezone_set('Asia/Manila');

$courses = find_by_id('courses', (int)$_GET['id']);
$all_categories = find_all('courses_category');

if (!$courses) {
    $session->msg("d", "Missing courses id.");
    redirect('courses.php');
}

if (isset($_POST['courses'])) {
    $req_fields = array('course_name','course_code',  'course_description','course_category',  'instructor_first_name', 'instructor_last_name', 'start_date', 'end_date');
    validate_fields($req_fields);

    if (empty($errors)) {
        $c_code  = remove_junk($db->escape($_POST['course_code']));
        $c_name  = remove_junk($db->escape($_POST['course_name']));
        $c_cat   = (int)$_POST['course_category'];
        $c_descri   = remove_junk($db->escape($_POST['course_description']));
        $c_fname   = remove_junk($db->escape($_POST['instructor_first_name']));
        $c_lname   = remove_junk($db->escape($_POST['instructor_last_name']));
        $c_sdate   = remove_junk($db->escape($_POST['start_date']));
        $c_edate  = remove_junk($db->escape($_POST['end_date']));

        $date = make_date();

        $query = "UPDATE courses SET";
        $query .= "code = '{$c_code}',category_id ='{$p_cat}',  name ='{$c_name}', descri ='{$c_descri}',fname ='{$c_fname}',lname ='{$c_lname}',sdate ='{$c_sdate}',edate ='{$c_edate}'";
        $query .= " WHERE id ='{$courses['id']}'";

        $result = $db->query($query);

        if ($result && $db->affected_rows() === 1) {
            $session->msg('s', "courses updated ");
            redirect('courses.php', false);
        } else {
            $session->msg('d', ' Sorry failed to updated!');
            redirect('edit_courses.php?id=' . $courses['id'], false);
        }

    } else {
        $session->msg("d", $errors);
        redirect('edit_courses.php?id=' . $courses['id'], false);
    }
}
?>
<?php include_once('layouts/header-sidebar.php'); ?>

<div class="row">
    <div class="panel panel-default">
        <div class="panel-heading">
            <strong>
                <span class="glyphicon glyphicon-th"></span>
                <span>Edit courses</span>
            </strong>
        </div>
        <div class="panel-body">
            <div class="col-md-7">
                <form method="post" action="edit_courses.php?id=<?php echo (int)$courses['id'] ?>">
                    <div class="form-group">
                            <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="qty">Course Name</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="name"
                                            value="<?php echo remove_junk($courses['course_name']); ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="qty">Course Code</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="code"
                                            value="<?php echo remove_junk($courses['course_code']); ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="qty">Description</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="descri"
                                            value="<?php echo remove_junk($courses['course_description']); ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="qty">Instructor First Name</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="fname"
                                            value="<?php echo remove_junk($courses['instructor_first_name']); ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="qty">Instructor Last Name</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="lname"
                                            value="<?php echo remove_junk($courses['instructor_last_name']); ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="qty">Start date</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="sdate"
                                            value="<?php echo remove_junk($courses['start_date']); ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="qty">End Date</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="edate"
                                            value="<?php echo remove_junk($courses['end_date']); ?>">
                                    </div>
                                </div>
                                <button type="submit" name="courses" class="btn btn-danger">Update</button>
                            </div>
                        </div> 
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<style>
    .row {
        margin-left: calc(1 * var(--bs-gutter-x));
    }.btn-danger {
    --bs-btn-color: #000;
    --bs-btn-bg: #1565c0;
    --bs-btn-border-color: #1565c0;
    --bs-btn-hover-color: #fff;
    --bs-btn-hover-bg: #198754;
    --bs-btn-hover-border-color: #1565c0;
    --bs-btn-focus-shadow-rgb: 225,83,97;
    --bs-btn-active-color: #fff;
    --bs-btn-active-bg: #1565c0;
    --bs-btn-active-border-color: #1565c0;
    --bs-btn-active-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.125);
    --bs-btn-disabled-color: #1565c0;
    --bs-btn-disabled-bg: #1565c0;
    --bs-btn-disabled-border-color: #1565c0;
    }   
</style>
<?php include_once('layouts/main-footer.php'); ?>
