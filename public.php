<html>

    <head>
      <title>HY-Qual</title>
                <link rel="icon" href="image/logoBlacks.png">

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
                <script src="https://use.fontawesome.com/e6226027d1.js"></script>
         <link rel="icon shortcut" href="image/logosmall.ico">

    <link rel="stylesheet" href="css/main.css">
        <script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>

        
         <?php
                if(isset($_GET["search"]))
                                {
                                    $a = $_GET["search"];
                                }
                                     else $a='Chembarambakkam Lake';
    
                                                    $sql= new mysqli('localhost','root', '', 'wss' );

                                                        if($sql->connect_error)

                                                            { die("connection failed:". $sql->connect_error);
                                                            }
                                
    
                $querrySearch= $sql->query("select lake.* from lake where name='$a'");
                $rowSearch = mysqli_fetch_array($querrySearch);
    
                $q=$rowSearch["sno"];

    
    
    
    
    
    
    

                                         $querry1= $sql->query("select lake.* from lake where sno=$q  "); 
                                         $querry= $sql->query("select lake.* from lake where sno=$q   "); 
                                         
                                            $row1 = mysqli_fetch_array($querry);
                                                mysqli_free_result($querry);
            ?>
    </head>
    
    <body>
       <nav class="navbar-fixed-top">
            <div class="navbar-header ">
              <a class="navbar-brand logo" href="#"><img src="image/logosmall.png"> </a>
                <h1 class="navbar-brand" >Public Dashboard</h1>
            </div>
             <ul class="nav navbar-nav  navbar-right">
                  <li class="active"><a href="index.html">Home</a></li>
                  <li><a href="#" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-user"></span> Admin</a></li>

            </ul>
           
    </nav>
                <br>
         <br>
         <br>
         <br>
    
        
     <div class="container main">
         <br>
         <div class="row">
            <div class="col-md-7">
                <div id="map"></div>
             </div>
             <div class="col-md-5" id="demo">
                 <i class="fa fa-map-marker map-marker" aria-hidden="true"></i>
                  <?php
                                                            if($querry1!==FALSE)
                                                        {
                                                            $row = mysqli_fetch_array($querry1);

                                                                         $lakename= $row["name"];
                                                            echo "<h1 style=\"text-align:center;\">".$row["name"]."</h1>
                                                           <h2 style=\"text-align:center;\">".$row["region"]."</h1>
                                                            <h2 style=\"text-align:center;\">".$row["district"]."</h1>
                                                            <h2 style=\"text-align:center;\">".$row["state"]."</h1>";


                                                              mysqli_free_result($querry1);
                                                        }
                    ?>
             </div>
         
         
         
         </div>
        
            
                                
                                
                                
           
 <!- Meter codes  -->   
    
                                <?php 



                                    $meterquery= $sql->query("select AVG(ph) as avgph from wss where date ='2017-2-02' and sno = $q"); 
                                   $meterquery1= $sql->query("select AVG(temp) as avgT from wss where date = '2017-2-02'  and sno = $q"); 
                                   $meterquery2= $sql->query("select AVG(sal) as avgS from wss where date = '2017-2-02' and sno = $q"); 
                                   $meterquery3= $sql->query("select AVG(turb) as avgTu from wss where date = '2017-02-2'  and sno = $q"); 

                                if( $meterquery!=FALSE) 
                                {
                                    $rowmet = mysqli_fetch_array($meterquery);

                                } 
                                if( $meterquery1!=FALSE) 
                                {
                                    $rowmet1 = mysqli_fetch_array($meterquery1);

                                }
                                if( $meterquery2!=FALSE) 
                                {
                                    $rowmet2 = mysqli_fetch_array($meterquery2);

                                } 
                                if( $meterquery3!=FALSE) 
                                {
                                    $rowmet3 = mysqli_fetch_array($meterquery3);

                                }





                                ?>
                            <div class=" meter-master">
                                <div class="row">
                                    <div class="col-md-6 meter">
                                 <div class="  "> 

                                           <meter class="ph_meter" low="7" high="7" optimum="7" max="14" value="<?php echo $rowmet["avgph"] ; ?>"></meter> <br><br>  
                                            <p style="text-align:center"> pH : <?php echo $rowmet["avgph"] ; ?> </p>
                                </div> 

                                <div class=" "> 

                                           <meter class="ph_meter" low="20" high="50" optimum="35" max="100" value="<?php echo $rowmet1["avgT"] ; ?>"></meter> <br> <br> 
                                                <p style="text-align:center">Temperature : <?php echo $rowmet1["avgT"] ; ?> </p>
                                </div> 
                                        </div>
                                     <div class="col-md-6 meter">
                                <div class="  "> 

                                           <meter class="ph_meter" min="222" low="550" high="650" optimum="600" max="800" value="<?php echo $rowmet2["avgS"] ; ?>"></meter> <br><br>  
                                    <p style="text-align:center"> Salinity : <?php echo $rowmet2["avgS"] ; ?> </p>
                                </div> 
                                <div class="  "> 

                                           <meter class="ph_meter" low="380" high="420" optimum="400" max="600" value="<?php echo $rowmet3["avgTu"] ; ?>"></meter> <br><br>  
                                                    <p style="text-align:center"> Turbidity: <?php echo $rowmet3["avgTu"] ; ?> </p>
                                </div> 
                                    </div>

                            </div>
                                
                                <h1>Overall Pollution Level</h1>

                            </div> <hr><br><br>
   <div class=" meter-master1">

             
       <?php 
        
        $phh=7.8;
        $tel=0;
        $teh=43;
        $tul=380;
        $tuh=420;
        $sl=550;
        $sh=650;
        $phl=6.5;

        if($rowmet["avgph"] >= $phl && $rowmet["avgph"] <=$phh && $rowmet1["avgT"]>=$tel&&$rowmet1["avgT"]<=$teh&&$rowmet2["avgS"]>=$sl&&$rowmet2["avgS"]<=$sh&&$rowmet3["avgTu"]>=$tul&&$rowmet3["avgTu"]<=$tuh)
                    $final=0;
        else if($rowmet["avgph"]>$phh||$rowmet["avgph"]<$phl)
                     $final=1;
        else if($rowmet["avgph"]>=$phl && $rowmet["avgph"]<=$phh && $rowmet1["avgT"]>$teh && $rowmet2["avgS"]>$sh && $rowmet3["avgTu"] > $tuh)
                     $final=2;
        else
        {
           
                     $final=3;
        } 
         
         
         if($final==0)
{
    echo "Waterbody is Pollution Free";
    $tweet=  "Waterbody is Pollution Free";
}
        else if($final==1)
        {
                echo "Waterbody might be polluted. Concerned Authorities has been notified";
                $tweet= "Waterbody might be polluted. Concerned Authorities has been notified";

        }
        else if($final==2||$final==3)
        {
            echo "Highly Polluted. Alert has been sent.";
           # echo "<script> window.open('http://www.crewlabz.in/mailalert.php')</script>"  ;
            $tweet= "Highly Polluted. Alert has been sent.";
            
        } 

         ?>      
                 </div>
