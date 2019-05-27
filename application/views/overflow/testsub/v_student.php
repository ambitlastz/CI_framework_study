<script>
    $(document).ready(function() {
        $('.datetimepicker').datetimepicker({
            icons: {
                time: "fa fa-clock-o",
                date: "fa fa-calendar",
                up: "fa fa-chevron-up",
                down: "fa fa-chevron-down",
                previous: 'fa fa-chevron-left',
                next: 'fa fa-chevron-right',
                today: 'fa fa-screenshot',
                clear: 'fa fa-trash',
                close: 'fa fa-remove'
            }
        });
    });
</script>

<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>frontend/assets/css/style.css">
<nav class="navbar   fixed-top navbar-expand-lg" color-on-scroll="100">
    <div class="container">
        <div class="navbar-translate">
            <a class="navbar-brand" href="<?php echo base_url(); ?>index.php/Student_c">
                ระบบบันทึก</a>
        </div>
    </div>
</nav>
<br>
<div class="card">
    <div class="container-fluid">
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <h1>เพิ่มนิสิต</h1>
                    <form name="insForm" onsubmit="return validateF()" action="<?php echo base_url(); ?>index.php/Student_c/setDATA" method="post" enctype="multipart/form-data">
                        รหัสนิสิต:<br>
                        <input onclick="changeF(this)" class="fieldstyle" type="text" id="insCode" name="s_code" placeholder="60160000"><br>
                        ชื่อ:<br>
                        <input onclick="changeF(this)" class="fieldstyle" type="text" name="name" placeholder="ชื่อจริงของคุณ"><br>
                        นามสกุล:<br>
                        <input onclick="changeF(this)" class="fieldstyle" type="text" name="lastname" placeholder="นามสกุลของคุณ"><br>
                        ที่อยู่:<br>
                        <textarea class="fieldstyle" name=" address" rows="4" cols="50" placeholder="11/1 อำเภอ จังหวัด"></textarea>
                        <br>วันที่บันทึก
                        <div class="form-group">
                            <label class="label-control">Datetime Picker</label>
                            <input type="text" class="form-control datetimepicker" value="10/05/2016" />
                        </div>
                        รูปภาพ<br>
                        <input type="file" name="upimg">
                        <!-- TABLE -->
                        <br>
                        <div class="form-inline">
                            <input class="btn btn-success btn-round" type="submit" value="เพิ่ม">
                            &nbsp;&nbsp;
                            <label class="switch">
                                <input type="checkbox" id="myCheck" onclick="toggleF()">
                                <span class=" slider round"></span>
                            </label>
                            <h3>
                                เปิด/ปิด การตรวจสอบ </h3>
                        </div>
                    </form>
                </div>
                <div class="col">
                    <h1>ค้นหา</h1>
                    <form action="<?php echo base_url(); ?>index.php/Student_c/login" method="post">
                        ค้นหาด้วยรหัสนิสิต:<br>
                        <input class="fieldstyle" type=" text" name="s_code" placeholder="60160000">
                        <input class="btn btn-success btn-round" type="submit" value="ค้นหา">
                    </form>
                    <?php
                    if (isset($s_code)) {
                        ?>
                        <br>
                        <table class="table table-bordered table-white" style="width:100%" border="1">
                            <thead style="background-color:#79a6d2">
                                <tr class="center">
                                    <th scope="col">หมายเลข</th>
                                    <th scope="col">รหัสนิสิต</th>
                                    <th scope="col">ชื่อ</th>
                                    <th scope="col">นามสกุล</th>
                                    <th scope="col">ที่อยู่</th>
                                </tr>
                            </thead>
                            <?php foreach ($s_code as $key) {
                                ?>
                                <tr class="center">
                                    <td><?php echo $key["id"] ?></td>
                                    <td><?php echo $key["code"] ?></td>
                                    <td><?php echo $key["fname"] ?></td>
                                    <td><?php echo $key["lname"] ?></td>
                                    <td><?php echo $key["address"] ?></td>
                                </tr>
                            <?php }
                        ?>
                        </table>
                    <?php
                }
                ?>
                </div>
            </div>
            <h2>ตารางนิสิต</h2>
            <table class="table">
                <thead style="background-color:#79a6d2">
                    <tr>
                        <th style="color:white" class="text-center">หมายเลข</th>
                        <th style="color:white">รหัสนิสิต</th>
                        <th style="color:white">ชื่อ</th>
                        <th style="color:white">นามสกุล</th>
                        <th style="color:white" class="text-center">ที่อยู่</th>
                        <th style="color:white" class="text-center">ดำเนินการ</th>
                    </tr>
                </thead>
                <?php $i = 0;
                foreach ($person as $key) {
                    ?>
                    <tbody>
                        <tr>
                            <th class="text-center"><?php echo $i = $i + 1 ?></th>
                            <td><?php echo $key["code"] ?></td>
                            <td><?php echo $key["fname"] ?></td>
                            <td><?php echo $key["lname"] ?></td>
                            <td width="50%"><?php echo $key["address"] ?></td>
                            <td div class="form-inline" style="display: block; text-align: center; margin: auto;">
                                <input name="deid" type="hidden" value="<?php echo $key["id"] ?>">
                                <a class="btn btn-danger" href="<?php echo base_url(); ?>index.php/Student_c/deDATA?deid=<?php echo $key["id"] ?>  ">
                                    <i rel="tooltip" class="material-icons"> close</i>
                                </a>
                                <input name="edid" type="hidden" value="<?php echo $key["id"] ?>">
                                <a class="btn btn-success" href="<?php echo base_url(); ?>index.php/Student_c/edDATA?edid=<?php echo $key["id"] ?>  ">
                                    <i rel="tooltip" class="material-icons"> edit</i>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                <?php }
            ?>
            </table>
        </div>
    </div>
