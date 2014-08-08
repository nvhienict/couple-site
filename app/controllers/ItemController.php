<?php

class ItemController extends \BaseController {

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
		
		$html = '';
		$html .= '<tr id="budget_item_cat'.$item->id.'" class="budget_item_cat'.$item->category.'">
			<td><a class="budget_icon_note" href="#"><i class="glyphicon glyphicon-comment"></i></a></td>
			<td>
				<div>
			 <a onclick="cl('.$item->id.')" class="'.$item->id.'_show_hide">'.$item->item.'</a> 
			 	
			    <input id="'.$item->id.'" onchange="v_fChange(this)"  ondblclick="db('.$item->id.')"  type="text" value="'.$item->item.'" name="item" class="'.$item->id.'_slidingDiv" style="width:150px;display:none;" >
				<input type="hidden" value="'.$item->id.'" name="'.$item->id.'">
			 </div>
			</td>
			<td>
			     <div>
			 <a onclick="cl1('.$item->id.')" class="'.$item->id.'_show_hide1">'.$item->estimate.'</a> 
			 	
			    <input id="'.$item->id.'" onchange="v_fChange1(this)" ondblclick="db1('.$item->id.')"  type="text" value="'.$item->estimate.'" name="estimate" class="'.$item->id.'_slidingDiv1" style="width:150px;display:none;" >
				<input type="hidden" value="'.$item->id.'" name="'.$item->id.'">
			 </div>
			</td>
			<td>
			    <div>
			 <a onclick="cl2('.$item->id.')" class="'.$item->id.'_show_hide2">'.$item->actual.'</a> 
			 	
			    <input  id="'.$item->id.'" onchange="v_fChange2(this)" ondblclick="db2('.$item->id.')"  type="text" value="'.$item->actual.'" name="actual" class="'.$item->id.'_slidingDiv2" style="width:150px;display:none;">
				<input type="hidden" value="'.$item->id.'" name="'.$item->id.'">
			 </div>
			</td>
			<td>0 VND</td>
			<td>0 VND</td>
			<td>
				<a class="budget_icon_trash" href="#"><i class="glyphicon glyphicon-trash"></i></a>
			</td>
		</tr>';
		echo json_encode(array('catid'=>$item->category,'iditem'=>$item->id,'html'=>$html));die();
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function delete($id)
	{
		//
		UserBudget::find($id)->delete();
		return Redirect::to('budget');


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
	{      $id=Input::get('id');
		   $name=Input::get('item');
		$budget=UserBudget::find($id);
		$budget->item=$name;
		$budget->save();
		
	}
	public function update1()
	{      $id=Input::get('id');
		   $estimate=Input::get('estimate');
		$budget=UserBudget::find($id);
		$budget->estimate=$estimate;
		$budget->save();
		
	}
	public function update2()
	{      $id=Input::get('id');
		   $actual=Input::get('actual');
		$budget=UserBudget::find($id);
		$budget->actual=$actual;
		$budget->save();
		
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


	
	

}
