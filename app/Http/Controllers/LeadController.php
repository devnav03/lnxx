<?php

namespace App\Http\Controllers;
/**
 * :: Bank Controller ::
 * 
 *
 **/
use Intervention\Image\ImageManagerStatic as Image;
use Auth;
use Files;
use Illuminate\Support\Facades\Storage;
use App\Models\Lead; 
use App\Models\Employee; 
use App\Models\User; 
use Illuminate\Http\Request;
use Carbon\Carbon;

class LeadController extends  Controller{

    public function index() {
        return view('admin.lead.index');
    }
  
    public function create() {
        return view('admin.lead.create');
    }

    public function store(Request $request) {
        try {
            $inputs = $request->all();
            $user_id = \Auth::id();
            $user_type = Auth()->user()->user_type;
            if($user_type == 1){
                $validator = (new Lead)->validate($inputs);
                $inputs['uploaded_by'] = $user_id;
                (new Lead)->store($inputs);
                return back()->with('success', 'Lead successfully created');
            }elseif($user_type == 3){
                $validator = (new Lead)->validate($inputs);
                $inputs['uploaded_by'] = $user_id;
                $inputs['alloted_to'] = $user_id;
                // print_r($inputs['alloted_to']);
                // die;
                (new Lead)->store($inputs);
                return back()->with('success', 'Lead successfully created');                
            }elseif($user_type == 4){
                $validator = (new Lead)->validate($inputs);
                $inputs['uploaded_by'] = $user_id;
                $inputs['alloted_to'] = $user_id;
                (new Lead)->store($inputs);
                return back()->with('success', 'Lead successfully created');                
            }elseif($user_type == 5){
                $validator = (new Lead)->validate($inputs);
                $inputs['uploaded_by'] = $user_id;
                $inputs['alloted_to'] = $user_id;
                (new Lead)->store($inputs);
                return back()->with('success', 'Lead successfully created');                
            }
            
        } catch (\Exception $exception) {
            return back()->withInput()->with('error', lang('messages.server_error').$exception->getMessage());
        }
    }

  
    public function update(Request $request, $id = null) {
        $result = (new Lead)->find($id);
        if (!$result) {
            abort(401);
        }
        $inputs = $request->all();
        try {

            (new Lead)->store($inputs, $id);

            return redirect()->route('lead.index')
                ->with('success', 'Employee successfully updated');

        } catch (\Exception $exception) {
            return redirect()->route('lead.edit', [$id])
                ->withInput()
                ->with('error', lang('messages.server_error'));
        }
    }

  
    public function edit($id = null) {
        $result = (new Lead)->find($id);
        if (!$result) {
            abort(401);
        }
        return view('admin.lead.create', compact('result'));
    }


    public function leadPaginate(Request $request, $pageNumber = null) {
    //  dd($request);

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

       // dd('test');

        $start = ($page - 1) * $perPage;
        if (isset($inputs['form-search']) && $inputs['form-search'] != '') {
            $inputs = array_filter($inputs);
            unset($inputs['_token']);
            $data = (new Lead)->getlead($inputs, $start, $perPage);
            $totalGameMaster = (new Lead)->totalLead($inputs);
            $total = $totalGameMaster->total;
            // dd($data);
        } else {
            $data = (new Lead)->getlead($inputs, $start, $perPage);
            $totalGameMaster = (new Lead)->totalLead();
            $total = $totalGameMaster->total;
        }

       // dd($data);

        return view('admin.lead.load_data', compact('inputs', 'data', 'total', 'page', 'perPage'));
    }

 
    // public function servicesToggle($id = null) {
    //     if (!\Request::isMethod('post') && !\Request::ajax()) {
    //         return lang('messages.server_error');
    //     }
    //     try {
    //         $game = Employee::find($id);
    //     } catch (\Exception $exception) {
    //         return lang('messages.invalid_id', string_manip(lang('Employee')));
    //     }

