<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/main.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>
<div id='cssmenu'>
<span class="float_right" id="clock"></span>
<ul>
	<li class='has-sub'><a href='#'><span>Application</span></a>
      <ul>
         <li class='has-sub'><a href='#'><span>Common</span></a>
         </li>
         <li class='has-sub'><a href='#'><span>Accounting</span></a>
         </li>
         <li class='has-sub'><a href='#'><span>Human Resource</span></a>
         </li>
         <li class='has-sub'><a href='#'><span>Purchasing</span></a>
         </li>
         <li class='has-sub'><a href='#'><span>Inventory</span></a>
         </li>
         <li class='has-sub'><a href='#'><span>Order Management</span></a>
         </li>
         <li class='has-sub'><a href='#'><span>Project Management</span></a>
         </li>
      </ul>
   </li>
   <li class='has-sub'><a href='#'><span>System</span></a>
      <ul>
         <li class='has-sub'><a href='#'><span>Object Authentication</span></a>
            <ul>
               <li><a href='#'><span><img src='<?php echo Yii::app()->request->baseurl;?>/images/menuaccess.png' />Package Manager</span></a></li>
               <li><a href='#'><span><img src='<?php echo Yii::app()->request->baseurl;?>/images/useraccess.png' />User Account</span></a></li>
               <li><a href='index.php?r=site/logout'><span><img src='<?php echo Yii::app()->request->baseurl;?>/images/userlogout.png' />User Logout</span></a></li>
            </ul>
         </li>
      </ul>
   </li>
   <li class='has-sub'><a href='#'><span>Help</span></a>
      <ul>
		<li><a href='index.php?r=site/about'><span>About</span></a></li>
		<li><a href='index.php?r=site/contact'><span>Contact</span></a></li>
		</ul>
	</li>
</ul>
</div>
<div id="menufile">
</div>
<div id="desktop">
<?php
$menus = Groupmenu::model()->findallbysql('select a.*
	from groupmenu a
	inner join menuaccess b on b.menuaccessid = a.menuaccessid
	inner join usergroup c on c.groupaccessid = a.groupaccessid
	inner join useraccess d on d.useraccessid = c.useraccessid
	inner join usermenu e on e.useraccessid = d.useraccessid and e.menuaccessid = b.menuaccessid
	where lower(d.username) = lower("'. Yii::app()->user->id.'") and a.isread = 1'); 

	foreach ($menus as $menu)
	{
	echo '<div id="icon">';
	$this->beginWidget('zii.widgets.jui.CJuiDraggable',array(
    'options'=>array(
		'containment'=>'#desktop'
    ),
));
    echo "<a href='#' onclick='loadmodule(".$menu->menuaccessid.")'><img src='".Yii::app()->request->baseUrl."/images/".$menu->menuaccess->iconfile."'></img></a>";
	echo '<div class="iconname">';
	echo $menu->menuaccess->description;
	echo '</div>';
	$this->endWidget();
	echo "</div>";
	}
?>
</div>
<div class="abs" id="bar_bottom">
    <a class="float_left" href="#" id="show_desktop" title="Show Desktop">
      <img src="<?php echo Yii::app()->theme->baseurl?>/images/show_desktop.png" />
    </a>
</div>
<?php
			$useraccess = Useraccess::model()->findbyattributes(array('username'=>Yii::app()->user->id));
			Yii::app()->theme = $useraccess->theme;
?>
<?php 
for ($i = 1; $i <= Yii::app()->params['maxform']; $i++) {
    $this->beginWidget('zii.widgets.jui.CJuiDialog', array( // the dialog
    'id'=>$i,
    'options'=>array(
        'autoOpen'=>false,
        'modal'=>false,
        'width'=>'auto',
        'height'=>'auto',
		'resizable'=>false,
		'close'=>'js:function(){ var ni = document.getElementById("module'.$i.'");
						ni.innerHTML = ""; }',
    ),
));?>
<div id='module<?php echo $i ?>'></div>
<?php $this->endWidget();
}
?>
<script type="text/javascript">
function loadmodule(value)
{
    <?php echo CHtml::ajax(array(
			'url'=>array('site/loadmodule'),
            'data'=> array('id'=>'js:value'),
            'type'=>'post',
            'dataType'=>'json',
            'success'=>"function(data)
            {
                if (data.status == 'success')
                {
					var x = 0;
					var ni = null;
					for (var i=1; i<=".Yii::app()->params['maxform']."; i++)
					{
						ni = document.getElementById('module'+i);
						if (ni !== null)
						{
							if (ni.innerHTML == '')
							{
								ni.innerHTML = data.div
								$('#'+i).dialog('option','title',data.modulename);
								$('#'+i).dialog('open');
								break;
							}
						}
					}
                }
            } ",
            ))?>;
    return false;
}
</script>
<script>
$(document).ready(function(){
$('#desktop').css("background-image", "url(<?php echo Yii::app()->request->baseurl.'/images/'.$useraccess->wallpaper ?>)");
});
</script>
</body>
</html>
