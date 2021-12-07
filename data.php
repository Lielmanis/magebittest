<?php require 'process.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            table, tr, th, td {
                border: 1px solid black;
            }
            th {
                width: 200px;
            }
            .less {
                width: 50px;
            }
            .button {
                text-decoration: none;
                border: 1px solid black;
                border-radius: 10%;
                padding: 5px;
                color: black;
            }
        </style>
    </head>
    <body>
    <form method="post">
        <label>Sort by:</label>
        <select name="sort">
            <option value="date">Date</option>
            <option value="email">Name</option>
        </select>
        <input type="submit" name="button" value="sort"/>
    </form>
        <table>
            <tr>
                <th>Email</th>
                <th>Date</th>
                <th class="less"></th>
                <th class="less"></th>
            </tr>
                <?php 
                if(!empty($rows)){
                    foreach($rows as $row){
                ?>
                <tr>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['date']; ?></td>
                    <td><input type="checkbox" name="check"/></td>
                    <td><a href="process.php?delete=<?php echo $row['id']; ?>">Delete</a></td>
                </tr>
                <?php }} ?>
        </table>
        <br>
        <?php
            //Could not filter email addresses by email providers on button click
            //tried filter by query inside method inside email.php file,
            //tried filter with regular expression match inside process.php file
            foreach($emails as $email){
        ?>
        <a class="button" href="process.php?provider=<?php echo $email; ?>"><?php echo $email; ?></a>
        <?php } ?>
    </body>
</html>