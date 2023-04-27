<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="guestbook text-center">
            <img src="images/guestbook.png" alt="guestbook">
        </div>

        @if (Route::currentRouteName() == 'home')
        <a class="fw-bold btn btn-comment text-white text-decoration-none d-flex align-items-center justify-content-center" href="{{ url('/comment') }}">我要留言</a>
        @endif

    </div>
</div>