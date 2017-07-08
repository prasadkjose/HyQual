<html>
    
    <head>
                        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
                        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
                        <link href="css/main.css" rel="stylesheet">
                        <link href="css/circle.css" rel="stylesheet">
                        <link href="css/w3.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
                       
                        <script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>
 
    </head>

       <?php

                            
$a=$_GET["sno"];
$b=$_GET["modno"]+1;
  

                                                        $sql= new mysqli('localhost','root', '', 'wss' );

                                                        if($sql->connect_error)

                                                            { die("connection failed:". $sql->connect_error);
                                                            }

   
    if($b==1 && $a==2){
                            $querry3= $sql->query("select ard.* from ard where modno=$b and sno=$a order by date desc limit 1"); 
        if($querry3!=TRUE)
                {

                    echo " querry error";
                }
                        }
    else
    {
         $querry2= $sql->query("select wss.* from wss where modno=$b and sno=$a order by date desc limit 1"); 
           if($querry2!=TRUE)
                {

                    echo " querry error";
                }

    }
                                        
       



                        ?>
    
    
   <div class="ajax-container">
        <div class="row">
        <h1 style="text-align:center;"> LIVE DATA </h1>
    
        
                        <div class="col-md-11">
                            
         <?php
                                                        if($b==1 && $a==2)
                                                        {
                                                              
                                                             while($row = mysqli_fetch_array($querry3))
                                                                 {  
                                                                     
                                                        
                                                               echo" <div class=\" c100 p". $row["ph"] . " \"style=\"margin-top:20px;margin-left:5px;margin-bottom:50px;\">
                    
                                                                                    <span>".$row["ph"]."&nbsppH</span>
                                                                                        <div class=\"slice\">
                                                                                        <div class=\"bar\"></div>
                                                                                        <div class=\"fill\"></div>
                                                                                    </div>
                                                                                </div>";
                                                                echo" <div class=\"c100 p". $row["temp"] . "\"style=\"margin-top:20px;margin-left:5px;margin-bottom:50px;\">
                    
                                                                                    <span>".$row["temp"]."&nbsp;°C</span>
                                                                                        <div class=\"slice\">
                                                                                        <div class=\"bar\"></div>
                                                                                        <div class=\"fill\"></div>
                                                                                    </div>
                                                                                </div>";
                                                                   echo" <div class=\"c100 p". $row["turb"] ."\"style=\"margin-top:20px;margin-left:5px;margin-bottom:50px;\">
                    
                                                                                    <span>NTU&nbsp;".$row["turb"]."</span>
                                                                                        <div class=\"slice\">
                                                                                        <div class=\"bar\"></div>
                                                                                        <div class=\"fill\"></div>
                                                                                    </div>
                                                                                </div>";
                                                                     echo" <div class=\"c100 p". $row["sal"] ."\"style=\"margin-top:20px;margin-left:5px;margin-bottom:50px;\">
                    
                                                                                    <span>PSU&nbsp;".$row["sal"]."</span>
                                                                                        <div class=\"slice\">
                                                                                        <div class=\"bar\"></div>
                                                                                        <div class=\"fill\"></div>
                                                                                    </div>
                                                                                </div>";
                                                                         
                                                                     
                                                        }
                                                                                mysqli_free_result($querry3);
                                                    }
                                                        
                                                  
                                                              else
                                                              {
                                                                 {
                                                        while($row = mysqli_fetch_array($querry2))
                                                                 {  
                                                               echo" <div class=\" c100 p". $row["ph"] . " \"style=\"margin-top:20px;margin-left:5px;margin-bottom:50px;\">
                    
                                                                                    <span>".$row["ph"]."&nbsppH</span>
                                                                                        <div class=\"slice\">
                                                                                        <div class=\"bar\"></div>
                                                                                        <div class=\"fill\"></div>
                                                                                    </div>
                                                                                </div>";
                                                                echo" <div class=\"c100 p". $row["temp"] . "\"style=\"margin-top:20px;margin-left:5px;margin-bottom:50px;\">
                    
                                                                                    <span>".$row["temp"]."&nbsp;°C</span>
                                                                                        <div class=\"slice\">
                                                                                        <div class=\"bar\"></div>
                                                                                        <div class=\"fill\"></div>
                                                                                    </div>
                                                                                </div>";
                                                                   echo" <div class=\"c100 p". $row["turb"] ."\"style=\"margin-top:20px;margin-left:5px;margin-bottom:50px;\">
                    
                                                                                    <span>NTU&nbsp;".$row["turb"]."</span>
                                                                                        <div class=\"slice\">
                                                                                        <div class=\"bar\"></div>
                                                                                        <div class=\"fill\"></div>
                                                                                    </div>
                                                                                </div>";
                                                                     echo" <div class=\"c100 p". $row["sal"] ."\"style=\"margin-top:20px;margin-left:5px;margin-bottom:50px;\">
                    
                                                                                    <span>PSU&nbsp;".$row["sal"]."</span>
                                                                                        <div class=\"slice\">
                                                                                        <div class=\"bar\"></div>
                                                                                        <div class=\"fill\"></div>
                                                                                    </div>
                                                                                </div>";
                                                                         
                                                                     
                                                                     
                                                                     
                                                                 
                                                        
                                                      
                                                        }
                                                                                mysqli_free_result($querry2);
                                                        
                                                    }
                                                            
  
                                                              }
                                                      
    ?>
        </div>
                        </div>    
     </div>
    <?php
     
     mysqli_close($sql);
?>
                
</html>