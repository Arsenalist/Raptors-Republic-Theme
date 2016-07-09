<html>
<head>
</head>
<body>
<table>

<?php
  $users = array('chrisbosh', 'demar_derozan', 'sonny13', '13pob13', 'jarrettjack03', 'reggieevans30', 'swirsk054', 'jalenrose', 'mopete24', 'uconn42', 'amp1808', 'jermaineoneal', 'cv31', 'theofficialP21', 'matrix31', 'muggsybogues');

?>
<table>
<?php for ($i=0; $i<count($users); $i++) { ?>

		<?php if ($i %2 == 0) { ?>
			<tr>
		<? } ?>



<td>

<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,124,0" width="32"5 height="350" id="TwitterWidget" align="middle">
            	<param name="allowScriptAccess" value="always" />
            	<param name="allowFullScreen" value="false" />
            	<param name="movie" value="http://static.twitter.com/flash/widgets/profile/TwitterWidget.swf" />
            	<param name="quality" value="high" />
            	<param name="bgcolor" value="#000000" />
            	<param name="FlashVars" value="userID=1199081&styleURL=http://static.twitter.com/flash/widgets/profile/smooth.xml">
            	<embed src="http://static.twitter.com/flash/widgets/profile/TwitterWidget.swf" quality="high" bgcolor="#000000" width="290" height="350" name="TwitterWidget" align="middle" allowScriptAccess="sameDomain" allowFullScreen="false" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" FlashVars="userID=<?php echo $users[$i];?> &styleURL=http://static.twitter.com/flash/widgets/profile/smooth.xml"/>
            </object>

</td>

		<?php if ($i %2 == 1) { ?>
			</tr>
		<? } ?>


<?php }?>

</table>
</body>
</html>

