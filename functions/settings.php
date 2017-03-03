<?php

try{
	$misc_config = file_get_contents('misc_config.txt');
	$rows = explode("\n", $misc_config);
	array_shift($rows);
	$info_config[0] = "There is an error parsing config.txt";

		$n=0;
		foreach ($rows as $row => $data) {
			//get row data
			$row_data = explode(': ', $data);
			$info_config[$n] = $row_data[1];
			
			if($info_config[$n]=="" || $info_config[$n]==null){
				$myvar = "";
				switch ($n) {
					case 0:
						$myvar = "Website Name";
						break;
					case 1:
						$myvar = "Website Icon";
						break;
					case 2:
						$myvar = "Official Logo";
						break;
					case 3:
						$myvar = "Style Folder";
						break;
					default:
						# code...
						break;
				}
				echo "Error in miscellaneous configuration file. Could not get $myvar Please check misc_config.txt.";
				die();
			}

			$n++;
		}

			#--Configuration Variables--#
			$WebsiteName = $info_config[0];
			$WebsiteIcon =  clean($info_config[1]);
			$OfficialLogo =  clean($info_config[2]);
			$UIFolder =  clean($info_config[3]);
			$bootStrap = clean($info_config[4]);
			$bootStrapJs = clean($info_config[5]);
			$jQuery = clean($info_config[6]);
			#--End of Configuration Variables--#

			

			#echo "CompanyName:".$CompanyName;
			#echo "Database:".$dbPass;
	}catch(Exception $ex){
		print("Error parsing config.\n$ex");
	}

?>
