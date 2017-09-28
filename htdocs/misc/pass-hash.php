<?php
$string = isset($_GET['string']) ? $_GET['string'] : false;
$sha1 = isset($_GET['string']) ? sha1($_GET['string']) : false ;
$crypt = isset($_GET['string']) ? crypt($_GET['string']) : false ;
$base64 = isset($_GET['string']) ? base64_encode($_GET['string']) : false ;
$algos = hash_algos();

$algo_const = array();
if(defined(PASSWORD_BCRYPT)) $algo_const['PASSWORD_BCRYPT'] = PASSWORD_BCRYPT;
if(defined(PASSWORD_DEFAULT)) $algo_const['PASSWORD_DEFAULT'] = PASSWORD_DEFAULT;

// $algos = array();
// foreach ($hash_algos as $algo)
// {
// 	list($a,$b) = explode(",", $algo);
// 	$algos[] = $a;
// }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
	"http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<title>
			PHP hash
		</title>
		<style type="text/css" media="screen">
		table.hash_table th{
			text-align: right;
		}
		table.hash_table td{
			font-family: monospace;
		}
		</style>
	</head>
	<body>
		<form method="get">
			<p>
				<input size="80" type='text' name='string' value='<?php echo $string ?>' id='string'>
				&nbsp;&nbsp;
				<input type='submit' value='Get hash'>
			</p>
			<table border="1" cellspacing="0" cellpadding="5" class="hash_table" bordercolor="black">
				<tr>
					<th>crypt(string)</th>
					<td><?php echo $crypt ?></td>
				</tr>
			<?php if (function_exists('password_hash')): ?>
				<?php foreach ($algo_const as $key => $value): ?>
					<tr>
						<th>
							password_hash(string, <?php echo $key ?>)
						</th>
						<td>
							<?php echo password_hash($string, $value) ?>
						</td>
					</tr>
				<?php endforeach ?>
			<?php endif ?>
				<tr>
					<th>base64_encode(string)</th>
					<td><?php echo $base64 ?></td>
				</tr>
				<tr>
					<th>sha1(string)</th>
					<td><?php echo $sha1 ?></td>
				</tr>
				<?php
				foreach ($algos as $algo)
				{
						echo "<tr>\n".
							"<th>hash(\"{$algo}\", string)</th>".
							"<td>".hash($algo, $string)."</td>".
							"</tr>\n";
				}
				?>
			</table>
		</form>
	</body>
</html>
