<?php 

namespace App\Http\Controllers;

use App\Http\Requests\CardRequest;
use App\Http\Repositories\CardRepository;

class CardController 
{
    private static $repository;

    public function index() {
        return view('card.index',['cards' => self::repository()->list()]);
    }
    public function create(CardRequest $request) {}
    public function edit($id) {}
    public function update(CardRequest $request, $id) {}
    public function delete($id) {}
    public function destroy($id) {}

    private static function repository()
    {
        if(!self::$repository)
            self::$repository = new CardRepository();

        return self::$repository;
    }
}