</div>
<footer class="footer footer-default">
    <div class="container">
        <nav class="float-left">
            <ul>
                <li>
                    <a href="https://www.facebook.com/polmerd002">
                        ambitlasz
                    </a>
                </li>
            </ul>
        </nav>
        <div class="copyright float-right">
            &copy;
            <script>
                document.write(new Date().getFullYear())
            </script>, made with <i class="material-icons">favorite</i> by
            <a href="https://www.facebook.com/polmerd002" target="blank">ambitlastz</a> for a better web.
        </div>
    </div>
</footer>
<!-- JSS  -->
<script>
    // variable declaretion
    var flagClass = true;

    // requirement function
    function validateF() {
        // flagClass for toggle checkbox
        if (flagClass == false) {
            var codeRequire = document.forms["insForm"]["s_code"].value;
            var fnameRequire = document.forms["insForm"]["name"].value;
            var lnameRequire = document.forms["insForm"]["lastname"].value;
            // if input is null
            var flag = true;
            if (codeRequire == "") {
                var element = document.forms["insForm"]["s_code"];
                element.classList.remove("fieldstyle");
                element.classList.add("requirement");
                flag = false;
            }
            if (fnameRequire == "") {
                var element = document.forms["insForm"]["name"];
                element.classList.remove("fieldstyle");
                element.classList.add("requirement");
                flag = false;
            }
            if (lnameRequire == "") {
                var element = document.forms["insForm"]["lastname"];
                element.classList.remove("fieldstyle");
                element.classList.add("requirement");
                flag = false;
            }
            if (flag == false) {
                alert("กรุณากรอกข้อมูลให้ครบ");
            }
        }
        return flag;
    }
    // toggle function
    function toggleF() {
        var checkBox = document.getElementById("myCheck");
        if (checkBox.checked == true) {
            flagClass = false
        } else {
            flagClass = true;
        }

    }
    // change textfield after click on textfield
    function changeF(textfield) {
        // instert data on field
        var addS = textfield;
        addS.classList.add("fieldstyle");
    }
</script>