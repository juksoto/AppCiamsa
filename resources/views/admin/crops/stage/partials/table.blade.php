<table class="table table-striped table-hover">
    <thead>
    <tr>
        <th class="text-capitalize">
            Nº
        </th>
        <th class="text-capitalize">
            @sortablelink(trans('admin.status.status'))
        </th>
        <th class="text-capitalize">
            {{ trans('admin.crops.subline') }}
        </th>

        <th class="text-capitalize">
            {{ trans('admin.crops.reference') }}
        </th>

        <th class="text-capitalize">
            {{ trans('admin.crops.image') }}
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
                <a href="{{ route('admin.crops.stage.edit', $collection) }}">
                    {!! $collection -> stage !!}
                </a>
                <small>
                    <a href="{{ route('admin.crops.stage.edit', $collection) }}">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                        Editar
                    </a>
                </small>
            </td>
            <td class="text-left">
                {!! $collection -> subline !!}
            </td>
            <td class="text-left">
                {!! $collection -> reference !!}
            </td>
            <td class="text-left">
                <img src="{!! URL::asset('media/stage-crops') . '/' . $collection -> image !!} " alt="" width="100">
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
            <button stage="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            {{ trans('admin.message.no_records_found') }}
        </div>
    @endforelse
</table>