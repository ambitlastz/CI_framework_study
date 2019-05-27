<?php
$key = $edid[0];
?>
<hr>

<img src="<?php echo base_url(); ?>assets/img/%20<?php echo  $key["img"] ?>">

<form action="<?php echo base_url(); ?>index.php/Student_c/upDATA" method="post">
    id:<br>
    <input type="text" name="id" value="<?php echo  $key["id"] ?>" readonly placeholder="00"><br>
    รหัสนิสิต:<br>
    <input type="text" name="s_code" value="<?php echo $key["code"] ?>" placeholder="60160000"><br>
    ชื่อ:<br>
    <input type="text" name="name" value="<?php echo $key["fname"] ?>"><br>
    นามสกุล:<br>
    <input type="text" name="lastname" value="<?php echo $key["lname"] ?>"><br>
    ที่อยู่:<br>
    <textarea name="address" rows="4" cols="50">
        <?php echo $key["address"] ?>
    </textarea>

    <br>
    <input type="submit" value="บันทึก">
</form>
<hr>