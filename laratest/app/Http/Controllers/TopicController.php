<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Topic;
use App\Models\Block;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $topics = Topic::all();
        $page="Главная";
        $id=0;
        return view("topic.index", ["topics"=>$topics, "page"=>$page, "id"=>$id]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Auth::check())
        {
            return redirect('login');
        }
        $topic = new Topic;
        $page="Добавление раздела";
        //return view("topic.create", array("topic"=>$topic, "page"=>$page));
        return view("topic.create", ["topic"=>$topic, "page"=>$page]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages=[
            "unique"=>"Поле :atribute должно быть уникальным",
            "required"=>"Поле :atribute должно быть указано!"
        ];
        $this->validate($request,[
            "topicname"=>"required|unique:topics,topicname|max:100"
        ], $messages);
        $topic = new Topic;
        $topic->topicname=$request->topicname;
        if(!$topic->save())
        {
            $err=$topic->getError();
            return redirect()->route("topic.create")->with("errors", $err)->withInput();
        }
        else
        {
            $message="Раздел успешно добавлен. Id = ". $topic->id;
            return redirect()->route("topic.create")->with("message", $message);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $topics = Topic::all();
        $blocks=Block::where("topicid", "=", $id)->get();
        $page="Главная";
        return view("topic.index", ["topics"=>$topics, "blocks"=>$blocks, "page"=>$page, "id"=>$id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
