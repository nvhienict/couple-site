<?php

class FortuneController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getIndex()
	{
		//return view fortune/index
		return View::make('fortune.index');
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

	/**
	* convert year to year Can-Chi
	*
	*/ 
	public static function convertYear($year)
	{
		$CAN = array('Giáp','Ất','Bính','Đinh','Mậu','Kỷ','Canh','Tân','Nhâm','Quý');
		$CHI = array('Tý','Sửu','Dần','Mão','Thìn','Tỵ','Ngọ','Mùi','Thân','Dậu','Tuất','Hợi');

		$yearCanChi 	= $CAN[($year+6) % 10]."&nbsp".$CHI[($year+8) % 12];

		return $yearCanChi;

	}

	/**
	* Return nam hung nien
	*
	*/ 
	private static function model($model)
	{
		return $tbl = new $model();
	}

	/**
	* Return data table fthungnien
	*
	*/ 
	public static function getHungNien()
	{
		$obj 		= FortuneController::model('FtHungNien');
		$arData 	= $obj->get();

		return $arData;
	}

	/**
	* Return data table ftnamtuoi
	*
	*/ 
	public static function getNamTuoi()
	{
		$obj 		= FortuneController::model('FtNamTuoi');
		$arData 	= $obj->get();

		return $arData;
	}

	/**
	* ajax post yearCanChi
	*
	*/ 
	public function postYear()
	{
		$year_can_chi_chu_re 	= Input::get('groom');
		$year_can_chi_co_dau 	= Input::get('bride');

		$xem_ngay 		= new FtXemNgay();

		$tuoi_xung_khac_chu_re = $xem_ngay->where('ngay_thang_nam', $year_can_chi_chu_re)->get()->first()->tuoi_xung_khac;
		$tuoi_xung_khac_co_dau = $xem_ngay->where('ngay_thang_nam', $year_can_chi_co_dau)->get()->first()->tuoi_xung_khac;

		$tuoi_xung_khac_chu_re = explode(',', $tuoi_xung_khac_chu_re);
		$tuoi_xung_khac_co_dau = explode(',', $tuoi_xung_khac_co_dau);

		return Response::json(
				['chu_re' => $tuoi_xung_khac_chu_re, 
				'co_dau' => $tuoi_xung_khac_co_dau]
			);

	}

	/**
	* create Session year groom and bride
	*
	*/ 
	public static function postYearGroom()
	{
		$year 	= Input::get('year');

		$xem_ngay 				= new FtXemNgay();
		$tuoi_xung_khac_chu_re	= $xem_ngay->where('ngay_thang_nam', $year)->get()->first()->tuoi_xung_khac;
		
		$gh = str_replace(' ', '&nbsp', $year);
		Session::put('tuoi_chu_re', $gh);
		Session::put('tuoi_xung_khac_chu_re', $tuoi_xung_khac_chu_re);
	}

	public static function postYearBride()
	{
		$year 	= Input::get('year');

		$xem_ngay 				= new FtXemNgay();
		$tuoi_xung_khac_co_dau 	= $xem_ngay->where('ngay_thang_nam', $year)->get()->first()->tuoi_xung_khac;
		
		$gh = str_replace(' ', '&nbsp', $year);
		Session::put('tuoi_co_dau', $gh);
		Session::put('tuoi_xung_khac_co_dau', $tuoi_xung_khac_co_dau);
	}


}
