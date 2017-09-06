  <!-- Footer Start -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div>
                    <div class="footer-inner text-center">
                    <?php $getSocial=$db->ExecuteQuery("SELECT * FROM social_icon WHERE Status=1 ORDER BY Position ASC");?>
                    
                    <div class="social-links">
                    <?php if(count($getSocial)>0){ 
						foreach($getSocial as $value)
						{?>
								<a href="<?php echo $value['Url'];?>" class="<?php echo strtolower($value['Name']);?> social-link" data-placement="top" data-toggle="tooltip" title="<?php echo $value['Name']?>"><img src="<?php echo PATH_UPLOAD_IMAGE.'/social/thumb/'.$value['Icon_Path']?>" /></a>
						<?php }
					} ?>
                           
                     </div>
                    
                     <ul class="footer-menu">
						<?php $i=1;
						foreach($getMenu as $getMenuVal){ ?>
                        <li>
                            <a  href=
                            "<?php if(file_exists(ROOT.'/'.$getMenuVal['File_Name'])){ echo LINK_ROOT.'/'.$getMenuVal['File_Name'];}else{ echo "#";} ?>"><?php echo $getMenuVal['Menu_Name'];?></a>
                        </li>
                        <?php $i++;} ?>
                     </ul>
                     
                     <div class="copyright">   
                        <?php $getFooter=$db->ExecuteQuery("SELECT * FROM `footer`"); 
						echo $getFooter[1]['Details']?>
                     </div>
                        
                        <?php
							$ip = $_SERVER['REMOTE_ADDR']; 
							$_SESSION['current_user'] = $ip;
							
							if($_SERVER['REMOTE_ADDR']==$_SESSION['current_user'])
							{
								$count = file_get_contents("counter.txt");
								$count = trim($count);
								$count = $count + 1;
								$fl = fopen("counter.txt","w+");
								fwrite($fl,$count);
								fclose($fl);
							}
							else
							{								
								$count = file_get_contents("counter.txt");
								$count = trim($count);
								$fl = fopen("counter.txt","w+");
								fwrite($fl,$count);
								fclose($fl);
							} ?>
                    </div>
                </div>
                <div class="stat text-center">
                    <span class="stat-count"><?php echo $count;?></span>
                    <p class="stat-detail">Visitor Count</p> 
                </div>
            </div>
        </div>
        <div class="text-center designedTxtBg">Designed and developed by <a target="_blank" href="http://www.digitalvalue.in">www.digitalvalue.in</a>! presented by <a target="_blank" href="http://www.crestera.com">crestera marketing services pvt. ltd.</a>
        </div>
    </footer><!-- Footer End -->
    <!-- js  -->
    <style>
.stat {
	
    /* padding: 20px 5px; */
    /* background: #336699; */
    text-align: center;
    /* float: left; */
    /* margin-left: 100px; */
}

.stat-count {
	font-size: 25px;
	font-weight: normal;
	letter-spacing: -0.02em;
	line-height: 1.2;
	margin-bottom: 20px;
	overflow:hidden;
	font-family:"Georgia", Courier, monospace;
	padding: 0;
	position: relative;
}
.stat-detail {
	color:#fff;
	padding-top:10px;
	font: italic 1.3rem/1.75 "Georgia", Courier, monospace;
}
</style>
    <script src="<?php echo PATH_JS_LIBRARIES?>/bootstrap.min.js" type="text/javascript"></script> 
    <script src="<?php echo PATH_JS_LIBRARIES?>/jquery.mixitup.min.js" type="text/javascript"></script> 
    <script src="<?php echo PATH_JS_LIBRARIES?>/lightbox.js" type="text/javascript"></script> 
    <script src="<?php echo PATH_JS_LIBRARIES?>/plugin.js" type="text/javascript"></script> 
    <script src="<?php echo PATH_JS_LIBRARIES?>/jquery.slicknav.js" type="text/javascript"></script> 
    <script src="<?php echo PATH_JS_LIBRARIES?>/count-to.js" type="text/javascript"></script> 
    <script src="<?php echo PATH_JS_LIBRARIES?>/jquery.appear.js" type="text/javascript"></script> 
    <script src="<?php echo PATH_JS_LIBRARIES?>/main.js" type="text/javascript"></script>
    <script src="<?php echo PATH_JS_LIBRARIES?>/jquery.fancybox.min.js" type="text/javascript"></script>
    <script>
	 $(document).ready(function(){
		//FANCYBOX
		//https://github.com/fancyapps/fancyBox
		$(".fancybox").fancybox({
			openEffect: "none",
			closeEffect: "none"
		});
	});
   </script>
   
   <script type="text/javascript">
		$('.bottom-slider').owlCarousel({
			loop:true,
			margin:10,
			autoplay:true,
			autoplayTimeout:3000,
			autoplayHoverPause:false,
			responsiveClass:true,
			responsive:{
				0:{
					items:2,
					nav:true,
					loop:true
				},
				600:{
					items:2,
					nav:true,
					loop:true
				},
				1024:{
					items:3,
					nav:true,
					loop:true
				},
				1200:{
					items:3,
					nav:true,
					loop:true
				},
				
				1600:{
					items:3,
					nav:true,
					loop:true
				}
			}
		});
		</script>
  
</body>
</html>