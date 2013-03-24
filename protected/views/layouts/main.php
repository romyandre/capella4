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
         <li class='has-sub'><a href='#'><span>Accounting</span></a>
            <ul>
               <li><a href='#'><span>Package Manager</span></a></li>
               <li><a href='#'><span>User Account</span></a></li>
            </ul>
         </li>
      </ul>
   </li>
   <li class='has-sub'><a href='#'><span>System</span></a>
      <ul>
         <li class='has-sub'><a href='#'><span>Administration</span></a>
            <ul>
               <li><a href='#'><span>Package Manager</span></a></li>
               <li><a href='#'><span>User Account</span></a></li>
               <li><a href='#'><span>User Account</span></a></li>
               <li><a href='index.php?r=site/logout'><span>User Logout</span></a></li>
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
		'containment'=>array(0,50,800,600)
    ),
));
    echo "<a href='#'><img src='".Yii::app()->request->baseUrl."/images/".$menu->menuaccess->iconfile."'></img></a>";
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
      <img src="<?php echo Yii::app()->theme->baseurl?>/desktop.png" />
    </a>
</div>


</body>
</html>
