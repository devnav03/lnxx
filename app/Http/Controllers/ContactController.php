<?php

namespace App\Http\Controllers;
/**
 * :: Category Controller ::
 * To manage games.
 *
 **/
use Intervention\Image\ImageManagerStatic as Image;
use Auth;
use Files;
use Illuminate\Support\Facades\Storage;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController  extends  Controller{

    public function  index() {
        return view('admin.contact.index');
    }

    public function  create() {
        return view('admin.contact.create');
    }

  

    public function edit($id = null)
    {
        $result = (new Contact)->find($id);
        if (!$result) {
            abort(401);
        }
       
       // dd($result);
        return view('admin.contact.create', compact('result'));
    }


    public function ContactPaginate(Request $request, $pageNumber = null) {

        if (!\Request::isMethod('post') && !\Request::ajax()) { //
            return lang('messages.server_error');
        }

        $inputs = $request->all();
        $page = 1;
        if (isset($inputs['page']) && (int)$inputs['page'] > 0) {
            $page = $inputs['page'];
        }

        $perPage = 20;
        if (isset($inputs['perpage']) && (int)$inputs['perpage'] > 0) {
            $perPage = $inputs['perpage'];
        }

        $start = ($page - 1) * $perPage;
        if (isset($inputs['form-search']) && $inputs['form-search'] != '') {
            $inputs = array_filter($inputs);
            unset($inputs['_token']);

            $data = (new Contact)->getContact($inputs, $start, $perPage);
            $totalContact = (new Contact)->totalContact($inputs);
            $total = $totalContact->total;
        } else {

            $data = (new Contact)->getContact($inputs, $start, $perPage);
            $totalContact = (new Contact)->totalContact();
            $total = $totalContact->total;

        }


        return view('admin.contact.load_data', compact('inputs', 'data', 'total', 'page', 'perPage'));
    }


    public function ContactToggle($id = null) {
         if (!\Request::isMethod('post') && !\Request::ajax()) {
            return lang('messages.server_error');
        }

        try {
            $game = Contact::find($id);
        } catch (\Exception $exception) {
            return lang('messages.invalid_id', string_manip(lang('contact.contact')));
        }

        $game->update(['status' => !$game->status]);
        $response = ['status' => 1, 'data' => (int)$game->status . '.gif'];
        // return json response
        return json_encode($response);
    }


    public function ContactAction(Request $request)
    {
        $inputs = $request->all();
        if (!isset($inputs['tick']) || count($inputs['tick']) < 1) {
            return redirect()->route('contact.index')
                ->with('error', lang('messages.atleast_one', string_manip(lang('contact.contact'))));
        }

        $ids = '';
        foreach ($inputs['tick'] as $key => $value) {
            $ids .= $value . ',';
        }

        $ids = rtrim($ids, ',');
        $status = 0;
        if (isset($inputs['active'])) {
            $status = 1;
        }

        Contact::whereRaw('id IN (' . $ids . ')')->update(['status' => $status]);
        return redirect()->route('contact.index')
            ->with('success', lang('messages.updated', lang('contact.contact')));
    }

    public function drop($id) {
        if (!\Request::ajax()) {
            return lang('messages.server_error');
        }

        $result = (new Contact)->find($id);
        if (!$result) {
            // use ajax return response not abort because ajaz request abort not works
            abort(401);
        }

        try {
            // get the unit w.r.t id
             $result = (new Contact)->find($id);
             if($result->status == 1) {
                 $response = ['status' => 0, 'message' => lang('contact.contact_in_use')];
             }
             else {
                 (new Contact)->tempDelete($id);
                 $response = ['status' => 1, 'message' => lang('messages.deleted', lang('contact.contact'))];
             }
        }
        catch (Exception $exception) {
            $response = ['status' => 0, 'message' => lang('messages.server_error')];
        }        
        // return json response
        return json_encode($response);
    }
    

}
