<!-- <br>
<h3 align="center"> Member Page 
<br>
Welcome <?php echo $_SESSION['username'];?>
</h3> -->
<from action="member_from_edit_db.php" method="post" class="form-horizontal" enctype="multipart/from-data">
    <div class="form-group">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" id="name_user" class="form-control" name="name" aria-describedby="name" value="<?php echo $_SESSION['name']; ?>">
        </div>
        <div class="mb-3">
            <label for="last_name" class="form-label">Last Name</label>
            <input type="text" id="last_name" class="form-control" name="last_name" aria-describedby="last_name" value="<?php echo $_SESSION['last_name']; ?>">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" id="email" class="form-control" name="email" aria-describedby="email" value="<?php echo $_SESSION['email']; ?>">
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <input type="text" id="address" class="form-control" name="address" aria-describedby="address" value="<?php echo $_SESSION['address']; ?>">
        </div>
        <div class="mb-3">
            <label for="phone_number" class="form-label">Phone number</label>
            <input type="text" id="phone_number" class="form-control" name="phone_number" aria-describedby="phone_number" value="<?php echo $_SESSION['phone']; ?>">
        </div>
        <button type="submit" name="submit" class="btn btn-primary" onclick="edit_pro();">SAVE</button>
    </div>
</form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        var edit_pro = () => {
            let user_name = '<?php echo $_SESSION['username']; ?>';
            let name = $('#name_user').val();
            let lastname = $('#last_name').val();
            let email = $('#email').val();
            let address = $('#address').val();
            let phone_num = $('#phone_number').val();

            $.post('member_form_edit_db.php', {
                user_name: user_name,
                name: name,
                lastname: lastname,
                email: email,
                address: address,
                phone_num: phone_num,
            }, function(result) {
                console.log(result);
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Information edit successfully',
                    showConfirmButton: false,
                    timer: 1500
                })
            })
        }
    </script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>