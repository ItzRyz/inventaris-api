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
        $data = InventoryDetail::select("statusid", DB::raw("COUNT(*) as total"))->groupBy(["statusid"])->get();
        $chartData = $data->map(function ($item) {
            return [
                'status' => $item->statusid,
                'count' => $item->total,
            ];
        });

        return response()->json($chartData);
    }

    public function countPenempatan(Request $req) {
        $inventories = DB::table('t_inv_dt')
            ->selectRaw('COUNT(*) AS total_count')
            ->selectRaw('COUNT(*) FILTER (WHERE pjid IS NULL) AS belum_count')
            ->selectRaw('COUNT(*) FILTER (WHERE pjid IS NOT NULL) AS sudah_count')
            ->first();
        
        return response()->json($inventories, 200);
    }
}
