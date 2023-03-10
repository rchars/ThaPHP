<html>
	<head>
		<title>PHP 1</title>
		<style>
			body {
				background-color: black;
				color: lime;
			}
			table {
				border-collapse: collapse;
			}
			td {
				border: 1px solid;
				padding: 4px;
			}
		</style>
	</head>
	<body>
		<?php
			function z1($num_arr) {
				$result = NULL;
				for($i = 1; $i < sizeof($num_arr); $i++) {
					if($num_arr[$i] > $result) {
						$result = $num_arr[$i];
					}
				}
				$i = 0;
				while($i < sizeof($num_arr)) {
					if($num_arr[$i] > $result) {
						$result = $num_arr[$i];
					}
					$i++;
				}
				$i = 0;
				do {
					if($num_arr[$i] > $result) {
						$result = $num_arr[$i];
					}
					$i++;
				}
				while($i < sizeof($num_arr));
				foreach($num_arr as $i) {
					if($i > $result) {
						$result = $i;
					}
				}
				return $result;
			}
			function z2($throws) {
				$arr = array();
				for($i = 0; $i < $throws; $i++) {
					$arr[$i] = rand(1, 6);
				}
				return $arr;
			}
			function z3($x) {
				echo "<table>";
				for($i = 1; $i <= $x; $i++) {
					echo "<tr>";
					for($j = 1; $j <= $x; $j++) {
						echo "<td>".$j * $i."</td>";
					}
					echo "</tr>";
				}
				echo "</table>";
			}
			function z4($x) {
				class StructEmul {
					public $iters = 0;
					public $is_prime = "no";
				}
				$ret = new StructEmul();
				if($x <= 1) {
					return $ret;
				}
				for($i = $x - 1; $i > 1; $i--) {
					$ret -> iters++;
					if($x % $i == 0) {
						return $ret;
					}
				}
				$ret -> is_prime = "yes";
				return $ret;
			}
			$is_prime = z1(array(-124, -4234, -334, -2, -45353463634646436734, 0, 23522, 5453, 2134.545, 525423523652.23, 453.3445636));
			$throw_arr = implode(',', z2(5));
			echo <<< END
				<p>
					3.1:</br>
					lagrest: $result</br>
					3.2:</br>
					throws: $throw_arr</br>
					3.3:</br>
				</p>
			END;
			z3(12);
			$ret = z4(17);
			echo "<p>3.4:</br>";
			echo "is prime ? {$ret -> is_prime}</br>";
			echo "iterations count: {$ret -> iters}</br>";
			echo "</p>";
		?>
	</body>
</html>
