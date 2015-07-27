@extends('layouts.master-admin')

@section('breadcrumb')
<div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
    <div class="page-header pull-left">
        <div class="page-title">Trailer Image</div>
    </div>
    <ol class="breadcrumb page-breadcrumb pull-left">
        <li><i class="fa fa-home"></i>&nbsp;<a href="/admin/">Home</a>&nbsp;&nbsp;<i
                class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
        <li><a href="/admin/trailer-image">Trailer Image</a></li>
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
<!-- <script src="/assets/admin/js/article-create.js"></script> -->
<script src="/bower_components/tinymce-dist/tinymce.min.js"></script>
<script type="text/javascript">
var OME = OME || {};
tinymce.init({
    selector: "textarea",
    plugins: [
        "image"
    ],
    toolbar1: "styleselect formatselect | image",

    menubar: false,
    toolbar_items_size: 'small'
});

</script>
@stop

@section('content')
<div class="row" style="margin:20px -15px;">
    <div class="col-lg-12">
    <form method="POST" enctype="multipart/form-data" action="/api/trailer-image">
        <table>
            <thead>
                <tr style="background-color:#333; color:#FFF">
                    <th width="180">Episode</th>
                    <th width="500">Trailer Image</th>
                </tr>
            </thead>
            <tbody>
                <!-- <tr>
                    <td>Episode 1</td>
                    <td><input name="ep0" type="file" /></td>
                </tr>
                <tr>
                    <td>Episode 2</td>
                    <td><input name="ep1" type="file" /></td>
                </tr>
                <tr>
                    <td>Episode 3</td>
                    <td><input name="ep2" type="file" /></td>
                </tr>
                <tr>
                    <td>Episode 4</td>
                    <td><input name="ep3" type="file" /></td>
                </tr> -->
                <input type="hidden" name="MAX_FILE_SIZE" value="2097152" /> 
                @for($i = 0; $i < count($trailers); $i++)
                <tr>
                    <td>Episode {{$trailers[$i]->week}}</td>
                    <td><input name="ep-{{$i}}" type="file" /></td>
                </tr>
                <tr>
                    <td colspan="2"><img height="100" src="/assets/images/about/trailer/uploads/{{$trailers[$i]->url_name}}.jpg"></td>
                </tr>
                @endfor
            </tbody>
        </table>

        <input type="submit" value="Upload" style="margin-top:20px" />
    </form>
    </div>
</div>
@stop