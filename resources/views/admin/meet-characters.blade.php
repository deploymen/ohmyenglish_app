@extends('layouts.master-admin')

@section('breadcrumb')
<div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
    <div class="page-header pull-left">
        <div class="page-title">MEET CHARACTERS</div>
    </div>
    <ol class="breadcrumb page-breadcrumb pull-left">
        <li><i class="fa fa-home"></i>&nbsp;<a href="/admin/">Home</a>&nbsp;&nbsp;<i
                class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
        <li>Meet Characters</li>
    </ol>
    <div class="clearfix"></div>
</div>
@stop

@section('css_include')
<style type="text/css">
td, th{padding: 5px;}
tr:nth-child(even) {background: #EEE}
tr:nth-child(odd) {background: #FFF}
</style>
@stop

@section('javascript_include')
<script>
var OME = OME || {};
OME = {
    name       : '{{$meet->name}}',
    filename   : '{{$meet->filename}}',
    desc_en    : '{{$meet->desc_en}}',
    desc_ms    : '{{$meet->desc_ms}}',
};
</script>

@stop

@section('content')

<div class="row" style="margin:20px -15px;">
    <div class="col-lg-12">
        <form method="POST" enctype="multipart/form-data" action="/api/home/meet-characters">
            <table width="100%" cellspacing="0" cellpadding="0" border="0" style="max-width:1000px">
                <thead>
                    <tr style="background-color:#333; color:#FFF">
                        <th width="180"></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Character Name</td>
                        <td><input name="name" type="text" size="70%" value="{{$meet->name}}" /></td>
                    </tr>
                    <tr>
                        <td>Description Copy EN</td>
                        <td><input name="desc_en" type="text" size="70%" value="{{$meet->desc_en}}" /></td>
                    </tr>
                    <tr>
                        <td>Description Copy BM</td>
                        <td><input name="desc_ms" type="text" size="70%" value="{{$meet->desc_ms}}" /></td>
                    </tr>
                    <tr>
                        <td>Chracter Image</td>
                        <td><input name="charThumb" type="file" /></td>
                    </tr>
                    <tr>
                        <td colspan="2"><span><img height="100" src="/assets/images/home/uploads/{{$meet->filename}}.png"></td>
                    </tr>
                </tbody>
            </table>

            <input type="submit" value="Save" style="margin-top:20px" />
        </form>

    </div>
</div>

@stop