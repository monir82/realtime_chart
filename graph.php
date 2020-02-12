<?php
$connection = mysqli_connect("localhost", "id12482989_ecgvalue", "12345", "id12482989_ecg");
$result=mysqli_query($connection,"SELECT value1 FROM SensorData ORDER BY id DESC LIMIT 500");
$row1=array();
while($row = mysqli_fetch_array($result, MYSQLI_NUM)){
    $row1[]=$row[0];
}
$cnt=mysqli_num_rows($result);
if($cnt>500){
   $cnt=500;   
}
?>
<html>
    <head>
        <link rel="icon" href="icon.png">
    <title>Graph</title>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <script src="plotly.min.js"></script>
    <!-- <link rel="stylesheet" type="text/css" href="styles.css"> -->
    <style type="text/css">
        body{

            background-color:whitesmoke;
        }
        h1{
            text-align:center;
        }
        img[src="https://cdn.000webhost.com/000webhost/logo/footer-powered-by-000webhost-white2.png"]{
		    display:none;
		    
		}

    </style>
    </head>
    <body>
        <div id="txtHint"></div>
    <h1>GRAPH</h1>
    <div class="wrapper">
        <div id="chart"></div>
        <script>
            var js_array = [<?php echo '"'.implode('","', $row1).'"' ?>];
            // console.log(js_array);
            var data=0;
            function p(){
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        data=JSON.parse(this.responseText);
                    }
                };
                xmlhttp.open("GET", "data.php", true);
                xmlhttp.send();
            }
            
            function getData() {
                p();
                return data;
            } 
          var layout = {
	title: 'CHART',
	showlegend: true};
            // document.write(getData());
            Plotly.plot('chart',[{
                y:js_array,
                type:'line',
            }],layout,{displayModeBar:false});
            
            // var cnt = <? echo $cnt; ?>;
            setInterval(function(){
                Plotly.extendTraces('chart',{ y:[[getData()]]}, [0]);
                cnt++;
                if(cnt > 500) {
                    Plotly.relayout('chart',{
                        xaxis: {
                            range: [cnt-500,cnt]
                        }
                    });
                }
            },500);
        </script>
    </div>
    </body>
</html>