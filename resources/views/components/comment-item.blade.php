<li class="mb-4"> {{-- Add margin-bottom here --}}
    <div class="is__content">
        <div class="d-flex gap-3">
            @php
                $gravatarUrl = 'https://www.gravatar.com/avatar/' . md5(strtolower(trim($comment->comment_email))) . '?s=60&d=identicon';
            @endphp

            <img height="60" width="60" src="{{ $gravatarUrl }}" alt="{{ $comment->comment_name }}" class="rounded-2 mb-3">

            <div class="d-flex flex-column">
                <a id="get-comment-name" href="#" class="font-20 text-dark fw-medium">{{ $comment->comment_name }}</a>
                <span>{{ $comment->created_at->diffForHumans() }}</span>
            </div>
        </div>
        <p>{!! html_entity_decode($comment->comment) !!}</p>

        <a id="comment-reply-link" href="javascript:void(0);" class="rts__btn reply__btn mt-3 comment-reply-link" data-comment-id="{{ $comment->id }}">Reply</a>
    </div>

    @if($comment->replies->count())
        <ul class="ps-5 mt-2">
            @foreach($comment->replies as $reply)
                @include('components.comment-item', ['comment' => $reply])
            @endforeach
        </ul>
    @endif
</li>
