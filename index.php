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

  <script type="text/javascript" src="imperial-calendar.js"></script>
  <script type="text/javascript">
                function exampleUsage() {

                        var theGregorianDate = new Date();
                        var theImperialDate = new ImperialCalendar(theGregorianDate);

            document.getElementById("imp1").innerHTML = theImperialDate.imperialDate(true);

            theGregorianDate = new Date(2001, 11, 31);
            theImperialDate = new ImperialCalendar(theGregorianDate);
            document.getElementById("greg2").innerHTML = theGregorianDate;
            document.getElementById("imp2").innerHTML = theImperialDate.imperialDate(true);

            }
  </script>  
</head>
<body onload="startClock(); exampleUsage();">
  <center>
    <div class="time">19:30</div>
    <br/>
    <div class="imp1"><div id="imp1">0 998 013.M3</div></div>
  </center>
</body>
</html>
