<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class CustomerOnboarding extends Model
{
    protected $fillable = [ 'user_id', 'salutation', 'middle_name', 'last_name', 'gender', 'cm_type', 'first_name_as_per_passport', 'embossing_name', 'mother_maiden_name', 
    'nationality', 'have_passport', 'passport_number', 'passport_expiry_date', 'have_visa', 'visa_sponsor',
   'visa_number', 'visa_expiry_date', 'marital_status', 'years_in_uae', 'favorite_city', 'Id_type', 'Idbarah_no',
  'required_credit_card_limit', 'does_your_spouse_live_in_uae', 'have_children_in_uae', 'children_are', 'own_vehicle_in_uae', 'vehicle_model', 'education_id', 'own_house_cuntry', 'country_of_origin', 'preferred_language', 'duration_at_current_address', 'permanent_address_country', 'permanent_address_city', 'permanent_address_zipcode', 'nationality_name', 'eid_number', 'created_at', 'updated_at', 
  'multiple_passport_number' ];


    public function store($inputs, $id = null)  {
        if ($id) {
            return $this->find($id)->update($inputs);
        } else {
            return $this->create($inputs)->id;
        }
    }


}

 