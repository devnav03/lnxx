<thead>
<tr style="background: #5EB495;"> 
    <th class="text-center" style="max-width: 35px;color: #fff;">Sr. No.</th>
    <th style="color: #fff;">Name</th>
    <th style="color: #fff;">Email</th>    
    <th style="color: #fff;">Mobile</th> 
    <th style="color: #fff;text-align: center;">Basic Information</th>
    <th style="color: #fff;text-align: center;">CM Details</th>
    <th style="color: #fff;" width="6%" class="text-center">Status</th>
    <th style="color: #fff;" class="text-center">Action</th>
</tr>
</thead>
<tbody>
<?php $index = 1; ?>



@foreach($data as $detail)
<tr id="order_{{ $detail->id }}">
    <td class="text-center">{!! pageIndex($index++, $page, $perPage) !!}</td>
    <td><a href="{!! route('customer.edit', [$detail->id]) !!}">{!! $detail->name !!}</a></td>
    <td>{!! $detail->email !!}</td>
    <td>{!! $detail->mobile !!}</td>

    <td class="text-center"> @if($detail->cm_type) <i class="fa fa-check"></i> @else  <i class="fa fa-times"></i> @endif </td>


    <td class="text-center"> @if($detail->cm_type) 

        @if($detail->cm_type == 1) 
        @if($detail->designation) 
        <i class="fa fa-check"></i> 
        @else
        <i class="fa fa-times"></i>  
        @endif
        @elseif($detail->cm_type == 2)
        @if($detail->org_name) 
        <i class="fa fa-check"></i> 
        @else
        <i class="fa fa-times"></i>  
        @endif
        @else
        @if($detail->source_name) 
        <i class="fa fa-check"></i> 
        @else
        <i class="fa fa-times"></i>  
        @endif
        @endif

        @else  <i class="fa fa-times"></i> @endif </td>


    <td class="text-center">
        <a href="javascript:void(0);" class="toggle-status" data-message="{!! lang('messages.change_status') !!}" data-route="{!! route('customer.toggle', $detail->id) !!}" title="@if($detail->status == 0) Deactive @else Active @endif">
            {!! Html::image('img/' . $detail->status . '.gif') !!}
        </a>
    </td>
    <td class="text-center col-md-1">
        <a class="btn btn-xs btn-primary" style="padding: 6px 8px; line-height: 17px; min-height: 25px;" href="{{ route('customer.edit', [$detail->id]) }}"><i class="fa fa-eye"></i></a>
        
    </td>    
</tr>
@endforeach
@if (count($data) < 1)
<tr>
    <td class="text-center" colspan="8">No Data Found</td>
</tr>
@else
<tr>
    <td colspan="8">
        {!! paginationControls($page, $total, $perPage) !!}
    </td>
</tr>
@endif
</tbody>