 <?php

class HomeController extends BaseController {

	public function getIndex() {
		$items = Auth::user()->items;
	
		return View::make('home', array(
				'items' => $items
			));
	}

	public function postIndex() {
		$id = Input::get('id');
		

		$item = Item::findOrFail($id);

		if ($item->onwer_id == Auth::user()->id) {
			$item->mark();
		}

		return Redirect::route('home');
		
	}

	public function getNew() {
		return View::make('new');

	}

	public function postNew() {
		$rules = array('name' => 'required|min:3|max:255');
		$validator = Validator::make(Input::all(), $rules);
		
		if ($validator->fails()) {
			return Redirect::route('new')->withErrors($validator);
		}

		$item = new Item;
		$item->name = Input::get('name');
		$item->onwer_id = Auth::user()->id;;
		$item->save();

		return Redirect::route('home');
	}

	public function getDelete(Item $task) {
		if ($task->onwer_id == Auth::user()->id) {
		$task->delete();
	}

		return Redirect::route('home');
	}
	public function getUpdate($task) {
	    $task;
		return View::make('update')->with('up', $task);
	}
	public function postUpdate() {

		$newname = Input::get('name');
		$id = Input::get('id');

		$ini = Item::find($id);

			$ini->name = $newname;

			$ini->save(); 

			return Redirect::route('home');
	}

}
