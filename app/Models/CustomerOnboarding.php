<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class CustomerOnboarding extends Model
{
    protected $fillable = [ 'user_id', 'gender', 'name_as_per_passport', 'embossing_name', 'mother_maiden_name', 
    'nationality', 'have_passport', 'passport_number', 'passport_expiry_date', 'have_visa', 'visa_sponsor',
   'visa_number', 'visa_expiry_date', 'marital_status', 'years_in_uae', 'favorite_city', 'Id_type', 'Idbarah_no',
  'required_credit_card_limit', 'does_your_spouse_live_in_uae', 'have_children_in_uae', 'children_are', 'own_vehicle_in_uae',
 'vehicle_model', 'education_id', 'own_house_cuntry', 'country_of_origin', 'preferred_language', 'duration_at_current_address', 
 'permanent_address_country', 'permanent_address_city', 'permanent_address_zipcode' ];
}

 