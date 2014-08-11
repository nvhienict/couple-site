<?php

class UserBudgetController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
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

	public function updateNote(){
		$id=Input::get('id');
		$note=Input::get('note');
		UserBudget::where('id',$id)->update(array('note' => $note));
		return Redirect::route('budget');
	}

	public function editExpected(){//chi phi du kien

	}

	public function editActual(){
		$actual = Input::get('actual');
		$id=Input::get('id');
		UserBudget::where('id',$id)->update(array("actual"=>$actual));	
		UserBudgetController::getSummaryUserBudget($id);
	}
	public function editPay(){
		$pay = Input::get('pay');
		$id=Input::get('id');
		UserBudget::where('id',$id)->update(array("pay"=>$pay));
		UserBudgetController::getSummaryUserBudget($id);
	}

	public function getSummaryUserBudget($budgetID){
		$userID = User::find(Cookie::get('id-user'))->id;

		//current Budget
		$userBudget = UserBudget::find($budgetID);
		$categoryID = $userBudget->category;
		$budgetActual = $userBudget->actual;
		$budgetPay = $userBudget->pay;
		$budgetDue = $budgetActual - $budgetPay;

		//current Category
		$budgetDK = array('user'=>$userID, 'category'=>$categoryID);
		$totalActual = UserBudget::where($budgetDK)->sum('actual');
		$totalPay = UserBudget::where($budgetDK)->sum('pay');
		$totalDue = $totalActual - $totalPay;

		//all summary
		$sumExpected = (User::find($userID)->budget) * 1000000;
		$sumActual = UserBudget::where('user',$userID)->sum('actual');
		$sumPay = UserBudget::where('user',$userID)->sum('pay');
		$sumDue = $sumActual - $sumPay;

		$task=array(
			'budgetID'=>$budgetID, 'categoryID'=>$categoryID, 'budgetDue'=>$budgetDue,
			'totalActual'=>$totalActual, 'totalPay'=>$totalPay, 'totalDue'=>$totalDue,
			'sumExpected'=>$sumExpected, 'sumActual'=>$sumActual, 'sumPay'=>$sumPay, 'sumDue'=>$sumDue
		);
		echo json_encode($task);
		exit();
	}
}