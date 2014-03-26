<?php namespace Bogardo\Services;

use GuzzleHttp\Client;

class Rottentomatoes
{
	protected $client;

	private $_apikey;

	public function __construct()
	{
		$this->_apikey = \Config::get('movievote.apikey.rottentomatoes');
		$this->_setClient();
	}

	protected function _setClient()
	{
		$this->client = new Client([
			'base_url' => ["http://api.rottentomatoes.com/api/{type}/{version}/", [
				'type' => 'public',
				'version' => 'v1.0'
			]],
			'defaults' => [
				'query' => [
					'apikey' => $this->_apikey,
					'_prettyprint' => false
				]
			]
		]);
	}

	public function search($searchquery, $page_limit = 10, $page = 1)
	{
		$response = $this->client->get("movies", [
			'query' => [
				'q' => $searchquery,
				'page_limit' => $page_limit,
				'page' => $page
			]
		]);
		$result = $response->json();

		$total = (int)$result['total'];

		switch ($total) {

			case 0:
				return false;
				break;

			case 1:
				return $result['movies'][0];
				break;

			default:
				return $result['movies'];
				break;
		}
	}


	public function test()
	{
		$response = $this->client->get("movies/770672122");

		echo '<pre>';
		print_r($response->json());
		exit;
	}


	public function movie($id)
	{
		var_dump($id);
	}

}