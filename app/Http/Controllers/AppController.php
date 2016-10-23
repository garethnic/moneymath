<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class AppController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Return app view
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showApp(Request $request)
    {
        return view('index');
    }

    /**
     * Add Income
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
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
            return response()->json([
                'success' => 'Income saved!',
                'identifier' => $income->id
            ], 200);
        } else {
            return response()->json(['error' => 'Income not saved!', 500]);
        }
    }

    public function editIncome(Request $request)
    {
        $user = $request->user();
        $income = $user->incomes()->find($request->id);

        $this->validate($request, [
            'name' => 'required',
            'amount' => 'required|numeric'
        ]);

        $income->update([
            'name' => $request->name,
            'amount' => $request->amount
        ]);

        if ($income) {
            return response()->json([
                'success' => 'Income updated!',
                'identifier' => $income->id
            ], 200);
        } else {
            return response()->json(['error' => 'Income not updated!', 500]);
        }
    }

    public function editIncomeName(Request $request)
    {
        $user = $request->user();
        $income = $user->incomes()->find($request->id);

        $this->validate($request, [
            'name' => 'required',
            'amount' => 'required|numeric'
        ]);

        $income->update([
            'name' => $request->name,
            'amount' => $request->amount
        ]);

        if ($income) {
            return response()->json([
                'success' => 'Income updated!',
                'identifier' => $income->id
            ], 200);
        } else {
            return response()->json(['error' => 'Income not updated!', 500]);
        }
    }

    /**
     * Return Incomes
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getIncome(Request $request)
    {
        $user = $request->user();
        $incomes = $user->incomes()->get();

        return response()->json(['income' => $incomes], 200);
    }

    /**
     * Delete Income
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteIncome(Request $request)
    {
        $user = $request->user();

        if ($user->incomes()->find($request->item)->delete()) {
            return response()->json(['success' => 'Item removed!'], 200);
        } else {
            return response()->json(['error' => 'Item was not removed!', 500]);
        }
    }

    /**
     * Add Expense
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
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
            return response()->json([
                'success' => 'Expense saved!',
                'identifier' => $expense->id
            ], 200);
        } else {
            return response()->json(['error' => 'Expense not saved!', 500]);
        }
    }

    public function editExpense(Request $request)
    {
        $user = $request->user();
        $income = $user->expenses()->find($request->id);

        $this->validate($request, [
            'name' => 'required',
            'amount' => 'required|numeric'
        ]);

        $income->update([
            'name' => $request->name,
            'amount' => $request->amount
        ]);

        if ($income) {
            return response()->json([
                'success' => 'Expense updated!',
                'identifier' => $income->id
            ], 200);
        } else {
            return response()->json(['error' => 'Expense not updated!', 500]);
        }
    }

    public function editExpenseName(Request $request)
    {
        $user = $request->user();
        $income = $user->expenses()->find($request->id);

        $this->validate($request, [
            'name' => 'required',
            'amount' => 'required|numeric'
        ]);

        $income->update([
            'name' => $request->name,
            'amount' => $request->amount
        ]);

        if ($income) {
            return response()->json([
                'success' => 'Expense updated!',
                'identifier' => $income->id
            ], 200);
        } else {
            return response()->json(['error' => 'Expense not updated!', 500]);
        }
    }

    /**
     * Return Expenses
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getExpense(Request $request)
    {
        $user = $request->user();
        $expenses = $user->expenses()->get();

        return response()->json(['expenses' => $expenses], 200);
    }

    /**
     * Delete Expense
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteExpense(Request $request)
    {
        $user = $request->user();

        if ($user->expenses()->find($request->item)->delete()) {
            return response()->json(['success' => 'Item removed!'], 200);
        } else {
            return response()->json(['error' => 'Item was not removed!', 500]);
        }
    }

    /**
     * Update Summary
     *
     * Not added to frontend
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateSummary(Request $request)
    {
        $user = $request->user();

        $summary = $user->summary()->first();

        if (count($summary) < 1) {
             $summary = $user->summary()->create([
                        'total' => $request->total
                    ]);
        } else {
            $summary->total += (int) $request->total;
            $user->summary()->save($update);
        }

        if ($summary) {
            return response()->json(['success' => 'Overview updated!'], 200);
        } else {
            return response()->json(['error' => 'Overview not updated!', 500]);
        }
    }

    /**
     * Return Summary
     *
     * Not added to frontend
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getSummary(Request $request)
    {
        $user = $request->user();
        $summary = $user->summary()->first();

        return response()->json(['summary' => $summary], 200);
    }
}
