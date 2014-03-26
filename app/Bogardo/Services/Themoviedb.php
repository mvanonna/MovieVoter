<?php


namespace Bogardo\Services;

use GuzzleHttp\Client;

class Themoviedb {
	protected $client;

	private $_apikey;

	public function __construct()
	{
		$this->_apikey = \Config::get('movievote.apikey.themoviedb');
		$this->_setClient();
	}

	protected function _setClient()
	{
		$this->client = new Client([
			'base_url' => ["https://api.themoviedb.org/{version}/", [
				'version' => '3'
			]],
			'defaults' => [
				'query' => [
					'api_key' => $this->_apikey
				]
			]
		]);
	}

	public function search($searchquery)
	{
		$response = $this->client->get("search/movie", [
			'query' => [
				'query' => $searchquery
			]
		]);
		$result = $response->json();

		de($result);

		$total = (int)$result['total_results'];

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

	public function movie($id)
	{
		$response = $this->client->get("movie/{$id}");
		$result = $response->json();

		de($result);
	}

	public function config()
	{
		$response = $this->client->get("configuration");
		$result = $response->json();

		de($result);
	}

}
