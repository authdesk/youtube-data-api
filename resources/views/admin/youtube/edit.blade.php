@extends('admin.dashboard')
@section('admin_content')
<div class="row wrapper border-bottom white-bg page-heading animated fadeInRight">
    <div class="col-lg-10">
        <h2>{{__('Create YouTube Data')}}</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{route('admin.dashboard')}}">{{__('Home')}}</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{route('admin.youtube-data.index')}}">{{__('YouTube Data')}}</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>{{__('Edit YouTube Data')}}</strong>
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
                    <h5>{{__('Create Youtube Data')}}</h5>
                    
                </div>
                <div class="ibox-content">
                    <form action="{{route('admin.youtube-data.update', $edit->id)}}" method="POST" enctype="multipart/form-data">  
                        @csrf
                        @method('PUT')

                        <div class="form-group  row">
                            
                            <label class="col-sm-3 col-form-label">{{__('Youtube Video')}} <span class="text-danger">*</span></label>

                            <div class="col-sm-10">
                                <input type="text" name="youtube_video_id" value="{{$edit->youtube_video_id}}" placeholder="Youtube Video" class="form-control">
                            </div>
                        </div>




                        <div class="hr-line-dashed"></div>
                       
                        <div class="form-group row">
                            <div class="col-sm-4 col-sm-offset-2">

                                <button class="btn btn-primary btn-md" type="submit">{{__('Update')}}</button>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>



@endsection