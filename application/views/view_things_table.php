
    <table cellpadding="5" cellspacing="1" summary="sumary of table purpose" class="a_table">

    <thead>
        <tr>
            <th scope="col">Student ID</th>
            <th scope="col">Student Name</th>
            <th scope="col">Student Surname</th>
        </tr>
    </thead>

    <tbody>
       <?php foreach ($student as $student): ?>



        <tr>
            <td>  <?php echo $student->id; ?> </td>
            <td>  <?php echo $student->name; ?> </td>
            <td>  <?php echo $student->surname; ?> </td>
        </tr>

           <?php endforeach ?>
    </tbody>

    </table>
<?php echo "$pagination"; ?>