<?php
$page_title = 'Students Table';
require_once('includes/load.php');
require 'vendor/autoload.php'; // Include SimpleExcel
$students = join_student_table();
// Function to get the current date and time in Asia/Manila timezone
function getCurrentDateTime() {
    $timezone = new DateTimeZone('Asia/Manila');
    $datetime = new DateTime('now', $timezone);
    return $datetime->format('Y-m-d H:i:s');
}

// Export to Excel button handling
if (isset($_POST['export_excel'])) {
    header('Content-Type: application/vnd.ms-excel');
    // Adding the date to the filename
    $filename = "course_inventory_" . date('YmdHis') . ".xls";
    header('Content-Disposition: attachment; filename="' . $filename . '"');

    echo '<table border="1">';
    echo '<tr>';
    echo '<th colspan="7" style="text-align: center;">Generated on: ' . getCurrentDateTime() . '</th>';
    echo '</tr>';
    echo '<tr>';
    echo '<th>ID</th>';
    echo '<th>First Name</th>';
    echo '<th>Last Name</th>';
    echo '<th>Date of Birth</th>';
    echo '<th>Gender</th>';
    echo '<th>Major</th>';
    echo '<th>University Email</th>';
    echo '<th>Enrolled Courses</th>';
    echo '<th>Date Enrolled</th>';
    echo '</tr>';

    // Assuming the function join_course_table is defined similarly to join_product_table

    foreach ($students as $students) {
        echo '<tr>';
        echo '<td style="vertical-align: middle; text-align: center;">' . $students['id'] . '</td>';
        echo '<td style="vertical-align: middle;">' . remove_junk($students['first_name']) . '</td>';
        echo '<td style="vertical-align: middle;">' . remove_junk($students['last_name']) . '</td>';
        echo '<td style="vertical-align: middle;">' . remove_junk($students['date_of_birth']) . '</td>';
        echo '<td style="vertical-align: middle;">' . remove_junk($students['gender']) . '</td>';
        echo '<td style="vertical-align: middle;">' . remove_junk($students['major']) . '</td>';
        echo '<td style="vertical-align: middle;">' . remove_junk($students['student_email']) . '</td>';
        echo '<td style="vertical-align: middle;">' . remove_junk($students['enrolled_courses']) . '</td>';
        echo '<td style="vertical-align: middle;">' . remove_junk($students['enrolled_at']) . '</td>';
        echo '</tr>';
    }

    echo '</table>';
    exit();
}
?>

<?php include_once('layouts/header-sidebar.php'); ?>

<div class="row">
    <div class="col-md-12">
    </div>
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading clearfix">
                <div class="pull-right">
                    <a href="add_product.php" class="btn">Add New Course</a>
                </div>
            </div>
            <div class="panel-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 50px;">ID</th>
                            <th class="text-center"> First Name </th>
                            <th class="text-center"> Last Name </th>
                            <th class="text-center"> Date of Birth </th>
                            <th class="text-center"> Gender </th>
                            <th class="text-center"> Major </th>
                            <th class="text-center"> University Email </th>
                            <th class="text-center"> Enrolled Courses </th> <!-- Change here -->
                            <th class="text-center"> Date Enrolled </th>
                            <th class="text-center" style="width: 100px;"> Actions </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($students as $students):?>
                        <tr>
                            <td class="multiline-text" style="vertical-align: middle;"> <?php echo remove_junk($students['id']); ?></td>
                            <td class="text-center" style="vertical-align: middle;"> <?php echo remove_junk($students['first_name']); ?></td>
                            <td class="text-center" style="vertical-align: middle;"> <?php echo remove_junk($students['last_name']); ?></td>
                            <td class="text-center" style="vertical-align: middle;"> <?php echo remove_junk($students['date_of_birth']); ?></td>
                            <td class="text-center" style="vertical-align: middle;"> <?php echo remove_junk($students['gender']); ?></td>
                            <td class="text-center" style="vertical-align: middle;"> <?php echo remove_junk($students['major']); ?></td>
                            <td class="text-center" style="vertical-align: middle;"> <?php echo remove_junk($students['student_email']);?></td>
                            <td class="text-center" style="vertical-align: middle;"> <?php echo remove_junk($students['enrolled_courses']);?></td>
                            <td class="text-center" style="vertical-align: middle;"> <?php echo remove_junk($students['enrolled_at']);?></td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <a href="edit_product.php?id=<?php echo (int)$students['id'];?>" class="btn btn-info btn-xs"  title="Edit" data-toggle="tooltip">
                                    <span class="fas fa-edit" style="color:forestgreen"></span>
                                    </a>
                                    <a href="delete_product.php?id=<?php echo (int)$students['id'];?>" class="btn btn-danger btn-xs"  title="Delete" data-toggle="tooltip">
                                    <span class="fas fa-trash" style="color:red"></span>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<style>
    .multiline-text {
        max-width: 200px; /* Adjust the maximum width as needed */
        overflow-wrap: break-word;
        word-wrap: break-word;
        hyphens: auto;
    }
    .row {
    --bs-gutter-x: 1.5rem;
    --bs-gutter-y: 0;
    display: flex;
    flex-wrap: wrap;
    margin-top: calc(-1 * var(--bs-gutter-y));
    margin-right: calc(1 * var(--bs-gutter-x));
    margin-left: calc(.01 * var(--bs-gutter-x));
}
</style>

<?php include_once('layouts/main-footer.php'); ?>