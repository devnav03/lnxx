<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class CustomerOnboarding extends Model
{
    protected $fillable = [ 'user_id', 'salutation', 'last_name', 'cm_type', 'first_name_as_per_passport',  'nationality', 'visa_number', 'date_of_birth', 'marital_status', 'years_in_uae', 'passport_photo', 'reference_number', 'officer_email', 'eid_number', 'ref_id', 'consent_form', 'created_at', 'no_of_dependents', 'video', 'credit_score', 'updated_at'];


    public function store($inputs, $id = null)  {
        if ($id) {
            return $this->find($id)->update($inputs);
        } else {
            return $this->create($inputs)->id;
        }
    }


}

 