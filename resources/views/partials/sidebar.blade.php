<div class="col-md-4">
    <div class="card border-0 shadow-sm">
        <h5 class="card-header border-0">التصنيفات</h5>
        <div class="card-body">
            <ul class="nav flex-column p-0" style="list-style:none !important;">
                <li class="nav-item">
                    <a href="{{ url('/') }}" class="nav-link text-dark">جميع التصنيفات ( {{ $posts_number }} )</a>
                </li>
                @foreach ($categories as $cat)
                    <li class="nav-item">
                        <a href="{{ route('category', [$cat->id, $cat->slug]) }}" class="nav-link text-dark">{{ $cat->title }} ({{ $cat->posts->count() }})</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    {{-- Side Widget --}}
    <div class="card my-4 text-right border-0 shadow-sm">
        <h5 class="card-header border-0">آخر التعليقات</h5>
        <ul class="list-group p-0" style="list-style:none !important;">
            @foreach ($recent_comments as $comment)
                <li class="list-group-item" style="border-left: 0px; border-right: 0px;  border-top: 0px;">
                    <a href="{{ route('post.show', $comment->Post->slug) }}#comments">
                        <img src="{{ $comment->user->profile_photo_url }}" style="float: right" width="40px" alt="" class="rounded-full">
                        <span class="mt-1 me-1 d-inline-block"><strong>{{ $comment->user->name }}</strong></span>
                        <span>{{\Illuminate\Support\Str::limit($comment->body, 60) }}</span>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</div>