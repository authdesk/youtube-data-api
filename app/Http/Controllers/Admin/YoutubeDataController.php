<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\YoutubeData;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\YoutubeData\StoreRequest;
use App\Http\Requests\Admin\YoutubeData\UpdateRequest;
use Brian2694\Toastr\Facades\Toastr;


class YoutubeDataController extends Controller
{
    public function index()
    {
        $youtube_datas = YoutubeData::all();
        return view('admin.youtube.all', compact('youtube_datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.youtube.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        
 
        $validData = $request->validated();

        if (!$validData) 
        {
            Toastr::error('* fields are required!', 'Message', ["positionClass" => "toast-top-right"]);
            return redirect()->back();

        }else {

            //insert data
            $data = $request->all();
            $insert = YoutubeData::create($data);

            if ($insert) {
                Toastr::success('Yutube Data inserted successfully!', 'Message', ["positionClass" => "toast-top-right"]);
                return redirect()->route('admin.youtube-data.index');
            }else {
               Toastr::error('ERROR!', 'Message', ["positionClass" => "toast-top-right"]);
                return back();
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $youtube_data = YouTubeData::findOrFail( $id);
        return view('admin.youtube.view', compact('youtube_data'));  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = YoutubeData::findOrFail($id);
        return view('admin.youtube.edit', compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function update(StoreRequest $request, $id)
    {
        $validData = $request->validated();


        if (!$validData) 
        {
            Toastr::error('* fields are required!', 'Message', ["positionClass" => "toast-top-right"]);
            return redirect()->back();

        }else {
            
            $data = $request->all();
            $update = YoutubeData::findOrFail($id)->update($data);

            if ($update) {
                Toastr::success('Yutube Data updated Successfully!', 'Message', ["positionClass" => "toast-top-right"]);
                return redirect()->route('admin.youtube-data.index');
            }else {
                Toastr::success('ERROR!', 'Message', ["positionClass" => "toast-top-right"]);
                return back();
            }

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        YoutubeData::findOrFail($id)->delete();
        Toastr::success('Yutube Data deleted successfully!', 'Message', ["positionClass" => "toast-top-right"]);
        return redirect()->route('admin.youtube-data.index');
    }


    public function active_youtube_data($id)
    {
        YoutubeData::findOrFail($id)->update(['status' => 1]);
        Toastr::success('Youtube Data actived successfully!', 'Message', ["positionClass" => "toast-top-right"]);
        return redirect()->route('admin.youtube-data.index');
    }


    public function inactive_youtube_data($id)
    {
        YoutubeData::findOrFail($id)->update(['status' => 0]);
        Toastr::success('Youtube Data deactived successfully!', 'Message', ["positionClass" => "toast-top-right"]);
        return redirect()->route('admin.youtube-data.index');
    }
}
