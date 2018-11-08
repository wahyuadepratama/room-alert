<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php require_once('partial/header.php'); ?>
    <?php require_once('controller/show-update-schedule.php'); ?>
  </head>
  <body>
    <div class="container">
      <div class="row" style="margin-top: 5%">
        <h4><a href="schedule.php">Back to Schedule</a></h4>
      </div>
      <div class="row" style="margin-top: 5%">
        <div class="col-md-6">
          <h5>Update Schedule</h5><br>
          <form action="controller/update-schedule.php?id=<?php echo $_GET['id']; ?>" method="post">
            <?php
            foreach ($allSchedule as $data) {
              echo '
                <input type="text" required name="name" value="'. $data['name'] .'" class="form-control" placeholder="Courses" style="margin-bottom: 1%">
                <select class="form-control" required name="day" style="margin-bottom: 1%">
                  <option value="'. $data['day'] .'">'. $data['day'] .'</option>
                  <option value="Monday">Monday</option>
                  <option value="Tuesday">Tuesday</option>
                  <option value="Wednesday">Wednesday</option>
                  <option value="Thursday">Thursday</option>
                  <option value="Friday">Friday</option>
                  <option value="Saturday">Saturday</option>
                  <option value="Monday">Sunday</option>
                </select>
                <div class="form-row">
                  <div class="form-group col-md-2">
                    <input type="number" required name="start_hour" value="'. $data['start_hour'] .'" class="form-control" placeholder="Start Hour" style="margin-bottom: 2%">
                  </div>
                  <div class="form-group col-md-2">
                    <input type="number" required name="start_minute" value="'. $data['start_minute'] .'" class="form-control" placeholder="Start Minute" style="margin-bottom: 2%">
                  </div>
                  <div class="form-group col-md-4"><center>__</center></div>
                  <div class="form-group col-md-2">
                    <input type="number" required name="finish_hour" value="'. $data['finish_hour'] .'" class="form-control" placeholder="Start Hour" style="margin-bottom: 2%">
                  </div>
                  <div class="form-group col-md-2">
                    <input type="number" required name="finish_minute" value="'. $data['finish_minute'] .'" class="form-control" placeholder="Finish Hour" style="margin-bottom: 2%">
                  </div>
                </div>
              ';
            }
            ?>
            <input type="submit" class="form-control btn btn-success" value="Update Schedule">
          </form>
        </div>
        </div>
      </div>
    </div>
  </body>
</html>
