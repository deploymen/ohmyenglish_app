@extends('layouts.master-admin')

@section('breadcrumb')
<div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
    <div class="page-header pull-left">
        <div class="page-title">Create New Article</div>
    </div>
    <ol class="breadcrumb page-breadcrumb pull-left">
        <li><i class="fa fa-home"></i>&nbsp;<a href="/admin/">Home</a>&nbsp;&nbsp;<i
                class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
        <li><a href="/admin/articles">Article</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
        <li><a href="/admin/articles/create">Create New Article</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
    </ol>
    <div class="clearfix"></div>
</div>
@stop

@section('css_include')
<style type="text/css">
td, th{padding: 5px;}
textarea,input[type=text]{ width:100%; padding: 5px; }
</style>
@stop

@section('javascript_include')
<script src="/assets/admin/js/article-create.js"></script>
<script src="/bower_components/tinymce-dist/tinymce.min.js"></script>
<script>
var OME = OME || {};
tinymce.init({
    selector: "textarea",
    plugins: [
        "image link anchor media code searchreplace table hr fullscreen paste fullpage textcolor colorpicker textpattern"
    ],
    image_dimensions: false,
    content_css: "/assets/admin/css/article_tinymce.css",
    style_formats: [
        {title: 'Bold text', inline: 'b'},
        {title: 'header', block: 'h2', styles: {color: '#11435E'}},
        {title: 'image caption', inline: 'span', classes: 'caption'}
    ],
    formats: {
        alignleft: {selector: 'p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li,table,img', classes: 'left'},
        aligncenter: {selector: 'p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li,table,img', classes: 'center'},
        alignright: {selector: 'p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li,table,img', classes: 'right'},
        alignfull: {selector: 'p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li,table,img', classes: 'full'},
        bold: {inline: 'span', 'classes': 'bold'},
        italic: {inline: 'span', 'classes': 'italic'},
        underline: {inline: 'span', 'classes': 'underline', exact: true},
        strikethrough: {inline: 'del'},
        customformat: {inline: 'span', styles: {color: '#00ff00', fontSize: '20px'}, attributes: {title: 'My custom format'}}
    },
    toolbar1: "insertfile undo redo | styleselect formatselect fontsizeselect | bold italic underline",
    toolbar2: "alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link unlink anchor image media code",
    toolbar3: "cut copy paste | searchreplace | forecolor backcolor | table hr subscript superscript | fullscreen ",

    menubar: false,
    toolbar_items_size: 'small'
});
$( "#datepicker" ).datepicker({ dateFormat: 'yy-mm-dd' });
</script>
@stop

@section('content')
<div class="row" style="margin:20px -15px;">
    <div class="col-lg-12">
    <form method="POST" enctype="multipart/form-data" action="/api/articles">
        <table width="100%" cellspacing="0" cellpadding="0" border="0" style="max-width:1000px">
            <thead>
            <tr style="background-color:#333; color:#FFF">
                <th width="180"></th>
                <th></th>
            </thead>
            <tbody>
            <tr>
                <td>Title</td>
                <td><input name="title" type="text" /></td>
            </tr>
            <tr>
                <td>Content</td>
                <td><textarea name="content"></textarea></td>
            </tr>
            <tr>
                <td>Intro</td>
                <td><input name="intro" type="text" /></td>
            </tr>
            <tr>
                <td>Share Copy EN</td>
                <td><input name="share_en" type="text" /></td>
            </tr>
            <tr>
                <td>Share Copy BM</td>
                <td><input name="share_bm" type="text" /></td>
            </tr>
            <tr>
                <td>Published At</td>
                <td><input id="datepicker" name="published_at" type="text" /></td>
            </tr>
            <tr>
                <td>Meta Title</td>
                <td><input name="meta_title" type="text" /></td>
            </tr>
            <tr>
                <td>Meta Description</td>
                <td><input name="meta_description" type="text" /></td>
            </tr>
            <tr>
                <td>Thumbnail(JPG: 300 x 250)</td>
                <td><input name="thumb" type="file" /></td>
            </tr>
            <tr>
                <td>Slider(PNG: 177 x 133)</td>
                <td><input name="xsell" type="file" /></td>
            </tr>
            <tr>
                <td>Share Image(JPG: 1200 x 630)</td>
                <td><input name="share" type="file" /></td>
            </tr>
            </tbody>

        </table>

        <input type="submit" value="Submit New Article" style="margin-top:20px" />
    </form>
    </div>
</div>
@stop