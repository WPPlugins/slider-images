<?php
	if(!current_user_can('manage_options'))
	{
		die('Access Denied');
	}
?>
<script>
	function addSliderJ2()
	{
		alert("This is free version. For more adventures click to buy Pro version.");
	}
	function canselSliderJ2()
	{
		location.reload();
	}	
	function rich_web_Edit_Sl2(rich_web_Slider_ID)
	{
		var ajaxurl = object.ajaxurl;
		var data = {
		action: 'rich_web_Edit_Option', // wp_ajax_my_action / wp_ajax_nopriv_my_action in ajax.php. Can be named anything.
		foobar: rich_web_Slider_ID, // translates into $_POST['foobar'] in PHP
		};
		jQuery.post(ajaxurl, data, function(response) {
			
			var arr=Array();
			var spl=response.split('=>');
			for(var i=3;i<spl.length;i++){
				arr[arr.length]=spl[i].split('[')[0].trim(); 
			}
			arr[arr.length-1]=arr[arr.length-1].split(')')[0].trim();
			
			jQuery('#rich_web_Slider_UP_ID').val(arr[0]);
			jQuery('#rich_web_slider_name').val(arr[1]);
			jQuery('#rich_web_slider_type').val(arr[2]);
			jQuery('#rich_web_slider_type').hide();
			jQuery('.rich_web_SaveSl_Table_2').hide();

			if(arr[2]=='Slider Navigation')
			{
				jQuery('.rich_web_SaveSl_Table_2_1').show();
				if(arr[3]=='true'){ arr[3]=true ;}else{ arr[3]=false ;}
				if(arr[5]=='true'){ arr[5]=true ;}else{ arr[5]=false ;}
				if(arr[8]=='true'){ arr[8]=true ;}else{ arr[8]=false ;}
				if(arr[19]=='true'){ arr[19]=true ;}else{ arr[19]=false ;}
				jQuery('#rich_web_Sl1_SlS').attr('checked',arr[3]); jQuery('#rich_web_Sl1_SlSS').val(arr[4]); jQuery('#rich_web_Sl1_PoH').attr('checked',arr[5]); jQuery('#rich_web_Sl1_W').val(arr[6]); jQuery('#rich_web_Sl1_H').val(arr[7]); jQuery('#rich_web_Sl1_BoxS').attr('checked',arr[8]); jQuery('#rich_web_Sl1_BoxSC').val(arr[9]); jQuery('#rich_web_Sl1_IBW').val(arr[10]); jQuery('#rich_web_Sl1_IBS').val(arr[11]); jQuery('#rich_web_Sl1_IBC').val(arr[12]); jQuery('#rich_web_Sl1_IBR').val(arr[13]); jQuery('#rich_web_Sl1_TBgC').val(arr[14]); jQuery('#rich_web_Sl1_TC').val(arr[15]); jQuery('#rich_web_Sl1_TTA').val(arr[16]); jQuery('#rich_web_Sl1_TFS').val(arr[17]); jQuery('#rich_web_Sl1_TFF').val(arr[18]); jQuery('#rich_web_Sl1_TUp').attr('checked',arr[19]); jQuery('#rich_web_Sl1_ArBgC').val(arr[20]); jQuery('#rich_web_Sl1_ArOp').val(arr[21]); jQuery('#rich_web_Sl1_ArType').val(arr[22]); jQuery('#rich_web_Sl1_ArHBgC').val(arr[23]); jQuery('#rich_web_Sl1_ArHOp').val(arr[24]); jQuery('#rich_web_Sl1_ArHEff').val(arr[25]); jQuery('#rich_web_Sl1_ArBoxW').val(arr[26]); jQuery('#rich_web_Sl1_NavW').val(arr[27]); jQuery('#rich_web_Sl1_NavH').val(arr[28]); jQuery('#rich_web_Sl1_NavPB').val(arr[29]); jQuery('#rich_web_Sl1_NavBW').val(arr[30]); jQuery('#rich_web_Sl1_NavBS').val(arr[31]); jQuery('#rich_web_Sl1_NavBC').val(arr[32]); jQuery('#rich_web_Sl1_NavBR').val(arr[33]); jQuery('#rich_web_Sl1_NavCC').val(arr[34]); jQuery('#rich_web_Sl1_NavHC').val(arr[35]); jQuery('#rich_web_Sl1_ArPFT').val(arr[36]); jQuery('#rich_web_Sl1_NavPos').val(arr[37]);
			}
			else if(arr[2]=='Content Slider')
			{
				jQuery('.rich_web_SaveSl_Table_2_2').show();
				if(arr[3]=='none'){ jQuery('#rich_CS_BIB').attr('checked',false); }else{ jQuery('#rich_CS_BIB').attr('checked',true); }
				if(arr[4]=='none'){	jQuery('#rich_CS_P').attr('checked',false);	}else{ jQuery('#rich_CS_P').attr('checked',true); }
				if(arr[5]=='none'){	jQuery('#rich_CS_Loop').attr('checked',false); }else{ jQuery('#rich_CS_Loop').attr('checked',true);	}
				if(arr[17]=='none'){ jQuery('#rich_CS_Video_TShow').attr('checked',false); }else{ jQuery('#rich_CS_Video_TShow').attr('checked',true); }
				if(arr[23]=='none'){ jQuery('#rich_CS_Video_DShow').attr('checked',false); }else{ jQuery('#rich_CS_Video_DShow').attr('checked',true); }
				if(arr[29]=='none'){ jQuery('#rich_CS_Video_Show').attr('checked',false); }else{ jQuery('#rich_CS_Video_Show').attr('checked',true); }
				if(arr[31] == ''){ jQuery('#rich_CS_Video_H').attr('checked',false); }else{ jQuery('#rich_CS_Video_H').attr('checked',true); }
				if(arr[42]=='none'){ jQuery('#rich_CS_Video_ArrShow').attr('checked',false); }else{ jQuery('#rich_CS_Video_ArrShow').attr('checked',true); }
				jQuery('#rich_CS_SD').val(parseInt(arr[6])); jQuery('#rich_CS_AT').val(arr[7]); jQuery('#rich_CS_Cont_BgC').val(arr[8]); jQuery('#rich_CS_Cont_BSC').val(arr[9]); jQuery('#rich_CS_Cont_W').val(parseInt(arr[10])); jQuery('#rich_CS_Cont_H').val(parseInt(arr[11])); jQuery('#rich_CS_Cont_Op').val(arr[12]); jQuery('#rich_CS_Cont_BW').val(parseInt(arr[13])); jQuery('#rich_CS_Cont_BS').val(arr[14]); jQuery('#rich_CS_Cont_BC').val(arr[15]); jQuery('#rich_CS_Cont_BR').val(parseInt(arr[16])); jQuery('#rich_CS_Video_TC').val(arr[18]); jQuery('#rich_CS_Video_TSC').val(arr[19]); jQuery('#rich_CS_Video_TFS').val(parseInt(arr[20])); jQuery('#rich_CS_Video_TFF').val(arr[21]); jQuery('#rich_CS_Video_TTA').val(arr[22]); jQuery('#rich_CS_Video_DC').val(arr[24]); jQuery('#rich_CS_Video_DSC').val(arr[25]); jQuery('#rich_CS_Video_DFS').val(parseInt(arr[26])); jQuery('#rich_CS_Video_DFF').val(arr[27]); jQuery('#rich_CS_Video_DTA').val(arr[28]); jQuery('#rich_CS_Video_W').val(parseInt(arr[30])); jQuery('#rich_CS_LFS').val(parseInt(arr[32])); jQuery('#rich_CS_LFF').val(arr[33]); jQuery('#rich_CS_LC').val(arr[34]); jQuery('#rich_CS_LT').val(arr[35]); jQuery('#rich_CS_LBgC').val(arr[36]); jQuery('#rich_CS_LBC').val(arr[37]); jQuery('#rich_CS_LBR').val(parseInt(arr[38])); jQuery('#rich_CS_LPos').val(arr[39]); jQuery('#rich_CS_LHBgC').val(arr[40]); jQuery('#rich_CS_LHC').val(arr[41]); jQuery('#rich_CS_AFS').val(parseInt(arr[43])); jQuery('#rich_CS_AC').val(arr[44]); jQuery('#rich_CS_Icon').val(arr[45]); jQuery('#rich_CS_Link_BW').val(parseInt(arr[46])); jQuery('#rich_CS_Link_BS').val(arr[47]);
			}
			else if(arr[2]=='Fashion Slider')
			{
				jQuery('.rich_web_SaveSl_Table_2_3').show();
				if(arr[4]==''){ jQuery('#rich_fsl_SShow').attr('checked',false); }else{ jQuery('#rich_fsl_SShow').attr('checked',true);	}
				if(arr[7]==''){ jQuery('#rich_fsl_Ic_Show').attr('checked',false); }else{ jQuery('#rich_fsl_Ic_Show').attr('checked',true); }
				if(arr[8]==''){	jQuery('#rich_fsl_PPL_Show').attr('checked',false); }else{ jQuery('#rich_fsl_PPL_Show').attr('checked',true); }
				if(arr[9]==''){	jQuery('#rich_fsl_Randomize').attr('checked',false); }else{	jQuery('#rich_fsl_Randomize').attr('checked',true);	}
				if(arr[10]==''){ jQuery('#rich_fsl_Loop').attr('checked',false); }else{	jQuery('#rich_fsl_Loop').attr('checked',true); }
				if(arr[18]==''){ jQuery('#rich_fsl_Desc_Show').attr('checked',false); }else{ jQuery('#rich_fsl_Desc_Show').attr('checked',true); }
				jQuery('#rich_fsl_animation').val(arr[3]); jQuery('#rich_fsl_SShow_Speed').val(arr[5]); jQuery('#rich_fsl_Anim_Dur').val(arr[6]); jQuery('#rich_fsl_Width').val(arr[11]); jQuery('#rich_fsl_Height').val(arr[12]); jQuery('#rich_fsl_Border_Width').val(arr[13]); jQuery('#rich_fsl_Border_Style').val(arr[14]); jQuery('#rich_fsl_Border_Color').val(arr[15]); jQuery('#rich_fsl_Box_Shadow').val(arr[16]); jQuery('#rich_fsl_Shadow_Color').val(arr[17]); jQuery('#rich_fsl_Desc_Size').val(arr[19]); jQuery('#rich_fsl_Desc_Color').val(arr[20]); jQuery('#rich_fsl_Desc_Font_Family').val(arr[21]); jQuery('#rich_fsl_Desc_Text_Align').val(arr[22]); jQuery('#rich_fsl_Desc_Bg_Color').val(arr[23]); jQuery('#rich_fsl_Desc_Transparency').val(arr[24]); jQuery('#rich_fsl_Title_Font_Size').val(arr[25]); jQuery('#rich_fsl_Title_Color').val(arr[26]); jQuery('#rich_fsl_Title_Text_Shadow').val(arr[27]); jQuery('#rich_fsl_Title_Font_Family').val(arr[28]); jQuery('#rich_fsl_Title_Text_Align').val(arr[29]); jQuery('#rich_fsl_Link_Text').val(arr[30]); jQuery('#rich_fsl_Link_Border_Width').val(arr[31]); jQuery('#rich_fsl_Link_Border_Style').val(arr[32]); jQuery('#rich_fsl_Link_Border_Color').val(arr[33]); jQuery('#rich_fsl_Link_Font_Size').val(arr[34]); jQuery('#rich_fsl_Link_Color').val(arr[35]); jQuery('#rich_fsl_Link_Font_Family').val(arr[36]); jQuery('#rich_fsl_Link_Bg_Color').val(arr[37]); jQuery('#rich_fsl_Link_Transparency').val(arr[38]); jQuery('#rich_fsl_Link_Hover_Border_Color').val(arr[39]); jQuery('#rich_fsl_Link_Hover_Bg_Color').val(arr[40]); jQuery('#rich_fsl_Link_Hover_Color').val(arr[41]); jQuery('#rich_fsl_Link_Hover_Transparency').val(arr[42]); jQuery('#rich_fsl_Icon_Size').val(arr[43]); jQuery('#rich_fsl_Icon_Type').val(arr[44]); jQuery('#rich_fsl_Hover_Icon_Type').val(arr[45]);
			}
			else if(arr[2]=='Circle Thumbnails')
			{
				jQuery('.rich_web_SaveSl_Table_2_4').show();
				if(arr[8]=='true'){ jQuery('#Rich_Web_Sl_CT_BxSShow').attr('checked',true); }else{ jQuery('#Rich_Web_Sl_CT_BxSShow').attr('checked',false); }
				if(arr[9]=='true'){ jQuery('#Rich_Web_Sl_CT_BxSType').attr('checked',true); }else{ jQuery('#Rich_Web_Sl_CT_BxSType').attr('checked',false); }
				if(arr[24]=='true'){ jQuery('#Rich_Web_Sl_CT_ArText').attr('checked',true); }else{ jQuery('#Rich_Web_Sl_CT_ArText').attr('checked',false); }
				jQuery('#Rich_Web_Sl_CT_W').val(arr[3]); jQuery('#Rich_Web_Sl_CT_H').val(arr[4]); jQuery('#Rich_Web_Sl_CT_BW').val(arr[5]); jQuery('#Rich_Web_Sl_CT_BS').val(arr[6]); jQuery('#Rich_Web_Sl_CT_BC').val(arr[7]); jQuery('#Rich_Web_Sl_CT_BxS').val(arr[10]); jQuery('#Rich_Web_Sl_CT_BxC').val(arr[11]); jQuery('#Rich_Web_Sl_CT_TDABgC').val(arr[12]); jQuery('#Rich_Web_Sl_CT_TDAPos').val(arr[13]); jQuery('#Rich_Web_Sl_CT_LBgC').val(arr[14]); jQuery('#Rich_Web_Sl_CT_TFS').val(arr[15]); jQuery('#Rich_Web_Sl_CT_TFF').val(arr[16]); jQuery('#Rich_Web_Sl_CT_TCC').val(arr[17]); jQuery('#Rich_Web_Sl_CT_TC').val(arr[18]); jQuery('#Rich_Web_Sl_CT_ArBgC').val(arr[19]); jQuery('#Rich_Web_Sl_CT_ArBR').val(arr[20]); jQuery('#Rich_Web_Sl_CT_ArType').val(arr[21]); jQuery('#Rich_Web_Sl_CT_ArHBC').val(arr[22]); jQuery('#Rich_Web_Sl_CT_ArHBR').val(arr[23]); jQuery('#Rich_Web_Sl_CT_ArLeft').val(arr[25]); jQuery('#Rich_Web_Sl_CT_ArRight').val(arr[26]); jQuery('#Rich_Web_Sl_CT_ArTextC').val(arr[27]); jQuery('#Rich_Web_Sl_CT_ArTextFS').val(arr[28]); jQuery('#Rich_Web_Sl_CT_ArTextFF').val(arr[29]);				
			}
			else if(arr[2]=='Slider Carousel')
			{
				jQuery('.rich_web_SaveSl_Table_2_5').show();
				if(arr[6]=='true'){ jQuery('#Rich_Web_Sl_SC_BoxShShow').attr('checked',true); }else{ jQuery('#Rich_Web_Sl_SC_BoxShShow').attr('checked',false); }
				if(arr[7]=='true'){ jQuery('#Rich_Web_Sl_SC_BoxShType').attr('checked',true); }else{ jQuery('#Rich_Web_Sl_SC_BoxShType').attr('checked',false); }
				if(arr[28]=='true'){ jQuery('#Rich_Web_Sl_SC_Pop_BoxShShow').attr('checked',true); }else{ jQuery('#Rich_Web_Sl_SC_Pop_BoxShShow').attr('checked',false); }
				if(arr[29]=='true'){ jQuery('#Rich_Web_Sl_SC_Pop_BoxShType').attr('checked',true); }else{ jQuery('#Rich_Web_Sl_SC_Pop_BoxShType').attr('checked',false); }
				jQuery('#Rich_Web_Sl_SC_BW').val(arr[3]); jQuery('#Rich_Web_Sl_SC_BS').val(arr[4]); jQuery('#Rich_Web_Sl_SC_BC').val(arr[5]); jQuery('#Rich_Web_Sl_SC_BoxSh').val(arr[8]); jQuery('#Rich_Web_Sl_SC_BoxShC').val(arr[9]); jQuery('#Rich_Web_Sl_SC_IW').val(arr[10]); jQuery('#Rich_Web_Sl_SC_IH').val(arr[11]); jQuery('#Rich_Web_Sl_SC_IBW').val(arr[12]); jQuery('#Rich_Web_Sl_SC_IBS').val(arr[13]); jQuery('#Rich_Web_Sl_SC_IBC').val(arr[14]); jQuery('#Rich_Web_Sl_SC_IBR').val(arr[15]); jQuery('#Rich_Web_Sl_SC_ICBW').val(arr[16]); jQuery('#Rich_Web_Sl_SC_ICBS').val(arr[17]); jQuery('#Rich_Web_Sl_SC_ICBC').val(arr[18]); jQuery('#Rich_Web_Sl_SC_TBgC').val(arr[19]); jQuery('#Rich_Web_Sl_SC_TC').val(arr[20]); jQuery('#Rich_Web_Sl_SC_TFS').val(arr[21]); jQuery('#Rich_Web_Sl_SC_TFF').val(arr[22]); jQuery('#Rich_Web_Sl_SC_THBgC').val(arr[23]); jQuery('#Rich_Web_Sl_SC_THC').val(arr[24]); jQuery('#Rich_Web_Sl_SC_Pop_OC').val(arr[25]); jQuery('#Rich_Web_Sl_SC_Pop_BW').val(arr[26]); jQuery('#Rich_Web_Sl_SC_Pop_BC').val(arr[27]); jQuery('#Rich_Web_Sl_SC_Pop_BoxSh').val(arr[30]); jQuery('#Rich_Web_Sl_SC_Pop_BoxShC').val(arr[31]); jQuery('#Rich_Web_Sl_SC_L_BgC').val(arr[32]); jQuery('#Rich_Web_Sl_SC_L_C').val(arr[33]); jQuery('#Rich_Web_Sl_SC_L_FS').val(arr[34]); jQuery('#Rich_Web_Sl_SC_L_BW').val(arr[35]); jQuery('#Rich_Web_Sl_SC_L_BS').val(arr[36]); jQuery('#Rich_Web_Sl_SC_L_BC').val(arr[37]); jQuery('#Rich_Web_Sl_SC_L_BR').val(arr[38]); jQuery('#Rich_Web_Sl_SC_L_HBgC').val(arr[39]); jQuery('#Rich_Web_Sl_SC_L_HC').val(arr[40]); jQuery('#Rich_Web_Sl_SC_L_Type').val(arr[41]); jQuery('#Rich_Web_Sl_SC_L_Text').val(arr[42]); jQuery('#Rich_Web_Sl_SC_L_IType').val(arr[43]); jQuery('#Rich_Web_Sl_SC_L_FF').val(arr[44]); jQuery('#Rich_Web_Sl_SC_PI_BgC').val(arr[45]); jQuery('#Rich_Web_Sl_SC_PI_C').val(arr[46]); jQuery('#Rich_Web_Sl_SC_PI_FS').val(arr[47]); jQuery('#Rich_Web_Sl_SC_PI_BW').val(arr[48]); jQuery('#Rich_Web_Sl_SC_PI_BS').val(arr[49]); jQuery('#Rich_Web_Sl_SC_PI_BC').val(arr[50]); jQuery('#Rich_Web_Sl_SC_PI_BR').val(arr[51]); jQuery('#Rich_Web_Sl_SC_PI_HBgC').val(arr[52]); jQuery('#Rich_Web_Sl_SC_PI_HC').val(arr[53]); jQuery('#Rich_Web_Sl_SC_PI_Type').val(arr[54]);	jQuery('#Rich_Web_Sl_SC_PI_Text').val(arr[55]);	jQuery('#Rich_Web_Sl_SC_PI_IType').val(arr[56]); jQuery('#Rich_Web_Sl_SC_PI_FF').val(arr[57]); jQuery('#Rich_Web_Sl_SC_Arr_BgC').val(arr[58]); jQuery('#Rich_Web_Sl_SC_Arr_C').val(arr[59]); jQuery('#Rich_Web_Sl_SC_Arr_FS').val(arr[60]); jQuery('#Rich_Web_Sl_SC_Arr_BW').val(arr[61]); jQuery('#Rich_Web_Sl_SC_Arr_BS').val(arr[62]); jQuery('#Rich_Web_Sl_SC_Arr_BC').val(arr[63]); jQuery('#Rich_Web_Sl_SC_Arr_BR').val(arr[64]); jQuery('#Rich_Web_Sl_SC_Arr_HBgC').val(arr[65]); jQuery('#Rich_Web_Sl_SC_Arr_HC').val(arr[66]); jQuery('#Rich_Web_Sl_SC_Arr_Type').val(arr[67]); jQuery('#Rich_Web_Sl_SC_Arr_FF').val(arr[68]); jQuery('#Rich_Web_Sl_SC_Arr_IType').val(arr[69]); jQuery('#Rich_Web_Sl_SC_Arr_Next').val(arr[70]); jQuery('#Rich_Web_Sl_SC_Arr_Prev').val(arr[71]); jQuery('#Rich_Web_Sl_SC_PCI_FS').val(arr[72]); jQuery('#Rich_Web_Sl_SC_PCI_C').val(arr[73]); jQuery('#Rich_Web_Sl_SC_PCI_Type').val(arr[74]);
			}
			else if(arr[2]=='Flexible Slider')
			{
				jQuery('.rich_web_SaveSl_Table_2_6').show();
				if(arr[4]=='true'){ jQuery('#Rich_Web_Sl_FS_AP').attr('checked',true); }else{ jQuery('#Rich_Web_Sl_FS_AP').attr('checked',false); }
				if(arr[8]=='true'){ jQuery('#Rich_Web_Sl_FS_SVis').attr('checked',true); }else{ jQuery('#Rich_Web_Sl_FS_SVis').attr('checked',false); }
				if(arr[10]=='true'){ jQuery('#Rich_Web_Sl_FS_SLoop').attr('checked',true); }else{ jQuery('#Rich_Web_Sl_FS_SLoop').attr('checked',false); }
				if(arr[13]=='true'){ jQuery('#Rich_Web_Sl_FS_ShNavBut').attr('checked',true); }else{ jQuery('#Rich_Web_Sl_FS_ShNavBut').attr('checked',false); }
				if(arr[20]=='true'){ jQuery('#Rich_Web_Sl_FS_I_BoxShShow').attr('checked',true); }else{ jQuery('#Rich_Web_Sl_FS_I_BoxShShow').attr('checked',false); }
				if(arr[21]=='true'){ jQuery('#Rich_Web_Sl_FS_I_BoxShType').attr('checked',true); }else{ jQuery('#Rich_Web_Sl_FS_I_BoxShType').attr('checked',false); }
				if(arr[26]=='true'){ jQuery('#Rich_Web_Sl_FS_Nav_Show').attr('checked',true); }else{ jQuery('#Rich_Web_Sl_FS_Nav_Show').attr('checked',false); }
				if(arr[37]=='true'){ jQuery('#Rich_Web_Sl_FS_Arr_Show').attr('checked',true); }else{ jQuery('#Rich_Web_Sl_FS_Arr_Show').attr('checked',false); }
				jQuery('#Rich_Web_Sl_FS_BgC').val(arr[3]); jQuery('#Rich_Web_Sl_FS_TS').val(arr[5]); jQuery('#Rich_Web_Sl_FS_PT').val(arr[6]); jQuery('#Rich_Web_Sl_FS_SS').val(arr[7]); jQuery('#Rich_Web_Sl_FS_CS').val(arr[9]); jQuery('#Rich_Web_Sl_FS_SSc').val(arr[11]); jQuery('#Rich_Web_Sl_FS_SlPos').val(arr[12]); jQuery('#Rich_Web_Sl_FS_I_W').val(arr[14]); jQuery('#Rich_Web_Sl_FS_I_H').val(arr[15]); jQuery('#Rich_Web_Sl_FS_I_BW').val(arr[16]); jQuery('#Rich_Web_Sl_FS_I_BS').val(arr[17]); jQuery('#Rich_Web_Sl_FS_I_BC').val(arr[18]); jQuery('#Rich_Web_Sl_FS_I_BR').val(arr[19]); jQuery('#Rich_Web_Sl_FS_I_BoxSh').val(arr[22]); jQuery('#Rich_Web_Sl_FS_I_BoxShC').val(arr[23]); jQuery('#Rich_Web_Sl_FS_T_C').val(arr[24]); jQuery('#Rich_Web_Sl_FS_T_FF').val(arr[25]); jQuery('#Rich_Web_Sl_FS_Nav_W').val(arr[27]); jQuery('#Rich_Web_Sl_FS_Nav_H').val(arr[28]); jQuery('#Rich_Web_Sl_FS_Nav_BW').val(arr[29]); jQuery('#Rich_Web_Sl_FS_Nav_BS').val(arr[30]); jQuery('#Rich_Web_Sl_FS_Nav_BC').val(arr[31]); jQuery('#Rich_Web_Sl_FS_Nav_BR').val(arr[32]); jQuery('#Rich_Web_Sl_FS_Nav_PB').val(arr[33]); jQuery('#Rich_Web_Sl_FS_Nav_CC').val(arr[34]); jQuery('#Rich_Web_Sl_FS_Nav_HC').val(arr[35]); jQuery('#Rich_Web_Sl_FS_Nav_C').val(arr[36]); jQuery('#Rich_Web_Sl_FS_Arr_Type').val(arr[38]); jQuery('#Rich_Web_Sl_FS_Arr_S').val(arr[39]); jQuery('#Rich_Web_Sl_FS_Arr_C').val(arr[40]);
			}
			else if(arr[2]=='Dynamic Slider')
			{
				jQuery('.rich_web_SaveSl_Table_2_7').show();
				if(arr[3]=='true'){ jQuery('#Rich_Web_Sl_DS_AP').attr('checked',true); }else{ jQuery('#Rich_Web_Sl_DS_AP').attr('checked',false); }
				if(arr[5]=='true'){ jQuery('#Rich_Web_Sl_DS_Tr').attr('checked',true); }else{ jQuery('#Rich_Web_Sl_DS_Tr').attr('checked',false); }
				if(arr[27]=='true'){ jQuery('#Rich_Web_Sl_DS_Arr_Show').attr('checked',true); }else{ jQuery('#Rich_Web_Sl_DS_Arr_Show').attr('checked',false); }
				jQuery('#Rich_Web_Sl_DS_PT').val(arr[4]); jQuery('#Rich_Web_Sl_DS_H').val(arr[6]); jQuery('#Rich_Web_Sl_DS_BW').val(arr[7]); jQuery('#Rich_Web_Sl_DS_BS').val(arr[8]); jQuery('#Rich_Web_Sl_DS_BC').val(arr[9]); jQuery('#Rich_Web_Sl_DS_TFS').val(arr[10]); jQuery('#Rich_Web_Sl_DS_TFF').val(arr[11]); jQuery('#Rich_Web_Sl_DS_TC').val(arr[12]); jQuery('#Rich_Web_Sl_DS_DFS').val(arr[13]); jQuery('#Rich_Web_Sl_DS_DFF').val(arr[14]); jQuery('#Rich_Web_Sl_DS_DC').val(arr[15]); jQuery('#Rich_Web_Sl_DS_LFS').val(arr[16]); jQuery('#Rich_Web_Sl_DS_LFF').val(arr[17]); jQuery('#Rich_Web_Sl_DS_LC').val(arr[18]); jQuery('#Rich_Web_Sl_DS_LBgC').val(arr[19]); jQuery('#Rich_Web_Sl_DS_LBW').val(arr[20]); jQuery('#Rich_Web_Sl_DS_LBS').val(arr[21]); jQuery('#Rich_Web_Sl_DS_LBC').val(arr[22]); jQuery('#Rich_Web_Sl_DS_LBR').val(arr[23]); jQuery('#Rich_Web_Sl_DS_LHC').val(arr[24]); jQuery('#Rich_Web_Sl_DS_LHBgC').val(arr[25]); jQuery('#Rich_Web_Sl_DS_LT').val(arr[26]); jQuery('#Rich_Web_Sl_DS_Arr_LT').val(arr[28]); jQuery('#Rich_Web_Sl_DS_Arr_RT').val(arr[29]); jQuery('#Rich_Web_Sl_DS_Arr_C').val(arr[30]); jQuery('#Rich_Web_Sl_DS_Arr_BgC').val(arr[31]); jQuery('#Rich_Web_Sl_DS_Arr_BW').val(arr[32]); jQuery('#Rich_Web_Sl_DS_Arr_BS').val(arr[33]); jQuery('#Rich_Web_Sl_DS_Arr_BC').val(arr[34]); jQuery('#Rich_Web_Sl_DS_Arr_BR').val(arr[35]); jQuery('#Rich_Web_Sl_DS_Arr_HC').val(arr[36]); jQuery('#Rich_Web_Sl_DS_Arr_HBgC').val(arr[37]); jQuery('#Rich_Web_Sl_DS_Nav_W').val(arr[38]); jQuery('#Rich_Web_Sl_DS_Nav_H').val(arr[39]); jQuery('#Rich_Web_Sl_DS_Nav_PB').val(arr[40]); jQuery('#Rich_Web_Sl_DS_Nav_BW').val(arr[41]); jQuery('#Rich_Web_Sl_DS_Nav_BS').val(arr[42]); jQuery('#Rich_Web_Sl_DS_Nav_BC').val(arr[43]); jQuery('#Rich_Web_Sl_DS_Nav_BR').val(arr[44]); jQuery('#Rich_Web_Sl_DS_Nav_C').val(arr[45]); jQuery('#Rich_Web_Sl_DS_Nav_HC').val(arr[46]); jQuery('#Rich_Web_Sl_DS_Nav_CC').val(arr[47]);
			}
			else if(arr[2]=='Thumbnails Slider & Lightbox')
			{
				jQuery('.rich_web_SaveSl_Table_2_8').show();

				if(arr[9]=='true'){ jQuery('#Rich_Web_Sl_TSL_BoxShShow').attr('checked',true); }else{ jQuery('#Rich_Web_Sl_TSL_BoxShShow').attr('checked',false); }
				if(arr[10]=='true'){ jQuery('#Rich_Web_Sl_TSL_BoxShType').attr('checked',true); }else{ jQuery('#Rich_Web_Sl_TSL_BoxShType').attr('checked',false); }
				if(arr[14]=='true'){ jQuery('#Rich_Web_Sl_TSL_TA').attr('checked',true); }else{ jQuery('#Rich_Web_Sl_TSL_TA').attr('checked',false); }
				if(arr[15]=='true'){ jQuery('#Rich_Web_Sl_TSL_AP').attr('checked',true); }else{ jQuery('#Rich_Web_Sl_TSL_AP').attr('checked',false); }
				if(arr[16]=='true'){ jQuery('#Rich_Web_Sl_TSL_PH').attr('checked',true); }else{ jQuery('#Rich_Web_Sl_TSL_PH').attr('checked',false); }
				if(arr[17]=='true'){ jQuery('#Rich_Web_Sl_TSL_Loop').attr('checked',true); }else{ jQuery('#Rich_Web_Sl_TSL_Loop').attr('checked',false); }
				if(arr[20]=='true'){ jQuery('#Rich_Web_Sl_TSL_Nav_Show').attr('checked',true); }else{ jQuery('#Rich_Web_Sl_TSL_Nav_Show').attr('checked',false); }
				if(arr[29]=='true'){ jQuery('#Rich_Web_Sl_TSL_SS_Show').attr('checked',true); }else{ jQuery('#Rich_Web_Sl_TSL_SS_Show').attr('checked',false); }
				if(arr[36]=='true'){ jQuery('#Rich_Web_Sl_TSL_Arr_Show').attr('checked',true); }else{ jQuery('#Rich_Web_Sl_TSL_Arr_Show').attr('checked',false); }
				if(arr[54].length != 7){ jQuery('#Rich_Web_Sl_TSL_CIC').val(arr[54]+')'); }else{ jQuery('#Rich_Web_Sl_TSL_CIC').val(arr[54]); }
				if(arr[41].length != 7){ jQuery('#Rich_Web_AnSL_L3_T').val(arr[41]+')'); }else{	jQuery('#Rich_Web_AnSL_L3_T').val(arr[41]); }
				jQuery('#Rich_Web_Sl_TSL_W').val(arr[3]); jQuery('#Rich_Web_Sl_TSL_H').val(arr[4]); jQuery('#Rich_Web_Sl_TSL_BW').val(arr[5]); jQuery('#Rich_Web_Sl_TSL_BS').val(arr[6]); jQuery('#Rich_Web_Sl_TSL_BC').val(arr[7]); jQuery('#Rich_Web_Sl_TSL_BR').val(arr[8]); jQuery('#Rich_Web_Sl_TSL_BoxSh').val(arr[11]); jQuery('#Rich_Web_Sl_TSL_BoxShC').val(arr[12]); jQuery('#Rich_Web_Sl_TSL_CM').val(arr[13]); jQuery('#Rich_Web_Sl_TSL_PT').val(arr[18]); jQuery('#Rich_Web_Sl_TSL_CS').val(arr[19]); jQuery('#Rich_Web_Sl_TSL_Nav_W').val(arr[21]); jQuery('#Rich_Web_Sl_TSL_Nav_H').val(arr[22]); jQuery('#Rich_Web_Sl_TSL_Nav_PB').val(arr[23]); jQuery('#Rich_Web_Sl_TSL_Nav_BC').val(arr[24]); jQuery('#Rich_Web_Sl_TSL_Nav_BR').val(arr[25]); jQuery('#Rich_Web_Sl_TSL_Nav_CBC').val(arr[26]); jQuery('#Rich_Web_Sl_TSL_Nav_HBC').val(arr[27]); jQuery('#Rich_Web_Sl_TSL_Nav_Pos').val(arr[28]); jQuery('#Rich_Web_Sl_TSL_SS_W').val(arr[30]); jQuery('#Rich_Web_Sl_TSL_SS_H').val(arr[31]); jQuery('#Rich_Web_Sl_TSL_SS_BC').val(arr[32]); jQuery('#Rich_Web_Sl_TSL_SS_BR').val(arr[33]); jQuery('#Rich_Web_Sl_TSL_SS_StC').val(arr[34]); jQuery('#Rich_Web_Sl_TSL_SS_SpC').val(arr[35]); jQuery('#Rich_Web_Sl_TSL_Arr_Type').val(arr[37]); jQuery('#Rich_Web_Sl_TSL_Arr_S').val(arr[38]); jQuery('#Rich_Web_Sl_TSL_Arr_C').val(arr[39]); jQuery('#Rich_Web_Sl_TSL_Pop_OvC').val(arr[40]); jQuery('#Rich_Web_Sl_TSL_Pop_BW').val(arr[41]); jQuery('#Rich_Web_Sl_TSL_Pop_BS').val(arr[42]); jQuery('#Rich_Web_Sl_TSL_Pop_BC').val(arr[43]); jQuery('#Rich_Web_Sl_TSL_Pop_BR').val(arr[44]); jQuery('#Rich_Web_Sl_TSL_Pop_BgC').val(arr[45]); jQuery('#Rich_Web_Sl_TSL_TFS').val(arr[46]); jQuery('#Rich_Web_Sl_TSL_TFF').val(arr[47]); jQuery('#Rich_Web_Sl_TSL_TC').val(arr[48]); jQuery('#Rich_Web_Sl_TSL_Pop_ArrType').val(arr[49]); jQuery('#Rich_Web_Sl_TSL_Pop_ArrS').val(arr[50]); jQuery('#Rich_Web_Sl_TSL_Pop_ArrC').val(arr[51]); jQuery('#Rich_Web_Sl_TSL_CIT').val(arr[52]); jQuery('#Rich_Web_Sl_TSL_CIS').val(arr[53]); 
			}
			else if(arr[2]=='Accordion Slider')
			{
				jQuery('.rich_web_SaveSl_Table_2_9').show();
				jQuery('#Rich_Web_AcSL_W').val(arr[3]); jQuery('#Rich_Web_AcSL_H').val(arr[4]); jQuery('#Rich_Web_AcSL_BW').val(arr[5]); jQuery('#Rich_Web_AcSL_BS').val(arr[6]); jQuery('#Rich_Web_AcSL_BC').val(arr[7]); jQuery('#Rich_Web_AcSL_BSh').val(arr[8]); jQuery('#Rich_Web_AcSL_BShC').val(arr[9]); jQuery('#Rich_Web_AcSL_Img_W').val(arr[10]); jQuery('#Rich_Web_AcSL_Img_BSh').val(arr[11]); jQuery('#Rich_Web_AcSL_Img_BShC').val(arr[12]); jQuery('#Rich_Web_AcSL_Title_FS').val(arr[13]); jQuery('#Rich_Web_AcSL_Title_FF').val(arr[14]); jQuery('#Rich_Web_AcSL_Title_C').val(arr[15]); jQuery('#Rich_Web_AcSL_Title_TSh').val(arr[16]); jQuery('#Rich_Web_AcSL_Title_TShC').val(arr[17]); jQuery('#Rich_Web_AcSL_Title_BgC').val(arr[18]); jQuery('#Rich_Web_AcSL_Link_FS').val(arr[19]); jQuery('#Rich_Web_AcSL_Link_FF').val(arr[20]); jQuery('#Rich_Web_AcSL_Link_C').val(arr[21]); jQuery('#Rich_Web_AcSL_Link_TSh').val(arr[22]); jQuery('#Rich_Web_AcSL_Link_TShC').val(arr[23]); jQuery('#Rich_Web_AcSL_Link_BgC').val(arr[24]); 
			}
			else if(arr[2]=='Animation Slider')
			{
				jQuery('.rich_web_SaveSl_Table_2_10').show(); 
				if(arr[12]=='true'){ jQuery('#Rich_Web_AnSL_SSh').attr('checked',true); }else{ jQuery('#Rich_Web_AnSL_SSh').attr('checked',false); }
				if(arr[21]=='true'){ jQuery('#Rich_Web_AnSL_N_Sh').attr('checked',true); }else{ jQuery('#Rich_Web_AnSL_N_Sh').attr('checked',false); }
				if(arr[30]=='true'){ jQuery('#Rich_Web_AnSL_Ic_Sh').attr('checked',true); }else{ jQuery('#Rich_Web_AnSL_Ic_Sh').attr('checked',false); }
				jQuery('#Rich_Web_AnSL_W').val(arr[3]); jQuery('#Rich_Web_AnSL_H').val(arr[4]); jQuery('#Rich_Web_AnSL_BW').val(arr[5]); jQuery('#Rich_Web_AnSL_BS').val(arr[6]); jQuery('#Rich_Web_AnSL_BC').val(arr[7]); jQuery('#Rich_Web_AnSL_BR').val(arr[8]); jQuery('#Rich_Web_AnSL_BSh').val(arr[9]); jQuery('#Rich_Web_AnSL_ShC').val(arr[10]); jQuery('#Rich_Web_AnSL_ET').val(arr[11]); jQuery('#Rich_Web_AnSL_SShChT').val(arr[13]); jQuery('#Rich_Web_AnSL_T_FS').val(arr[14]); jQuery('#Rich_Web_AnSL_T_FF').val(arr[15]); jQuery('#Rich_Web_AnSL_T_C').val(arr[16]); jQuery('#Rich_Web_AnSL_T_BgC').val(arr[17]); jQuery('#Rich_Web_AnSL_T_TA').val(arr[18]); jQuery('#Rich_Web_AnSL_T_Sh').val(arr[19]); jQuery('#Rich_Web_AnSL_T_ShC').val(arr[20]); jQuery('#Rich_Web_AnSL_N_S').val(arr[22]); jQuery('#Rich_Web_AnSL_N_BW').val(arr[23]); jQuery('#Rich_Web_AnSL_N_BC').val(arr[24]); jQuery('#Rich_Web_AnSL_N_BgC').val(arr[25]); jQuery('#Rich_Web_AnSL_N_BS').val(arr[26]); jQuery('#Rich_Web_AnSL_N_HBgC').val(arr[27]); jQuery('#Rich_Web_AnSL_N_CC').val(arr[28]); jQuery('#Rich_Web_AnSL_N_M').val(arr[29]); jQuery('#Rich_Web_AnSL_Ic_T').val(arr[31]); jQuery('#Rich_Web_AnSL_Ic_S').val(arr[32]); jQuery('#Rich_Web_AnSL_Ic_C').val(arr[33]); jQuery('#Rich_Web_AnSL_L_BgC').val(arr[34]); jQuery('#Rich_Web_AnSL_L_T').val(arr[35]); jQuery('#Rich_Web_AnSL_L_FS').val(arr[36]); jQuery('#Rich_Web_AnSL_L_FF').val(arr[37]); jQuery('#Rich_Web_AnSL_L_C').val(arr[38]); jQuery('#Rich_Web_AnSL_L1_T').val(arr[39]); jQuery('#Rich_Web_AnSL_L2_T').val(arr[40]); jQuery('#Rich_Web_AnSL_L3_T').val(arr[41]);
			}
			rangeSlider();
			jQuery( 'input.alpha-color-picker' ).alphaColorPicker();
			jQuery('.wp-color-result').attr('title','Select');
			jQuery('.wp-color-result').attr('data-current','Selected');
		})
		setTimeout(function(){
			jQuery('.Table_Data_rich_web1_2').css('display','none');
			jQuery('.JAddSlider2').addClass('JAddSlider2Anim');
			jQuery('.Table_Data_rich_web2_2').css('display','block');
			jQuery('.JUpdateSlider2').addClass('JSaveSlider2Anim');
			jQuery('.JCanselSlider2').addClass('JCanselSlider2Anim');			
		},500)		
	}	
	function rich_web_Copy_Sl2(rich_web_Slider_ID)
	{
		var ajaxurl = object.ajaxurl;
		var data = {
			action: 'rich_web_Copy_Sl2', // wp_ajax_my_action / wp_ajax_nopriv_my_action in ajax.php. Can be named anything.
			foobar: rich_web_Slider_ID, // translates into $_POST['foobar'] in PHP
		};
		jQuery.post(ajaxurl, data, function(response) {
			location.reload();
		})
	}
	var rangeSlider = function()
	{  
		var slider = jQuery('.range-slider'), range = jQuery('.range-slider__range'), value = jQuery('.range-slider__value');     
		slider.each(function()
		{   
			value.each(function()
			{   
				var value = jQuery(this).prev().attr('value');
			    jQuery(this).html(value);
			});    
			range.on('input', function()
			{      
				jQuery(this).next(value).html(this.value);
			});  
		});
	};
	rangeSlider();
</script>