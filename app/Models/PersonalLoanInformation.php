<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class PersonalLoanInformation extends Model {
	
    protected $fillable = [ 'user_id', 'reference_title', 'reference_full_name', 'reference_relation', 
    'reference_mobile_no', 'reference_home_telephone_no', 'reference_address', 'reference_po_box_no', 'created_at', 'updated_at' ];

    public function store($inputs, $id = null)  {
        if ($id){
            return $this->find($id)->update($inputs);
        } else {
            return $this->create($inputs)->id;
        }
    }


}

 