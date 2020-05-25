<video id="player" controls autoplay></video>
<button id="capture">Capture</button>
<canvas id="snapshot" width=320 height=240></canvas>
<script>
  var player = document.getElementById('player');
  var snapshotCanvas = document.getElementById('snapshot');
  var captureButton = document.getElementById('capture');
  var saveButton = document.getElementById('save');
  //var canvas = document.getElementById("snapshot");

  var handleSuccess = function(stream) {
    player.srcObject = stream;
  };

  captureButton.addEventListener('click', function() {
    var context = snapshot.getContext('2d');
    context.drawImage(player, 0, 0, snapshotCanvas.width,
        snapshotCanvas.height);
    var photo = snapshot.toDataURL('image/jpeg');
    $.ajax({
      method: 'POST',
      url: 'testSave.php',
      data: {
        photo: photo
      }
    });
  });
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
      <input type="submit" value="생성" />
    </form>
    <div>
      첫번째 영역
      <?php
          $file=fopen("param.txt", "r");
          while(!feof($file)){
            $str = fgets($file, 999);
            $str = trim($str);
            $arr = explode(" ", $str);
          }
          fclose($file);
      ?>
    </div>
  </body>
</html>
