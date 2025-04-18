<!-- comment list -->
<h6 class="fw-semibold mb-30">Comment</h6>
                          <ul class="comment__list">
                            @forelse($comments as $comment)
                                <li>
                                    <div class="is__content">
                                        <div class="d-flex gap-3">
                                            @php
                                                $gravatarUrl = 'https://www.gravatar.com/avatar/' . md5(strtolower(trim($comment->comment_email))) . '?s=60&d=identicon';
                                            @endphp

                                            <img height="60" width="60" src="{{ $gravatarUrl }}" alt="{{ $comment->comment_name }}" class="rounded-2 mb-3">

                                            <div class="d-flex flex-column">
                                                <a id="comment-name" href="#" class="font-20 text-dark fw-medium ">{{ $comment->comment_name }}</a>
                                                <span>{{ $comment->created_at->diffForHumans() }}</span>
                                            </div>
                                        </div>
                                        <p>{!! html_entity_decode($comment->comment) !!}</p>

                                        <a id="comment-reply-link" href="javascript:void(0);" class="rts__btn reply__btn mt-3 comment-reply-link" data-comment-id="{{ $comment->id }}">Reply</a>

                                    </div>

                                    {{-- Show replies (if any) --}}
                                    @if($comment->replies->count())
                                        <ul class="ps-5 mt-2">
                                            @foreach($comment->replies as $reply)
                                                <li>
                                                    <div class="is__content">
                                                        <div class="d-flex gap-3">
                                                            @php
                                                                $replyGravatar = 'https://www.gravatar.com/avatar/' . md5(strtolower(trim($reply->comment_email))) . '?s=60&d=identicon';
                                                            @endphp

                                                            <img height="60" width="60" src="{{ $replyGravatar }}" alt="{{ $reply->comment_name }}" class="rounded-2 mb-3">

                                                            <div class="d-flex flex-column">
                                                                <a id="comment-name" href="#" class="font-20 text-dark fw-medium">{{ $reply->comment_name }}</a>
                                                                <span>{{ $reply->created_at->diffForHumans() }}</span>
                                                            </div>
                                                        </div>
                                                        <p>{!! html_entity_decode($reply->comment) !!}</p>
                                                        <a id="comment-reply-link" href="javascript:void(0);" class="rts__btn reply__btn mt-3 comment-reply-link" data-comment-id="{{ $reply->id }}" >Reply</a>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </li>
                            @empty
                                <div class="alert alert-info">Be the first to comment on this post</div>
                            @endforelse

                          </ul>
                         <!-- comment list end -->

                         <!-- comment reply form -->
                         <div id="reply-comment" style="display: none;" class="review__form job__contact mt-40">
                            <h6  id="show-comment-name" class="fw-semibold mb-30">Reply to this Comment (<a style="display: none; font-size:16px" id="cancel-reply" href="javascript:void(0);" class="rts__btn reply__btn mt-3">Cancel</a>)</h6>
                            <form id="reply-post-comment-form" method="POST" action="#" class="d-flex flex-column gap-4">
                                @csrf
                                <input hidden type="text" name="parent_id" id="parent_id" value="">
                                <div class="row row-cols-lg-2 row-cols-1 gap-3 gap-lg-0">
                                    <div class="search__item">
                                        <label for="name" class="mb-3 font-20 fw-medium text-dark text-capitalize">Name</label>
                                        <div class="position-relative">
                                            <input type="text" name="comment_name" id="comment-name" placeholder="Your Name" autocomplete="off">
                                            <i class="fa-light fa-user"></i>
                                        </div>
                                        <small style="color: red;" id="error-comment_name"></small>
                                    </div>
                                    <div class="search__item">
                                        <label for="bemail" class="mb-3 font-20 fw-medium text-dark text-capitalize">Your Email</label>
                                        <div class="position-relative">
                                            <input type="text" id="comment-email" name="comment_email" placeholder="Enter your email" autocomplete="off">
                                            <i class="rt-mailbox"></i>
                                        </div>
                                        <small style="color: red;" id="error-comment_email"></small>
                                    </div>
                                </div>
                                <div class="search__item">
                                    <label class="mb-3 font-20 fw-medium text-dark text-capitalize" for="message">Your Comment</label>
                                    <textarea name="comment" id="comment" placeholder="Message"></textarea>
                                    <i class="fa-thin fa-comment-lines"></i>
                                    <small style="color: red;" id="error-comment"></small>
                                </div>
                                <button type="submit" class="rts__btn fill__btn be-1 max-content apply__btn">Reply</button>
                                <div id="comment-response" class="alert d-none"></div>
                            </form>
                        </div>
                         <!-- comment reply form end -->

                         <!-- comment form -->
                         <div id="comment-form" class="review__form job__contact mt-40">
                            <h6 class="fw-semibold mb-30">Leave a Comment</h6>
                            <form id="post-comment-form" method="POST" action="#" class="d-flex flex-column gap-4">
                                @csrf
                                <div class="row row-cols-lg-2 row-cols-1 gap-3 gap-lg-0">
                                    <div class="search__item">
                                        <label for="name" class="mb-3 font-20 fw-medium text-dark text-capitalize">Name</label>
                                        <div class="position-relative">
                                            <input type="text" name="comment_name" id="comment-name" placeholder="Your Name" autocomplete="off">
                                            <i class="fa-light fa-user"></i>
                                        </div>
                                        <small style="color: red;" id="error-comment_name"></small>
                                    </div>
                                    <div class="search__item">
                                        <label for="bemail" class="mb-3 font-20 fw-medium text-dark text-capitalize">Your Email</label>
                                        <div class="position-relative">
                                            <input type="text" id="comment-email" name="comment_email" placeholder="Enter your email" autocomplete="off">
                                            <i class="rt-mailbox"></i>
                                        </div>
                                        <small style="color: red;" id="error-comment_email"></small>
                                    </div>
                                </div>
                                <div class="search__item">
                                    <label class="mb-3 font-20 fw-medium text-dark text-capitalize" for="message">Your Comment</label>
                                    <textarea name="comment" id="comment" placeholder="Message"></textarea>
                                    <i class="fa-thin fa-comment-lines"></i>
                                    <small style="color: red;" id="error-comment"></small>
                                </div>
                                <button type="submit" class="rts__btn fill__btn be-1 max-content apply__btn">Submit Comment</button>
                                <div id="comment-response" class="alert d-none"></div>
                            </form>
                        </div>
                         <!-- comment form end -->