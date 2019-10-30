<?php 
/**
* 
*/
class CallerApi
{
	protected $url;
	protected $headers;
	protected $params;
	private $auth;

	function __construct($url, $header = array(), $auth = array())
	{
		$this->setUrl($url);
		$this->setHeaders($header);
		// TODO: implement a setHeaders E-TAG
		// TODO: implement a setHeaders GZIP
		$this->auth = $auth;
	}

	protected function requestApi($endpoint = '', $params = array())
	{	
		$this->setParams($params);
		
		if (filter_var($endpoint, FILTER_VALIDATE_URL))
			$url = $endpoint;
		else
			$url = $this->getUrl() . $endpoint;

		$curl = curl_init();

		$options = array(
			CURLOPT_URL => $url . $this->getQueryParams(),
			CURLOPT_HTTPHEADER => $this->getHeaders(),
		);
		curl_setopt_array($curl, $options);

		$result = curl_exec($curl);
		$error = curl_error($curl);

		curl_close($curl);

		if ($error)
  			$result = $error;
		
		return $result;
	}

	public function getUrl()
	{
		return $this->url;
	}

	protected function setUrl($url)
	{	
		$this->url = $url;
	}

	protected function getQueryParams()
	{
		$params = array_merge($this->params, $this->auth);
		return '?' . http_build_query($params);
	}

	public function getParams()
	{
		return $this->params;
	}

	protected function setParams($params = array())
	{
		$this->params = $params;
	}

	public function getHeaders()
	{
		return $this->headers;
	}

	protected function setHeaders($header = array())
	{
		$this->headers = $header;
	}
}
?>