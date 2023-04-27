@extends('layouts.app')

@section('content')

@include('layouts.myComment')
<div class="container-fluid">
    <div class="d-flex justify-content-between">
        <div class="d-flex justify-content-center">
            <p class="pe-2 my-5 ms-5">留言</p>
            <form action="{{ route('home') }}" method="POST" class="my-5">
            @csrf
                <select name="order" id="order">
                    <option value="asc"> 由舊到新 </option>
                    <option value="desc"> 由新到舊 </option>
                </select>
            </form>
        </div>
        <div class="d-flex justify-content-center">
            <p class="pe-2 my-5">顯示</p>
            <form action="{{ route('home') }}" method="POST" class="my-5">
            @csrf
                <select name="per-page" id="per-page">
                    <option value="6"> 6 </option>
                    <option value="12"> 12 </option>
                </select>
            </form>
            <p class="px-2 my-5 me-5">筆</p>
        </div>
    </div>
    <div class="row">
        @foreach($comments as $key => $comment)
        <div class="col-md-4 mb-3">
            <div class="card mx-auto border-0" style="width: 20rem;">
                <div class="card-body bg-white rounded-4">
                    <div class="d-flex bg-white justify-content-between">
                        <div class="d-flex flex-row align-items-start my-3 bg-white">
                            <div class="me-3 avatar-img">
                                <img class="bg-white" src="images/avatar/{{$comment->avatar}}" alt="avatar">
                            </div>
                            <div class="my-auto bg-white fw-bold">{{$comment->name}}</div>
                        </div>
                        <div class="my-auto fw-bold p-2 me-2 rounded-2">ID : {{$comment->id}}</div>
                    </div>
                    <div class="mb-3 bg-white">留言日期 : {{$comment->create_time}}</div>
                    <div class="my-3 bg-white">{!! nl2br(e($comment->content)) !!}</div>
                    <div class="d-flex bg-white justify-content-between">
                        @if (Auth::user()->name == $comment->name)
                        <!-- 編輯按鈕 -->
                        <button type="submit" id="" value="" class="button mb-3 me-3 border-0 rounded-2 bg-light">
                            <lord-icon src=" https://cdn.lordicon.com/hbigeisx.json" class="bg-light text-center align-middle me-1" trigger="hover" colors="primary:#848484,secondary:#848484" style="width:20px;height:20px">
                            </lord-icon>編輯留言
                        </button>
                        <!-- 刪除按鈕 -->
                        <button type="submit" id="delete-btn-{{$comment->id}}" value="{{$comment->id}}" class="delete-btn button mb-3 me-3 border-0 rounded-2 bg-light">
                            <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" class="bg-light text-center align-middle me-1" trigger="hover" colors="primary:#000000,secondary:#000000" style="width:20px;height:20px">
                            </lord-icon>刪除留言
                        </button>
                        @endif   
                    </div>
                </div> 
            </div>
        </div>
        @endforeach
    </div>
    <div class="pagination d-flex flex-column text-center mt-3">
        <div class="text-center">共 {{$count}} 筆資料</div>
        <div class="page d-flex flex-row mt-3 justify-content-center mb-3">
            <a class="mx-2 fw-bold text-decoration-none" href="{{$pageData['prev_page_url']}}" aria-label="Previous"><span class="text-secondary bg-none" aria-hidden="true">&laquo;</span></a>

            @foreach(range(1, $totalPage) as $page)
            <div class="page-item mx-2">
                <a class="text-secondary border border-0 text-decoration-none"
                    href="">{{$page}}
                </a>
            </div>
            @endforeach

            <a class="mx-2 fw-bold text-decoration-none" href="{{$pageData['next_page_url']}}" aria-label="Next"><span class="text-secondary bg-none" aria-hidden="true">&raquo;</span></a>
        </div>
    </div>
</div>
@endsection
