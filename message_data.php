
            <div class="card card-prirary cardutline direct-chat direct-chat-primary" >
              <div class="card-header">
                <h3 class="card-title">Direct Chat</h3>

                <div class="card-tools">
                </div>
              </div>
              <div class="card-body" >
                <div class="direct-chat-messages fix" id="message-content" style="height:400px;overflow: scroll;display: flex;flex-direction: column-reverse;">
				<?php
				$id_faculty = $u_id;
				$q_e = $conn->query("SELECT * FROM `chat` WHERE `chat_user`='$id_faculty' ORDER BY `chat_time` DESC") or die(mysqli_error());
				while($f_e=$q_e->fetch_array()){
					
					
				    $result=$conn->query("UPDATE `chat` SET `view`='1'  WHERE `chat_to` = '$id_faculty' AND `chat_user_id`='11' AND `view`=''");
					if($result){}
					
					$chat_reps_u_id = $f_e['chat_reps_u_id'];
					$chat_time 		= $f_e['chat_time'];
					$chat_message   = $f_e['chat_message'];
					$chat_user_id   = $f_e['chat_user_id'];
					$file           = $f_e['file'];
					
					$q1 = $conn->query("SELECT * FROM `user_account1` WHERE `u_id` = '$chat_user_id'") or die(msqli_error());
					$f1 = $q1->fetch_array();
					if($chat_user_id!=$u_id){	
				?><br>
                <div class="direct-chat-msg">
                    <div class="direct-chat-infos clearfix ">
						<span class="direct-chat-name float-left" style="text-transform:capitalize;"><b>
						<a href="#" ><?php echo $f1['fname']." ".$f1['mname']." ".$f1['lname']?></a></b></span>
						<span class="direct-chat-timestamp float-left" style="font-size:10px;"><?php echo $chat_time?> </span>
                    </div>
                    <span  class="direct-chat-img" style="font-size:40px;"></span> 
                    <?php
                    if($file=="Image"){
                        ?>
                    <div class="direct-chat-text float-left">
                        <img src="folder/<?php echo $chat_message?>" width="200" height="200" >
                    </div><br>
                        <?php
                    }elseif($file=="Video"){
                        ?>
                    <div class="direct-chat-text float-left">
                        <video width="200" height="200" controls>
                            <source src="folder/<?php echo $chat_message?>">
                        </video>
                        </div><br>
                        <?php
                    }elseif($file=="Text"){
                        ?>
                    <div class="direct-chat-text float-left"><?php echo $chat_message?></div><br>
                        <?php
                    }else{
                        ?>
                    <div class="direct-chat-text float-left"><?php echo $chat_message?></div><br>
                        <?php
                    }
                    ?>
                    
                </div>
				<?php 
					}else{
				?><br>
                <div class="direct-chat-msg">
                    <div class="direct-chat-infos clearfix">
						<span class="direct-chat-name float-right" style="text-transform:capitalize;float:right;"><b>
						<?php echo $f1['fname']." ".$f1['mname']." ".$f1['lname']?></b></span>
						<span class="direct-chat-timestamp" style="font-size:10px;float:right;"><?php echo $chat_time?></span>
                    </div>
                    <span  class="direct-chat-img" style="font-size:40px;"></span> 
                    
                   <?php
                    if($file=="Image"){
                        ?>
                    <div class="direct-chat-text float-right" style="float:right;">
                        <img src="folder/<?php echo $chat_message?>" width="200" height="200" >
                    </div><br>
                        <?php
                    }elseif($file=="Video"){
                        ?>
                    <div class="direct-chat-text float-right"  style="float:right;">
                        <video width="200" height="200" controls controlsList="nodownload">
                            <source src="folder/<?php echo $chat_message?>">
                        </video>
                        </div><br>
                        <?php
                    }elseif($file=="Text"){
                        ?>
                    <div class="direct-chat-text float-right"  style="float:right;"><?php echo $chat_message?></div><br>
                        <?php
                    }else{
                        ?>
                    <div class="direct-chat-text float-right"  style="float:right;"><?php echo $chat_message?></div><br>
                        <?php
                    }
                    ?>
                    
                </div>
				<?php 
						} 
					} 
				?> 
                </div> 
                <!-- /.direct-chat-pane -->
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
				<form class="col-md-12 col-sm-8 col-12 user" method = "POST" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype = "multipart/form-data">
                  <div class="input-group">
                    
                    <input type="text" name="message" placeholder="Type Message ..." class="form-control" autocomplete="off">
                    <input type="hidden" name="order" value="<?php echo  $order;?>"class="form-control" autocomplete="off">
                    <input type="hidden" name="faculty_id" value="<?php echo  $id_faculty;?>"class="form-control" autocomplete="off">
			  <input type="hidden" value="<?php echo $_GET['id_faculty'];?>" name="id_faculty">
			  <input type="hidden" value="<?php echo $_GET['post_by'];?>" name="post_by">
			  <input type="hidden" value="<?php echo $_GET['code'];?>" name="code">
                    <span class="input-group-append">
                      <button type="submit" name="send" class="btn btn-primary">Send</button>
                    </span>
                      
                  </div><input type="file" name="file" class="form-control" width="50px">
                </form>
				 <?php 
				if(isset($_POST['send'])){
					$u_id1 = $u_id;
					$order1 =  $_POST['order'];
					$faculty_id =  $_POST['faculty_id'];
		            $id_faculty = $_POST['id_faculty'];
		            $post_by = $_POST['post_by'];
		            $code = $_POST['code'];
					date_default_timezone_set('Asia/Manila'); 
					$date = date("F/d/Y");
					$transdate = date('m/d/Y h:i:s a', time());
					$f_type = $_FILES['file']['type'];
					if($f_type== "image/gif" OR $f_type== "image/png" OR $f_type== "image/jpeg" OR $f_type== "image/JPEG" OR $f_type== "image/PNG" OR $f_type== "image/GIF"){
					    $type="Image";
					    
				$uRefNo1 = date('mdihs-y',time());
			    $tmp1=$_FILES["file"]["tmp_name"];
				$extension1 = explode("/", $_FILES["file"]["type"]);
				$message=$uRefNo1.".".$extension1[1];
				move_uploaded_file($tmp1, "folder/" .$uRefNo1.".".$extension1[1]);
					}elseif($f_type== "video/mkv" OR $f_type== "video/MKV" OR $f_type== "video/mov" OR $f_type== "video/mp4" OR $f_type== "video/3gp" OR $f_type== "video/ogg" OR $f_type== "video/mov" OR $f_type== "video/MP4" OR $f_type== "video/3GP" OR $f_type== "video/OGG"){
					    $type="Video";
					    
				$uRefNo1 = date('mdihs-y',time());
			    $tmp1=$_FILES["file"]["tmp_name"];
				$extension1 = explode("/", $_FILES["file"]["type"]);
				$message=$uRefNo1.".".$extension1[1];
				move_uploaded_file($tmp1, "folder/" .$uRefNo1.".".$extension1[1]);
					}elseif($f_type==null){
					    $type="Text";
					    $message = $_POST['message'];
					}else{
					    $type="Text";
					    $message = $_POST['message'];
					}
					$sql1 ="INSERT INTO chat VALUES(null,'$u_id1','1','$u_id1','$message','$transdate','$faculty_id','','$type')";	
						if (mysqli_query($conn, $sql1)) {
							echo '<script>
									function myFunction() {
										swal({
										title: "Success! ",
										text: "Your Message Successfully Sent",
									    icon: "success",
										type: "success"
										}).then(function(){
										window.location = "message.php?id='.$faculty_id.'";
									  });}
								  </script>';			
						}else{
							echo '<script>
									function myFunction() {
										swal({
									title: "Failed!",
									text: "Please Try Again",
									    icon: "error",
										type: "error"
										}).then(function(){
										window.location = "message.php?id='.$faculty_id.'";
									  });}
								  </script>';
						} 
				}
		  
		  ?>
              </div>
              <!-- /.card-footer-->
            </div>