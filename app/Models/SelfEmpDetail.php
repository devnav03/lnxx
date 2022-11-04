<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class SelfEmpDetail extends Model
{
    protected $fillable = [ 'customer_id', 'org_name', 'nature_business', 'year_business', 'annual_gross_income',
 'annual_gross_expenses', 'annaul_net_income', 'trade_licence_no', 'insurance_date', 'exp_date', 'created_at', 'updated_at' ];
}

 