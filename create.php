<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php require_once('partial/header.php'); ?>
    <?php require_once('controller/schedule.php'); ?>
  </head>
  <body>
    <div class="container">
      <div class="row" style="margin-top: 5%">
        <h4><a href="./">Back to Home</a></h4>
      </div>
      <div class="row" style="margin-top: 5%">
        <div class="col-md-6">
          <form action="controller/store-schedule.php" method="post">
            <h5>Create New</h5><br>
            <input type="text" name="name" class="form-control" placeholder="Courses" style="margin-bottom: 1%">
            <select class="form-control" name="day" style="margin-bottom: 1%">
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
                <input type="number" required name="start_hour" class="form-control" placeholder="Hour" style="margin-bottom: 2%">
              </div>
              <div class="form-group col-md-2">
                <input type="number" required name="start_minute" class="form-control" placeholder="Minute" style="margin-bottom: 2%">
              </div>
              <div class="form-group col-md-4"><center>__</center></div>
              <div class="form-group col-md-2">
                <input type="number" required name="finish_hour" class="form-control" placeholder="Hour" style="margin-bottom: 2%">
              </div>
              <div class="form-group col-md-2">
                <input type="number" required name="finish_minute" class="form-control" placeholder="Minute" style="margin-bottom: 2%">
              </div>
            </div>
            <input type="submit" required class="form-control btn btn-success" value="Create New">
          </form>
        </div>
        </div>
      </div>
    </div>
  </body>
</html>
