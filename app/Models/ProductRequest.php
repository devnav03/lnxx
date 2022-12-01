<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class ProductRequest extends Model {

    protected $fillable = [ 'user_id', 'credit_card_limit', 'details_of_cards', 'credit_bank_name', 'card_limit',
 'loan_amount', 'loan_bank_name', 'original_loan_amount', 'business_loan_amount', 'mortgage_loan_amount', 'purchase_price', 'type_of_loan', 'term_of_loan', 'end_use_of_property', 'interest_rate', 'created_at', 'updated_at' ];


    public function store($inputs, $id = null)  {
        if ($id) {
            return $this->find($id)->update($inputs);
        } else {
            return $this->create($inputs)->id;
        }
    }


}

 