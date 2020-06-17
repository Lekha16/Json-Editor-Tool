<?php
//Programming by Lekha, Dated 11th June 2020
//Programme to create JSON editor tool.
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge" content-type="application/json">
    <title>Json Editor Tool</title>
    <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/4.1.3/darkly/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/dynamic-form.js"></script>
    <style>

    .container { margin: 120px auto; }
    h1 { margin-bottom: 50px; }
 
#upload_button {
  display: inline-block;
}
#upload_button input[type=file] {
  display:none;
}
  </style>
</head>
<body>

<?php
if (isset($_POST['dynamic_form75']) && !isset($_POST['dynamic_form3'])):
    {
    	$submit = $_POST['submit-btn'];
    	if($submit == "Cancel")
    	{
    		 header("Refresh:0");
    	}
    	else
    	{
    		$rooms = isset($_POST['dynamic_form533']['dynamic_form533'][0]['rooms'])?$_POST['dynamic_form533']['dynamic_form533'][0]['rooms']:null;
    		$petsJson = file_get_contents('accountlist.json');
        	$t_arr = json_decode($petsJson, true);
            $t_size = sizeof($t_arr['accounts']);
            $arr = json_decode($petsJson, true);
	        $size = sizeof($arr['accounts']);
	        $t = array();
	        $raum = $_POST['raum'];
	        $pos = -1;
	        for ($i = 0;$i < $size;$i++)
	        {
	            if ($arr["accounts"][$i]["credentials"]["password"] == $raum)
	            {
	                $pos = $i;
	            }
	        }
            $t_pos = -1;
        	for ($i = 0;$i < $t_size;$i++)
        	{
        		
        			if ($t_arr["accounts"][$i]["rooms"] == $rooms && $t_arr["accounts"][$i]["credentials"]["password"] != $raum)
	            	{
	                	$t_pos = $i;
	            	}          	
        	}
        	if($t_pos != -1)
        	{
        		$t_raum = $t_arr["accounts"][$t_pos]["credentials"]["password"];
		        $dir = $_POST['raum'];
		        $size = sizeof($arr['accounts']);
		        $t = array();
		        $exist = 0;
		        $t3i = array();
		        $t2i = array();
		        for ($i = 0;$i < $size;$i++)
		        {
		            if ($arr["accounts"][$i]["credentials"]["password"] == $dir)
		            {
		                $t = $arr["accounts"][$i]["idmappings"];
		                $t2 = $arr["accounts"][$i]["presentation"];
		                $t3 = $arr["accounts"][$i]["rooms"];
		                $t5 = $arr["accounts"][$i]["name"];
		                $t6 = $arr["accounts"][$i]["company"];
		                $t8 = $arr["accounts"][$i]["videodisplay"];
		                $t9 = $arr["accounts"][$i]["videodisplayposter"];
		                $t10i = $arr["accounts"][$i]["waitforhost"];
		                $t11 = $arr["accounts"][$i]["RAUMpasscode"];
		                $exist = 1;
		            }
		        }
        
		        $len = sizeof($t10i);
		        $t10 = array();
		        for ($i = 0;$i < $len;$i++)
		        {
		            $t10[$i]['waitforhost'] = $t10i[$i];
		        }

        		$json = json_encode($arr);
                $ti = json_encode($t);
                $ti10 = json_encode($t10); //waitforhost
                $temp2arr = array(
                    'presentation' => $t2
                );
                $tem2 = array(
                    0 => $temp2arr
                );
                $temp3arr = array(
                    'rooms' => $t3
                );
                $tem3 = array(
                    0 => $temp3arr
                );
                $temp5arr = array(
                    'namecomp' => $t5
                );
                $tem5 = array(
                    0 => $temp5arr
                );

                $temp6arr = array(
                    'company' => $t6
                );
                $tem6 = array(
                    0 => $temp6arr
                );

                $temp8arr = array(
                    'videodisplay' => $t8
                );
                $tem8 = array(
                    0 => $temp8arr
                );

                $temp9arr = array(
                    'videodisplayposter' => $t9
                );
                $tem9 = array(
                    0 => $temp9arr
                );
                $temp11arr = array(
                    'RAUMpasscode' => $t11
                );
                $tem11 = array(
                    0 => $temp11arr
                );
                $ti2 = json_encode($tem2);
                $ti3 = json_encode($tem3);
                $ti5 = json_encode($tem5);
                $ti6 = json_encode($tem6);
                $ti8 = json_encode($tem8);
                $ti9 = json_encode($tem9);
                $ti11 = json_encode($tem11);
?>

       
    <div class="container">
        <h1>Edit Room: <?php echo $dir ?></h1>
        <h4> Room: '<?php echo $rooms ?>' exists in RAUM ID: <?php echo $t_raum ?></h4>
        <form id ="newform" name="newform" method = "post" enctype="multipart/form-data" >
            <div class="form-group" id="dynamic_form" >
                <div class="form-group" id="dynamic_form75">
                <div class="row">
                	<div class="col-md-1">
                		<label class ="col-form-label" >Company</label>
                	</div>
                    <div class="col-md-3">
                        <input type="text" name="company" id="company1" placeholder="Enter Company Name" class="form-control"  required="required">
                    </div>
                    <div class="button-group">
                        <input  href="javascript:void(0)" type="hidden" class="btn btn-primary" id="plus500" />
                        <input href="javascript:void(0)" type = "hidden" class="btn btn-danger" id="minus500" / >
                    </div>
                </div>
            </div>
            <div class="form-group" id="dynamic_form65">
                <div class="row">
                	<div class="col-md-1">
                		<label class ="col-form-label" >Name</label>
                	</div>
                    <div class="col-md-3">
                        <input type="text" name="namecomp" id="namecomp" placeholder="Enter Name" required="required" class="form-control">
                    </div>
                     <div class="button-group">
                    <input  href="javascript:void(0)" type="hidden" class="btn btn-primary" id="plus511" />
                        <input href="javascript:void(0)" type = "hidden" class="btn btn-danger" id="minus511" / >
                    </div>
                </div>
            </div>
                <div class="form-group" id="dynamic_form533">
                <div class="row">
                	<div class="col-md-1">
                		<label class ="col-form-label" >Room</label>
                	</div>
                     <div class="col-md-3">
                        <input type="text" name="rooms" id="rooms" required="required" placeholder="Enter room" class="form-control">
                    </div>
                    <div class="button-group">
                        <input  href="javascript:void(0)" type="hidden" class="btn btn-primary" id="plus553" />
                        <input href="javascript:void(0)" type = "hidden" class="btn btn-danger" id="minus553" / >

                    </div>
                </div>
            </div>
              <div class="form-group" id="dynamic_form85">
                <div class="row">
                	<div class="col-md-1">
                		<label class ="col-form-label" >Video </label>
                	</div>
                    <div class="col-md-3">
                        <input type="text" name="videodisplay" id="videodisplays" placeholder="Enter Video Display URL" class="form-control" >
                    </div>
                    <div class="col-md-3">
                    	  <input type="file" name="fileToUpload" id="fileToUpload" class="form-control">
                    </div>
                    <div class="col-md-3">
                    	<a class="btn btn-primary" id="minus855">Upload</a>
                    </div>
                	<div id="wait" style="display:none;width:188px;height:138px;border:2px solid black;position:absolute;top:40%;left:40%;padding:2px;"><img src='images/giphy.gif' width="180" height="130" /><br>Uploading..</div>
                    <div class="button-group">
 						<input  href="javascript:void(0)" type="hidden" class="btn btn-danger" id="plus85"/>
                        <input  href="javascript:void(0)" type="hidden" class="btn btn-danger" id="minus85"/>
                    </div>     
                </div>
            </div>
            <div class="form-group" id="dynamic_form95">
                <div class="row">
                	<div class="col-md-1">
                		<label class ="col-form-label" >Poster</label>
                	</div>
                    <div class="col-md-3">
                        <input type="text" name="videodisplayposter" id="videodisplayposter" placeholder="Enter Video Display Poster URL"  class="form-control">
                    </div>
                    <div class="col-md-3">
                    	  <input type="file" name="fileToUpload1" id="fileToUpload1" class="form-control">
                    </div>
                    <div class="col-md-3">
						<a class="btn btn-primary" id="minus955">Upload</a>     
					</div>
                    <div class="button-group">
                    	
                        <input  href="javascript:void(0)" type="hidden" class="btn btn-primary" id="plus95" />
                        <input href="javascript:void(0)" type = "hidden" class="btn btn-danger" id="minus95" / >
                    </div>
                </div>
            </div>
                <div class="form-group" id="dynamic_form455">
                <div class="row">
                	<div class="col-md-1">
                		<label class ="col-form-label" >Web URL</label>
                	</div>
                    <div class="col-md-3">
                        <input type="text" name="presentation" id="presentation" placeholder="Enter WebScreenURL" class="form-control">
                        
                    </div>
                     <div class="button-group">
                        <input  href="javascript:void(0)" type="hidden" class="btn btn-primary" id="plus544"/>
                        <input href="javascript:void(0)" type="hidden" class="btn btn-danger" id="minus544"/>

                    </div>
                </div>
            </div>
            

            <div class="form-group" id="dynamic_form105">
                <div class="row">
                	<div class="col-md-1">
                		<label class ="col-form-label" >Passcode</label>
                	</div>
                    <div class="col-md-3">
                        <input type="text" name="RAUMpasscode" id="RAUMpasscode" placeholder="Create a PassCode" required="required" class="form-control">
                    </div>
                    <div class="button-group">
                        <input  href="javascript:void(0)" type="hidden" class="btn btn-primary" id="plus105" />
                        <input href="javascript:void(0)" type = "hidden" class="btn btn-danger" id="minus105" / >
                    </div>
                </div>
            </div>
                    <div class="form-group" id="dynamic_form355">
                    <div class="row">
                    	<div class="col-md-1">
                		<label class ="col-form-label" >Oculus ID</label>
                	</div>
                    <div class="col-md-3">
                        <input type="text" name="user" id="user" required="required" placeholder="Enter Oculus ID" class="form-control">
                    </div>
                    <div class="col-md-1">
                		<label class ="col-form-label" >Display Name</label>
                	</div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" required="required" name="name" id="name" placeholder="Enter Display Name">
                    </div>                   
                    <div class="button-group">
                        <a href="javascript:void(0)" class="btn btn-primary" id="plus555">Add User</a>
                        <a href="javascript:void(0)" class="btn btn-danger" id="minus555">Remove</a>

                    </div>
                </div>
                </div>
                <div class="form-group" id="dynamic_form115">
                <div class="row">
                	<div class="col-md-1">
                		<label class ="col-form-label" >WaitForHost</label>
                	</div>
                     <div class="col-md-3">
                        <input type="text" class="form-control" rows="1" name="waitforhost"  placeholder="Enter waitforhost" id="waitforhost">
                    </div>
                    <div class="button-group">
                        <a href="javascript:void(0)" class="btn btn-primary" id="plus115">Add waitforhost</a>
                        <a href="javascript:void(0)" class="btn btn-danger" id="minus115">Remove </a>

                    </div>
                </div>
            </div>
            </div>
             <br/>
        <br/>
        <br/>
                    <input type="hidden" name="raum"  class="btn btn-primary" value=<?php echo $dir ?>>

            <input type="submit" name="submit-btn"  id="sub1"  class="btn btn-primary" value="Save">
             <input type="submit" name="submit-btn" id="sub2"  class="btn btn-primary" value="Cancel" formnovalidate>
        </form>
    </div>
    <script>
        $(document).ready(function() {

            var dynamic_form65 =  $("#dynamic_form65").dynamicForm("#dynamic_form65","#plus511", "#minus511", {
                limit:20,
                formPrefix : "dynamic_form65",
                normalizeFullForm : false
            });
            var a = <?php echo $ti5 ?>;
            dynamic_form65.inject(a);

            var dynamic_form75 =  $("#dynamic_form75").dynamicForm("#dynamic_form75", "#plus500", "#minus500", {
                limit:20,
                formPrefix : "dynamic_form75",
                normalizeFullForm : false
            });
            var b = <?php echo $ti6 ?>;
            dynamic_form75.inject(b);

            var dynamic_form85 =  $("#dynamic_form85").dynamicForm("#dynamic_form85","#plus85", "#minus85", {
                limit:20,
                formPrefix : "dynamic_form85",
                normalizeFullForm : false
            });
            var c = <?php echo $ti8 ?>;
            dynamic_form85.inject(c);
             $("#dynamic_form85 #minus85").on('click', function(){
                alert("hey");
                //$(this).closest('#dynamic_form85').remove();
            });
           

          $(document).ajaxStart(function(){
    $("#wait").css("display", "block");
  });
  $(document).ajaxComplete(function(){
   $("#wait").css("display", "none");
  });
      $('#minus855').click(function(){
           		// var str = $('#dynamic_form85').find('input[name="videodisplay"]').val();
           		// alert(str);
  			// //	document.getElementById("myForm").style.display = "block";
  			 	 var filename = $('#fileToUpload0')[0].files[0];
  			 	 var url;
           		var raum = <?php echo $dir ?>;
           		if(filename == null || filename =='')
           		{
           			alert("Please Enter a Video Display URL!");
           		}
           		else
           		{
 					var fd = new FormData();
        			fd.append('file',filename);
         			fd.append('raum',raum);
	           			$.ajax({ url: 'uploadvideo.php',
		         				data: fd,
		         				type: 'post',
		         				contentType: false,
            					processData: false,
		         				success: function(output) {
		         				$("#wait").css("display", "none");
		                      	alert(output);
		                  }
						});
						
           		}
				
			});
			 document.getElementById("minus855").onclick = function(){
			 	document.getElementById("myForm").style.display = "block";
			 	
			 }

			

            var dynamic_form95 =  $("#dynamic_form95").dynamicForm("#dynamic_form95", "#plus95", "#minus95", {
                limit:20,
                formPrefix : "dynamic_form95",
                normalizeFullForm : false
            });
            var d = <?php echo $ti9 ?>;
            dynamic_form95.inject(d);


           $('#minus955').click(function(){
           	
    			var filename = $('#fileToUpload10')[0].files[0];
  			 	 var url;
           		var raum = <?php echo $dir ?>;
           		if(filename == null || filename =='')
           		{
           			alert("Please Enter a Video Display URL!");
           		}
           		else
           		{
 					var fd = new FormData();
        			fd.append('file',filename);
         			fd.append('raum',raum);
	           			$.ajax({ url: 'uploadvideo.php',
		         				data: fd,
		         				type: 'post',
		         				contentType: false,
            					processData: false,
		         				success: function(output) {
		         				$("#wait").css("display", "none");
		                      	alert(output);
		                  }
						});
						
           		}
				
			});

            var dynamic_form105 =  $("#dynamic_form105").dynamicForm("#dynamic_form105", "#plus105", "#minus105", {
                limit:20,
                formPrefix : "dynamic_form105",
                normalizeFullForm : false
            });
            var f = <?php echo $ti11 ?>;
            dynamic_form105.inject(f);
            
            var dynamic_form355 =  $("#dynamic_form355").dynamicForm("#dynamic_form355","#plus555", "#minus555", {
                limit:20,
                formPrefix : "dynamic_form355",
                normalizeFullForm : false
            });

            var x = <?php echo $ti ?>;
            dynamic_form355.inject(x);
        
            $("#dynamic_form355 #minus555").on('click', function(){
                
                $(this).closest('#dynamic_form355').remove();
            });

            var dynamic_form115 =  $("#dynamic_form115").dynamicForm("#dynamic_form115","#plus115", "#minus115", {
                limit:20,
                formPrefix : "dynamic_form115",
                normalizeFullForm : false
            });

            var e = <?php echo $ti10 ?>;
            dynamic_form115.inject(e);
        
            $("#dynamic_form115 #minus115").on('click', function(){
                
                $(this).closest('#dynamic_form115').remove();
            });

        
            var dynamic_form455 =  $("#dynamic_form455").dynamicForm("#dynamic_form455","#plus544", "#minus544", {
                limit:20,
                formPrefix : "dynamic_form455",
                normalizeFullForm : false
            });
            
            var y = <?php echo $ti2 ?>;
            dynamic_form455.inject(y);


            var dynamic_form533 =  $("#dynamic_form533").dynamicForm("#dynamic_form533","#plus553", "#minus553", {
                limit:20,
                formPrefix : "dynamic_form533",
                normalizeFullForm : false
            });
            var z = <?php echo $ti3 ?>;
            dynamic_form533.inject(z);
              

    //         $('form').on('submit', function(event){
    //             var val = $("input[type=submit][clicked=true]").val();
    //             var values = {};
    //             var ra = <?php// echo $dir ?>;
    //             const form = document.createElement('form');
    //             form.method = "post";
    //             form.action = "index.php";
    //             $.each($('form').serializeArray(), function(i, field) {
    //                 values[field.name] = field.value;
    //                 const hiddenField = document.createElement('input');
    //                   hiddenField.type = 'hidden';
    //                   hiddenField.name = field.name;
    //                   hiddenField.value = field.value;
    //                   form.appendChild(hiddenField);                    
    //             });
    //              const hiddenField = document.createElement('input');
    //                   hiddenField.type = 'hidden';
    //                   hiddenField.name = "raum";
    //                   hiddenField.value = ra;
    //                   form.appendChild(hiddenField);
    //                   const hiddenField = document.createElement('input');
    //                   hiddenField.type = 'hidden';
    //                   hiddenField.name = "submit-btn";
    //                   hiddenField.value = val;
    //                   form.appendChild(hiddenField);
    //             document.body.appendChild(form);
    //             form.submit();
    //             console.log(values)
    //             event.preventDefault();
    //         });

    //         $("form input[type=submit]").click(function() {
    //     $("input[type=submit]", $(this).parents("form")).removeAttr("clicked");
    //     $(this).attr("clicked", "true");
    // });
        });
    </script>
    <script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>


<?php
        	}
        	else
        	{
        		//echo "in else";
        		//print_r($_POST);

        		$dyn3 = $_POST['dynamic_form355'];
        $dyn115 = $_POST['dynamic_form115'];

        $raum = $_POST['raum'];
        $sub_dyn3 = $dyn3['dynamic_form355'];
        $sub_dyn115 = $dyn115['dynamic_form115'];
       
        $size_dynamic3 = sizeof($sub_dyn3);
		$size_dynamic115 = sizeof($sub_dyn115);

        $arr_len = 0;
        $new_raum = array();
        $new_raum["company"] = $_POST['dynamic_form75']['dynamic_form75'][0]['company'];
        $new_raum["name"] = $_POST['dynamic_form65']['dynamic_form65'][0]['namecomp'];     
        //if(!is_null($videodisplay))

        // $rooms = array();
        // for ($k = 0;$k < $size_dynamic5;$k++)
        // {
        //     if (is_null($sub_dyn5[$k]["rooms"]))
        //     {
        //         $size_dynamic5 += 1;
        //     }
        //     else
        //     {
        //         array_push($rooms, $sub_dyn5[$k]["rooms"]);
        //         //$arr_len++;                
        //     }
        // }
        $rooms = isset($_POST['dynamic_form533']['dynamic_form533'][0]['rooms'])?$_POST['dynamic_form533']['dynamic_form533'][0]['rooms']:null;
       // $vidfilename dynamic_form85[dynamic_form85][0][fileToUpload]dynamic_form85[dynamic_form85][0][fileToUpload]=report.pdf
        $vidfilename = isset($_FILES['dynamic_form85']['name']['dynamic_form85'][0]['fileToUpload'])?$_FILES['dynamic_form85']['name']['dynamic_form85'][0]['fileToUpload']:null;
   		$vid_display = isset($_POST['dynamic_form85']['dynamic_form85'][0]['videodisplay'])?$_POST['dynamic_form85']['dynamic_form85'][0]['videodisplay']:null;
   		$vid_display_poster_file =  isset($_FILES['dynamic_form95']['name']['dynamic_form95'][0]['fileToUpload1'])?$_FILES['dynamic_form95']['name']['dynamic_form95'][0]['fileToUpload1']:null;
        $vid_display_poster = isset($_POST['dynamic_form95']['dynamic_form95'][0]['videodisplayposter'])?$_POST['dynamic_form95']['dynamic_form95'][0]['videodisplayposter']:null;
        $presentation = isset($_POST['dynamic_form455']['dynamic_form455'][0]['presentation'])?$_POST['dynamic_form455']['dynamic_form455'][0]['presentation']:null;
        $new_raum["rooms"] = $rooms;
       	if(!is_null($vidfilename) && ($vidfilename != ''))
       	{
       		//echo $vidfilename;
       		$new_raum["videodisplay"] = "https://dev.blanx.de/raum/".$raum."/".$vidfilename;
       	}
        else 
        {
        	if(!is_null($vid_display) && ($vid_display != ''))
        	$new_raum["videodisplay"] = $vid_display;
        //echo $vid_display;
    	}
    	if(!is_null($vid_display_poster_file) && ($vid_display_poster_file != ''))
       	{
       		$new_raum["videodisplayposter"] = "https://dev.blanx.de/raum/".$raum."/".$vid_display_poster_file;
       	}
        else 
        {
        	if(!is_null($vid_display_poster) && ($vid_display_poster != ''))
        	$new_raum["videodisplayposter"] = $vid_display_poster;
    	}
        
        if(!is_null($presentation) && ($presentation != ''))
        	$new_raum["presentation"] = $presentation;

    	$waitforhost = array();    
        for ($l = 0;$l < $size_dynamic115;$l++)
        {
            if (is_null($sub_dyn115[$l]["waitforhost"]) && ($sub_dyn115[$l]["waitforhost"] == ''))
            {
                $size_dynamic115 += 1;
            }
            		
            else
            {
                array_push($waitforhost, $sub_dyn115[$l]["waitforhost"]);
                //$arr_len++;                
            }

        }         

		$new_raum["RAUMpasscode"] = isset($_POST['dynamic_form105']['dynamic_form105'][0]['RAUMpasscode'])?$_POST['dynamic_form105']['dynamic_form105'][0]['RAUMpasscode']:null;
        

        $credentials = array(
            'username' => '',
            'password' => $raum
        );
        $new_raum['credentials'] = $credentials;

        $arr_len = 0;
        $id_arr = array();
        for ($j = 0;$j < $size_dynamic3;$j++)
        {
            $temp_arr = array();
            if (is_null($sub_dyn3[$j]["user"]) || is_null($sub_dyn3[$j]["name"]))
            {
                $size_dynamic3 += 1;
            }
            else
            {
                $temp_arr["user"] = $sub_dyn3[$j]["user"];
                $temp_arr["name"] = $sub_dyn3[$j]["name"];
                $id_arr[$arr_len] = $temp_arr;
                $arr_len++;
            }

        }
        $new_raum["idmappings"] = $id_arr;
        if(!is_null($waitforhost) && (sizeof($waitforhost) > 0 ))
        	$new_raum["waitforhost"] = $waitforhost;
        //var_dump($id_arr);
        $petsJson = file_get_contents('accountlist.json');
       
        $arr1 = json_decode($petsJson, true);

        $t=time();
		$r = (date("Ymdhis",$t));
		$r_file = "jsonbackup/accountlist_".$r.".json";
        $fp = fopen($r_file, 'w');
        fwrite($fp, json_encode($arr1, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
        fclose($fp);

        unset($arr["accounts"][$pos]);
        $arr["accounts"][$pos] = $new_raum;
        //echo json_encode($arr, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
        //print_r($final_json);
        // if (!unlink('accountlist.json'))
        // {
        //     echo ("Previous json cannot be deleted due to an error, check permissions.");
        $final_arr = array();
        $final_arr['accounts'] = array_values($arr["accounts"]); 
        $fp = fopen("accountlist.json", 'w');
        fwrite($fp, json_encode($final_arr, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
        fclose($fp);
?>
    <div class="container">
       <h4> Your modifications are saved successfully!</h4>
       <br/>
       <br/>
        <br/>
       
       <!--  <h4> The Final Json </h4><br/> <?php
        //echo "<pre>". json_encode($arr, JSON_PRETTY_PRINT| JSON_UNESCAPED_SLASHES). "</pre>"; ?> -->
        <h1>Json Editor Tool</h1>
        <br/>
        <br/>
        <form action="index.php" method="post" enctype="multipart/form-data">
        	<div class="row">
        		Enter or Create RAUM ID:
                    <div class="col-md-2">
                    	<input type="text" minlength="4" pattern="[0-9]{4,8}" maxlength="6" name="raum" required="required"> <br>  
 						<input type="hidden" name="form2_submitted" cr      value="1" />
                    </div>
            		<div class="col-md-3">
            			Allowed: (Only Numbers, Length: 4-6)
        			</div>
            </div>      
        <div class="row">
    	<input type="submit" class="btn btn-primary" value="Submit">
    </div>  
</form>
<br/><br/>
</div>
 <?php
        	}

        
}
    }
endif;
if (!isset($_POST['dynamic_form']) && isset($_POST['dynamic_form11'])):
    {
    	$submit1 = $_POST['submit-btn2'];
    	if($submit1 == "Cancel")
    	{
    		 header("Refresh:0");
    	}
    	else
    	{
    		$rooms = isset($_POST['room'])?$_POST['room']:null;
    		$petsJson = file_get_contents('accountlist.json');
        	$t_arr = json_decode($petsJson, true);
            $t_size = sizeof($t_arr['accounts']);
            
            $t_pos = -1;
        	for ($i = 0;$i < $t_size;$i++)
        	{
        		
        			if ($t_arr["accounts"][$i]["rooms"] == $rooms)
	            	{
	                	$t_pos = $i;
	            	}
        		
            	
        	}
        	if($t_pos != -1)
        	{
        		$t_raum = $t_arr["accounts"][$t_pos]["credentials"]["password"];
		        $dir = $_POST['raum'];
		        ?>
         <div class="container">
        <h1>Create Room: <?php echo $dir ?></h1>
        <h4> Room: '<?php echo $rooms ?>' already exists in RAUM ID: <?php echo $t_raum ?></h4>
        <form id ="newform" name="newform" method = "post" enctype="multipart/form-data">
            <div class="form-group" id="dynamic_form2">
                <div class="form-group" id="dynamic_form7">
                <div class="row">
                    <div class="col-md-3">
                        <input type="text" name="company" id="company" placeholder="Enter Company Name" class="form-control"  required="required">
                    </div>
                </div>
            </div>
                <div class="form-group" id="dynamic_form6">
                <div class="row">
                    <div class="col-md-3">
                        <input type="text" name="namecomp" id="namecomp" placeholder="Enter Name" required="required" class="form-control">
                    </div>
                </div>
            </div>
            <div class="form-group" id="dynamic_form5">
                <div class="row">
                     <div class="col-md-3">
                         <input type="text" class="form-control" rows="1" name="room" required="required" placeholder="Enter room-names" id="room">
                    </div>
                </div>
            </div>
            <div class="form-group" id="dynamic_form8">
                <div class="row">
                    <div class="col-md-3">
                        <input type="text" name="videodisplay" id="videodisplay" placeholder="Enter Video Display URL" class="form-control"  >
                    </div>
                    <div class="button-group">
                    	<a class="btn btn-primary" id="minus895">Upload</a>
                    	<input  href="javascript:void(0)" type="hidden" class="btn btn-danger" id="plus8095"/>
                        <input  href="javascript:void(0)" type="hidden" class="btn btn-danger" id="minus8095"/>
                    </div>
                </div>
            </div>
            <div class="form-group" id="dynamic_form9">
                <div class="row">
                    <div class="col-md-3">
                        <input type="text" name="videodisplayposter" id="videodisplayposter" placeholder="Enter Video Display Poster URL" class="form-control">
                    </div>
                    <div class="button-group">
                    	<a class="btn btn-primary" id="minus995">Upload</a>
                    	<input  href="javascript:void(0)" type="hidden" class="btn btn-danger" id="plus9095"/>
                        <input  href="javascript:void(0)" type="hidden" class="btn btn-danger" id="minus9095"/>
                    </div>
                </div>
            </div>
                <div class="form-group" id="dynamic_form4">
                <div class="row">
                    <div class="col-md-3">
                         <input type="text" class="form-control" rows="1" name="presentation" placeholder="Enter WebScreenURL " id="presentation">
                    </div>
                    
                </div>
            </div>
            <div class="form-group" id="dynamic_form10">
                <div class="row">
                    <div class="col-md-3">
                        <input type="text" name="RAUMpasscode" id="RAUMpasscode" placeholder="Create a PassCode" required="required" class="form-control">
                    </div>
                    
                </div>
            </div>
                    <div class="form-group" id="dynamic_form3">
                    <div class="row">
                    <div class="col-md-3">
                        <input type="text" name="user" id="user" required="required" placeholder="Enter Oculus ID" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" required="required" name="name" id="name" placeholder="Enter Display Name">
                    </div>                   
                    <div class="button-group">
                        <a href="javascript:void(0)" class="btn btn-primary" id="plus5">Add User</a>
                        <a href="javascript:void(0)" class="btn btn-danger" id="minus5">Remove</a>

                    </div>
                </div>
                </div>
                <div class="form-group" id="dynamic_form11">
                <div class="row">
                     <div class="col-md-3">
                        <input type="text" class="form-control" rows="1" name="waitforhost"  placeholder="Enter waitforhost" id="waitforhost">
                    </div>
                    <div class="button-group">
                        <a href="javascript:void(0)" class="btn btn-primary" id="plus055">Add waitforhost</a>
                        <a href="javascript:void(0)" class="btn btn-danger" id="minus055">Remove </a>

                    </div>
                </div>
            </div>                
            </div>
                    <br/>
        <br/>
         <input type="hidden" name="raum"  class="btn btn-primary" value=<?php echo $dir ?>>
            <input type="submit" name="submit-btn2"   class="btn btn-primary" value="Save">
             <input type="submit" name="submit-btn2"   class="btn btn-primary" value="Cancel" formnovalidate>
        </form>
     
    </div>
    <script>
        $(document).ready(function() {


        	
            var dynamic_form3 =  $("#dynamic_form3").dynamicForm("#dynamic_form3","#plus5", "#minus5", {
                limit:20,
                formPrefix : "dynamic_form3",
                normalizeFullForm : false
            });

            $("#dynamic_form3 #minus5").on('click', function(){
                
                $(this).closest('#dynamic_form3').remove();
            });            
           

            var dynamic_form11 =  $("#dynamic_form11").dynamicForm("#dynamic_form11","#plus055", "#minus055", {
                limit:20,
                formPrefix : "dynamic_form11",
                normalizeFullForm : false
            });
            
            $("#dynamic_form11 #minus055").on('click', function(){
                
                $(this).closest('#dynamic_form11').remove();
            });

            $('#minus895').click(function(){
           		var url;
           		
           		$.each($('form').serializeArray(), function(i, field) {
    //                 values[field.name] = field.value;
    				//alert(field.name);
                     if(field.name == 'videodisplay')
                      	url = field.value;            
                 });
           		if(url == null || url =='')
           		{
           			alert("Please Enter a Video Display URL!");
           		}
           		else
           		{
           			//alert(url);
           				$.ajax({ url: 'uploadvideo.php',
		         				data: {vidurl: url},
		         				type: 'post',
		         				success: function(output) {
		                      	alert(output);
		                  }
						});
           		}
				
			});
			 document.getElementById("minus855").onclick = function(){
			 	
			 }

            


           $('#minus995').click(function(){
           		// var str = $('#dynamic_form85').find('input[name="videodisplay"]').val();
           		// alert(str);
           		var url;
           		$.each($('form').serializeArray(), function(i, field) {
    //                 values[field.name] = field.value;
    			if(field.name == 'videodisplayposter')
                     	url = field.value;            
                 });
           		if(url == null || url =='')
           		{
           			alert("Please Enter a Video Display Poster URL!");
           		}
           		else
           		{
	           			$.ajax({ url: 'uploadposter.php',
		         				data: {vidurl: url},
		         				type: 'post',
		         				success: function(output) {
		                      	alert(output);
		                  }
						});
           		}
				
			});



     //        $('form').on('submit', function(event){
     //            var values = {};
     //            var val = $("input[type=submit][clicked=true]").val();
     //            alert(val);
     //            var ra = <?php echo $dir ?>;
     //            const form = document.createElement('form');
     //            form.method = "post";
     //            form.action = "index.php";
     //            $.each($('form').serializeArray(), function(i, field) {
     //                values[field.name] = field.value;
     //                const hiddenField = document.createElement('input');
     //                  hiddenField.type = 'hidden';
     //                  hiddenField.name = field.name;
     //                  hiddenField.value = field.value;
     //                  //alert(field.value);
     //                  form.appendChild(hiddenField);

                    
     //            });
     //             const hiddenField = document.createElement('input');
     //                  hiddenField.type = 'hidden';
     //                  hiddenField.name = "raum";
     //                  hiddenField.value = ra;
     //                  form.appendChild(hiddenField);
     //                  const hiddenField = document.createElement('input');
     //                  hiddenField.type = 'hidden';
     //                  hiddenField.name = "submit-btn2";

     //                  hiddenField.value = val;
     //                  form.appendChild(hiddenField);
     //            document.body.appendChild(form);
     //            form.submit();
     //            console.log(values)
     //            event.preventDefault();
     //        })
             

     //        $("form input[type=submit]").click(function() {
     //    $("input[type=submit]", $(this).parents("form")).removeAttr("clicked");
     //    $(this).attr("clicked", "true");
     // });
        });
    </script>
    <script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>


<?php
		    }
		    else
		    {
		    	$dyn3 = $_POST['dynamic_form3'];
        $dyn11 =  $_POST['dynamic_form11'];
        $raum = $_POST['raum'];
        //$sub_dyn5 = $dyn5['dynamic_form5'];
        $sub_dyn3 = $dyn3['dynamic_form3'];
        $sub_dyn11 = $dyn11['dynamic_form11'];
        //$size_dynamic5 = sizeof($sub_dyn5);
        $size_dynamic3 = sizeof($sub_dyn3);
        $size_dynamic11 = sizeof($sub_dyn11);
        $arr_len = 0;
        $new_raum = array();
        $new_raum["company"] = $_POST['company'];
        $new_raum["name"] = $_POST['namecomp'];

        $rooms = isset($_POST['room'])?$_POST['room']:null;
        $new_raum["rooms"] = $rooms;
        $vidfilename = isset($_FILES['fileToUpload'])?$_FILES['fileToUpload']:null;
        $vid_display = isset($_POST['videodisplay'])?$_POST['videodisplay']:null;
        $vid_display_poster = isset($_POST['videodisplayposter'])?$_POST['videodisplayposter']:null;
        $presentation = isset($_POST['presentation'])?$_POST['presentation']:null;
        if(!is_null($vidfilename) && ($vidfilename != ''))
        	$new_raum["videodisplay"] = $vidfilename;
        else 
        	{
        		if(!is_null($vid_display) && ($vid_display != ''))
        	$new_raum["videodisplay"] = $vid_display;
    }
        if(!is_null($vid_display_poster) && ($vid_display_poster != ''))
        	$new_raum["videodisplayposter"] = $vid_display_poster;
        if(!is_null($presentation) && ($presentation != ''))
        	$new_raum["presentation"] = $presentation;

        
        $credentials = array(
            'username' => '',
            'password' => $raum
        );
        $new_raum['credentials'] = $credentials;
        $id_arr = array();
        for ($j = 0;$j < $size_dynamic3;$j++)
        {
            $temp_arr = array();
            if (is_null($sub_dyn3[$j]["user"]) || is_null($sub_dyn3[$j]["name"]))
            {
                $size_dynamic3 += 1;
            }
            else
            {
                $temp_arr["user"] = $sub_dyn3[$j]["user"];
                $temp_arr["name"] = $sub_dyn3[$j]["name"];
                $id_arr[$arr_len] = $temp_arr;
                $arr_len++;
            }
        }
        
        $new_raum["RAUMpasscode"] = $_POST['RAUMpasscode'];
        $new_raum["idmappings"] = $id_arr;
        $waitforhost = array();
        for ($k = 0;$k < $size_dynamic11;$k++)
        {
            if (is_null($sub_dyn11[$k]["waitforhost"]) && ($sub_dyn11[$k]["waitforhost"] == ''))
            {
                $size_dynamic11 += 1;
            }
            else
            {
                array_push($waitforhost, $sub_dyn11[$k]["waitforhost"]);
            }

        }
        if(sizeof($waitforhost) != 0)
        	$new_raum["waitforhost"] = $waitforhost;

        $petsJson = file_get_contents('accountlist.json');
        $arr = json_decode($petsJson, true);
        $arr1 = json_decode($petsJson, true);

         // }
        $t=time();
		$r = (date("Ymdhis",$t));
		$r_file = "jsonbackup/accountlist_".$r.".json";
        $fp = fopen($r_file, 'w');
        fwrite($fp, json_encode($arr1, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
        fclose($fp);

        $size = sizeof($arr['accounts']);
        $arr['accounts'][$size] = $new_raum;
        $temp_array = $arr['accounts'];
        $final_arr = array();
        $final_arr['accounts'] = array_values($temp_array);

        
        $fp = fopen("accountlist.json", 'w');
        fwrite($fp, json_encode($final_arr, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
        fclose($fp);
?>
    <div class="container">
       <h4> Your modifications are saved successfully!</h4>
       <br/>
       <br/>
        <br/>
       <!--  <h4> The Final Json </h4><br/> <?php
        //echo "<pre>". json_encode($arr, JSON_PRETTY_PRINT| JSON_UNESCAPED_SLASHES). "</pre>"; ?> -->
        <h1>Json Editor Tool</h1>
        <br/>
        <br/>
        <form action="index.php" method="post" enctype="multipart/form-data">
        	<div class="row">
        		Enter or Create RAUM ID:
                    <div class="col-md-2">
                    	<input type="text" minlength="4" pattern="[0-9]{4,8}" maxlength="6" name="raum" required="required"> <br>  
 						<input type="hidden" name="form2_submitted" cr      value="1" />
                    </div>
            		<div class="col-md-3">
            			Allowed: (Only Numbers, Length: 4-6)
        			</div>
            </div>      
        <div class="row">
    	<input type="submit" class="btn btn-primary" value="Submit">
    </div>  
</form>
<br/><br/>
</div>
      <!--  <a href="accountlist.json" download>
             <button class="btn btn-primary">
                <i class="fa fa-download"></i> Download
            </button>
            Download the result json here.
        </a> -->
        <!-- <h4> The Final Json </h4><br/>
<?php //echo "<pre>". json_encode($arr, JSON_PRETTY_PRINT| JSON_UNESCAPED_SLASHES). "</pre>";
         ?> -->
        <?php

		    }
		        
       
            }
}
endif;

if (!isset($_POST['form_submitted']) && !isset($_POST['passcode_submitted']) && !isset($_POST['form2_submitted']) && !isset($_POST['dynamic_form75']) && !isset($_POST['dynamic_form3'])):
    {

        //$target_dir = "uploads/";
        $target_file = "accountlist.json"; //basename($_FILES["fileToUpload"]["name"]);
        //$uploadOk = 1;
        // Check if file already exists
        /* if (file_exists('accountlist.json')) {
        //     echo "Sorry, file already exists.";
        //     $uploadOk = 0;
            if (!unlink('accountlist.json')) {  
                echo ("Previous json cannot be deleted due to an error, check permissions.");  
                $uploadOk = 0;
            }  
        }*/
        // if ($uploadOk == 0) {
        //    echo "Sorry, your file was not uploaded.";
        // // // if everything is ok, try to upload file
        // } else {
        //   if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], "accountlist.json")) {
        //    // echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        //   } else {
        //     echo "Sorry, there was an error uploading your file.";
        //     exit();
        //   }
        // }
        $petsJson = file_get_contents('accountlist.json');

?>
<!-- <p>Go <a href="/index.php">back</a> to the form</p> -->
 <div class="container">
        <h1>Json Editor Tool</h1>
        <br/>
        <br/>
        <br/>
      
        <form action="index.php" method="post" enctype="multipart/form-data">

        	<div class="row">
        		Enter or Create RAUM ID:
                    <div class="col-md-2">
                       
 <input type="text" minlength="4" pattern="[0-9]{4,8}" maxlength="6" name="raum" required="required"> <br>  
 <input type="hidden" name="form2_submitted" cr      value="1" />
                    </div>
                     <div class="col-md-3">
                    Allowed: (Only Numbers, Length: 4-6)
                </div>
                    </div>
                <div class="row">
                <input type="submit" class="btn btn-primary" value="Submit">
            </div>
  
</form>
<br/>
        <br/>
</div>
<?php
    }
endif;
if (isset($_POST['passcode_submitted'])):
	{
		$submit = $_POST['submit-btn'];
    	if($submit == "Cancel")
    	{
    		 header("Refresh:0");
    	}
    	else
    	{

		$dir = $_POST['raum'];
		$passcode = $_POST['passcode'];
		$actual_passcode = $_POST['actual_passcode'];

		if($passcode === $actual_passcode)
		{

        $petsJson = file_get_contents('accountlist.json');
        $arr = json_decode($petsJson, true);
        $dir = $_POST['raum'];
        $size = sizeof($arr['accounts']);
        $t = array();
        $exist = 0;
        $t3i = array();
        $t2i = array();
        for ($i = 0;$i < $size;$i++)
        {
            if ($arr["accounts"][$i]["credentials"]["password"] == $dir)
            {
                $t = $arr["accounts"][$i]["idmappings"];
                $t2 = $arr["accounts"][$i]["presentation"];
                $t3 = $arr["accounts"][$i]["rooms"];
                $t5 = $arr["accounts"][$i]["name"];
                $t6 = $arr["accounts"][$i]["company"];
                $t8 = $arr["accounts"][$i]["videodisplay"];
                $t9 = $arr["accounts"][$i]["videodisplayposter"];
                $t10i = $arr["accounts"][$i]["waitforhost"];
                $t11 = $arr["accounts"][$i]["RAUMpasscode"];
                $exist = 1;
            }
        }
        //$t2i = (is_array($t2i)) ? $var : [$t2i]; //presentation
        //$t3i = (is_array($t3i)) ? $var : [$t3i]; //rooms
        //$t10i = (is_array($t10i)) ? $var : [$t10i]; //waitforhost

        // $len = sizeof($t3i);
        // $t3 = array();
        // for ($g = 0;$g < $len;$g++)
        // {
        //     $t3[$g]['rooms'] = $t3i[$g];
        // }

        //$len = sizeof($t2i);
        

        $len = sizeof($t10i);
        $t10 = array();
        for ($i = 0;$i < $len;$i++)
        {
            $t10[$i]['waitforhost'] = $t10i[$i];
        }

        $json = json_encode($arr);
                $ti = json_encode($t);
                //$ti2 = json_encode($t2);
                //$ti3 = json_encode($t3);
                $ti10 = json_encode($t10); //waitforhost
                $temp2arr = array(
                    'presentation' => $t2
                );
                $tem2 = array(
                    0 => $temp2arr
                );
                $temp3arr = array(
                    'rooms' => $t3
                );
                $tem3 = array(
                    0 => $temp3arr
                );
                $temp5arr = array(
                    'namecomp' => $t5
                );
                $tem5 = array(
                    0 => $temp5arr
                );

                $temp6arr = array(
                    'company' => $t6
                );
                $tem6 = array(
                    0 => $temp6arr
                );

                $temp8arr = array(
                    'videodisplay' => $t8
                );
                $tem8 = array(
                    0 => $temp8arr
                );

                $temp9arr = array(
                    'videodisplayposter' => $t9
                );
                $tem9 = array(
                    0 => $temp9arr
                );
                $temp11arr = array(
                    'RAUMpasscode' => $t11
                );
                $tem11 = array(
                    0 => $temp11arr
                );
               //  var_dump($tem2);
               //  var_dump($tem5);
               //  var_dump($tem6);
               //  var_dump($tem8);
               //  var_dump($tem9);
               // var_dump($tem11);
               // var_dump($ti);
               // var_dump($ti3);
               // var_dump($ti10);
                $ti2 = json_encode($tem2);
                $ti3 = json_encode($tem3);
                $ti5 = json_encode($tem5);
                $ti6 = json_encode($tem6);
                $ti8 = json_encode($tem8);
                $ti9 = json_encode($tem9);
                $ti11 = json_encode($tem11);
?>

       
    <div class="container">
        <h1>Edit Room: <?php echo $dir ?></h1>
        <h4> Successful Login, Continue To Edit </h4>
        <form id ="newform" name="newform" method = "post" enctype="multipart/form-data">
            <div class="form-group" id="dynamic_form" >
                <div class="form-group" id="dynamic_form75">
                <div class="row">
                	<div class="col-md-1">
                		<label class ="col-form-label" >Company</label>
                	</div>
                    <div class="col-md-3">
                        <input type="text" name="company" id="company1" placeholder="Enter Company Name" class="form-control"  required="required">
                    </div>
                    <div class="button-group">
                        <input  href="javascript:void(0)" type="hidden" class="btn btn-primary" id="plus500" />
                        <input href="javascript:void(0)" type = "hidden" class="btn btn-danger" id="minus500" / >
                    </div>
                </div>
            </div>
            <div class="form-group" id="dynamic_form65">
                <div class="row">
                	<div class="col-md-1">
                		<label class ="col-form-label" >Name</label>
                	</div>
                    <div class="col-md-3">
                        <input type="text" name="namecomp" id="namecomp" placeholder="Enter Name" required="required" class="form-control">
                    </div>
                     <div class="button-group">
                    <input  href="javascript:void(0)" type="hidden" class="btn btn-primary" id="plus511" />
                        <input href="javascript:void(0)" type = "hidden" class="btn btn-danger" id="minus511" / >
                    </div>
                </div>
            </div>
                <div class="form-group" id="dynamic_form533">
                <div class="row">
                	<div class="col-md-1">
                		<label class ="col-form-label" >Room</label>
                	</div>
                     <div class="col-md-3">
                        <input type="text" name="rooms" id="rooms" required="required" placeholder="Enter room" class="form-control">
                    </div>
                    <div class="button-group">
                        <input  href="javascript:void(0)" type="hidden" class="btn btn-primary" id="plus553" />
                        <input href="javascript:void(0)" type = "hidden" class="btn btn-danger" id="minus553" / >

                    </div>
                </div>
            </div>
              <div class="form-group" id="dynamic_form85">
                <div class="row">
                	<div class="col-md-1">
                		<label class ="col-form-label" >Video </label>
                	</div>
                    <div class="col-md-3">
                        <input type="text" name="videodisplay" id="videodisplays" placeholder="Enter Video Display URL" class="form-control" >
                    </div>
                    <div class="col-md-3">
                    	  <input type="file" name="fileToUpload" id="fileToUpload" class="form-control">
                    </div>
                    <div class="col-md-3">
                    	<a class="btn btn-primary" id="minus855">Upload</a>
                    </div>
                	<div id="wait" style="display:none;width:188px;height:138px;border:2px solid black;position:absolute;top:40%;left:40%;padding:2px;"><img src='images/giphy.gif' width="180" height="130" /><br>Uploading..</div>
                    <div class="button-group">
 						<input  href="javascript:void(0)" type="hidden" class="btn btn-danger" id="plus85"/>
                        <input  href="javascript:void(0)" type="hidden" class="btn btn-danger" id="minus85"/>
                    </div>     
                </div>
            </div>
            <div class="form-group" id="dynamic_form95">
                <div class="row">
                	<div class="col-md-1">
                		<label class ="col-form-label" >Poster</label>
                	</div>
                    <div class="col-md-3">
                        <input type="text" name="videodisplayposter" id="videodisplayposter" placeholder="Enter Video Display Poster URL"  class="form-control">
                    </div>
                    <div class="col-md-3">
                    	  <input type="file" name="fileToUpload1" id="fileToUpload1" class="form-control">
                    </div>
                    <div class="col-md-3">
						<a class="btn btn-primary" id="minus955">Upload</a>     
					</div>
                    <div class="button-group">
                    	
                        <input  href="javascript:void(0)" type="hidden" class="btn btn-primary" id="plus95" />
                        <input href="javascript:void(0)" type = "hidden" class="btn btn-danger" id="minus95" / >
                    </div>
                </div>
            </div>
                <div class="form-group" id="dynamic_form455">
                <div class="row">
                	<div class="col-md-1">
                		<label class ="col-form-label" >Web URL</label>
                	</div>
                    <div class="col-md-3">
                        <input type="text" name="presentation" id="presentation" placeholder="Enter WebScreenURL" class="form-control">
                        
                    </div>
                     <div class="button-group">
                        <input  href="javascript:void(0)" type="hidden" class="btn btn-primary" id="plus544"/>
                        <input href="javascript:void(0)" type="hidden" class="btn btn-danger" id="minus544"/>

                    </div>
                </div>
            </div>
            

            <div class="form-group" id="dynamic_form105">
                <div class="row">
                	<div class="col-md-1">
                		<label class ="col-form-label" >Passcode</label>
                	</div>
                    <div class="col-md-3">
                        <input type="text" name="RAUMpasscode" id="RAUMpasscode" placeholder="Create a PassCode" required="required" class="form-control">
                    </div>
                    <div class="button-group">
                        <input  href="javascript:void(0)" type="hidden" class="btn btn-primary" id="plus105" />
                        <input href="javascript:void(0)" type = "hidden" class="btn btn-danger" id="minus105" / >
                    </div>
                </div>
            </div>
                    <div class="form-group" id="dynamic_form355">
                    <div class="row">
                    	<div class="col-md-1">
                		<label class ="col-form-label" >Oculus ID</label>
                	</div>
                    <div class="col-md-3">
                        <input type="text" name="user" id="user" required="required" placeholder="Enter Oculus ID" class="form-control">
                    </div>
                    <div class="col-md-1">
                		<label class ="col-form-label" >Display Name</label>
                	</div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" required="required" name="name" id="name" placeholder="Enter Display Name">
                    </div>                   
                    <div class="button-group">
                        <a href="javascript:void(0)" class="btn btn-primary" id="plus555">Add User</a>
                        <a href="javascript:void(0)" class="btn btn-danger" id="minus555">Remove</a>

                    </div>
                </div>
                </div>
                <div class="form-group" id="dynamic_form115">
                <div class="row">
                	<div class="col-md-1">
                		<label class ="col-form-label" >WaitForHost</label>
                	</div>
                     <div class="col-md-3">
                        <input type="text" class="form-control" rows="1" name="waitforhost"  placeholder="Enter waitforhost" id="waitforhost">
                    </div>
                    <div class="button-group">
                        <a href="javascript:void(0)" class="btn btn-primary" id="plus115">Add waitforhost</a>
                        <a href="javascript:void(0)" class="btn btn-danger" id="minus115">Remove </a>

                    </div>
                </div>
            </div>
            </div>
             <br/>
        <br/>
        <br/>
                    <input type="hidden" name="raum"  class="btn btn-primary" value=<?php echo $dir ?>>

            <input type="submit" name="submit-btn"  id="sub1"  class="btn btn-primary" value="Save">
             <input type="submit" name="submit-btn" id="sub2"  class="btn btn-primary" value="Cancel" formnovalidate>
        </form>
    </div>
    <script>
        $(document).ready(function() {

            var dynamic_form65 =  $("#dynamic_form65").dynamicForm("#dynamic_form65","#plus511", "#minus511", {
                limit:20,
                formPrefix : "dynamic_form65",
                normalizeFullForm : false
            });
            var a = <?php echo $ti5 ?>;
            dynamic_form65.inject(a);

            var dynamic_form75 =  $("#dynamic_form75").dynamicForm("#dynamic_form75", "#plus500", "#minus500", {
                limit:20,
                formPrefix : "dynamic_form75",
                normalizeFullForm : false
            });
            var b = <?php echo $ti6 ?>;
            dynamic_form75.inject(b);

            var dynamic_form85 =  $("#dynamic_form85").dynamicForm("#dynamic_form85","#plus85", "#minus85", {
                limit:20,
                formPrefix : "dynamic_form85",
                normalizeFullForm : false
            });
            var c = <?php echo $ti8 ?>;
            dynamic_form85.inject(c);
             $("#dynamic_form85 #minus85").on('click', function(){
                alert("hey");
                //$(this).closest('#dynamic_form85').remove();
            });

              $('input[type="file"]').change(function(e){
        		var fileName = e.target.files[0].name;

        	   /* var id = e.target.id;*/
        	  
        	 });
            $(document).ajaxStart(function(){
    $("#wait").css("display", "block");
  });
  $(document).ajaxComplete(function(){
   $("#wait").css("display", "none");
  });
      $('#minus855').click(function(){
           		// var str = $('#dynamic_form85').find('input[name="videodisplay"]').val();
           		// alert(str);
  			// //	document.getElementById("myForm").style.display = "block";
  			 	 var filename = $('#fileToUpload0')[0].files[0];
  			 	 var url;
           		var raum = <?php echo $dir ?>;
           		if(filename == null || filename =='')
           		{
           			alert("Please Enter a Video Display URL!");
           		}
           		else
           		{
 					var fd = new FormData();
        			fd.append('file',filename);
         			fd.append('raum',raum);
	           			$.ajax({ url: 'uploadvideo.php',
		         				data: fd,
		         				type: 'post',
		         				contentType: false,
            					processData: false,
		         				success: function(output) {
		         				$("#wait").css("display", "none");
		                      	alert(output);
		                  }
						});
						
           		}
				
			});
			 document.getElementById("minus855").onclick = function(){
			 	document.getElementById("myForm").style.display = "block";
			 	
			 }

			

            var dynamic_form95 =  $("#dynamic_form95").dynamicForm("#dynamic_form95", "#plus95", "#minus95", {
                limit:20,
                formPrefix : "dynamic_form95",
                normalizeFullForm : false
            });
            var d = <?php echo $ti9 ?>;
            dynamic_form95.inject(d);


           $('#minus955').click(function(){
           		// var str = $('#dynamic_form85').find('input[name="videodisplay"]').val();
           		// alert(str);
    //        		var url;
    //        		$.each($('form').serializeArray(), function(i, field) {
    // //                 values[field.name] = field.value;
    //                  if(field.name == 'dynamic_form95[dynamic_form95][0][videodisplayposter]')
    //                  	url = field.value;            
    //              });
    //        		if(url == null || url =='')
    //        		{
    //        			alert("Please Enter a Video Display Poster URL!");
    //        		}
    //        		else
    //        		{
	   //         			$.ajax({ url: 'uploadposter.php',
		  //        				data: {vidurl: url},
		  //        				type: 'post',
		  //        				success: function(output) {
		  //        				$("#wait").css("display", "none");
		  //                     	alert(output);
		  //                 }
				// 		});
    //        		}
    			var filename = $('#fileToUpload10')[0].files[0];
  			 	 var url;
           		var raum = <?php echo $dir ?>;
           		if(filename == null || filename =='')
           		{
           			alert("Please Enter a Video Display URL!");
           		}
           		else
           		{
 					var fd = new FormData();
        			fd.append('file',filename);
         			fd.append('raum',raum);
	           			$.ajax({ url: 'uploadvideo.php',
		         				data: fd,
		         				type: 'post',
		         				contentType: false,
            					processData: false,
		         				success: function(output) {
		         				$("#wait").css("display", "none");
		                      	alert(output);
		                  }
						});
						
           		}
				
			});

            var dynamic_form105 =  $("#dynamic_form105").dynamicForm("#dynamic_form105", "#plus105", "#minus105", {
                limit:20,
                formPrefix : "dynamic_form105",
                normalizeFullForm : false
            });
            var f = <?php echo $ti11 ?>;
            dynamic_form105.inject(f);
            
            var dynamic_form355 =  $("#dynamic_form355").dynamicForm("#dynamic_form355","#plus555", "#minus555", {
                limit:20,
                formPrefix : "dynamic_form355",
                normalizeFullForm : false
            });

            var x = <?php echo $ti ?>;
            dynamic_form355.inject(x);
        
            $("#dynamic_form355 #minus555").on('click', function(){
                
                $(this).closest('#dynamic_form355').remove();
            });

            var dynamic_form115 =  $("#dynamic_form115").dynamicForm("#dynamic_form115","#plus115", "#minus115", {
                limit:20,
                formPrefix : "dynamic_form115",
                normalizeFullForm : false
            });

            var e = <?php echo $ti10 ?>;
            dynamic_form115.inject(e);
        
            $("#dynamic_form115 #minus115").on('click', function(){
                
                $(this).closest('#dynamic_form115').remove();
            });

        
            var dynamic_form455 =  $("#dynamic_form455").dynamicForm("#dynamic_form455","#plus544", "#minus544", {
                limit:20,
                formPrefix : "dynamic_form455",
                normalizeFullForm : false
            });
            
            var y = <?php echo $ti2 ?>;
            dynamic_form455.inject(y);


            var dynamic_form533 =  $("#dynamic_form533").dynamicForm("#dynamic_form533","#plus553", "#minus553", {
                limit:20,
                formPrefix : "dynamic_form533",
                normalizeFullForm : false
            });
            var z = <?php echo $ti3 ?>;
            dynamic_form533.inject(z);
              

    //         $('form').on('submit', function(event){
    //             var val = $("input[type=submit][clicked=true]").val();
    //             var values = {};
    //             var ra = <?php// echo $dir ?>;
    //             const form = document.createElement('form');
    //             form.method = "post";
    //             form.action = "index.php";
    //             $.each($('form').serializeArray(), function(i, field) {
    //                 values[field.name] = field.value;
    //                 const hiddenField = document.createElement('input');
    //                   hiddenField.type = 'hidden';
    //                   hiddenField.name = field.name;
    //                   hiddenField.value = field.value;
    //                   form.appendChild(hiddenField);                    
    //             });
    //              const hiddenField = document.createElement('input');
    //                   hiddenField.type = 'hidden';
    //                   hiddenField.name = "raum";
    //                   hiddenField.value = ra;
    //                   form.appendChild(hiddenField);
    //                   const hiddenField = document.createElement('input');
    //                   hiddenField.type = 'hidden';
    //                   hiddenField.name = "submit-btn";
    //                   hiddenField.value = val;
    //                   form.appendChild(hiddenField);
    //             document.body.appendChild(form);
    //             form.submit();
    //             console.log(values)
    //             event.preventDefault();
    //         });

    //         $("form input[type=submit]").click(function() {
    //     $("input[type=submit]", $(this).parents("form")).removeAttr("clicked");
    //     $(this).attr("clicked", "true");
    // });
        });
    </script>
    <script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>


<?php
} else
{ ?>
	 <div class="container">
        			<h1>Json Editor Tool</h1>
        			<br/>
        			<br/>
        			<br/>
      
        			<form action="index.php" method="post" enctype="multipart/form-data">
  					Incorrect Passcode for <?php echo $dir ?>, Retry:
 					<input type="password" name="passcode" required="required"> <br>  <input type="hidden" name="passcode_submitted"
					cr      value="1" /> 
					<input type="hidden" name="raum" value=<?php echo $dir ?>>
					<input type="hidden" name="actual_passcode" value=<?php echo $actual_passcode ?>>
					<input type="submit" class="btn btn-primary" name="submit-btn" value="Submit">
					<input type="submit" name="submit-btn" cr  class="btn btn-primary" value="Cancel" formnovalidate>
					</form>
					<br/>
        			<br/>
					</div>
<?php }
}
}endif;
if (isset($_POST['form2_submitted']) && !isset($_POST['passcode_submitted'])):
    {
        $petsJson = file_get_contents('accountlist.json');
        $arr = json_decode($petsJson, true);
        $dir = $_POST['raum'];
        $size = sizeof($arr['accounts']);
        $t = array();
        $exist = 0;
        $t3i = array();
        $t2i = array();
        for ($i = 0;$i < $size;$i++)
        {
            if ($arr["accounts"][$i]["credentials"]["password"] == $dir)
            {
               $t11 = $arr["accounts"][$i]["RAUMpasscode"];
               $exist = 1;
            }
        }
                if ($exist == 1):
            { ?>
            	 <div class="container">
        			<h1>Json Editor Tool</h1>
        			<br/>
        			<br/>
        			<br/>
      
        			<form action="index.php" method="post" enctype="multipart/form-data">
  					Enter Passcode for <?php echo $dir ?>:
 					<input type="password"  name="passcode" required="required"> <br>  <input type="hidden" name="passcode_submitted"
					cr      value="1" /> 
					<input type="hidden" name="raum" value=<?php echo $dir ?>>
					<input type="hidden" name="actual_passcode" value=<?php echo $t11 ?>>
					<input type="submit" class="btn btn-primary" name="submit-btn" value="Submit">
					<input type="submit" name="submit-btn" cr  class="btn btn-primary" value="Cancel" formnovalidate>
					</form>
					<br/>
        			<br/>
					</div>
<?php 
            }
            else:

?>
         <div class="container">
        <h1>Create Room: <?php echo $dir ?></h1>
        <h4>This RAUM ID doesn't exist, Proceed To Create New ID</h4>
        <form id ="newform" name="newform" method = "post" enctype="multipart/form-data">
            <div class="form-group" id="dynamic_form2">
                <div class="form-group" id="dynamic_form7">
                <div class="row">
                    <div class="col-md-3">
                        <input type="text" name="company" id="company" placeholder="Enter Company Name" class="form-control"  required="required">
                    </div>
                </div>
            </div>
                <div class="form-group" id="dynamic_form6">
                <div class="row">
                    <div class="col-md-3">
                        <input type="text" name="namecomp" id="namecomp" placeholder="Enter Name" required="required" class="form-control">
                    </div>
                </div>
            </div>
            <div class="form-group" id="dynamic_form5">
                <div class="row">
                     <div class="col-md-3">
                         <input type="text" class="form-control" rows="1" name="room" required="required" placeholder="Enter room-names" id="room">
                    </div>
                </div>
            </div>
            <div class="form-group" id="dynamic_form8">
                <div class="row">
                    <div class="col-md-3">
                        <input type="text" name="videodisplay" id="videodisplay" placeholder="Enter Video Display URL" class="form-control"  >
                    </div>
                    <div class="button-group">
                    	<a class="btn btn-primary" id="minus895">Upload</a>
                    	<input  href="javascript:void(0)" type="hidden" class="btn btn-danger" id="plus8095"/>
                        <input  href="javascript:void(0)" type="hidden" class="btn btn-danger" id="minus8095"/>
                    </div>
                </div>
            </div>
            <div class="form-group" id="dynamic_form9">
                <div class="row">
                    <div class="col-md-3">
                        <input type="text" name="videodisplayposter" id="videodisplayposter" placeholder="Enter Video Display Poster URL" class="form-control">
                    </div>
                    <div class="button-group">
                    	<a class="btn btn-primary" id="minus995">Upload</a>
                    	<input  href="javascript:void(0)" type="hidden" class="btn btn-danger" id="plus9095"/>
                        <input  href="javascript:void(0)" type="hidden" class="btn btn-danger" id="minus9095"/>
                    </div>
                </div>
            </div>
                <div class="form-group" id="dynamic_form4">
                <div class="row">
                    <div class="col-md-3">
                         <input type="text" class="form-control" rows="1" name="presentation" placeholder="Enter WebScreenURL " id="presentation">
                    </div>
                    
                </div>
            </div>
            <div class="form-group" id="dynamic_form10">
                <div class="row">
                    <div class="col-md-3">
                        <input type="text" name="RAUMpasscode" id="RAUMpasscode" placeholder="Create a PassCode" required="required" class="form-control">
                    </div>
                    
                </div>
            </div>
                    <div class="form-group" id="dynamic_form3">
                    <div class="row">
                    <div class="col-md-3">
                        <input type="text" name="user" id="user" required="required" placeholder="Enter Oculus ID" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" required="required" name="name" id="name" placeholder="Enter Display Name">
                    </div>                   
                    <div class="button-group">
                        <a href="javascript:void(0)" class="btn btn-primary" id="plus5">Add User</a>
                        <a href="javascript:void(0)" class="btn btn-danger" id="minus5">Remove</a>

                    </div>
                </div>
                </div>
                <div class="form-group" id="dynamic_form11">
                <div class="row">
                     <div class="col-md-3">
                        <input type="text" class="form-control" rows="1" name="waitforhost"  placeholder="Enter waitforhost" id="waitforhost">
                    </div>
                    <div class="button-group">
                        <a href="javascript:void(0)" class="btn btn-primary" id="plus055">Add waitforhost</a>
                        <a href="javascript:void(0)" class="btn btn-danger" id="minus055">Remove </a>

                    </div>
                </div>
            </div>                
            </div>
                    <br/>
        <br/>
         <input type="hidden" name="raum"  class="btn btn-primary" value=<?php echo $dir ?>>
            <input type="submit" name="submit-btn2"   class="btn btn-primary" value="Save">
             <input type="submit" name="submit-btn2"   class="btn btn-primary" value="Cancel" formnovalidate>
        </form>
     
    </div>
    <script>
        $(document).ready(function() {


        	
            var dynamic_form3 =  $("#dynamic_form3").dynamicForm("#dynamic_form3","#plus5", "#minus5", {
                limit:20,
                formPrefix : "dynamic_form3",
                normalizeFullForm : false
            });

            $("#dynamic_form3 #minus5").on('click', function(){
                
                $(this).closest('#dynamic_form3').remove();
            });            
           

            var dynamic_form11 =  $("#dynamic_form11").dynamicForm("#dynamic_form11","#plus055", "#minus055", {
                limit:20,
                formPrefix : "dynamic_form11",
                normalizeFullForm : false
            });
            
            $("#dynamic_form11 #minus055").on('click', function(){
                
                $(this).closest('#dynamic_form11').remove();
            });

            $('#minus895').click(function(){
           		var url;
           		
           		$.each($('form').serializeArray(), function(i, field) {
    //                 values[field.name] = field.value;
    				//alert(field.name);
                     if(field.name == 'videodisplay')
                      	url = field.value;            
                 });
           		if(url == null || url =='')
           		{
           			alert("Please Enter a Video Display URL!");
           		}
           		else
           		{
           			//alert(url);
           				$.ajax({ url: 'uploadvideo.php',
		         				data: {vidurl: url},
		         				type: 'post',
		         				success: function(output) {
		                      	alert(output);
		                  }
						});
           		}
				
			});
			 document.getElementById("minus855").onclick = function(){
			 	
			 }

            


           $('#minus995').click(function(){
           		// var str = $('#dynamic_form85').find('input[name="videodisplay"]').val();
           		// alert(str);
           		var url;
           		$.each($('form').serializeArray(), function(i, field) {
    //                 values[field.name] = field.value;
    			if(field.name == 'videodisplayposter')
                     	url = field.value;            
                 });
           		if(url == null || url =='')
           		{
           			alert("Please Enter a Video Display Poster URL!");
           		}
           		else
           		{
	           			$.ajax({ url: 'uploadposter.php',
		         				data: {vidurl: url},
		         				type: 'post',
		         				success: function(output) {
		                      	alert(output);
		                  }
						});
           		}
				
			});



     //        $('form').on('submit', function(event){
     //            var values = {};
     //            var val = $("input[type=submit][clicked=true]").val();
     //            alert(val);
     //            var ra = <?php echo $dir ?>;
     //            const form = document.createElement('form');
     //            form.method = "post";
     //            form.action = "index.php";
     //            $.each($('form').serializeArray(), function(i, field) {
     //                values[field.name] = field.value;
     //                const hiddenField = document.createElement('input');
     //                  hiddenField.type = 'hidden';
     //                  hiddenField.name = field.name;
     //                  hiddenField.value = field.value;
     //                  //alert(field.value);
     //                  form.appendChild(hiddenField);

                    
     //            });
     //             const hiddenField = document.createElement('input');
     //                  hiddenField.type = 'hidden';
     //                  hiddenField.name = "raum";
     //                  hiddenField.value = ra;
     //                  form.appendChild(hiddenField);
     //                  const hiddenField = document.createElement('input');
     //                  hiddenField.type = 'hidden';
     //                  hiddenField.name = "submit-btn2";

     //                  hiddenField.value = val;
     //                  form.appendChild(hiddenField);
     //            document.body.appendChild(form);
     //            form.submit();
     //            console.log(values)
     //            event.preventDefault();
     //        })
             

     //        $("form input[type=submit]").click(function() {
     //    $("input[type=submit]", $(this).parents("form")).removeAttr("clicked");
     //    $(this).attr("clicked", "true");
     // });
        });
    </script>
    <script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>


<?php
            endif;
        }
    endif; ?>
</body>
</html>
