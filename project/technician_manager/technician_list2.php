<?php 
include '../view/header.php';
?>

<main>

    <h1>Class Roster</h1>

    <!-- display a table of technicians -->
    <table>
        <tr>
		    <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Password</th>
            <th>Grade</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
        <?php foreach ($technicians as $technician) : ?>
        <tr>
		    <td><?php echo technician::get_names($technician); ?></td>
            <td><?php echo htmlspecialchars($technician['email']); ?></td>
            <td><?php echo htmlspecialchars($technician['phone']); ?></td>
            <td><?php echo htmlspecialchars($technician['password']); ?></td>
            <td><?php echo htmlspecialchars($technician['grade']); ?></td>
             
            <td><form action="." method="post">
                    <input type="hidden" name="action" value="update_technician">
                    <input type="hidden" name="technician_id"
                        value="<?php echo htmlspecialchars($technician['techID']); ?>">
                    <select id="grade" name="grade">
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                        <option value="F">F</option>
                    </select>
                    <input type="submit" value="Change">
                    
            </form></td>
            
            
             <td><form action="." method="post">
                <input type="hidden" name="action"
                       value="delete_technician">
                <input type="hidden" name="technician_id"
                       value="<?php echo htmlspecialchars($technician['techID']); ?>">
                <input type="submit" value="Delete">
            </form></td>
        </tr>
        <?php endforeach; ?>
    </table>
    <!-- <p><a href="?action=show_add_form">Add student</a></p> -->

</main>
<?php include '../view/footer.php';?>