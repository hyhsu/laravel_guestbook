<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\User;

class CommentController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->input('per-page', 6);
        $order   = $request->input('order', 'desc');
        $orderBy = $request->input('order_by', 'create_time');
          // dd($perPage);
          // 寫一半的功能 ><

        $count = comment::where('valid', '=', 0)->count();
        $query = comment::join('users', 'comments.user_id', '=', 'users.id')
        ->select('comments.*', 'users.name', 'users.avatar')
        ->where('valid', '=', 0);

        $query->orderBy($orderBy, $order);
        $comments = $query->paginate($perPage);

        $page = $request->input('page') ?? 1;
        $comments->setPath('home');
        $pageData  = $comments->toArray();
        $totalPage = ceil($count / $perPage);

          // dd($comments);
        return view('home', compact('comments', 'perPage', 'order', 'orderBy'), [
            'count'     => $count,
            'page'      => $page,
            'pageData'  => $pageData,
            'totalPage' => $totalPage,
        ]);

    }


}