    //     $game->update(['status' => !$game->status]);
    //     $response = ['status' => 1, 'data' => (int)$game->status . '.gif'];
    //     // return json response
    //     return json_encode($response);
    // }

  
    public function leadAction(Request $request)  {

        $inputs = $request->all();
        if (!isset($inputs['tick']) || count($inputs['tick']) < 1) {
            return redirect()->route('employee.index')
                ->with('error', lang('messages.atleast_one', string_manip(lang('Bank'))));
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

        Lead::whereRaw('id IN (' . $ids . ')')->update(['status' => $status]);
        return redirect()->route('banks.index')
            ->with('success', lang('messages.updated', lang('Bank')));
    }


    public function drop($id) {
        if (!\Request::ajax()) {
            return lang('messages.server_error');
        }
        $result = (new Employee)->find($id);
        if (!$result) {
            // use ajax return response not abort because ajaz request abort not works
            abort(401);
        }
        try {
            // get the unit w.r.t id
            $result = (new Employee)->find($id);
            // if($result->status == 1) {
            //     $response = ['status' => 0, 'message' => lang('category.category_in_use')];
            // }
            //  else {
                (new Employee)->tempDelete($id);
                $response = ['status' => 1, 'message' => lang('messages.deleted', lang('Bank'))];
             // }
        }
        catch (Exception $exception) {
            $response = ['status' => 0, 'message' => lang('messages.server_error')];
        }        
        // return json response
        return json_encode($response);
    }

    public function lead_assign_leads() {
        return view('admin.lead.assign');
    }
    public function social(){
        return view('admin.lead.social');
    }

    public function assignleadPaginate(Request $request){
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

       // dd('test');

        $start = ($page - 1) * $perPage;
        if (isset($inputs['form-search']) && $inputs['form-search'] != '') {
            $inputs = array_filter($inputs);
            unset($inputs['_token']);
            $data = (new Lead)->getassignlead($inputs, $start, $perPage);
            $totalGameMaster = (new Lead)->assigntotalLead($inputs);
            $total = $totalGameMaster->total;
            // dd($data);
        } else {
            $data = (new Lead)->getassignlead($inputs, $start, $perPage);
            $totalGameMaster = (new Lead)->assigntotalLead();
            $total = $totalGameMaster->total;
        }

       // dd($data);

        return view('admin.lead.assign_load', compact('inputs', 'data', 'total', 'page', 'perPage'));
    }
    public function assignleadAction(Request $request){
        $inputs = $request->all();
        if (!isset($inputs['tick']) || count($inputs['tick']) < 1) {
            return redirect()->route('employee.index')
                ->with('error', lang('messages.atleast_one', string_manip(lang('Bank'))));
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

        Lead::whereRaw('id IN (' . $ids . ')')->update(['status' => $status]);
        return redirect()->route('banks.index')
            ->with('success', lang('messages.updated', lang('Bank')));
    }
    public function lead_assign_automatic_leads() {
        return view('admin.lead.automatic');
    }
    public function lead_open_leads() {
        return view('admin.lead.open');
    }
    public function lead_close_leads() {
        return view('admin.lead.close');
    }
    public function openleadPaginate(Request $request){
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

       // dd('test');

        $start = ($page - 1) * $perPage;
        if (isset($inputs['form-search']) && $inputs['form-search'] != '') {
            $inputs = array_filter($inputs);
            unset($inputs['_token']);
            $data = (new Lead)->getAdminOpenlead($inputs, $start, $perPage);
            $totalGameMaster = (new Lead)->totalAdminOpenLead($inputs);
            $total = $totalGameMaster->total;
            // dd($data);
        } else {
            $data = (new Lead)->getAdminOpenlead($inputs, $start, $perPage);
            $totalGameMaster = (new Lead)->totalAdminOpenLead();
            $total = $totalGameMaster->total;
        }

       // dd($data);

        return view('admin.lead.open_load', compact('inputs', 'data', 'total', 'page', 'perPage'));
    }
    public function openleadAction(Request $request){
        $inputs = $request->all();
        if (!isset($inputs['tick']) || count($inputs['tick']) < 1) {
            return redirect()->route('employee.index')
                ->with('error', lang('messages.atleast_one', string_manip(lang('Bank'))));
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

        Lead::whereRaw('id IN (' . $ids . ')')->update(['status' => $status]);
        return redirect()->route('banks.index')
            ->with('success', lang('messages.updated', lang('Bank')));
    }
    public function autoleadPaginate(Request $request){
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

       // dd('test');

        $start = ($page - 1) * $perPage;
        if (isset($inputs['form-search']) && $inputs['form-search'] != '') {
            $inputs = array_filter($inputs);
            unset($inputs['_token']);
            $data = (new Employee)->getAdminAutolead($inputs, $start, $perPage);
            $totalGameMaster = (new Employee)->totalAdminAutoLead($inputs);
            $total = $totalGameMaster->total;
            // dd($data);
        }else {
            // $data = (new Employee)->getAdminAutolead($inputs, $start, $perPage);
            // $totalGameMaster = (new Employee)->totalAdminAutoLead();
            // $total = $totalGameMaster->total;
            $total = 0;
            $data = [];
        }

       // dd($data);

        return view('admin.lead.auto_load', compact('inputs', 'data', 'total', 'page', 'perPage'));
    }
    public function autoleadAction(Request $request){
        $inputs = $request->all();
        if (!isset($inputs['tick']) || count($inputs['tick']) < 1) {
            return redirect()->route('employee.index')
                ->with('error', lang('messages.atleast_one', string_manip(lang('Bank'))));
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
        return redirect()->route('banks.index')
            ->with('success', lang('messages.updated', lang('Bank')));
    }
    
    public function closeleadPaginate(Request $request){
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

       // dd('test');

        $start = ($page - 1) * $perPage;
        if (isset($inputs['form-search']) && $inputs['form-search'] != '') {
            $inputs = array_filter($inputs);
            unset($inputs['_token']);
            $data = (new Lead)->getAdmincloselead($inputs, $start, $perPage);
            $totalGameMaster = (new Lead)->totalAdmincloseLead($inputs);
            $total = $totalGameMaster->total;
            // dd($data);
        } else {
            $data = (new Lead)->getAdmincloselead($inputs, $start, $perPage);
            $totalGameMaster = (new Lead)->totalAdmincloseLead();
            $total = $totalGameMaster->total;
        }

       // dd($data);

        return view('admin.lead.close_load', compact('inputs', 'data', 'total', 'page', 'perPage'));
    }
    public function closeleadAction(Request $request){
        $inputs = $request->all();
        if (!isset($inputs['tick']) || count($inputs['tick']) < 1) {
            return redirect()->route('employee.index')
                ->with('error', lang('messages.atleast_one', string_manip(lang('Bank'))));
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

        Lead::whereRaw('id IN (' . $ids . ')')->update(['status' => $status]);
        return redirect()->route('banks.index')
            ->with('success', lang('messages.updated', lang('Bank')));
    }
    public function multiple_check_val(request $request){
     if($request->check_val){
        $array = explode(",", $request->check_val);
        foreach($array as $array){    
          Lead::where('id', $array)
         ->update([
             'alloted_to' => $request->get_emp_aj
          ]);
        }
        return ['status'=>200];
     }
    }
    public function admin_lead_page(){
       return view('admin.lead.lead-trcking');
    }
    public function admin_lead_open_tracking(Request $request)
    {
        $user_type = Auth()->user()->user_type;
        $auth_user_id = \Auth::user()->id;
        if($user_type == 1){
            $results = lead::orderBy('id')->where('lead_status', 'OPEN')->paginate(5);
            $artilces = '';
            if ($request->page){
                foreach ($results as $result) {
                    $artilces.='<div class="card">
                    <h5 class="card-header">'.$result->name.'</h5><div class="card-body"><h5 class="card-title">Product: '.$result->product.'</h5><p class="card-text">Created at: '.$result->created_at.'</p><button type="button" class="btn btn-primary" onclick="get_popup('.$result->id.');" data-toggle="modal" data-target=".bd-example-modal-lg">View</button></div></div>';
                }
                return $artilces;
            }
        }elseif($user_type == 3){
            $results = lead::orderBy('id')->where('lead_status', 'OPEN')->where('alloted_to', $auth_user_id)->paginate(5);
            $artilces = '';
            if ($request->page){
                foreach ($results as $result) {
                    $artilces.='<div class="card">
                    <h5 class="card-header">'.$result->name.'</h5><div class="card-body"><h5 class="card-title">Product: '.$result->product.'</h5><p class="card-text">Created at: '.$result->created_at.'</p><button type="button" class="btn btn-primary" onclick="get_popup('.$result->id.');" data-toggle="modal" data-target=".bd-example-modal-lg">View</button></div></div>';
                }
                return $artilces;
            }
        }elseif($user_type == 4){
            $results = lead::orderBy('id')->where('lead_status', 'OPEN')->where('alloted_to', $auth_user_id)->paginate(5);
            $artilces = '';
            if ($request->page){
                foreach ($results as $result) {
                    $artilces.='<div class="card">
                    <h5 class="card-header">'.$result->name.'</h5><div class="card-body"><h5 class="card-title">Product: '.$result->product.'</h5><p class="card-text">Created at: '.$result->created_at.'</p><button type="button" class="btn btn-primary" onclick="get_popup('.$result->id.');" data-toggle="modal" data-target=".bd-example-modal-lg">View</button></div></div>';
                }
                return $artilces;
            }
        }
    }    
    public function admin_lead_inprocess_tracking(Request $request)
    {
        $user_type = Auth()->user()->user_type;
        $auth_user_id = \Auth::user()->id;
        if($user_type == 1){
            $results = lead::orderBy('id')->where('lead_status', 'INPROCESS')->paginate(5);
            $artilces = '';
            if ($request->page){
                foreach ($results as $result) {
                    $artilces.='<div class="card">
                    <h5 class="card-header">'.$result->name.'</h5><div class="card-body"><h5 class="card-title">Product: '.$result->product.'</h5><p class="card-text">Created at: '.$result->created_at.'</p><button type="button" class="btn btn-primary" onclick="get_popup('.$result->id.');" data-toggle="modal" data-target=".bd-example-modal-lg">View</button></div></div>';
                }
                
                return $artilces;
            }
        }elseif($user_type == 3){
            $results = lead::orderBy('id')->where('lead_status', 'INPROCESS')->where('alloted_to', $auth_user_id)->paginate(5);
            $artilces = '';
            if ($request->page){
                foreach ($results as $result) {
                    $artilces.='<div class="card">
                    <h5 class="card-header">'.$result->name.'</h5><div class="card-body"><h5 class="card-title">Product: '.$result->product.'</h5><p class="card-text">Created at: '.$result->created_at.'</p><button type="button" class="btn btn-primary" onclick="get_popup('.$result->id.');" data-toggle="modal" data-target=".bd-example-modal-lg">View</button></div></div>';
                }
                
                return $artilces;
            }
        }elseif($user_type == 4){
            $results = lead::orderBy('id')->where('lead_status', 'INPROCESS')->where('alloted_to', $auth_user_id)->paginate(5);
            $artilces = '';
            if ($request->page){
                foreach ($results as $result) {
                    $artilces.='<div class="card">
                    <h5 class="card-header">'.$result->name.'</h5><div class="card-body"><h5 class="card-title">Product: '.$result->product.'</h5><p class="card-text">Created at: '.$result->created_at.'</p><button type="button" class="btn btn-primary" onclick="get_popup('.$result->id.');" data-toggle="modal" data-target=".bd-example-modal-lg">View</button></div></div>';
                }
                
                return $artilces;
            }
        }
    }    
    public function admin_lead_reminder_tracking(Request $request)
    {
        $user_type = Auth()->user()->user_type;
        $auth_user_id = \Auth::user()->id;
        if($user_type == 1){
            $results = lead::orderBy('id')->where('lead_status', 'REMINDER')->paginate(5);
            $artilces = '';
            if ($request->page){
                foreach ($results as $result) {
                    $artilces.='<div class="card">
                    <h5 class="card-header">'.$result->name.'</h5><div class="card-body"><h5 class="card-title">Product: '.$result->product.'</h5><p class="card-text">Created at: '.$result->created_at.'</p><button type="button" class="btn btn-primary" onclick="get_popup('.$result->id.');" data-toggle="modal" data-target=".bd-example-modal-lg">View</button></div></div>';
                }
                return $artilces;
            }
        }elseif($user_type == 3){
            $results = lead::orderBy('id')->where('lead_status', 'REMINDER')->where('alloted_to', $auth_user_id)->paginate(5);
            $artilces = '';
            if ($request->page){
            foreach ($results as $result) {
                $artilces.='<div class="card">
                <h5 class="card-header">'.$result->name.'</h5><div class="card-body"><h5 class="card-title">Product: '.$result->product.'</h5><p class="card-text">Created at: '.$result->created_at.'</p><button type="button" class="btn btn-primary" onclick="get_popup('.$result->id.');" data-toggle="modal" data-target=".bd-example-modal-lg">View</button></div></div>';
            }
            return $artilces;
        }
        }elseif($user_type == 4){
            $results = lead::orderBy('id')->where('lead_status', 'REMINDER')->where('alloted_to', $auth_user_id)->paginate(5);
        $artilces = '';
        if ($request->page){
            foreach ($results as $result) {
                $artilces.='<div class="card">
                <h5 class="card-header">'.$result->name.'</h5><div class="card-body"><h5 class="card-title">Product: '.$result->product.'</h5><p class="card-text">Created at: '.$result->created_at.'</p><button type="button" class="btn btn-primary" onclick="get_popup('.$result->id.');" data-toggle="modal" data-target=".bd-example-modal-lg">View</button></div></div>';
            }
            return $artilces;
        }
        } 
    }
    public function admin_lead_popup(Request $request)
    {
        $user_type = Auth()->user()->user_type;
        if($user_type == 3 || $user_type == 4){
            $time=Carbon::now()->toDateTimeString();
            \DB::table('leads')->where('id', $request->id)->where('seen_time', Null)->update(['seen_time' => $time]); 
        }
        $results = lead::where('id', $request->id)->first();
        $results->createdat = date_format(date_create($results->created_at),"d-M-Y H:i:s");
        $get_user = User::where('id', $results->alloted_to)->first();
        $get_upload = User::where('id', $results->uploaded_by)->first();
        $get_status = \DB::table('status_master')->get();
        $decoded_status = json_encode($get_status, TRUE);
        if (!empty($results->id)){
            $datas=['status'=>200,'responce'=>$results,'getuser'=>$get_user,'getupload'=>$get_upload,'decoded_status'=>$decoded_status];
            return response()->json($datas);
        }
    }
    public function get_mail(request $request){
        $auth_user_id = \Auth::user()->id;
        $current_date_time = Carbon::now()->toDateTimeString();
        @$email_user_id = lead::where('email', $request->email)->first();
        \DB::table('lead_mails')->insert(['to_mail_id' => @$email_user_id->id, 'mail_to' => $request->email, 'subject' => $request->subject, 'mail' => $request->description, 'send_by' => $auth_user_id, 'created_at' => $current_date_time, 'updated_at'=>$current_date_time]);
        if(!empty($request->email)){
            $email = $request->email;
            $postdata = http_build_query(
                array(
                    'name' => @$email_user_id->name,
                    'email' => $email,
                    'subject' => $request->subject,
                    'mail' => $request->description,
                )
                );
                $opts = array('http' =>
                    array(
                    'method'  => 'POST',
                    'header'  => 'Content-Type: application/x-www-form-urlencoded',
                    'content' => $postdata
                    )
                );
                $context  = stream_context_create($opts);
                $result = file_get_contents('https://sspl20.com/email-api/api/lnxx/lead-mail', false, $context);
        }
        $datas=['status'=>200];
        return response()->json($datas);   
    }
    public function assign_lead_view(Request $request){
       $user_type = Auth()->user()->user_type;
       if($user_type == 3 || $user_type == 4){
        $time=Carbon::now()->toDateTimeString();
        \DB::table('leads')->where('id', $request->id)->update(['seen_time' => $time]); 
       }
       $lead = \DB::table('leads')->where('id', $request->id)->first();
       $status_master = \DB::table('status_master')->get();
       ?><form>
                <h5><b>Lead Details</b></h5>
                <div class="form-row">
                    <div class="col">
                        <label for="formGroupExampleInput">Name</label>
                        <input type="text" class="form-control" id="m_name" value="<?php echo "$lead->name"; ?>">
                    </div>
                    <div class="col">
                        <label for="formGroupExampleInput">Email</label> 
                        <input type="text" class="form-control" id="m_email" value="<?php echo "$lead->email"; ?>">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        <label for="formGroupExampleInput">Mobile No.</label> 
                        <input type="text" class="form-control" id="m_number" value="<?php echo "$lead->number"; ?>">
                    </div>
                    <div class="col">
                        <label for="formGroupExampleInput">Product</label> 
                        <input type="text" class="form-control" id="m_product" value="<?php echo "$lead->product"; ?>">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        <label for="formGroupExampleInput">Source</label> 
                        <input type="text" class="form-control" id="m_source" value="<?php echo "$lead->source"; ?>">
                    </div>
                    <div class="col">
                        <label for="formGroupExampleInput">Status</label> 
                        <select type="text" class="form-control" id="m_status">
                            <?php foreach($status_master as $status_master){
                             echo '<option value="'.$status_master->name.'">'.$status_master->name.'</option>';
                            }?>
                        </select>
                    </div>
                </div>
                <div class="form-row" style="margin-top:10px;">
                    <div class="col">
                        <button type="button" onclick="savedata(<?php echo $lead->id; ?>)" class="btn btn-success">Save Changes</button>
                    </div>
                </div>
            </form>
        <?php 
    }
    public function save_view_details(request $request){
         $time=Carbon::now()->toDateTimeString();
         \DB::table('leads')->where('id', $request->id)->update(['name' => $request->name, 'email' => $request->email, 'number' => $request->number, 'product' => $request->product, 'source' => $request->source, 'lead_status' => $request->status, 'close_time' => $time]); 
       
    }
    public function send_in_close_status(request $request){
        $time=Carbon::now()->toDateTimeString();
       \DB::table('leads')->where('id', $request->id)->update(['lead_status' => 'CLOSE', 'close_time' => $time]);
    }

    public function lead_close_leads_download(){
        $user_type = Auth()->user()->user_type;
        $auth_user_id = \Auth::user()->id;
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=lead_sample_file'.'.csv');
        $output = fopen('php://output', 'w');
        fputcsv($output, array('saturation', 'name', 'email', 'mobile', 'product', 'reference', 'source', 'Lead Status', 'note'));
        if($user_type == 3 || $user_type == 4){
            $reports = Lead::where('lead_status', 'CLOSE')->where('alloted_to', $auth_user_id)->get();
        }elseif($user_type == 5){
            $reports = Lead::where('lead_status', 'CLOSE')->where('alloted_to', $auth_user_id)->get();
        }else{
            $reports = Lead::where('lead_status', 'CLOSE')->get();
        }
        if (count($reports) > 0) {
            foreach ($reports as $report) {
                $report_row = [
                    $report['saturation'],
                    ucfirst($report['name']),
                    $report['email'],
                    $report['number'],
                    $report['product'], 
                    $report['reference'],
                    $report['source'],
                    $report['lead_status'],
                    $report['note'],
                ];

                fputcsv($output, $report_row);
            }
          }    
        }
        public function follow_up_sub(Request $request){
            $auth_user_id = \Auth::user()->id;
            $current_date_time = Carbon::now()->toDateTimeString();
            \DB::table('lead_cases')->insert(['lead_id'=>$request->id,'user_id'=>$auth_user_id,'reason_for_follow_up'=>$request->fol_region_follow,'date'=>$request->fol_date, 'time'=>$request->fol_time, 'note'=>$request->fol_note,'created_at'=>$current_date_time, 'updated_at'=>$current_date_time ]);
            \DB::table('leads')->where('id', $request->id)->update(['lead_status'=> $request->status]);

        }
        public function case_detail(Request $request)
        {
        $user_type = Auth()->user()->user_type;
        $auth_user_id = \Auth::user()->id;
            $results = \DB::table('lead_cases')->where('lead_id', $request->id)->orderBy('created_at', 'desc')->get();
            // $artilces = '<table>
            // <thead>
            //     <tr>
            //         <th width="40%">Date</th>
            //         <th width="40%">Note</th>
            //         <th width="20%">Activity</th>
            //     </tr>
            // </thead>
            // <tbody style="text-transform: capitalize !important;">';
            // $i = 0;
            // $len = count($results);
            $artilces = '';
            if ($request->page){
                foreach ($results as $result) {
                    // if($i == 0){
                        $artilces.=
                        '<div class="card card-body" style="padding: 15px 15px 0px 15px;">
                        <a data-bs-toggle="collapse" href="#multiCollapseExample'.$result->id.'" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">
                        <div class="row" style="line-height: 0.0;">            
                            <div class="col-10">    
                                <h6 style="color:black;">'.$result->reason_for_follow_up.'</h6><p style="color:black;">'.$result->created_at.'</p>
                            </div>
                            <div class="col-2">
                                <i style="color:black;" class="fa fa-caret-down" aria-hidden="true"></i>
                            </div>
                        </div>
                        </a>
                            <p>
                                <span class="collapse multi-collapse" id="multiCollapseExample'.$result->id.'">'.$result->note.'</span>
                            </p>
                    </div>';
                        // '<tr>
                        // <td width="40%">'.$result->created_at.'</td>
                        // <td width="40%">'.$result->note.'</td>
                        // <td width="20%" align="left" style="text-align: center;"><img src="http://localhost/lnxx/public/img/sta_icon/deliveredRedStatus.png"></td>
                        // </tr>';
                    // }elseif($i == $len - 1){
                        // $artilces.=
                        // '<tr>
                        // <td width="40%">'.$result->created_at.'</td>
                        // <td width="40%">'.$result->note.'</td>
                        // <td width="20%" align="left" style="text-align: center;"><img src="http://localhost/lnxx/public/img/sta_icon/verticalSliderbar.png"></td>
                        // </tr>';
                    // }
                    // $i++;
                }
                // $artilces.= '</tbody>
                // </table>';
            }
            return $artilces;
        
    } 
        public function mail_details(Request $request)
        {
        $user_type = Auth()->user()->user_type;
        // $auth_user_id = \Auth::user()->id;
        $results = \DB::table('lead_mails')->where('to_mail_id', $request->id)->orderBy('created_at', 'desc')->get();
        
            // $i = 0;
            // $len = count($results);
            $artilces = '';
            if ($request->page){
                foreach ($results as $result) {
                    $artilces.=
                        '<div class="card card-body" style="padding: 15px 15px 0px 15px;">
                        <a data-bs-toggle="collapse" href="#multiCollapseExamplemail'.$result->id.'" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">
                        <div class="row" style="line-height: 0.0;">            
                            <div class="col-10">    
                                <h6 style="color:black;">'.$result->subject.'</h6><p style="color:black;">'.$result->created_at.'</p>
                            </div>
                            <div class="col-2">
                                <i style="color:black;" class="fa fa-caret-down" aria-hidden="true"></i>
                            </div>
                        </div>
                        </a>
                            <span class="collapse multi-collapse" id="multiCollapseExamplemail'.$result->id.'">
                                '.$result->mail.'
                            </span>
                    </div>';
                }
            //     $artilces.= '</tbody>
            //     </table>';
            }
            return $artilces;
        
    } 
    public function social_form_setting(){
        $status = \DB::table('lead_social_form_setting')->where('id', 1)->first();
        return view('admin.lead.social-form-setting', compact('status'));
    }   
    public function social_form_e_status(Request $request){
        \DB::table('lead_social_form_setting')->where('id', 1)->update(['e_otp' => $request->vall]);
    }   
    public function social_form_m_status(Request $request){
        \DB::table('lead_social_form_setting')->where('id', 1)->update(['m_otp' => $request->m_vall]);
    }   
    public function automatic_save_cat(Request $request){
        \DB::table('lead_auto_distribution_category')->update(['active_deactive' => 0]);
        if(!empty($request->assign_by_category)){
            \DB::table('lead_auto_distribution_category')->where('id', $request->assign_by_category)->update(['active_deactive' => 1]);
        }
        return back()->with('success', 'Setting saved successfully');
    }   
    public function auto_distribution(Request $request)
    {
        $get_lead = \DB::table('leads')->where('lead_status', 'OPEN')->where('alloted_to', Null)->get(); 
        foreach($get_lead as $get_lead){
            $check_last_id = \DB::table('lead_assign_auto')->orderBy('id', 'desc')->first();
            if(!empty($check_last_id->id)){
                $get_agent_emp = \DB::table('users')->wherein('user_type', [3,4])->where('id', '>', $check_last_id->assign_to_id)->first();
            }
            if(!empty($get_agent_emp->id)){
                \DB::table('leads')->where('id', $get_lead->id)->update(['alloted_to' => $get_agent_emp->id]);
                \DB::table('lead_assign_auto')->insert(['assign_to_id' => $get_agent_emp->id, 'assigned_lead_id' => $get_lead->id]); 
            }else{
                $get_agent_emp1 = \DB::table('users')->wherein('user_type', [3,4])->first();
                \DB::table('leads')->where('id', $get_lead->id)->update(['alloted_to' => $get_agent_emp1->id]);
                \DB::table('lead_assign_auto')->insert(['assign_to_id' => $get_agent_emp1->id, 'assigned_lead_id' => $get_lead->id]);
            }
        }
        return back()->with('success', 'Distribution Successfull');
    }
    public function select_user_lead(Request $request)
    {
        $explode_lead_value = explode(',', $request->lead_value);
        $explode_user_value = explode(',', $request->user_value);
        $get_lead = \DB::table('leads')->wherein('id', $explode_lead_value)->get(); 
        foreach($get_lead as $get_lead){
            $check_last_id = \DB::table('lead_assign_auto')->orderBy('id', 'desc')->first();
            if(!empty($check_last_id->id)){
                $get_agent_emp = \DB::table('users')->wherein('id', $explode_user_value)->where('id', '>', $check_last_id->assign_to_id)->first();
            }
            if(!empty($get_agent_emp->id)){
                \DB::table('leads')->where('id', $get_lead->id)->update(['alloted_to' => $get_agent_emp->id]);
                \DB::table('lead_assign_auto')->insert(['assign_to_id' => $get_agent_emp->id, 'assigned_lead_id' => $get_lead->id]); 
            }else{
                $get_agent_emp1 = \DB::table('users')->wherein('id', $explode_user_value)->first();
                \DB::table('leads')->where('id', $get_lead->id)->update(['alloted_to' => $get_agent_emp1->id]);
                \DB::table('lead_assign_auto')->insert(['assign_to_id' => $get_agent_emp1->id, 'assigned_lead_id' => $get_lead->id]);
            }
        }
            return response()->json(['status'=>200]);
        }
        public function get_personal_details(request $request){
            \DB::table('leads')->where('id', $request->m_id)->update(['name' => $request->m_name, 'number' => $request->m_number, 'email' => $request->m_email, 'note' => $request->m_description]);
            $datas=['status'=>200];
            return response()->json($datas);   
        }
}
