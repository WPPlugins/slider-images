<?php
	class Rich_Web_Photo_Slider extends WP_Widget
	{
		function __construct()
 	  	{
 			$params=array('name'=>'Rich-Web Slider','description'=>'This is the widget of Rich-Web Slider plugin');
			parent::__construct('Rich_Web_Photo_Slider','',$params);
 	  	}
		function form($instance)
 		{
 			$defaults = array('Rich_Web_Slider'=>'');
		    $instance = wp_parse_args((array)$instance, $defaults);

		   	$Rich_Web_Slider = $instance['Rich_Web_Slider'];
		   	?>
		   	<div>			  
			   	<p>
			   		Slider Title:
			   		<select name="<?php echo $this->get_field_name('Rich_Web_Slider'); ?>" class="widefat">
				   		<?php
				   			global $wpdb;

							$table_name  = $wpdb->prefix . "rich_web_photo_slider_manager";
							$Rich_Web_Slider=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name WHERE id > %d", 0));
				   			
				   			foreach ($Rich_Web_Slider as $Rich_Web_Slider1)
				   			{
				   				?> <option value="<?php echo $Rich_Web_Slider1->id; ?>"> <?php echo $Rich_Web_Slider1->Slider_Title; ?> </option> <?php 
				   			}
				   		?>
			   		</select>
			   	</p>
		   	</div>
		   	<?php	
 		}
 		function widget($args,$instance)
 		{
 			extract($args);
 		 	$Rich_Web_Slider = empty($instance['Rich_Web_Slider']) ? '' : $instance['Rich_Web_Slider'];

 		 	global $wpdb;

			$table_name   = $wpdb->prefix . "rich_web_photo_slider_manager";
			$table_name1  = $wpdb->prefix . "rich_web_photo_slider_instal";
			$table_name2  = $wpdb->prefix . "rich_web_slider_effects_data";
			$table_name5  = $wpdb->prefix . "rich_web_slider_effect1";
			$table_name6  = $wpdb->prefix . "rich_web_slider_effect2";
			$table_name7  = $wpdb->prefix . "rich_web_slider_effect3";
			$table_name8  = $wpdb->prefix . "rich_web_slider_effect4";
			$table_name9  = $wpdb->prefix . "rich_web_slider_effect5";
			$table_name10 = $wpdb->prefix . "rich_web_slider_effect6";
			$table_name11 = $wpdb->prefix . "rich_web_slider_effect7";
			$table_name12 = $wpdb->prefix . "rich_web_slider_effect8";
			$table_name13 = $wpdb->prefix . "rich_web_slider_effect9";
			$table_name14 = $wpdb->prefix . "rich_web_slider_effect10";

			$Rich_Web_Slider_Manager=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name WHERE id = %d", $Rich_Web_Slider));
			$Rich_Web_Slider_Images=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name1 WHERE Sl_Number = %s order by id", $Rich_Web_Slider));

			$Rich_Web_Slider_Effects=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name2 WHERE slider_name = %s", $Rich_Web_Slider_Manager[0]->Slider_Type));

			if($Rich_Web_Slider_Effects[0]->slider_type=='Slider Navigation')
			{
				$Rich_Web_Slider_Effect=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name5 WHERE rich_web_slider_ID = %s", $Rich_Web_Slider_Effects[0]->id));
			}
			else if($Rich_Web_Slider_Effects[0]->slider_type=='Content Slider')
			{
				$Rich_Web_Slider_Effect=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name6 WHERE richideo_EN_ID = %s", $Rich_Web_Slider_Effects[0]->id));
			}
			else if($Rich_Web_Slider_Effects[0]->slider_type=='Fashion Slider')
			{
				$Rich_Web_Slider_Effect=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name7 WHERE rich_web_slider_ID = %s", $Rich_Web_Slider_Effects[0]->id));
			}
			else if($Rich_Web_Slider_Effects[0]->slider_type=='Circle Thumbnails')
			{
				$Rich_Web_Slider_Effect=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name8 WHERE rich_web_slider_ID = %s", $Rich_Web_Slider_Effects[0]->id));
			}
			else if($Rich_Web_Slider_Effects[0]->slider_type=='Slider Carousel')
			{
				$Rich_Web_Slider_Effect=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name9 WHERE rich_web_slider_ID = %s", $Rich_Web_Slider_Effects[0]->id));
			}
			else if($Rich_Web_Slider_Effects[0]->slider_type=='Flexible Slider')
			{
				$Rich_Web_Slider_Effect=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name10 WHERE rich_web_slider_ID = %s", $Rich_Web_Slider_Effects[0]->id));
			}
			else if($Rich_Web_Slider_Effects[0]->slider_type=='Dynamic Slider')
			{
				$Rich_Web_Slider_Effect=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name11 WHERE rich_web_slider_ID = %s", $Rich_Web_Slider_Effects[0]->id));
			}
			else if($Rich_Web_Slider_Effects[0]->slider_type=='Thumbnails Slider & Lightbox')
			{
				$Rich_Web_Slider_Effect=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name12 WHERE rich_web_slider_ID = %s", $Rich_Web_Slider_Effects[0]->id));
			}
			else if($Rich_Web_Slider_Effects[0]->slider_type=='Accordion Slider')
			{
				$Rich_Web_Slider_Effect=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name13 WHERE rich_web_slider_ID = %s", $Rich_Web_Slider_Effects[0]->id));
			}
			else if($Rich_Web_Slider_Effects[0]->slider_type=='Animation Slider')
			{
				$Rich_Web_Slider_Effect=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name14 WHERE rich_web_slider_ID = %s", $Rich_Web_Slider_Effects[0]->id));
			}
 		 	echo $before_widget;
			if($Rich_Web_Slider_Effect[0]->rich_CS_BIB=='true'){ $rich_CS_BIB = 'true'; }else{ $rich_CS_BIB = 'false'; }
			if($Rich_Web_Slider_Effect[0]->rich_CS_P=='true'){ $rich_CS_P = 'true';	}else{ $rich_CS_P = 'false'; }
			if($Rich_Web_Slider_Effect[0]->rich_CS_Loop=='true'){ $rich_CS_Loop = 'true'; }else{ $rich_CS_Loop = 'false'; }
			if($Rich_Web_Slider_Effect[0]->rich_CS_Video_TShow=='true'){ $rich_CS_Video_TShow = 'block'; }else{ $rich_CS_Video_TShow = 'none'; }
			if($Rich_Web_Slider_Effect[0]->rich_CS_Video_DShow=='true'){ $rich_CS_Video_DShow = 'block'; }else{	$rich_CS_Video_DShow = 'none'; }			
			if($Rich_Web_Slider_Effect[0]->rich_CS_Video_Show=='true'){	$rich_CS_Video_Show = $Rich_Web_Slider_Effect[0]->rich_CS_Video_W; }else{ $rich_CS_Video_Show = '0'; }
			if($rich_CS_Video_Show == '0'){	$padLeft = '0';	}else{ $padLeft = '10';	}
			if($Rich_Web_Slider_Effect[0]->rich_CS_Icon == 1){ $Rich_PS_Left_Icon='rich_web rich_web-angle-double-left'; $Rich_PS_Right_Icon='rich_web rich_web-angle-double-right'; }
			else if($Rich_Web_Slider_Effect[0]->rich_CS_Icon == 2){ $Rich_PS_Left_Icon='rich_web rich_web-angle-left'; $Rich_PS_Right_Icon='rich_web rich_web-angle-right';	}
 		 	else if($Rich_Web_Slider_Effect[0]->rich_CS_Icon == 3){	$Rich_PS_Left_Icon='rich_web rich_web-arrow-circle-left'; $Rich_PS_Right_Icon='rich_web rich_web-arrow-circle-right'; }
 		 	else if($Rich_Web_Slider_Effect[0]->rich_CS_Icon == 4){	$Rich_PS_Left_Icon='rich_web rich_web-arrow-circle-o-left'; $Rich_PS_Right_Icon='rich_web rich_web-arrow-circle-o-right'; }
 		 	else if($Rich_Web_Slider_Effect[0]->rich_CS_Icon == 5){	$Rich_PS_Left_Icon='rich_web rich_web-arrow-left'; $Rich_PS_Right_Icon='rich_web rich_web-arrow-right';	}
 		 	else if($Rich_Web_Slider_Effect[0]->rich_CS_Icon == 6){	$Rich_PS_Left_Icon='rich_web rich_web-caret-left'; $Rich_PS_Right_Icon='rich_web rich_web-caret-right';	}
 		 	else if($Rich_Web_Slider_Effect[0]->rich_CS_Icon == 7){	$Rich_PS_Left_Icon='rich_web rich_web-caret-square-o-left';	$Rich_PS_Right_Icon='rich_web rich_web-caret-square-o-right'; }
 		 	else if($Rich_Web_Slider_Effect[0]->rich_CS_Icon == 8){	$Rich_PS_Left_Icon='rich_web-chevron-circle-left'; $Rich_PS_Right_Icon='rich_web-chevron-circle-right';	}
			else if($Rich_Web_Slider_Effect[0]->rich_CS_Icon == 9){	$Rich_PS_Left_Icon='rich_web rich_web-chevron-left'; $Rich_PS_Right_Icon='rich_web rich_web-chevron-right';	}
			else if($Rich_Web_Slider_Effect[0]->rich_CS_Icon == 10){ $Rich_PS_Left_Icon='rich_web rich_web-hand-o-left'; $Rich_PS_Right_Icon='rich_web rich_web-hand-o-right'; }
			else if($Rich_Web_Slider_Effect[0]->rich_CS_Icon == 11){ $Rich_PS_Left_Icon='rich_web rich_web-long-arrow-left'; $Rich_PS_Right_Icon='rich_web rich_web-long-arrow-right';}
			if($Rich_Web_Slider_Effect[0]->rich_CS_Video_ArrShow=='true'){ $rich_CS_Video_ArrShow = 'inline-block'; }else{ $rich_CS_Video_ArrShow = 'none'; }			
			//Fashion Slider 			
			if($Rich_Web_Slider_Effect[0]->rich_fsl_SShow==''){	$rich_fsl_SShow = false; }else{ $rich_fsl_SShow = true;	}
			if($Rich_Web_Slider_Effect[0]->rich_fsl_Ic_Show==''){ $rich_fsl_Ic_Show = false; }else{ $rich_fsl_Ic_Show = true; }
			if($Rich_Web_Slider_Effect[0]->rich_fsl_PPL_Show==''){ $rich_fsl_PPL_Show = false; }else{ $rich_fsl_PPL_Show = true; }
			if($Rich_Web_Slider_Effect[0]->rich_fsl_Randomize==''){	$rich_fsl_Randomize = false; }else{ $rich_fsl_Randomize = true; }
			if($Rich_Web_Slider_Effect[0]->rich_fsl_Loop==''){ $rich_fsl_Loop = false; }else{ $rich_fsl_Loop = true; }
			if($Rich_Web_Slider_Effect[0]->rich_fsl_Desc_Show==''){	$rich_fsl_Desc_Show = 'false'; }else{ $rich_fsl_Desc_Show = 'true';	}
 		 	?>
 		 		<?php if($Rich_Web_Slider_Effects[0]->slider_type=='Slider Navigation'){ ?>
					<link rel="stylesheet" href="<?php echo plugins_url('/Style/flexslider.css',__FILE__);?>" />
					<link rel="stylesheet" href="<?php echo plugins_url('/Style/Rich-Web-Slider-Widget.css',__FILE__);?>" />
					<style type="text/css">
						.flexslider_1 .flex-direction-nav .flex-next .preview img,.flexslider_1 .flex-direction-nav .flex-prev .preview img{
							box-shadow:none !important;
						}
						<?php if($Rich_Web_Slider_Effect[0]->rich_web_Sl1_ArHEff=='slide out'){ ?>
							/* general style */
							.flexslider_<?php echo $Rich_Web_Slider;?> .flex-direction-nav a .preview {
								width: 360px;
								height:100% !important;
								position: absolute;
								top:0;
								left:-<?php echo $Rich_Web_Slider_Effect[0]->rich_web_Sl1_ArBoxW;?>px;
								z-index:100;
								-webkit-transition:  all 0.3s ease-out !important; 
								-moz-transition:  all 0.3s ease-out !important; 
								transition:  all 0.3s ease-out !important; 	
								opacity:0;
							}							
							.flexslider_<?php echo $Rich_Web_Slider;?> .flex-direction-nav a .preview .alt {
								position: absolute;								
								top:0;
								background: <?php echo $Rich_Web_Slider_Effect[0]->rich_web_Sl1_TBgC;?> !important;
								width: <?php echo $Rich_Web_Slider_Effect[0]->rich_web_Sl1_ArBoxW*2;?>px;
								height:100% !important;
								color: <?php echo $Rich_Web_Slider_Effect[0]->rich_web_Sl1_TC;?>;
								text-indent:0;
								<?php if($Rich_Web_Slider_Effect[0]->rich_web_Sl1_TUp=='true'){ ?>
									text-transform: uppercase !important;
								<?php }else{?>
									text-transform: none !important;
								<?php }?>
								text-align:<?php echo $Rich_Web_Slider_Effect[0]->rich_web_Sl1_TTA;?>;
								padding: 0px 5px;
								
								font-family: <?php echo $Rich_Web_Slider_Effect[0]->rich_web_Sl1_TFF;?>;
								
								-webkit-box-sizing: border-box;
								-moz-box-sizing: border-box;
								-o-box-sizing: border-box;
							}
							/* next button */			
							.flexslider_<?php echo $Rich_Web_Slider;?> .flex-direction-nav .flex-next .preview {
								right:-<?php echo $Rich_Web_Slider_Effect[0]->rich_web_Sl1_ArBoxW;?>px;
								left:auto;	
							}
							.flexslider_<?php echo $Rich_Web_Slider;?> .flex-direction-nav .flex-prev .preview .alt {
								left:<?php echo $Rich_Web_Slider_Effect[0]->rich_web_Sl1_ArBoxW*2;?>px;
							}
							.flexslider_<?php echo $Rich_Web_Slider;?> .flex-direction-nav .flex-next .preview .alt {
								right:<?php echo $Rich_Web_Slider_Effect[0]->rich_web_Sl1_ArBoxW*2;?>px;
							}
							/* hover style */		
							.flexslider_<?php echo $Rich_Web_Slider;?> .flex-direction-nav .flex-prev:hover .preview {
								left:0;
								opacity:1;
							}
							.flexslider_<?php echo $Rich_Web_Slider;?> .flex-direction-nav .flex-next:hover .preview {
								right:0;
								opacity:1;
							}	
							.flexslider_<?php echo $Rich_Web_Slider;?> .flex-direction-nav .flex-prev .preview img {
								position: absolute;
								left:<?php echo $Rich_Web_Slider_Effect[0]->rich_web_Sl1_ArBoxW;?>px;
								top:0;
								width: <?php echo $Rich_Web_Slider_Effect[0]->rich_web_Sl1_ArBoxW;?>px;
								height:100% !important;
								-webkit-transition:  all 0s ease-out !important; 
								-moz-transition:  all 0s ease-out !important; 
								transition:  all 0s ease-out !important;
							}
							.flexslider_<?php echo $Rich_Web_Slider;?> .flex-direction-nav .flex-next .preview img {
								position: absolute;
								right:<?php echo $Rich_Web_Slider_Effect[0]->rich_web_Sl1_ArBoxW;?>px;
								top:0;
								width: <?php echo $Rich_Web_Slider_Effect[0]->rich_web_Sl1_ArBoxW;?>px;
								height:100% !important;
								box-shadow:none !important;
								-webkit-transition:  all 0s ease-out !important; 
								-moz-transition:  all 0s ease-out !important; 
								transition:  all 0s ease-out !important;
							}
						<?php } else if($Rich_Web_Slider_Effect[0]->rich_web_Sl1_ArHEff=='flip out'){ ?>
							/* general style */
							.flexslider_<?php echo $Rich_Web_Slider;?> .flex-direction-nav a .preview {
								width: <?php echo $Rich_Web_Slider_Effect[0]->rich_web_Sl1_ArBoxW;?>px;
								height:100% !important;
								position: absolute;
								top:0;
								
								z-index:100;
								-webkit-transition:  -webkit-transform 0.3s ease-out; 
								-moz-transition:  transform 0.3s ease-out; 
								transition:  transform 0.3s ease-out; 	
							}
							.flexslider_<?php echo $Rich_Web_Slider;?> .flex-direction-nav .flex-prev .preview img {
								position: absolute;
								left:0;
								top:0;
								width: <?php echo $Rich_Web_Slider_Effect[0]->rich_web_Sl1_ArBoxW;?>px;
								
								height:100% !important;
								-webkit-transition:  -webkit-transform 0.3s ease-out !important; 
								-moz-transition:  transform 0.3s ease-out !important; 
								transition:  transform 0.3s ease-out !important; 
							}
							.flexslider_<?php echo $Rich_Web_Slider;?> .flex-direction-nav .flex-next .preview img {
								position: absolute;
								right:0;
								top:0;
								width: <?php echo $Rich_Web_Slider_Effect[0]->rich_web_Sl1_ArBoxW;?>px;
								
								height:100% !important;
								-webkit-transition:  -webkit-transform 300ms ease-out !important; 
								-moz-transition:  transform 0.3s ease-out !important; 
								transition:  transform 0.3s ease-out !important; 
							}
							.flexslider_<?php echo $Rich_Web_Slider;?> .flex-direction-nav a .preview .alt {
								display:none;
							}
							/* prev button */				
							.flexslider_<?php echo $Rich_Web_Slider;?> .flex-direction-nav .flex-prev {
								-webkit-perspective-origin: 100% 50%;
								perspective-origin: 100% 50%;
								-webkit-perspective: 1000px;
								perspective: 1000px;			
							}
							.flexslider_<?php echo $Rich_Web_Slider;?> .flex-direction-nav .flex-prev .preview {
								-webkit-transform: rotateY(90deg);
								transform: rotateY(90deg);
								-webkit-transform-origin: 0% 50%;
								transform-origin: 0% 50%;
							}
							/* next button */				
							.flexslider_<?php echo $Rich_Web_Slider;?> .flex-direction-nav .flex-next {
								-webkit-perspective-origin: 0% 50%;
								perspective-origin: 0% 50%;			
								-webkit-perspective: 1000px;
								perspective: 1000px;				
							}
							.flexslider_<?php echo $Rich_Web_Slider;?> .flex-direction-nav .flex-next .preview {
								
								left:auto;	
								-webkit-transform: rotateY(-90deg);
								transform: rotateY(-90deg);
								-webkit-transform-origin: 100% 100%;
								transform-origin: 100% 100%;
							}
							/* hover style */				
							.flexslider_<?php echo $Rich_Web_Slider;?> .flex-direction-nav a:hover .preview {
								opacity:1;
								-webkit-transform: rotateY(0deg);
								transform: rotateY(0deg);			
							}
							/* different hover style for flexslider nav */
							.flexslider_<?php echo $Rich_Web_Slider;?> .flex-direction-nav a {
								-webkit-transition:  none !important; 
								-moz-transition: none !important; 
								transition:  none !important;		
							}	
						<?php } else if($Rich_Web_Slider_Effect[0]->rich_web_Sl1_ArHEff=='double flip out'){ ?>
							/* general style */
							.flexslider_<?php echo $Rich_Web_Slider;?> .flex-direction-nav a .preview {
								width: 270px;
								height:100% !important;
								position: absolute;
								top:0;
								z-index:100;
								-webkit-transition:  -webkit-transform 0.3s ease-out !important; 
								-moz-transition:  transform 0.3s ease-out !important; 
								transition:  transform 0.3s ease-out !important; 	
								-webkit-backface-visibility: hidden !important;
								backface-visibility: hidden;	
								-webkit-perspective-origin: 100% 50%;
								perspective-origin: 100% 50%;
								-webkit-perspective: 1000px;
								perspective: 1000px;										
							}
							.flexslider_<?php echo $Rich_Web_Slider;?> .flex-direction-nav a .preview img {
								position: absolute;
								top:0;
								height: 100%;	
								z-index:10;		
							}
							.flexslider_<?php echo $Rich_Web_Slider;?> .flex-direction-nav a .preview .alt {
								background: <?php echo $Rich_Web_Slider_Effect[0]->rich_web_Sl1_TBgC;?>;
								height:100% !important;
								color: <?php echo $Rich_Web_Slider_Effect[0]->rich_web_Sl1_TC;?>;
								text-indent:0;
								<?php if($Rich_Web_Slider_Effect[0]->rich_web_Sl1_TUp=='true'){ ?>
									text-transform: uppercase !important;
								<?php }else{?>
									text-transform: none !important;
								<?php }?>
								text-align:<?php echo $Rich_Web_Slider_Effect[0]->rich_web_Sl1_TTA;?>;
								padding: 0px 5px;
								font-family: <?php echo $Rich_Web_Slider_Effect[0]->rich_web_Sl1_TFF;?>;
								position: absolute;
								top:0;
								-webkit-box-sizing: border-box;
								-moz-box-sizing: border-box;
								-o-box-sizing: border-box;
									
								-webkit-transition:  -webkit-transform 0.3s ease-out !important; 
								-moz-transition:  transform 0.3s ease-out !important; 
								transition:  transform 0.3s ease-out !important; 	
															
								-webkit-backface-visibility: hidden;
								backface-visibility: hidden;	
								z-index:5;			
							}
							/* previous button */		
							.flexslider_<?php echo $Rich_Web_Slider;?> .flex-direction-nav .flex-prev {
								-webkit-perspective-origin: 100% 50%;
								perspective-origin: 100% 50%;
								-webkit-perspective: 1000px;
								perspective: 1000px;					
							}
							.flexslider_<?php echo $Rich_Web_Slider;?> .flex-direction-nav .flex-prev .preview,
							.flexslider_<?php echo $Rich_Web_Slider;?> .flex-direction-nav .flex-prev .preview .alt {
								-webkit-transform: rotateY(90deg);
								transform: rotateY(90deg);
								-webkit-transform-origin: 0% 50%;
								transform-origin: 0% 50%;
								-webkit-transition:  -webkit-transform 0.3s ease-out !important; 
								-moz-transition:  transform 0.3s ease-out !important; 
								transition:  transform 0.3s ease-out !important; 	
							}
							/* next button */
							.flexslider_<?php echo $Rich_Web_Slider;?> .flex-direction-nav .flex-next {
								-webkit-perspective-origin: 0% 50%;
								perspective-origin: 0% 50%;			
								-webkit-perspective: 1000px;
								perspective: 1000px;
							}
							.flexslider_<?php echo $Rich_Web_Slider;?> .flex-direction-nav .flex-next .preview,
							.flexslider_<?php echo $Rich_Web_Slider;?> .flex-direction-nav .flex-next .preview .alt {
								
								left:auto;	
								-webkit-transform: rotateY(-90deg);
								transform: rotateY(-90deg);
								-webkit-transform-origin: 100% 50%;
								transform-origin: 100% 50%;	
								-webkit-transition:  -webkit-transform 0.3s ease-out !important; 
								-moz-transition:  transform 0.3s ease-out !important; 
								transition:  transform 0.3s ease-out !important; 	
							}	
							.flexslider_<?php echo $Rich_Web_Slider;?> .flex-direction-nav .flex-prev .preview img {
								left: 0;
								-webkit-transition:  -webkit-transform 0.3s ease-out !important; 
								-moz-transition:  transform 0.3s ease-out !important; 
								transition:  transform 0.3s ease-out !important; 	
							}
							.flexslider_<?php echo $Rich_Web_Slider;?> .flex-direction-nav .flex-next .preview img {
								position: absolute;
								right:0;
								top:0;
								width: <?php echo $Rich_Web_Slider_Effect[0]->rich_web_Sl1_ArBoxW;?>px;
								-webkit-transition:  -webkit-transform 0.3s ease-out !important; 
								-moz-transition:  transform 0.3s ease-out !important; 
								transition:  transform 0.3s ease-out !important; 	
							}
							/* hover style */
							.flexslider_<?php echo $Rich_Web_Slider;?> .flex-direction-nav a:hover .preview,
							.flexslider_<?php echo $Rich_Web_Slider;?> .flex-direction-nav a:hover .preview .alt {
								opacity:1;
								-webkit-transform: rotateY(0deg);
								transform: rotateY(0deg);						
							}
							.flexslider_<?php echo $Rich_Web_Slider;?> .flex-direction-nav a:hover .preview .alt {		
								
								-webkit-transition-delay: 0.3s !important;
								transition-delay: 0.3s !important;			
							}
							/* different hover style for flexslider nav */
							.flexslider_<?php echo $Rich_Web_Slider;?> .flex-direction-nav a {
								-webkit-transition:  none !important; 
								-moz-transition: none !important; 
								transition:  none !important;		
							}	
						<?php } else if($Rich_Web_Slider_Effect[0]->rich_web_Sl1_ArHEff=='both ways'){ ?>
							/* general style */
							.flexslider_<?php echo $Rich_Web_Slider;?> .flex-direction-nav a .preview {
								
								height:100% !i;
								position: absolute;
								top:0;
								
								z-index:90;
							}
							.flexslider_<?php echo $Rich_Web_Slider;?> .flex-direction-nav a .preview img {
								position: absolute;
								top:0px;
								
								height: 100%;
								-webkit-transition:  all 0.3s ease-out !important; 
								-moz-transition:  all 0.3s ease-out !important; 
								transition:  all 0.3s ease-out !important; 	
								opacity:0;
							}
							.flexslider_<?php echo $Rich_Web_Slider;?> .flex-direction-nav a .preview .alt {
								background: <?php echo $Rich_Web_Slider_Effect[0]->rich_web_Sl1_TBgC;?>;
								
								height:100% !important;
								color: <?php echo $Rich_Web_Slider_Effect[0]->rich_web_Sl1_TC;?>;
								text-indent:0;
								<?php if($Rich_Web_Slider_Effect[0]->rich_web_Sl1_TUp=='true'){ ?>
									text-transform: uppercase !important;
								<?php }else{?>
									text-transform: none !important;
								<?php }?>
								text-align:<?php echo $Rich_Web_Slider_Effect[0]->rich_web_Sl1_TTA;?>;
								padding: 0px 5px;
								
								font-family: <?php echo $Rich_Web_Slider_Effect[0]->rich_web_Sl1_TFF;?>;
								
								position: absolute;
								top:0;
								-webkit-box-sizing: border-box;
								-moz-box-sizing: border-box;
								-o-box-sizing: border-box;
								-webkit-transition:  all 0.3s ease-out !important; 
								-moz-transition:  all 0.3s ease-out !important; 
								transition:  all 0.3s ease-out !important; 	
								opacity:0;						
							}
							/* next button */		
							.flexslider_<?php echo $Rich_Web_Slider;?> .flex-direction-nav .flex-next .preview {
								right:-<?php echo $Rich_Web_Slider_Effect[0]->rich_web_Sl1_ArBoxW;?>px;
								left:auto;	
							}
							.flexslider_<?php echo $Rich_Web_Slider;?> .flex-direction-nav .flex-next .preview img {
								position: absolute;
								right:<?php echo $Rich_Web_Slider_Effect[0]->rich_web_Sl1_ArBoxW;?>px;
							}
							.flexslider_<?php echo $Rich_Web_Slider;?> .flex-direction-nav .flex-next .preview .alt {
								left:auto;
								right:-<?php echo $Rich_Web_Slider_Effect[0]->rich_web_Sl1_ArBoxW;?>px;
							}
							.flexslider_<?php echo $Rich_Web_Slider;?> .flex-direction-nav .flex-prev .preview .alt {
								
								
								left:auto;
							}
							.flexslider_<?php echo $Rich_Web_Slider;?> .flex-direction-nav .flex-prev .preview img {
								left:<?php echo $Rich_Web_Slider_Effect[0]->rich_web_Sl1_ArBoxW;?>px;
							}
							/* hover style */		
							.flexslider_<?php echo $Rich_Web_Slider;?> .flex-direction-nav .flex-prev:hover .preview .alt {
								transform:translateX(50%);
								opacity:1;
							}
							.flexslider_<?php echo $Rich_Web_Slider;?> .flex-direction-nav .flex-next:hover .preview .alt {
								transform:translateX(-100%);
								opacity:1;
							}
							.flexslider_<?php echo $Rich_Web_Slider;?> .flex-direction-nav a:hover .preview img {		
								transform:translateY(-100%);
								opacity:1;				
							}
						<?php }?>	
						.flexslider_<?php echo $Rich_Web_Slider;?> .flex-direction-nav {
							height:<?php echo $Rich_Web_Slider_Effect[0]->rich_web_Sl1_ArBoxW;?>px;
							top:<?php echo $Rich_Web_Slider_Effect[0]->rich_web_Sl1_ArPFT;?>%;
						}
						.flexslider_<?php echo $Rich_Web_Slider;?> .flex-direction-nav a, .flexslider_<?php echo $Rich_Web_Slider;?> .flex-direction-nav .arrow { 
							
							height:100% !important;
						}
						.flexslider_<?php echo $Rich_Web_Slider;?> .flex-direction-nav a{
							background-color: <?php echo $Rich_Web_Slider_Effect[0]->rich_web_Sl1_ArBgC;?> ;
							opacity: <?php echo $Rich_Web_Slider_Effect[0]->rich_web_Sl1_ArOp/100;?> ;
						}
						.flexslider_<?php echo $Rich_Web_Slider;?>:hover .flex-prev:hover .arrow, .flexslider_<?php echo $Rich_Web_Slider;?>:hover .flex-next:hover .arrow {
							background-color: <?php echo $Rich_Web_Slider_Effect[0]->rich_web_Sl1_ArHBgC;?> !important;
							opacity: <?php echo $Rich_Web_Slider_Effect[0]->rich_web_Sl1_ArHOp/100;?>;
						}	
						.flexslider_<?php echo $Rich_Web_Slider;?> .flex-control-nav {
							<?php echo $Rich_Web_Slider_Effect[0]->rich_web_Sl1_NavPos;?>: 0%;
							padding:0px !important;
						}
						.flexslider_<?php echo $Rich_Web_Slider;?> .flex-control-nav li{
							margin: 0 <?php echo $Rich_Web_Slider_Effect[0]->rich_web_Sl1_NavPB;?>px; 
							margin-top:<?php if($Rich_Web_Slider_Effect[0]->rich_web_Sl1_NavPos==top){echo 14;}else{echo 4;}?>px;		
						}						
						.flexslider_<?php echo $Rich_Web_Slider;?> .flex-control-paging li a {
							width: <?php echo $Rich_Web_Slider_Effect[0]->rich_web_Sl1_NavW;?>px; 
							height: <?php echo $Rich_Web_Slider_Effect[0]->rich_web_Sl1_NavH;?>px; 
							-webkit-border-radius: <?php echo $Rich_Web_Slider_Effect[0]->rich_web_Sl1_NavBR;?>px; 
							-moz-border-radius: <?php echo $Rich_Web_Slider_Effect[0]->rich_web_Sl1_NavBR;?>px;
							-o-border-radius: <?php echo $Rich_Web_Slider_Effect[0]->rich_web_Sl1_NavBR;?>px; 
							border-radius: <?php echo $Rich_Web_Slider_Effect[0]->rich_web_Sl1_NavBR;?>px; 
							border: <?php echo $Rich_Web_Slider_Effect[0]->rich_web_Sl1_NavBW;?>px <?php echo $Rich_Web_Slider_Effect[0]->rich_web_Sl1_NavBS;?> <?php echo $Rich_Web_Slider_Effect[0]->rich_web_Sl1_NavBC;?>;
						}
						.flexslider_<?php echo $Rich_Web_Slider;?> .flex-control-paging li a:hover { background: <?php echo $Rich_Web_Slider_Effect[0]->rich_web_Sl1_NavHC;?>;}
						.flexslider_<?php echo $Rich_Web_Slider;?> .flex-control-paging li a.flex-active { background: <?php echo $Rich_Web_Slider_Effect[0]->rich_web_Sl1_NavCC;?>;}
						.flexslider_<?php echo $Rich_Web_Slider;?>
						{
							width: <?php echo $Rich_Web_Slider_Effect[0]->rich_web_Sl1_W;?>px;
							margin: 0 auto !important;
							<?php if($Rich_Web_Slider_Effect[0]->rich_web_Sl1_BoxS=='true'){ ?>
								box-shadow: 0px 0px 30px <?php echo $Rich_Web_Slider_Effect[0]->rich_web_Sl1_BoxSC;?> !important;
								-webkit-box-shadow:  0px 0px 30px <?php echo $Rich_Web_Slider_Effect[0]->rich_web_Sl1_BoxSC;?> !important;
								-moz-box-shadow:  0px 0px 30px <?php echo $Rich_Web_Slider_Effect[0]->rich_web_Sl1_BoxSC;?> !important;
								-o-box-shadow:  0px 0px 30px <?php echo $Rich_Web_Slider_Effect[0]->rich_web_Sl1_BoxSC;?> !important;
							<?php }?>
							-webkit-border-radius: <?php echo $Rich_Web_Slider_Effect[0]->rich_web_Sl1_IBR;?>px;
							-moz-border-radius: <?php echo $Rich_Web_Slider_Effect[0]->rich_web_Sl1_IBR;?>px;
							-o-border-radius: <?php echo $Rich_Web_Slider_Effect[0]->rich_web_Sl1_IBR;?>px;
							border-radius: <?php echo $Rich_Web_Slider_Effect[0]->rich_web_Sl1_IBR;?>px;
						}
						.flexslider_<?php echo $Rich_Web_Slider;?> .slides, .flexslider_<?php echo $Rich_Web_Slider;?> .slides li img, .flexslider_<?php echo $Rich_Web_Slider;?> .slides li, .flexslider_<?php echo $Rich_Web_Slider;?> .slides
						{ 
							width:100% !important;
							height:100% !important;
							padding:0px !important;
							margin-left:0px !important;
						}					
						.flexslider_<?php echo $Rich_Web_Slider;?> .slides li img 
						{  
							-webkit-border: <?php echo $Rich_Web_Slider_Effect[0]->rich_web_Sl1_IBW;?>px <?php echo $Rich_Web_Slider_Effect[0]->rich_web_Sl1_IBS;?> <?php echo $Rich_Web_Slider_Effect[0]->rich_web_Sl1_IBC;?>;
							-moz-border: <?php echo $Rich_Web_Slider_Effect[0]->rich_web_Sl1_IBW;?>px <?php echo $Rich_Web_Slider_Effect[0]->rich_web_Sl1_IBS;?> <?php echo $Rich_Web_Slider_Effect[0]->rich_web_Sl1_IBC;?>;
							-o-border: <?php echo $Rich_Web_Slider_Effect[0]->rich_web_Sl1_IBW;?>px <?php echo $Rich_Web_Slider_Effect[0]->rich_web_Sl1_IBS;?> <?php echo $Rich_Web_Slider_Effect[0]->rich_web_Sl1_IBC;?>;
							border: <?php echo $Rich_Web_Slider_Effect[0]->rich_web_Sl1_IBW;?>px <?php echo $Rich_Web_Slider_Effect[0]->rich_web_Sl1_IBS;?> <?php echo $Rich_Web_Slider_Effect[0]->rich_web_Sl1_IBC;?>;
							-webkit-border-radius: <?php echo $Rich_Web_Slider_Effect[0]->rich_web_Sl1_IBR;?>px;
							-moz-border-radius: <?php echo $Rich_Web_Slider_Effect[0]->rich_web_Sl1_IBR;?>px;
							-o-border-radius: <?php echo $Rich_Web_Slider_Effect[0]->rich_web_Sl1_IBR;?>px;
							border-radius: <?php echo $Rich_Web_Slider_Effect[0]->rich_web_Sl1_IBR;?>px;
						}
						.flexslider_<?php echo $Rich_Web_Slider;?> .flex-direction-nav a.flex-next .arrow {
							background: url("<?php echo plugins_url('/Images/icon-'. $Rich_Web_Slider_Effect[0]->rich_web_Sl1_ArType .'-'. $Rich_Web_Slider_Effect[0]->rich_web_Sl1_ArType .'.png',__FILE__)?>") no-repeat center center;
							background-size:70% 70%;
						}
						.flexslider_<?php echo $Rich_Web_Slider;?>:hover .flex-next:hover .arrow 
						{ 
							right:0; 
							background: url("<?php echo plugins_url('/Images/icon-'. $Rich_Web_Slider_Effect[0]->rich_web_Sl1_ArType .'-'. $Rich_Web_Slider_Effect[0]->rich_web_Sl1_ArType .'.png',__FILE__)?>") no-repeat center center;
							background-size:70% 70%;
						}						
						.flexslider_<?php echo $Rich_Web_Slider;?> .flex-direction-nav a.flex-prev .arrow {
							background: url("<?php echo plugins_url('/Images/icon-'. $Rich_Web_Slider_Effect[0]->rich_web_Sl1_ArType .'.png',__FILE__)?>") no-repeat center center;
							background-size:70% 70%;
						}
						.flexslider_<?php echo $Rich_Web_Slider;?>:hover .flex-prev:hover .arrow 
						{ 
							right:0; 
							background: url("<?php echo plugins_url('/Images/icon-'. $Rich_Web_Slider_Effect[0]->rich_web_Sl1_ArType .'.png',__FILE__)?>") no-repeat center center;
							background-size:70% 70%;
							
						}						
					</style>					
						<div id="rich_webSlider1_<?php echo $Rich_Web_Slider;?>">
							<div class="flexslider flexslider_<?php echo $Rich_Web_Slider;?>" style='position:relative;max-width:100%;'>
								<ul class="slides">
									<?php for($i=0;$i<count($Rich_Web_Slider_Images);$i++){ ?> 
										<li>
											<img class='IMHR' src="<?php echo $Rich_Web_Slider_Images[$i]->Sl_Img_Url;?>" alt="<?php echo html_entity_decode($Rich_Web_Slider_Images[$i]->SL_Img_Title);?>" data-thumbnail="<?php echo $Rich_Web_Slider_Images[$i]->Sl_Img_Url;?>"/>	
										</li>	
									<?php } ?>					    
								</ul>
							</div>		
						</div>	
						<input type='text' style='display:none;' class='SLWIDTHR_<?php echo $Rich_Web_Slider;?>'   value='<?php echo $Rich_Web_Slider_Effect[0]->rich_web_Sl1_W;?>'>
						<input type='text' style='display:none;' class='SLHEIGHTR_<?php echo $Rich_Web_Slider;?>'  value='<?php echo $Rich_Web_Slider_Effect[0]->rich_web_Sl1_H;?>'>
						<input type='text' style='display:none;' class='SLCLWR_<?php echo $Rich_Web_Slider;?>'     value='<?php echo $Rich_Web_Slider_Effect[0]->rich_web_Sl1_ArBoxW;?>'>
						<input type='text' style='display:none;' class='SlClPrFS_<?php echo $Rich_Web_Slider;?>'   value='<?php echo $Rich_Web_Slider_Effect[0]->rich_web_Sl1_TFS;?>'>
						<input type='text' style='display:none;' class='hovEffType_<?php echo $Rich_Web_Slider;?>' value='<?php echo $Rich_Web_Slider_Effect[0]->rich_web_Sl1_ArHEff; ?>'>
						<input type='text' style='display:none;' class='navWidth_<?php echo $Rich_Web_Slider;?>'   value='<?php echo $Rich_Web_Slider_Effect[0]->rich_web_Sl1_NavW; ?>'>
						<input type='text' style='display:none;' class='navHeight_<?php echo $Rich_Web_Slider;?>'  value='<?php echo $Rich_Web_Slider_Effect[0]->rich_web_Sl1_NavH; ?>'>
						<input type='text' style='display:none;' class='navType'    value='<?php echo $Rich_Web_Slider_Effect[0]->rich_web_Sl1_NavPos;?>'>
					<script src="<?php echo plugins_url('/Scripts/jquery.flexslider-min.js',__FILE__);?>"></script>
					<script>
						jQuery(document).ready(function(){							
							jQuery('#rich_webSlider1_<?php echo $Rich_Web_Slider;?> .flexslider').flexslider({
								slideshow: <?php echo $Rich_Web_Slider_Effect[0]->rich_web_Sl1_SlS;?>,
								slideshowSpeed: <?php echo $Rich_Web_Slider_Effect[0]->rich_web_Sl1_SlSS*1000;?>,
								pauseOnHover: <?php echo $Rich_Web_Slider_Effect[0]->rich_web_Sl1_PoH;?>,
								start: renderPreview,	//render preview on start
								before: renderPreview //render preview before moving to the next slide
							});
							function renderPreview(slider) {
								var sl = jQuery(slider);
								var prevWrapper = sl.find('.flex-prev');
								var nextWrapper = sl.find('.flex-next');		 
								 
								//calculate the prev and curr slide based on current slide
								var curr = slider.animatingTo;
								var prev = (curr == 0) ? slider.count - 1 : curr - 1;
								var next = (curr == slider.count - 1) ? 0 : curr + 1;		 

								//add prev and next slide details into the directional nav
								prevWrapper.find('.preview, .arrow').remove();
								nextWrapper.find('.preview, .arrow').remove();		 
								prevWrapper.append(grabContent(sl.find('li:eq(' + prev + ') img')));
								nextWrapper.append(grabContent(sl.find('li:eq(' + next + ') img')));	
								resp();
							}
							// grab the data and render in HTML
							function grabContent(img) {		
								var tn = img.data('thumbnail');
								var alt = img.prop('alt');		
								var html = '';
								//you can edit this markup to your own needs, but make sure you style it up accordingly
								html = '<div class="arrow"></div><div class="preview"><img src="' + tn + '" alt="" /><div class="alt">' + alt + '</div></div>';	
								return html;
								resp();
							}							
							var count=0;
							resp();							
							jQuery('.flex-next').click(function(){
								//resp();
							})
							jQuery('.flex-prev').click(function(){
								//resp();
							})							
							function resp(){
								var SLWIDTHR = jQuery('.SLWIDTHR_<?php echo $Rich_Web_Slider;?>').val();
								var SLHEIGHTR = jQuery('.SLHEIGHTR_<?php echo $Rich_Web_Slider;?>').val();
								var SLCLWR = jQuery('.SLCLWR_<?php echo $Rich_Web_Slider;?>').val();
								var SlClPrFS = jQuery('.SlClPrFS_<?php echo $Rich_Web_Slider;?>').val();
								var hovEffType = jQuery('.hovEffType_<?php echo $Rich_Web_Slider;?>').val();
								var navWidth = 	jQuery('.navWidth_<?php echo $Rich_Web_Slider;?>').val();
								var navHeight = jQuery('.navHeight_<?php echo $Rich_Web_Slider;?>').val();	
								var navType = jQuery('.navType_<?php echo $Rich_Web_Slider;?>').val();	
								
								jQuery('.flexslider_<?php echo $Rich_Web_Slider;?>').css('width',SLWIDTHR*jQuery('.flexslider_<?php echo $Rich_Web_Slider;?>').parent().width()/700);
								jQuery('.flexslider_<?php echo $Rich_Web_Slider;?>').css('height',SLHEIGHTR*jQuery('.flexslider_<?php echo $Rich_Web_Slider;?>').parent().width()/700);
								jQuery('.flexslider_<?php echo $Rich_Web_Slider;?> .flex-direction-nav .flex-next').css('height',SLCLWR*jQuery('.flexslider_<?php echo $Rich_Web_Slider;?>').parent().width()/700);
								jQuery('.flexslider_<?php echo $Rich_Web_Slider;?> .flex-direction-nav .flex-prev').css('height',SLCLWR*jQuery('.flexslider_<?php echo $Rich_Web_Slider;?>').parent().width()/700);
								jQuery('.flexslider_<?php echo $Rich_Web_Slider;?> .flex-direction-nav .flex-next').css('width',SLCLWR*jQuery('.flexslider_<?php echo $Rich_Web_Slider;?>').parent().width()/700);
								jQuery('.flexslider_<?php echo $Rich_Web_Slider;?> .flex-direction-nav .flex-prev').css('width',SLCLWR*jQuery('.flexslider_<?php echo $Rich_Web_Slider;?>').parent().width()/700);
								jQuery('.flexslider_<?php echo $Rich_Web_Slider;?> .flex-direction-nav').css('height',SLCLWR*jQuery('.flexslider_<?php echo $Rich_Web_Slider;?>').parent().width()/700);
								
								jQuery('.flexslider_<?php echo $Rich_Web_Slider;?> .flex-direction-nav a .preview').css('width',SLCLWR*jQuery('.flexslider_<?php echo $Rich_Web_Slider;?>').parent().width()/700);
								jQuery('.flexslider_<?php echo $Rich_Web_Slider;?> .flex-direction-nav .arrow').css('width',SLCLWR*jQuery('.flexslider_<?php echo $Rich_Web_Slider;?>').parent().width()/700);
								jQuery('.flexslider_<?php echo $Rich_Web_Slider;?> .flex-direction-nav .flex-next .preview img').css('width',SLCLWR*jQuery('.flexslider_<?php echo $Rich_Web_Slider;?>').parent().width()/700);
								jQuery('.flexslider_<?php echo $Rich_Web_Slider;?> .flex-direction-nav .flex-prev .preview img').css('width',SLCLWR*jQuery('.flexslider_<?php echo $Rich_Web_Slider;?>').parent().width()/700);
								jQuery('.flexslider_<?php echo $Rich_Web_Slider;?> .flex-control-paging li a').css('width',navWidth*jQuery('.flexslider_<?php echo $Rich_Web_Slider;?>').parent().width()/700);
								jQuery('.flexslider_<?php echo $Rich_Web_Slider;?> .flex-control-paging li a').css('height',navHeight*jQuery('.flexslider_<?php echo $Rich_Web_Slider;?>').parent().width()/700);
								if(navType == 'bottom'){
									jQuery('.flexslider_<?php echo $Rich_Web_Slider;?> .flex-control-nav li').css('margin-top',35/jQuery('.flexslider_<?php echo $Rich_Web_Slider;?> .flex-control-paging li a').width());
								}else if(navType == 'top'){
									jQuery('.flexslider_<?php echo $Rich_Web_Slider;?> .flex-control-nav li').css('margin-top','14px');
								}								
								if(hovEffType == 'slide out'){
									jQuery('.flexslider_<?php echo $Rich_Web_Slider;?> .flex-direction-nav .flex-next .preview img').css('right',parseInt(SLCLWR*jQuery('.flexslider_<?php echo $Rich_Web_Slider;?>').parent().width()/700)+'px');
									jQuery('.flexslider_<?php echo $Rich_Web_Slider;?> .flex-direction-nav .flex-prev .preview img').css('left',parseInt(SLCLWR*jQuery('.flexslider_<?php echo $Rich_Web_Slider;?>').parent().width()/700)+'px');
									jQuery('.flexslider_<?php echo $Rich_Web_Slider;?> .flex-direction-nav .flex-next .preview .alt').css('right',parseInt(2*SLCLWR*jQuery('.flexslider_<?php echo $Rich_Web_Slider;?>').parent().width()/700)-1+'px');
									jQuery('.flexslider_<?php echo $Rich_Web_Slider;?> .flex-direction-nav .flex-prev .preview .alt').css('left',parseInt(2*SLCLWR*jQuery('.flexslider_<?php echo $Rich_Web_Slider;?>').parent().width()/700)-2+'px');
								}else if(hovEffType == 'flip out' || hovEffType == 'double flip out'){
									jQuery('.flexslider_<?php echo $Rich_Web_Slider;?> .flex-direction-nav .flex-next .preview').css('right',SLCLWR*jQuery('.flexslider_<?php echo $Rich_Web_Slider;?>').parent().width()/700);
									jQuery('.flexslider_<?php echo $Rich_Web_Slider;?> .flex-direction-nav .flex-prev .preview').css('left',SLCLWR*jQuery('.flexslider_<?php echo $Rich_Web_Slider;?>').parent().width()/700);
									jQuery('.flexslider_<?php echo $Rich_Web_Slider;?> .flex-direction-nav .flex-next .preview .alt').css('right',SLCLWR*jQuery('.flexslider_<?php echo $Rich_Web_Slider;?>').parent().width()/700);
									jQuery('.flexslider_<?php echo $Rich_Web_Slider;?> .flex-direction-nav .flex-prev .preview .alt').css('left',SLCLWR*jQuery('.flexslider_<?php echo $Rich_Web_Slider;?>').parent().width()/700);
								}else if(hovEffType == 'both ways'){
									jQuery('.flexslider_<?php echo $Rich_Web_Slider;?> .flex-direction-nav .flex-next .preview .alt').css('left','-50px');
									jQuery('.flexslider_<?php echo $Rich_Web_Slider;?> .flex-direction-nav .flex-prev .preview .alt').css('left','50px');
								}
								jQuery('.flexslider_<?php echo $Rich_Web_Slider;?> .flex-direction-nav .flex-next .preview .alt').css('width',2*SLCLWR*jQuery('.flexslider_<?php echo $Rich_Web_Slider;?>').parent().width()/700+'px');
								jQuery('.flexslider_<?php echo $Rich_Web_Slider;?> .flex-direction-nav .flex-prev .preview .alt').css('width',2*SLCLWR*jQuery('.flexslider_<?php echo $Rich_Web_Slider;?>').parent().width()/700+'px');
								jQuery('.flexslider_<?php echo $Rich_Web_Slider;?> .flex-direction-nav .flex-next .preview .alt').css('font-size',SlClPrFS*jQuery('.flexslider_<?php echo $Rich_Web_Slider;?>').parent().width()/700+'px');
								jQuery('.flexslider_<?php echo $Rich_Web_Slider;?> .flex-direction-nav .flex-prev .preview .alt').css('font-size',SlClPrFS*jQuery('.flexslider_<?php echo $Rich_Web_Slider;?>').parent().width()/700+'px');
								jQuery('.flexslider_<?php echo $Rich_Web_Slider;?> .flex-direction-nav .flex-next .preview .alt').css('line-height',SLCLWR*jQuery('.flexslider_<?php echo $Rich_Web_Slider;?>').parent().width()/700+'px');
								jQuery('.flexslider_<?php echo $Rich_Web_Slider;?> .flex-direction-nav .flex-prev .preview .alt').css('line-height',SLCLWR*jQuery('.flexslider_<?php echo $Rich_Web_Slider;?>').parent().width()/700+'px');
								if(jQuery('.flexslider_<?php echo $Rich_Web_Slider;?>').width()<=400){
									jQuery('.flex-control-nav').css('display','none');
								}else{
									jQuery('.flex-control-nav').css('display','block');
								}


							}							
							jQuery(window).resize(function(){
								resp();
							})
						})						
					</script>		
 		 		<?php } else if($Rich_Web_Slider_Effects[0]->slider_type=='Content Slider'){ ?>
	 		 		<style>
						.comment_content ul li:before, .entry-content ul li:before
						{
							content: "";
						}
					    .main 
					    {
					      width: 1500px;
						  max-width:100%;
						  margin-left:auto;
						  margin-right:auto;
					      z-index: 2;
					      background: #161923;
					    }    
					    .main h1 
					    {
					      padding:20px 50px;
					      float: left;
					      width: 100%;
					      font-size: 90px;
					      box-sizing: border-box;
					      -webkit-box-sizing: border-box;
					      -moz-box-sizing: border-box;
					      font-weight: 100;
					      color: black;
					      margin: 0;
					      margin-top: 70px;
					      font-family: 'Playfair Display';
					      letter-spacing: -1px;
					    }   
					    .main h1.demo1 
					    {
					      background: #1ABC9C;
					    }
					    .page_container 
					    {
					      max-width: 960px;
					      margin: 50px auto;
					    }
					    .immersive_slider .is-slide .content h2
					    {
					      line-height: 140%;
					      font-weight: 100;
					      color: white;
					      font-weight: 100;
					      text-transform:none !important;
					      letter-spacing: 0px !important;
					    }
					    .immersive_slider .is-slide .content a 
					    {
					      color: white;
					    }
					    .immersive_slider .is-slide .content p
					    {
					      float: left;
					      font-weight: 100;
					      width: 100%;
					      font-size: 17px;
					      margin-top: 5px;
					    }
						.CSHD::-webkit-scrollbar 
						{
							width: 0.5em;
						}
						.CSHD::-webkit-scrollbar-track 
						{
							-webkit-box-shadow: inset 0 0 6px <?php echo $Rich_Web_Slider_Effect[0]->rich_CS_Cont_BgC; ?>;
						}
						.CSHD::-webkit-scrollbar-thumb {
							background-color: <?php echo $Rich_Web_Slider_Effect[0]->rich_CS_Video_DC; ?>;
							outline: <?php echo $Rich_Web_Slider_Effect[0]->rich_CS_Video_DC; ?>;
						}
						.is-container .is-background img{
						  	width: 100%;
						  	height: 100%;
						  	left: 0;
						  	position: absolute;						  
						}
						.is-pagination {
						 	position: absolute;
						  	left: 0;
						 	width: 100%;
						  	bottom: 20px;
						  	z-index: 5;
						  	list-style: none;
						  	margin: 0 !important;
						  	padding: 0;
						  	text-align: center;
						}
						#immersive_slider_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>.immersive_slider .is-slide .image  
						{
						  	float: right;
						  	position:relative;
						 	width: <?php echo $rich_CS_Video_Show ?>%;
						  	height:95%;
						  	padding-left: <?php echo $padLeft; ?>px;
						  	box-sizing: border-box;
						 	-moz-box-sizing: border-box;
						 	-webkit-box-sizing: border-box;
						  	vertical-align: middle;
						}
						#immersive_slider_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>.immersive_slider .is-slide .content 
						{
						  	position:relative;
						 	float: left;
						  	width: <?php echo 100-$rich_CS_Video_Show ?>%;
						  	height:90%;
						  	padding-right: 10px;
						  	box-sizing: border-box;
						 	-moz-box-sizing: border-box;
							-webkit-box-sizing: border-box;
						  	color: white;
						  	text-align: left;
						  	line-height: 160%;
						 	vertical-align: middle;
						  	overflow-x:hidden;
						  	display: block;
						}
						.is-pagination
						{
							bottom:0px !important;
						}
						.linkDCS
						{
							position:relative;
							float:left;
							width: <?php echo 100-$rich_CS_Video_Show ?>%;
							margin-top:10px;
							text-align:<?php echo $Rich_Web_Slider_Effect[0]->rich_CS_LPos; ?>;
							z-index:999;
						}
						.CSLink
						{
							padding:3px 5px;
							border:<?php echo $Rich_Web_Slider_Effect[0]->rich_CS_Link_BW; ?>px <?php echo $Rich_Web_Slider_Effect[0]->rich_CS_Link_BS; ?> <?php echo $Rich_Web_Slider_Effect[0]->rich_CS_LBC; ?> !important;
							border-radius:<?php echo $Rich_Web_Slider_Effect[0]->rich_CS_LBR; ?>px !important;
							font-size:12px;
							background:<?php echo $Rich_Web_Slider_Effect[0]->rich_CS_LBgC; ?> !important;
							color:<?php echo $Rich_Web_Slider_Effect[0]->rich_CS_LC; ?> !important;
							outline:none !important;
							transition: all 0.3s linear !important;
							text-decoration:none !important;
							box-shadow:none !important;
						}
						.CSLink:hover
						{
							background: <?php echo $Rich_Web_Slider_Effect[0]->rich_CS_LHBgC; ?> !important;
							color:<?php echo $Rich_Web_Slider_Effect[0]->rich_CS_LHC; ?> !important;
						}
						.entry-content a, .entry-summary a, .page-content a, .comment-content a, .pingback .comment-body > a
						{
							border-bottom:none;
						}
						.CSIcon
						{
						  font-size: <?php echo $Rich_Web_Slider_Effect[0]->rich_CS_AFS; ?>px;
						  position: absolute;
						  top:50%;
						  transform:translateY(-50%);
						  opacity:1;
						  cursor:pointer;
						  color: <?php echo $Rich_Web_Slider_Effect[0]->rich_CS_AC; ?>;
						  display: <?php echo $rich_CS_Video_ArrShow; ?>;
						  line-height: 100%;
						  z-index:99999;
						}
						.CSIcon:hover
						{
							opacity:0.7;
						}
					</style>
 		 			<div class="main main_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>">
				      	<div class="page_container">
							<div id="immersive_slider_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>" style='background:<?php echo $Rich_Web_Slider_Effect[0]->rich_CS_Cont_BgC; ?>;box-shadow:0px 0px 30px <?php echo $Rich_Web_Slider_Effect[0]->rich_CS_Cont_BSC; ?>;opacity:<?php echo $Rich_Web_Slider_Effect[0]->rich_CS_Cont_Op/100; ?>;border-top:<?php echo $Rich_Web_Slider_Effect[0]->rich_CS_Cont_BW; ?>px <?php echo $Rich_Web_Slider_Effect[0]->rich_CS_Cont_BS; ?> <?php echo $Rich_Web_Slider_Effect[0]->rich_CS_Cont_BC; ?>;border-bottom:<?php echo $Rich_Web_Slider_Effect[0]->rich_CS_Cont_BW; ?>px <?php echo $Rich_Web_Slider_Effect[0]->rich_CS_Cont_BS; ?> <?php echo $Rich_Web_Slider_Effect[0]->rich_CS_Cont_BC; ?>;border-radius:<?php echo $Rich_Web_Slider_Effect[0]->rich_CS_Cont_BR; ?>px;'>
									<?php for($i=0;$i<count($Rich_Web_Slider_Images);$i++){ ?>
										<div class="slide slide_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>" data-blurred="<?php echo $Rich_Web_Slider_Images[$i]->Sl_Img_Url;?>">											
											<div class="image ImCS">
												<img class='imFiltBl' src="<?php echo $Rich_Web_Slider_Images[$i]->Sl_Img_Url;?>" alt="Slider <?php echo $i+1;?>"/>
											</div>
											<div class="content CSHD">
												<h2 class='CSHeader' style='margin:0px;display:<?php echo $rich_CS_Video_TShow; ?>;color:<?php echo $Rich_Web_Slider_Effect[0]->rich_CS_Video_TC; ?>;text-shadow:1px 1px 1px <?php echo $Rich_Web_Slider_Effect[0]->rich_CS_Video_TSC; ?>;font-size:<?php echo $Rich_Web_Slider_Effect[0]->rich_CS_Video_TFS; ?>;font-family:<?php echo $Rich_Web_Slider_Effect[0]->rich_CS_Video_TFF; ?>;text-align:<?php echo $Rich_Web_Slider_Effect[0]->rich_CS_Video_TTA; ?>;'><?php echo html_entity_decode($Rich_Web_Slider_Images[$i]->SL_Img_Title);?></h2>
												<p class='CSDesc' style='display:<?php echo $rich_CS_Video_DShow; ?>;color:<?php echo $Rich_Web_Slider_Effect[0]->rich_CS_Video_DC; ?>;text-shadow:1px 1px 1px <?php echo $Rich_Web_Slider_Effect[0]->rich_CS_Video_DSC; ?>;font-family:<?php echo $Rich_Web_Slider_Effect[0]->rich_CS_Video_DFF; ?>;text-align:<?php echo $Rich_Web_Slider_Effect[0]->rich_CS_Video_DTA; ?>;' ><?php echo html_entity_decode($Rich_Web_Slider_Images[$i]->Sl_Img_Description);?></p>
											</div>
											<?php if($Rich_Web_Slider_Images[$i]->Sl_Link_Url !== '' && $Rich_Web_Slider_Images[$i]->Sl_Link_Url !== null){ ?>
											<div class='linkDCS'>
												<a href='<?php echo $Rich_Web_Slider_Images[$i]->Sl_Link_Url;?>' target='<?php echo $Rich_Web_Slider_Images[$i]->Sl_Link_NewTab;?>' class='CSLink CSLink_<?php echo $i; ?>' style='font-family:<?php echo $Rich_Web_Slider_Effect[0]->rich_CS_LFF; ?>;'><?php echo $Rich_Web_Slider_Effect[0]->rich_CS_LT; ?></a>
											</div>
											<?php } ?>
										</div>
									<?php } ?>
							  <i class='is-prev CSIcon <?php echo $Rich_PS_Left_Icon; ?>'></i>
							  <i class='is-next CSIcon <?php echo $Rich_PS_Right_Icon; ?>'></i>
							</div>
						</div>
				  	</div>
					<input type='text' style='display:none;' class='SDuration' value='<?php echo $Rich_Web_Slider_Effect[0]->rich_CS_SD; ?>'>
					<input type='text' style='display:none;' class='SShowCS' value='<?php echo $Rich_Web_Slider_Effect[0]->rich_CS_Video_H; ?>'>
					<input type='text' style='display:none;' class='AnimationType_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>' value='<?php echo $Rich_Web_Slider_Effect[0]->rich_CS_AT; ?>'>
					<input type='text' style='display:none;' class='ContWidth' value='<?php echo $Rich_Web_Slider_Effect[0]->rich_CS_Cont_W; ?>'>
					<input type='text' style='display:none;' class='ContHeight' value='<?php echo $Rich_Web_Slider_Effect[0]->rich_CS_Cont_H; ?>'>
					<input type='text' style='display:none;' class='ContHeader' value='<?php echo $Rich_Web_Slider_Effect[0]->rich_CS_Video_TFS; ?>'>
					<input type='text' style='display:none;' class='ContDesc' value='<?php echo $Rich_Web_Slider_Effect[0]->rich_CS_Video_DFS; ?>'>
					<input type='text' style='display:none;' class='ContLinkCS' value='<?php echo $Rich_Web_Slider_Effect[0]->rich_CS_LFS; ?>'>
					<input type='text' style='display:none;' class='ContIconsCS' value='<?php echo $Rich_Web_Slider_Effect[0]->rich_CS_AFS; ?>'>
					<script src="<?php echo plugins_url('/Scripts/ContSl.js',__FILE__) ?>"></script>
					
				  	<script type="text/javascript">
				  	    jQuery(document).ready( function() {
							var SShowCS = jQuery('.SShowCS').val();
							var SDuration;
							if(SShowCS == 'on'){ SDuration = parseInt(jQuery('.SDuration').val()); }else{ SDuration = false; }
							var AnimationType = jQuery('.AnimationType_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>').val();
					  	    jQuery("#immersive_slider_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>").immersive_slider({
					  	      	animation: AnimationType,
						        slideSelector: ".slide_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>",
						        container: ".main_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>",
						        cssBlur: <?php echo $rich_CS_BIB; ?>,
						        pagination: <?php echo $rich_CS_P; ?>,
						        loop: <?php echo $rich_CS_Loop; ?>,
						        autoStart: SDuration*1000,
					  	    });
				  	 	});
				    </script>
					<script>
						jQuery(document).ready(function(){
							function resp(){
								var ContWidth = parseInt(jQuery('.ContWidth').val());
								var ContHeight = parseInt(jQuery('.ContHeight').val());
								var ContHeader = parseInt(jQuery('.ContHeader').val());
								var ContDesc = parseInt(jQuery('.ContDesc').val());
								var ContLinkCS = parseInt(jQuery('.ContLinkCS').val());
								var ContIconsCS = parseInt(jQuery('.ContIconsCS').val());
								
								jQuery('.main_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>').css('width',ContWidth*jQuery('.main_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>').parent().width()/1000+'px');
								jQuery('#immersive_slider_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>').css('height',ContHeight*jQuery('.main_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>').width()/(jQuery('.main_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>').width()+250)+'px');
								if(jQuery('.main').parent().width()<=400){
									jQuery('.CSLink').css('display','none');
									jQuery('.CSHD').css({'width':'100%',height:'30%'});
									jQuery('.ImCS').css({'width':'100%','padding-left':'0px','height':'50%','margin-bottom':'10px'});
									jQuery('.immersive_slider .is-slide').css('padding','5px');
									jQuery('.linkDCS').css({'width':'100%','text-align':'right','margin-top':'5px'});
									jQuery('.CSIcon').css('top','92%');
									jQuery('.is-next').css({'left':'40px','right':'auto'});
									jQuery('.is-pagination').css('display','none');
									jQuery('.page_container').css('margin','20px auto');
									jQuery('.main').css('min-width','100%')
								}else if(jQuery('.main').parent().width()<=600){
									jQuery('.CSLink').css('display','inline');
									jQuery('.CSHD').css({'width':'64%',height:'85%'});
									jQuery('.ImCS').css({'width':'36%','padding-left':'10px','height':'95%','margin-bottom':'0px'});
									jQuery('.immersive_slider .is-slide').css('padding','30px 40px');
									jQuery('.linkDCS').css({'width':'64%','text-align':'left','margin-top':'10px'});
									jQuery('.CSIcon').css('top','50%');
									jQuery('.is-next').css({'left':'auto','right':'10px'});
									jQuery('.is-pagination').css('display','block');
									jQuery('.page_container').css('margin','50px auto')
									jQuery('.main').css('min-width','100%')
								}else{
									jQuery('.CSLink').css('display','inline');
									jQuery('.CSHD').css({'width':'64%',height:'85%'});
									jQuery('.ImCS').css({'width':'36%','padding-left':'10px','height':'95%','margin-bottom':'0px'});
									jQuery('.immersive_slider .is-slide').css('padding','30px 40px');
									jQuery('.linkDCS').css({'width':'64%','text-align':'left','margin-top':'10px'});
									jQuery('.CSIcon').css('top','50%');
									jQuery('.is-next').css({'left':'auto','right':'10px'});
									jQuery('.is-pagination').css('display','block');
									jQuery('.page_container').css('margin','50px auto')
									jQuery('.main').css('min-width','0px')
								}

								
								// if(jQuery('.main').width()<=300){
									
									
								// }else{
									
									
								// }
								if(jQuery('.main').width()<=500){
									jQuery('.is-pagination').css('display','none');
								}else{
									jQuery('.is-pagination').css('display','block');
								}
								// if(jQuery('.main').parent().width()<=400){
									
								// }else{
									
								// }
								
								
								jQuery('.CSHeader').css('font-size',ContHeader*jQuery('.main_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>').width()/(jQuery('.main_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>').width()+100)+'px');
								jQuery('.CSDesc').css('font-size',ContDesc*jQuery('.main_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>').width()/(jQuery('.main_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>').width()+100)+'px');
								jQuery('.CSDesc').css('line-height',jQuery('.CSDesc').css('font-size'));
								jQuery('.CSLink').css('font-size',ContLinkCS*jQuery('.main_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>').width()/(jQuery('.main_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>').width()+100)+'px');
								jQuery('.CSIcon').css('font-size',ContIconsCS*jQuery('.main_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>').width()/(jQuery('.main_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>').width()+100)+'px');
							}
							// jQuery(window).load(function(){
							// 	resp();
							// })
							setTimeout(function(){
								resp();
							},100)
							
							jQuery(window).resize(function(){
								resp();
							})
						})
					</script>
				<?php } else if($Rich_Web_Slider_Effects[0]->slider_type=='Fashion Slider'){ ?>	
					<link rel="stylesheet" type="text/css" href="<?php echo plugins_url('/Style/fashion.css',__FILE__);?>" media="all" />
					<script type="text/javascript" src="<?php echo plugins_url('/Scripts/fashion.js',__FILE__);?>"></script>
					<script type="text/javascript" charset="utf-8">
						var $ = jQuery.noConflict();
						jQuery(window).load(function() {
							var animType=jQuery('.animTypeR').val();
							var SSHOWFSH = jQuery('.SSHOWFSH_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>').val();
							var SSHOWSpeed = jQuery('.SSHOWSpeed_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>').val();
							var SSHOWAnimDur = jQuery('.SSHOWAnimDur_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>').val();
							var ICSHOW = jQuery('.ICSHOW_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>').val();
							var PPLSHOW = jQuery('.PPLSHOW_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>').val();
							var RANDOMIZE = jQuery('.RANDOMIZE_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>').val();
							var LFSL = jQuery('.LFSL_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>').val();
						jQuery('.flexslider_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>').flexslider({
							animation:animType,
							slideshow:SSHOWFSH,
							slideshowSpeed:SSHOWSpeed*1000,
							animationDuration:SSHOWAnimDur*100,
							directionNav:ICSHOW,
							controlNav:true,
							keyboardNav:true,
							touchSwipe:true,
							prevText:"Previous",
							nextText:"Next",
							pausePlay:PPLSHOW,
							pauseText:"Pause",
							playText:"Play",
							randomize:RANDOMIZE,
							slideToStart:0,
							animationLoop:LFSL,
							pauseOnAction:true,
							pauseOnHover:true,
							controlsContainer:"",
							manualControls:""
						});
					  });
					</script>
					<style>
						.flexslider_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> .slides img {
							max-width: 100%;
							width:900px;
							height:400px;
							display: block;
						}
						.pausePlay{
							opacity:0;
							cursor:pointer;
							transition:all linear 0.4s;
						}
						.slider_container_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>:hover .pausePlay{
							opacity:1;
						}
						.flex-pauseplay{
							position:absolute;
							top:50%;
							left:50%;
							transform:translateY(-50%) translateX(-50%);
							-webkit-transform:translateY(-50%) translateX(-50%);
							-ms-transform:translateY(-50%) translateX(-50%);
							text-align:center;
							color:#fff;
							height:50px;
							width:50px;
							z-index:1;
						}
						.flex-caption {
							position: absolute;
							right: 58px;
							bottom: 20px;
							display:none;
						}
						.fl_cap_Animate{
							display:block;
						}
						.flexslider_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> .flex-direction-nav li a {width:<?php echo $Rich_Web_Slider_Effect[0]->rich_fsl_Icon_Size; ?>px; height:<?php echo $Rich_Web_Slider_Effect[0]->rich_fsl_Icon_Size; ?>px; margin:0; display: block; position: absolute; right:11px; cursor: pointer; text-indent: -9999px; text-decoration:none !important;
						}						
						.flexslider_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> .flex-direction-nav li a.next {
							background: url(<?php echo plugins_url('/Images/'. $Rich_Web_Slider_Effect[0]->rich_fsl_Icon_Type .'-'. $Rich_Web_Slider_Effect[0]->rich_fsl_Icon_Type .'.png',__FILE__);?>) no-repeat center;
							bottom: <?php echo $Rich_Web_Slider_Effect[0]->rich_fsl_Icon_Size+24+5; ?>px;
							background-size:100% 100%;
						}
						.flexslider_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> .flex-direction-nav li a.prev {
							background: url(<?php echo plugins_url('/Images/'. $Rich_Web_Slider_Effect[0]->rich_fsl_Icon_Type .'.png',__FILE__);?>) no-repeat center;
							bottom: 24px;
							background-size:100% 100%;
						}
						.flexslider_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> .flex-direction-nav li a.next:hover {
							background: url(<?php echo plugins_url('/Images/'. $Rich_Web_Slider_Effect[0]->rich_fsl_Hover_Icon_Type .'-'. $Rich_Web_Slider_Effect[0]->rich_fsl_Hover_Icon_Type .'.png',__FILE__);?>) no-repeat center;
							background-size:100% 100%;
						}
						.flexslider_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> .flex-direction-nav li a.prev:hover {
							background: url(<?php echo plugins_url('/Images/'. $Rich_Web_Slider_Effect[0]->rich_fsl_Hover_Icon_Type .'.png',__FILE__);?>) no-repeat center;
							background-size:100% 100%;
						}
						.flex-direction-nav a {
							overflow: visible;
							margin: 0;
							opacity: 1;
							top: none;
						}
						.caption_title_line {
							width: 450px;
							padding: 0px 15px 0px 15px;
							color: #303030;
						}
						.animate{
							right:2px !important;
							top:50%;
							transform:translateY(-50%);
							-webkit-transform:translateY(-50%);
							-ms-transform:translateY(-50%);
						}
						.animate2{
							left:2px !important;
							top:50%;
							transform:translateY(-50%);
							-webkit-transform:translateY(-50%);
							-ms-transform:translateY(-50%);
						}
						.flex-caption_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>::-webkit-scrollbar {
							width: 0.5em;
						}
						.flex-caption_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>::-webkit-scrollbar-track {
							-webkit-box-shadow: inset 0 0 6px <?php echo $Rich_Web_Slider_Effect[0]->rich_fsl_Desc_Bg_Color; ?>;
						}
						.flex-caption_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>::-webkit-scrollbar-thumb {
							background-color: <?php echo $Rich_Web_Slider_Effect[0]->rich_fsl_Desc_Color; ?>;
							outline: <?php echo $Rich_Web_Slider_Effect[0]->rich_fsl_Desc_Color; ?>;
						}
						.FSLLink_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> {
							position: absolute;
							top: 10px;
							right: 10px;
							text-decoration: none !important;
							border: <?php echo $Rich_Web_Slider_Effect[0]->rich_fsl_Link_Border_Width; ?>px <?php echo $Rich_Web_Slider_Effect[0]->rich_fsl_Link_Border_Style; ?> <?php echo $Rich_Web_Slider_Effect[0]->rich_fsl_Link_Border_Color; ?>;
							border-radius: <?php echo $Rich_Web_Slider_Effect[0]->rich_fsl_Title_Text_Shadow; ?>px;
							padding: 5px 10px;
							background: <?php echo $Rich_Web_Slider_Effect[0]->rich_fsl_Link_Bg_Color; ?>;
							opacity: <?php echo $Rich_Web_Slider_Effect[0]->rich_fsl_Link_Transparency/100; ?>;
							font-size: <?php echo $Rich_Web_Slider_Effect[0]->rich_fsl_Link_Font_Size; ?>px;
							line-height: 1 !important;
							color: <?php echo $Rich_Web_Slider_Effect[0]->rich_fsl_Link_Color; ?> !important;
							outline:none !important;
							box-shadow:none !important;
							border:none !important;
							font-family: <?php echo $Rich_Web_Slider_Effect[0]->rich_fsl_Link_Font_Family; ?>;
							transition:all linear 0.3s;
						}
						.FSLLink_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>:hover{
							border-color: <?php echo $Rich_Web_Slider_Effect[0]->rich_fsl_Link_Hover_Border_Color; ?>;
							background: <?php echo $Rich_Web_Slider_Effect[0]->rich_fsl_Link_Hover_Bg_Color; ?>;
							color: <?php echo $Rich_Web_Slider_Effect[0]->rich_fsl_Link_Hover_Color; ?> !important;
							opacity: <?php echo $Rich_Web_Slider_Effect[0]->rich_fsl_Link_Hover_Transparency/100; ?>;
						}
						.flex-direction-nav{
							list-style:none !important;
							padding:0px !important;
							margin:0px !important;
						}
					</style>
				</head>
				<body>
					<div class="slider_container slider_container_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>" style='position:relative;padding:0px;max-width:100%;border:<?php echo $Rich_Web_Slider_Effect[0]->rich_fsl_Border_Width; ?>px <?php echo $Rich_Web_Slider_Effect[0]->rich_fsl_Border_Style; ?> <?php echo $Rich_Web_Slider_Effect[0]->rich_fsl_Border_Color;?>;background:<?php if($Rich_Web_Slider_Effect[0]->rich_fsl_Border_Style=='none' || $Rich_Web_Slider_Effect[0]->rich_fsl_Border_Width == '0' ){ echo none; }else{ echo $Rich_Web_Slider_Effect[0]->rich_fsl_Border_Color; } ?>;box-shadow:0px 0px <?php echo $Rich_Web_Slider_Effect[0]->rich_fsl_Box_Shadow; ?>px <?php echo $Rich_Web_Slider_Effect[0]->rich_fsl_Shadow_Color; ?>;'>
						<div class="flexslider flexslider_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>">
						 	<ul class="slides" style='list-style:none;margin:0px;padding:0px;'>
								<?php for($i=0;$i<count($Rich_Web_Slider_Images);$i++){ ?>
									<li>
										<a href="#" class='clfl' style='position:relative;'>
										<?php if($Rich_Web_Slider_Images[$i]->Sl_Link_Url !== '' && $Rich_Web_Slider_Images[$i]->Sl_Link_Url !== null){ ?>
											<a href='<?php echo $Rich_Web_Slider_Images[$i]->Sl_Link_Url; ?>' target='<?php echo $Rich_Web_Slider_Images[$i]->Sl_Link_NewTab;?>' class='FSLLink FSLLink_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>'>
												<?php echo $Rich_Web_Slider_Effect[0]->rich_fsl_Link_Text; ?>
											</a>
										<?php } ?>
											<img style='margin:0px;' src="<?php echo $Rich_Web_Slider_Images[$i]->Sl_Img_Url;?>" alt="" title=""/>
										</a>
										<div class="flex-caption flex-caption_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>" style='overflow-x:hidden;background:<?php echo $Rich_Web_Slider_Effect[0]->rich_fsl_Desc_Bg_Color; ?>;opacity:<?php echo $Rich_Web_Slider_Effect[0]->rich_fsl_Desc_Transparency/100; ?>;height:<?php echo 2*$Rich_Web_Slider_Effect[0]->rich_fsl_Icon_Size+5; ?>px;'>
											 <div class="caption_title_line">
												<h2 style='padding:0px;font-size:<?php echo $Rich_Web_Slider_Effect[0]->rich_fsl_Title_Font_Size; ?>px;color:<?php echo $Rich_Web_Slider_Effect[0]->rich_fsl_Title_Color; ?>;font-family:<?php echo $Rich_Web_Slider_Effect[0]->rich_fsl_Title_Font_Family; ?>;text-align:<?php echo $Rich_Web_Slider_Effect[0]->rich_fsl_Title_Text_Align; ?>;'><?php echo html_entity_decode($Rich_Web_Slider_Images[$i]->SL_Img_Title);?></h2>
												<p style='padding:0px;margin:0px;font-size:<?php echo $Rich_Web_Slider_Effect[0]->rich_fsl_Desc_Size; ?>px;line-height:<?php echo $Rich_Web_Slider_Effect[0]->rich_fsl_Desc_Size; ?>px;color:<?php echo $Rich_Web_Slider_Effect[0]->rich_fsl_Desc_Color; ?>;font-family:<?php echo $Rich_Web_Slider_Effect[0]->rich_fsl_Desc_Font_Family; ?>;text-align:<?php echo $Rich_Web_Slider_Effect[0]->rich_fsl_Desc_Text_Align; ?>;'><?php echo html_entity_decode($Rich_Web_Slider_Images[$i]->Sl_Img_Description);?></p>
											</div>
										</div>
									</li>
								<?php } ?>
							</ul>
					  	</div>
					 </div>
					 <input type='text' style='display:none;' class='animTypeR_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>' value='<?php echo $Rich_Web_Slider_Effect[0]->rich_fsl_animation; ?>'>
					 <input type='text' style='display:none;' class='SSHOWFSH_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>' value='<?php echo $rich_fsl_SShow; ?>'>
					 <input type='text' style='display:none;' class='SSHOWSpeed_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>' value='<?php echo $Rich_Web_Slider_Effect[0]->rich_fsl_SShow_Speed; ?>'>
					 <input type='text' style='display:none;' class='SSHOWAnimDur_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>' value='<?php echo $Rich_Web_Slider_Effect[0]->rich_fsl_Anim_Dur; ?>'>
					 <input type='text' style='display:none;' class='ICSHOW_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>' value='<?php echo $rich_fsl_Ic_Show; ?>'>
					 <input type='text' style='display:none;' class='PPLSHOW_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>' value='<?php echo $rich_fsl_PPL_Show; ?>'>
					 <input type='text' style='display:none;' class='RANDOMIZE_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>' value='<?php echo $rich_fsl_Randomize; ?>'>
					 <input type='text' style='display:none;' class='LFSL_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>' value='<?php echo $rich_fsl_Loop; ?>'>
					 <input type='text' style='display:none;' class='FSLWidth_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>' value='<?php echo $Rich_Web_Slider_Effect[0]->rich_fsl_Width; ?>'>
					 <input type='text' style='display:none;' class='FSLHeight_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>' value='<?php echo $Rich_Web_Slider_Effect[0]->rich_fsl_Height; ?>'>
					 <input type='text' style='display:none;' class='FSLDescShow_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>' value='<?php echo $rich_fsl_Desc_Show; ?>'>
					 <input type='text' style='display:none;' class='FSLLinkFS_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>' value='<?php echo $Rich_Web_Slider_Effect[0]->rich_fsl_Link_Font_Size; ?>'>
					 <input type='text' style='display:none;' class='IcOnSize_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>' value='<?php echo $Rich_Web_Slider_Effect[0]->rich_fsl_Icon_Size; ?>'>
					 <script>
						jQuery(document).ready(function(){
							var x=jQuery('.animTypeR_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>').val();
							var dirNav='true';
							var FSLDescShow_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> = jQuery('.FSLDescShow_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>').val();
							var FSLWidth_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> = jQuery('.FSLWidth_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>').val();
							var FSLHeight_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> = jQuery('.FSLHeight_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>').val();
							var FSLLinkFS_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> = jQuery('.FSLLinkFS_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>').val();
							var IcOnSize_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> = jQuery('.IcOnSize_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>').val();							
							function resp()
							{
								jQuery('.FSLLink_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>').css('font-size',FSLLinkFS_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>*jQuery('.slider_container_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>').parent().width()/(jQuery('.slider_container_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>').parent().width()+200)+'px');
								jQuery('.FSLLink_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>').css('line-height',jQuery('.FSLLink_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>').css('font-size'));
								jQuery('.slider_container_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>').css('width',FSLWidth_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>*jQuery('.slider_container_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>').parent().width()/1000+'px');
								jQuery('.flexslider_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> .slides').css('height',FSLHeight_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>*jQuery('.slider_container_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>').parent().width()/1000+'px');
								jQuery('.clfl').css('width',FSLWidth_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>*jQuery('.slider_container_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>').parent().width()/1000+'px');
								jQuery('.flexslider_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> .slides img').css('width','100%');
								jQuery('.flexslider_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> .slides img').css('height',FSLHeight_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>*jQuery('.slider_container_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>').parent().width()/1000+'px');
								jQuery('.clfl').css('height',FSLHeight_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>*jQuery('.slider_container_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>').parent().width()/1000+'px');
								if(x=='slide')
								{
									jQuery('.slides').css('margin-left',-FSLWidth_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>*jQuery('.slider_container_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>').parent().width()/1000+'px');
									jQuery('.slides').css('width','20000px');
								}
								if(jQuery('.flexslider_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> .slides img').width()>jQuery('.flexslider_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> .flex-direction-nav li a').width()+450+31)
								{
									if(FSLDescShow_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>=='true'){ jQuery('.flex-caption_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>').addClass('fl_cap_Animate'); }
									jQuery('.flexslider_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> .flex-direction-nav li a.next').removeClass('animate');
									jQuery('.flexslider_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> .flex-direction-nav li a.prev').removeClass('animate2');
									jQuery('.flexslider_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> .flex-direction-nav').css('top','100%');
								}
								else
								{
									jQuery('.flex-caption_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>').removeClass('fl_cap_Animate');
									jQuery('.flexslider_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> .flex-direction-nav li a.next').addClass('animate');
									jQuery('.flexslider_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> .flex-direction-nav li a.prev').addClass('animate2');
									jQuery('.flexslider_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> .flex-direction-nav li a.next').css('width',IcOnSize_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>*jQuery('.slider_container_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>').parent().width()/(jQuery('.slider_container_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>').parent().width()+150));
									jQuery('.flexslider_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> .flex-direction-nav li a.next').css('height',IcOnSize_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>*jQuery('.slider_container_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>').parent().width()/(jQuery('.slider_container_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>').parent().width()+150));
									jQuery('.flexslider_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> .flex-direction-nav li a.prev').css('width',IcOnSize_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>*jQuery('.slider_container_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>').parent().width()/(jQuery('.slider_container_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>').parent().width()+150));
									jQuery('.flexslider_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> .flex-direction-nav li a.prev').css('height',IcOnSize_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>*jQuery('.slider_container_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>').parent().width()/(jQuery('.slider_container_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>').parent().width()+150));
									jQuery('.flexslider_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> .flex-direction-nav').css('top','50%');
								}
								if(jQuery('.slider_container_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>').width()<=300){
									jQuery('.FSLLink').css('display','none');
								}else{
									jQuery('.FSLLink').css('display','block');
								}
							}
							jQuery(window).load(function(){	
								resp();	
							})
							// setTimeout(function(){
							// 	resp();	
							// },100)
							jQuery(window).resize(function(){ resp(); })
						})
					</script>
			<?php }else if($Rich_Web_Slider_Effects[0]->slider_type=='Circle Thumbnails'){ ?>
		        <style>
		        	.cn-slideshow_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>
					{
						
    					border: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_CT_BW;?>px <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_CT_BS;?> <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_CT_BC;?> !important;
    					<?php if($Rich_Web_Slider_Effect[0]->Rich_Web_Sl_CT_BxSShow=='true'){ ?>
    						<?php if($Rich_Web_Slider_Effect[0]->Rich_Web_Sl_CT_BxSType=='true'){ ?> 
    							-webkit-box-shadow: 0px 0px 100px <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_CT_BxS;?>px <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_CT_BxC;?>;
                                -moz-box-shadow: 0px 0px 100px <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_CT_BxS;?>px <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_CT_BxC;?>;
    							box-shadow: 0px 0px 100px <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_CT_BxS;?>px <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_CT_BxC;?>;
    						<?php }else{ ?>
    							-webkit-box-shadow: 0 <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_CT_BxS;?>px 50px -10px <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_CT_BxC;?>;
    							-moz-box-shadow: 0 <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_CT_BxS;?>px 50px -10px <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_CT_BxC;?>;
    							box-shadow: 0 <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_CT_BxS;?>px 50px -10px <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_CT_BxC;?>;
    						<?php }?>
    					<?php }?>
					}
					.cn-slideshow_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> .cn-bar
					{
						background: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_CT_TDABgC;?>;
    					<?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_CT_TDAPos;?>: 0px;
					}
					.cn-loading
					{
						background-color: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_CT_LBgC;?>;
					}
					.cn-slideshow_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> .cn-bar .cn-nav-content .cn-nav-content-current h2
					{
						margin-top: 10px;
					    font-size: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_CT_TFS;?>px !important;
					    font-family: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_CT_TFF;?> !important;
					    color: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_CT_TCC;?> !important;
						opacity:1 !important;
						letter-spacing:0px !important;
					    text-transform:none !important;
					}
					.cn-slideshow_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> .cn-bar .cn-nav-content h3
					{
						font-size: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_CT_TFS-5;?>px !important;
					    font-family: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_CT_TFF;?> !important;
					    color: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_CT_TC;?> !important;
					    margin:0px !important;
					    letter-spacing:0px !important;
					    text-transform:none !important;
					}
					.cn-nav_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> a.cn-nav-prev span
					{
					    background: url(<?php echo plugins_url('/Images/prev_'. $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_CT_ArType .'.png',__FILE__);?>) no-repeat center center;
					}
					.cn-nav_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> a.cn-nav-next:hover, .cn-nav_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> a.cn-nav-next:focus{
						color:none !important;
						transition:all 0s !important;
					}
					.cn-nav_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> a.cn-nav-next span
					{
					    background: url(<?php echo plugins_url('/Images/next_'. $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_CT_ArType .'.png',__FILE__);?>) no-repeat center center;
					}
					.cn-slideshow_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> .cn-bar .cn-nav-content div span
					{
						font-size: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_CT_ArTextFS;?>px;
					    font-family: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_CT_ArTextFF;?>;
					    color: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_CT_ArTextC;?>;
					}
					.cn-slideshow_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> .cn-bar .cn-nav a.cn-nav-prev span, .cn-slideshow_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> .cn-bar .cn-nav a.cn-nav-next span
					{
						background-color: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_CT_ArBgC;?>;
						-moz-border-radius: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_CT_ArBR;?>px;
                        -webkit-border-radius: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_CT_ArBR;?>px;
    					border-radius: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_CT_ArBR;?>px;
					}
					.cn-slideshow_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> .cn-bar .cn-nav a:hover span, .cn-slideshow_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> .cn-bar .cn-nav a:hover div
					{
						-moz-border-radius: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_CT_ArHBR;?>px;
                        -webkit-border-radius: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_CT_ArHBR;?>px;
    					border-radius: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_CT_ArHBR;?>px;
					}
					.cn-slideshow_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> .cn-bar .cn-nav a:hover span
					{
						background-color: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_CT_ArHBC;?>;
					}	
					.cn-bar-anim_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>{
						background:none !important;
						top:50% !important;
						left:50% !important;
						transform:translateY(-50%) translateX(-50%) !important;
						-webkit-transform:translateY(-50%) translateX(-50%) !important;
						-ms-transform:translateY(-50%) translateX(-50%) !important;
						width:100%;
					}
					.cn-nav-content-anim_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>{
						width:75% !important;
						left:50% !important;
						transform:translateX(-50%) !important;
						-webkit-transform:translateX(-50%) !important;
						-ms-transform:translateX(-50%) !important;
					}
					.cn-nav-content-anim2_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>{
						width:100% !important;
					}
		        </style>
				<script id="barTmpl" type="text/x-jquery-tmpl">
		            <div class="cn-bar cn-bar_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>">
		                <div class="cn-nav cn-nav_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>">
							<a href="#" class="cn-nav-prev">
								<?php if($Rich_Web_Slider_Effect[0]->Rich_Web_Sl_CT_ArText=='true'){ ?>
									<span><?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_CT_ArLeft;?></span>
								<?php }?>
								<div style="background-image:url(${prevSource});"></div> 
							</a>
							<a href="#" class="cn-nav-next">
		                       <?php if($Rich_Web_Slider_Effect[0]->Rich_Web_Sl_CT_ArText=='true'){ ?>
									<span><?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_CT_ArRight;?></span>
								<?php }?>
								<div style="background-image:url(${nextSource});"></div>
							</a>
		                </div>
		                <div class="cn-nav-content cn-nav-content_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>">
		                    <div class="cn-nav-content-prev">
		                        <span id='pCl'><?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_CT_ArLeft;?></span>
		                        <h3>${prevTitle}</h3>
		                    </div>
		                    <div class="cn-nav-content-current">
		                        <h2>${currentTitle}</h2>
		                    </div>
		                    <div class="cn-nav-content-next">
		                        <span id='nCl'><?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_CT_ArRight;?></span>
		                        <h3>${nextTitle}</h3>
		                    </div>
		                </div>
		            </div>
				</script>
				<div class="wrapper">
	                <div id="cn-slideshow_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>" class="cn-slideshow cn-slideshow_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>">
	                    <div class="cn-images cn-images_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>">
	                    	<?php for($i=0;$i<count($Rich_Web_Slider_Images);$i++){ ?>
	                    		<?php if($i=='0'){ ?>
	                    			<img src="<?php echo $Rich_Web_Slider_Images[$i]->Sl_Img_Url;?>" alt="image<?php echo $i;?>" title="<?php echo html_entity_decode($Rich_Web_Slider_Images[$i]->SL_Img_Title);?>" data-thumb="<?php echo $Rich_Web_Slider_Images[$i]->Sl_Img_Url;?>" style="display:block;width:100%;height:100%;"/>
	                    		<?php } else { ?>
	                    			<img src="<?php echo $Rich_Web_Slider_Images[$i]->Sl_Img_Url;?>" alt="image<?php echo $i;?>" title="<?php echo html_entity_decode($Rich_Web_Slider_Images[$i]->SL_Img_Title);?>" data-thumb="<?php echo $Rich_Web_Slider_Images[$i]->Sl_Img_Url;?>" style='width:100%;height:100%;'/>
	                    		<?php }?>
	                    	<?php } ?>	                      
	                    </div><!-- cn-images -->
	                </div>
	            </div>
				<input type='text' style='display:none;' class='respSLWidth_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>' value='<?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_CT_W;?>' />
				<input type='text' style='display:none;' class='respSLHeight_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>' value='<?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_CT_H;?>' />
				<input type='text' style='display:none;' class='respSLTitleFS_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>' value='<?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_CT_TFS-5;?>' />
				<script type="text/javascript" src="<?php echo plugins_url('/Scripts/jquery.tmpl.min.js',__FILE__);?>"></script>
				<script type="text/javascript" src="<?php echo plugins_url('/Scripts/jquery.slideshow.js',__FILE__);?>"></script>
				<script type="text/javascript">
		            jQuery(function() {
						jQuery('#cn-slideshow_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>').slideshow(<?php echo $Rich_Web_Slider_Manager[0]->id; ?>);
		            });
		        </script>
				
		        
				<script>
				
					jQuery(document).ready(function(){
						
						var respSLWidth_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> = jQuery('.respSLWidth_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>').val();
						var respSLHeight_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> = jQuery('.respSLHeight_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>').val();
						var respSLTitleFS_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> = jQuery('.respSLTitleFS_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>').val();
						function resp(){
							jQuery('.cn-slideshow_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>').css('width',respSLWidth_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>*jQuery('.cn-slideshow_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>').parent().width()/1000);
							jQuery('.cn-slideshow_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>').css('height',respSLHeight_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>*jQuery('.cn-slideshow_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>').parent().width()/1000);
							if(jQuery('.cn-slideshow_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>').width()<=500){
								jQuery('.cn-slideshow_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> .cn-bar .cn-nav-content h3').css('font-size',respSLTitleFS_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>*jQuery('.cn-slideshow_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>').parent().width()/(jQuery('.cn-slideshow_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>').parent().width()+150))
								jQuery('.cn-slideshow_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> .cn-bar .cn-nav-content .cn-nav-content-current h2').css('font-size',(parseInt(respSLTitleFS_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>)+5)*jQuery('.cn-slideshow_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>').parent().width()/(jQuery('.cn-slideshow_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>').parent().width()+100))
								jQuery('#nCl').css('display','none');
								jQuery('#pCl').css('display','none');
								jQuery('.cn-slideshow_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> .cn-bar').addClass('cn-bar-anim_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>');
								jQuery('.cn-nav-content_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>').addClass('cn-nav-content-anim_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>');
								jQuery('.cn-nav-content-prev, .cn-nav-content-next').css('display','none');
								jQuery('.cn-slideshow_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> .cn-bar .cn-nav-content .cn-nav-content-current h2').css('margin-top',respSLHeight_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>*jQuery('.cn-slideshow_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>').parent().width()/2000)
								jQuery('.cn-slideshow_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> .cn-bar .cn-nav a').hover(function(){
									jQuery(this).find('span').css({'width':'46px','height':'46px','margin':'-23px 0 0 -23px'})
									jQuery(this).find('div').css({'width':'36px','height':'36px','margin':'-18px 0 0 -18px'})

								},function(){
									jQuery(this).find('span').css({'width':'46px','height':'46px','margin':'-23px 0 0 -23px'})
									jQuery(this).find('div').css({'width':'0px','height':'0px','margin':'0px 0 0 0px'})
								})
							}else{
								jQuery('#nCl').css('display','block');
								jQuery('#pCl').css('display','block');
								jQuery('.cn-slideshow_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> .cn-bar').removeClass('cn-bar-anim_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>');
								jQuery('.cn-nav-content_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>').removeClass('cn-nav-content-anim_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>');
								jQuery('.cn-nav-content-prev, .cn-nav-content-next').css('display','block');
								jQuery('.cn-slideshow_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> .cn-bar .cn-nav-content .cn-nav-content-current h2').css('margin-top','10px')
							}
							if(jQuery('.cn-slideshow_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>').width()<=300){
								jQuery('.cn-slideshow_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> .cn-bar .cn-nav a.cn-nav-prev').css('left','0px');
								jQuery('.cn-slideshow_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> .cn-bar .cn-nav a.cn-nav-next').css('right','0px');
								jQuery('.cn-slideshow_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> .cn-bar .cn-nav-content').addClass('cn-nav-content-anim2_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>');
							}else{
								jQuery('.cn-slideshow_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> .cn-bar .cn-nav a.cn-nav-prev').css('left','35px');
								jQuery('.cn-slideshow_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> .cn-bar .cn-nav a.cn-nav-next').css('right','35px');
								jQuery('.cn-slideshow_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> .cn-bar .cn-nav-content').removeClass('cn-nav-content-anim2_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>');
							}
						}
						jQuery(window).load(function(){
							resp();
						})
						jQuery(window).resize(function(){
							resp();
						})
					})
				</script>
		    <?php }else if($Rich_Web_Slider_Effects[0]->slider_type=='Slider Carousel'){ ?>
				<link href="<?php echo plugins_url('/Style/Slider_Carousel.css',__FILE__);?>" rel="stylesheet" type="text/css">
				<script type="text/javascript" src="<?php echo plugins_url('/Scripts/Slider_Carousel.js',__FILE__);?>"></script>
				<style type="text/css">
					.responsiveSlider_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>
					{
						outline: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_SC_BW;?>px <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_SC_BS;?> <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_SC_BC;?>;
						<?php if($Rich_Web_Slider_Effect[0]->Rich_Web_Sl_SC_BoxShShow=='true'){ ?>
							<?php if($Rich_Web_Slider_Effect[0]->Rich_Web_Sl_SC_BoxShType=='true'){ ?>
								-webkit-box-shadow: 0 30px <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_SC_BoxSh;?>px -18px <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_SC_BoxShC;?>;
								-moz-box-shadow: 0 30px <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_SC_BoxSh;?>px -18px <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_SC_BoxShC;?>;
								box-shadow: 0 30px <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_SC_BoxSh;?>px -18px <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_SC_BoxShC;?>;
							<?php }else { ?>
								-webkit-box-shadow: 0px 0px <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_SC_BoxSh;?>px <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_SC_BoxShC;?>;
								-moz-box-shadow: 0px 0px <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_SC_BoxSh;?>px <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_SC_BoxShC;?>;
								box-shadow: 0px 0px <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_SC_BoxSh;?>px <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_SC_BoxShC;?>;
							<?php }?>
						<?php }?>
					}
					.your-item_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>
					{
						width: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_SC_IW;?>px;
						border: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_SC_ICBW;?>px <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_SC_ICBS;?> <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_SC_ICBC;?>;
					}
					.your-item_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>{
						background: transparent;
						cursor: pointer;
						position: relative;
						margin:0px !important;
						padding:0px !important;
					}
					li.your-item_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>:before{
						content: ' ' !important;
						display: none;
					}
					.your-item_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>:hover .your-item-pic_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>{
						opacity: .5;
					}
					.your-item-pic_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>
					{
						border: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_SC_IBW;?>px <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_SC_IBS;?> <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_SC_IBC;?>;
						border-radius: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_SC_IBR;?>px;
						box-sizing:border-box !important;
					}
					.your-item-pic_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>{
						width: 100%;
						margin: 0 !important;
						padding: 0;
					}
					.your-item-pic-anim_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>{
						height: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_SC_IH;?>px !important;
					}
					.your-item-title_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>
					{
						color: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_SC_TC;?>;
						background-color: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_SC_TBgC;?>;
						font-size: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_SC_TFS;?>px;
						font-family: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_SC_TFF;?>;
						height: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_SC_TFS+10;?>px;
						line-height: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_SC_TFS+10;?>px;	
					}
					.your-item-title_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>{
						width: 100%;
						text-align: center;	
						margin-top: 0px !important;
						box-sizing:border-box !important;
					}
					.your-item_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>:hover .your-item-title_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>
					{
						color: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_SC_THC;?>;
						background-color: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_SC_THBgC;?>;
					}
					.Rich_Web_PSlider_SC_Popup_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>
					{
						position: fixed;
						height: 100%;
						width: 0%;
						background-color: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_SC_Pop_OC;?>;
						top: 0;
						left: 0;
						z-index: 9999999;
						cursor: pointer;
					}
					.Rich_Web_PSlider_SC_Popup_Image_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>
					{
						top:10%;
						left:10%;
						right:10%;
						width:700px;
						height:500px;
						margin: auto;
						position: fixed;
						z-index: 9999999;
						-webkit-transform: translateX(5200px);
					    -moz-transform: translateX(5200px);
					    -o-transform: translateX(5200px);
					    -ms-transform: translateX(5200px);
					    transform: translateX(5200px);
					    -webkit-transition: all 0.7s ease-in-out;
                        -moz-transition: all 0.7s ease-in-out;
                        -o-transition: all 0.7s ease-in-out;
                        -ms-transition: all 0.7s ease-in-out;
                        transition: all 0.7s ease-in-out;
						cursor: pointer;
						border: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_SC_Pop_BW;?>px solid <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_SC_Pop_BC;?>;
						<?php if($Rich_Web_Slider_Effect[0]->Rich_Web_Sl_SC_Pop_BoxShShow=='true'){ ?>
							<?php if($Rich_Web_Slider_Effect[0]->Rich_Web_Sl_SC_Pop_BoxShType=='true'){ ?>
								-webkit-box-shadow: 0 30px <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_SC_Pop_BoxSh;?>px -18px <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_SC_Pop_BoxShC;?>;
								-moz-box-shadow: 0 30px <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_SC_Pop_BoxSh;?>px -18px <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_SC_Pop_BoxShC;?>;
								box-shadow: 0 30px <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_SC_Pop_BoxSh;?>px -18px <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_SC_Pop_BoxShC;?>;
							<?php }else { ?>
								-webkit-box-shadow: 0px 0px <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_SC_Pop_BoxSh;?>px <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_SC_Pop_BoxShC;?>;
								-moz-box-shadow: 0px 0px <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_SC_Pop_BoxSh;?>px <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_SC_Pop_BoxShC;?>;
								box-shadow: 0px 0px <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_SC_Pop_BoxSh;?>px <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_SC_Pop_BoxShC;?>;
							<?php }?>
						<?php }?>
					}
					.Rich_Web_PSlider_SC_Popup_Photo_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>
					{
						width: 100%;
						height: 100% !important;
						margin: 0;
						padding: 0;
						cursor: pointer;
					}
					.Rich_Web_PSlider_SC_PCI_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>
					{
						font-size: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_SC_PCI_FS;?>px;
						color: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_SC_PCI_C;?>;
						position: absolute;
						<?php if($Rich_Web_Slider_Effect[0]->Rich_Web_Sl_SC_PCI_FS >= 30 && $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_SC_PCI_FS < 35){ ?>
							top: -20px;
							right: -15px;
						<?php } else if($Rich_Web_Slider_Effect[0]->Rich_Web_Sl_SC_PCI_FS >= 35 && $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_SC_PCI_FS < 40){ ?>
							top: -22px;
							right: -16px;
						<?php } else if($Rich_Web_Slider_Effect[0]->Rich_Web_Sl_SC_PCI_FS >= 40 && $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_SC_PCI_FS < 45){ ?>
							top: -25px;
							right: -19px;
						<?php } else if($Rich_Web_Slider_Effect[0]->Rich_Web_Sl_SC_PCI_FS >= 45){ ?>
							top: -27px;
							right: -21px;
						<?php } else if($Rich_Web_Slider_Effect[0]->Rich_Web_Sl_SC_PCI_FS >= 25 && $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_SC_PCI_FS < 30){ ?>
							top: -16px;
							right: -13px;
						<?php } else if($Rich_Web_Slider_Effect[0]->Rich_Web_Sl_SC_PCI_FS >= 20 && $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_SC_PCI_FS < 25){ ?>
							top: -13px;
							right: -11px;
						<?php } else { ?>
							top: -9px;
							right: -7px;
						<?php }?>
					}
					.Rich_Web_PSlider_SC_PCI_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>:hover
					{
						opacity: 0.8;
					}
					.Rich_Web_PSlider_SC_LPop_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>
					{
						position: absolute;
						top: 35%;
						width: 100%;
						height: 50px; 
						line-height: 50px;
						text-align: center;
					}
					.Rich_Web_PSlider_SC_LPop_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> a
					{
						box-shadow:none !important;
						text-decoration: none !important;
						-webkit-transition: all 0.3s ease-in-out;
                        -moz-transition: all 0.3s ease-in-out;
                        -o-transition: all 0.3s ease-in-out;
                        -ms-transition: all 0.3s ease-in-out;
                        transition: all 0.3s ease-in-out;
					}
					.Rich_Web_PSlider_SC_LPop_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> a:hover
					{
						text-decoration: none !important;
					}
					.Rich_Web_PSlider_SC_L_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>, .Rich_Web_PSlider_SC_LText_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>
					{
						color: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_SC_L_C;?> !important;
						background-color: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_SC_L_BgC;?> !important;
						font-size: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_SC_L_FS;?>px !important;
						border: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_SC_L_BW;?>px <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_SC_L_BS;?> <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_SC_L_BC;?> !important;
						border-radius: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_SC_L_BR;?>px !important;
						padding: 5px 7px 5px 12px;
					}
					.Rich_Web_PSlider_SC_L_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>:hover, .Rich_Web_PSlider_SC_LText_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>:hover
					{
						color: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_SC_L_HC;?> !important;
						background-color: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_SC_L_HBgC;?> !important;
					}
					.Rich_Web_PSlider_SC_LText_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>
					{
						font-family: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_SC_L_FF;?> !important;
						padding: 5px 10px 5px 10px !important;
					}
					.Rich_Web_PSlider_SC_P_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>, .Rich_Web_PSlider_SC_PText_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>
					{
						color: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_SC_PI_C;?> !important;
						background-color: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_SC_PI_BgC;?> !important;
						font-size: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_SC_PI_FS;?>px !important;
						border: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_SC_PI_BW;?>px <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_SC_PI_BS;?> <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_SC_PI_BC;?> !important;
						border-radius: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_SC_PI_BR;?>px !important;
						padding: 5px 7px 5px 7px;
					}
					.Rich_Web_PSlider_SC_P_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>:hover, .Rich_Web_PSlider_SC_PText_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>:hover
					{
						color: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_SC_PI_HC;?> !important;
						background-color: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_SC_PI_HBgC;?> !important;
					}
					.Rich_Web_PSlider_SC_PText_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>
					{
						font-family: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_SC_PI_FF;?> !important;
						padding: 5px 10px 5px 10px !important;
					}
					.Rich_Web_PSlider_SC_Arr_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>, .Rich_Web_PSlider_SC_ArrText
					{
						color: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_SC_Arr_C;?> !important;
						background: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_SC_Arr_BgC;?> !important;
						font-size: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_SC_Arr_FS;?>px !important;
						border: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_SC_Arr_BW;?>px <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_SC_Arr_BS;?> <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_SC_Arr_BC;?> !important;
						border-radius: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_SC_Arr_BR;?>px !important;
						padding: 5px 7px 5px 7px;
						outline:none !important;
						outline-offset: 0px !important;
						box-shadow:none !important;
					}
					.Rich_Web_PSlider_SC_Arr_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>:hover, .Rich_Web_PSlider_SC_ArrText:hover
					{
						color: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_SC_Arr_HC;?> !important;
						background: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_SC_Arr_HBgC;?> !important;
					}
					.Rich_Web_PSlider_SC_ArrText
					{
						font-family:  <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_SC_Arr_FF;?> !important;
					}
					.slider-arrow_left_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>{
						left: 5px;
						top: 35%;
					}
					.slider-arrow_right_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>{
						top: 35%;
						right: 5px;
					}
					@media screen and (max-width:700px){
						.Rich_Web_PSlider_SC_Arr_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>, .Rich_Web_PSlider_SC_ArrText{
							cursor:default;
						}
					}
				</style>
				<div class="your-slider-wrap"> 
					<a class="Rich_Web_PSlider_SC_Arr_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> slider-nav-arrow slider-arrow_left_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> slider-nav-arrow_disable" href="javascript:void(0)">
						<?php if($Rich_Web_Slider_Effect[0]->Rich_Web_Sl_SC_Arr_Type=='text'){ ?>
							<?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_SC_Arr_Prev;?>
						<?php }else{ ?>
							<i class='rich_web rich_web-<?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_SC_Arr_IType;?>-left'></i>
						<?php }?>
					</a> 
					<a class="Rich_Web_PSlider_SC_Arr_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> slider-nav-arrow slider-arrow_right_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>" href="javascript:void(0)">
						<?php if($Rich_Web_Slider_Effect[0]->Rich_Web_Sl_SC_Arr_Type=='text'){ ?>
							<?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_SC_Arr_Next;?>
						<?php }else{ ?>
							<i class='rich_web rich_web-<?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_SC_Arr_IType;?>-right'></i>
						<?php }?>
					</a>
					<div class="your-slider responsiveSlider responsiveSlider_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>">
					    <ul>
					    	<?php for($i=0;$i<count($Rich_Web_Slider_Images);$i++){ ?>
					    		<li class="your-item_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>"> 
					    			<img src="<?php echo $Rich_Web_Slider_Images[$i]->Sl_Img_Url;?>" alt="" class="your-item-pic_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>">
							        <div class="your-item-title_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>"><?php echo html_entity_decode($Rich_Web_Slider_Images[$i]->SL_Img_Title);?></div>
							        <div class="Rich_Web_PSlider_SC_LPop_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>">
								        <?php if($Rich_Web_Slider_Images[$i]->Sl_Link_Url!=''){ ?>
								        	<?php if($Rich_Web_Slider_Effect[0]->Rich_Web_Sl_SC_L_Type=='text'){ ?>
								        		<a class="Rich_Web_PSlider_SC_LText_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>" href="<?php echo $Rich_Web_Slider_Images[$i]->Sl_Link_Url;?>" target="<?php if($Rich_Web_Slider_Images[$i]->Sl_Link_NewTab=='checked'){ echo '_blank';} ?>">
								        			<?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_SC_L_Text;?>
								        		</a>	
								        	<?php }else{ ?>
								        		<a class="Rich_Web_PSlider_SC_L_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>" href="<?php echo $Rich_Web_Slider_Images[$i]->Sl_Link_Url;?>" target="<?php if($Rich_Web_Slider_Images[$i]->Sl_Link_NewTab=='checked'){ echo '_blank';} ?>">
								        			<i class='rich_web rich_web-<?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_SC_L_IType;?>'></i>
								        		</a>								        	
								        	<?php }?>
								        <?php }?>
							        	<?php if($Rich_Web_Slider_Effect[0]->Rich_Web_Sl_SC_PI_Type=='text'){ ?>
							        		<a class="Rich_Web_PSlider_SC_PText_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>" onclick="Rich_Web_PSlider_SC_Open_Popup_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>('<?php echo $Rich_Web_Slider_Images[$i]->Sl_Img_Url;?>')"  style="<?php if($Rich_Web_Slider_Images[$i]->Sl_Link_Url!=''){echo 'margin-left:10px;'; }?>">
							        			<?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_SC_PI_Text;?>
							        		</a>
							        	<?php }else{ ?>
							        		<a class="Rich_Web_PSlider_SC_P_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>" onclick="Rich_Web_PSlider_SC_Open_Popup_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>('<?php echo $Rich_Web_Slider_Images[$i]->Sl_Img_Url;?>')"  style="<?php if($Rich_Web_Slider_Images[$i]->Sl_Link_Url!=''){echo 'margin-left:10px;'; }?>">
							        			<i class='rich_web rich_web-<?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_SC_PI_IType;?>'></i>
							        		</a>
							        	<?php }?>   
							        </div>
							    </li>
	                    	<?php } ?>	  
					    </ul>
					</div>
					<div class="Rich_Web_PSlider_SC_Popup_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>" onclick="Rich_Web_PSlider_SC_Close_Popup(<?php echo $Rich_Web_Slider_Manager[0]->id; ?>)"></div>
					<div class="Rich_Web_PSlider_SC_Popup_Image_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>" onclick="Rich_Web_PSlider_SC_Close_Popup(<?php echo $Rich_Web_Slider_Manager[0]->id; ?>)">
						<i class='Rich_Web_PSlider_SC_PCI_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> rich_web rich_web-<?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_SC_PCI_Type;?>' onclick="Rich_Web_PSlider_SC_Close_Popup(<?php echo $Rich_Web_Slider_Manager[0]->id; ?>)"></i>
						<img src=""  class="Rich_Web_PSlider_SC_Popup_Photo_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>">
					</div>
				</div>	
				<input type='text' style='display:none;' class='yitw_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>' value='<?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_SC_IW;?>'>
				<input type='text' style='display:none;' class='yith_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>' value='<?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_SC_IH;?>'>
				<script>
					jQuery(document).ready(function(){
						var yitw_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> =jQuery('.yitw_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>').val();
						var yith_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> =jQuery('.yith_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>').val();
						function resp(){
							if(jQuery('.responsiveSlider_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>').width()<=yitw_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>){
								jQuery('.your-item_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>').css('width',jQuery('.responsiveSlider_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>').width());
								jQuery('.your-item-pic_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>').css('height',jQuery('.responsiveSlider_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>').width()*yith_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>/yitw_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>);
								jQuery('.your-item-pic_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>').removeClass('your-item-pic-anim_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>');
							}else if(jQuery('.responsiveSlider_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>').width()>yitw_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>){
								jQuery('.your-item_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>').css('width',yitw_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>);
								jQuery('.your-item-pic_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>').css('height',yith_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>);
								jQuery('.your-item-pic_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>').addClass('your-item-pic-anim_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>');
							}
							jQuery('.Rich_Web_PSlider_SC_Popup_Image_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>').css('width',600*jQuery(window).width()/1000+'px');
							jQuery('.Rich_Web_PSlider_SC_Popup_Image_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>').css('height',400*jQuery(window).width()/1000+'px');
						}
						jQuery(window).load(function(){
							resp();
						})
						
						jQuery(window).resize(function(){
							resp();
						})
						jQuery('.responsiveSlider_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>').responsiveSlider({
							slider_item_width: jQuery('.your-item_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>').width(), 
							slider_btn_disableClass: 'slider-nav-arrow_disable',
							$slider_btn_prev: jQuery('.slider-arrow_left_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>'),
							$slider_btn_next: jQuery('.slider-arrow_right_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>')
						});
					})
				</script>
				<script type="text/javascript">
				 function Rich_Web_PSlider_SC_Open_Popup_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>(PSlider_Src)
					{
						jQuery('.Rich_Web_PSlider_SC_Popup_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>').animate({'width':'100%'},500);
						jQuery('.Rich_Web_PSlider_SC_Popup_Photo_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>').attr('src',PSlider_Src);
						jQuery('.Rich_Web_PSlider_SC_Popup_Image_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>').css({'transform':'translateX(0px)','-ms-transform': 'translateX(0px)', '-o-transform': 'translateX(0px)','-moz-transform': 'translateX(0px)','-webkit-transform': 'translateX(0px)'});
					}
					function Rich_Web_PSlider_SC_Close_Popup(a)
					{
						jQuery('.Rich_Web_PSlider_SC_Popup_Image_'+a+'').css({'transform':'translateX(5200px)','-ms-transform': 'translateX(5200px)', '-o-transform': 'translateX(5200px)','-moz-transform': 'translateX(5200px)','-webkit-transform': 'translateX(5200px)'});
						setTimeout(function(){
							jQuery('.Rich_Web_PSlider_SC_Popup_Photo_'+a+'').attr('src','');
							jQuery('.Rich_Web_PSlider_SC_Popup_'+a+'').animate({'width':'0'},500);
						},200)	
					}
				</script>
			<?php }else if($Rich_Web_Slider_Effects[0]->slider_type=='Flexible Slider'){ ?>
				<?php 
					if($Rich_Web_Slider_Effect[0]->Rich_Web_Sl_FS_Arr_Type=='angle-double'){ $Rich_Web_Slider_FlS_L='\f100'; $Rich_Web_Slider_FlS_R='\f101'; }
					else if($Rich_Web_Slider_Effect[0]->Rich_Web_Sl_FS_Arr_Type=='angle'){ $Rich_Web_Slider_FlS_L='\f104'; $Rich_Web_Slider_FlS_R='\f105'; }
					else if($Rich_Web_Slider_Effect[0]->Rich_Web_Sl_FS_Arr_Type=='arrow-circle'){ $Rich_Web_Slider_FlS_L='\f0a8'; $Rich_Web_Slider_FlS_R='\f0a9'; }
					else if($Rich_Web_Slider_Effect[0]->Rich_Web_Sl_FS_Arr_Type=='arrow-circle-o'){ $Rich_Web_Slider_FlS_L='\f190'; $Rich_Web_Slider_FlS_R='\f18e';	}
					else if($Rich_Web_Slider_Effect[0]->Rich_Web_Sl_FS_Arr_Type=='arrow'){ $Rich_Web_Slider_FlS_L='\f060'; $Rich_Web_Slider_FlS_R='\f061'; }
					else if($Rich_Web_Slider_Effect[0]->Rich_Web_Sl_FS_Arr_Type=='caret'){ $Rich_Web_Slider_FlS_L='\f0d9'; $Rich_Web_Slider_FlS_R='\f0da'; }
					else if($Rich_Web_Slider_Effect[0]->Rich_Web_Sl_FS_Arr_Type=='caret-square-o'){ $Rich_Web_Slider_FlS_L='\f191';	$Rich_Web_Slider_FlS_R='\f152';	}
					else if($Rich_Web_Slider_Effect[0]->Rich_Web_Sl_FS_Arr_Type=='chevron-circle'){ $Rich_Web_Slider_FlS_L='\f137';	$Rich_Web_Slider_FlS_R='\f138';	}
					else if($Rich_Web_Slider_Effect[0]->Rich_Web_Sl_FS_Arr_Type=='chevron'){ $Rich_Web_Slider_FlS_L='\f053'; $Rich_Web_Slider_FlS_R='\f054'; }
					else if($Rich_Web_Slider_Effect[0]->Rich_Web_Sl_FS_Arr_Type=='hand-o'){ $Rich_Web_Slider_FlS_L='\f0a5';	$Rich_Web_Slider_FlS_R='\f0a4';	}
					else if($Rich_Web_Slider_Effect[0]->Rich_Web_Sl_FS_Arr_Type=='long-arrow'){ $Rich_Web_Slider_FlS_L='\f177';	$Rich_Web_Slider_FlS_R='\f178';	}
				?>
				<link href="<?php echo plugins_url('/Style/mislider.css',__FILE__);?>" rel="stylesheet">
			    <script src="<?php echo plugins_url('/Scripts/mislider.js',__FILE__);?>"></script>
			    <script>
			        jQuery(function ($) {
			            var slider = jQuery('.mis-stage_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>').miSlider({
			               	speed: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_FS_TS;?>,
							pause: <?php if($Rich_Web_Slider_Effect[0]->Rich_Web_Sl_FS_AP=='true'){ echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_FS_PT*1000;}else{ echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_FS_AP;} ?>,
							increment: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_FS_SS;?>,
							slidesOnStage: <?php if($Rich_Web_Slider_Effect[0]->Rich_Web_Sl_FS_SVis=='true'){ echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_FS_CS;}else{ echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_FS_SVis;} ?>,
							slidesContinuous: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_FS_SLoop;?>,
							slidePosition: "<?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_FS_SlPos;?>",
							slideScaling: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_FS_SSc;?>,
							navList: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_FS_Arr_Show;?>,
							navButtons: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_FS_Nav_Show;?>,
							navButtonsShow: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_FS_ShNavBut;?>,
							classNavButtons: "mis-nav-buttons_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>",
							classNavList: "mis-nav-list_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>",
							classSlide: "mis-slide_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>",
							classStage: "mis-stage_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>",
							classSlider: "mis-slider_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>",
							//selectorSlide: "mis-slide_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>",
			            });
			        });
			    </script>
			    <style type="text/css">
					
					a:focus {
						outline: none !important;
					}
					
					
					.mis-slide_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> {
						width: 100%;
					   
						padding: 0;
						display: block;
						position: relative;
						float: left;
						overflow: visible !important;
					}
					.js .mis-slide_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> {
						display: none;
						opacity: 0;
					}
					.mis-slide_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>:before{
						display:none !important
					}
					.mis-slide_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>.mis-current {
						z-index: 100;
						display: block;
					}
					.mis-stage, .mis-slider, .mis-slide_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>, .mis-container, .mis-container * {
						-webkit-box-sizing: border-box;
						-moz-box-sizing: border-box;
						box-sizing: border-box;
						margin: 0;
						padding: 0;
					}
					

			    	.mis-slider_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>
			    	{
			    		background-color: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_FS_BgC;?>;
    					margin-top: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_FS_I_H/2;?>px !important;
						margin-left: 0px !important;
						margin-right: 0px !important;
						margin-bottom: 0px !important;
						padding:0px !important;
			    	}
					.mis-container_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> {
						display: block;
						width: auto;
						height: auto;
						border: 0;
					}
			    	.mis-slider_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> li img 
			    	{
					    max-width: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_FS_I_W;?>px;
					    width: 100%;
					    display: inline;
					    border-radius: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_FS_I_BR;?>px;
					    border: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_FS_I_BW;?>px <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_FS_I_BS;?> <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_FS_I_BC;?>;
					    height: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_FS_I_H;?>px;
					    margin: 0;
					    filter:none !important;
					    -webkit-filter:none !important;
					    -ms-filter:none !important;
					    -moz-filter:none !important;
					    -o-filter:none !important;
					    <?php if($Rich_Web_Slider_Effect[0]->Rich_Web_Sl_FS_I_BoxShShow=='true'){ ?>
						    <?php if($Rich_Web_Slider_Effect[0]->Rich_Web_Sl_FS_I_BoxShType=='true'){ ?>
								-webkit-box-shadow: 0 30px <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_FS_I_BoxSh;?>px -18px <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_FS_I_BoxShC;?>;
								-moz-box-shadow: 0 30px <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_FS_I_BoxSh;?>px -18px <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_FS_I_BoxShC;?>;
								box-shadow: 0 30px <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_FS_I_BoxSh;?>px -18px <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_FS_I_BoxShC;?>;
						    <?php }else{ ?> <?php ?>
						    	-webkit-box-shadow: 0px 0px <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_FS_I_BoxSh;?>px <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_FS_I_BoxShC;?>;
								-moz-box-shadow: 0px 0px <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_FS_I_BoxSh;?>px <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_FS_I_BoxShC;?>;
								box-shadow: 0px 0px <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_FS_I_BoxSh;?>px <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_FS_I_BoxShC;?>;
						    <?php }?>
						<?php }?>
					}
					.entry-content li, .comment-content li, .mu_register li{
						margin:0px;
					}
					.mis-slide_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>
					{
						width: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_FS_I_W+80;?>px;
    					height: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_FS_I_H+90;?>px;
    					
    					margin-top: -<?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_FS_I_H/2-40;?>px !important;
    					padding:0px !important;
					}
					.mis-slider_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> li span, .mis-slider_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> li a figure
					{
    					color: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_FS_T_C;?> !important;
    					font-family: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_FS_T_FF;?> !important;
					}
					.mis-slider_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> li span, .mis-slider_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> li a{
						box-shadow:none !important;
						border:none !important;
					}
					.entry-content ol li, .entry-content ul li{
						margin-left:0px;
					}
					.mis-nav-list_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> li a 
					{
						width: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_FS_Nav_W;?>px;
						height: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_FS_Nav_H;?>px;
   						margin: 0 <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_FS_Nav_PB;?>px;
   						border: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_FS_Nav_BW;?>px <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_FS_Nav_BS;?> <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_FS_Nav_BC;?>;
						border-radius: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_FS_Nav_BR;?>px;
						background: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_FS_Nav_C;?>;
					}
					.mis-nav-list_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> li.mis-current a
					{
						background: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_FS_Nav_CC;?>;
					}
					.mis-nav-list_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> li a:hover 
					{
						background: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_FS_Nav_HC;?>;
					}
					.mis-nav-buttons_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> a
					{
						color: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_FS_Arr_C;?> !important;
						border:none !important;
					}
					.mis-nav-buttons_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> a.mis-prev:before, .mis-nav-buttons_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> a.mis-next:after {
					    content: "<?php echo $Rich_Web_Slider_FlS_L;?>"; 
					    display: block;
					    font-size: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_FS_Arr_S;?>px;
					    text-indent: 0;
						border:none !important;
					}
					.mis-nav-buttons_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> a.mis-next:after {
					    content: "<?php echo $Rich_Web_Slider_FlS_R;?>"; 
						border:none !important;
					}
					.mis-nav-list_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> {
						position: absolute;
						top: 0px;
						width: 100%;
						margin: 0 auto !important;
						z-index: 300;
						padding: 0px !important;
					}
					.mis-nav-list_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> li {
						display: inline-block;
						margin:0px !important;
					}
					.mis-nav-list_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> li:before, li.mis-slide:before
					{
						content: '' !important;
					}
					.mis-nav-list_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> li a {
						display: block;
						text-indent: 100%;
						overflow: hidden;
						white-space: nowrap;
						box-shadow:none !important;
					}
					.mis-nav-buttons_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> {
						display: block;
						position: absolute;
						height: 0;
						top: 0;
						opacity: 0.5;
						z-index: 200;
					}
					.mis-nav-buttons_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> a {
						position: absolute;
						font-size: 0;
						line-height: .01; 
						font-family: FontAwesome;
						font-weight: bold;
						text-decoration: none;
						text-indent: -9999px; 
						box-shadow:none !important;
						z-index:2;
					}
					.mis-nav-buttons_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> a:hover {
						opacity: .8;
					}
					.mis-nav-buttons_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> a.mis-next {
						left: auto;
						right: 3px;
						border:none !important;
						padding-left:25px !important;
					}
					.mis-nav-buttons_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> a.mis-prev {
						left: 4px;
						border:none !important;
						padding-right:25px !important;
					}
					@media screen and (max-width:700px){
						.mis-nav-buttons_1 a{
							cursor:default !important;
						}
						.mis-slider li a{
							cursor:default !important;
						}
					}
			    </style>
				<figure>
				    <div class="mis-stage mis-stage_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>">
				        <ol class="mis-slider mis-slider_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>">
				            <?php for($i=0;$i<count($Rich_Web_Slider_Images);$i++){ ?>
	                    		 <li class="mis-slide_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>">
					                <?php if($Rich_Web_Slider_Images[$i]->Sl_Link_Url != ''){ ?>
	                    				<a href="<?php echo $Rich_Web_Slider_Images[$i]->Sl_Link_Url;?>" target="<?php if($Rich_Web_Slider_Images[$i]->Sl_Link_NewTab=='checked'){ echo '_blank';}?>" class="mis-container_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>">
						                    <figure>
						                        <img src="<?php echo $Rich_Web_Slider_Images[$i]->Sl_Img_Url;?>" alt="<?php echo html_entity_decode($Rich_Web_Slider_Images[$i]->SL_Img_Title);?>">
						                        <figcaption><?php echo html_entity_decode($Rich_Web_Slider_Images[$i]->SL_Img_Title);?></figcaption>
						                    </figure>
						                </a>
	                    			<?php }else{ ?>
	                    				<span class="mis-container_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>">
						                    <figure>
						                        <img src="<?php echo $Rich_Web_Slider_Images[$i]->Sl_Img_Url;?>" alt="<?php echo html_entity_decode($Rich_Web_Slider_Images[$i]->SL_Img_Title);?>">
						                        <figcaption><?php echo html_entity_decode($Rich_Web_Slider_Images[$i]->SL_Img_Title);?></figcaption>
						                    </figure>
						                </span>
	                    			<?php }?>	
					            </li>							
	                    	<?php } ?>	  
				        </ol>
				    </div>
				</figure>
				<input type='text' style='display:none;' class='RW_SL_Number' value='<?php echo $Rich_Web_Slider_Manager[0]->id; ?>'>
				
			<?php }else if($Rich_Web_Slider_Effects[0]->slider_type=='Dynamic Slider'){ ?>				
				<style type="text/css">
					.rSlider_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> 
					{
						border: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_DS_BW;?>px <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_DS_BS;?> <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_DS_BC;?>;
						max-width: 99% !important;
    					margin: 15px auto !important;
					}
					.rSlider_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> .slide-styled_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>{
						text-align:justify !important;
					}
					
					.rSlider_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> .slide-styled_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> h2 
					{
					 	font-size: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_DS_TFS;?>px !important;
					  	color: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_DS_TC;?> !important;
					  	font-family: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_DS_TFF;?>;
					  	text-transform:none !important;
					  	letter-spacing:0px !important;
					  	text-align:justify !important;
					}
					.rSlider_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> .slide-styled_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> p 
					{
					  	font-size: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_DS_DFS;?>px;
					  	color: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_DS_DC;?>;
					  	font-family: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_DS_DFF;?>;
					}
					.rSlider_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> .slide-styled_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> a
					{
						font-size: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_DS_LFS;?>px;
					  	color: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_DS_LC;?>;
					  	font-family: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_DS_LFF;?>;
					  	background: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_DS_LBgC;?>;
					  	border: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_DS_LBW;?>px <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_DS_LBS;?> <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_DS_LBC;?>;
					  	border-radius: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_DS_LBR;?>px;
					  	display: inline-block;
					  	padding: 5px 10px;
					  	text-decoration: none;
					  	margin: auto;
					  	line-height: 1;
					  	cursor: pointer;
					  	box-shadow:none !important;
					}
					.rSlider_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> .slide-styled_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> a:hover
					{
					  	color: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_DS_LHC;?>;
					  	background: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_DS_LHBgC;?>;
					}
					.rSlider_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> > .rSlider--arrow-controls_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> button 
					{
						color: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_DS_Arr_C;?>;
						background: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_DS_Arr_BgC;?> !important;
						border: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_DS_Arr_BW;?>px <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_DS_Arr_BS;?> <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_DS_Arr_BC;?>;
						border-radius: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_DS_Arr_BR;?>px;
						letter-spacing: 0px;

					}
					.rSlider_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> > .rSlider--arrow-controls_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> button:focus
					{
						outline: none !important;
					}
					.rSlider_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> > .rSlider--arrow-controls_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> span:hover button {
					 	color: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_DS_Arr_HC;?>;
						background-color: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_DS_Arr_HBgC;?>;
					}
					.rSlider_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> > .rSlider--dots-controls_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> button 
					{
						height: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_DS_Nav_H;?>px;
  						width: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_DS_Nav_W;?>px;
  						border: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_DS_Nav_BW;?>px <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_DS_Nav_BS;?> <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_DS_Nav_BC;?>;
  						border-radius: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_DS_Nav_BR;?>px;
  						margin-right: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_DS_Nav_PB;?>px;
  						background: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_DS_Nav_C;?>;
					}
					.rSlider_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> > .rSlider--dots-controls_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> button.active 
					{
  						background: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_DS_Nav_CC;?>;
					}
					.rSlider_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> > .rSlider--dots-controls_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> button:hover 
					{
  						background: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_DS_Nav_HC;?>;
					}
					.rSlider_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> {
					  overflow: hidden;
					  width: 100%;
					  position: relative;
					}
					.rSlider_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> > .rSlider--view_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> {
					  width: <?php echo (count($Rich_Web_Slider_Images)+1)*100;?>%;
					  overflow: hidden;
					  display: block;
					  overflow: hidden;
					}
					.rSlider_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> > .rSlider--view_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>:before {
					  content: " ";
					  display: block;
					}
					.rSlider_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> > .rSlider--view_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> > .rSlider--slide_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> {
					  float: left;
					  overflow: hidden;
					  position: relative;
					  display: block;
					  overflow: hidden;
					}
					.rSlider_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> > .rSlider--view_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> > .rSlider--slide_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>:before {
					  content: " ";
					  display: block;
					}
					.rSlider_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> > .rSlider--view_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> > .rSlider--slide_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> > .rSlider--image_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> {
					  position: absolute;
					  top: 0;
					  left: 0;
					  width: 100%;
					  height: 100%;
					  background-size: 100% 100%;
					  background-position: center center;
					  z-index: 0;
					}
					.rSlider_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> > .rSlider--view_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> > .rSlider--slide_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> > .rSlider--container_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> {
					  padding: 0px 80px !important;
					  max-width: 1200px;
					  margin: auto;
					  width: 100%;
					  position: relative;
					  z-index: 2;
					  top: 50%;
					  left: 0;
					  -webkit-transform: translate(0, -50%);
					  -ms-transform: translate(0, -50%);
					  transform: translate(0, -50%);
					  display: block;
					  overflow: hidden;
					}
					.rSlider_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> > .rSlider--view_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> > .rSlider--slide_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> > .rSlider--container_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>:before {
					  content: " ";
					  display: block;
					}
					.rSlider_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> > .rSlider--view_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> > .rSlider--slide_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> > .rSlider--bg-color_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> {
					  position: absolute;
					  top: 0;
					  left: 0;
					  width: 100%;
					  height: 100%;
					  display: block;
					  z-index: 1;
					}
					.rSlider_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> > .rSlider--dots-controls_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> {
					  padding: 20px;
					  position: absolute;
					  bottom: 0;
					  left: 50%;
					  -webkit-transform: translate(-50%, 0);
					  -ms-transform: translate(-50%, 0);
					  transform: translate(-50%, 0);
					  z-index: 2;
					  display: block;
					  overflow: hidden;
					}
					.rSlider_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> > .rSlider--dots-controls_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>:before {
					  content: " ";
					  display: block;
					}
					.rSlider_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> > .rSlider--dots-controls_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> button {
					  float: left;
					  cursor: pointer;
					  margin-bottom: 5px;
					  padding: 0;
					  outline:none !important;
					}
					.rSlider_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> > .rSlider--dots-controls_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> button:last-of-type {
					  margin-right: 0;
					  margin-bottom: 0;
					}
					.rSlider_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> > .rSlider--arrow-controls_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> {
					  position: absolute;
					  top: 0;
					  left: 0;
					  width: 100%;
					  height: 100%;
					}
					.rSlider_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> > .rSlider--arrow-controls_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> span {
					  padding: 10px;
					  position: absolute;
					  overflow: hidden;
					  top: 0;
					  height: 100%;
					  z-index: 3;
					  text-align: center;
					  cursor: pointer;
					}
					.rSlider_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> > .rSlider--arrow-controls_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> span:first-child {
					  left: 0;
					}
					.rSlider_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> > .rSlider--arrow-controls_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> span:last-child {
					  right: 0;
					}
					.rSlider_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> > .rSlider--arrow-controls_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> button {
					  position: relative;
					  top: 50%;
					  text-transform: none !important;
					  font-weight:100 !important;
					  -webkit-transform: translate(0, -50%);
					  -ms-transform: translate(0, -50%);
					  transform: translate(0, -50%);
					  cursor: pointer;
					  padding: 10px 5px;
					}
					.rSlider_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>.css-transitions .rSlider--view_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> {
					  -webkit-transition: all 0.6s ease 0s;
					  transition: all 0.6s ease 0s;
					}
					.rSlider_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>.css-transitions .rSlider--slide_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> {
					  -webkit-transition: all 0.6s ease 0s;
					  transition: all 0.6s ease 0s;
					}
					.rSlider--slide_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> {
					  height:100% !important;
					}
					.rSlider_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>.css-transitions .rSlider--bg-color_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> {
					  -webkit-transition: all 0.6s ease 0s;
					  transition: all 0.6s ease 0s;
					}
					.rSlider_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>.css-transitions .rSlider--dots-controls_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> button {
					  -webkit-transition: all 0.6s ease 0s;
					  transition: all 0.6s ease 0s;
					}
					.rSlider_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>.css-transitions .rSlider--arrow-controls_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> button {
					  -webkit-transition: all 0.6s ease 0s;
					  transition: all 0.6s ease 0s;
					}
					.rSlider_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> .rSlider--bg-color_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> {
					  background: rgba(0, 0, 0, 0.3);
					}
					.rSlider_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> .slide-styled_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> {
					  position:absolute;
					  width: 100%;
					  max-width: 50%;
					  top:50%;
					  transform:translateY(-50%);
					  -webkit-transform:translateY(-50%);
					  -ms-transform:translateY(-50%);
					  -moz-transform:translateY(-50%);
					  -o-transform:translateY(-50%);
					}
					.rSlider_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>:hover .rSlider--bg-color_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> {
					  background: rgba(0, 0, 0, 0);
					}
					.rSlider--image_RW{
						position:absolute;
						width:100%;
						height:100%;
						
					}
					@media (min-width: 0) { .rSlider_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> .slide-styled_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> h2, .rSlider_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> .slide-styled_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> p, .rSlider_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> .slide-styled_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> a { font-size: 0.7rem !important; } }
					@media (min-width: 800px) { .rSlider_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> .slide-styled_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> h2, .rSlider_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> .slide-styled_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> p, .rSlider_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> .slide-styled_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> a { font-size: 0.7rem !important; } }
					@media (min-width: 1400px) { .rSlider_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> .slide-styled_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> h2, .rSlider_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> .slide-styled_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> p, .rSlider_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> .slide-styled_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> a { font-size: 1.2rem !important; } }
					@media (min-width: 0) and (max-width: 500px) { 
						.rSlider_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> .slide-styled_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> p { display: none; } 
						.rSlider_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> .slide-styled_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> h2 { font-size: 14px !important; } 
						.rSlider_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> .slide-styled_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> a { font-size: 14px !important; } 
						.rSlider_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> > .rSlider--view_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> > .rSlider--slide_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> > .rSlider--container_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> {padding: 150px 80px;}
						.rSlider_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> > .rSlider--arrow-controls_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> button { font-size: 10px;line-height:10px !important; }
					}
					@media screen and (max-width:700px){
						.rSlider_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> > .rSlider--arrow-controls_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> span{
							cursor:default !important;
						}
						.rSlider_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> > .rSlider--arrow-controls_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> span button{
							cursor:default !important;
						}
						.rSlider_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> .slide-styled_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> a{
							cursor:default !important;
						}
						.rSlider--image_RW{
							cursor:default !important;
						}
						
					}
					@media screen and (max-width:600px){
						.rSlider_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> > .rSlider--dots-controls_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>{
							display:none !important;
						}
						.rSlider_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> .slide-styled_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>{
							top:65%;
						}
						.rSlider_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> .slide-styled_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> h2{
							margin:0px;
						}
					}
				</style>
				<div class='rSlider_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>'>
				    <div class='rSlider--view_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>'>
				    	<?php for($i=0;$i<count($Rich_Web_Slider_Images);$i++){ ?>
				    		<div class='rSlider--slide_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>'>
					        	<div class='rSlider--container_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>'>
						          	<div class='slide-styled_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>'>
						          		<?php if($Rich_Web_Slider_Images[$i]->SL_Img_Title!=''){ ?>
							            	<h2><?php echo html_entity_decode($Rich_Web_Slider_Images[$i]->SL_Img_Title);?></h2>
						          		<?php }?>
						          		<?php if($Rich_Web_Slider_Images[$i]->Sl_Img_Description!=''){ ?>
							           		<p><?php echo html_entity_decode($Rich_Web_Slider_Images[$i]->Sl_Img_Description);?></p>
						          		<?php }?>
						          		<?php if($Rich_Web_Slider_Images[$i]->Sl_Link_Url!=''){ ?>
							           		<a href="<?php echo $Rich_Web_Slider_Images[$i]->Sl_Link_Url;?>" target="<?php if($Rich_Web_Slider_Images[$i]->Sl_Link_NewTab=='checked'){ echo '_blank';}?>"><?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_DS_LT;?></a>
						          		<?php }?>
						          		
						          	</div>
						          	<div class='rSlider--image_RW' name='<?php echo $Rich_Web_Slider_Images[$i]->Sl_Link_Url;?>' alt='<?php echo $Rich_Web_Slider_Images[$i]->Sl_Link_NewTab;?>'>

						          		</div>
						        </div>
						        <div class='rSlider--image_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> '><img src='<?php echo $Rich_Web_Slider_Images[$i]->Sl_Img_Url;?>' /></div>
						        <div class='rSlider--bg-color_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>'></div>
					     	</div>
				    	<?php }?>
				    </div>
				    <div class='rSlider--dots-controls_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>'></div>
				    <div class='rSlider--arrow-controls_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>'></div>
				</div>
				<input type='text' style='display:none;' class='RW_DSL_H_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>' value='<?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_DS_H;?>'>
  				<script type="text/javascript">
			        (function(){
					  var pluginName  = "rSlider",
					      defaults    = {
					        currentSlide: 0,
					        defaultSlide: 0,
					        delay: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_DS_PT*1000;?>,
					        height: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_DS_H;?>,
					        width: undefined,
					        minHeight: 150,
					        automatic: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_DS_AP;?>,
					        dirButtons: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_DS_Arr_Show;?>,
					        dirButtonNext: "<?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_DS_Arr_RT;?>",
					        dirButtonPrev: "<?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_DS_Arr_LT;?>",
					        transitions: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_DS_Tr;?>
					      };
					  var Plugin = function(context, options)
					  {
					    this.$context   = jQuery(context);
					    this.$view      = this.$context.find(".rSlider--view_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>");
					    this.$slides    = this.$view.find(".rSlider--slide_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>");
					    this.$images    = this.$slides.find(".rSlider--image_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>");
					    this.$container = this.$slides.find(".rSlider--container_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>");
					    this.$dotsControls  = this.$context.find(".rSlider--dots-controls_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>");
					    this.$arrowControls  = this.$context.find(".rSlider--arrow-controls_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>");
					    this.slidesLen    = this.$slides.length;
					    this.settings = jQuery.extend(defaults, options);
					    this.w = this.settings.width || this.$context.width();
					    this.h = this.settings.height || this.$context.height();
					    this.delayTimer = undefined;
					    this.resizeTimer  = undefined;
					    this.init();
					  };
					  var pluginProto = {
					    init: function()
					    {
					      var self = this;
					      if(self.settings.currentSlide !== self.settings.defaultSlide)
					        self.setSlide(self.settings.defaultSlide)
					        self.events();
					        self.setStyle();
					        self.startAutomaticMovement();
					        self.setDotsControls();
					        self.setArrowControls();
					        self.activateButton( self.settings.currentSlide );
					        self.fixSlideHeight();
					        self.moveSlide();
					        self.setAnimations();
					    },
					    calculateMargin: function()
					    {
					      var self    = this,
					        margin  = -self.settings.currentSlide * self.w;
					      return margin;
					    },
					    startAutomaticMovement: function()
					    {
					      var self    = this,
					      moving  = function()
					      {
					        self.goToSlide(self.nextSlide());
					        self.activateButton();
					        self.moveSlide();
					      };
					      if(self.settings.automatic)
					      {
					        clearInterval(self.delayTimer);
					        self.delayTimer = setInterval(moving, self.settings.delay)
					      }
					    },
					    stopAutomaticMovement: function()
					    {
					      var self = this;
					      clearInterval(self.delayTimer);
					    },
					    setStyle: function()
					    {
					      var self = this;
					      self.setMetrics();
					      self.setBackgroundImages();
					    },
					    setBackgroundImages: function()
					    {
					      var self = this,
					          $imgs = self.$images.find("img"),
					          assignAttribute = function()
					          {
					            var $img    = jQuery(this),
					                $parent = $img.parent(),
					                attr    = $img.attr("src");
					            $parent.css({"background-image": "url('" + attr + "')"});
					          }
					      jQuery.each($imgs, assignAttribute);
					      $imgs.remove();
					    },
					    setDotsControls: function()
					    {
					      var self = this,
					          buttons = "",
					          i = 0;
					      jQuery.each(self.$images, function()
					      {
					        buttons += "<button data-slide-index='" + i + "'></button>";
					        i++;
					      });
					      self.$dotsControls.append(buttons);
					    },
					    setArrowControls: function()
					    {
					      var self = this,
					          buttons = "";
					      if(!self.settings.dirButtons) return;
					      buttons += "<span><button data-dir='prev'>" + self.settings.dirButtonPrev + "</button></span>";
					      buttons += "<span><button data-dir='next'>" + self.settings.dirButtonNext + "</button></span>";
					      self.$arrowControls.append(buttons);
					    },
					    setMetrics: function()
					    {
					      var self = this;
					      self.$slides.width(self.w);
					      if(self.settings.height && self.settings.width)
					      {
					        self.$view.height(self.h);
					        self.$context.width(self.w);
					      }
					    },
					    nextSlide: function()
					    {
					      var self = this,
					          index;
					      index = self.settings.currentSlide+1;
					      if(self.settings.currentSlide === self.slidesLen - 1) index = 0;
					      return index;
					    },
					    prevSlide: function()
					    {
					      var self  = this,
					          index = self.settings.currentSlide-1;
					      if(self.settings.currentSlide === 0) index = self.slidesLen-1;
					      return index;
					    },
					    setSlide: function(index)
					    {
					      var self = this;
					      self.settings.currentSlide = index;
					      return index;
					    },
					    moveSlide: function()
					    {
					      var self = this;
					      self.$view.css({ "margin-left": self.calculateMargin() })
					    },
					    goToSlide: function(slideIndex)
					    {
					      var self  = this,
					          index = slideIndex;
					      // next or prev
					      switch(index)
					      {
					        case "next":
					          index = self.nextSlide();
					          break;
					        case "prev":
					          index = self.prevSlide();
					          break;
					      };
					      self.setSlide(index);
					      self.fixSlideHeight();
					      return self.settings.currentSlide;
					    },
					    activateButton: function(index)
					    {
					      var self    = this,
					          buttons = self.$dotsControls.children("button"),
					          index   = index || self.settings.currentSlide;
					      buttons.removeClass('active');
					      buttons.eq(index).addClass('active');
					    },
					    resizeImages: function(containerWidth)
					    {
					      var self = this;
					      self.w = containerWidth;
					      self.moveSlide();
					      self.$slides.width(containerWidth);
					    },
					    userEvents: {
					      handleDotsControls: function($btn)
					      {
					        var self  = this,
					            dir   = $btn.data("slide-index");
					        self.goToSlide(dir);
					        self.startAutomaticMovement();
					        self.activateButton();
					        self.moveSlide();
					        return self.settings.currentSlide;
					      },
					      handleArrowControls: function($btn)
					      {
					        var self  = this,
					            dir   = $btn.data("dir");
					        self.goToSlide(dir);
					        self.startAutomaticMovement();
					        self.activateButton();
					        self.moveSlide();
					        return self.settings.currentSlide;
					      },
					      resizeWindow: function()
					      {
					        var self  = this,
					            w     = self.$context.innerWidth();
					        self.resizeImages(w);
					        self.fixSlideHeight();
					        self.removeAnimations();
					      }
					    },
					    fixSlideHeight: function()
					    {
					      var self      = this,
					          numSlide  = self.settings.currentSlide,
					          $slide    = self.$slides.eq(numSlide),
					          $image    = $slide.find(".rSlider--image_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>"),
					          h         = self.settings.height,
					          minH      = self.settings.minHeight;
					      if( h < minH ) h = minH;
					      if( h > self.$context.outerHeight() ) h = h;
					      self.$slides.height(h);
					      $slide.height(h);
					      return h;
					    },
					    removeAnimations: function()
					    {
					      var self = this,
					          className = "css-transitions";
					      self.$context.removeClass(className);
					      clearTimeout(self.resizeTimer);
					      self.resizeTimer = setTimeout(self.setAnimations.bind(self), 500);
					    },
					    setAnimations: function()
					    {
					      var self = this,
					          className = "css-transitions";
					      if(!self.settings.transitions) return;
					      self.$context.addClass(className);
					    },
					    events: function()
					    {
					      var self = this;
					      self.$dotsControls.on("click", "button", function()
					      {
					        var $btn = jQuery(this);
					        self.userEvents.handleDotsControls.call(self, $btn);
					      });
					      self.$arrowControls.on("click", "span", function()
					      {
					        var $btn = jQuery(this).children("button");
					        self.userEvents.handleArrowControls.call(self, $btn);
					      });
					      jQuery(window).on("resize", self.userEvents.resizeWindow.bind(self));
					      self.$context.on( "mouseover", self.stopAutomaticMovement.bind(self) );
					      self.$context.on( "mouseleave", self.startAutomaticMovement.bind(self));
					    }
					  };
					  jQuery.extend(Plugin.prototype, pluginProto);
					  jQuery.fn[pluginName] = function(options)
					  {
					    return jQuery.each(jQuery(this), function()
					    {
					      return new Plugin( this, options);
					    });
					  };
					  jQuery(".rSlider_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>").rSlider();
					}());
					jQuery(document).ready(function(){
						var RW_DSL_H_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> = jQuery('.RW_DSL_H_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>').val();
						jQuery('.rSlider--image_RW').css("width","0px");
						function resp(){
							jQuery('.rSlider--container_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>').css('height',RW_DSL_H_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>*jQuery('.rSlider--container_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>').width()/(jQuery('.rSlider--container_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>').width()+150))
							jQuery('.rSlider_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>').css('height',RW_DSL_H_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>*jQuery('.rSlider--container_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>').width()/(jQuery('.rSlider--container_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>').width()+150))
							jQuery('.rSlider--bg-color_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>').css('height',RW_DSL_H_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>*jQuery('.rSlider--container_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>').width()/(jQuery('.rSlider--container_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>').width()+150))
							jQuery('.rSlider--image_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>').css('height',RW_DSL_H_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>*jQuery('.rSlider--container_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>').width()/(jQuery('.rSlider--container_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>').width()+150))
							jQuery('.rSlider--view_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>').css('height',RW_DSL_H_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>*jQuery('.rSlider--container_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>').width()/(jQuery('.rSlider--container_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>').width()+150))
							jQuery('.rSlider--slide_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>').css('height',RW_DSL_H_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>*jQuery('.rSlider--container_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>').width()/(jQuery('.rSlider--container_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>').width()+150))
							jQuery('.rSlider--container_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>').css('height',RW_DSL_H_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>*jQuery('.rSlider--container_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>').width()/(jQuery('.rSlider--container_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>').width()+150))
							jQuery('.rSlider--dots-controls_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>').css('padding',20*jQuery('.rSlider--container_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>').width()/(jQuery('.rSlider--container_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>').width()+150)+'px')
							if(jQuery('.rSlider_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>').width()<=350){
								jQuery(".rSlider_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> .slide-styled_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> a").css("display","none");
								jQuery('.rSlider--image_RW').css("width","100%");
								jQuery('.rSlider--image_RW').css("cursor","pointer");
							}else{
								jQuery(".rSlider_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> .slide-styled_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> a").css("display","inline-block");
									jQuery('.rSlider--image_RW').css("width","0px");
									jQuery('.rSlider--image_RW').css("cursor","default");
							}
						}
						jQuery('.rSlider--image_RW').each(function(){
							jQuery(this).click(function(){
								//if(jQuery('.rSlider_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>').width()<=450){
									if(jQuery(this).attr('name') != ''){
										if(jQuery(this).attr('alt')=="checked"){
											window.open(jQuery(this).attr('name'), '_blank');
										}else{
											window.open(jQuery(this).attr('name'),"_self")
										}
										
									}
								//}
								
								
								
							})
						})
						setTimeout (function(){
							resp();
						},100)
						jQuery(window).load(function(){
							resp();
						})
						jQuery(window).resize(function(){
							resp();
						})
					})
  				</script>
				
  			<?php }else if($Rich_Web_Slider_Effects[0]->slider_type=='Thumbnails Slider & Lightbox'){ ?>
				

				<style type="text/css">
					#RichWeb_TSL_slider {
					  list-style: none;
					}
					#cboxPhoto { width: 100%; height: 100%; margin: 0 !important; }
					div.anythingControls {
					  bottom: 25px; /* thumbnail images are larger than the original bullets; move it up */
					}
					.anythingSlider-metallic .thumbNav a {
					  background-image: url();
					  height: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_TSL_Nav_H;?>px;
					  width: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_TSL_Nav_W;?>px;
					  margin: 0 <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_TSL_Nav_PB;?>px;
					  border: 1px solid <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_TSL_Nav_BC;?>;
					  border-radius: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_TSL_Nav_BR;?>px;
					  -moz-border-radius: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_TSL_Nav_BR;?>px;
					  -webkit-border-radius: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_TSL_Nav_BR;?>px;
					  text-indent: 0;
					}
					.anythingSlider-metallic .anythingControls span img
					{
						width: 100%;
						height: 100%;
						border-radius: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_TSL_Nav_BR;?>px;
					    -moz-border-radius: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_TSL_Nav_BR;?>px;
					    -webkit-border-radius: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_TSL_Nav_BR;?>px;
					    filter:none !important;
					    box-shadow:none !important;
					}
					.anythingSlider-metallic .anythingControls 
					{
						height: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_TSL_Nav_H;?>px;
						<?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_TSL_Nav_Pos;?>: 15px;
					}
					.anythingSlider-metallic .thumbNav a span {
					  	visibility: visible; 
					}
					.anythingSlider-metallic .thumbNav a:hover
					{
					  	border-color: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_TSL_Nav_HBC;?>;
					}
					.anythingSlider-metallic .thumbNav a.cur 
					{
					 	border-color: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_TSL_Nav_CBC;?>;
					}
					.anythingWindow ul li:before, .anythingControls ul li:before
					{
						content: '' !important;
					}
					.anythingSlider{
						border: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_TSL_BW;?>px <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_TSL_BS;?> <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_TSL_BC;?>;
						border-radius: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_TSL_BR;?>px;
						margin:25px auto !important;
						<?php if($Rich_Web_Slider_Effect[0]->Rich_Web_Sl_TSL_BoxShShow=='true'){ ?>
    						<?php if($Rich_Web_Slider_Effect[0]->Rich_Web_Sl_TSL_BoxShType=='true'){ ?> 
    							-webkit-box-shadow: 0px 0px 20px <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_TSL_BoxSh;?>px <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_TSL_BoxShC;?>;
                                -moz-box-shadow: 0px 0px 20px <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_TSL_BoxSh;?>px <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_TSL_BoxShC;?>;
    							box-shadow: 0px 0px 20px <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_TSL_BoxSh;?>px <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_TSL_BoxShC;?>;
    						<?php }else{ ?>
    							-webkit-box-shadow: 0 <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_TSL_BoxSh;?>px 50px -10px <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_TSL_BoxShC;?>;
    							-moz-box-shadow: 0 <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_TSL_BoxSh;?>px 50px -10px <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_TSL_BoxShC;?>;
    							box-shadow: 0 <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_TSL_BoxSh;?>px 50px -10px <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_TSL_BoxShC;?>;
    						<?php }?>
    					<?php }?>
					}
					.anythingSlider-metallic .anythingWindow 
					{
						
						
					}
					.anythingSlider-metallic .anythingControls .start-stop 
					{
						display: inline-block;
						width: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_TSL_SS_W;?>px;
						height: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_TSL_SS_H;?>px;
						margin: 0 <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_TSL_Nav_PB;?>px;
						border: 1px solid <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_TSL_SS_BC;?>;
						border-radius: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_TSL_SS_BR;?>px;
						padding: 0;
						text-align: center;
						text-decoration: none;
						z-index: 100;
						outline: 0;
					}
					.anythingSlider-metallic.activeSlider .anythingControls a.start-stop 
					{
						background: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_TSL_SS_StC;?>;
					}
					.anythingSlider-metallic.activeSlider .anythingControls a.start-stop.playing {
						background: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_TSL_SS_SpC;?>;
					}
					.anythingSlider-metallic .arrow
					{
						background-color: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_TSL_Arr_C;?>;
					}
					.anythingSlider-metallic .arrow a
					{
						height: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_TSL_Arr_S;?>px;
						width: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_TSL_Arr_S;?>px;
						border:none !important;
						box-shadow:none !important;
					}
					.anythingSlider-metallic .back a 
					{ 
						background: url("<?php echo plugins_url('/Images/icon-'. $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_TSL_Arr_Type . '.png',__FILE__)?>") no-repeat center center;
						background-size:100% 100%;
					}
					.anythingSlider-metallic .forward a
					{
						background: url("<?php echo plugins_url('/Images/icon-'. $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_TSL_Arr_Type .'-'. $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_TSL_Arr_Type .'.png',__FILE__)?>") no-repeat center center;
						background-size:100% 100%;

					}
					.anythingSlider-metallic .back 
					{ 
						left: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_TSL_BW;?>px; 
					}
					.anythingSlider-metallic .forward 
					{ 
						right: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_TSL_BW;?>px; 
					}
					#cboxOverlay
					{
						background: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_TSL_Pop_OvC;?>;
					}
					#cboxContent
					{
						background: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_TSL_Pop_BgC;?>; 
						overflow:hidden;
						border: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_TSL_Pop_BW;?>px <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_TSL_Pop_BS;?> <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_TSL_Pop_BC;?>;
						border-radius: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_TSL_Pop_BR;?>px;
					}
					#cboxTitle, #cboxCurrent
					{
						font-size: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_TSL_TFS;?>px;
						font-family: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_TSL_TFF;?>;
						color: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_TSL_TC;?>;
					}
					#cboxPrevious, #cboxNext
					{
						font-size: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_TSL_Pop_ArrS;?>px;
						color: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_TSL_Pop_ArrC;?>;
					}
					#cboxClose
					{
						font-size: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_TSL_CIS;?>px;
						color: <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_TSL_CIC;?>;
					}
					
					#RichWeb_TSL_slider{
						margin-left:0px !important;
					}
					
					
					@media screen and (max-width:700px){
						.anythingSlider-metallic .anythingControls ul a, .anythingSlider-metallic .forward a, .anythingSlider-metallic .back a{
							cursor:default !important;
						}
						#cboxNext, #cboxPrevious, #cboxClose{
							cursor:default !important;
						}
					}
				</style>

				<ul id="RichWeb_TSL_slider" style='opacity:1;'>
					<?php for($i=0;$i<count($Rich_Web_Slider_Images);$i++){ ?>
				  		<li style='padding:0px;background:none;'><img class='contImgWidth' src="<?php echo $Rich_Web_Slider_Images[$i]->Sl_Img_Url;?>" title="<?php echo html_entity_decode($Rich_Web_Slider_Images[$i]->SL_Img_Title);?>"></li>
			    	<?php }?>
				</ul>
				<input type='text' style='display:none;' class='slWresp' value='<?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_TSL_W;?>'>
				<input type='text' style='display:none;' class='slHresp' value='<?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_TSL_H;?>'>
				<input type='text' style='display:none;' class='countImgs' value='<?php echo count($Rich_Web_Slider_Images);?>'>
				<input type='text' style='display:none;' class='arrW' value='<?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_TSL_Arr_S;?>'>
				<input type='text' style='display:none;' class='imgSmW' value='<?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_TSL_Nav_W;?>'>
				<input type='text' style='display:none;' class='imgSmH' value='<?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_TSL_Nav_H;?>'>
				<input type='text' style='display:none;' class='autPLW' value='<?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_TSL_SS_W;?>'>
				<input type='text' style='display:none;' class='autPLH' value='<?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_TSL_SS_H;?>'>
				<input type='text' style='display:none;' class='slShType' value='<?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_TSL_CM;?>'>
				<script type="text/javascript">
					jQuery(function(){
						var Rich_Web_Thumb_Photos=new Array();
						<?php for($i=0;$i<count($Rich_Web_Slider_Images);$i++){ ?>
							Rich_Web_Thumb_Photos[<?php echo $i;?>]="<?php echo $Rich_Web_Slider_Images[$i]->Sl_Img_Url; ?>";
						<?php }?>
					 jQuery('#RichWeb_TSL_slider')
					  .anythingSlider({
					   theme           : 'metallic',
					   mode            : "<?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_TSL_CM;?>",
					   toggleArrows    : <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_TSL_TA;?>,
					   autoPlay        : <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_TSL_AP;?>,
					   pauseOnHover    : <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_TSL_PH;?>,
					   stopAtEnd       : <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_TSL_Loop;?>,
					   delay           : <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_TSL_PT*1000;?>,
					   animationTime   : <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_TSL_CS;?>,
					   buildArrows     : <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_TSL_Arr_Show;?>,
					   buildNavigation : <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_TSL_Nav_Show;?>,
					   buildStartStop  : <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_TSL_SS_Show;?>,
					   navigationFormatter : function(i, panel){ // add thumbnails as navigation links
					    return '<img src="'+Rich_Web_Thumb_Photos[i-1]+'">';
					   }
					  })
					  // target all images inside the current slider
					  // replace with 'img.someclass' to target specific images
					  .find('.panel:not(.cloned) img') // ignore the cloned panels
					   .attr('rel','group')            // add all slider images to a colorbox group
					   .colorbox({
					     width: '80%',
					     height: '70%',
					     previous: "<i class='rich_web rich_web-<?php echo  $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_TSL_Pop_ArrType;?>-left'></i>",
						 next: "<i class='rich_web rich_web-<?php echo  $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_TSL_Pop_ArrType;?>-right'></i>",
						 close: "<i class='rich_web rich_web-<?php echo  $Rich_Web_Slider_Effect[0]->Rich_Web_Sl_TSL_CIT;?>'></i>",
					     href: function(){ return jQuery(this).attr('src'); },
					     // use $(this).attr('title') for specific image captions
					     title: function(){ return jQuery(this).attr('title'); },
					     rel: 'group'
					   });
					});
				</script>
				<script type='text/javascript'>
					jQuery(document).ready(function(){
						var slWresp = jQuery('.slWresp').val();
						var slHresp = jQuery('.slHresp').val();
						var countImgs = jQuery('.countImgs').val();
						var arrW = jQuery('.arrW').val(); 
						var imgSmW = jQuery('.imgSmW').val(); 
						var imgSmH = jQuery('.imgSmH').val(); 
						var autPLW = jQuery('.autPLW').val(); 
						var autPLH = jQuery('.autPLH').val();
						var slShType = 	jQuery('.slShType').val();				
						jQuery('.arrow').click(function(){
							resp();
						})
						function resp(){
							if(jQuery('.anythingSlider').parent().width()<=400 && slShType!='horizontal'){
								jQuery('.anythingSlider').css('min-width','100%');
							}else{
								jQuery('.anythingSlider').css('min-width',slWresp*jQuery('.anythingSlider').parent().width()/1000);
							}
							
							jQuery('.anythingSlider').css('max-width',slWresp*jQuery('.anythingSlider').parent().width()/1000);
							jQuery('.anythingSlider').css('min-height',jQuery('.anythingSlider').width()*slHresp/slWresp);
							jQuery('.anythingSlider').css('max-height',jQuery('.anythingSlider').width()*slHresp/slWresp);
							if(slShType=='fade'){
								jQuery('.anythingSlider .panel').css('height',jQuery('.anythingSlider').width()*slHresp/slWresp);
								jQuery('.anythingSlider .panel').css('max-height',jQuery('.anythingSlider').width()*slHresp/slWresp);
								jQuery('.anythingSlider .panel').css('width',jQuery('.anythingSlider').css('width'));
								jQuery('.anythingSlider .panel').css('max-width',jQuery('.anythingSlider').css('width'));
							}else if(slShType=='vertical'){
								jQuery('.anythingSlider .panel').css('min-width',jQuery('.anythingSlider').css('width'));
							}
							jQuery('.contImgWidth').css('max-width',jQuery('.anythingSlider').css('width'));
							jQuery('.contImgWidth').css('max-height',jQuery('.anythingSlider').width()*slHresp/slWresp);
							
							// jQuery('#RichWeb_TSL_slider').css('height',countImgs*jQuery('.anythingSlider .panel').width());
							// jQuery('#RichWeb_TSL_slider').css('width',jQuery('.boxed-layout img').css('max-width'));
							jQuery('.anythingSlider-metallic .thumbNav a').css('width',imgSmW*jQuery('.anythingSlider').parent().width()/1000)
							jQuery('.anythingSlider-metallic .thumbNav a').css('height',imgSmH*jQuery('.anythingSlider').parent().width()/1000);
							jQuery('.anythingSlider-metallic .thumbNav a span').css('width',imgSmW*jQuery('.anythingSlider').parent().width()/1000)
							jQuery('.anythingSlider-metallic .thumbNav a span').css('height',imgSmH*jQuery('.anythingSlider').parent().width()/1000);
							jQuery('.anythingSlider-metallic .anythingControls').css('height',imgSmH*jQuery('.anythingSlider').parent().width()/1000+5);
							jQuery('.anythingSlider-metallic .anythingControls').css('min-height','23px');
							if(jQuery('.anythingSlider').width()<=300){
								jQuery('.anythingSlider-metallic .anythingControls').css('bottom','5px')
							}else{
								jQuery('.anythingSlider-metallic .anythingControls').css('bottom','15px')
							}
							jQuery('.anythingSlider-metallic .arrow a').css('width',arrW*jQuery('.anythingSlider').parent().width()/1000);
							jQuery('.anythingSlider-metallic .arrow a').css('height',arrW*jQuery('.anythingSlider').parent().width()/1000);
							jQuery('.anythingSlider-metallic .anythingControls .start-stop').css('width',autPLW*jQuery('.anythingSlider').parent().width()/(jQuery('.anythingSlider').parent().width()+100));
							jQuery('.anythingSlider-metallic .anythingControls .start-stop').css('height',autPLH*jQuery('.anythingSlider').parent().width()/(jQuery('.anythingSlider').parent().width()+100))
						}

						jQuery(window).load(function(){
							resp();
						})
						jQuery(window).resize(function(){
							resp();
						})
					})
				</script>
				<script src="<?php echo plugins_url('/Scripts/jquery.easing.1.2.js',__FILE__);?>"></script>
				<script src="<?php echo plugins_url('/Scripts/jquery.anythingslider.min.js',__FILE__);?>"></script>
				<script src="<?php echo plugins_url('/Scripts/jquery.colorbox-min.js',__FILE__);?>"></script>
				
 		 	<?php }
			else if($Rich_Web_Slider_Effects[0]->slider_type=='Accordion Slider'){ ?>
				
				<style>
					.Tot_Accord_Link_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>{
						position: absolute;
						top: 50%;
						overflow: hidden;
						text-align: center;
						background: rgba(221,51,51,0.42);
						line-height: 20px;
						font-size: 18px;
						-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
						filter: alpha(opacity=0);
						opacity: 0;
						text-decoration:none;
						letter-spacing: 4px;
						font-weight: 700;
						padding:20px;
						max-width:100%;
						box-sizing:border-box;
						left:50%;
						color: #fff;
						text-shadow: 1px 1px 1px rgba(0,0,0,0.1);
						transform:translateY(-50%) translateX(-50%);
						-webkit-transform:translateY(-50%) translateX(-50%);
						-ms-transform:translateY(-50%) translateX(-50%);
					}


					.Tot_Accord_Link_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>:hpver{
						color:<?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_AcSL_Link_C;?> !important;
					}
					.ia-container_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> {
						position:relative;
						height:400px;
						margin: 20px auto;
						overflow: hidden;
						box-shadow: 1px 1px 4px rgba(0,0,0,0.08);
						border: 7px solid rgba(255,255,255,0.6);
					}
					.ia-container_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> .figure_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> {
						position: absolute;
						top: 0;
						height:100% !important;
						box-shadow: 0 0 0 1px rgba(255,255,255,0.6);
						-webkit-transition: all 0.3s ease-in-out;
						-moz-transition: all 0.3s ease-in-out;
						-o-transition: all 0.3s ease-in-out;
						-ms-transition: all 0.3s ease-in-out;
						transition: all 0.3s ease-in-out;
					}
					.ia-container_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> > .figure_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> {
						position: relative;
						left: 0 !important;
					}
					.ia-container_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> .img_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> {
						display: block;
						width: 100%;
						height:100% !important;
					}
					.ia-container_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> .input_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> {
						position: absolute;
						top: 0;
						left: 0;
						height: 100%;
						cursor: pointer;
						border: 0;
						padding: 0;
						-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
						filter: alpha(opacity=0);
						opacity: 0;
						z-index: 100;
						-webkit-appearance: none;
						-moz-appearance: none;
						appearance: none;
					}
					.ia-container_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> .input_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>:checked{
						width: 5px !important;
						left: auto;
						right: 0px;
					}
					.ia-container_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> .input_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>:checked ~ .figure_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> {
						-webkit-transition: all 0.7s ease-in-out;
						-moz-transition: all 0.7s ease-in-out;
						-o-transition: all 0.7s ease-in-out;
						-ms-transition: all 0.7s ease-in-out;
						transition: all 0.7s ease-in-out;
						left: 100% !important;
					}
					.ia-container_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> .figcaption_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> {
						width: 100%;
						height: 100%;
						background: rgba(87, 73, 81, 0.1);
						position: absolute;
						top: 0px;
						-webkit-transition: all 0.2s ease-in-out;
						-moz-transition: all 0.2s ease-in-out;
						-o-transition: all 0.2s ease-in-out;
						-ms-transition: all 0.2s ease-in-out;
						transition: all 0.2s ease-in-out;
					}
					.ia-container_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> .figcaption_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> .span_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> {
						position: absolute;
						top: 40%;
						overflow: hidden;
						text-align: center;
						background: rgba(87, 73, 81, 0.3);
						line-height: 20px;
						font-size: 18px;
						-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
						filter: alpha(opacity=0);
						opacity: 0;
						letter-spacing: 4px;
						font-weight: 700;
						box-sizing:border-box;
						padding:20px;
						max-width:100%;
						left:50%;
						color: #fff;
						text-shadow: 1px 1px 1px rgba(0,0,0,0.1);
						transform:translateY(-50%) translateX(-50%);
						-webkit-transform:translateY(-50%) translateX(-50%);
						-ms-transform:translateY(-50%) translateX(-50%);
					}
					.ia-container_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> .input_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>:checked + .figcaption_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>,
					.ia-container_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> .input_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>:checked:hover + .figcaption_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>{
						background: rgba(87, 73, 81, 0);
					}
					.ia-container_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> .input_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>:checked + .figcaption_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> .span_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> {
						-webkit-transition: all 0.4s ease-in-out 0.5s;
						-moz-transition: all 0.4s ease-in-out 0.5s;
						-o-transition: all 0.4s ease-in-out 0.5s;
						-ms-transition: all 0.4s ease-in-out 0.5s;
						transition: all 0.4s ease-in-out 0.5s;
						-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=99)";
						filter: alpha(opacity=99);
						opacity: 1;
						top: 50%;
					}
					.ia-container_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> .input_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>:checked + .figcaption_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> a {
						-webkit-transition: all 0.4s ease-in-out 0.5s;
						-moz-transition: all 0.4s ease-in-out 0.5s;
						-o-transition: all 0.4s ease-in-out 0.5s;
						-ms-transition: all 0.4s ease-in-out 0.5s;
						transition: all 0.4s ease-in-out 0.5s;
						-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=99)";
						filter: alpha(opacity=99);
						opacity: 1;
						top: 80%;
					}
					.ia-container_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> #ia-selector-last:checked + .figcaption_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> .span_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> {
						-webkit-transition-delay: 0.3s;
						-moz-transition-delay: 0.3s;
						-o-transition-delay: 0.3s;
						-ms-transition-delay: 0.3s;
						transition-delay: 0.3s;
					}
					.ia-container_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> .input_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>:hover + .figcaption_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> {
						background: rgba(87, 73, 81, 0.03);
					}
					.ia-container_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> .input_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>:checked ~ .figure_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> .input_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>{
						z-index: 1;
					}	
					.figure_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> {
						margin: 0;
						-webkit-margin-before: 0;
						-webkit-margin-after: 0;
						-webkit-margin-start: 0;
						-webkit-margin-end: 0;
					}
				</style>
				<section class="main">
					<div class="ia-container_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>" style='border:<?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_AcSL_BW;?>px <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_AcSL_BS;?> <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_AcSL_BC;?>;box-shadow:0px 0px <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_AcSL_BSh;?>px <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_AcSL_BShC;?>;'>
					<?php for($i=0;$i<count($Rich_Web_Slider_Images);$i++){ ?>
						<figure class='figure_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>' style='box-shadow:0px 0px 0px <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_AcSL_Img_BSh;?>px <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_AcSL_Img_BShC;?>'>
							<img class='img_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>'  src="<?php echo $Rich_Web_Slider_Images[$i]->Sl_Img_Url;?>" />
							<input class='input_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>' type="radio" name="radio-set_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>" checked="checked"/>
							<figcaption class='figcaption_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>'>
								<?php if($Rich_Web_Slider_Images[$i]->SL_Img_Title!=''){ ?>
								<span class='span_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>' style='font-family:<?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_AcSL_Title_FF;?>;color:<?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_AcSL_Title_C;?>;text-shadow:<?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_AcSL_Title_TSh;?>px <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_AcSL_Title_TSh;?>px <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_AcSL_Title_TSh;?>px <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_AcSL_Title_TShC;?>;background:<?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_AcSL_Title_BgC;?>'>
									<?php echo html_entity_decode($Rich_Web_Slider_Images[$i]->SL_Img_Title);?>
								</span>
								<?php } ?>
								<?php if($Rich_Web_Slider_Images[$i]->Sl_Link_Url!=''){ ?>
								<a style='font-family:<?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_AcSL_Link_FF;?>;color:<?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_AcSL_Link_C;?>;text-shadow:<?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_AcSL_Link_TSh;?>px <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_AcSL_Link_TSh;?>px <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_AcSL_Link_TSh;?>px <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_AcSL_Link_TShC;?>;background:<?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_AcSL_Link_BgC;?>' href='<?php echo $Rich_Web_Slider_Images[$i]->Sl_Link_Url;?>' target='<?php if($Rich_Web_Slider_Images[$i]->Sl_Link_NewTab=='checked'){ echo '_blank';}?>' class='Tot_Accord_Link_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>'>
									<?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_AcSL_Link_Text;?>
								</a>
								<?php } ?>
							</figcaption>
						<?php } ?>
					<?php for($i=0;$i<count($Rich_Web_Slider_Images);$i++){ ?>
						</figure>
					<?php } ?>
					</div>
				</section>
				<input type='text' style='display:none;' class='Rich_Web_AccordSl_Width_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>' value='<?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_AcSL_W;?>'>
				<input type='text' style='display:none;' class='Rich_Web_AccordSl_Height_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>' value='<?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_AcSL_H;?>'>
				<input type='text' style='display:none;' class='Rich_Web_AccordSl_ImgW_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>' value='<?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_AcSL_Img_W;?>'>
				<input type='text' style='display:none;' class='Rich_Web_AccordSl_TitleFS_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>' value='<?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_AcSL_Title_FS;?>'>
				<input type='text' style='display:none;' class='Rich_Web_AccordSl_LinkFS_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>' value='<?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_AcSL_Link_FS;?>'>
				<script>
				jQuery(document).ready(function(){
					
					var Rich_Web_AccordSl_Width_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>=jQuery('.Rich_Web_AccordSl_Width_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>').val();
					var Rich_Web_AccordSl_Height_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>=jQuery('.Rich_Web_AccordSl_Height_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>').val();
					var Rich_Web_AccordSl_ImgW_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>=jQuery('.Rich_Web_AccordSl_ImgW_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>').val();
					var Rich_Web_AccordSl_TitleFS_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>=jQuery('.Rich_Web_AccordSl_TitleFS_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>').val();
					var Rich_Web_AccordSl_LinkFS_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>=jQuery('.Rich_Web_AccordSl_LinkFS_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>').val();
					
					var array_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>=[];
					jQuery('.ia-container_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> .figure_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>').each(function(){
						array_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>.push(jQuery(this));
					})
					console.log(array_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>);
					function resp(){
						jQuery('.ia-container_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>').css('width',Rich_Web_AccordSl_Width_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>*jQuery('.ia-container_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>').parent().width()/1000);
						jQuery('.ia-container_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>').css('height',Rich_Web_AccordSl_Height_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>*jQuery('.ia-container_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>').parent().width()/1000);
						jQuery('.ia-container_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> .figure_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>').css('width',Rich_Web_AccordSl_ImgW_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>*jQuery('.ia-container_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>').width()/1000);
						jQuery('.ia-container_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> .figure_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>').css('left',(jQuery('.ia-container_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>').width()-jQuery('.ia-container_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> .figure_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>').width())/(array_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>.length-1));
						jQuery('.ia-container_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> .input_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>').css('width',(jQuery('.ia-container_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>').width()-jQuery('.ia-container_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> .figure_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>').width())/(array_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>.length-1));
						jQuery('.ia-container_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> .figcaption_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> .span_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>').css('font-size',Rich_Web_AccordSl_TitleFS_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>*jQuery('.ia-container_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>').parent().width()/1000)
						jQuery('.ia-container_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> .figcaption_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> .span_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>').css('line-height',Rich_Web_AccordSl_TitleFS_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>*jQuery('.ia-container_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>').parent().width()/1000+2+'px')
						jQuery('.ia-container_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> .figcaption_<?php echo $Rich_Web_Slider_Manager[0]->id; ?> .span_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>').css('padding',15*jQuery('.ia-container_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>').parent().width()/1000+'px')
						jQuery('.Tot_Accord_Link_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>').css('font-size',Rich_Web_AccordSl_LinkFS_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>*jQuery('.ia-container_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>').parent().width()/1000)
						jQuery('.Tot_Accord_Link_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>').css('line-height',Rich_Web_AccordSl_LinkFS_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>*jQuery('.ia-container_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>').parent().width()/1000+2+'px')
						jQuery('.Tot_Accord_Link_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>').css('padding',15*jQuery('.ia-container_<?php echo $Rich_Web_Slider_Manager[0]->id; ?>').parent().width()/1000+'px')
					}
					jQuery(window).resize(function(){
						resp();
					})
					resp();
				})
			</script>
			<?php }else if($Rich_Web_Slider_Effects[0]->slider_type=='Animation Slider'){ ?>
			<link rel="stylesheet" href="<?php echo plugins_url('/Style/animateSlSVG.css',__FILE__);?>">
			<style>
				#RW_Load_Content<?php echo $Rich_Web_Slider; ?>{
					position:absolute;
					top:0px;
					left:0px;
					background-color:<?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_AnSL_L_BgC;?> !important;
					z-index:999;
					width:100%;
					height:100%;
				}
				.RW_Loader_Frame{
					position:relative;
					top:45%;
					left:50%;
					width:80px;
					height:80px;
					transform:translateY(-50%) translateX(-50%);
					-webkit-transform:translateY(-50%) translateX(-50%);
					-ms-transform:translateY(-50%) translateX(-50%);
					-moz-transform:translateY(-50%) translateX(-50%);
					-o-transform:translateY(-50%) translateX(-50%);
				}
				.RW_Loader_Text<?php echo $Rich_Web_Slider; ?>{
					position:relative;
					text-align:center;
					top:45%;
					font-size:<?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_AnSL_L_FS;?>px !important;
					font-family:<?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_AnSL_L_FF;?> !important;
					color:<?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_AnSL_L_C;?> !important;
					transform:translateY(-100%);
					-webkit-transform:translateY(-100%);
					-ms-transform:translateY(-100%);
					-moz-transform:translateY(-100%);
					-o-transform:translateY(-100%);
				}
				.loader1,.loader2,.loader3,.loader4{
					position:absolute;
					border:5px solid transparent;
					border-radius:50%;
				}
				.loader1<?php echo $Rich_Web_Slider; ?>{
					border-top:5px solid <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_AnSL_L1_T;?> !important;
					border-bottom:5px solid <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_AnSL_L1_T;?> !important;
					box-sizing:border-box;
					-webkit-box-sizing:border-box;
					-ms-box-sizing:border-box;
					-moz-box-sizing:border-box;
					-o-box-sizing:border-box;
				}
				.loader2<?php echo $Rich_Web_Slider; ?>{
					border-left:5px solid <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_AnSL_L2_T;?> !important;
					border-right:5px solid <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_AnSL_L2_T;?> !important;
					-webkit-box-sizing:border-box;
					-ms-box-sizing:border-box;
					-moz-box-sizing:border-box;
					-o-box-sizing:border-box;
					top:50%;
					left:50%;
					transform:translateY(-50%) translateX(-50%);
					-webkit-transform:translateY(-50%) translateX(-50%);
					-ms-transform:translateY(-50%) translateX(-50%);
					-moz-transform:translateY(-50%) translateX(-50%);
					-o-transform:translateY(-50%) translateX(-50%);	
				}
				.loader3<?php echo $Rich_Web_Slider; ?>{
					width:60%;
					height:60%;
					border-top:25px solid <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_AnSL_L3_T;?> !important;
					border-bottom:25px solid <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_AnSL_L3_T;?> !important;
					border-right:25px solid <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_AnSL_L3_T;?> !important;
					top:50%;
					left:50%;
					box-sizing:border-box;
					-webkit-box-sizing:border-box;
					-ms-box-sizing:border-box;
					-moz-box-sizing:border-box;
					-o-box-sizing:border-box;
					transform:translateY(-50%) translateX(-50%);
					-webkit-transform:translateY(-50%) translateX(-50%);
					-ms-transform:translateY(-50%) translateX(-50%);
					-moz-transform:translateY(-50%) translateX(-50%);
					-o-transform:translateY(-50%) translateX(-50%);
					animation:clockLoadingmin 1s linear 500;
					-webkit-animation:clockLoadingmin 1s linear 500;
					-ms-animation:clockLoadingmin 1s linear 500;
					-moz-animation:clockLoadingmin 1s linear 500;
					-o-animation:clockLoadingmin 1s linear 500;
				}
				.loader1{
					width:100%;
					height:100%;
					animation:clockLoading 1s linear 500;
					-webkit-animation:clockLoading 1s linear 500;
					-ms-animation:clockLoading 1s linear 500;
					-moz-animation:clockLoading 1s linear 500;
					-o-animation:clockLoading 1s linear 500;
				}
				.loader2{
					width:80%;
					height:80%;
					animation:anticlockLoading 1s linear 500;
					-webkit-animation:anticlockLoading 1s linear 500;
					-ms-animation:anticlockLoading 1s linear 500;
					-moz-animation:anticlockLoading 1s linear 500;
					-o-animation:anticlockLoading 1s linear 500;
				}
				@keyframes clockLoading{
					from{transform:rotate(0deg);-webkit-transform:-webkit-rotate(0deg);-ms-transform:rotate(0deg);-moz-transform:rotate(0deg);-o-transform:rotate(0deg);}
					to{transform:rotate(360deg);-webkit-transform:-webkit-rotate(360deg);-ms-transform:rotate(360deg);-moz-transform:rotate(360deg);-o-transform:rotate(360deg);}
				}
				@keyframes anticlockLoading{
					from{transform:translateY(-50%) translateX(-50%) rotate(0deg);-webkit-transform:-webkit-translateY(-50%) -webkit-translateX(-50%) -webkit-rotate(0deg);-ms-transform:translateY(-50%) translateX(-50%) rotate(0deg);-moz-transform:translateY(-50%) translateX(-50%) rotate(0deg);-o-transform:translateY(-50%) translateX(-50%) rotate(0deg);}
					to{transform:translateY(-50%) translateX(-50%) rotate(-360deg);-webkit-transform:-webkit-translateY(-50%) -webkit-translateX(-50%) -webkit-rotate(-360deg);-ms-transform:translateY(-50%) translateX(-50%) rotate(-360deg);-moz-transform:translateY(-50%) translateX(-50%) rotate(-360deg);-o-transform:translateY(-50%) translateX(-50%) rotate(-360deg);}
				}
				@keyframes clockLoadingmin{
					from{transform:translateY(-50%) translateX(-50%) rotate(0deg);-webkit-transform:-webkit-translateY(-50%) -webkit-translateX(-50%) -webkit-rotate(0deg);-ms-transform:translateY(-50%) translateX(-50%) rotate(0deg);-moz-transform:translateY(-50%) translateX(-50%) rotate(0deg);-o-transform:translateY(-50%) translateX(-50%) rotate(0deg);}
					to{transform:translateY(-50%) translateX(-50%) rotate(360deg);-webkit-transform:-webkit-translateY(-50%) -webkit-translateX(-50%) -webkit-rotate(360deg);-ms-transform:translateY(-50%) translateX(-50%) rotate(360deg);-moz-transform:translateY(-50%) translateX(-50%) rotate(360deg);-o-transform:translateY(-50%) translateX(-50%) rotate(360deg);}
				}

				.cd-slider-wrapper<?php echo $Rich_Web_Slider; ?>{
					width:<?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_AnSL_W;?>px !important;
					border:<?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_AnSL_BW;?>px <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_AnSL_BS;?> <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_AnSL_BC;?> !important;
					border-radius:<?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_AnSL_BR;?>px !important;
					
				}
				<?php if($Rich_Web_Slider_Effect[0]->Rich_Web_AnSL_N_BS=="Type 1"){ ?>
				.cd-slider-wrapper<?php echo $Rich_Web_Slider; ?>{
					box-shadow:0px 0px <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_AnSL_BSh;?>px <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_AnSL_ShC;?> !important;
				}
				<?php }else{?>
				.cd-slider-wrapper<?php echo $Rich_Web_Slider; ?>{
					box-shadow:0px <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_AnSL_BSh;?>px <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_AnSL_BSh;?>px <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_AnSL_ShC;?> !important;
				}
				<?php } ?>
				.RW_Title<?php echo $Rich_Web_Slider; ?>{
					font-size:<?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_AnSL_T_FS;?>px !important;
					font-family:<?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_AnSL_T_FF;?> !important;
					color:<?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_AnSL_T_C;?> !important;
					background-color:<?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_AnSL_T_BgC;?> !important;
					text-align:<?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_AnSL_T_TA;?> !important;
					padding:0px !important;
					height:<?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_AnSL_T_FS*2;?>px;
					line-height:<?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_AnSL_T_FS*2;?>px;
				}
				<?php if($Rich_Web_Slider_Effect[0]->Rich_Web_AnSL_N_Sh == "true"){ ?>
				.cd-slider-controls<?php echo $Rich_Web_Slider; ?>{
					display:block !important;
				}
				<?php }else{ ?>
				.cd-slider-controls<?php echo $Rich_Web_Slider; ?>{
					display:none !important;
				}
				<?php } ?>
				.cd-slider-controls<?php echo $Rich_Web_Slider; ?> a{
					width:<?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_AnSL_N_S;?>px !important;
					height:<?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_AnSL_N_S;?>px !important;
					border:<?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_AnSL_N_BW;?>px solid <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_AnSL_N_BC;?> !important;
					background-color:<?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_AnSL_N_BgC;?> !important;
				}
				.cd-slider-controls<?php echo $Rich_Web_Slider; ?> a:hover{
					background-color:<?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_AnSL_N_HBgC;?> !important;
				}
				.cd-slider-controls<?php echo $Rich_Web_Slider; ?> li.selected a{
					background-color:<?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_AnSL_N_CC;?> !important;
					outline:none !important;
				}
				.cd-slider-controls<?php echo $Rich_Web_Slider; ?> li{
					margin-right:<?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_AnSL_N_M;?>px !important;
				}
				<?php if($Rich_Web_Slider_Effect[0]->Rich_Web_AnSL_Ic_Sh == "true"){ ?>
				.cd-slider-navigation<?php echo $Rich_Web_Slider; ?>{
					display:block !important;
				}
				<?php }else{ ?>
				.cd-slider-navigation<?php echo $Rich_Web_Slider; ?>{
					display:none !important;
				}
				<?php } ?>
				.RW_CL<?php echo $Rich_Web_Slider; ?> {
				  position:relative;
				  display: inline-block;
				  text-decoration:none !important;
				  top:50%;
				  transform:translateY(-50%);
				  -webkit-transform:translateY(-50%) ;
				  -ms-transform:translateY(-50%);
				  -moz-transform:translateY(-50%);
				  -o-transform:translateY(-50%);
				  font-size:<?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_AnSL_Ic_S;?>px !important;
				  height:<?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_AnSL_Ic_S;?>px !important;
				  color:<?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_AnSL_Ic_C;?> !important;
				  overflow: hidden;
				  white-space: nowrap;
				  opacity:0.7;
				  cursor:pointer;
				  -webkit-transition: -webkit-transform 0.2s;
				  -moz-transition: -moz-transform 0.2s;
				  transition: transform 0.2s;
				}
				.RW_CL<?php echo $Rich_Web_Slider; ?>:hover{
					opacity:1;
				}
				.RW_CL_N<?php echo $Rich_Web_Slider; ?>{
					margin-right:5px !important;
					float:right;
				}
				.RW_CL_P<?php echo $Rich_Web_Slider; ?>{
					margin-left:5px !important;
					float:left;
				}
				<?php if($Rich_Web_Slider_Effect[0]->Rich_Web_AnSL_T_Sh == "27" || $Rich_Web_Slider_Effect[0]->Rich_Web_AnSL_T_Sh == "28"){ ?>
				.RW_CL_N<?php echo $Rich_Web_Slider; ?>{
					margin-right:0px !important;
				}
				.RW_CL_P<?php echo $Rich_Web_Slider; ?>{
					margin-left:0px !important;
				}
				<?php }else{ ?>
				.RW_CL_N<?php echo $Rich_Web_Slider; ?>{
					margin-right:5px !important;
				}
				.RW_CL_P<?php echo $Rich_Web_Slider; ?>{
					margin-left:5px !important;
				}
				<?php } ?>
				@media screen and (max-width:600px){
					.RW_Title<?php echo $Rich_Web_Slider; ?>{
						font-size:<?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_AnSL_T_FS*3/4;?>px !important;
						font-family:<?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_AnSL_T_FF;?> !important;
						color:<?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_AnSL_T_C;?> !important;
						background-color:<?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_AnSL_T_BgC;?> !important;
						text-align:<?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_AnSL_T_TA;?> !important;
						padding:5px !important;
					}
				}

			</style>
			<div class="cd-slider-wrapper cd-slider-wrapper<?php echo $Rich_Web_Slider; ?>">
				<div id="RW_Load_Content<?php echo $Rich_Web_Slider; ?>">
					<div class="RW_Loader_Frame">
						<div class="loader1 loader1<?php echo $Rich_Web_Slider; ?>" id="loader1"></div>
						<div class="loader2 loader2<?php echo $Rich_Web_Slider; ?>" id="loader2"></div>
						<div class="loader3 loader3<?php echo $Rich_Web_Slider; ?>" id="loader3"></div>
						<div class="loader4" id="loader4"></div>
					</div>
					<div class="RW_Loader_Text<?php echo $Rich_Web_Slider; ?>">
						<?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_AnSL_L_T;?>
					</div>
				</div>
				<ul class="cd-slider" style="display:none;">
					<?php for($i=0;$i<count($Rich_Web_Slider_Images);$i++){ ?>
						<li style="padding:0px;margin:0px;" class="visible RW_Im_An_Sl RW_Im_An_Sl<?php echo $Rich_Web_Slider; ?> RW_Im_An_Sl<?php echo $Rich_Web_Slider; ?><?php echo $i+1; ?>">
							<div class="cd-svg-wrapper">
								<img  class="RW_ANMSL_Image RW_ANMSL_Image<?php echo $Rich_Web_Slider; ?>" src="<?php echo $Rich_Web_Slider_Images[$i]->Sl_Img_Url;?>" />
							</div>
						</li>
						<?php if($Rich_Web_Slider_Images[$i]->SL_Img_Title == ""){ ?>
						<div style="opacity:0" class="RW_Title RW_Title<?php echo $Rich_Web_Slider; ?> RW_Title_Ef<?php echo $Rich_Web_Slider; ?><?php echo $i+1; ?>"><?php echo html_entity_decode($Rich_Web_Slider_Images[$i]->SL_Img_Title);?></div>
						<?php } else { ?>
						<div style="opacity:1" class="RW_Title RW_Title<?php echo $Rich_Web_Slider; ?> RW_Title_Ef<?php echo $Rich_Web_Slider; ?><?php echo $i+1; ?>"><?php echo html_entity_decode($Rich_Web_Slider_Images[$i]->SL_Img_Title);?></div>
						<?php } ?>
					<?php } ?>
					 
				</ul>
				<ul class="cd-slider-navigation cd-slider-navigation<?php echo $Rich_Web_Slider; ?>">
					<?php if($Rich_Web_Slider_Effect[0]->Rich_Web_AnSL_T_ShC=="Icon"){ ?>
					<li style="padding:0px;margin:0px;" class="RW_Right_Anim_Sl"><i class="next-slide RW_CL_N RW_CL_N<?php echo $Rich_Web_Slider; ?> RW_CL RW_CL<?php echo $Rich_Web_Slider; ?> <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_AnSL_Ic_T;?>-right"></i></li>
					<li style="padding:0px;margin:0px;" class="RW_Left_Anim_Sl"><i class="prev-slide RW_CL_P RW_CL_P<?php echo $Rich_Web_Slider; ?> RW_CL RW_CL<?php echo $Rich_Web_Slider; ?> <?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_AnSL_Ic_T;?>-left"></i></li>
					<?php }else{ ?>
					<li style="padding:0px;" class="RW_Right_Anim_Sl"><img src="<?php echo plugins_url('/Images/icon-'. $Rich_Web_Slider_Effect[0]->Rich_Web_AnSL_T_Sh .'-'. $Rich_Web_Slider_Effect[0]->Rich_Web_AnSL_T_Sh .'.png',__FILE__)?>" class="next-slide RW_CL_N RW_CL_N<?php echo $Rich_Web_Slider; ?> RW_CL RW_CL<?php echo $Rich_Web_Slider; ?>"></li>
					<li style="padding:0px;margin:0px;" class="RW_Left_Anim_Sl"><img src="<?php echo plugins_url('/Images/icon-'. $Rich_Web_Slider_Effect[0]->Rich_Web_AnSL_T_Sh .'.png',__FILE__)?>" class="prev-slide RW_CL_P RW_CL_P<?php echo $Rich_Web_Slider; ?> RW_CL RW_CL<?php echo $Rich_Web_Slider; ?>"></li>
					<?php } ?>
				</ul> 
				<div class="cd-slider-controls cd-slider-controls<?php echo $Rich_Web_Slider; ?>" style="display:none;">
				<?php for($i=0;$i<count($Rich_Web_Slider_Images);$i++){ ?>
					<?php if($i==0){ ?>
					<li style="padding:0px;margin:0px;" class="selected"><a class="RW_Thumb<?php echo $Rich_Web_Slider; ?>" href="#0" name="<?php echo $i+1; ?>"><em>Item <?php echo $i+1; ?></em></a></li>
					<?php }else{ ?>
					<li style="padding:0px;margin:0px;"><a class="RW_Thumb<?php echo $Rich_Web_Slider; ?>" href="#0" name="<?php echo $i+1; ?>"><em>Item <?php echo $i+1; ?></em></a></li>
					<?php } ?>
				<?php } ?>
				</div>
			</div>
			<input type="text" style="display:none" class="CountShort<?php echo $Rich_Web_Slider; ?>" value="<?php echo count($Rich_Web_Slider_Images); ?>">
			<input type="text" style="display:none" class="Rich_Web_AnSL_H<?php echo $Rich_Web_Slider; ?>" value="<?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_AnSL_H;?>">
			<input type="text" style="display:none" class="Rich_Web_AnSL_ET<?php echo $Rich_Web_Slider; ?>" value="<?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_AnSL_ET;?>">
			<input type="text" style="display:none" class="Rich_Web_AnSL_SSh<?php echo $Rich_Web_Slider; ?>" value="<?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_AnSL_SSh;?>">
			<input type="text" style="display:none" class="Rich_Web_AnSL_SShChT<?php echo $Rich_Web_Slider; ?>" value="<?php echo $Rich_Web_Slider_Effect[0]->Rich_Web_AnSL_SShChT;?>">
			
			<script>
			var Rich_Web_AnSL_ET<?php echo $Rich_Web_Slider; ?> = parseInt(jQuery(".Rich_Web_AnSL_ET<?php echo $Rich_Web_Slider; ?>").val());
			var Rich_Web_AnSL_SSh<?php echo $Rich_Web_Slider; ?> = jQuery(".Rich_Web_AnSL_SSh<?php echo $Rich_Web_Slider; ?>").val();
			var Rich_Web_AnSL_SShChT<?php echo $Rich_Web_Slider; ?> = parseInt(jQuery(".Rich_Web_AnSL_SShChT<?php echo $Rich_Web_Slider; ?>").val());
			var animateEffect<?php echo $Rich_Web_Slider; ?>=Rich_Web_AnSL_ET<?php echo $Rich_Web_Slider; ?>;
			var CountShort<?php echo $Rich_Web_Slider; ?>=parseInt(jQuery(".CountShort<?php echo $Rich_Web_Slider; ?>").val());
			var count<?php echo $Rich_Web_Slider; ?>=1;
			var y_y<?php echo $Rich_Web_Slider; ?>=false;
			var zIndex<?php echo $Rich_Web_Slider; ?>=0;
			var thumbCount<?php echo $Rich_Web_Slider; ?>=1;
			var anim_over<?php echo $Rich_Web_Slider; ?>=0;
			var array<?php echo $Rich_Web_Slider; ?>=[];
			jQuery(".RW_ANMSL_Image<?php echo $Rich_Web_Slider; ?>").each(function(){
				array<?php echo $Rich_Web_Slider; ?>.push(jQuery(this).attr("src"));
			})
			var y<?php echo $Rich_Web_Slider; ?>=0;
			var Rich_Web_AnSL_H = parseInt(jQuery(".Rich_Web_AnSL_H<?php echo $Rich_Web_Slider; ?>").val());
			function resp<?php echo $Rich_Web_Slider; ?>(){
				jQuery(".cd-slider-wrapper<?php echo $Rich_Web_Slider; ?>").css("height",Rich_Web_AnSL_H*jQuery(".cd-slider-wrapper<?php echo $Rich_Web_Slider; ?>").width()/1000);
			}
	   		jQuery(window).resize(function(){
				resp<?php echo $Rich_Web_Slider; ?>();
			})
			for(i=0;i<array<?php echo $Rich_Web_Slider; ?>.length;i++){
				jQuery("<img class='RW_ANMSL_Image<?php echo $Rich_Web_Slider; ?>' />").attr('src', array<?php echo $Rich_Web_Slider; ?>[i]).on("load",function(){
	   			 	y<?php echo $Rich_Web_Slider; ?>++;
	   			 	if(y<?php echo $Rich_Web_Slider; ?>==array<?php echo $Rich_Web_Slider; ?>.length){
	   			 		jQuery("#RW_Load_Content<?php echo $Rich_Web_Slider; ?>").remove();
						jQuery(".cd-slider").css("display","block");
						jQuery(".cd-slider-navigation<?php echo $Rich_Web_Slider; ?>").css("display","block");
						jQuery(".cd-slider-controls<?php echo $Rich_Web_Slider; ?>").css("display","block");
						jQuery(".RW_Im_An_Sl<?php echo $Rich_Web_Slider; ?>").css("borderRadius","0% 0% 0% 0%");
						jQuery('.RW_Title<?php echo $Rich_Web_Slider; ?>').hide();
						jQuery('.RW_Title_Ef<?php echo $Rich_Web_Slider; ?>1').show();
						
						if(animateEffect<?php echo $Rich_Web_Slider; ?>==1 || animateEffect<?php echo $Rich_Web_Slider; ?>==2 || animateEffect<?php echo $Rich_Web_Slider; ?>==3 || animateEffect<?php echo $Rich_Web_Slider; ?>==4 || animateEffect<?php echo $Rich_Web_Slider; ?>==5){
							anim_over<?php echo $Rich_Web_Slider; ?>=300;
						}else if(animateEffect<?php echo $Rich_Web_Slider; ?>==14){
							anim_over<?php echo $Rich_Web_Slider; ?>=0;
						}else{
							anim_over<?php echo $Rich_Web_Slider; ?>=1000;
						}
						jQuery(".RW_Im_An_Sl<?php echo $Rich_Web_Slider; ?>").addClass("RW_Im_An_Sl_RAnim"+animateEffect<?php echo $Rich_Web_Slider; ?>);
						jQuery(".RW_Im_An_Sl<?php echo $Rich_Web_Slider; ?>1").removeClass("RW_Im_An_Sl_RAnim"+animateEffect<?php echo $Rich_Web_Slider; ?>);
						function nextAnim<?php echo $Rich_Web_Slider; ?>(){
							jQuery(".cd-slider-controls<?php echo $Rich_Web_Slider; ?> li").removeClass("selected");
							jQuery(".cd-slider-controls<?php echo $Rich_Web_Slider; ?> li").eq(count<?php echo $Rich_Web_Slider; ?>-1).addClass("selected");
							if(animateEffect<?php echo $Rich_Web_Slider; ?>==1){
								jQuery(".RW_Im_An_Sl<?php echo $Rich_Web_Slider; ?>"+count<?php echo $Rich_Web_Slider; ?>).css("borderRadius","0% 0% 0% 100%");
							}else if(animateEffect<?php echo $Rich_Web_Slider; ?>==2){
								jQuery(".RW_Im_An_Sl<?php echo $Rich_Web_Slider; ?>"+count<?php echo $Rich_Web_Slider; ?>).css("borderRadius","100% 0% 0% 0%");
							}else if(animateEffect<?php echo $Rich_Web_Slider; ?>==3){
								jQuery(".RW_Im_An_Sl<?php echo $Rich_Web_Slider; ?>"+count<?php echo $Rich_Web_Slider; ?>).css("borderRadius","100% 0% 0% 100%");
							}else if(animateEffect<?php echo $Rich_Web_Slider; ?>==4){
								jQuery(".RW_Im_An_Sl<?php echo $Rich_Web_Slider; ?>"+count<?php echo $Rich_Web_Slider; ?>).css("borderRadius","100% 100% 0% 0%");
							}
							jQuery('.RW_Title_Ef<?php echo $Rich_Web_Slider; ?>'+count<?php echo $Rich_Web_Slider; ?>).slideDown(anim_over<?php echo $Rich_Web_Slider; ?>);
							jQuery('.RW_Im_An_Sl<?php echo $Rich_Web_Slider; ?>'+count<?php echo $Rich_Web_Slider; ?>).css("z-index",zIndex<?php echo $Rich_Web_Slider; ?>);
							jQuery(".cd-slider-navigation<?php echo $Rich_Web_Slider; ?> li").css("z-index",zIndex<?php echo $Rich_Web_Slider; ?>);
							jQuery(".cd-slider-controls<?php echo $Rich_Web_Slider; ?>").css("z-index",zIndex<?php echo $Rich_Web_Slider; ?>);
							jQuery(".RW_Title<?php echo $Rich_Web_Slider; ?>").css("z-index",zIndex<?php echo $Rich_Web_Slider; ?>);
							jQuery('.RW_Im_An_Sl<?php echo $Rich_Web_Slider; ?>'+count<?php echo $Rich_Web_Slider; ?>).removeClass("RW_Im_An_Sl_RAnim"+animateEffect<?php echo $Rich_Web_Slider; ?>);
							jQuery('.RW_Im_An_Sl<?php echo $Rich_Web_Slider; ?>'+count<?php echo $Rich_Web_Slider; ?>).addClass("RW_Im_An_Sl_AddAnim"+animateEffect<?php echo $Rich_Web_Slider; ?>);
							if(animateEffect<?php echo $Rich_Web_Slider; ?>==1 || animateEffect<?php echo $Rich_Web_Slider; ?>==2 || animateEffect<?php echo $Rich_Web_Slider; ?>==3 || animateEffect<?php echo $Rich_Web_Slider; ?>==12 || animateEffect<?php echo $Rich_Web_Slider; ?>==13){
								jQuery(".RW_Im_An_Sl<?php echo $Rich_Web_Slider; ?>").addClass("RW_Im_An_Sl_right");
								jQuery(".RW_Im_An_Sl<?php echo $Rich_Web_Slider; ?>").removeClass("RW_Im_An_Sl_left");
							}
							setTimeout(function(){
								jQuery('.RW_Im_An_Sl<?php echo $Rich_Web_Slider; ?>').removeClass("RW_Im_An_Sl_AddAnim"+animateEffect<?php echo $Rich_Web_Slider; ?>);
								jQuery('.RW_Im_An_Sl<?php echo $Rich_Web_Slider; ?>').addClass("RW_Im_An_Sl_RAnim"+animateEffect<?php echo $Rich_Web_Slider; ?>);
								jQuery('.RW_Im_An_Sl<?php echo $Rich_Web_Slider; ?>'+count<?php echo $Rich_Web_Slider; ?>).removeClass("RW_Im_An_Sl_RAnim"+animateEffect<?php echo $Rich_Web_Slider; ?>);
								jQuery('.RW_Im_An_Sl<?php echo $Rich_Web_Slider; ?>'+count<?php echo $Rich_Web_Slider; ?>).addClass("RW_Im_An_Sl_AddAnim"+animateEffect<?php echo $Rich_Web_Slider; ?>);
							},anim_over<?php echo $Rich_Web_Slider; ?>)	
							thumbCount<?php echo $Rich_Web_Slider; ?>=count<?php echo $Rich_Web_Slider; ?>;		
							y_y<?php echo $Rich_Web_Slider; ?>=true;
							setTimeout(function(){
								y_y<?php echo $Rich_Web_Slider; ?>=false;
							},500)
						}
						function prevAnim<?php echo $Rich_Web_Slider; ?>(){
							jQuery(".cd-slider-controls<?php echo $Rich_Web_Slider; ?> li").removeClass("selected");
							jQuery(".cd-slider-controls<?php echo $Rich_Web_Slider; ?> li").eq(count<?php echo $Rich_Web_Slider; ?>-1).addClass("selected");
							if(animateEffect<?php echo $Rich_Web_Slider; ?>==1){
								jQuery(".RW_Im_An_Sl<?php echo $Rich_Web_Slider; ?>"+count<?php echo $Rich_Web_Slider; ?>).css("borderRadius","0% 0% 100% 0%");
							}else if(animateEffect<?php echo $Rich_Web_Slider; ?>==2){
								jQuery(".RW_Im_An_Sl<?php echo $Rich_Web_Slider; ?>"+count<?php echo $Rich_Web_Slider; ?>).css("borderRadius","0% 100% 0% 0%");
							}else if(animateEffect<?php echo $Rich_Web_Slider; ?>==3){
								jQuery(".RW_Im_An_Sl<?php echo $Rich_Web_Slider; ?>"+count<?php echo $Rich_Web_Slider; ?>).css("borderRadius","0% 100% 100% 0%");
							}else if(animateEffect<?php echo $Rich_Web_Slider; ?>==4){
								jQuery(".RW_Im_An_Sl<?php echo $Rich_Web_Slider; ?>"+count<?php echo $Rich_Web_Slider; ?>).css("borderRadius","0% 0% 100% 100%");
							}
							jQuery('.RW_Title_Ef<?php echo $Rich_Web_Slider; ?>'+count<?php echo $Rich_Web_Slider; ?>).slideDown(anim_over<?php echo $Rich_Web_Slider; ?>);
							jQuery('.RW_Im_An_Sl<?php echo $Rich_Web_Slider; ?>'+count<?php echo $Rich_Web_Slider; ?>).css("z-index",zIndex<?php echo $Rich_Web_Slider; ?>);
							jQuery(".cd-slider-navigation<?php echo $Rich_Web_Slider; ?> li").css("z-index",zIndex<?php echo $Rich_Web_Slider; ?>);
							jQuery(".cd-slider-controls<?php echo $Rich_Web_Slider; ?>").css("z-index",zIndex<?php echo $Rich_Web_Slider; ?>);
							jQuery(".RW_Title<?php echo $Rich_Web_Slider; ?>").css("z-index",zIndex<?php echo $Rich_Web_Slider; ?>);
							jQuery('.RW_Im_An_Sl<?php echo $Rich_Web_Slider; ?>'+count<?php echo $Rich_Web_Slider; ?>).addClass("RW_Im_An_Sl_AddAnim"+animateEffect<?php echo $Rich_Web_Slider; ?>);
							jQuery('.RW_Im_An_Sl<?php echo $Rich_Web_Slider; ?>'+count<?php echo $Rich_Web_Slider; ?>).removeClass("RW_Im_An_Sl_RAnim"+animateEffect<?php echo $Rich_Web_Slider; ?>);
							if(animateEffect<?php echo $Rich_Web_Slider; ?>==1 || animateEffect<?php echo $Rich_Web_Slider; ?>==2 || animateEffect<?php echo $Rich_Web_Slider; ?>==3 || animateEffect<?php echo $Rich_Web_Slider; ?>==12 || animateEffect<?php echo $Rich_Web_Slider; ?>==13){
								jQuery(".RW_Im_An_Sl<?php echo $Rich_Web_Slider; ?>").addClass("RW_Im_An_Sl_left");
								jQuery(".RW_Im_An_Sl<?php echo $Rich_Web_Slider; ?>").removeClass("RW_Im_An_Sl_right");
							}
							setTimeout(function(){
								jQuery('.RW_Im_An_Sl<?php echo $Rich_Web_Slider; ?>').removeClass("RW_Im_An_Sl_AddAnim"+animateEffect<?php echo $Rich_Web_Slider; ?>);
								jQuery('.RW_Im_An_Sl<?php echo $Rich_Web_Slider; ?>').addClass("RW_Im_An_Sl_RAnim"+animateEffect<?php echo $Rich_Web_Slider; ?>);
								jQuery('.RW_Im_An_Sl<?php echo $Rich_Web_Slider; ?>'+count<?php echo $Rich_Web_Slider; ?>).addClass("RW_Im_An_Sl_AddAnim"+animateEffect<?php echo $Rich_Web_Slider; ?>);
								jQuery('.RW_Im_An_Sl<?php echo $Rich_Web_Slider; ?>'+count<?php echo $Rich_Web_Slider; ?>).removeClass("RW_Im_An_Sl_RAnim"+animateEffect<?php echo $Rich_Web_Slider; ?>);
							},anim_over<?php echo $Rich_Web_Slider; ?>)
							thumbCount<?php echo $Rich_Web_Slider; ?>=count<?php echo $Rich_Web_Slider; ?>;
							y_y<?php echo $Rich_Web_Slider; ?>=true;
							setTimeout(function(){
								y_y<?php echo $Rich_Web_Slider; ?>=false;
							},500)
						}
						function prev<?php echo $Rich_Web_Slider; ?>(){
							if(y_y<?php echo $Rich_Web_Slider; ?>==true){
								return;
							}
							if(animateEffect<?php echo $Rich_Web_Slider; ?>==4){
								jQuery(".RW_Im_An_Sl_RAnim"+animateEffect<?php echo $Rich_Web_Slider; ?>).css("top","0%");
							}
							zIndex<?php echo $Rich_Web_Slider; ?>++;
							jQuery('.RW_Title_Ef<?php echo $Rich_Web_Slider; ?>'+count<?php echo $Rich_Web_Slider; ?>).slideUp(anim_over<?php echo $Rich_Web_Slider; ?>);
							count<?php echo $Rich_Web_Slider; ?>--;
							if(count<?php echo $Rich_Web_Slider; ?>==0){
								count<?php echo $Rich_Web_Slider; ?>=CountShort<?php echo $Rich_Web_Slider; ?>;
							}
							prevAnim<?php echo $Rich_Web_Slider; ?>();
						}
						function next<?php echo $Rich_Web_Slider; ?>(){
							if(y_y<?php echo $Rich_Web_Slider; ?>==true){
								return;
							}
							if(animateEffect<?php echo $Rich_Web_Slider; ?>==4){
								jQuery(".RW_Im_An_Sl_RAnim"+animateEffect<?php echo $Rich_Web_Slider; ?>).css("top","100%");
							}
							zIndex<?php echo $Rich_Web_Slider; ?>++;
							jQuery('.RW_Title_Ef<?php echo $Rich_Web_Slider; ?>'+count<?php echo $Rich_Web_Slider; ?>).slideUp(anim_over<?php echo $Rich_Web_Slider; ?>);
							count<?php echo $Rich_Web_Slider; ?>++;
							if(count<?php echo $Rich_Web_Slider; ?>==CountShort<?php echo $Rich_Web_Slider; ?>+1){
								count<?php echo $Rich_Web_Slider; ?>=1;
							}
							nextAnim<?php echo $Rich_Web_Slider; ?>();
						}
						var Interval<?php echo $Rich_Web_Slider; ?>;
						if(Rich_Web_AnSL_SSh<?php echo $Rich_Web_Slider; ?> == "true"){
							Interval<?php echo $Rich_Web_Slider; ?>=setInterval(function(){
								next<?php echo $Rich_Web_Slider; ?>();
							},(Rich_Web_AnSL_SShChT<?php echo $Rich_Web_Slider; ?>/10)*CountShort<?php echo $Rich_Web_Slider; ?>*2) 
							jQuery(".RW_CL_N<?php echo $Rich_Web_Slider; ?>").bind("click",function(){
								next<?php echo $Rich_Web_Slider; ?>();
								console.log(y_y<?php echo $Rich_Web_Slider; ?>);
							})
							jQuery(".RW_CL_P<?php echo $Rich_Web_Slider; ?>").bind("click",function(){
								prev<?php echo $Rich_Web_Slider; ?>();
							})
							jQuery( ".cd-slider-wrapper<?php echo $Rich_Web_Slider; ?>" )
							  .mouseout(function() {
							    Interval<?php echo $Rich_Web_Slider; ?>=setInterval(function(){
									next<?php echo $Rich_Web_Slider; ?>();
								},(Rich_Web_AnSL_SShChT<?php echo $Rich_Web_Slider; ?>/10)*CountShort<?php echo $Rich_Web_Slider; ?>*2) 
							  })
							  .mouseover(function() {
							  	clearInterval(Interval<?php echo $Rich_Web_Slider; ?>);
							  })
						}else{
							jQuery(".RW_CL_N<?php echo $Rich_Web_Slider; ?>").bind("click",function(){
								next<?php echo $Rich_Web_Slider; ?>();
								console.log(y_y<?php echo $Rich_Web_Slider; ?>);
							})
							jQuery(".RW_CL_P<?php echo $Rich_Web_Slider; ?>").bind("click",function(){
								prev<?php echo $Rich_Web_Slider; ?>();
							})
						}
						
						jQuery(".RW_Thumb<?php echo $Rich_Web_Slider; ?>").click(function(){
							console.log(thumbCount<?php echo $Rich_Web_Slider; ?>);
							count<?php echo $Rich_Web_Slider; ?>=parseInt(jQuery(this).attr("name"));
							if(count<?php echo $Rich_Web_Slider; ?> != thumbCount<?php echo $Rich_Web_Slider; ?>){
								jQuery('.RW_Title<?php echo $Rich_Web_Slider; ?>').slideUp(500);
							}
							
							zIndex<?php echo $Rich_Web_Slider; ?>++;
							if(count<?php echo $Rich_Web_Slider; ?> > thumbCount<?php echo $Rich_Web_Slider; ?>){
								if(animateEffect<?php echo $Rich_Web_Slider; ?>==4){
									jQuery(".RW_Im_An_Sl_RAnim"+animateEffect<?php echo $Rich_Web_Slider; ?>).css("top","100%");
								}
								nextAnim<?php echo $Rich_Web_Slider; ?>();
							}else if(count<?php echo $Rich_Web_Slider; ?> < thumbCount<?php echo $Rich_Web_Slider; ?>){
								if(animateEffect<?php echo $Rich_Web_Slider; ?>==4){
									jQuery(".RW_Im_An_Sl_RAnim"+animateEffect<?php echo $Rich_Web_Slider; ?>).css("top","0%");
								}
								prevAnim<?php echo $Rich_Web_Slider; ?>();
							}
							thumbCount<?php echo $Rich_Web_Slider; ?>=count<?php echo $Rich_Web_Slider; ?>;
							y_y<?php echo $Rich_Web_Slider; ?>=true;
							setTimeout(function(){
								y_y<?php echo $Rich_Web_Slider; ?>=false;
							},500)
						})
						resp<?php echo $Rich_Web_Slider; ?>();	
	   			 	}
	   			})
			}
			</script>
			<?php
			}
			echo $after_widget;
 		}
	}
?>