<?php
function protean_font_option($selected=null){
	$html = '';
	$s="";
	$options = get_option('protean_theme_options');
	if(isset($options['fonts'])){
		$fonts = $options['fonts'];
		if(count($fonts)>0){
			foreach($fonts as $f){
				if($f==$selected)$s="selected='selected'";
				$html .= '<option value="'.$f.'" '.$s.'>'.str_replace('+',' ',$f).'</option>';
				$s="";
			}
		}
		return $html;
	}
}

function protean_font_manage(){
	$options = get_option('protean_theme_options');
	if(isset($options['fonts'])){
		$fonts = $options['fonts'];
		$html = '';
		if(count($fonts)>0){
			foreach($fonts as $f){
				$html .= '<li style="font-family:\''.preg_replace('/\:(.*)/','',str_replace('+',' ',$f)).'\'">'
				.str_replace('+',' ',$f)
				.'<input type="hidden" name="protean_theme_options[fonts][]" value="'.$f.'" />'
				.'<button type="button" class="button-secondary font_remove">Remove</button></li>';
			}
		}
		return $html;
	}
}

function protean_fontsize_option($selected=null){
	$sizes = array(9, 12, 14, 16, 18, 20, 22, 24, 26, 30, 34, 38, 42, 48, 52, 58, 62, 68, 72, 82, 92, 100, 110, 160, 200 );
	$s="";
	foreach($sizes as $size){
		if($size==$selected)$s="selected='selected'";
		else $s='';
		echo "<option value='".$size."' $s>".$size." px</option>";
		$s="";
	}
}

//Generate select options for line-height
function lineHeightOptions($selected=null){
	for($i=0;$i<=10;$i++){
		$size = (($i+2) * 2)/10;
		if($size==$selected)$s="selected='selected'";
		else $s='';
		echo "<option value='".$size."' $s>".$size." em</option>";
		$s="";
	}
}

//Generate select options for text-shadow
function textShadowOptions($selected=null){
	$options = array( 
		array('Blur dark','0.05em 0.05em 0.1em #222'), 
		array('Blur light','0.05em 0.05em 0.1em #eee'),
		array('Sharp dark','0.05em 0.05em 0em #222'),
		array('Sharp light','0.05em 0.05em 0em #eee'),
		array('Engraved dark','0px 1px 1px #222'),
		array('Engraved light','0px 1px 0px #eee'),
		array('Glow dark','1px 1px 0.3em #222'),
		array('Glow light','1px 1px 0.3em #eee')
	);
	foreach($options as $o){
		if($o[1]==$selected)$s="selected='selected'";
		else $s='';
		echo "<option value='".$o[1]."' $s>".$o[0]."</option>";
		$s="";
	}
}

function textAlign($selected=null){
	$options = array( 
		array('Left align','left'), 
		array('Right align','right'),
		array('Center align','center')
	);
	foreach($options as $o){
		if($o[1]==$selected)$s="selected='selected'";
		else $s='';
		echo "<option value='".$o[1]."' $s>".$o[0]."</option>";
		$s="";
	}
}

function bannerBorder($selected=null){
	$options = array( 
		array('0 px','0'), 
		array('1 px','1'), 
		array('2 px','2'),
		array('3 px','3'),
		array('4 px','4'), 
		array('5 px','5'),
		array('6 px','6'),
		array('7 px','7'), 
		array('8 px','8'),
		array('9 px','9'),
		array('10 px','10'),
	);
	foreach($options as $o){
		if($o[1]==$selected)$s="selected='selected'";
		else $s='';
		echo "<option value='".$o[1]."' $s>".$o[0]."</option>";
		$s="";
	}
}

function protean_savePreset($params,$presetname=null){
	if(!$presetname)$presetname='Unknow';
	$presets = get_option('protean_theme_presets');
	$presets[] = array(
		'name'=>$presetname,
		'font'=>$params['font'],
		'fontsize'=>$params['fontsize'],
		'color'=>$params['color'],
		'text'=>$params['text'],
		'link'=>$params['link'],
		'hover'=>$params['hover'],
		'primary_color'=>$params['primary_color'],
		'primary_text'=>$params['primary_text'],
		'primary_link'=>$params['primary_link'],
		'primary_hover'=>$params['primary_hover'],
		'accent_color'=>$params['accent_color'],
		'accent_text'=>$params['accent_text'],
		'accent_link'=>$params['accent_link'],
		'accent_hover'=>$params['accent_hover'],
		'bgimg'=>$params['bgimage'],
	);
	update_option('protean_theme_presets', $presets);
}