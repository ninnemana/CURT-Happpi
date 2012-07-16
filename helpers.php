<?php


class Helper{

	public function curlGet($request = ""){
		if(strlen($request) > 0){
			$session = curl_init($request);

			curl_setopt($session, CURLOPT_HEADER, false);
			curl_setopt($session, CURLOPT_RETURNTRANSFER, true);

			$response = curl_exec($session);
			curl_close($session);

			return $response;
		}else{
			return "";
		}
	}
}

?>