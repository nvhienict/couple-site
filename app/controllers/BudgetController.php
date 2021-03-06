<?php

class BudgetController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$budget = User::find(UserBudgetController::id_user())->budget;
		if($budget == 0)
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
		$user=User::find(UserBudgetController::id_user());
		$user->budget=$money_budget;
		$user->save();
		$budgets = Budget::get();
		if(($money_budget>0)&&($money_budget<150000000)){
			// truyền dữ liệu sang bảng userbudget
			foreach($budgets as $budget){
				$userbudget = new UserBudget();
				$userbudget->user = UserBudgetController::id_user();
				$userbudget->estimate = ($money_budget*($budget->range1)*(Category::find($budget->category)->range1));
				$userbudget->category = $budget->category;
				$userbudget->item = $budget->item;
				$userbudget->range=$budget->range1;
				$userbudget->save();

			}
			
		}
		elseif(($money_budget>=150000000)&&($money_budget<300000000)){
			// truyền dữ liệu sang bảng userbudget
			foreach($budgets as $budget){
				$userbudget = new UserBudget();
				$userbudget->user = UserBudgetController::id_user();
				$userbudget->estimate = ($money_budget*($budget->range2)*(Category::find($budget->category)->range2));
				$userbudget->category = $budget->category;
				$userbudget->item = $budget->item;
				$userbudget->range=$budget->range2;
				$userbudget->save();

			}
			
		}
		elseif($money_budget>=300000000){
			// truyền dữ liệu sang bảng userbudget
			foreach($budgets as $budget){
				$userbudget = new UserBudget();
				$userbudget->user = UserBudgetController::id_user();
				$userbudget->estimate =($money_budget*($budget->range3)*(Category::find($budget->category)->range3));
				$userbudget->category = $budget->category;
				$userbudget->item = $budget->item;
				$userbudget->range=$budget->range3;
				$userbudget->save();

			}
	
		}
		return Redirect::route('budget');							
	}
	public function resetBudget()
	{
		$user=User::find(UserBudgetController::id_user());
		$user->budget=0;
		UserBudget::where("user",UserBudgetController::id_user())->delete();
		$user->save();
		return Redirect::to("creat_budget");
	}
	public static function rangeBudget($range){
		 if($range>0&&$range<150000000)
		 	return 1;
		 elseif($range<300000000)
		 	return 2;
		 elseif($range>=300000000)
		 	return 3;
	}

}