<br>
<br>
<br>
         <hr>
        
      <div class="container water">   
         <div class="row ">
             <div class="col-md-4">
                    <img class="water-icons" src="image/Untitled-1.png"> 
    <p> Pottable  <br> 
        <?php if($final==0){echo "<i class=\"fa fa-check\" aria-hidden=\"true\"></i>";} 
                else { echo"<i class=\"fa fa-times\" aria-hidden=\"true\"></i>";} 
        ?>
        </p>
             </div>
            <div class="col-md-4">
            <img class="water-icons" src="image/nonpotable.png"> <p> Non-Pottable <br>
       <?php if($final==1){echo "<i class=\"fa fa-check\" aria-hidden=\"true\"></i>";} 
                else { echo"<i class=\"fa fa-times\" aria-hidden=\"true\"></i>";} 
        ?>
 </p>
            </div> 
            <div class="col-md-4">
                    <img class="water-icons"  src="image/wastewater-310837_1280.png">  <p> Polluted  <br>  
        <?php if($final==2||$final==3){echo "<i class=\"fa fa-check\" aria-hidden=\"true\"></i>";} 
                else { echo"<i class=\"fa fa-times\" aria-hidden=\"true\"></i>";} 
        ?>
            </div>
           </div>
        </div>      
        <hr>
 <!-- ALGORITHM  -->
    
   
        
        
        
        
        
        
        
        
        
        
</div>
        
<!-- Admin Login Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Admin Access</h4>
        </div>
        <div class="modal-body">
          <form>
                <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                  <input id="uname" type="text" class="form-control" name="uname" placeholder="Username">
                </div> <br>
                <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                  <input id="password" type="password" class="form-control" name="password" placeholder="Password">
                </div>     <br> <br> <button type="button" class="btn btn-default login" data-dismiss="modal">Log In</button>

             
        </form>
        </div>
        <div class="modal-footer">
         </div>
      </div>
    </div>
  </div>
