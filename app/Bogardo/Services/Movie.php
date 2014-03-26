<?php


namespace Bogardo\Services;


class Movie {

	protected $rottentomatoesService;

	protected $omdbService;

	protected $service;

	public function __construct()
	{
		//$this->service = new Themoviedb();

		$this->service = new Rottentomatoes();

//		$this->omdbService = new Omdb();
//		$this->themoviedb = new Themoviedb();
//		$this->rottentomatoesService = new Rottentomatoes();
	}

	public function search($query)
	{
		$searchResults = $this->service->search($query);

		//$searchResults = $this->rottentomatoesService->search($query);
		return $searchResults;
	}

	public function movie($id)
	{
		return $this->service->movie($id);
	}

} 