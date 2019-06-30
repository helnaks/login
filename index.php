<?php
require_once 'header.php';
?>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h4>Sign Up</h4>
                <?php if (isset($_SESSION['signup_success'])) { ?>
                    <div class="alert alert-success alert-dismissable">
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                        <h4><?= $_SESSION['signup_success'] ?></h4>
                    </div>
                <?php unset($_SESSION['signup_success']);
                    }
                    if (isset($_SESSION['signup_error'])) { 
                ?>
                    <div class="alert alert-danger alert-dismissable">
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                        <h4><?= $_SESSION['signup_error'] ?></h4>
                    </div>
                <?php unset($_SESSION['signup_error']); } ?>
                <form action="UserActions.php" method="POST" id="signupForm">
                    <div class="form-group">
                        <label for="first_name"><b>First Name</b></label>
                        <input type="text" class="form-control" placeholder="First Name" name="first_name">
                    </div>
                    <div class="form-group">
                        <label for="last_name"><b>Last Name</b></label>
                        <input type="text" class="form-control" placeholder="Last Name" name="last_name">
                    </div>
                    <div class="form-group">
                        <label for="dob"><b>Date of Birth</b></label>
                        <input type="text" class="form-control date" placeholder="Date Of Birth" name="dob">
                    </div>
                    <div class="form-group">
                        <label for="email"><b>Email</b></label>
                        <input type="email" class="form-control" placeholder="Enter Email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="password"><b>Password</b></label>
                        <input type="password" class="form-control" placeholder="Enter Password" name="password" id="password">
                    </div>
                    <div class="form-group">
                        <label for="repeat-password"><b>Repeat Password</b></label>
                        <input type="password" class="form-control" placeholder="Repeat Password" name="repeat_password">
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-danger">Cancel</button>
                        <button type="submit" class="btn btn-success" name="submit" value="signup" id="signup">Sign Up</button>
                    </div>
                </form>
            </div>
            <div class="col-md-6">
                <h4>Login</h4>
                <?php if (isset($_SESSION['login_error'])){ ?>
                    <div class="alert alert-danger alert-dismissable">
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                        <h4><?= $_SESSION['login_error'] ?></h4>
                    </div>
                <?php unset($_SESSION['login_error']); } ?>
                <form action="UserActions.php" method="POST" id="loginForm">
                    <div class="form-group">
                        <label for="email"><b>Email</b></label>
                        <input type="email" class="form-control" placeholder="Enter Email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="password"><b>Password</b></label>
                        <input type="password" class="form-control" placeholder="Enter Password" name="password" id="password">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success" name="submit" value="login" id="login">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<script>
    
    $('.date').datepicker();

    $(document).ready(function() {
        $('#signupForm').validate({
            rules: {
                first_name: 'required',
                last_name: 'required',
                dob: 'required',
                email: {
                    required: true,
                    email: true
                },
                password: {
                    required: true,
                    minlength: 5
                },
                repeat_password : {
                    minlength : 5,
                    equalTo : '#password'
                }
            }
        });
    });
</script>
</body>
</html>