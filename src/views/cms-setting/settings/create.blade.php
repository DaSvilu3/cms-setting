@extends(config('cms-settings.extends'))
@section(config('cms-settings.contentArea'))
<?php $cms_setting_types=config('cms-settings.types'); ?>
<div class="row">
    
    <h4 class="header-title m-t-0 m-b-30">{{trans('cms-settings.create-'.$cms_setting_types[$type])}}</h4>

    <ul class="breadcrumb">
        <li><a href="{{url(config('cms-settings.dashboardLink'))}}">{{trans('cms-settings.home')}}</a></li>
        <li><a href="{{url(config('cms-settings.prefix').'/settings')}}">{{trans('cms-settings.settings')}}</a></li>

        <li class="active">{{trans('cms-settings.create-'.$cms_setting_types[$type])}}</li>

    </ul>
    <div class="panel">
        <div class="panel-body">
            <div class="col-sm-12">
                <div class="row">
                    @if(\Session::get('errors')!==null)


                    <div class="alert alert-danger">
                        {{\Session::get('errors')}}
                    </div>

                    @endif
                    @if(\Session::get('success')!==null)


                    <div class="alert alert-success">
                        {{\Session::get('success')}}
                    </div>

                    @endif
                    <form class="form-horizontal" role="form" method="post">
                        <div class="form-group">
                            <label class="col-md-2 control-label">{{trans('cms-settings.key')}}</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="key" placeholder="{{trans('cms-settings.enter-'.$cms_setting_types[$type].'-key')}}" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">{{trans('cms-settings.enter-'.$cms_setting_types[$type].'-value')}}</label>
                            <div class="col-md-10">
                                @if($type==1)
                                  <?= ImageManager::selector('value[]', [], false) ?>    </div>
                                @elseif($type==2)
                                <input type="text" class="form-control" name="value" placeholder="{{trans('cms-settings.enter-'.$cms_setting_types[$type].'-value')}}" required="">
                                @else
                                <textarea name="value" class="form-control" placeholder="{{trans('cms-settings.enter-'.$cms_setting_types[$type].'-value')}}" required=""></textarea>
                                @endif
                            </div>
                        </div>
                    
                    
                        {{ csrf_field() }}
                        <button class="btn btn-purple waves-effect m-b-5" type="submit">{{trans('cms-backend-auth.save')}}</button>






                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
\Session::forget('errors');
\Session::forget('success');
?>
@endsection