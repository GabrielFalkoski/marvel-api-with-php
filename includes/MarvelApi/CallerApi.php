<?php 
/**
 * An CallerApi to create a connection and return data with PHP cURL.
 *
 * @author     Gabriel Falkoski <https://github.com/gabrielfalkoski>
 */
class CallerApi
{
	/**
     * The URL to connection.
     *
     * @var string
     */
	protected $url;

	/**
     * The Headers to connection.
     *
     * @var array
     */
	protected $headers;

	/**
     * The Auth Parameters to connection.
     *
     * @var array
     */
	private $auth;

	/**
     * The Parameters to connection.
     *
     * @var array
     */
	protected $params;

	/**
      * This method initialize the CallerApi Object.
	  * 
	  * @todo implement a setHeaders E-TAG e GZIP
	  *
      * @return void
      */
	function __construct($url, $header = array(), $auth = array())
	{
		$this->setUrl($url);
		$this->setHeaders($header);
		$this->auth = $auth;
	}

	/**
      * This method returns the cURL response from connection.
      *
      * @param string $endpoint the endpoint to complete the url connection.
      * @param array  $params optional parameters to customize the connection.
      *
      * @return String a curl_exec handle on success, curl_error handle on errors.
      */
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
			CURLOPT_RETURNTRANSFER => true
		);
		curl_setopt_array($curl, $options);

		$result = curl_exec($curl);
		$error = curl_error($curl);

		curl_close($curl);

		if ($error)
  			$result = $error;
		
		return $result;
	}

	/**
      * This method returns the custom parameters merged with auth parameters.
      *
      * @return String
      */
	protected function getQueryParams()
	{
		$params = array_merge($this->params, $this->auth);
		return '?' . http_build_query($params);
	}

	public function getUrl()
	{
		return $this->url;
	}

	protected function setUrl($url)
	{	
		$this->url = $url;
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