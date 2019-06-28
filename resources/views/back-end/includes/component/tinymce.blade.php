<script src="https://cdn.tiny.cloud/1/67ql42s1dg868xcwuzycclu96ynily1svyoaxi0y0sgq1t2e/tinymce/5/tinymce.min.js"></script>
<script>
    tinymce.init({
        selector: 'textarea.editor',
        forced_root_block : false,
        height: 400,
        visual: false,
        menubar: false,
        branding: false,
        menubar: false,
        plugins: [
            'advlist autolink lists link image charmap print preview anchor',
            'searchreplace visualblocks code fullscreen',
            'insertdatetime media table paste code'
        ],
        toolbar: 'undo redo | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat',
        content_css: [
            '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
            '//www.tiny.cloud/css/codepen.min.css'
        ]
        });
</script>