@extends('layouts.master-admin')

@section('breadcrumb')
<div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
    <div class="page-header pull-left">
        <div class="page-title">POP QUIZ</div>
    </div>
    <ol class="breadcrumb page-breadcrumb pull-left">
        <li><i class="fa fa-home"></i>&nbsp;<a href="/admin/">Home</a>&nbsp;&nbsp;<i
                class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
        <li class="active">Pop Quiz</li>
    </ol>
    <div class="clearfix"></div>
</div>
@stop

@section('css_include')
<style type="text/css">
.row { max-width: 1000px; }
.row .col-lg-3 { height: 100px; font-size: 22px; text-align: center; line-height: 100px; }
.outer-border { border: 1px solid #000; }
.right-border { border-right: 1px solid #000; }
.bottom-border { border-bottom: 1px solid #000; }
span.weeks { 
    position:absolute;  
    left: 0;  
    width:100%;  
    height:100%;  
}
.on { background-color: #32CD32 ; }
.off { background-color: #ccc; }
</style>
@stop

@section('javascript_include')
<script src="/assets/admin/js/classroom-exercise-setting.js"></script>
@stop

@section('content')
<div class="row" data-ng-init="init()">
    <div class="col-lg-12 outer-border">
        
        <div class="row bottom-border">
            <div class="col-xs-3 col-lg-3 right-border {{($weeks[0]->enable)?'on':'off'}}">
                <a href="/admin/pop-quiz/1"><span class="weeks">Week 1</span></a>
            </div>
            <div class="col-xs-3 col-lg-3 right-border {{($weeks[1]->enable)?'on':'off'}}">
                <a href="/admin/pop-quiz/2"><span class="weeks">Week 2</span></a>
            </div>
            <div class="col-xs-3 col-lg-3 right-border {{($weeks[2]->enable)?'on':'off'}}">
                <a href="/admin/pop-quiz/3"><span class="weeks">Week 3</span></a>
            </div>
            <div class="col-xs-3 col-lg-3 {{($weeks[3]->enable)?'on':'off'}}">
                <a href="/admin/pop-quiz/4"><span class="weeks">Week 4</span></a>
            </div>
        </div>
        <div class="row bottom-border">
            <div class="col-xs-3 col-lg-3 right-border {{($weeks[4]->enable)?'on':'off'}}">
                <a href="/admin/pop-quiz/5"><span class="weeks">Week 5</span></a>
            </div>
            <div class="col-xs-3 col-lg-3 right-border {{($weeks[5]->enable)?'on':'off'}}">
                <a href="/admin/pop-quiz/6"><span class="weeks">Week 6</span></a>
            </div>
            <div class="col-xs-3 col-lg-3 right-border {{($weeks[6]->enable)?'on':'off'}}">
               <a href="/admin/pop-quiz/7"><span class="weeks">Week 7</span></a>
            </div>
            <div class="col-xs-3 col-lg-3 {{($weeks[7]->enable)?'on':'off'}}">
                <a href="/admin/pop-quiz/8"><span class="weeks">Week 8</span></a>
            </div>
        </div>
        <div class="row bottom-border">
            <div class="col-xs-3 col-lg-3 right-border {{($weeks[8]->enable)?'on':'off'}}">
                <a href="/admin/pop-quiz/9"><span class="weeks">Week 9</span></a>
            </div>
            <div class="col-xs-3 col-lg-3 right-border {{($weeks[9]->enable)?'on':'off'}}">
                <a href="/admin/pop-quiz/10"><span class="weeks">Week 10</span></a>
            </div>
            <div class="col-xs-3 col-lg-3 right-border {{($weeks[10]->enable)?'on':'off'}}">
                <a href="/admin/pop-quiz/11"><span class="weeks">Week 11</span></a>
            </div>
            <div class="col-xs-3 col-lg-3 {{($weeks[11]->enable)?'on':'off'}}">
                <a href="/admin/pop-quiz/12"><span class="weeks">Week 12</span></a>
            </div>
        </div>
        <div class="row bottom-border">
            <div class="col-xs-3 col-lg-3 right-border {{($weeks[12]->enable)?'on':'off'}}">
                <a href="/admin/pop-quiz/13"><span class="weeks">Week 13</span></a>
            </div>
            <div class="col-xs-3 col-lg-3 right-border {{($weeks[13]->enable)?'on':'off'}}">
                <a href="/admin/pop-quiz/14"><span class="weeks">Week 14</span></a>
            </div>
           <div class="col-xs-3 col-lg-3 right-border {{($weeks[14]->enable)?'on':'off'}}">
                 <a href="/admin/pop-quiz/15"><span class="weeks">Week 15</span></a>
            </div>
            <div class="col-xs-3 col-lg-3 {{($weeks[15]->enable)?'on':'off'}}">
                <a href="/admin/pop-quiz/16"><span class="weeks">Week 16</span></a>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-3 col-lg-3 right-border {{($weeks[16]->enable)?'on':'off'}}">
                <a href="/admin/pop-quiz/17"><span class="weeks">Week 17</span></a>
            </div>
            <div class="col-xs-3 col-lg-3 right-border {{($weeks[17]->enable)?'on':'off'}}">
                <a href="/admin/pop-quiz/18"><span class="weeks">Week 18</span></a>
            </div>
            <div class="col-xs-3 col-lg-3 right-border {{($weeks[18]->enable)?'on':'off'}}">
                <a href="/admin/pop-quiz/19"><span class="weeks">Week 19</span></a>
            </div>
            <div class="col-xs-3 col-lg-3 {{($weeks[19]->enable)?'on':'off'}}">
                <a href="/admin/pop-quiz/20"><span class="weeks">Week 20</span></a>
            </div>
        </div>

    </div>
</div>
@stop