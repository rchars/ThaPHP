<html>
	<head>
		<title>PHP 2</title>
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
			function z1($index) {
				$rand_arr = array();
				for($x = 0; $x <= $index; $x++) {
					$rand_arr[$x] = rand();
				}
				return $rand_arr[$index];
			}
			function z2($country) {
				$yes = array(
					"Poland" => "Pole",
					"Czechia" =>  "Czech",
					"Germany" => "German",
					"Ukraine" => "Ukrainian"
				);
				return $yes[$country];
			}
			$index = 10;
			$result_1 = z1($index);
			$country = "Czechia";
			$person = z2($country);
			echo <<< END
				<p>
					2.1:</br>
					index $index, num: $result_1</br>
					2.2:</br>
					Country: $country, person $person:
				</p>
			END;
		?>
	</body>
</html>
