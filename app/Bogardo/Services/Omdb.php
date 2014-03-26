<?php


namespace Bogardo\Services;

use GuzzleHttp\Client;

class Omdb {

	protected $client;

	public function __construct()
	{
		$this->_setClient();
	}

	protected function _setClient()
	{
		$this->client = new Client([
			'base_url' => ["http://omdbapi.com",[]],
			'defaults' => [
				'query' => [
					'plot' => 'short',
					'tomatoes' => true
				]
			]
		]);
	}

	public function search($searchquery)
	{
		$response = $this->client->get("/", [
			'query' => [
				's' => $searchquery
			]
		]);
		$result = $response->json();

		$result = $this->movie($result['Search'][0]['imdbID']);

		return $result;


//		$total = (int)$result['total'];
//
//		switch ($total) {
//
//			case 0:
//				return false;
//				break;
//
//			case 1:
//				return $result['movies'][0];
//				break;
//
//			default:
//				return $result['movies'];
//				break;
//		}
	}

	public function movie($id)
	{
		$response = $this->client->get("/", [
			'query' => [
				'i' => $id
			]
		]);
		$result = $response->json();

		return $result;
	}

}
