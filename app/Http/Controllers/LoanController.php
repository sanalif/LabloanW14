<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    public function return($loanId)
    {
        DB::transaction(function () use ($loanId) {

            $loan = Loan::where('id', $loanId)
                        ->where('status', 'borrowed')
                        ->lockForUpdate()
                        ->firstOrFail();

            // update status peminjaman
            $loan->update([
                'status' => 'returned',
                'return_date' => now()
            ]);

            // tambah stok barang
            $loan->item->increment('stock');
        });

        return back()->with('success', 'Barang berhasil dikembalikan');
    }
}


