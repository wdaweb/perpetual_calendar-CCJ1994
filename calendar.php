<?php
    date_default_timezone_set("Asia/Taipei");

    if(isset($_GET['m']) && isset($_GET['y'])){
      $month=$_GET['m'];
      $year=$_GET['y'];
    }else{
      $month=date("m");
      $year=date("Y");
    }
    

    if(isset($_GET['d'])){
      $today=$_GET['d'];

    }else{
      $today=date('d');
    }

    // prevmonth
    if($month<=1){
      $prevMonth=12;
      $prevYear=$year-1;
    }else{
      $prevMonth=$month-1;
      $prevYear=$year;
    }
    // nextmonth
    if($month>=12){
      $nextMonth=1;
      $nextYear=$year+1;
    }else{
      $nextMonth=$month+1;
      $nextYear=$year;
    }

    $first="$year-$month-01";
    $firstDate=strtotime("$year-$month-01");
    // 第一天在星期幾
    $startWeekday=date("w",$firstDate);
    // 最後一天在星期幾
    // $endweekday=date("w",strtotime("$year-$month-$days"));
    // 當月份有幾天
    $days=date("t",strtotime($first));
    $prevMonthdays=date("t",strtotime("$prevYear-$prevMonth-01"));
    $today=date("d");
    $todaydate=date("m-d");

    $holiday=[
      '1-1'=>'元旦',
      '2-28'=>'和平紀念日',
      '3-8'=>'婦女節',
      '4-4'=>'兒童節',
      '5-1'=>'勞動節',
      '9-3'=>'軍人節',
      '9-28'=>'教師節',
      '10-10'=>'國慶日',
      '10-25'=>'光復節',
      '10-31'=>'萬聖節',
      '11-11'=>'光棍節',
      '12-25'=>'聖誕節'
    ];

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://fonts.googleapis.com/css2?family=PT+Serif:wght@700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+TC:wght@300&display=swap" rel="stylesheet">

  <style>
     *{
      font-family: 'PT Serif', serif;
      color:#34495e;
    }
    body{
      background-image:url(./img/bg2.jpg);
    }
    .container{
      display: flex;
      width: 1150px;
      margin: 30px auto;
      /* border: 1px solid #f1f2f6; */
      border-radius: 10px;
      box-shadow: 0px 1px 10px #2c3e50;
      background-color: #f6f8fa;
    }
    .sidel{
      width: 50px;
      border-top-left-radius: 10px;
      border-bottom-left-radius: 10px;
    }
    .sider{
      width: 300px;
      background-color: #bdc3c7;
      border-bottom-right-radius: 10px;
      border-top-right-radius: 10px;
    }
    
    <?php
      switch($month){
        case $month<=2 ||$month>=12:
    ?>
          .bgimg{
            background-image: url(./img/winter.jpg);
            position:relative;
          }
          .bgimg::before{
            content:"WINTER";
            position:absolute;
            font-size:50px;
            color:#fff;
            top:345px;
            left:50px;
            text-shadow:0px 0px 10px #34495e;
            border:2px solid #eee;
            border-radius: 5px;
            transition:1s;
            box-shadow:inset 0 0 0 0 #fff;
          }
          .bgimg:hover::before{
            box-shadow:inset 0 0 0 50px #fff;

          }
    <?php
        break;
        case $month>2 && $month<=5:
    ?>
        .bgimg{
            background-image: url(./img/spring.jpg);
            background-position:-150px -50px;
            position:relative;
          }
          .bgimg::before{
            content:"SPRING";
            position:absolute;
            font-size:50px;
            color:#fff;
            top:345px;
            left:60px;
            text-shadow:0px 0px 10px #34495e;
            border:2px solid #eee;
            border-radius: 5px;
            transition:1s;
            box-shadow:inset 0 0 0 0 #fff;
          }
          .bgimg:hover::before{
            box-shadow:inset 0 0 0 50px #fff;

          }
    <?php
        break;
        case $month>5 && $month<=8:
    ?>
        .bgimg{
            background-image: url(./img/summer.jpg);
            background-position:-150px -200px;
            position:relative;
          }
          .bgimg::before{
            content:"SUMMER";
            position:absolute;
            font-size:50px;
            color:#fff;
            top:345px;
            left:40px;
            text-shadow:0px 0px 10px #34495e;
            border:2px solid #eee;
            border-radius: 5px;
            transition:1s;
            box-shadow:inset 0 0 0 0 #fff;
          }
          .bgimg:hover::before{
            box-shadow:inset 0 0 0 50px #fff;

          }
    <?php
        break;
        case $month>8 && $month<=11:
    ?>
      .bgimg{
          background-image: url(./img/autumn.jpg);
          position:relative;
          }
          .bgimg::before{
            content:"AUTUMN";
            position:absolute;
            font-size:50px;
            color:#fff;
            top:345px;
            left:40px;
            text-shadow:0px 0px 10px #34495e;
            border:2px solid #eee;
            border-radius: 5px;
            transition:1s;
            box-shadow:inset 0 0 0 0 #fff;
          }
          .bgimg:hover::before{
            box-shadow:inset 0 0 0 50px #fff;

          }
    <?php
        break;
      }   
    ?>
    table {
      margin: auto;
      height: 700px;
      width: 800px;
      border-collapse: collapse;
      table-layout: fixed;
      
    }
    thead {
      text-align: left;
    }

    .nav{
      height: 100px;
      padding-top:10px;
      box-sizing:border-box;
    }
    .bar{
      display:flex;
      position:relative;
    }
    .bar1{
      position:absolute;

    }
    .bar2{
      position:absolute;
      left:160px;
    }
    
    .navbar{
      padding: 5px;
      text-decoration: none;
      font-size: 18px;
      color: #34495e;
    }
    .navbar:hover{
      color:#7f8c8d;
      color:;
    }

    a{
      animation: tag .6s ease infinite alternate;
    }
    @keyframes tag {
      
      100%{
        opacity:0.5;
      }
    }
    
    a:active {
      color: #45aaf2;
    }
    form{
      display:flex;
      position:relative;
    }
    .item1{
      position:absolute;
      left:90px;
    }
    .item2{
      position:absolute;
      left:170px;
    }
    select{
      background-color: transparent;
      border: 1px solid #2c3e50;
      border-radius: 5px;
      padding: 0 1em 0 0;
      width: 70px;
      font-size: 15px;
      color: #2c3e50;
    }
    
    .enter_y{
      background-color: transparent;
      border: 1px solid #2c3e50;
      border-radius: 5px;
      font-size: 15px;
      color: #2c3e50;
    }
    .btn{
      background-color: #ecf0f1;
      border: 1px solid transparent;
      border-radius: 5px;
      font-size: 15px;
      color: #2c3e50;

    }
    .btn:hover{
      border: 1px solid  #34495e;
      background-color:  #34495e;
      color: #ecf0f1;
    }

    thead tr:last-child{
      font-size: 15px;
      height: 50px;
      color: #57606f;
    }
    .today{
      text-align:right;
      padding-right:50px;
      font-size:40px;
      color: #34495e;
    }

    table td {
      vertical-align:top;
      padding: 15px;
      border: 1px solid #ced6e0;   
      font-weight: bold; 
      font-size: 30px;
      height: 70px;
      overflow: hidden;
    }
    table td:hover{
      background-color: #fff;
    }
    
    .pastdays{
      color:#95a5a6;
      background-image:url(./img/pattern-01.png);
      height:70px;
      opacity: 0.3;
    }
    .futuredays{
      background-image:url(./img/pattern-01.png);
      height:70px;
      color:#95a5a6;
      opacity: 0.3;
    }
    .weekend{
      color: #e74c3c;
    }
    .todaydate{
      font-size:10px;
      background:#f1c40f;
      border-radius: 50%;
      width: 30px;
      height: 30px;
      transform: translate(0px,-33px);
      opacity:0.5;
      box-shadow: 0 0 0 0 #f1c40f,inset 0 0 0 0 #f1c40f;
      animation:point 0.5s infinite linear alternate;
    }
    
    @keyframes point{
      100%{
      box-shadow: 0 0 0 2px #f1c40f,inset 0 0 0 2px #f1c40f;
      box-shadow:;
      }
    }
    .holiday{
      position:relative;
      font-family: 'Noto Serif TC', serif;
      font-size:14px;
      color:#f6f8fa;
      z-index:2;
    }
    

    table td:hover .holiday{
      color: #fff;
    }
    .holiday::before{
      content:"";
      position:absolute;
      width:10px;
      height:10px;
      background: #e74c3c;
      z-index:-1;
      top:-30px;
      left:70px;
      border-radius:50%;
      box-shadow: 0 0 0 0 #e74c3c;
      transition: 1s;
    }
    .holiday:hover::before{
      box-shadow: 0 0 0 200px #e74c3c;
    }
    .tholiday{
      position:relative;
      font-family: 'Noto Serif TC', serif;
      font-size:10px;
      color:#f6f8fa;
      z-index:2;
      margin:0;
    }
    .tholiday::before{
      content:"";
      position:absolute;
      width:10px;
      height:10px;
      background: #e74c3c;
      z-index:-1;
      top:-60px;
      left:70px;
      border-radius:50%;
      box-shadow: 0 0 0 0 #e74c3c;
      transition: 1s;
    }
    .tholiday:hover::before{
      box-shadow: 0 0 0 200px #e74c3c;
    }
    table td:hover .tholiday{
      color: #fff;
    }

    

  </style>
