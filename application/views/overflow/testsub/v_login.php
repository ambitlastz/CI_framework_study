<div class="container">
    <div class="row">
        <div class="col"><br><br><br><br></div>
    </div>
    <div class="row">
        <!-- for space colume -->
        <div class="col"></div>
        <!--  -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header card-header-icon card-header-danger">
                    <div class="card-icon">
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <i class="fa fa-users" style="font-size:48px;"></i>
                                </div>
                                <div class="col-7">
                                    <h5>LOGIN</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form name="loginF" onsubmit="return checkvaliD()" method="post" action="<?php echo base_url(); ?>index.php/Student_c/index">
                        <div class="form-group">
                            <label for="username">ชื่อผู้ใช้งาน</label>
                            <input type="input" class="form-control" name="user_id" placeholder="กรุณากรอกชื่อผู้ใช้งาน">
                            <small id="userhelp" class="form-text text-muted">กรอกอะไรก็กรอกไป</small>
                        </div>
                        <div class="form-group">
                            <label for="password">รหัสผ่าน</label>
                            <input type="password" class="form-control" name="user_pass" placeholder="****************">
                        </div>
                        <input class="btn btn-success btn-round" type="submit" value="ตกลง">
                    </form>
                </div>
            </div>
        </div>
        <!-- for space colume -->
        <div class="col"></div>
        <!--  -->
    </div>
</div>

<script>
    function checkvaliD() {
        var flag = true;
        userRequire = document.forms["loginF"]["user_id"].value;
        passRequire = document.forms["loginF"]["user_pass"].value;
        if (userRequire == "" || passRequire == "") {
            flag = false;
        }
        if (flag == false) {
            alert("กรุณากรอกข้อมูลให้ครบ");
        }
        return flag;
    }
</script>