<?PHP
session_start();
$GLOBALS['prefix'] = "../";
require('./../conf/variables.php');
require_once 'security.inc.php';
require('./../top.php');

if (isset($_POST['submit'])) {
    $sql = "UPDATE $newstable SET date = '".$_POST['date']."', title = '".$_POST['titlenews']."', news = '".$_POST['news']."' WHERE news_id = '".$_POST['edit']."'";
    $result = mysql_query($sql);
    echo "<p class='header'>News edited.</p>";
} else {
    $sql = "SELECT * FROM $newstable WHERE news_id = '".intval($_GET['edit'])."'";
    $result = mysql_query($sql,$db);
    $row = mysql_fetch_array($result);
?>
<p class="header">Edit news:</p>
<form method="post">
<table border="0" cellpadding="0" width="100%">
<tr>
<td><p class="text">Date:</p></td>
</tr>
<tr>
<td><input type="Text" size="45" name="date" class="text" value="<?php echo "$row[date]" ?>"></td>
</tr>
<tr>
<td><p class="text">Title:</p></td>
</tr>
<tr>
<td><input type="Text" size="45" name="titlenews" class="text" value="<?php echo htmlentities($row['title']) ?>"></td>
</tr>
<tr>
<td><p class="text">Text:</p></td>
</tr>
<tr>
<td><textarea name="news" cols="45" rows="10" wrap="VIRTUAL"  class="text"><?php echo $row['news'] ?></textarea></td>
</td>
</tr>
<tr>
<td><p class="text"><br>
<table border="1" cellspacing="1" cellpadding="2">
<tr>
<td ><a onclick="picture()"><u>picture</u></a>
</td>
<td ><a onclick="ahref()"><u>link</u></a>
</td>
<td ><a onclick="italicThis()"><u><i>italic</i></u></a>
</td>
<td><a onclick="underlineThis()"><u>underline</u></a>
</td>
<td ><a onclick="boldThis()"><u><b>bold<b></u></a>
</td>
</tr>
</table>
</td></tr>
<tr><td height="5"></td></tr>
<tr><td>
<table border="1" cellspacing="1" cellpadding="2">
<tr>
<td align="center" ><img border="0" src="../graphics/smileys/smile.gif" width="15" height="15"></td>
<td align="center" ><img border="0" src="../graphics/smileys/sad.gif" width="15" height="15"></td>
<td align="center" ><img border="0" src="../graphics/smileys/biggrin.gif" width="15" height="15"></td>
<td align="center" ><img border="0" src="../graphics/smileys/cry.gif" width="15" height="15"></td>
<td align="center" ><img border="0" src="../graphics/smileys/none.gif" width="15" height="15"></td>
<td align="center" ><img border="0" src="../graphics/smileys/mad.gif" width="15" height="15"></td>
<td align="center" ><img border="0" src="../graphics/smileys/rolleyes.gif" width="15" height="15"></td>
<td align="center" ><img border="0" src="../graphics/smileys/laugh.gif" width="15" height="15"></td>
<td align="center" ><img border="0" src="../graphics/smileys/bigrazz.gif" width="15" height="15"></td>
<td align="center" ><img border="0" src="../graphics/smileys/dead.gif" width="15" height="15"></td>
<td align="center" ><img border="0" src="../graphics/smileys/wink.gif" width="15" height="15"></td>
<td align="center" ><img border="0" src="../graphics/smileys/bigeek.gif" width="15" height="15"></td>
<td align="center" ><img border="0" src="../graphics/smileys/cool.gif" width="15" height="15"></td>
<td align="center" ><img border="0" src="../graphics/smileys/no.gif" width="15" height="15"></td>
<td align="center" ><img border="0" src="../graphics/smileys/yes.gif" width="15" height="15"></td>
</tr>
<tr>
<td align="center" class="text">:)</td>
<td align="center" class="text">:(</td>
<td align="center" class="text">:d</td>
<td align="center" class="text">:'(</td>
<td align="center" class="text">:s</td>
<td align="center" class="text">:@</td>
<td align="center" class="text">:r</td>
<td align="center" class="text">:h</td>
<td align="center" class="text">:p</td>
<td align="center" class="text">:x</td>
<td align="center" class="text">;)</td>
<td align="center" class="text">:o</td>
<td align="center" class="text">:b</td>
<td align="center" class="text">(n)</td>
<td align="center" class="text">(y)</td>
</tr>
</table>
</td></tr>
</table>
<p class="text">
<input type='hidden' name='edit' value="<?php echo "$edit" ?>">
<input type="Submit" name="submit" value="Edit"  class="text"><br>
</form>
<?php
}
require('../bottom.php');
?>