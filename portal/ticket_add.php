<?php
/*
 * Client Portal
 * New ticket form
 */

require('inc_portal.php');
?>

<h2>Raise a new ticket</h2>

<div class="col-8">
  <form action="portal_post.php" method="post">

    <div class="form-group">
      <label>Subject <strong class="text-danger">*</strong></label>
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text"><i class="fa fa-fw fa-tag"></i></span>
        </div>
        <input type="text" class="form-control" name="subject" placeholder="Subject" required>
      </div>
    </div>

    <div class="form-group">
      <label>Priority <strong class="text-danger">*</strong></label>
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text"><i class="fa fa-fw fa-thermometer-half"></i></span>
        </div>
        <select class="form-control select2" name="priority" required>
          <option>Low</option>
          <option>Medium</option>
          <option>High</option>
        </select>
      </div>
    </div>

    <div class="form-group">
      <label>Details <strong class="text-danger">*</strong></label>
      <textarea class="form-control" rows="4" name="details" required></textarea>
    </div>

    <button class="btn btn-primary" name="add_ticket">Raise ticket</button>

  </form>
</div>

<?php
include('portal_footer.php');
