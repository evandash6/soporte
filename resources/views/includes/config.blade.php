<script>
    "use strict";
    const config = {!! json_encode([
        'lang' => app()->getLocale(),
        'url' => url('/'),
        'colors' => $settings->colors,
        'translates' => [
            'copied' => translate('Copied to clipboard'),
            'actionConfirm' => translate('Are you sure?'),
        ],
    ]) !!};
</script>
