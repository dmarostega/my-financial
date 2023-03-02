<?php 

namespace App\Http\Controllers;

use App\Http\Requests\CardRequest;
use App\Repositories\CardRepository;

class CardController extends Controller
{
    private static $repository;

    public function index() 
    {
        return view('card.index',['cards' => self::repository()->list(['financialEntity'])]);
    }

    public function create() 
    {
        return view('card.create', ['financialEntities' => self::repository()->listRelation('FinancialEntity')]);
    }

    public function store(CardRequest $request)
    {        
        self::repository()->save($request);
        return redirect()->route('cards');
    }
    
    public function edit($id) 
    {
        return view('card.edit', ['id' => $id, 'card' => self::repository()->find($id), 'financialEntities' => self::repository()->listRelation('FinancialEntity')]);
    }

    public function update(CardRequest $request, $id) 
    {
        self::repository()->update($request, $id);
        return redirect()->route('cards');
    }

    public function delete($id) 
    {
        $card = $this->repository()->find($id);
        return view('card.delete', ['card' => $card]);
    }

    public function destroy($id) 
    {
        self::repository()->find($id)->delete();

        return redirect()->route('cards');
    }

    private static function repository()
    {
        if(!self::$repository)
            self::$repository = new CardRepository();

        return self::$repository;
    }
}