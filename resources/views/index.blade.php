@push('meta')
    <meta name="description" content="">
@endpush

@push('title')
    <title>Brazillian Jiu Jitsu School</title>
@endpush

@extends('layouts.app')

@section('content')
    <!-- Hero image  -->
    <section>
        <div class="hero-slider-container">
            <div class="splide hero-slider" aria-label="Hero slider">
                <div class="splide__track">
                    <ul class="splide__list">
                        <li class="splide__slide is-active">
                            <div class="hero-slide-img-wrap">
                                <img id="hero-1" src="{{ asset('images/hero-image/hero-img-1.jpg') }}" alt="">
                            </div>
                        </li>
                        <li class="splide__slide">
                            <div class="hero-slide-img-wrap">
                                <img id="hero-2" src="{{ asset('images/hero-image/hero-img-2.jpg') }}" alt="">
                            </div>
                        </li>
                        <li class="splide__slide">
                            <div class="hero-slide-img-wrap">
                                <img id="hero-3" src="{{ asset('images/hero-image/hero-img-3.jpg') }}" alt="">
                            </div>
                        </li>
                        <li class="splide__slide">
                            <div class="hero-slide-img-wrap">
                                <img id="hero-4" src="{{ asset('images/hero-image/hero-img-4.jpg') }}" alt="">
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="container">
                <!-- Brazilian Jiu Jitsu text -->
                <div class="headline-title-wrap">
                    <h1>Brazilian <br>Jiu Jitsu</h1>
                    <h4>Grappling Resources</h4>
                </div>
            </div>
        </div>
    </section>

    <section class="hero-search-wrap">
        <div id="container" class="container">
            <div class="search-wrapper">
                <div class="search-wrapper-icon">
                    <i class="search-icon fas fa-search"></i>
                    <input type="text" class="search">
                </div>
                <div class="search-wrapper-btn">
                    <button class="search-button">Search</button>
                </div>
            </div>
        </div>
    </section>

    <!-- Video img Section -->
    <section class="video-container">
        <div class="container">
            <div class="video-text-holder">
                <img class="video-text-img" src="{{ asset('images/svg/video-filled.svg') }}">
                <span class="video-ellipse-one"></span>
                <img class="video-text-img" src="{{ asset('images/svg/video-outline.svg') }}">
                <span class="video-ellipse-two"></span>
                <img class="video-text-img" src="{{ asset('images/svg/video-outline.svg') }}">
            </div>
        </div>
    </section>

    <!-- video slider section  -->
    <section>
        <div class="special-container">
            <!-- desktop video slider  -->
            <div class="splide video-contain-slider-desktop" aria-label="Hero slider">
                <div class="splide__track">
                    <ul class="splide__list">
                        <li class="splide__slide is-active">
                            <div class="relative">
                                <iframe width="100%" height="315"
                                    src="https://www.youtube.com/embed/-LhSBH3BBFE&autoplay=1"
                                    srcdoc="<style>*{padding:0;margin:0;overflow:hidden}html,body{height:100%}img,span{position:absolute;width:100%;top:0;bottom:0;margin:auto}span{height:1.5em;text-align:center;font:48px/1.5 sans-serif;color:white;text-shadow:0 0 0.5em black}</style><a href=https://www.youtube.com/embed/-LhSBH3BBFE?autoplay=1><img src='{{ asset('images/img/poster1.png') }}' alt='Video The Dark Knight Rises: What Went Wrong? – Wisecrack Edition'><span>▶</span></a>"
                                    frameborder="0"
                                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen
                                    title="The Dark Knight Rises: What Went Wrong? – Wisecrack Edition"></iframe>
                                <div class="video-caption">
                                    <p class="video-headline">How and When to
                                        Use de la Riva Guard</p>
                                    <p class="video-date">Posted on November
                                        7, 2017</p>
                                </div>
                            </div>
                        </li>

                        <li class="splide__slide">
                            <div class="relative">
                                <iframe width="100%" height="315" src="https://www.youtube.com/embed/DzDWhnc3uZs"
                                    srcdoc="<style>*{padding:0;margin:0;overflow:hidden}html,body{height:100%}img,span{position:absolute;width:100%;top:0;bottom:0;margin:auto}span{height:1.5em;text-align:center;font:48px/1.5 sans-serif;color:white;text-shadow:0 0 0.5em black}</style><a href=https://www.youtube.com/embed/DzDWhnc3uZs?autoplay=1><img src='{{ asset('images/img/poster2.png') }}' alt='Video The Dark Knight Rises: What Went Wrong? – Wisecrack Edition'><span>▶</span></a>"
                                    frameborder="0"
                                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen
                                    title="The Dark Knight Rises: What Went Wrong? – Wisecrack Edition"></iframe>
                                <div class="video-caption">
                                    <p class="video-headline">Guillotine from
                                        Butterfly</p>
                                    <p class="video-date">Posted on November
                                        7, 2017</p>
                                </div>
                            </div>
                        </li>

                        <li class="splide__slide">
                            <div class="relative">
                                <iframe width="100%" height="315" src="https://www.youtube.com/embed/r2jge_FCaSk"
                                    srcdoc="<style>*{padding:0;margin:0;overflow:hidden}html,body{height:100%}img,span{position:absolute;width:100%;top:0;bottom:0;margin:auto}span{height:1.5em;text-align:center;font:48px/1.5 sans-serif;color:white;text-shadow:0 0 0.5em black}</style><a href=https://www.youtube.com/embed/r2jge_FCaSk?autoplay=1><img src='{{ asset('images/img/poster3.png') }}' alt='Video The Dark Knight Rises: What Went Wrong? – Wisecrack Edition'><span>▶</span></a>"
                                    frameborder="0"
                                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen
                                    title="The Dark Knight Rises: What Went Wrong? – Wisecrack Edition"></iframe>
                                <div class="video-caption">
                                    <p class="video-headline">How and When to
                                        Use de la Riva Guard</p>
                                    <p class="video-date">Posted on November
                                        7, 2017</p>
                                </div>
                            </div>
                        </li>

                        <li class="splide__slide">
                            <div class="relative">
                                <iframe width="100%" height="315" src="https://www.youtube.com/embed/fS3aEg7UPKw"
                                    srcdoc="<style>*{padding:0;margin:0;overflow:hidden}html,body{height:100%}img,span{position:absolute;width:100%;top:0;bottom:0;margin:auto}span{height:1.5em;text-align:center;font:48px/1.5 sans-serif;color:white;text-shadow:0 0 0.5em black}</style><a href=https://www.youtube.com/embed/fS3aEg7UPKw?autoplay=1><img src='{{ asset('images/img/poster4.png') }}' alt='Video The Dark Knight Rises: What Went Wrong? – Wisecrack Edition'><span>▶</span></a>"
                                    frameborder="0"
                                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen
                                    title="The Dark Knight Rises: What Went Wrong? – Wisecrack Edition"></iframe>
                                <div class="video-caption">
                                    <p class="video-headline">Guillotine from
                                        Butterfly</p>
                                    <p class="video-date">Posted on November
                                        7, 2017</p>
                                </div>
                            </div>
                        </li>

                        <li class="splide__slide">
                            <div class="relative">
                                <iframe width="100%" height="315" src="https://www.youtube.com/embed/CPL6yzvK2V8"
                                    srcdoc="<style>*{padding:0;margin:0;overflow:hidden}html,body{height:100%}img,span{position:absolute;width:100%;top:0;bottom:0;margin:auto}span{height:1.5em;text-align:center;font:48px/1.5 sans-serif;color:white;text-shadow:0 0 0.5em black}</style><a href=https://www.youtube.com/embed/CPL6yzvK2V8?autoplay=1><img src='{{ asset('images/img/poster1.png') }}' alt='Video The Dark Knight Rises: What Went Wrong? – Wisecrack Edition'><span>▶</span></a>"
                                    frameborder="0"
                                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen
                                    title="The Dark Knight Rises: What Went Wrong? – Wisecrack Edition"></iframe>
                                <div class="video-caption">
                                    <p class="video-headline">How and When to
                                        Use de la Riva Guard</p>
                                    <p class="video-date">Posted on November
                                        7, 2017</p>
                                </div>
                            </div>
                        </li>

                        <li class="splide__slide">
                            <div class="relative">
                                <iframe width="100%" height="315" src="https://www.youtube.com/embed/XBVn9VI4fDM"
                                    srcdoc="<style>*{padding:0;margin:0;overflow:hidden}html,body{height:100%}img,span{position:absolute;width:100%;top:0;bottom:0;margin:auto}span{height:1.5em;text-align:center;font:48px/1.5 sans-serif;color:white;text-shadow:0 0 0.5em black}</style><a href=https://www.youtube.com/embed/XBVn9VI4fDM?autoplay=1><img src='{{ asset('images/img/poster2.png') }}' alt='Video The Dark Knight Rises: What Went Wrong? – Wisecrack Edition'><span>▶</span></a>"
                                    frameborder="0"
                                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen
                                    title="The Dark Knight Rises: What Went Wrong? – Wisecrack Edition"></iframe>
                                <div class="video-caption">
                                    <p class="video-headline">Guillotine from
                                        Butterfly</p>
                                    <p class="video-date">Posted on November
                                        7, 2017</p>
                                </div>
                            </div>
                        </li>

                        <li class="splide__slide">
                            <div class="relative">
                                <iframe width="100%" height="315" src="https://www.youtube.com/embed/ALEeReC3u5Y"
                                    srcdoc="<style>*{padding:0;margin:0;overflow:hidden}html,body{height:100%}img,span{position:absolute;width:100%;top:0;bottom:0;margin:auto}span{height:1.5em;text-align:center;font:48px/1.5 sans-serif;color:white;text-shadow:0 0 0.5em black}</style><a href=https://www.youtube.com/embed/ALEeReC3u5Y?autoplay=1><img src='{{ asset('images/img/poster3.png') }}' alt='Video The Dark Knight Rises: What Went Wrong? – Wisecrack Edition'><span>▶</span></a>"
                                    frameborder="0"
                                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen
                                    title="The Dark Knight Rises: What Went Wrong? – Wisecrack Edition"></iframe>
                                <div class="video-caption">
                                    <p class="video-headline">How and When to
                                        Use de la Riva Guard</p>
                                    <p class="video-date">Posted on November
                                        7, 2017</p>
                                </div>
                            </div>
                        </li>

                        <li class="splide__slide">
                            <div class="relative">
                                <iframe width="100%" height="315" src="https://www.youtube.com/embed/LW7YReICdLc"
                                    srcdoc="<style>*{padding:0;margin:0;overflow:hidden}html,body{height:100%}img,span{position:absolute;width:100%;top:0;bottom:0;margin:auto}span{height:1.5em;text-align:center;font:48px/1.5 sans-serif;color:white;text-shadow:0 0 0.5em black}</style><a href=https://www.youtube.com/embed/LW7YReICdLc?autoplay=1><img src='{{ asset('images/img/poster4.png') }}' alt='Video The Dark Knight Rises: What Went Wrong? – Wisecrack Edition'><span>▶</span></a>"
                                    frameborder="0"
                                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen
                                    title="The Dark Knight Rises: What Went Wrong? – Wisecrack Edition"></iframe>
                                <div class="video-caption">
                                    <p class="video-headline">How and When to
                                        Use de la Riva Guard</p>
                                    <p class="video-date">Posted on November
                                        7, 2017</p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="splide__arrows splide__arrows--ltr video-arrows">
                    <button class="splide__arrow splide__arrow--prev video-prev" type="button"
                        aria-label="Previous slide" aria-controls="splide01-track">
                        <div class="mobile-arrow-left">
                            <i class="fa-solid fa-chevron-left"></i>Back
                        </div>
                        <div class="desktop-arrow-left">
                            <i class="fa-solid fa-arrow-left"></i>
                        </div>

                    </button>
                    <button class="splide__arrow splide__arrow--next video-next" type="button" aria-label="Next slide"
                        aria-controls="splide01-track">
                        <div class="mobile-arrow-right">
                            Next<i class="fa-solid fa-chevron-right"></i>
                        </div>
                        <div class="desktop-arrow-right">
                            <i class="fa-solid fa-arrow-right"></i>
                        </div>
                    </button>
                </div>
            </div>

            <!-- mobile videpo slider  -->
            <!-- <div class="splide video-contain-slider-mobile" aria-label="Hero slider">
                    <div class="splide__track">
                      <ul class="splide__list">
                        <li class="splide__slide is-active">
                          <div class="video-contain-slider-wrap">
                            <div class="relative">
                              <iframe width="100%" height="315" src="https://www.youtube.com/embed/-LhSBH3BBFE&autoplay=1"
                                srcdoc="<style>*{padding:0;margin:0;overflow:hidden}html,body{height:100%}img,span{position:absolute;width:100%;top:0;bottom:0;margin:auto}span{height:1.5em;text-align:center;font:48px/1.5 sans-serif;color:white;text-shadow:0 0 0.5em black}</style><a href=https://www.youtube.com/embed/-LhSBH3BBFE?autoplay=1><img src=./assets/img/poster1.png alt='Video The Dark Knight Rises: What Went Wrong? – Wisecrack Edition'><span>▶</span></a>"
                                frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen title="The Dark Knight Rises: What Went Wrong? – Wisecrack Edition"></iframe>
                              <div class="video-caption">
                                <p class="video-headline">How and When to
                                  Use de la Riva Guard</p>
                                <p class="video-date">Posted on November
                                  7, 2017</p>
                              </div>
                            </div>
                          </div>
                          <div class="video-contain-slider-wrap">
                            <div class="relative">
                              <iframe width="100%" height="315" src="https://www.youtube.com/embed/DzDWhnc3uZs"
                                srcdoc="<style>*{padding:0;margin:0;overflow:hidden}html,body{height:100%}img,span{position:absolute;width:100%;top:0;bottom:0;margin:auto}span{height:1.5em;text-align:center;font:48px/1.5 sans-serif;color:white;text-shadow:0 0 0.5em black}</style><a href=https://www.youtube.com/embed/DzDWhnc3uZs?autoplay=1><img src=./assets/img/poster2.png alt='Video The Dark Knight Rises: What Went Wrong? – Wisecrack Edition'><span>▶</span></a>"
                                frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen title="The Dark Knight Rises: What Went Wrong? – Wisecrack Edition"></iframe>
                              <div class="video-caption">
                                <p class="video-headline">Guillotine from
                                  Butterfly</p>
                                <p class="video-date">Posted on November
                                  7, 2017</p>
                              </div>
                            </div>
                          </div>
                          <div class="video-contain-slider-wrap">
                            <div class="relative">
                              <iframe width="100%" height="315" src="https://www.youtube.com/embed/r2jge_FCaSk"
                                srcdoc="<style>*{padding:0;margin:0;overflow:hidden}html,body{height:100%}img,span{position:absolute;width:100%;top:0;bottom:0;margin:auto}span{height:1.5em;text-align:center;font:48px/1.5 sans-serif;color:white;text-shadow:0 0 0.5em black}</style><a href=https://www.youtube.com/embed/r2jge_FCaSk?autoplay=1><img src=./assets/img/poster3.png alt='Video The Dark Knight Rises: What Went Wrong? – Wisecrack Edition'><span>▶</span></a>"
                                frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen title="The Dark Knight Rises: What Went Wrong? – Wisecrack Edition"></iframe>
                              <div class="video-caption">
                                <p class="video-headline">How and When to
                                  Use de la Riva Guard</p>
                                <p class="video-date">Posted on November
                                  7, 2017</p>
                              </div>
                            </div>
                          </div>
                          <div class="video-contain-slider-wrap">
                            <div class="relative">
                              <iframe width="100%" height="315" src="https://www.youtube.com/embed/fS3aEg7UPKw"
                                srcdoc="<style>*{padding:0;margin:0;overflow:hidden}html,body{height:100%}img,span{position:absolute;width:100%;top:0;bottom:0;margin:auto}span{height:1.5em;text-align:center;font:48px/1.5 sans-serif;color:white;text-shadow:0 0 0.5em black}</style><a href=https://www.youtube.com/embed/fS3aEg7UPKw?autoplay=1><img src=./assets/img/poster4.png alt='Video The Dark Knight Rises: What Went Wrong? – Wisecrack Edition'><span>▶</span></a>"
                                frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen title="The Dark Knight Rises: What Went Wrong? – Wisecrack Edition"></iframe>
                              <div class="video-caption">
                                <p class="video-headline">Guillotine from
                                  Butterfly</p>
                                <p class="video-date">Posted on November
                                  7, 2017</p>
                              </div>
                            </div>
                          </div>
                        </li>
                        <li class="splide__slide">
                          <div class="video-contain-slider-wrap">
                            <div class="relative">
                              <iframe width="100%" height="315" src="https://www.youtube.com/embed/CPL6yzvK2V8"
                                srcdoc="<style>*{padding:0;margin:0;overflow:hidden}html,body{height:100%}img,span{position:absolute;width:100%;top:0;bottom:0;margin:auto}span{height:1.5em;text-align:center;font:48px/1.5 sans-serif;color:white;text-shadow:0 0 0.5em black}</style><a href=https://www.youtube.com/embed/CPL6yzvK2V8?autoplay=1><img src=./assets/img/poster1.png alt='Video The Dark Knight Rises: What Went Wrong? – Wisecrack Edition'><span>▶</span></a>"
                                frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen title="The Dark Knight Rises: What Went Wrong? – Wisecrack Edition"></iframe>
                              <div class="video-caption">
                                <p class="video-headline">How and When to
                                  Use de la Riva Guard</p>
                                <p class="video-date">Posted on November
                                  7, 2017</p>
                              </div>
                            </div>
                          </div>
                          <div class="video-contain-slider-wrap">
                            <div class="relative">
                              <iframe width="100%" height="315" src="https://www.youtube.com/embed/XBVn9VI4fDM"
                                srcdoc="<style>*{padding:0;margin:0;overflow:hidden}html,body{height:100%}img,span{position:absolute;width:100%;top:0;bottom:0;margin:auto}span{height:1.5em;text-align:center;font:48px/1.5 sans-serif;color:white;text-shadow:0 0 0.5em black}</style><a href=https://www.youtube.com/embed/XBVn9VI4fDM?autoplay=1><img src=./assets/img/poster2.png alt='Video The Dark Knight Rises: What Went Wrong? – Wisecrack Edition'><span>▶</span></a>"
                                frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen title="The Dark Knight Rises: What Went Wrong? – Wisecrack Edition"></iframe>
                              <div class="video-caption">
                                <p class="video-headline">Guillotine from
                                  Butterfly</p>
                                <p class="video-date">Posted on November
                                  7, 2017</p>
                              </div>
                            </div>
                          </div>
                          <div class="video-contain-slider-wrap">
                            <div class="relative">
                              <iframe width="100%" height="315" src="https://www.youtube.com/embed/ALEeReC3u5Y"
                                srcdoc="<style>*{padding:0;margin:0;overflow:hidden}html,body{height:100%}img,span{position:absolute;width:100%;top:0;bottom:0;margin:auto}span{height:1.5em;text-align:center;font:48px/1.5 sans-serif;color:white;text-shadow:0 0 0.5em black}</style><a href=https://www.youtube.com/embed/ALEeReC3u5Y?autoplay=1><img src=./assets/img/poster3.png alt='Video The Dark Knight Rises: What Went Wrong? – Wisecrack Edition'><span>▶</span></a>"
                                frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen title="The Dark Knight Rises: What Went Wrong? – Wisecrack Edition"></iframe>
                              <div class="video-caption">
                                <p class="video-headline">How and When to
                                  Use de la Riva Guard</p>
                                <p class="video-date">Posted on November
                                  7, 2017</p>
                              </div>
                            </div>
                          </div>
                          <div class="video-contain-slider-wrap">
                            <div class="relative">
                              <iframe width="100%" height="315" src="https://www.youtube.com/embed/LW7YReICdLc"
                                srcdoc="<style>*{padding:0;margin:0;overflow:hidden}html,body{height:100%}img,span{position:absolute;width:100%;top:0;bottom:0;margin:auto}span{height:1.5em;text-align:center;font:48px/1.5 sans-serif;color:white;text-shadow:0 0 0.5em black}</style><a href=https://www.youtube.com/embed/LW7YReICdLc?autoplay=1><img src=./assets/img/poster4.png alt='Video The Dark Knight Rises: What Went Wrong? – Wisecrack Edition'><span>▶</span></a>"
                                frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen title="The Dark Knight Rises: What Went Wrong? – Wisecrack Edition"></iframe>
                              <div class="video-caption">
                                <p class="video-headline">How and When to
                                  Use de la Riva Guard</p>
                                <p class="video-date">Posted on November
                                  7, 2017</p>
                              </div>
                            </div>
                          </div>
                        </li>
                      </ul>
                    </div>
                    <div class="splide__arrows splide__arrows--ltr video-arrows">
                      <button class="splide__arrow splide__arrow--prev video-prev" type="button" aria-label="Previous slide"
                        aria-controls="splide01-track">
                        <div class="mobile-arrow-left">
                          <i class="fa-solid fa-chevron-left"></i>Back
                        </div>
                        <div class="desktop-arrow-left">
                          <i class="fa-solid fa-arrow-left"></i>
                        </div>
            
                      </button>
                      <button class="splide__arrow splide__arrow--next" type="button" aria-label="Next slide"
                        aria-controls="splide01-track">
                        <div class="mobile-arrow-left">
                          Next<i class="fa-solid fa-chevron-right"></i>
                        </div>
                        <div class="desktop-arrow-right">
                          <i class="fa-solid fa-arrow-right"></i>
                        </div>
                      </button>
                    </div>
                  </div> -->


            <div class="see-all-videos-holder">
                <a href="#" class="see-all-videos">See all
                    videos <i class="fa-solid fa-chevron-right"></i></a>
            </div>
            <!-- <div class="arrows--mobile">
                      <button
                        class="arrow--prev-mobile"
                        type="button"
                        aria-label="Previous slide"
                        aria-controls="splide01-track">
                        <i class="fa-solid fa-chevron-left"></i>
                        <a href="#">Back</a>
                      </button>
                      <button
                        class="arrow--next-mobile"
                        type="button"
                        aria-label="Next slide"
                        aria-controls="splide01-track"
                      >
                      <a href="#">Next</a>
                      <i class="fa-solid fa-chevron-right"></i>
                      
                      </button>
                    </div> -->
        </div>
    </section>

    <!-- Categories Section -->
    <section class="categories-container">
        <div class="container">
            <div class="categories-holder">
                <div>
                    <h2 class="categories-title">CATEGORIES</h2>
                </div>
                <div class="categories-card-holder">
                    <div class="categories-card">
                        <a href="#">
                            <img src="{{ asset('images/img/cat1.png') }}">
                            <p class="categories-card-p">Butterfly
                                Guard</p>
                        </a>
                    </div>
                    <div class="categories-card">
                        <a href="#">
                            <img src="{{ asset('images/img/cat2.png') }}">
                            <p class="categories-card-p">de la
                                Riva Guard</p>
                        </a>
                    </div>
                    <div class="categories-card">
                        <a href="#">
                            <img src="{{ asset('images/img/cat3.png') }}">
                            <p class="categories-card-p">de la
                                Riva Guard</p>
                        </a>
                    </div>
                </div>
                <div class="categories-card-para">
                    <p>We welcome user reviews and
                        corrections of Jiu Jitsu Dojos listings.
                        It is also our desire to meet your
                        information needs. Start your search now
                        by select a state from the map below.</p>
                </div>

                <!-- Gyms search input -->
                <form method="POST" action="/search">
                    @csrf
                    <div class="gyms-search-holder">
                        <div class="search-wrapper">
                            <div class="search-wrapper-icon">
                                <i class="search-icon fas fa-search"></i>
                                @if( isset($request->location) )
                                    <input type="text" id="location" name="location" class="search" placeholder="Enter ZIP Code or City/State" value="{{ $request->location }}">
                                @else
                                    <input type="text" id="location" name="location" class="search" placeholder="Enter ZIP Code or City/State" value="{{ old('location') }}">
                                @endif
                            </div>
                        </div>
                        <button class="gyms-search-btn" type="submit">Search</button>
                    </div>
                </form>
                <!-- <div class="gym-top-filter">
                          <div class="gym-top-btn"><a
                              class="gym-top-selected" href="">TOP
                              BJJ GYMS IN USA</a></div>
                          <div class="gym-top-btn"><a href="">TOP
                              BJJ GYMS IN EUROPE</a></div>
                        </div> -->
            </div>
        </div>
    </section>

    <section class="gym-tab-content-section">
        <div id="tabs-container" class="special-container">
            <div class="tab">
                <button class="tablinks" onclick="openGym(event, 'USA')" id="defaultOpen">BJJ GYMS IN USA</button>
                <button class="tablinks" onclick="openGym(event, 'Europe')">BJJ GYMS IN EUROPE</button>
            </div>

            <div id="USA" class="tabcontent">
                <!-- desktop only gym content  -->
                <div class="gym-content desktop">
                    <div class="splide gym-content-usa-slider" aria-label="Hero slider">
                        <div class="splide__track">
                            <ul class="splide__list">
                                <li class="splide__slide is-active">
                                    <div class="gym-content-wrap">
                                        <div class="gyms-img-holder">
                                            <img src="{{ asset('images/img/gym2.png') }}">
                                            <p class="gyms-headline">
                                                Marcelo Garcia
                                                Jiu-Jitsu Academy</p>
                                            <p class="gyms-city-state">Costa Mesa,
                                                California</p>
                                            <div class="gyms-no-holder one">
                                                <img class="current" id="no-1"
                                                    src="{{ asset('images/svg/1blue.svg') }}">
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="splide__slide">
                                    <div class="gym-content-wrap">
                                        <div class="gyms-img-holder">
                                            <img src="{{ asset('images/img/gym2.png') }}">
                                            <p class="gyms-headline">Art of Jiu Jitsu
                                                Academy</p>
                                            <p class="gyms-city-state">Costa Mesa,
                                                California</p>
                                            <div class="gyms-no-holder">
                                                <img class="current" id="no-2"
                                                    src="{{ asset('images/svg/2blue.svg') }}">
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="splide__slide">
                                    <div class="gym-content-wrap">
                                        <div class="gyms-img-holder">
                                            <img src="{{ asset('images/img/gym3.png') }}">
                                            <p class="gyms-headline">Renzo Gracie
                                                Academy</p>
                                            <p class="gyms-city-state">New York City</p>
                                            <div class="gyms-no-holder">
                                                <img class="current" id="no-3"
                                                    src="{{ asset('images/svg/3blue.svg') }}">
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="splide__slide">
                                    <div class="gym-content-wrap">
                                        <div class="gyms-img-holder">
                                            <img src="{{ asset('images/img/gym4.svg') }}">
                                            <p class="gyms-headline">Fight Sports Jiu
                                                Jitsu</p>
                                            <p class="gyms-city-state">Miami, Florida</p>
                                            <div class="gyms-no-holder">
                                                <img class="current" id="no-4"
                                                    src="{{ asset('images/svg/4blue.svg') }}">
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="splide__slide">
                                    <div class="gym-content-wrap">
                                        <div class="gyms-img-holder">
                                            <img src="{{ asset('images/img/gym3.png') }}">
                                            <p class="gyms-headline">Renzo Gracie
                                                Academy</p>
                                            <p class="gyms-city-state">New York City</p>
                                            <div class="gyms-no-holder">
                                                <img class="current" id="no-5"
                                                    src="{{ asset('images/svg/5blue.svg') }}">
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="splide__slide">
                                    <div class="gym-content-wrap">
                                        <div class="gyms-img-holder">
                                            <img src="{{ asset('images/img/gym4.svg') }}">
                                            <p class="gyms-headline">Fight Sports Jiu
                                                Jitsu</p>
                                            <p class="gyms-city-state">Miami, Florida</p>
                                            <div class="gyms-no-holder">
                                                <img class="current" id="no-6"
                                                    src="{{ asset('images/svg/6blue.svg') }}">
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="splide__arrows splide__arrows--ltr">
                            <button class="splide__arrow splide__arrow--prev" type="button" aria-label="Previous slide"
                                aria-controls="splide01-track">
                                <div class="mobile-arrow-left">
                                    <i class="fa-solid fa-chevron-left"></i>Back
                                </div>
                                <div class="desktop-arrow-left">
                                    <i class="fa-solid fa-arrow-left"></i>
                                </div>

                            </button>
                            <button class="splide__arrow splide__arrow--next" type="button" aria-label="Next slide"
                                aria-controls="splide01-track">
                                <div class="mobile-arrow-left">
                                    Next<i class="fa-solid fa-chevron-right"></i>
                                </div>
                                <div class="desktop-arrow-right">
                                    <i class="fa-solid fa-arrow-right"></i>
                                </div>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- gym slider for mobile  -->
                <div class="gym-content mobile">
                    <div class="splide gym-content-usa-slider-mobile" aria-label="Hero slider">
                        <div class="splide__track">
                            <ul class="splide__list">
                                <li class="splide__slide is-active">
                                    <div class="gym-content-wrap">
                                        <div class="gyms-img-holder">
                                            <img src="{{ asset('images/img/gym1.png') }}">
                                            <p class="gyms-headline">Marcelo Garcia
                                                Jiu-Jitsu Academy</p>
                                            <p class="gyms-city-state">New York City</p>
                                            <div class="gyms-no-holder">
                                                <img class="current" id="no-1"
                                                    src="{{ asset('images/svg/1blue.svg') }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="gym-content-wrap">
                                        <div class="gyms-img-holder">
                                            <img src="{{ asset('images/img/gym2.png') }}">
                                            <p class="gyms-headline">Art of Jiu Jitsu
                                                Academy</p>
                                            <p class="gyms-city-state">Costa Mesa,
                                                California</p>
                                            <div class="gyms-no-holder">
                                                <img class="current" id="no-2"
                                                    src="{{ asset('images/svg/2blue.svg') }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="gym-content-wrap">
                                        <div class="gyms-img-holder">
                                            <img src="{{ asset('images/img/gym3.png') }}">
                                            <p class="gyms-headline">Renzo Gracie
                                                Academy</p>
                                            <p class="gyms-city-state">New York City</p>
                                            <div class="gyms-no-holder">
                                                <img class="current" id="no-3"
                                                    src="{{ asset('images/svg/3blue.svg') }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="gym-content-wrap">
                                        <div class="gyms-img-holder">
                                            <img src="{{ asset('images/img/gym4.svg') }}">
                                            <p class="gyms-headline">Fight Sports Jiu
                                                Jitsu</p>
                                            <p class="gyms-city-state">Miami, Florida</p>
                                            <div class="gyms-no-holder">
                                                <img class="current" id="no-4"
                                                    src="{{ asset('images/svg/4blue.svg') }}">
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="splide__slide">
                                    <div class="gym-content-wrap">
                                        <div class="gyms-img-holder">
                                            <img src="{{ asset('images/img/gym3.png') }}">
                                            <p class="gyms-headline">Renzo Gracie
                                                Academy</p>
                                            <p class="gyms-city-state">New York City</p>
                                            <div class="gyms-no-holder">
                                                <img class="current" id="no-5"
                                                    src="{{ asset('images/svg/5blue.svg') }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="gym-content-wrap">
                                        <div class="gyms-img-holder">
                                            <img src="{{ asset('images/img/gym4.svg') }}">
                                            <p class="gyms-headline">Fight Sports Jiu
                                                Jitsu</p>
                                            <p class="gyms-city-state">Miami, Florida</p>
                                            <div class="gyms-no-holder">
                                                <img class="current" id="no-6"
                                                    src="{{ asset('images/svg/6blue.svg') }}">
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="splide__arrows splide__arrows--ltr">
                            <button class="splide__arrow splide__arrow--prev" type="button" aria-label="Previous slide"
                                aria-controls="splide01-track">
                                <div class="mobile-arrow-left">
                                    <i class="fa-solid fa-chevron-left"></i>Back
                                </div>
                                <div class="desktop-arrow-left">
                                    <i class="fa-solid fa-arrow-left"></i>
                                </div>

                            </button>
                            <button class="splide__arrow splide__arrow--next" type="button" aria-label="Next slide"
                                aria-controls="splide01-track">
                                <div class="mobile-arrow-left">
                                    Next<i class="fa-solid fa-chevron-right"></i>
                                </div>
                                <div class="desktop-arrow-right">
                                    <i class="fa-solid fa-arrow-right"></i>
                                </div>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div id="Europe" class="tabcontent">
                <!-- desktop only gym content  -->
                <div class="gym-content desktop">
                    <div class="splide gym-content-europe-slider" aria-label="Hero slider">
                        <div class="splide__track">
                            <ul class="splide__list">
                                <li class="splide__slide is-active">
                                    <div class="gym-content-wrap">
                                        <div class="gyms-img-holder">
                                            <img src="{{ asset('images/img/gym1.png') }}">
                                            <p class="gyms-headline">Marcelo Garcia
                                                Jiu-Jitsu Academy</p>
                                            <p class="gyms-city-state">New York City</p>
                                        </div>
                                        <div class="gyms-no-holder">
                                            <img class="current" id="no-2-1"
                                                src="{{ asset('images/svg/1blue.svg') }}">
                                        </div>
                                    </div>
                                </li>
                                <li class="splide__slide">
                                    <div class="gym-content-wrap">
                                        <div class="gyms-img-holder">
                                            <img src="{{ asset('images/img/gym2.png') }}">
                                            <p class="gyms-headline">Art of Jiu Jitsu
                                                Academy</p>
                                            <p class="gyms-city-state">Costa Mesa,
                                                California</p>
                                            <div class="gyms-no-holder">
                                                <img class="current" id="no-2-2"
                                                    src="{{ asset('images/svg/2blue.svg') }}">
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="splide__slide">
                                    <div class="gym-content-wrap">
                                        <div class="gyms-img-holder">
                                            <img src="{{ asset('images/img/gym3.png') }}">
                                            <p class="gyms-headline">Renzo Gracie
                                                Academy</p>
                                            <p class="gyms-city-state">New York City</p>
                                            <div class="gyms-no-holder">
                                                <img class="current" id="no-2-3"
                                                    src="{{ asset('images/svg/3blue.svg') }}">
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="splide__slide">
                                    <div class="gym-content-wrap">
                                        <div class="gyms-img-holder">
                                            <img src="{{ asset('images/img/gym4.svg') }}">
                                            <p class="gyms-headline">Fight Sports Jiu
                                                Jitsu</p>
                                            <p class="gyms-city-state">Miami, Florida</p>
                                            <div class="gyms-no-holder">
                                                <img class="current" id="no-2-4"
                                                    src="{{ asset('images/svg/4blue.svg') }}">
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="splide__slide">
                                    <div class="gym-content-wrap">
                                        <div class="gyms-img-holder">
                                            <img src="{{ asset('images/img/gym3.png') }}">
                                            <p class="gyms-headline">Renzo Gracie
                                                Academy</p>
                                            <p class="gyms-city-state">New York City</p>
                                            <div class="gyms-no-holder">
                                                <img class="current" id="no-2-5"
                                                    src="{{ asset('images/svg/5blue.svg') }}">
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="splide__slide">
                                    <div class="gym-content-wrap">
                                        <div class="gyms-img-holder">
                                            <img src="{{ asset('images/img/gym4.svg') }}">
                                            <p class="gyms-headline">Fight Sports Jiu
                                                Jitsu</p>
                                            <p class="gyms-city-state">Miami, Florida</p>
                                            <div class="gyms-no-holder">
                                                <img class="current" id="no-2-6"
                                                    src="{{ asset('images/svg/6blue.svg') }}">
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="splide__arrows splide__arrows--ltr">
                            <button class="splide__arrow splide__arrow--prev" type="button" aria-label="Previous slide"
                                aria-controls="splide01-track">
                                <div class="mobile-arrow-left">
                                    <p>Next</p><i class="fa-solid fa-chevron-right"></i>
                                </div>
                                <div class="desktop-arrow-left">
                                    <i class="fa-solid fa-arrow-left"></i>
                                </div>

                            </button>
                            <button class="splide__arrow splide__arrow--next" type="button" aria-label="Next slide"
                                aria-controls="splide01-track">
                                <div class="mobile-arrow-right">

                                    <i class="fa-solid fa-chevron-left"></i>
                                    <p>Back</p>
                                </div>
                                <div class="desktop-arrow-right">
                                    <i class="fa-solid fa-arrow-right"></i>
                                </div>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- gym slider for mobile  -->
                <div class="gym-content mobile">
                    <div class="splide gym-content-europe-slider-mobile" aria-label="Hero slider">
                        <div class="splide__track">
                            <ul class="splide__list">
                                <li class="splide__slide is-active">
                                    <div class="gym-content-wrap">
                                        <div class="gyms-img-holder">
                                            <img src="{{ asset('images/img/gym1.png') }}">
                                            <p class="gyms-headline">Marcelo Garcia
                                                Jiu-Jitsu Academy</p>
                                            <p class="gyms-city-state">New York City</p>
                                            <div class="gyms-no-holder">
                                                <img class="current" id="no-1"
                                                    src="{{ asset('images/svg/1blue.svg') }}">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="gym-content-wrap">
                                        <div class="gyms-img-holder">
                                            <img src="{{ asset('images/img/gym2.png') }}">
                                            <p class="gyms-headline">Art of Jiu Jitsu
                                                Academy</p>
                                            <p class="gyms-city-state">Costa Mesa,
                                                California</p>
                                            <div class="gyms-no-holder">
                                                <img class="current" id="no-2"
                                                    src="{{ asset('images/svg/2blue.svg') }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="gym-content-wrap">
                                        <div class="gyms-img-holder">
                                            <img src="{{ asset('images/img/gym3.png') }}">
                                            <p class="gyms-headline">Renzo Gracie
                                                Academy</p>
                                            <p class="gyms-city-state">New York City</p>
                                            <div class="gyms-no-holder">
                                                <img class="current" id="no-3"
                                                    src="{{ asset('images/svg/3blue.svg') }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="gym-content-wrap">
                                        <div class="gyms-img-holder">
                                            <img src="{{ asset('images/img/gym4.svg') }}">
                                            <p class="gyms-headline">Fight Sports Jiu
                                                Jitsu</p>
                                            <p class="gyms-city-state">Miami, Florida</p>
                                            <div class="gyms-no-holder">
                                                <img class="current" id="no-4"
                                                    src="{{ asset('images/svg/4blue.svg') }}">
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="splide__slide">
                                    <div class="gym-content-wrap">
                                        <div class="gyms-img-holder">
                                            <img src="{{ asset('images/img/gym3.png') }}">
                                            <p class="gyms-headline">Renzo Gracie
                                                Academy</p>
                                            <p class="gyms-city-state">New York City</p>
                                            <div class="gyms-no-holder">
                                                <img class="current" id="no-5"
                                                    src="{{ asset('images/svg/5blue.svg') }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="gym-content-wrap">
                                        <div class="gyms-img-holder">
                                            <img src="{{ asset('images/img/gym4.svg') }}">
                                            <p class="gyms-headline">Fight Sports Jiu
                                                Jitsu</p>
                                            <p class="gyms-city-state">Miami, Florida</p>
                                            <div class="gyms-no-holder">
                                                <img class="current" id="no-6"
                                                    src="{{ asset('images/svg/6blue.svg') }}">
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="splide__arrows splide__arrows--ltr">
                            <button class="splide__arrow splide__arrow--prev" type="button" aria-label="Previous slide"
                                aria-controls="splide01-track">
                                <div class="mobile-arrow-left">
                                    <i class="fa-solid fa-chevron-left"></i>Back
                                </div>
                                <div class="desktop-arrow-left">
                                    <i class="fa-solid fa-arrow-left"></i>
                                </div>

                            </button>
                            <button class="splide__arrow splide__arrow--next" type="button" aria-label="Next slide"
                                aria-controls="splide01-track">
                                <div class="mobile-arrow-left">
                                    Next<i class="fa-solid fa-chevron-right"></i>
                                </div>
                                <div class="desktop-arrow-right">
                                    <i class="fa-solid fa-arrow-right"></i>
                                </div>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Articles Content -->
    <section class="articles-section">
        <div class="special-container artical">
            <div class="article-n-gyms-section">
                <div class="articles-holder">
                    <h2>Latest Brazillian Jiu Jitsu School
                        Listings</h2>
                    @foreach ($gyms as $gym)
                        <div class="single-articles-holder">
                            <div class="article-img">
                                <img class="articles-img" src="{{ $gym->logo_url }}">
                            </div>
                            <div class="article-txt">
                                <div class="articles-text-c">
                                    <a href="/dojo-detail/{{ $gym->id }}" style="color:white; font-size: 18px; text-decoration: underline;">
                                        {{ ucwords(strtolower($gym->name)) }}</a>
                                    <p style="font-size: 18px;color: #1489DE;"> <br>{{ ucwords(strtolower($gym->city)) }},
                                        {{ $gym->state }} - {{ $gym->zip }} |
                                        {{ $gym->phone }}</p>
                                    <p style="font-size: 16px;line-height: 23px;">
                                        <span style="color: #1489DE;">Details:</span>
                                        {{ $gym->details }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="articles-gym-list">
                    <div class="article-gym-list-title-wrap">
                        <h4 class="articles-gym-list-title" onclick="toggleList()">
                            BJJ GYMS IN THE US</h4>
                        <i class="caret-icon fa fa-caret-down" onclick="toggleList()"></i>
                    </div>

                    <div id="stateDropdown" class="articles-gym-list-h">
                        <div class="articles-gym-list-c">
                            <a href="/alabama-dojos">Alabama</a>
                        </div>
                        <div class="articles-gym-list-c">
                            <a href="/alaska-dojos">Alaska</a>
                        </div>
                        <div class="articles-gym-list-c">
                            <a href="/arizona-dojos">Arizona</a>
                        </div>
                        <div class="articles-gym-list-c">
                            <a href="/arkansas-dojos">Arcansas</a>
                        </div>
                        <div class="articles-gym-list-c">
                            <a href="/california-dojos">California</a>
                        </div>
                        <div class="articles-gym-list-c">
                            <a href="/colorado-dojos">Colorado</a>
                        </div>
                        <div class="articles-gym-list-c">
                            <a href="/connecticut-dojos">Connecticut</a>
                        </div>
                        <div class="articles-gym-list-c">
                            <a href="/delaware-dojos">Delaware</a>
                        </div>
                        <div class="articles-gym-list-c">
                            <a href="/district-of-columbia-dojos">District of Columbia</a>
                        </div>
                        <div class="articles-gym-list-c">
                            <a href="/florida-dojos">Florida</a>
                        </div>
                        <div class="articles-gym-list-c">
                            <a href="/georgia-dojos">Georgia</a>
                        </div>
                        <div class="articles-gym-list-c">
                            <a href="/hawaii-dojos">Hawaii</a>
                        </div>
                        <div class="articles-gym-list-c">
                            <a href="/idaho-dojos">Idaho</a>
                        </div>
                        <div class="articles-gym-list-c">
                            <a href="/illinois-dojos">Illinois</a>
                        </div>
                        <div class="articles-gym-list-c">
                            <a href="/indiana-dojos">Indiana</a>
                        </div>
                        <div class="articles-gym-list-c">
                            <a href="/iowa-dojos">Iowa</a>
                        </div>
                        <div class="articles-gym-list-c">
                            <a href="/kansas-dojos">Kansas</a>
                        </div>
                        <div class="articles-gym-list-c">
                            <a href="/kentucky-dojos">Kentucky</a>
                        </div>
                        <div class="articles-gym-list-c">
                            <a href="/louisiana-dojos">Louisiana</a>
                        </div>
                        <div class="articles-gym-list-c">
                            <a href="/maine-dojos">Maine</a>
                        </div>
                        <div class="articles-gym-list-c">
                            <a href="/maryland-dojos">Maryland</a>
                        </div>
                        <div class="articles-gym-list-c">
                            <a href="/massachusetts-dojos">Massachusetts</a>
                        </div>
                        <div class="articles-gym-list-c">
                            <a href="/michigan-dojos">Michigan</a>
                        </div>
                        <div class="articles-gym-list-c">
                            <a href="/minnesota-dojos">Minnesota</a>
                        </div>
                        <div class="articles-gym-list-c">
                            <a href="/mississippi-dojos">Mississippi</a>
                        </div>
                        <div class="articles-gym-list-c">
                            <a href="/missouri-dojos">Missouri</a>
                        </div>
                        <div class="articles-gym-list-c">
                            <a href="/montana-dojos">Montana</a>
                        </div>
                        <div class="articles-gym-list-c">
                            <a href="/nebraska-dojos">Nebraska</a>
                        </div>
                        <div class="articles-gym-list-c">
                            <a href="/nevada-dojos">Nevada</a>
                        </div>
                        <div class="articles-gym-list-c">
                            <a href="/new-hampshire-dojos">New Hampshire</a>
                        </div>
                        <div class="articles-gym-list-c">
                            <a href="/new-jersey-dojos">New Jersey</a>
                        </div>
                        <div class="articles-gym-list-c">
                            <a href="/new-mexico-dojos">New Mexico</a>
                        </div>
                        <div class="articles-gym-list-c">
                            <a href="/new-york-dojos">New York</a>
                        </div>
                        <div class="articles-gym-list-c">
                            <a href="/north-carolina-dojos">North Carolina</a>
                        </div>
                        <div class="articles-gym-list-c">
                            <a href="/north-dakota-dojos">North Dakota</a>
                        </div>
                        <div class="articles-gym-list-c">
                            <a href="/ohio-dojos">Ohio</a>
                        </div>
                        <div class="articles-gym-list-c">
                            <a href="/oklahoma-dojos">Oklahoma</a>
                        </div>
                        <div class="articles-gym-list-c">
                            <a href="/oregon-dojos">Oregon</a>
                        </div>
                        <div class="articles-gym-list-c">
                            <a href="/pennsylvania-dojos">Pennsylvania</a>
                        </div>
                        <div class="articles-gym-list-c">
                            <a href="/rhode-island-dojos">Rhode Island</a>
                        </div>
                        <div class="articles-gym-list-c">
                            <a href="/south-carolina-dojos">South Carolina</a>
                        </div>
                        <div class="articles-gym-list-c">
                            <a href="/south-dakota-dojos">South Dakota</a>
                        </div>
                        <div class="articles-gym-list-c">
                            <a href="/tennessee-dojos">Tennessee</a>
                        </div>
                        <div class="articles-gym-list-c">
                            <a href="/texas-dojos">Texas</a>
                        </div>
                        <div class="articles-gym-list-c">
                            <a href="/utah-dojos">Utah</a>
                        </div>
                        <div class="articles-gym-list-c">
                            <a href="/vermont-dojos">Vermont</a>
                        </div>
                        <div class="articles-gym-list-c">
                            <a href="/virginia-dojos">Virginia</a>
                        </div>
                        <div class="articles-gym-list-c">
                            <a href="/washington-dojos">Washington</a>
                        </div>
                        <div class="articles-gym-list-c">
                            <a href="/west-virginia-dojos">West Virginia</a>
                        </div>
                        <div class="articles-gym-list-c">
                            <a href="/wisconsin-dojos">Wisconsin</a>
                        </div>
                        <div class="articles-gym-list-c">
                            <a href="/wyoming-dojos">Wyoming</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- State list -->

    </section>

    <script>
        // hero-slider -------------------------------------------------------------
        document.addEventListener('DOMContentLoaded', function() {

            var splide = new Splide('.hero-slider', {
                perPage: 1,
                gap: 50,
                perMove: 1,
                arrows: false,
                autoplay: true,
                type: 'loop',
                breakpoints: {
                    767: {
                        perPage: 1,
                    },
                    991: {
                        perPage: 1,
                    }
                }
            });

            splide.mount();
        });

        // video-contain-slider -------------------------------------------------------------
        document.addEventListener('DOMContentLoaded', function() {

            var splide = new Splide('.video-contain-slider-desktop', {
                perPage: 4,
                gap: 25,
                perMove: 1,
                pagination: false,
                autoplay: true,
                type: 'loop',
                classes: {
                    arrows: 'splide__arrows video-arrows',
                    arrow: 'splide__arrow video-arrow',
                    prev: 'splide__arrow--prev video-prev',
                    next: 'splide__arrow--next video-next',
                },
                breakpoints: {
                    767: {
                        perPage: 2,
                    },
                    991: {
                        perPage: 3,
                    }
                }
            });


            splide.mount();
        });

        // video-contain-slider mobile-------------------------------------------------------------
        // document.addEventListener('DOMContentLoaded', function() {

        //     var splide = new Splide('.video-contain-slider-mobile', {
        //         perPage: 1,
        //         gap: 25,
        //         perMove: 1,
        //         arrows: false,
        //         pagination: false,
        //         autoplay: false,
        //         type: 'loop',
        //     });

        //     splide.mount();
        // });

        // gym-content-slider -------------------------------------------------------------
        document.addEventListener('DOMContentLoaded', function() {

            var splide = new Splide('.gym-content-usa-slider', {
                perPage: 4,
                gap: 25,
                perMove: 1,
                pagination: false,
                autoplay: false,
                type: 'loop',
            });

            splide.mount();
        });

        // gym-content-slider -------------------------------------------------------------
        document.addEventListener('DOMContentLoaded', function() {

            var splide = new Splide('.gym-content-europe-slider-mobile', {
                perPage: 1,
                gap: 25,
                perMove: 1,
                pagination: false,
                autoplay: false,
                type: 'loop',
            });

            splide.mount();
        });

        // gym-content-slider -gym-content-usa-slider-mobile------------------------------------------------------------
        document.addEventListener('DOMContentLoaded', function() {

            var splide = new Splide('.gym-content-usa-slider-mobile', {
                perPage: 1,
                gap: 25,
                perMove: 1,
                pagination: false,
                autoplay: false,
                type: 'loop',
            });

            splide.mount();
        });

        // gym-content-slider -------------------------------------------------------------
        document.addEventListener('DOMContentLoaded', function() {

            var splide = new Splide('.gym-content-europe-slider', {
                perPage: 4,
                gap: 15,
                perMove: 1,
                pagination: false,
                autoplay: false,
                classes: {
                    arrows: 'splide__arrows your-class-arrows',
                    arrow: 'splide__arrow your-class-arrow',
                    prev: 'splide__arrow--prev your-class-prev',
                    next: 'splide__arrow--next your-class-next',
                },
                type: 'loop',
            });

            splide.mount();
        });

        // photo-slider -------------------------------------------------------------
        // document.addEventListener( 'DOMContentLoaded', function() {

        //     var splide = new Splide( '.photo-slider', {
        //         perPage:4,
        //         gap: 50,
        //         perMove: 1,
        //         autoplay: true,
        //         loop: true,
        //         breakpoints: {
        //             767: {
        //                 perPage:1,
        //             },
        //             991: {
        //                 perPage:1,
        //             }
        //         }
        //     } ); 

        //     splide.mount();
        // });
    </script>

    <script>
        function calculateMarginLeft() {
            // var tabsContainer = document.getElementById("tabs-container");
            var tabsContainer = document.querySelectorAll(".special-container");

            // Select the container element
            var container = document.getElementById('container');

            // Get the computed style of the container
            var containerStyle = window.getComputedStyle(container);

            // Extract the margin-left value
            var marginLeft = containerStyle.getPropertyValue('margin-left');

            // Convert the value to a numerical format
            var marginLeftValue = parseFloat(marginLeft);

            // Log the result to the console or update your application with the new value
            console.log('Margin-left:', marginLeft);
            console.log('Numeric value:', marginLeftValue);

            // tabsContainer.style.marginLeft = marginLeft;

            // Apply the margin-left to all containers
            tabsContainer.forEach(function(container) {
                container.style.marginLeft = marginLeft;
            });
        }

        // Initial calculation
        calculateMarginLeft();

        // Recalculate on window resize
        window.addEventListener('resize', calculateMarginLeft);

        function openGym(evt, gymName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(gymName).style.display = "block";
            evt.currentTarget.className += " active";
        }

        // Get the element with id="defaultOpen" and click on it
        document.getElementById("defaultOpen").click();
    </script>
@endsection
