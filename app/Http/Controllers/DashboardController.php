<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\InventoryDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class DashboardController extends Controller
{
    function pieData(Request $req) {
        $data = InventoryDetail::select("m_status.nama as status", DB::raw("SUM(CAST(qty AS INT)) as total"))
            ->join("m_status", "m_status.id", "=", DB::raw("CAST(t_inv_dt.statusid AS BIGINT)"))
            ->groupBy("m_status.id", "m_status.nama")
            ->get();

        $chartData = $data->map(function ($item) {
            return [
                'status' => $item->status,
                'count' => $item->total,
            ];
        });

        return response()->json($chartData);
    }

    public function countPenempatan(Request $req) {
        $inventories = DB::table('t_inv_dt')
            ->selectRaw('SUM(CAST(qty AS INT)) AS total_count')
            ->selectRaw('SUM(CAST(qty AS INT)) FILTER (WHERE CAST(pjid AS INT) = 0) AS belum_count')
            ->selectRaw('SUM(CAST(qty AS INT)) FILTER (WHERE CAST(pjid AS INT) != 0) AS sudah_count')
            ->first();

        return response()->json($inventories, 200);
    }
}
