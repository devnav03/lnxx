<thead>
<tr style="background: #5EB495;"> 
    <th class="text-center" style="width: 100px;color: #fff;">Sr. No.</th>
    <th style="color: #fff; text-align:center;">Name</th>
    <th style="color: #fff; text-align:center;">Email</th>
    <th style="color: #fff; text-align:center;">Mobile</th>
    <th style="color: #fff; text-align:center;">No. of assign leads</th>
    <th style="color: #fff; text-align:center;">No. of open leads</th>
    <th style="color: #fff; text-align:center;">No. of close leads</th>
    <th style="color: #fff; text-align:center;">Action</th>
</tr>
</thead>
<tbody>
<?php $index = 1; ?>



@foreach($data as $detail)
    <tr id="order_{{ $detail->id }}">
    <td class="text-center">{!! pageIndex($index++, $page, $perPage) !!}</td>
    <td class="text-center"><a style="color: #000;" href="{!! route('lead.edit', [$detail->id]) !!}">{!! $detail->salutation!!} {!! $detail->name !!}</a></td>
    <td class="text-center">{!! $detail->email !!}</td>
    <td class="text-center">{!! $detail->mobile !!}</td>
    <?php $assg_lead = \DB::table('leads')->where('alloted_to', $detail->id)->count(); ?>
    <td class="text-center">{!! $assg_lead !!}</td>
    <?php $assg_lead_open = \DB::table('leads')->where('alloted_to', $detail->id)->where('lead_status', 'OPEN')->count(); ?>
    <td class="text-center">{!! $assg_lead_open !!}</td>
    <?php $assg_lead_close = \DB::table('leads')->where('alloted_to', $detail->id)->where('lead_status', 'CLOSE')->count(); ?>
    <td class="text-center">{!! $assg_lead_close !!}</td>
    <td class="text-center col-md-1">
        <a class="btn btn-xs btn-primary" style="padding: 6px 8px; line-height: 17px; min-height: 25px;" href="{{ route('lead.edit', [$detail->id]) }}"><i class="fa fa-pen"></i></a>
    </td>    
</tr>
@endforeach
@if (count($data) < 1)
<tr>
    <td class="text-center" colspan="12">No Data Found</td>
</tr>
@else
<tr>
    <td colspan="12">
        {!! paginationControls($page, $total, $perPage) !!}
    </td>
</tr>
@endif

</tbody>
