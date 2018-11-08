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
      <div class="row" style="margin-top: 5%; font-size: 150%">
        <div class="col-md-12">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Courses</th>
                <th scope="col">Day</th>
                <th scope="col">Start</th>
                <th scope="col">End</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              foreach ($allSchedule as $data) {
                echo '
                  <tr>
                    <th scope="row">'.$no.'</th>
                    <td>'. $data['name'] .'</td>
                    <td>'. $data['day'] .'</td>
                    <td>'. $data['start_hour'] .'.'. $data['start_minute'].'</td>
                    <td>'. $data['finish_hour'] .'.'. $data['finish_minute'].'</td>
                    <td>
                      <a href="update.php?id='. $data['id'] .'"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>&nbsp;
                      <a ';?> onclick="return confirm('are you sure want to delete it?');" <?php echo 'href="controller/destroy-schedule.php?id='. $data['id'] .'"><i class="fa fa-trash" aria-hidden="true"></i></a>
                    </td>
                  </tr>
                ';
                $no++;
              }
                ?>
            </tbody>
          </table>
          </form>
        </div>
        </div>
      </div>
    </div>
  </body>
</html>
