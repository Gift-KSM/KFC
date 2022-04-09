<!-- <br>
<h3 align="center"> Member Page 
<br>
Welcome <?php echo $_SESSION['username'];?>
</h3> -->
<from action="member_form_rwd_db.php" method="POST" class="form-horizontal" enctype="multipart/from-data">
    <div class="form-group">
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <div class="mb-3">
            <label for="newpassword" class="form-label">New Password</label>
            <input type="password" class="form-control" id="newpassword" name="newpassword">
        </div>
        <div class="mb-3">
            <label for="confirm password" class="form-label">Confirm New Password</label>
            <input type="password" class="form-control" id="c_password" name="c_password">
        </div>
        <button type="submit" name="submit" class="btn btn-primary" onclick="edit_password();">save</button>
        <!-- <?php $real_paas = $_SESSION['pass'];
                echo $real_paas . "<br>"; ?> -->
    </div>
    </form>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        var edit_password = () => {
            let password = $('#password').val();
            let newpassword = $('#newpassword').val();
            let c_password = $('#c_password').val();
            $.post('member_form_rwd_db.php', {
                password: password,
                newpassword: newpassword,
                c_password: c_password
            }, function(result) {
                console.log(result);
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Password change successfully',
                    showConfirmButton: false,
                    timer: 1500
                })
            })
        }
    </script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>