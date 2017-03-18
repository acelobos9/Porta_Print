<?php

function createRandomPassword() {
					$chars = "QWERTYUIOPASDFGHJKLZXCVBNM";
					srand((double)microtime()*1000000);
					$i = 0;
					$pass = '' ;
					while ($i <= 2) {
						$num = rand(0,25);
						$tmp = str_split($chars);
						$pass = $pass . $tmp[$num];
						$i++;
					}
					return $pass;
				}
function numberletter() {
					$chars = "0123456789";
					srand((double)microtime()*1000000);
					$i = 0;
					$passii = '' ;
					while ($i <= 2) {
						$num = rand(0,9);
						$tmp = str_split($chars);
						$passii = $passii . $tmp[$num];
						$i++;
					}
					return $passii;
				}


function getCode(){
	$letter = createRandomPassword();
	$ccnumbers = numberletter();
	$confirmation = $letter.'-'.$ccnumbers;
	return $confirmation;
}
?>