<!DOCTYPE html>
<html>
<head>
        <meta charset="ISO-8859-1">
        <meta http-equiv="refresh" content="300" >
<style type="text/css">
    body {
      background-color:black;
    }
    p {color:blue;}
    @font-face {
      font-family: ds_digib;
      src: local(ds_digib), url('digital.ttf') format('opentype');
    }
     .time {
      margin: 30px;
      margin-top: 120px;
      font-family:ds_digib;
      font-size:250px;
      font-stretch:extra-expanded;
      color: #f00;
      background-color: #211;
      padding-top: 30px;
    }
    .imp1 {
      margin: 0px 30px;
      font-family:ds_digib;
      font-size:135px;
      font-stretch:extra-expanded;
      color: #df2;
      background-color: #202910;
      text-align: center;
      padding: 15px 20px;
      padding-top: 30px;
    }
</style>
  <script>
    function startClock() {
      $(".location").html(params.location);

      if(params.location == 'EPOCH') {
        $('.time').css('font-size', '100px');
        startEpochTime();
      } else {
        startTime();
      }
    }

    function startTime() {
      var today=new Date();
      var h=today.getHours();
      var m=today.getMinutes();
      var s=today.getSeconds();
      // add a zero in front of numbers<10
      h=checkTime(h);
      m=checkTime(m);
      $('.time').html(h+":"+m)
      t=setTimeout(function(){startTime()},500);
    }

    function checkTime(i)
    {
      if (i<10)
        {
        i="0" + i;
        }
      return i;
    }

    function startEpochTime() {
      var tick = Math.round((new Date).valueOf() / 1000)

      $('.time').html(tick.toString())
      setTimeout(function(){startEpochTime()},500);
    }

    var params = {};
    if (location.search) {
        var parts = location.search.substring(1).split('&');

        for (var i = 0; i < parts.length; i++) {
            var nv = parts[i].split('=');
            if (!nv[0]) continue;
            params[nv[0]] = decodeURIComponent(nv[1]) || true;
        }
    }
  </script>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

</head>
<body onload="startClock(); exampleUsage();">
<?php 

$con=mysqli_connect("127.0.0.1","enmon","enm0np455","enmon");
$result = mysqli_query($con,"SELECT * FROM power_usage");

while($row = mysqli_fetch_array($result))
  {
$watts = $row['counter'];	  
}
$kwh=$watts/1000;
mysqli_close($con);
?>
  <center>
    <div class="time">Time</div>
    <div class="imp1" id="imp1"><?php echo $kwh; ?>KwH</div>   
<br/>
  </center>
</body>
</html>
