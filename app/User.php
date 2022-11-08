<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'user_type', 'name', 'email', 'password', 'mobile', 'login_otp', 'profile_image', 'gender', 'status', 'updated_at', 'api_key', 'created_at'
    ];

  
    public function validate_front($inputs, $id = null) {
        $rules['name'] = 'required|string|max:100|regex:/^[a-zA-Z ]+$/';
        $rules['email'] = 'required|email|max:100|unique:users';
        $rules['mobile'] = 'required|unique:users';
        $rules['password'] = 'required|min:6';
        $rules['confirm_password'] = 'required|same:password';

        return \Validator::make($inputs, $rules);
    }

    public function validate_employer_profile_update($inputs){

        $rules['video'] = 'max:50240';
        $rules['employer_name'] = 'required';
        $rules['vacancy'] = 'required';
        return \Validator::make($inputs, $rules);
    }

    public function validate($inputs, $id = null) {
        $rules['name'] = 'required|string|max:100|regex:/^[a-zA-Z ]+$/';
        $rules['email'] = 'required|email|max:100|unique:users';
        $rules['mobile'] = 'required|digits:10|unique:users';
        $rules['password'] = 'required|min:6';
        $rules['user_type'] = 'required';
 
        return \Validator::make($inputs, $rules);
    }

    public function validatePassword($inputs, $id = null){   
        $rules['password']          = 'required';
        $rules['new_password']      = 'required|same:confirm_password|min:6';
        $rules['confirm_password']  = 'required';
        return \Validator::make($inputs, $rules);
    }

    public function validate_password_forgot($inputs, $id = null)  {   
        $rules['new_password']     = 'required|same:confirm_password';
        $rules['confirm_password']  = 'required';
        return \Validator::make($inputs, $rules);
    }

    public function password_validate($inputs, $id = null) {
        $rules['old_password'] = 'required';
        $rules['new_password'] = 'required|min:6|max:20|confirmed';
        
        return \Validator::make($inputs, $rules);
    }

    public function validateLoginUser($inputs, $id = null)
    {
        $rules['email'] = 'required';
        $rules['password'] = 'required';
        return \Validator::make($inputs, $rules);
    }


    public function store($input, $id = null)
    {
        if ($id) {
            return $this->find($id)->update($input);
        } else {
            return $this->create($input)->id;
        }
    } 


    public function getCustomer($search = null, $skip, $perPage) {
         $take = ((int)$perPage > 0) ? $perPage : 20;
         $filter = 1; // default filter if no search
         $fields = [
                'users.id',
                'users.name',
                'users.email',
                'users.user_type', 
                'users.mobile', 
                'users.status',
                'customer_onboardings.cm_type',
                'other_cm_details.source_name',
                'cm_salaried_details.designation',
                'self_emp_details.org_name',

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
            $f1 = (array_key_exists('email', $search)) ? " AND (users.email Like '%" .
                addslashes($search['email']) . "%')" : "";
              
            $f2 = (array_key_exists('mobile', $search)) ? " AND (users.mobile Like '%" .
                addslashes($search['mobile']) . "%')" : "";

            $f3 = (array_key_exists('status', $search)) ? " AND (users.status = '" .
                addslashes($search['status']) . "')" : "";
           $f4 = (array_key_exists('name', $search)) ? " AND (users.name LIKE '%" .
                addslashes(trim($search['name'])) . "%')" : "";  
            $filter .= $f1 . $f2 . $f3 . $f4;
        }
         return $this->leftjoin('customer_onboardings', "customer_onboardings.user_id", "=", 'users.id')
            ->leftjoin('other_cm_details', "other_cm_details.customer_id", "=", 'users.id')
            ->leftjoin('cm_salaried_details', "cm_salaried_details.customer_id", "=", 'users.id')
            ->leftjoin('self_emp_details', "self_emp_details.customer_id", "=", 'users.id')
            ->whereRaw($filter)
            ->where('users.user_type', 2)
             // ->where('deleted_at', null)
            ->orderBy($orderEntity, $orderAction)
            ->skip($skip)->take($take)->get($fields);
    }

     public function getEmployer($search = null, $skip, $perPage) {
         $take = ((int)$perPage > 0) ? $perPage : 20;
         $filter = 1; // default filter if no search
         $fields = [
                'id',
                'name',
                'email',
                'user_type', 
                'employer_name', 
                'mobile',  
                'status',
                'vacancy',
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
            $f1 = (array_key_exists('employer_name', $search)) ? " AND (users.employer_name Like '%" .
                addslashes($search['employer_name']) . "%')" : "";
              
            $f2 = (array_key_exists('mobile', $search)) ? " AND (users.mobile Like '%" .
                addslashes($search['mobile']) . "%')" : "";

            $f3 = (array_key_exists('status', $search)) ? " AND (users.status = '" .
                addslashes($search['status']) . "')" : "";
           $f4 = (array_key_exists('name', $search)) ? " AND (users.name LIKE '%" .
                addslashes(trim($search['name'])) . "%')" : "";  
            $filter .= $f1 . $f2 . $f3 . $f4;
        }

         return $this
             ->whereRaw($filter)
             ->where('user_type', 3)
             ->orderBy($orderEntity, $orderAction)
             ->skip($skip)->take($take)->get($fields);
    }


    public function totalCustomer($search = null)
     {
         $filter = 1; // if no search add where

         // when search
         if (is_array($search) && count($search) > 0) {
             $partyName = (array_key_exists('keyword', $search)) ? " AND name LIKE '%" .
                 addslashes(trim($search['keyword'])) . "%' " : "";
             $filter .= $partyName;
         }
         return $this->select(\DB::raw('count(*) as total'))
                    ->where('users.user_type', 2)
                    ->whereRaw($filter)
                    ->first();
    }
    
    public function totalEmployer($search = null){
         $filter = 1; // if no search add where

         // when search
         if (is_array($search) && count($search) > 0) {
             $partyName = (array_key_exists('keyword', $search)) ? " AND name LIKE '%" .
                 addslashes(trim($search['keyword'])) . "%' " : "";
             $filter .= $partyName;
         }
         return $this->select(\DB::raw('count(*) as total'))
                    ->where('user_type', 3)
                    ->whereRaw($filter)
                    ->first();
    }

    public function updatePassword($password){
        return $this->where('id', authUserId())->update(['password' => $password]);
    } 
    

    public function tempDelete($id) {
        $this->find($id)->update(['deleted_at' => convertToUtc()]);
    }



}
