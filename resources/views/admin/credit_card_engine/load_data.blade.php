<thead>
<tr style="background: #5EB495;"> 
    <th class="text-center" style="width: 100px;color: #fff;">Sr. No.</th>
    <th style="color: #fff;">Bank Name</th>
    <th style="color: #fff;">Min Salary</th>
    <th style="color: #fff;">Max Salary</th>
    <th style="color: #fff;">Already have a credit card</th>
    <th style="color: #fff;" width="6%" class="text-center">Status</th>
    <th style="color: #fff;" class="text-center">Action</th>
</tr>
</thead>
<tbody>
<?php $index = 1; ?>

@foreach($data as $detail)
<tr id="order_{{ $detail->id }}">
    <td class="text-center">{!! pageIndex($index++, $page, $perPage) !!}</td>
    <td>{!! $detail->name !!}</td>
    <td>{!! $detail->min_salary !!}</td>
    <td>{!! $detail->max_salary !!}</td>
    <td> @if($detail->existing_card == 0) No @else Yes @endif </td>
    <td class="text-center">
        <a href="javascript:void(0);" class="toggle-status" data-message="{!! lang('messages.change_status') !!}" data-route="{!! route('credit-card-engines.toggle', $detail->id) !!}" title="@if($detail->status == 0) Deactive @else Active @endif"> {!! Html::image('img/' . $detail->status . '.gif') !!} </a>
    </td>
    <td class="text-center col-md-1">
        <a class="btn btn-xs btn-primary" style="padding: 6px 8px; line-height: 17px; min-height: 25px;" href="{{ route('credit-card-engines.edit', [$detail->id]) }}"><i class="fa fa-pen"></i></a>
    </td>    
</tr>
@endforeach
@if (count($data) < 1)
<tr>
    <td class="text-center" colspan="10">No Data Found</td>
</tr>
@else
<tr>
    <td colspan="10">
        {!! paginationControls($page, $total, $perPage) !!}
    </td>
</tr>
@endif
</tbody>