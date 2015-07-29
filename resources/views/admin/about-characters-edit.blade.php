@extends('layouts.master-admin')

@section('breadcrumb')
<div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
    <div class="page-header pull-left">
        <div class="page-title">ABOUT</div>
    </div>
    <ol class="breadcrumb page-breadcrumb pull-left">
        <li><i class="fa fa-home"></i>&nbsp;<a href="/admin/">Home</a>&nbsp;&nbsp;<i
                class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
        <li><a href="/admin/about-characters">About Characters</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
        <li>Inner Character</li>
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
<script src="/assets/admin/js/about-characters.js"></script>
<script>
var OME = OME || {};
OME = {
    id         		: '{{$charactersEn->id}}',
    name      		: '{{$charactersEn->name}}',
    url_slug      	: '{{$charactersEn->url_slug}}',
    quote    		: '{{$charactersEn->quote}}',
    side_story_en   : '{{$charactersEn->side_story}}',
    side_story_ms   : '{{$charactersMs->side_story}}'
};

</script>
@stop

@section('content')

<div class="row" style="margin:20px -15px;">
    <div class="col-lg-12">
	    <form method="POST" enctype="multipart/form-data" action="/api/about-characters?id={{$charactersEn->id}}">
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
                        <td><input name="name" type="text" size="70%" value="{{$charactersEn->name}}"/></td>
                    </tr>
                   	<tr>
                        <td>Quote</td>
                        <td><input name="quote" type="text" size="70%" value="{{$charactersEn->quote}}"/></td>
                    </tr>
                    <tr>
                        <td>Side Story (En)</td>
                        <td><input name="side_story_en" type="text" size="70%" value="{{$charactersEn->side_story}}" /></td>
                    </tr>
                    <tr>
                        <td>Side Story (BM)</td>
                        <td><input name="side_story_bm" type="text" size="70%" value="{{$charactersMs->side_story}}" /></td>
                    </tr>
                    <tr>
                        <td>Fun Fact (PNG)</td>
                        <td><input name="thumb" type="file" /></td>
                    </tr>
                    <tr>
                        <td colspan="2"><img height="100" src="/assets/images/about-inner/uploads/{{$charactersEn->url_slug}}_vector.png"></td>
                    </tr>
                </tbody>
	        </table>

	       	<input type="submit" value="Save" style="margin-top:20px" />
	    </form>

    </div>
</div>
@stop