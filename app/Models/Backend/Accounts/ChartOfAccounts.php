<?php

namespace App\Models\Backend\Accounts;

use Illuminate\Database\Eloquent\Model;

class ChartOfAccounts extends Model
{
    protected $table = 'chart_of_accounts';

    protected $guarded = ['id'];

    public function parent() {
        return $this->belongsTo(ChartOfAccounts::class,'parent_id');
    }

    public function childs() {
        return $this->hasMany(ChartOfAccounts::class,'parent_id','id');
    }
}
