<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{

    public function index()
    {

        $transactions = Transaction::with('user')->latest()->paginate(20);
        return view('admin.transaction.index', compact('transactions'));

    }

    public function update(Request $request, $id)
    {
        $transaction = Transaction::findOrFail($id);

        $transaction->update([
            'state' => !$transaction->state
        ]);

        return redirect()->back();
    }


    public function destroy($id)
    {
        Transaction::findOrFail($id)->delete();

        return redirect()->back();
    }
}
