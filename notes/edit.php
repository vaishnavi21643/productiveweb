<?php
$strconn=mysqli_connect("localhost","root","","project",3308);
if(!$strconn)
    echo "Connection failed".mysqli_connect_error();
else{}

if (isset($_POST["hidden"])) {
    $title = $_POST["edittitle"];
    $desc = $_POST["editdescription"];
    $id = $_POST["hidden"];
    $sql = "UPDATE `notes` SET `title`='$title', `description`='$desc' WHERE `sno`='$id'";
    $res = mysqli_query($strconn, $sql);
}

echo '<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Note</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="form mt-4" method="POST">
          <input type="hidden" name="hidden" id="hidden">
          <div class="mb-3">
            <label for="edittitle" class="form-label">Title</label>
            <input type="text" class="form-control" id="edittitle" name="edittitle">
          </div>
          <div class="mb-3">
            <label for="editdesc" class="form-label">Description</label>
            <textarea class="form-control" id="editdesc" name="editdescription" rows="3"></textarea>
          </div>
          <button type="submit" name="submit" class="btn btn-primary">Update note</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>';
?>
