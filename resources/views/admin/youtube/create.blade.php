@extends('admin.dashboard')
@section('admin_content')
<div class="row wrapper border-bottom white-bg page-heading animated fadeInRight">
    <div class="col-lg-10">
        <h2>{{__('YouTube Data')}}</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{route('admin.dashboard')}}">{{__('Home')}}</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{route('admin.youtube-data.index')}}">{{__('YouTube Data')}}</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>{{__('Create Youtube Data')}}</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2 align-self-center ">
        <div class="my-auto">
            <a class="btn btn-primary btn-md float-right" href="{{route('admin.youtube-data.index')}}">{{__('YouTube Data List')}}</a>
        </div>
    </div>

</div>

<div class="wrapper wrapper-content animated fadeInRight">

    
    <div class="row">
        
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>{{__('Create YouTube Data')}}</h5>
                    
                </div>
                <div class="ibox-content">
                    <form action="{{route('admin.youtube-data.store')}}" method="POST" enctype="multipart/form-data">  
                        @csrf

                        <div class="form-group  row">
                            
                            <label class="col-sm-3 col-form-label">{{__('YouTube Video ID')}} <span class="text-danger">*</span></label>

                            <div class="col-sm-9">
                                <input type="text" name="youtube_video_id" placeholder="YouTube Video ID" class="form-control">
                            </div>
                        </div>


                        <div class="form-group row">
                            
                            <label class="col-sm-3 col-form-label">{{__('Active Status')}} <span class="text-danger">*</span></label>


                            <div class="col-sm-9">
                                <select class="form-control custom-select" name="status">
                                    <option value="1">{{__('Active')}}</option>
                                    <option value="0">{{__('Inacive')}}</option>
                                </select>


                            </div>
                        </div>

      
                        

                        <div class="hr-line-dashed"></div>
                       
                        <div class="form-group row">
                            <div class="col-sm-4 col-sm-offset-2">

                                <button class="btn btn-primary btn-md" type="submit">{{__('Create New')}}</button>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>


@endsection