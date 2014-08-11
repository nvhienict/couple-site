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
		$id=Input::get('id');
		$id_user = Cookie::get('id-user');
        $item_last=UserBudget::where('category',$id)->get()->last();
		$budget=new UserBudget();
		$budget->item="New Item";
		$budget->user=$id_user;
		$budget->category=$id;
		$budget->estimate="$0.00";
		$budget->actual="$0.00";
		$budget->pay="$0.00";
		$budget->note="";
		$budget->save(); 
		$item=UserBudget::get()->last();
		if(!empty($item->note)){
			$itemHtml='<a href="#" class="budget_icon_notes" data-toggle="modal"  data-target="#'.$item->id.'" ><i class="glyphicon glyphicon-comment"></i></a>';
		}
		else{
			$itemHtml='<a href="#" class="budget_icon_note" data-toggle="modal"  data-target="#'.$item->id.'" ><i class="glyphicon glyphicon-comment"></i></a>';
		}
		$html = '';
		$html .= '<tr id="budget_item_cat'.$item->id.'" class="budget_item_cat'.$item->category.'">
			<td>
			'. $itemHtml .'
 				<div class="modal fade" id="'.$item->id.'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				  <div class="modal-dialog">
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				        <h4 class="modal-title" id="myModalLabel">Notes</h4>
				      </div>
				      <form action="'. Asset('notes').'" method="post">
				      <div class="modal-body">
				        <div class="form-group">
				          <div class="row">
				            <div class="col-md-2">
				          	 <label for="note" class="control-label" >Notes</label>
				            </div>
				            <div class="col-md-10">
				            	<input type="text" hidden name="id" value="'.$item->id.'">
				          	<textarea id="note" name="note" rows="8" cols="35" class="form-control note" >'. $item->note .'</textarea>
				            </div>
				            
				          </div>
				        </div>
				      </div>
				      <div class="modal-footer">
				        <button type="submit" class="btn btn-primary">Lưu Note</button>
				        <a href=""> Huỷ </a>
				      </div>
				  </form>
				    </div>
				  </div>
				</div>
			</td>
			<td>
				<div>
			 		<a onclick="item_click('.$item->id.')" class="'.$item->id.'show_item">'.$item->item.'</a>
				    <input  onchange="item_change('.$item->id.')"  ondblclick="item_dblclick('.$item->id.')"  type="text" value="'.$item->item.'" name="item" class="'.$item->id.'item" style="width:150px;display:none;" >
					<input type="hidden" value="'.$item->id.'" name="'.$item->id.'">
					<p style="display:none;color:red;" class="item_error'.$budget->id.'">Item không được trống</p>
			 	</div>
			</td>
			<td class="TienVND">
				<div id="edit-money" > 
					<a hreft="" class="'.$item->id.'_show_hide">
						'.number_format(($item->actual),0, ',', ' ').' VND
					</a>
					<input type="number" class="'.$item->id.'_slidingDiv form-control input-edit-money" id="'.$item->id.'money" name="money" value="'.$item->actual.'">
					<input type="text" hidden name="'.$item->id.'" value="'.$item->id.'">
				</div>
			</td>
			<td class="TienVND">
 				<div  > 
					<a hreft="" class="'.$item->id.'Pay" >
						'.number_format(($item->pay),0, ',', ' ').' VND
					</a>
					<input type="number" class="'.$item->id.'Estimate form-control input-edit-money" id="'.$item->id.'estimate" name="estimate" value="'.$item->pay .'">
					<input type="text" hidden name="'.$item->id.'" value="'.$item->id.'">
				</div>
 			</td>
			<td class="Due'.$item->id.' TienVND">'.number_format((($budget->actual)-($budget->pay)),0, ',', ' ') .' VND</td>
			
			<td>
				<a href="" onclick="item_del('.$item->id.')" class="confirm budget_icon_trash item_del'.$item->id.'"><i class="glyphicon glyphicon-trash"></i></a>
				<input type="hidden" name="'.$item->id.'" value="'.$item->id.'" >
			</td>
		</tr>';
		echo json_encode(array('item_last'=>$item_last->id,'item'=>$item->id,'html'=>$html));die();
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
	
    public function update()
	{     
	    $id=Input::get('id');
	    $name=Input::get('item');
		$budget=UserBudget::find($id);
		$budget->item=$name;
		$budget->save();
		
	}
	public function delete()
	{
	    $id_user = Cookie::get('id-user');
		$id=Input::get('id');
		$estimate_input=Input::get('estimate');
		$item=UserBudget::find($id);
		$catid=$item->category;
		$item->delete();
		$re_estimate=(User::find($id_user)->budget) - $estimate_input;
	      $user=User::find($id);
	       $user->budget=$$re_estimate;
	       $user->save();
          echo json_encode(array('catid'=>'$catid','re_estimate'=>$re_estimate));die();


		
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