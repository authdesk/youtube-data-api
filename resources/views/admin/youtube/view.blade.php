@extends('admin.dashboard')
@section('admin_content')

<?php
$video = Youtube::getVideoInfo($youtube_data->youtube_video_id);
$duration = json_encode($video->contentDetails->duration);
$duration = str_replace('"', '', $duration);
$yt_duration = new DateInterval($duration);
$title = json_encode($video->snippet->title);
$yt_title = str_replace('"', '', $title);
$publish_datetime = json_encode($video->snippet->publishedAt);
$publish_datetime = str_replace('"', '', $publish_datetime);
$publish_datetime = Carbon\Carbon::parse($publish_datetime)->format('F d, Y');
$viewCount = json_encode($video->statistics->viewCount);
$viewCount = str_replace('"', '', $viewCount);
$likeCount = json_encode($video->statistics->likeCount);
$likeCount = str_replace('"', '', $likeCount);
$favoriteCount = json_encode($video->statistics->favoriteCount);
$favoriteCount = str_replace('"', '', $favoriteCount);
$commentCount = json_encode($video->statistics->commentCount);
$commentCount = str_replace('"', '', $commentCount);
$tags = json_encode($video->snippet->tags);
$tags = str_replace('"', '', $tags);
$tags = str_replace('[', '', $tags);
$tags = str_replace(']', '', $tags);
?>


<div class="row wrapper border-bottom white-bg page-heading animated fadeInRight">
    <div class="col-lg-10">
        <h2>{{__('YouTube Data')}}</h2>
        
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{route('admin.dashboard')}}">{{__('Home')}}</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{route('admin.youtube-data.index')}}">{{__('YouTube Data Index')}}</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>{{__('YouTube Data')}}</strong>
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
        <div class="col-lg-6">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Video Window</h5>
                
                </div>
                <div class="ibox-content">
                <iframe width="100%" height="auto" src="https://www.youtube.com/embed/WNeLUngb-Xg" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Video Data</h5>
                    
                </div>
                <div class="ibox-content profile-content">
                    <h4><strong>{{$yt_title}}</strong></h4>
                    <p><i class="fa fa-clock-o"></i> {{ $yt_duration->format('%H:%I:%S'); }} <br>
                     Uploaded on {{$publish_datetime}}</p>
                    <h5>
                        Science and Technology {{$yt_title}}
                    </h5>
                    <p>
                      
                    {{$tags}}
                    </p>
                    <div class="row m-t-md">
                        <div class="col-md-3">
                            <h5>{{$viewCount}}  <br><small>Views</small> </h5>
                        </div>
                        <div class="col-md-3">
                            <h5>{{$likeCount}}  <br><small>Likes</small> </h5>
                        </div>
                        <div class="col-md-3">
                            <h5>{{$favoriteCount}} <br> <small>Favorites</small> </h5>
                        </div>
                        <div class="col-md-3">
                            <h5>{{$commentCount}} <br> <small>Comments</small> </h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

                        


@endsection