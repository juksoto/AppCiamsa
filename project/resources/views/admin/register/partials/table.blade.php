<table class="table table-striped">
    <thead>
    <tr>
        <th class="text-capitalize">
            Nº
        </th>
        <th class="text-capitalize">
            {{ trans('admin.quote.name') }}
        </th>
        <th class="text-capitalize">
            {{ trans('admin.quote.email') }}
        </th>
        <th class="text-capitalize">
            {{ trans('admin.quote.department') }}
        </th>
        <th class="text-capitalize">
            {{ trans('admin.quote.city') }}
        </th>
        <th class="text-capitalize">
            {{ trans('admin.quote.type') }}
        </th>
        <th class="text-capitalize">
            {{ trans('admin.quote.stage') }}
        </th>
        <th class="text-capitalize">
            {{ trans('admin.quote.category') }}
        </th>
        <th class="text-capitalize">
            {{ trans('admin.quote.product') }}
        </th>
        <th class="text-capitalize">
            {{ trans('admin.quote.mezcla') }}
        </th>
    </tr>
    </thead>
    <tbody>
    @forelse($collection  as $key => $collect)
        <tr data-id="{{ $collection['id'] }}">
            <td class="text-left">
                {!! ($key + 1) !!}
            </td>
            <td class="text-left">
                {!! $collect['name'] !!}
            </td>
            <td class="text-left">
                {!! $collect['email'] !!}
            </td>
            <td class="text-left">
                {!! $collect['departments'] !!}
            </td>
            <td class="text-left">
                {!! $collect['town'] !!}
            </td>
            <td class="text-left">
                @if (isset($collect['crops'])){{ $collect['crops'] }}@endif
            </td>
            <td class="text-left">
                @if (isset($collect['stage'])){{ $collect['stage'] }}@endif
            </td>
            <td class="text-left">
                @if (isset($collect['category']['category'])){{ $collect['category']['category']}}@endif
            </td>
            <td class="text-left">
                @if (isset($collect['product'])){{ $collect['product']}}@endif
            </td>
            <td class="text-left">
                @if (isset($collect['mezcla_medida'])){{ $collect['mezcla_medida']}}@endif
            </td>
        </tr>
    @empty
</table>
<div class="alert alert-danger alert-dismissible fade in" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
    {{ trans('admin.message.no_records_found') }}
</div>
@endforelse
</table>