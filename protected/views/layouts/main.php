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
	$this->beginWidget('zii.widgets.jui.CJuiDraggable',array(
    'options'=>array(
		'containment'=>[0,50,800,600]
    ),
));
    echo "<a href='index.php?r=".$menu->menuaccess->menuurl."'><img src='".Yii::app()->request->baseUrl."/images/".$menu->menuaccess->iconfile."'></img></a>";
	$this->endWidget();
	}
?>
</div>
<script>
$("#cssmenu").bind("contextmenu", function(e) {
    return false;
});
$("#desktop").bind("contextmenu", function(e) {
    return false;
});
</script>


</body>
</html>
