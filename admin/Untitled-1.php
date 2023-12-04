<?php
// Connect to the database
$conn = new PDO('mysql:host=localhost;dbname=erovoutikalms', 'root', '');

// Retrieve the data from the database
$stmt = $conn->prepare('SELECT * FROM usertable');
$stmt->execute();
$rows = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
// Display the data in a table
<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
    </tr>
    <?php foreach ($rows as $row): ?>
    <tr>
        <td><?= $row['id'] ?></td>
        <td><?= $row['name'] ?></td>
        <td><?= $row['email'] ?></td>
        <td>
            <a href="#" class="update">Update</a>
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="confirmDeleteModal">
            Delete
            </button>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

    //Add functionality for updating and deleting data

<script>
    document.getElementById('confirmDelete').addEventListener('click', function() {
    // Add your delete code here.
    alert('Data deleted successfully.');
});
    $(document).ready(function(){
        // Listen for click events on the update and delete links
        $('.update, .delete').on('click', function(e){
            e.preventDefault();
            var id = $(this).closest('tr').find('td:first').text();
            var name = $(this).closest('tr').find('td:nth-child(2)').text();
            var email = $(this).closest('tr').find('td:nth-child(3)').text();
            
            // Update data
            if($(this).hasClass('update')){
                $.ajax({
                    url: 'update.php',
                    type: 'POST',
                    data: {'id': id, 'name': name, 'email': email},
                    success: function(data){
                        alert('Data updated successfully');
                    }
                });
            }
            
            // Delete data
        });
    });
</script>
</body>

</html>