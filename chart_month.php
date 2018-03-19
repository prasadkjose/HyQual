<!DOCTYPE html>
<html lang="en">
<head>
  <title>HY-Qual</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/main.css">
 <link href="css/w3.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
      <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
            <link rel="icon shortcut" href="image/logosmall.ico">

<?php

    $lake=$_POST["lno"];
    $m =$_POST["month"];
    $month= substr($m,5);
 
    $year = substr($m,0,4);
    
    
                                                    $sql= new mysqli('localhost','root', '', 'wss' );

                                                        if($sql->connect_error)

                                                            { die("connection failed:". $sql->connect_error);
                                                            }

                                    for($i=1;$i<31;$i++)
                                    {
                                $querry1= $sql->query("select AVG(temp) as avg from wss where  day(date) = $i and sno = $lake and month(date)=$month  and year(date)=$year "); 
                                $querry2= $sql->query("select AVG(ph) as avg1 from wss where  day(date) = $i  and sno = $lake and month(date)=$month and year(date)=$year"); 
                                $querry3= $sql->query("select AVG(sal) as avg2 from wss where  day(date) = $i  and sno = $lake and month(date)=$month and year(date)=$year"); 
                                $querry4= $sql->query("select AVG(turb) as avg3 from wss where  day(date) = $i  and sno = $lake and month(date)=$month and year(date)=$year"); 
                                    while( ($row1 = mysqli_fetch_array($querry1)) && ( $row2 = mysqli_fetch_array($querry2)) &&  ( $row3 = mysqli_fetch_array($querry3)) &&  ( $row4 = mysqli_fetch_array($querry4)))
                                         {   
                                             $emparray[] = $row1; 
                                             $emparray1[] = $row2; 
                                             $emparray2[] = $row3; 
                                             $emparray3[] = $row4; 
                                         
                                         }
                                         mysqli_free_result($querry1); 
                                         mysqli_free_result($querry2); 
                                         mysqli_free_result($querry3); 
                                         mysqli_free_result($querry4); 
                                    }
                                    $var= json_encode($emparray );
                                    $var1= json_encode($emparray1 );
                                    $var2= json_encode($emparray2 );
                                    $var3= json_encode($emparray3 );
    
 
   ?>

                                   
 
    
    
    
    <script type="text/javascript">
      var mydata ='<?php echo $var; ?>';