</body>
    <br>
     
   
<footer id="footer">
    <div class="row">
        <div class="col-md-2">
            <img class="darc" src="image/D'ARC.png">

        </div>
        <div class="col-md-2 rights col-md-offset-8">
    <p2>All Rights Reserved</p2>

        </div>
    </div>
    
</footer>   
    
    
    
    
    <!-- JavaScripts -->
      
    
     <script>
        var x = <?php echo $row1["lat1"];?>;
        var y = <?php echo $row1["long1"];?>;
         var x1 = <?php echo $row1["lat2"];?>;
        var y1 = <?php echo $row1["long2"];?>;
         var x2 = <?php echo $row1["lat3"];?>;
        var y2 = <?php echo $row1["long3"];?>;
         var x3 = <?php echo $row1["lat4"];?>;
        var y3 = <?php echo $row1["long4"];?>;
         var x4 = <?php echo $row1["lat5"];?>;
        var y4 = <?php echo $row1["long5"];?>;
        var q = <?php echo $q;?>;
        
    </script>   
    <script>
                             function initMap()
                {
                          var map = new google.maps.Map(document.getElementById('map'), {
                            zoom: 13,
                            center: {lat: x1, lng: y1}
                          });

                          setMarkers(map);
                }

                        // Data for the markers consisting of a name, a LatLng and a zIndex for the
                        // order in which these markers should display on top of each other.
                        var beaches = [
                          ['device 1', x, y, 1],
                          ['device 2', x1, y1, 2],
                          ['device 3', x2, y2, 3],
                          ['device 4', x3, y3, 4],
                          ['device 5', x4, y4, 5]
                        ];

                        function setMarkers(map)
                {
                          // Adds markers to the map.

                          // Marker sizes are expressed as a Size of X,Y where the origin of the image
                          // (0,0) is located in the top left of the image.

                          // Origins, anchor positions and coordinates of the marker increase in the X
                          // direction to the right and in the Y direction down.
                          var image = {
                            url: 'image/location-pointer-pin-google-map-red.png',
                            // This marker is 20 pixels wide by 32 pixels high.
                            size: new google.maps.Size(20, 32),
                            // The origin for this image is (0, 0).
                            origin: new google.maps.Point(0, 0),
                            // The anchor for this image is the base of the flagpole at (0, 32).
                            anchor: new google.maps.Point(0, 32)
                          };
                          // Shapes define the clickable region of the icon. The type defines an HTML
                          // <area> element 'poly' which traces out a polygon as a series of X,Y points.
                          // The final coordinate closes the poly by connecting to the first coordinate.
                          var shape = {
                            coords: [1, 1, 1, 20, 18, 20, 18, 1],
                            type: 'poly'
                          };
                          for (var i = 0; i < beaches.length; i++) 
                          {
                            var beach = beaches[i];
                            var marker = new google.maps.Marker({
                              position: {lat: beach[1], lng: beach[2]},
                              map: map,
                              icon: image,
                              shape: shape,
                              title: beach[0],
                              zIndex: beach[3]
                            });
                              google.maps.event.addListener(marker, 'click', (function(marker, i) 
                                    {
                                return function() 
                                {
                                 //window.open( "ajax.php?name=" + i);
                               //document.getElementById("but").click();
                                // document.getElementById("a").innerHTML="marker"+i;

                                    function loadDoc() 
                                    {
                                              var xhttp = new XMLHttpRequest();
                                              xhttp.onreadystatechange = function() 
                                              {
                                                if (this.readyState == 4 && this.status == 200) 
                                                {
                                                 document.getElementById("demo").innerHTML = this.responseText;
                                                }
                                              };
                                              xhttp.open("GET","dials.php?sno="+q+"&modno="+i, true);
                                              xhttp.send();
                                    }
                                    loadDoc();
                                 }
                                    })(marker, i));
                          }
                 }
        </script>
        <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCrk8Gf7Ean8jzsj01fPzGk90HZ8OD9I1c&callback=initMap">
        </script>
    <script>
    function validateForm() {
    var x = document.forms["myForm"]["month"].value;
    if (x == "") {
        alert("Enter a month between 1-12 (Jan-1)");
        return false;
    }
}
    
    </script>
    <script>
    function vlogin()
       {
      var un=  document.forms["login-form"]["uname"].value;
       var up= document.forms["login-form"]["password"].value;
       if(un=="" && up=="")
           {
               alert("enter the credentials");
           }
    else if(un=="admin" && up=="admin")
        {
window.open("public.php");
        }
       }
    
    
    </script>
</html>