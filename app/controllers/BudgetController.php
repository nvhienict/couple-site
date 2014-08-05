<?php

class BudgetController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		// 
		
		if((User::where('id', Cookie::get('id-user'))->get()->first()->budget)==0)
		{
			return View::make('creat_budget');
		}
		else return View::make('budget');
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


	public function post_MoneyBudget()
	{
		$money_budget=Input::get('money_budget');

		if(($money_budget>0)&&($money_budget<150*10^6)){
			$id_money_budget=1;
			$range_cat=Category::get()->first()->range1;

			return View::make('budget')->with('money_budget', $money_budget)
										->with('range_cat', $range_cat);
		}
		elseif(($money_budget>=150*10^6)&&($money_budget<300*10^6)){
			$id_money_budget=2;
			$range_cat=Category::get()->first()->range2;
		}
		elseif($money_budget>=300*10^6){
			$id_money_budget=3;
			$range_cat=Category::get()->first()->range3;
		}



	}

}
