@extends('layouts.app')

@section('content')

@include('layouts.myComment')
<div class="container-fluid">
    <div class="title d-flex justify-content-center align-items-center text-secondary fs-3 fw-bold">
        <lord-icon src="https://cdn.lordicon.com/rfbqeber.json" trigger="loop" delay="2000" style="width:70px;height:70px">
        </lord-icon>
        我有話想說
    </div>
    <div class="my-3">
        <form method="POST" action="">
            <textarea placeholder="請再此輸入留言，字數限200字！" class="border-0 textarea form-control p-5 d-flex mx-auto" id="textarea" name="textarea" rows="6"></textarea>
            <div class="my-3 d-flex flex-row justify-content-center align-items-center">
                <button class="btn-comment m-3 mb-5 btn fw-bold" type="submit" id="submit">確認</button>
                <a class="btn-comment btn d-flex m-3 mb-5 fw-bold justify-content-center align-items-center" href="{{ url('/home') }}">取消</a>
            </div>
        </form>
    </div>
</div>

@endsection