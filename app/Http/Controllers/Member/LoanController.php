<?php

namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Loan;
use App\Member;

class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $loans = auth()->user()->member->loans()->paginate(1);
        return view('member.loans.index', compact('loans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Fetch all members except the logged member
        $members = Member::where('id', '!=', auth()->user()->member->id)->get();
        return view('member.loans.create', compact('members'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'regular' => 'required_without_all:short_term,pre_joining,productive,special,appliance,petty_cash',
            'short_term' => 'required_without_all:regular,pre_joining,productive,special,appliance,petty_cash',
            'pre_joining' => 'required_without_all:regular,short_term,productive,special,appliance,petty_cash',
            'productive' => 'required_without_all:regular,short_term,pre_joining,special,appliance,petty_cash',
            'special' => 'required_without_all:regular,short_term,pre_joining,productive,appliance,petty_cash',
            'petty_cash' => 'required_without_all:regular,short_term,pre_joining,productive,special,appliance',
            'payment_terms' => 'required',
            'co_maker_id' => 'required',
            'company_contact_number' => 'required',
            'monthly_income' => 'required',
            'take_home_pay' => 'required',
            'sss_gsis' => 'required',
            'residence_telephone_number' => 'required',
        ], [
            'co_maker_id.required' => 'Co-maker is required.',
        ])->validate();

        $loan = Loan::create([
            'member_id' => auth()->user()->member->id,
            'co_maker_id' => $request->co_maker_id,

            'regular' => $request->regular ?: 0,
            'short_term' => $request->short_term ?: 0,
            'pre_joining' => $request->pre_joining ?: 0,
            'productive' => $request->productive ?: 0,
            'special' => $request->special ?: 0,
            'appliance' => $request->appliance ?: 0,
            'petty_cash' => $request->petty_cash ?: 0,

            'total_requested_amount' => $this->totalRequestedAmount($request),

            'company_contact_number' => $request->company_contact_number,
            'monthly_income' => $request->monthly_income,
            'take_home_pay' => $request->take_home_pay,
            'sss_gsis' => $request->sss_gsis,
            'residence_telephone_number' => $request->residence_telephone_number,

            'payment_terms' => $request->payment_terms
        ]);

        // Add the loan code after the loan has persisted.
        $loan->update([
            'code' => $this->generateLoanCode($loan),
        ]);

        // Since most of the properties of credit evaluation are nullable
        // we can persist the record right after the loan has persisted.
        $loan->creditEvaluation()->create([
            'member_id' => $loan->member_id,
        ]);



        return redirect()->route('member.loans.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Loan $loan)
    {
        $loan = $loan->load(['coMaker', 'member', 'creditEvaluation', 'paymentSchedule.paymentDueDates']);

        return view('member.loans.show', compact('loan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Return total requested amount from fields
     *
     * \Illuminate\Http\Request  $request
     * @return int $totalRequestedAmount
     */
    public function totalRequestedAmount($request)
    {
        return ($request->regular ?: 0) + ($request->short_term ?: 0) +
            ($request->pre_joining ?: 0) + ($request->productive ?: 0) +
            ($request->special ?: 0) + ($request->appliance ?: 0) +
            ($request->petty_cash ?: 0);
    }

    /**
     * Return total requested amount from fields
     *
     * @param App\Loan $loan
     * @return String
     */
    public function generateLoanCode($loan)
    {
        return 'L' . sprintf('%04d', $loan->member_id)
            . '-' . sprintf('%04d', $loan->co_maker_id)
            . '-' . sprintf('%04d', $loan->id);
    }
}
