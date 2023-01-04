<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model {

    use SoftDeletes;
    protected $table = 'users';
    protected $fillable = [
        'user_type', 'salutation', 'name', 'middle_name', 'last_name', 'email', 'gender', 'date_of_birth', 'profile_image', 'emirates_id', 'emirates_id_back', 'eid_number', 'eid_status', 'mobile', 'status', 
        'password', 'created_at', '	updated_at'
    ];
    

    public function validate($inputs, $id = null){
        $rules['name'] = 'required|unique:banks';
        return \Validator::make($inputs, $rules);
    }

    public function store($inputs, $id = null) {
       // dd($inputs);
        if ($id) {
            return $this->find($id)->update($inputs);
        } else {
            return $this->create($inputs)->id;
        }
    }

    public function getEmp($search = null, $skip, $perPage) {
        $current_user = \Auth::user()->id;
        $take = ((int)$perPage > 0) ? $perPage : 20;
        $filter = 1; // default filter if no search

        $fields = [
            'users.id',
            'users.salutation',
            'users.name',
            'users.email',
            'users.gender',
            'users.date_of_birth',
            'users.mobile',
            'users.profile_image',
            'users.status',
            'relation_manager_employee.manager_id',
            'relation_manager_employee.employee_id',

        ];

        $sortBy = [
            'name' => 'name',
        ];

         $orderEntity = 'id';
         $orderAction = 'desc';
         if (isset($search['sort_action']) && $search['sort_action'] != "") {
             $orderAction = ($search['sort_action'] == 1) ? 'desc' : 'asc';
         }

         if (isset($search['sort_entity']) && $search['sort_entity'] != "") {
             $orderEntity = (array_key_exists($search['sort_entity'], $sortBy)) ? $sortBy[$search['sort_entity']] : $orderEntity;
         }

         if (is_array($search) && count($search) > 0) { 
            $f1 = (array_key_exists('name', $search)) ? " AND (users.name LIKE '%" .
            addslashes(trim($search['name'])) . "%')" : "";  
            $f2 = (array_key_exists('email', $search)) ? " AND (users.email LIKE '%" .
            addslashes(trim($search['email'])) . "%')" : "";  
            $f3 = (array_key_exists('mobile', $search)) ? " AND (users.number LIKE '%" .
            addslashes(trim($search['mobile'])) . "%')" : "";  
            $filter .= $f1 . $f2 . $f3;
         }

         return $this->leftjoin('relation_manager_employee', 'users.id', 'relation_manager_employee.employee_id')
                ->whereRaw($filter)
                ->where('relation_manager_employee.manager_id', $current_user)
                ->where('users.user_type', 4)
                ->orderBy($orderEntity, $orderAction)
                ->skip($skip)->take($take)
                ->get($fields);
    }

    
    public function totalEmp($search = null)  {
         $filter = 1; // if no search add where
         // when search
         if (is_array($search) && count($search) > 0) {
             $partyName = (array_key_exists('keyword', $search)) ? " AND name LIKE '%" .
                 addslashes(trim($search['keyword'])) . "%' " : "";
             $filter .= $partyName;
         }
         return $this->select(\DB::raw('count(*) as total'))
             ->where('user_type', 4)
             ->whereRaw($filter)->first();
     }

    public function tempDelete($id)
    {
        $this->find($id)->update([ 'deleted_by' => authUserId(), 'deleted_at' => convertToUtc()]);
    }
}