</head>
<body>

<div class="container">
    <div class="sidel"></div>
    <div class="calendar">
      <table>
        <thead>
          <tr>
            <th colspan="7" class="nav">
              <div class="bar">
                <div class="bar1">
                  <a class="navbar" href="calendar.php?y=<?=$prevYear;?>&m=<?=$prevMonth;?>">&lt;</a>
                  <span class="navbar"><?php echo date("M",strtotime($first)).'-'.date("Y",strtotime($first));?></span>
                  <a class="navbar" href="calendar.php?y=<?=$nextYear;?>&m=<?=$nextMonth;?>">&gt;</a>
                </div>
                <div class="bar2">
                  <form action="calendar.php" method="get">
                    <div class="selectm" >
                      <select name="m">
                        <option value="<?php echo date('m');?>"><?php echo date('M').".";?></option>
                        <option value="1">Jan.</option>
                        <option value="2">Feb.</option>
                        <option value="3">Mar.</option>
                        <option value="4">Apr.</option>
                        <option value="5">May.</option>
                        <option value="6">Jun.</option>
                        <option value="7">Jul.</option>
                        <option value="8">Aug.</option>
                        <option value="9">Sep.</option>
                        <option value="10">Oct.</option>
                        <option value="11">Nov.</option>
                        <option value="12">Dec.</option>
                      </select>
                    </div>
                    <div class="item1">
                      <input class="enter_y" type="number" name="y" value="<?php echo date('Y');?>" min="100" max="9999" placeholder="Please enter Year" required >
                    </div>
                    <div class="item2">
                      <input class="btn" type="submit" value="GO">
                    </div>
                  </form>
                </div>
              </div>
              
              <!-- 今天幾號星期幾 -->
              <div class="today"><?php echo date('M').".&nbsp;".$today;?></div>
            </th>
          </tr>
          <tr>
            <th class="weekend">Sun.</th>
            <th>Mon.</th>
            <th>Tue.</th>
            <th>Wed.</th>
            <th>Thu.</th>
            <th>Fri.</th>
            <th class="weekend">Sat.</th>
          </tr>
        </thead>
        <?php
              
            for($i=0;$i<6;$i++){
              echo "<tr>";
              for($j=0;$j<7;$j++){
                echo "<td>";
                $date='';
                // 1號前的留空格
                if($i==0 && $j<$startWeekday){
                  //印上個月日期
                  echo "<div class='pastdays'>".($prevMonthdays-$startWeekday+1+$j)."</div>";
                  // echo "&nbsp;";
        
                  // 最後一天後的留空格
                }else if(((7*$i)+1+$j-$startWeekday)>$days){
                  //印下個月日期
                  echo "<div class='futuredays'>".((7*$i)+1+$j-$startWeekday-$days)."</div>";
                  
                  // 印日期
                }else{
                  $date=((7*$i)+1+$j-$startWeekday);
                }
                echo $date;
                      if($date==date('d') && $month==date('m') && $year==date('Y')){
                        echo "<div class='todaydate'></div>";

                      if (!empty($holiday[$month.'-'.$date])) {
                        echo "<div class='tholiday'>{$holiday[$month.'-'.$date]}</div>";
                      }
                      }else if (!empty($holiday[$month.'-'.$date])) {
                        echo "<div class='holiday'>{$holiday[$month.'-'.$date]}</div>";
                      }
                
                echo "</td>";
              }
              echo "</tr>";
            }
          ?>
        </tbody>
      </table>
    </div>
    <div class="sider bgimg"></div>
  </div>
</body>
</html>