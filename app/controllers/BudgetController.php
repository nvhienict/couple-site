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

	//Cuong
	public function post_MoneyBudget()
	{
			$money_budget=Input::get('money_budget');
		$user=User::find(Cookie::get('id-user'));
		$user->budget=$money_budget;
		$user->save();
		$budgets = Budget::get();
		foreach(BudgetRange::get() as $index=> $range){
			if($money_budget>=$range->min&&$money_budget<$range->max){
				foreach($budgets as $budget){
					$userbudget = new UserBudget();
					$userbudget->user = Cookie::get('id-user');
					$userbudget->category = $budget->category;
					$userbudget->item = $budget->item;
					$userbudget->range=$budget['range'.($index+1)];
					$category=Category::find($budget->category);
					$userbudget->estimate=$category['range'.($index+1)]*$money_budget*$budget['range'.($index+1)];
					$userbudget->save();
				}	
			}
		}
	return Redirect::route('budget');							
	}
	public function resetBudget()
	{
		$user=User::find(Cookie::get('id-user'));
		$user->budget=0;
		UserBudget::where("user",Cookie::get('id-user'))->delete();
		$user->save();
		return Redirect::to("creat_budget");
	}
	public static function rangeBudget($budget)
	{
		foreach(BudgetRange::get() as $index=> $range)
		if($budget>=$range->min&&$budget<$range->max) return ($index+1);
	}
	public static function round_up($money)
	{
		$x=round($money, 3);
		// $x=ceil($money/10)*10;
		return $x;
	}

}
