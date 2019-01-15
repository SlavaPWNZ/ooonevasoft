<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Balance extends Model
{
    public $timestamps = FALSE;

    public function scopeSaveBalanceTable($query, $balanceHTML='Error. Null balance'){
        $row = new Balance;
        $row->balance = $balanceHTML;
        $row->ts = date(" Y-m-d H:i:s");
        $result=$row->save();
        return $result;
    }

    public function scopeGetBalanceTable(){
        $result=[];
        $i = 0;
        $rows= Balance::select('balance', 'ts')
            ->orderBy('id', 'desc')
            ->take(10)
            ->get();
        foreach ($rows as $row){
            $result[$i]['balance']=$row->balance;
            $result[$i]['ts']=$row->ts;
            $i++;
        }
        return $result;
    }
}
