<video id="player" controls autoplay></video>
<button id="capture">Capture</button>
<canvas id="snapshot" width=240 height=240></canvas>
<script>
  var player = document.getElementById('player');
  var snapshotCanvas = document.getElementById('snapshot');
  var captureButton = document.getElementById('capture');
  var saveButton = document.getElementById('save');
  var isPressed = false;
  var old_v = "null";
  var count = 0;

  var handleSuccess = function(stream) {
    player.srcObject = stream;
  };

  captureButton.addEventListener('mouseup', function(event){
    isPressed = false;
  });
  captureButton.addEventListener('mousedown', function(event){
    isPressed = true;
    doInterval();
  });
  function doInterval(action){
    if(isPressed)
    {
      var context = snapshot.getContext('2d');
      context.drawImage(player, 0, 0, snapshotCanvas.width,
          snapshotCanvas.height);
      var v = $('#class').val()
      if(v != old_v)
        count = 0;
      old_v = v;
      count += 1;

      console.log(v,count);
      //console.log(count);
      var photo = snapshot.toDataURL('image/jpeg');
      var parameter = {photo: photo , class: v, count_value: count}
      $.ajax({
        method: 'POST',
        url: 'testSave.php',
        data: parameter
      });
      setTimeout(function() {
      doInterval(action);
    }, 200);
    }
  }
  navigator.mediaDevices.getUserMedia({video: true})
      .then(handleSuccess);
</script>

<html>
<head>
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
</head>

  <body>
    <form method="POST" action="inputtxt.php">
      x:<input type="text" name="kind" />
      y:<input type="text" name="var1" />
      w:<input type="text" name="var2" />
      class:<input type="text" name="class" id="class"/>
      <input type="submit" value="생성" />
    </form>
    <div>
      첫번째 영역
      <img src="createBox.php?size=50&channel=50" />
      <?php
          $file=fopen("param.txt", "r");
          (int)$size = 240;
          while(!feof($file)){
            $str = fgets($file, 999);
            $str = trim($str);
            $arr = explode(" ", $str);
            #echo $arr[1]." ";
            if(!strcmp($arr[0], "Conv2D")){

              $channel = (int)$arr[1];
              #echo "Conv2d ";
              echo $size = (int)$size - (int)$arr[2] + 1;
              #echo $arr[0]." ";
              #echo $arr[1]." ";
              #echo $arr[2]." ";
            }
            else if(!strcmp($arr[0], "max")){
              #echo "max ";
              echo (int)$size = (int)$size / (int)$arr[1];
              #echo $arr[0]." "
              #echo $arr[1]." ";
            }
            echo "<img src="."\"createBox.php?size=".$size."\" />";
          }
          fclose($file);
      ?>
    </div>
  </body>
</html>