var obj = JSON.parse(mydata);
var a2 = [];
        var z=1;
        var temp = obj[10].avg;
       
        while(z<30)
            {
               var a1=obj[z].avg;
        a2.push(a1);
                z++;
            }
       

      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
          
        var data = google.visualization.arrayToDataTable([
          ['Month', 'Temperature'],
          ['1',  parseFloat(a2[0])],
          ['2',  parseFloat(a2[1])],
          ['3', parseFloat(a2[2])],
          ['4',  parseFloat(a2[3])],
          ['5',  parseFloat(a2[4])],
          ['6',  parseFloat(a2[5])],
          ['7',  parseFloat(a2[6])],
          ['8',  parseFloat(a2[7])],
          ['9',  parseFloat(a2[8])],
          ['10',  parseFloat(a2[9])],
          ['11',  parseFloat(a2[10])],
          ['12',  parseFloat(a2[11])],
          ['13', parseFloat(a2[12])],
          ['14',  parseFloat(a2[13])],
          ['15',  parseFloat(a2[14])],
          ['16',  parseFloat(a2[15])],
          ['17',  parseFloat(a2[16])],
          ['18',  parseFloat(a2[17])],
          ['19',  parseFloat(a2[18])],
          ['20',  parseFloat(a2[19])],
          ['21',  parseFloat(a2[20])],
          ['22',  parseFloat(a2[21])],
          ['23', parseFloat(a2[22])],
          ['24',  parseFloat(a2[23])],
          ['25',  parseFloat(a2[24])],
          ['26',  parseFloat(a2[25])],
          ['27',  parseFloat(a2[26])],
          ['28',  parseFloat(a2[27])],
          ['29',  parseFloat(a2[28])],
          ['30',  parseFloat(a2[29])],
         ]);

        var options = {
          title: 'Temperature variation throughout the month',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>
    
     
    <script type="text/javascript">
      var mydata1 ='<?php echo $var1; ?>';

var obj1 = JSON.parse(mydata1);
var a21 = [];
        var z1=1;
        
        while(z1<30)
            {
               var a11=obj1[z1].avg1;
        a21.push(a11);
                z1++;
            }
    

      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
          
        var data = google.visualization.arrayToDataTable([
          ['Month', 'ph'],
          ['1',  parseFloat(a21[0])],
          ['2',  parseFloat(a21[1])],
          ['3', parseFloat(a21[2])],
          ['4',  parseFloat(a21[3])],
          ['5',  parseFloat(a21[4])],
          ['6',  parseFloat(a21[5])],
          ['7',  parseFloat(a21[6])],
          ['8',  parseFloat(a21[7])],
          ['9',  parseFloat(a21[8])],
          ['10',  parseFloat(a21[9])],
          ['11',  parseFloat(a21[10])],
          ['12',  parseFloat(a21[11])],
          ['13', parseFloat(a21[12])],
          ['14',  parseFloat(a21[13])],
          ['15',  parseFloat(a21[14])],
          ['16',  parseFloat(a21[15])],
          ['17',  parseFloat(a21[16])],
          ['18',  parseFloat(a21[17])],
          ['19',  parseFloat(a21[18])],
          ['20',  parseFloat(a21[19])],
        ['21',  parseFloat(a21[20])],
          ['22',  parseFloat(a21[21])],
          ['23', parseFloat(a21[22])],
          ['24',  parseFloat(a21[23])],
          ['25',  parseFloat(a21[24])],
          ['26',  parseFloat(a21[25])],
          ['27',  parseFloat(a21[26])],
          ['28',  parseFloat(a21[27])],
          ['29',  parseFloat(a21[28])],
          ['30',  parseFloat(a21[29])],
         ]);

        var options = {
          title: 'pH variation throughout the month',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart1'));

        chart.draw(data, options);
      }
    </script>
    
    
    
    <script type="text/javascript">
      var mydata2 ='<?php echo $var2; ?>';

var obj2 = JSON.parse(mydata2);
var a22 = [];
        var z2=1;
        
        while(z2<30)
            {
               var a12=obj2[z2].avg2;
        a22.push(a12);
                z2++;
            }
    

      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
          
        var data = google.visualization.arrayToDataTable([
          ['Month', 'salinity'],
          ['1',  parseFloat(a22[0])],
          ['2',  parseFloat(a22[1])],
          ['3', parseFloat(a22[2])],
          ['4',  parseFloat(a22[3])],
          ['5',  parseFloat(a22[4])],
          ['6',  parseFloat(a22[5])],
          ['7',  parseFloat(a22[6])],
          ['8',  parseFloat(a22[7])],
          ['9',  parseFloat(a22[8])],
          ['10',  parseFloat(a22[9])],
          ['11',  parseFloat(a22[10])],
          ['12',  parseFloat(a22[11])],
          ['13', parseFloat(a22[12])],
          ['14',  parseFloat(a22[13])],
          ['15',  parseFloat(a22[14])],
          ['16',  parseFloat(a22[15])],
          ['17',  parseFloat(a22[16])],
          ['18',  parseFloat(a22[17])],
          ['19',  parseFloat(a22[18])],
          ['20',  parseFloat(a22[19])],
        ['21',  parseFloat(a22[20])],
          ['22',  parseFloat(a22[21])],
          ['23', parseFloat(a22[22])],
          ['24',  parseFloat(a22[23])],
          ['25',  parseFloat(a22[24])],
          ['26',  parseFloat(a22[25])],
          ['27',  parseFloat(a22[26])],
          ['28',  parseFloat(a22[27])],
          ['29',  parseFloat(a22[28])],
          ['30',  parseFloat(a22[29])],
         ]);

        var options = {
          title: 'Salinity variation throughout the month',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart2'));

        chart.draw(data, options);
      }
    </script>
    
    <script type="text/javascript">
      var mydata3 ='<?php echo $var3; ?>';

var obj3 = JSON.parse(mydata3);
var a23 = [];
        var z3=1;
        
        while(z3<30)
            {
               var a13=obj3[z3].avg3;
        a23.push(a13);
                z3++;
            }
    

      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
          
        var data = google.visualization.arrayToDataTable([
          ['Month', 'Turbidity'],
          ['1',  parseFloat(a23[0])],
          ['2',  parseFloat(a23[1])],
          ['3', parseFloat(a23[2])],
          ['4',  parseFloat(a23[3])],
          ['5',  parseFloat(a23[4])],
          ['6',  parseFloat(a23[5])],
          ['7',  parseFloat(a23[6])],
          ['8',  parseFloat(a23[7])],
          ['9',  parseFloat(a23[8])],
          ['10',  parseFloat(a23[9])],
          ['11',  parseFloat(a23[10])],
          ['12',  parseFloat(a23[11])],
          ['13', parseFloat(a23[12])],
          ['14',  parseFloat(a23[13])],
          ['15',  parseFloat(a23[14])],
          ['16',  parseFloat(a23[15])],
          ['17',  parseFloat(a23[16])],
          ['18',  parseFloat(a23[17])],
          ['19',  parseFloat(a23[18])],
          ['20',  parseFloat(a23[19])],
        ['21',  parseFloat(a23[20])],
          ['22',  parseFloat(a23[21])],
          ['23', parseFloat(a23[22])],
          ['24',  parseFloat(a23[23])],
          ['25',  parseFloat(a23[24])],
          ['26',  parseFloat(a23[25])],
          ['27',  parseFloat(a23[26])],
          ['28',  parseFloat(a23[27])],
          ['29',  parseFloat(a23[28])],
          ['30',  parseFloat(a23[29])],
         ]);

        var options = {
          title: 'Turbidity variation throughout the month',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart3'));

        chart.draw(data, options);
      }
    </script>
    
    
    
    
        
    
    
     <nav>
            <div class="navbar-header">
              <a class="navbar-brand logo" href="#"><img src="image/logosmall.png"> </a>
                <h1 class="navbar-brand" >Admin Dashboard</h1>
            </div>
 
             <ul class="nav navbar-nav  navbar-right">
                 
                  <li class="active"><a href="index.html">Home</a></li>
                  <li class="active"><a href="admin.php">Dashboard</a></li>
 
            </ul>
           
    </nav>
    </head>
    
    
    <body>
         <br>
          
       
        <div class="container main">
                         <h1>Variation throughout <?php echo $m; ?></h1>

        
                 <div id="curve_chart1" style=" height: 500px"></div> 
        
                 <div id="curve_chart2" style=" height: 500px"></div>
                             <div id="curve_chart" style="  height: 500px"></div>

        
                 <div id="curve_chart3" style=" height: 500px"></div> 
            

            </div>
         
         
            
         
       
    

    
    </body> 
    
    <footer>
    <img class="darc" src="image/D'ARC.png">
    
</footer>
</html>