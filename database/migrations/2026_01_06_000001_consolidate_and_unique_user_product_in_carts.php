<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // Consolidate existing duplicate rows: sum quantities per user/product
        $duplicates = DB::table('carts')
            ->select('user_id', 'product_id', DB::raw('SUM(quantity) as total_qty'), DB::raw('MIN(id) as keep_id'))
            ->groupBy('user_id', 'product_id')
            ->havingRaw('COUNT(*) > 1')
            ->get();

        foreach ($duplicates as $dup) {
            // update the row to keep with summed quantity
            DB::table('carts')->where('id', $dup->keep_id)->update(['quantity' => $dup->total_qty]);
            // delete other duplicates
            DB::table('carts')->where('user_id', $dup->user_id)->where('product_id', $dup->product_id)->where('id', '<>', $dup->keep_id)->delete();
        }

        // ensure there is at most one row per user/product by adding a unique index
        if (! Schema::hasColumn('carts', 'user_product_unique')) {
            // In some DBs you need to name the index
            Schema::table('carts', function (Blueprint $table) {
                $table->unique(['user_id', 'product_id'], 'carts_user_product_unique');
            });
        }
    }

    public function down()
    {
        if (Schema::hasColumn('carts', 'user_product_unique')) {
            Schema::table('carts', function (Blueprint $table) {
                $table->dropUnique('carts_user_product_unique');
            });
        }
    }
};
