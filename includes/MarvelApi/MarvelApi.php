<?php 
require_once 'CallerApi.php';
/**
* 
*/
class MarvelApi extends CallerApi
{
	protected const PUBLIC_KEY = 'aab3f9edd62f8057a22899436e759360';
	private const PRIVATE_KEY = 'fcd79adf39dec64b646df4298b7e7342dc02c96c';
	protected const BASE_URL = 'http://gateway.marvel.com/v1/public/';

	function __construct()
	{	
		$auth = $this->authenticate();
		
		parent::__construct(
			self::BASE_URL, 
			array('Accept' => '*/*'), 
			$auth
		);
	}

	private function authenticate()
	{
		$timestamp = time();

		return array(
			'ts' => $timestamp,
			'apikey' => self::PUBLIC_KEY,
			'hash' => md5($timestamp . self::PRIVATE_KEY . self::PUBLIC_KEY)
		);
	}

	public function getCharacters($name = '', $nameStartsWith = '', $modifiedSince = '', $comics = 0, $series = 0, $events = 0, $stories = 0, $orderBy = '', $limit = 0, $offset = 0)
	{
		$params = array_filter(array(
			'name' => $name,
			'nameStartsWith' => $nameStartsWith,
			'modifiedSince' => $modifiedSince,
			'comics' => $comics,
			'series' => $series,
			'events' => $events,
			'stories' => $stories,
			'orderBy' => $orderBy,
			'limit' => $limit,
			'offset' => $offset
		));

		parent::requestApi('characters', $params);
	}

}
?>