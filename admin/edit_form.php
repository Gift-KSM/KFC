<div class="container">
    <div class="col-md-2" style="margin-left: 322px; margin-right: 394px; margin-top: -142px; width: 500px;">
        <form id="form" action="ajaxupload.php" method="post" enctype="multipart/form-data">
            <form method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label class="form-label">NAME</label>
                    <input type="text" class="form-control" name="n_menu" value="<?php echo $menu['n_menu']; ?>" style="width: 500px;" required />
                </div>
                <div class="mb-3">
                    <label class="form-label">DETAIL</label>
                    <textarea style="height: 200px; width: 500px;" type="text" class="form-control" name="detail" required><?php echo $menu['detail']; ?></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">PRICE</label>
                    <input type="text" class="form-control" name="price" value="<?php echo $menu['price']; ?>" style="width: 500px;" required />
                </div>
                <div class="mb-3">
                    <label class="form-label">IMAGE</label>
                    <input class="form-control" id="uploadImage" type="file" accept="image/*" name="image" style="width: 500px;" />
                    <span id="preview"><img src="./<?php echo $menu['image']; ?>" /></span><br>
                </div>
                <div class="col-auto">
                    <input class="btn btn-success" type="submit" name="submit" value="Upload">
                </div>
            </form>
            <div id="err"></div>
    </div>
</div>
</div>