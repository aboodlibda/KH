<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class TransactionsController extends Controller
{
    public function index()
    {
        $transactions = Transaction::all();
        return view('CMS.transactions.index',compact('transactions'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required|unique:menus,title',
            'description'=>'required',
        ]);
//        dd($request);

        $transaction = new Transaction();
        $transaction ->title=$request->get('title');
        $transaction ->description=$request->get('description');
        if ($request->hasFile('image')){
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
            $request->image->move(public_path('transactions_images/'), $imageName);
            $transaction->image=($imageName);
        }
        $transaction->save();
        session()->flash('transaction_added');
        return redirect()->route('transactions.index');
    }

    public function show(Transaction $transaction)
    {
        //
    }

    public function edit(Transaction $transaction)
    {
        return view('CMS.transactions.edit',compact('transaction'));
    }

    public function update(Request $request, Transaction $transaction)
    {
        $request->validate([
            'title'=>'required|min:10',
            'description'=>'required'

        ]);

        if ($request->hasFile('image')){
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
            $request->image->move(public_path('transactions_images/'), $imageName);
            $transaction->image=($imageName);
        }
        $transaction->title = $request->get('title');
        $transaction->description = $request->get('description');
        $transaction->save();
        session()->flash('transaction_updated');
        return redirect()->route('transactions.index');
    }

    public function destroy(Request $request)
    {
        $transaction = Transaction::findOrFail($request->id);
        $transaction->delete();
        session()->flash('transaction_deleted');
        return redirect()->route('transactions.index');
    }
}
