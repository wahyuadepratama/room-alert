<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php require_once('partial/header.php'); ?>
    <?php require_once('controller/show-schedule.php'); ?>
  </head>
  <body background="images/background.svg">
    <div class="container">

      <div class="row">
        <div class="col-md-12" style="margin-top: 5%;">
          <center><h1 style="font-weight: bolder;">Today's Labor Usage Schedule</h1></center><br><br>
          <h3><div id="todaysDate"></div><br></h3>
          <center>
            <h1 style="font-weight: bolder; font-size: 150%; font-family: 'Muli', sans-serif;";>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Course</th>
                    <th scope="col">Start Time</th>
                    <th scope="col">End Time</th>
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
                        <td>'. $data['start_hour'] .'.'. $data['start_minute'].'</td>
                        <td>'. $data['finish_hour'] .'.'. $data['finish_minute'].'</td>
                      </tr>
                    ';
                    $no++;
                  }
                    ?>
                </tbody>
              </table><br>
              <marquee style="font-size: 320%;" id="info" direction="scroll">Tidak ada kuliah pada jam ini</marquee>
            </h1><br>
            <a href="schedule.php" class="btn btn-success">Show All Schedule</a>
            <a href="create.php" class="btn btn-success">Add New Schedule</a><br><br>
          </center>
        </div>
      </div>
    </div>
  </body>
</html>


<script type="text/javascript">

  play = false;

  function doDate()
  {
    var str = "";

    var days = new Array("Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday");
    var months = new Array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");

    var now = new Date();

    str += days[now.getDay()] + ", " + now.getDate() + " " + months[now.getMonth()] + " " + now.getFullYear() + " " + now.getHours() +":" + now.getMinutes() + ":" + now.getSeconds();
    document.getElementById("todaysDate").innerHTML = str;

    console.log(play);

    function alertStart(){
      var audio = new Audio('alert/start.mp3');
      audio.play();
    }

    function alertFinish(){
      var audio = new Audio('alert/finish.mp3');
      audio.play();
    }

    $.ajax({
       url : 'controller/json-schedule.php', // your php file
       type : 'GET', // type of the HTTP request
       success : function(data){
          var obj = jQuery.parseJSON(data);
          jQuery.each(obj, function(i, val) {

            if(play == false){
              if(days[now.getDay()] == val['day']){
                if(now.getHours() == val['start_hour'] && now.getMinutes() == val['start_minute'] && now.getSeconds() < 30){
                  play = true;
                  console.log('alarm berbunyi!');
                  document.getElementById("info").textContent = "Jadwal sekarang: " + val['name'];
                  alertStart();
                }
                if(now.getHours() == val['finish_hour'] && now.getMinutes() == val['finish_minute'] && now.getSeconds() < 30){
                  play = true;
                  console.log('alarm berbunyi!');
                  alertFinish();
                }
              }
            }else{
              if(days[now.getDay()] == val['day']){
                if(now.getHours() == val['start_hour'] && now.getMinutes() == val['start_minute'] && now.getSeconds() > 30){
                  play = false;
                  console.log('alarm berhenti berbunyi');
                }
                if(now.getHours() == val['finish_hour'] && now.getMinutes() >= val['finish_minute'] && now.getSeconds() > 30){
                  play = false;
                  document.getElementById("info").textContent = "Tidak ada kuliah pada jam ini";
                  console.log('alarm berhenti berbunyi');
                }
              }
            }

            if(days[now.getDay()] == val['day']){

              if(now.getHours() >= val['start_hour'] && now.getHours() <= val['finish_hour']){
                if(now.getHours() == val['start_hour'] && now.getHours() == val['finish_hour']){
                  if(now.getMinutes() < val['start_minute'] || now.getMinutes() > val['finish_minute']){
                    console.log('masuk');
                    document.getElementById("info").textContent = "Tidak ada kuliah pada jam ini";
                  }
                }else{
                  if(now.getHours() == val['start_hour'] && now.getMinutes() >= val['start_minute']){
                    document.getElementById("info").textContent = "Jadwal sekarang: " + val['name'];
                  }else if(now.getHours() > val['start_hour'] && now.getHours() < val['finish_hour']){
                    document.getElementById("info").textContent = "Jadwal sekarang: " + val['name'];
                  }else if(now.getHours() == val['finish_hour'] && now.getMinutes() < val['finish_minute']){
                    console.log('masuk');

                    document.getElementById("info").textContent = "Jadwal sekarang: " + val['name'];
                  }
                }
              }

            }

          });
       }
    });

  }

  setInterval(doDate, 1000);
</script>
