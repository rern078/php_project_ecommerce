<?php require_once('header.php'); ?>

<?php
if (isset($_POST['form1'])) {
      $valid = 1;

      $path = $_FILES['image_url']['name'];
      $path_tmp = $_FILES['image_url']['tmp_name'];

      if ($path != '') {
            $ext = pathinfo($path, PATHINFO_EXTENSION);
            $file_name = basename($path, '.' . $ext);
            if ($ext != 'jpg' && $ext != 'png' && $ext != 'jpeg' && $ext != 'gif') {
                  $valid = 0;
                  $error_message .= 'You must have to upload jpg, jpeg, gif or png file<br>';
            }
      } else {
            $valid = 0;
            $error_message .= 'You must have to select a photo<br>';
      }

      if ($valid == 1) {

            // getting auto increment id
            $statement = $pdo->prepare("SHOW TABLE STATUS LIKE 'tbl_popup'");
            $statement->execute();
            $result = $statement->fetchAll();
            foreach ($result as $row) {
                  $ai_id = $row[10];
            }

            $final_name = 'gift-' . $ai_id . '.' . $ext;
            move_uploaded_file($path_tmp, '../assets/uploads/' . $final_name);


            $statement = $pdo->prepare("INSERT INTO tbl_popup (image_url,description,width,height) VALUES (?,?,?,?)");
            $statement->execute(array($final_name, $_POST['description'], $_POST['width'], $_POST['height']));

            $success_message = 'Gift is added successfully!';

            unset($_POST['description']);
            unset($_POST['width']);
            unset($_POST['height']);
      }
}
?>

<section class="content-header">
      <div class="content-header-left">
            <h1>Add Gift</h1>
      </div>
      <div class="content-header-right">
            <a href="slider.php" class="btn btn-primary btn-sm">View All</a>
      </div>
</section>


<section class="content">

      <div class="row">
            <div class="col-md-12">

                  <?php if ($error_message): ?>
                        <div class="callout callout-danger">
                              <p>
                                    <?php echo $error_message; ?>
                              </p>
                        </div>
                  <?php endif; ?>

                  <?php if ($success_message): ?>
                        <div class="callout callout-success">
                              <p><?php echo $success_message; ?></p>
                        </div>
                  <?php endif; ?>

                  <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                        <div class="box box-info">
                              <div class="box-body">
                                    <div class="form-group">
                                          <label for="" class="col-sm-2 control-label">Photo <span>*</span></label>
                                          <div class="col-sm-9" style="padding-top:5px">
                                                <input type="file" name="image_url">(Only jpg, jpeg, gif and png are allowed)
                                          </div>
                                    </div>
                                    <div class="form-group">
                                          <label for="" class="col-sm-2 control-label">Content </label>
                                          <div class="col-sm-6">
                                                <textarea class="form-control" name="description" style="height:140px;"><?php if (isset($_POST['description'])) {
                                                                                                                              echo $_POST['ddescriptiones'];
                                                                                                                        } ?></textarea>
                                          </div>
                                    </div>
                                    <div class="form-group">
                                          <label for="" class="col-sm-2 control-label">Size </label>
                                          <div class="col-12">
                                                <div class="col-sm-2">
                                                      <input type="text" autocomplete="off" class="form-control text-center" name="width" placeholder="Width" value="<?php if (isset($_POST['button_url'])) {
                                                                                                                                                                              echo $_POST['width'];
                                                                                                                                                                        } ?>">
                                                </div>
                                                <div class="col-sm-2">
                                                      <input type="text" autocomplete="off" class="form-control text-center" name="height" placeholder="Height" value="<?php if (isset($_POST['button_url'])) {
                                                                                                                                                                              echo $_POST['height'];
                                                                                                                                                                        } ?>">
                                                </div>
                                          </div>
                                    </div>

                                    <div class="form-group">
                                          <label for="" class="col-sm-2 control-label"></label>
                                          <div class="col-sm-6">
                                                <button type="submit" class="btn btn-success pull-left" name="form1">Submit</button>
                                          </div>
                                    </div>
                              </div>
                        </div>
                  </form>
            </div>
      </div>

</section>

<?php require_once('footer.php'); ?>