<script>
    "use strict";
    const config = {!! json_encode([
        'url' => adminUrl(),
        'lang' => getLocale(),
        'direction' => getDirection(),
        'colors' => $settings->system->colors,
        'translates' => [
            'copied' => admin_trans('Copied to clipboard'),
            'actionConfirm' => admin_trans('Are you sure?'),
            'emptyTable' => admin_trans('No data available in table'),
            'searchPlaceholder' => admin_trans('Start typing to search...'),
            'sLengthMenu' => admin_trans('Rows per page _MENU_'),
            'info' => admin_trans('Showing page _PAGE_ of _PAGES_'),
            'infoEmpty' => admin_trans('Showing 0 to 0 of 0 entries'),
            'infoFiltered' => admin_trans('(filtered from _MAX_ total entries)'),
            'zeroRecords' => admin_trans('No matching records found'),
            'paginate' => [
                'first' => admin_trans('First'),
                'previous' => admin_trans('Previous'),
                'next' => admin_trans('Next'),
                'last' => admin_trans('Last'),
            ],
            'on' => admin_trans('Active'),
            'off' => admin_trans('Disabled'),
            'noneSelectedText' => admin_trans('Nothing selected'),
            'noneResultsText' => admin_trans('No results match'),
            'countSelectedText' => admin_trans('{0} of {1} selected'),
        ],
    ]) !!}
</script>
