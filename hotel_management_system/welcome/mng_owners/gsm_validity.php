
<?php


			$number = $_POST['arguments'];
			$url = "https://api.numlookupapi.com/v1/validate/".$number."?apikey=TKGJwaO0DL15QuDRwgFmAovWce3mZUmDFsJNoIrC";

			$curl = curl_init($url);

			$resp = curl_exec($curl);


			/*

			foreach($resp as $x => $val) {
				if($val == 'true'){
					return 'yes';
				}elseif ($val == 'false') {
					return 'false';
				}			  
			}
			*/
			




?>