function tinymce_init_callback(editor)
{
    editor.settings.plugins = 'link';
    editor.settings.rel_list =
        [
            {title: 'No Follow', value: 'nofollow'},
            {title: 'Do Follow', value: ''}
        ];

    editor.settings.link_class_list =
        [
            {title: 'Normal', value: ''},
            {title: 'Button', value: 'btn btn-primary'}
        ];
    editor.settings.target_list =
    [
        {title: 'New Window', value: '_blank'},
        {title: 'None', value: ''}
    ];
}
