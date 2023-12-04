<?php
$page_title = 'Usertable';
require_once('includes/load.php');
require_once('includes/sql.php'); // Include your sql.php file
?>
<?php
    $sql = " SELECT * FROM students ";
    $result = $db->query($sql);
?>
<?php include_once('layouts/header-sidebar.php'); ?>

<div class="row">
    <div class="col-md-12">
    </div>
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading clearfix">
                <div class="pull-right">
                    <a href="add_product.php" class="btn">Add New User</a>
                </div>
            </div>
            <div class="panel-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 50px;">Student ID</th>
                            <th> First Name </th>
                            <th class="text-center"> Last Name </th>
                            <th class="text-center"> Date of Birth </th>
                            <th class="text-center"> Gender </th>
                            <th class="text-center"> Major </th>
                            <th class="text-center"> University Email </th>
                            <th class="text-center"> Enrolled Courses </th>
                            <th class="text-center"> Date Enrolled </th>
                        </tr>
                    </thead>
                    <tbody>
                           <!-- PHP CODE TO FETCH DATA FROM ROWS -->
                           <?php 
                                // LOOP TILL END OF DATA
                                while($rows=$result->fetch_assoc())
                                {
                            ?>
                            <tr>
                                <!-- FETCHING DATA FROM EACH
                                    ROW OF EVERY COLUMN -->
                                <td><?php echo $rows['student_id'];?></td>
                                <td><?php echo $rows['first_name'];?></td>
                                <td><?php echo $rows['last_name'];?></td>
                                <td><?php echo $rows['date_of_birth'];?></td>
                                <td><?php echo $rows['gender'];?></td>
                                <td><?php echo $rows['major'];?></td>
                                <td><?php echo $rows['studend_email'];?></td>
                                <td><?php echo $rows['enrolled_courses'];?></td>
                                <td><?php echo $rows['enrolled_at'];?></td>
                            </tr>
                            <?php
                                }
                            ?>
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