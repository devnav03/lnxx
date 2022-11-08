<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class CmSalariedDetail extends Model
{
    protected $fillable = [ 'customer_id', 'designation', 'date_of_joining', 'department', 'monthly_salary', 
    'staff_id_no', 'name_previous_emp', 'no_year_previous_emp', 'monthly_add_income', 
    'monthly_deductions', 'salary_pay_date', 'confirm_emp', 'work_exp', 'created_at', 'updated_at', 
  'multiple_passport_number'];


    public function store($inputs, $id = null)  {
        if ($id) {
            return $this->find($id)->update($inputs);
        } else {
            return $this->create($inputs)->id;
        }
    }


}

 