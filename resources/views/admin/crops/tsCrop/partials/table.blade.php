<table class="table table-striped">
    <thead>
    <tr>
        <th class="text-capitalize">
            Nº
        </th>
        <th class="text-capitalize">
           {!! trans('admin.crops.type_crops') !!}
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
                <a href="{{ route('admin.crops.tsCrop.show', $collection) }}">
                    {!! $collection -> crops !!}
                </a>
                <small>
                    <a href="{{ route('admin.crops.tsCrop.show', $collection) }}">
                        <span class="glyphicon glyphicon-glyphicon glyphicon-eye-open" aria-hidden="true"></span>
                       Mostrar
                    </a>
                </small>
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