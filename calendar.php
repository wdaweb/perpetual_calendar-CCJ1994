<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
     *{
      font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
      /* font-family: raleway; */
    }
    
    .container{
      display: flex;
      width: 900px;
      margin: 50px auto;
      border: 1px solid #f1f2f6;
      border-radius: 5px;
      box-shadow: 0px 5px 10px #f1f2f6;
      background-color: #f6f8fa;
    }
    .sidel{
      width: 50px;
      /* background-color: #fff; */
      border-top-left-radius: 5px;
      border-bottom-left-radius: 5px;
    }
    .sider{
      width: 50px;
      background-color: #2d98da;
      border-bottom-right-radius: 5px;
      border-top-right-radius: 5px;
    }
    .navbar {
      padding: 5px;
      text-decoration: none;
      font-size: 15px;
      color: #2d98da;

    }
    a:active {
      color: #45aaf2;

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
      height: 70px;
    }
    thead tr:last-child{
      font-size: 15px;
      height: 50px;
      color: #57606f;
    }
    .today{
      text-align:right;
      padding-right:50px;
      font-size:50px;

    }

    table td {
      vertical-align:top;
      padding: 15px 10px;
      border: 1px solid #ced6e0;   
      font-weight: bold; 
      font-size: 30px;
      height: 70px;
    }
    table td:hover{
      background-color: #fff;
    }
    span{
      color:lightgrey;
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
    $today=date("D");
    $todate=date("d");
?>
<div class="container">
    <div class="sidel"></div>
    <div class="calendar">
      <table>
        <thead>
          <tr>
            <th colspan="7" class="nav">
              <a class="navbar" href="layout.php?y=<?=$prevYear;?>&m=<?=$prevMonth;?>">&lt;</a>
              <span class="navbar"><?php echo date("M",strtotime($first)).'-'.date("Y",strtotime($first))?></span>
              <a class="navbar" href="layout.php?y=<?=$nextYear;?>&m=<?=$nextMonth;?>">&gt;</a>
              <!-- 今天星期幾 -->
              <div class="today"><?php echo $todate."&nbsp;".$today."." ?></div>
            </th>
          </tr>
          <tr>
            <th>Sun.</th>
            <th>Mon.</th>
            <th>Tue.</th>
            <th>Wed.</th>
            <th>Thu.</th>
            <th>Fri.</th>
            <th>Sat.</th>
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
                  echo "<span>".($prevMonthdays-$startWeekday+1+$j)."</span>";
                  // echo "&nbsp;";
        
                  // 最後一天後的留空格
                }else if(((7*$i)+1+$j-$startWeekday)>$days){
                  //印下個月日期
                  echo "<span>".((7*$i)+1+$j-$startWeekday-$days)."</span>";
                  
                  // 印日期
                }else{
                  echo ((7*$i)+1+$j-$startWeekday);
                  
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