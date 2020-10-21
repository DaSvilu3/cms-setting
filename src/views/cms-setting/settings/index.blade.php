@extends(config('cms-settings.extends'))
@section(config('cms-settings.contentArea'))
<div class="row">
    <h4 class="header-title m-t-0 m-b-30">{{trans('cms-settings.settings')}}</h4>
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url(config('cms-settings.dashboardLink'))}}">{{trans('cms-settings.home')}}</a></li>
        <li class="breadcrumb-item active">{{trans('cms-settings.settings')}}</li>
    </ul>

    
    <div class="input-group-btn">
            <button type="button" class="btn waves-effect waves-light btn-primary dropdown-toggle" data-toggle="dropdown" style="overflow: hidden; position: relative;" aria-expanded="true">{{trans('cms-settings.create-setting')}} <span class="caret"></span></button>
            <ul class="dropdown-menu">
                <li><a href="{{url(config('cms-settings.prefix').'/settings/create/1')}}">{{trans('cms-settings.create-image')}} </a></li>
                <li><a href="{{url(config('cms-settings.prefix').'/settings/create/2')}}">{{trans('cms-settings.create-text')}} </a></li>
                <li><a href="{{url(config('cms-settings.prefix').'/settings/create/3')}}">{{trans('cms-settings.create-area')}} </a></li>
            </ul>
        </div>
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
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>

                                <th>{{trans('cms-settings.key')}}</th>
                                <th>{{trans('cms-settings.value')}}</th>
                                <th>{{trans('cms-settings.setting')}}</th>
                               
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($settings as $key=>$setting)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$setting->key}}</td>
                                <td>{!!$setting->settingValue!!}</td>

                                <td><a href="{{url(config('cms-settings.prefix').'/settings/update/'.$setting->id)}}" class=" btn btn-xs btn-outline btn-success" ><i class="glyphicon glyphicon-pencil"></i> {{trans('cms-backend-auth.update')}}</a>
                                    <a href="{{url(config('cms-settings.prefix').'/settings/delete/'.$setting->id)}}" onclick="return confirm('are you sure you want delete this page')" class=" btn btn-xs btn-outline btn-danger" ><i class="glyphicon glyphicon-trash"></i> {{trans('cms-backend-auth.delete')}}</a>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
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