<html>
<head>
<title>JavaScript Countdown timer test</title>
<script language="javascript" type="text/javascript">


today  = new Date();
todayEpoch  = today.getTime();
target = new Date("14 March, 2016");
targetEpoch = target.getTime();
daysLeft1 = Math.floor(targetEpoch - todayEpoch);
daysLeft2 = Math.floor((daysLeft1 / (60*60*24)) / 1000);

var toHHMMSS = (secs) => {   
    var hours   = Math.floor((secs / (60*60)) / 1000) %24
    var minutes = Math.floor((secs / (60)) / 1000) %60
    var seconds = Math.floor(secs/ 1000) %60
    return [hours,minutes,seconds]
        .join(":")
}

daysLeft = toHHMMSS(daysLeft1)

</script>
</head>
<body>
 
<h1>Item ends in 
<script>document.write(daysLeft2);</script>
days and 

<script>document.write(daysLeft);</script>
hours/minutes/seconds
</h1>
</body>