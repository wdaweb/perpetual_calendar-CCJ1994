<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://fonts.googleapis.com/css2?family=PT+Serif:wght@700&display=swap" rel="stylesheet">
  <style>
     *{
      font-family: 'PT Serif', serif;
    }
    
    .container{
      display: flex;
      width: 1050px;
      margin: 50px auto;
      border: 1px solid #f1f2f6;
      border-radius: 5px;
      box-shadow: 0px 10px 15px #f1f2f6;
      background-color: #f6f8fa;
    }
    .sidel{
      width: 50px;
      border-top-left-radius: 5px;
      border-bottom-left-radius: 5px;
    }
    .sider{
      width: 200px;
      /* background-color: #2d98da; */
      background-image: url(./img/pattern3.png);
      border-bottom-right-radius: 5px;
      border-top-right-radius: 5px;
    }
    
    table {
      margin: auto;
      height: 700px;
      width: 800px;
      border-collapse: collapse;
      table-layout: fixed;
      word-break: break-all;
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
      color: #2d98da;
    }
    .navbar:hover{
      color:#34495e;
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
      border: 1px solid  #45aaf2;
      background-color:  #45aaf2;
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
      color: #2c3e50;
    }

    table td {
      vertical-align:top;
      padding: 15px 10px;
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
      color: #34495e;
      position:relative;
      z-index:99;
    }
    .todaydate::before{
      position:absolute;
      content:"";
      background:#34495e;
      border-radius: 50%;
      width: 30px;
      height: 30px;
      transform: translate(-5px,-35px);
      opacity:0.5;
      box-shadow: 0 0 0 0 #34495e;
      transition: 1s;
    }
    .todaydate:hover::before{
      box-shadow: 0 0 0 200px #34495e;
      
    }

    

  </style>
</head>
<body>
  <?php
    date_default_timezone_set("Asia/Taipei");

    if(isset($_GET['m']) && isset($_GET['y'])){
      $month=$_GET['m'];
      $year=$_GET['y'];
    }else{
      $month=date("m");
      $year=date("Y");
    }
    

    if(!empty($_GET['d'])){
      $today=$_GET['d'];
    }
    // }else{
    //   $today=date('d');
    // }

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
    $todaydate=date("d");
?>
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
              <div class="today"><?php echo date('M').".&nbsp;".$todaydate;?></div>
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
                  echo ((7*$i)+1+$j-$startWeekday);
                }
                      if((7*$i)+1+$j-$startWeekday==$todaydate && $month==date('m') && $year==date('Y')){
                        echo "<div class='todaydate'>It's Today.</div>";
                      }
                
                echo "</td>";
              }
              echo "</tr>";
            }
          ?>
        </tbody>
      </table>
    </div>
    <div class="sider"></div>
  </div>
</body>
</html>