<?php

namespace App\Http\Controllers;

use App\Models\Contracts\Repositories\IncomeRepository;
use Illuminate\Http\Request;

use App\Http\Requests;

class AppController extends Controller
{
    protected $income;

    public function __construct(IncomeRepository $income)
    {
        $this->income = $income;
    }

    public function addIncome(Request $request)
    {
        $user = $request->user();

        $this->validate($request, [
            'name' => 'required',
            'amount' => 'required|numeric'
        ]);

        $income = $user->incomes()->create([
            'name' => $request->name,
            'amount' => $request->amount
        ]);

        if ($income) {
            return response()->json(['success' => 'Income saved!'], 200);
        } else {
            return response()->json(['error' => 'Income not saved!', 500]);
        }
    }

    public function getIncome(Request $request)
    {
        $user = $request->user();
        $incomes = $user->incomes()->get();

        return response()->json(['income' => $incomes], 200);
    }

    public function addExpense(Request $request)
    {
        $user = $request->user();

        $this->validate($request, [
            'name' => 'required',
            'amount' => 'required|numeric'
        ]);

        $expense = $user->expenses()->create([
            'name' => $request->name,
            'amount' => $request->amount
        ]);

        if ($expense) {
            return response()->json(['success' => 'Expense saved!'], 200);
        } else {
            return response()->json(['error' => 'Expense not saved!', 500]);
        }
    }

    public function getExpense(Request $request)
    {
        $user = $request->user();
        $expenses = $user->expenses()->get();

        return response()->json(['expenses' => $expenses], 200);
    }
}
