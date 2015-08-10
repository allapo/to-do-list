 <?php

class HomeController extends BaseController {

	public function getIndex() {
		$items = Auth::user()->items;


		return View::make('home', array(
				'items' => $items
			));
	}

}
