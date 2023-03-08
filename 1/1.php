<html>
	<head>
		<title>PHP 1</title>
		<style>
			body {
				background-color: black;
				color: lime;
				text-align: center;
			}
		</style>
	</head>
	<body>
		<?php
			function simulate_throw() {
				return rand(1, 6);
			}
			function circle_calc($r) {
				return $r * 2;
			}
			function filter_bad($arr, $orig_str) {
				foreach($arr as $val) {
					$stars = str_repeat("*", strlen($val));
					$orig_str = str_ireplace($val, $stars, $orig_str);
				}
				return $orig_str;
			}
			function pesel_date($pesel_str) {
				$year = substr($pesel_str, 0, 2);
				$month = substr($pesel_str, 2, 2);
				$day = substr($pesel_str, 4, 2);
				$month_int = (int)$month;
				$con_year = '19';
				if(81 <= $month_int && $month_int <= 92) {
					$month_int -= 80;
					$con_year = '18';
				}
				elseif(21 <= $month_int && $month_int <= 32) {
					$month_int -= 20;
					$con_year = '20';
				}
				elseif(41 <= $month_int && $month_int <= 52) {
					$month_int -= 40;
					$con_year = '40';
				}
				elseif(61 <= $month_int && $month_int <= 72) {
					$month_int -= 60;
					$con_year = '60';
				}
				$year = $con_year.$year;
				$month = $month_int;
				$date = strtotime($year.'-'.$month.'-'.$day);
				$date = date('d F Y', $date);
				return $date;
			}
			function calc_square() {
				echo <<< END
					<form action="" method="POST">
						len:<input type="number" name="calc_square"/>
						<input type="submit" name="calc_square"/>
					</form>
				END;
				echo "<pre>";
				print_r($_POST);
				echo "</pre>";
				if(isset($_POST['calc_square'])) {
					$int_square = (int)$_POST['calc_square'];
					echo $int_square;
					return "Square area: $int_square";
				}
			}
			function calc_rectangle() {
				
			}
			function calc_trapezium() {
				
			}
			$x = simulate_throw();
			echo "<p>Zad 1.1: $x</p>";
			$x = circle_calc(12);
			echo "<p>Zad 1.2: 12 * 2 = $x</p>";
			$arr = array("rrrr", "XDDD");
			$joined_arr = join(", ", $arr);
			$orig_str = "oooo rrrr dddd a xddd";
			$x = filter_bad($arr, $orig_str);
			echo "<p>Zad 1.3:</br>Bad words list:$joined_arr</br>Original:$orig_str</br>After filtering:$x</p>";
			$old_pesel_str = "49040501580";
			$new_pesel_str = "11260911111";
			$x = pesel_date($old_pesel_str);
			$y = pesel_date($new_pesel_str);
			// no i chollera nie mogę tego policzyć
			echo <<< END
				<p>
					Zad 1.4:</br>
					old PESEL: $old_pesel_str</br>
					old DATE: $x</br>
					new PESEL: $new_pesel_str</br>
					new DATE: $y</br>
				</p>
			END;
			
			echo <<< END
				<p>
					Zad 1.5:</br>
					<form action="" method="POST">
						<label for="shapes">Choose a shape:</label>
						<select name="shapes">
							<option value="rectangle">rectangle</option>
							<option value="trapezium">trapezium</option>
							<option value="square">square</option>
						</select>
						<input type="submit"/>
					</form>
				</p>
			END;
			if(isset($_POST['shapes'])) {
				$result_str = "";
				switch($_POST['shapes']) {
					case 'rectangle':
						$result_str = calc_rectangle();
						break;
					case 'trapezium':
						$result_str = calc_trapezium();
						break;
					case 'square':
						$result_str = calc_square();
						break;
				}
				echo $result_str;
			}
		?>
	</body>
</html>
