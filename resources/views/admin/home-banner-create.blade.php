@extends('layouts.master-admin')

@section('breadcrumb')
<div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
    <div class="page-header pull-left">
        <div class="page-title">HOME BANNER</div>
    </div>
    <ol class="breadcrumb page-breadcrumb pull-left">
        <li><i class="fa fa-home"></i>&nbsp;<a href="/admin/">Home</a>&nbsp;&nbsp;<i
                class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
        <li><a href="/admin/home-banner">Home Banner</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
        <li>Edit Banner</li>
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
<script src="/assets/admin/js/home-banner.js"></script>
<script>
var OME = OME || {};

</script>
@stop

@section('content')

<div class="row" style="margin:20px -15px;">
    <div class="col-lg-12">
	    <form method="POST" enctype="multipart/form-data" action="/api/home-banner/create">
	    	<input type="submit" value="Save" />
	    	<div class="'clearfix">&nbsp;</div>

	        <table width="100%" cellspacing="0" cellpadding="0" border="0" style="max-width:1000px" class="tableBanner">
	            <thead>
		            <tr style="background-color:#333; color:#FFF">
		                <th width="180"></th>
		                <th></th>
		            </tr>
	            </thead>
	            <tbody>
		            <tr>
		                <td>Title</td>
		                <td><input name="title" type="text"  size="70%" value=""/></td>
		            </tr>
		            <tr>
		                <td>Link</td>
		                <td><input name="link" type="text"  size="70%" value="" /></td>
		            </tr>
		            <tr>              
		                <td colspan="2">
			                <table width="100%" cellspacing="0" cellpadding="0" border="0" style="max-width:1000px">
			                	<tbody>
			                		<tr>
			                			<td>BM 1 (Size: 1920 x 495)</td>
			                			<td>BM 2 (Size: 1280 x 495)</td>
			                			<td>BM 3 (Size: 768 x 523)</td>
			                		</tr>
			                		<tr>
			                			<td><input name="fileUpload1" type="file" /></td>
			                			<td><input name="fileUpload2" type="file" /></td>
			                			<td><input name="fileUpload3" type="file" /></td>
			                		</tr>
			                		<tr>
			                			<td>EN 1 (Size: 1920 x 495)</td>
			                			<td>EN 2 (Size: 1280 x 495)</td>
			                			<td>EN 3 (Size: 768 x 523)</td>
			                		</tr>
			                		<tr>
			                			<td><input name="fileUpload4" type="file" /></td>
			                			<td><input name="fileUpload5" type="file" /></td>
			                			<td><input name="fileUpload6" type="file" /></td>
			                		</tr>
			                	</tbody>
			                </table>
		                </td>
		            </tr>
		            <tr>
		                <td colspan="2"></td>
		            </tr>
	            </tbody>
	        </table>
	    </form>

    </div>
</div>
@stop