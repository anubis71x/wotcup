<?php
session_start();
$GLOBALS['prefix'] = "../";
require('./../conf/variables.php');
require_once 'security.inc.php';
require('./../top.php');

if (isset($_POST['submit'])) {
    $sql = "DELETE FROM $newstable WHERE news_id = '".$_POST['edit']."'";
    $result = mysql_query($sql);
    echo "<p class='header'>News deleted. <a href='./news-view.php'>Go back to the news list</a></p>";
} else {
?>
<form method="post">
<table border="0" cellpadding="0" width="100%">
<tr>
<td><p class="header">Delete "<?php echo $_GET['title'] ?>" news?</p></td>
</tr>
</table>
<p class="text">
<input type='hidden' name='edit' value="<?php echo $_GET['edit'] ?>">
<input type="Submit" name="submit" value="Delete" class="text"><br>
</form>
<?php
}
require('./../bottom.php');
?>