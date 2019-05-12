<?php include("header.php"); ?>

<?php $sql = mysqli_query($mysqli,"SELECT * FROM alerts ORDER BY alert_id DESC"); ?>


<div class="card mb-3">
  <div class="card-header">
    <h6 class="float-left mt-1"><i class="fa fa-exclamation-triangle"></i> Alerts</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-striped table-borderless table-hover" id="dataTable" width="100%" cellspacing="0">
        <thead class="thead-dark">
          <tr>
            <th>Date</th>
            <th>Type</th>
            <th>Alert</th>
            <th class="text-center">Ack</th>
          </tr>
        </thead>
        <tbody>
          <?php
      
          while($row = mysqli_fetch_array($sql)){
            $alert_id = $row['alert_id'];
            $alert_type = $row['alert_type'];
            $alert_message = $row['alert_message'];
            $alert_date = $row['alert_date'];
            $alert_ack_date = $row['alert_ack_date'];

          ?>
          <tr class="row-danger">
            <td><?php echo $alert_date; ?></td>
            <td><?php echo $alert_type; ?></td>
            <td><?php echo $alert_message; ?></td>
            <td class="text-center">
              <?php if($alert_ack_date == 0){ ?>
                <a class="btn btn-success btn-sm" href="post.php?alert_ack=<?php echo $alert_id; ?>"><i class="fa fa-check"></i></a>
              <?php }else{ ?>
                <?php echo $alert_ack_date; ?>
              <?php } ?>
            </td>
          </tr>

          <?php
          }
          ?>

        </tbody>
      </table>
    </div>
  </div>
</div>

<?php include("footer.php");