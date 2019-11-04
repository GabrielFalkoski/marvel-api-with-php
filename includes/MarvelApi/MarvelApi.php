<?php 
require_once 'CallerApi.php';

/**
 * An MarvelApi Class to return the content from https://developer.marvel.com/docs.
 *
 * @author     Gabriel Falkoski <https://github.com/gabrielfalkoski>
 */
class MarvelApi extends CallerApi
{
	/**
     * The Public Key from Marvel API.
     *
     * To get Marvel API Keys access https://developer.marvel.com/account.
     *
     * @var string
     */
	protected const PUBLIC_KEY = 'aab3f9edd62f8057a22899436e759360';

	/**
     * The Private Key from Marvel API.
     *
     * To get Marvel API Keys access https://developer.marvel.com/account.
     *
     * @var string
     */
	private const PRIVATE_KEY = 'fcd79adf39dec64b646df4298b7e7342dc02c96c';

	/**
     * The Base URL from Marvel API.
     *
     * This URL is used to get all Marvel API endpoints.
     *
     * @var string
     */
	protected const BASE_URL = 'http://gateway.marvel.com/v1/public/';

	/**
      * This method initialize the MarvelAPI Object.
	  *
      * @return void
      */
	function __construct()
	{	
		$auth = $this->authenticate();
		
		parent::__construct(
			self::BASE_URL, 
			array('Accept' => '*/*'), 
			$auth
		);
	}

	/**
      * This method sets the MarvelAPI authentication parameters.
      *
      * @return array the require parameters to connect with Marvel API
      */
	private function authenticate()
	{
		$timestamp = time();

		return array(
			'ts' => $timestamp,
			'apikey' => self::PUBLIC_KEY,
			'hash' => md5($timestamp . self::PRIVATE_KEY . self::PUBLIC_KEY)
		);
	}
	
	/**
      * This method returns the Marvel API Characters.
      *
      * @param array $parameters optional parameters to customize the search.
      *
      * @return String a curl_exec handle on success, curl_error handle on errors.
      */
	public function getCharacters($parameters = array())
	{
		return parent::requestApi('characters', $parameters);
	}

	/**
      * This method returns the Marvel API Character.
      *
      * @param int $characterId required character ID to search.
      *
      * @return String a curl_exec handle on success, curl_error handle on errors.
      */
	public function getCharacter($characterId = 0)
	{
		return parent::requestApi('characters/'.$characterId);
	}

}
?>