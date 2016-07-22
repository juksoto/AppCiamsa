<table class="table table-striped">
    <thead>
    <tr>
        <th class="text-capitalize">
            Nº
        </th>
        <th class="text-capitalize">
            {!! trans('admin.products.products') !!}
        </th>
        <th class="text-capitalize">
            {!! trans('admin.products.categories') !!}
        </th>

        <th class="text-capitalize">
           {!! trans('admin.crops.type_crops') !!}
        </th>

        <th class="text-left text-capitalize">
            {{ trans('admin.crops.title_stage_crops') }}
        </th>

        <th class="text-left text-capitalize">
            {{ trans('admin.status.status') }}
        </th>
    </tr>
    </thead>
    <tbody>

    @forelse($data -> collections as $key => $collection)
        <tr data-id="{{ $collection -> id  }}">
            <td class="text-left">
                {!! ($key + 1) !!}
            </td>
            <td class="text-left">
                <a href="{{ route('admin.tsProducts.edit', $collection) }}">
                    {!! $collection -> products -> product  !!}
                </a>
                <small>
                    <a href="{{ route('admin.tsProducts.edit', $collection) }}">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                        Editar
                    </a>
                </small>
            </td>
            <td class="text-left">
                    {!! $collection -> category -> category  !!}
            </td>
            <td class="text-left">

                    {!! $collection -> type -> crops  !!}
            </td>
            <td class="text-left">

                    {!! $collection -> stage -> stage  !!}
            </td>
            <td class="text-left">
                <a href="#" class="btn-active">
                    @if ($collection -> active == true)
                        <span class="glyphicon glyphicon-ok-sign color-sucessful"></span>
                    @else
                        <span class="glyphicon glyphicon-remove-sign color-danger"></span>
                    @endif
                </a>
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