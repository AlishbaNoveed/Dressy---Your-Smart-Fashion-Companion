<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Order;
use Carbon\Carbon;

class AdminReportController extends Controller
{
    public function monthlyReport()
    {
        $from = Carbon::now()->startOfMonth();
        $to   = Carbon::now()->endOfMonth();
        return $this->generateReport($from, $to, 'Monthly_Report.pdf');
    }

    public function customReport(Request $request)
    {
        $request->validate([
            'from' => 'required|date',
            'to'   => 'required|date|after_or_equal:from',
        ]);

        $from = Carbon::parse($request->from)->startOfDay();
        $to   = Carbon::parse($request->to)->endOfDay();

        return $this->generateReport($from, $to, 'Custom_Report.pdf');
    }

    private function generateReport($from, $to, $filename)
    {
        $orders = Order::with('transaction')
            ->whereBetween('created_at', [$from, $to])
            ->orderBy('created_at', 'DESC')
            ->get();

        $approvedOrders = $orders->filter(function ($order) {
            return optional($order->transaction)->status === 'approved';
        });

        $pendingOrders = $orders->filter(function ($order) {
            return optional($order->transaction)->status === 'pending';
        });

        $approvedAmount = $approvedOrders->sum('total');
        $pendingAmount  = $pendingOrders->sum('total');
        $totalAmount    = $orders->sum('total');

        // 💰 Desired revenue (what you hoped to earn)
        $desiredRevenue = 10000;

        $profit = $approvedAmount - $desiredRevenue;
        $loss   = $profit < 0 ? abs($profit) : 0;
        $profit = $profit > 0 ? $profit : 0;

        $summary = [
            'total'             => $orders->count(),
            'delivered'         => $orders->where('status', 'delivered')->count(),
            'canceled'          => $orders->where('status', 'canceled')->count(),
            'pending'           => $orders->where('status', 'ordered')->count(),

            'cod'               => $orders->where('transaction.mode', 'cod')->count(),
            'stripe'            => $orders->where('transaction.mode', 'stripe')->count(),

            'delivered_total'   => $orders->where('status', 'delivered')->sum('total'),
            'canceled_total'    => $orders->where('status', 'canceled')->sum('total'),
            'pending_total'     => $orders->where('status', 'ordered')->sum('total'),

            'revenue'           => $approvedAmount,
            'pending_amount'    => $pendingAmount,
            'total_amount'      => $totalAmount,

            'desired_revenue'   => $desiredRevenue,
            'profit'            => $profit,
            'loss'              => $loss,
        ];

        $pdf = Pdf::loadView('admin.reports.order-report', [
            'orders'  => $orders,
            'from'    => $from->format('Y-m-d'),
            'to'      => $to->format('Y-m-d'),
            'summary' => $summary,
        ]);

        return $pdf->download($filename);
    }
}
