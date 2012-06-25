<?php

namespace tapeplay\server\bll;

require_once("utility/DateUtil.php");

class Panda
{
	// tapeplay dev panda cloud: bdf2878be969369a634dbd9e37e67779

	// tapeplay prod panda cloud: bdf2878be969369a634dbd9e37e67779
	// tapeplay prod panda access: 1a606e06178431326acf
	// tapeplay prod panda secret: f222a3ded2dea6e338e2

	// TODO: Move to XML config file
	public static $API_HOST = "api.pandastream.com";
	public static $API_PORT = 80;
	public static $API_VERSION = 2;
	public static $PANDA_CLOUD_ID = "bdf2878be969369a634dbd9e37e67779";
	public static $PANDA_ACCESS_KEY = "ea0ca69968eb021963fb";
	public static $PANDA_SECRET_KEY = "572243fddc02e9b4d762";

	public function __construct()
	{
	}


	//////////////////////////////////////////////////////////
	// REST Functions
	//////////////////////////////////////////////////////////

	public function get($request_path, $params = array())
	{
		return $this->http_request("GET", $request_path, $params);
	}

	public function post($request_path, $params = array())
	{
		return $this->http_request("POST", $request_path, null, $params);
	}

	public function put($request_path, $params = array())
	{
		return $this->http_request("PUT", $request_path, null, $params);
	}

	public function delete($request_path, $params = array())
	{
		return $this->http_request("DELETE", $request_path, $params);
	}

	/**
	 * @return string The URL of the Panda API
	 */
	public function getAPIURL()
	{
		return "http://" . Panda::$API_HOST . ((Panda::$API_PORT != 80) ? (":" . Panda::$API_PORT) : "") . "/v" . Panda::$API_VERSION;
	}

	private function http_request($verb, $path, $query = null, $data = null)
	{
		$verb = strtoupper($verb);
		$path = self::canonical_path($path);
		$suffix = "";
		$signed_data = null;

		if ($verb == "POST" || $verb == "PUT")
		{
			$signed_data = $this->signed_query($verb, $path, $data);
		}
		else
		{
			$signed_query_string = $this->signed_query($verb, $path, $query);
			$suffix = "?" . $signed_query_string;
		}

		$url = $this->getAPIURL() . $path . $suffix;

		$curl = curl_init($url);

		if ($signed_data)
		{
			curl_setopt($curl, CURLOPT_POSTFIELDS, $signed_data);
		}

		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $verb);
		curl_setopt($curl, CURLOPT_PORT, Panda::$API_PORT);

		if (defined('CURLOPT_PROTOCOLS'))
		{
			curl_setopt($curl, CURLOPT_PROTOCOLS, CURLPROTO_HTTP);
		}

		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		// curl_setopt($curl, CURLOPT_VERBOSE, 1);

		$response = curl_exec($curl);

		curl_close($curl);

		return $response;
	}


	//////////////////////////////////////////////////////////
	// Authentication
	//////////////////////////////////////////////////////////

	public function signed_query($verb, $request_path, $params = array(), $timestamp = null)
	{
		return self::array2query($this->signed_params($verb, $request_path, $params, $timestamp));
	}

	/**
	 * @param $verb string GET, POST, DELETE or PUT.
	 * @param $request_path string The restful resource string.
	 * @param array $params array any additional parameters that we want to have signed into the REST request.
	 * @param null $timestamp
	 * @return array The default parameters need for a restful call, plus any additional params.
	 */
	public function signed_params($verb, $request_path, $params = array(), $timestamp = null)
	{
		$auth_params = $params;
		$auth_params["cloud_id"] = Panda::$PANDA_CLOUD_ID;
		$auth_params["access_key"] = Panda::$PANDA_ACCESS_KEY;
		$auth_params["timestamp"] = $timestamp ? $timestamp : date("c");
		$auth_params["signature"] = $this->generate_signature($verb, $request_path, array_merge($params, $auth_params));

		return $auth_params;
	}

	public static function signature_generator($verb, $request_path, $host, $secret_key, $params = array())
	{
		$string_to_sign = self::string_to_sign($verb, $request_path, $host, $params);
		$context = hash_init("sha256", HASH_HMAC, $secret_key);
		hash_update($context, $string_to_sign);
		return base64_encode(hash_final($context, true));
	}

	public function generate_signature($verb, $request_path, $params = array())
	{
		return self::signature_generator($verb, $request_path, Panda::$API_HOST, Panda::$PANDA_SECRET_KEY, $params);
	}

	public function string_to_sign($verb, $request_path, $host, $params = array())
	{
		$request_path = self::canonical_path($request_path);
		$query_string = self::canonical_querystring($params);
		$_verb = strtoupper($verb);
		$_host = strtolower($host);
		$string_to_sign = "$_verb\n$_host\n$request_path\n$query_string";
		return $string_to_sign;
	}

	//
	// Misc
	//

	private static function canonical_path($path)
	{
		return "/" . trim($path, " \t\n\r\0\x0B/");
	}

	private static function canonical_querystring($params = array())
	{
		ksort($params, SORT_STRING);
		return self::array2query($params);
	}

	private static function urlencode($str)
	{
		$ret = urlencode($str);
		$ret = str_replace("%7E", "~", $ret);
		$ret = str_replace("+", "%20", $ret);
		return $ret;
	}

	private static function array2query($array)
	{
		$pairs = array();
		foreach ($array as $key => $value)
		{
			$pairs[] = self::urlencode($key) . "=" . self::urlencode($value);
		}
		return join("&", $pairs);
	}
}

?>
