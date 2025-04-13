
<div class="job__search__section mb-40">
                     <div class="d-flex flex-column gap-3">
                        <div class="search__item">
                           <label for="search" class="mb-20 font-20 fw-medium text-dark text-capitalize">Search By Post Title</label>
                           <div class="position-relative">
                              <form action="{{ route('blog.search') }}" method="GET">
                                 <input name="search" type="text" id="search" placeholder="Enter Post Title" autocomplete="off">
                                 <i class="fa-light fa-magnifying-glass"></i>
                              </form>
                           </div>
                        </div>
                        <!-- category item -->
                        <div class="search__item">
                           <h6 class="mb-20 font-20 fw-medium text-dark text-capitalize">Category</h6>
                           <div class="search__item__list">

                           @forelse($categories as $category)
                              <div class="d-flex align-items-center justify-content-between list">
                                 <div class="d-flex gap-2 align-items-center checkbox">
                                    <input type="checkbox" name="{{ $category->category_slug }}" id="{{ $category->category_slug }}">
                                    <label for="web">{{$category->category_name}}</label>
                                 </div>
                                 <span>({{$category->category_count}})</span>
                              </div>
                            @empty 
                            @endforelse
                              
                              
                           </div>
                        </div>
                        <!-- category item end -->
                         
                        <!-- tags -->
                        <div class="search__item">
                            <h6 class="mb-20 font-20 fw-medium text-dark text-capitalize">Tags</h6>
                            <div class="job__tags d-flex flex-wrap gap-3">
                                @foreach($tags as $tag)
                                    <a href="#">{{ $tag }}</a>
                                @endforeach
                            </div>
                        </div>

                        <!-- tags end -->
                         
                        <!-- latest blog -->
                        <div class="search__item">
                           <h6 class="mb-20 font-20 fw-medium text-dark text-capitalize">Latest Blog</h6>
                           <div class="d-flex flex-column gap-4">

                           @forelse($latest as $latest)
                                <div class="latest__blog d-flex align-items-center gap-4 flex-wrap flex-sm-nowrap flex-xxl-nowrap flex-lg-wrap flex-md-nowrap">
                                    <div class="thumb">
                                        <img class="rounded-2" src="{{ asset('uploads/posts/' . $latest->featured_image) }}" alt="">
                                    </div>
                                    <div class="content">
                                        <a href="{{ route('blog.view.single', ['slug' => $latest->slug]) }}" class="fw-semibold">
                                            {{ $latest->title }}
                                        </a>
                                        <span class="d-flex mt-2 gap-2 align-items-center fw-medium">
                                            <img class="svg" height="16" width="16" src="{{ asset('assets/img/icon/calender.svg') }}" alt="">
                                            {{ \Carbon\Carbon::parse($latest->created_at)->format('F j, Y') }}
                                        </span>
                                    </div>
                                </div>
                            @empty
                            @endforelse

                              
                           </div>
                        </div>
                        <!-- latest blog end -->
                     </div>
                  </div>