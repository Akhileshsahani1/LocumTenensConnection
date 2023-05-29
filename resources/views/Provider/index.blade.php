@extends('layouts.main')
@section('main-section')
@push('title')
<title>Home</title>
@endpush

<body>
    <main>
        <div class="container-fluid bg-white">
            <div class="row">
                <div class="col-lg-11 col-lg-offset-1 mx-auto">
                    <div class="row align-items-center">
                        <div class="col-lg-4">
                            <div class="text-start my-5">
                                <img src="{{ asset('provider/img/logo.svg') }}" style="width: 100px" alt="">
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="d-flex justify-content-end">
                                <a href="{{ route('provider.login') }}" class="btn btn-outline-primary px-5 me-3">Sign In</a>
                                <a href="{{ route('Provider.signupStepFirst') }}" class="btn btn-primary px-5">Sign Up</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row mb-5">
                    <div class="col-lg-5 mx-auto text-center">
                        <h4 class="blue-text font-36 fw-bold">Locum Tenens.</h4>
                        <span class="display-6 fw-semibold light-blue-text mb-3">You could earn</span>
                        <div class="display-4 blue-text fw-bold" >$<span id="slider_value">0</span></div>
                        <p class="font-16 my-3 blur-blue"><u><span id="slider_valuess">0</span> days</u> at an estimated $500,00 a days</p>
                        <div class="range-slider py-3">
                            <!-- <input type="range" value="3825" step="25" min="1000" max="12600" class="w-100" style="accent-color: #4284DB;"> -->
                            <input type="range" id="slider" value="0" min="1" max="30"  class="w-100" step="1" style="accent-color: #4284DB;" />
                        </div>
                        <div class="input-group">
                            <input class="form-control border-end-0 border rounded-pill" type="search" value="search" id="search-input">
                            <span class="input-group-append">
                                <button class="btn btn-outline-secondary bg-primary border-bottom-0 border rounded-pill ms-n5" type="button">
                                    <i class="bi bi-search text-white"></i>
                                </button>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-sm-10 mx-auto">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d885.6786381882742!2d153.06471392752098!3d-27.384628719647843!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6b93e27f7a9996b7%3A0x404d6ef2e1f0a411!2sFuture%20Auto%20Virginia%3A%20Mechanical%20workshop%20in%20Virginia!5e0!3m2!1sen!2sin!4v1677239461056!5m2!1sen!2sin" width="100%" height="450" style="border:0;border-radius:15px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
                <div class="row">
                    <div class="text-center py-4">
                        <img src="{{ asset('provider/img/logo.svg') }}" style="width: 100px" alt="">
                        <div class="my-3 display-6 blue-text fw-bold">Locum Tenens it with top‑to‑bottom Protection</div>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th></th>
                                <th class="text-center fw-500 font-20">Locum Tenens Connections</th>
                                <th class="text-center fw-500 font-20">Competitors</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="w-50 px-4">
                                    <h5>Lorem ipsum dolor sit amet</h5>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam rhoncus
                                        turpis vel
                                        viverra semper. Aenean tristique porta purus, eget pulvinar metus congue ac.
                                    </p>
                                </td>
                                <td class="text-center align-middle"><img src="{{ asset('provider/img/check.svg') }}" /></td>
                                <td class="text-center align-middle"><img src="{{ asset('provider/img/check.svg') }}" /></td>
                            </tr>
                            <tr>
                                <td class="w-50 px-4">
                                    <h5>Lorem ipsum dolor sit amet</h5>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam rhoncus
                                        turpis vel
                                        viverra semper. Aenean tristique porta purus, eget pulvinar metus congue ac.
                                    </p>
                                </td>
                                <td class="text-center align-middle"><img src="{{ asset('provider/img/check.svg') }}" /></td>
                                <td class="text-center align-middle"><img src="{{ asset('provider/img/close.svg' ) }}" /></td>
                            </tr>
                            <tr>
                                <td class="w-50 px-4">
                                    <h5>Lorem ipsum dolor sit amet</h5>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam rhoncus
                                        turpis vel
                                        viverra semper. Aenean tristique porta purus, eget pulvinar metus congue ac.
                                    </p>
                                </td>
                                <td class="text-center align-middle"><img src="{{ asset('provider/img/check.svg') }}" /></td>
                                <td class="text-center align-middle"><img src="{{ asset('provider/img/check.svg') }}" /></td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="col-lg-12 text-center">
                        <button class="btn btn-outline-dark px-4">Learn more</button>
                    </div>
                </div>
                <div class="row my-5 py-5">
                    <div class="col-lg-6">
                        <div class="px-4">
                            <h1 class="blue-text">Your questions,<br> answered</h1>
                            <img src="{{ asset('provider/img/image-removebg.png') }}" />
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button font-18 fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Lorem ipsum dolor sit amet
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body font-15">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam rhoncus turpis vel viverra semper. Aenean tristique porta purus, eget pulvinar metus congue ac.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button font-18 fw-semibold collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Lorem ipsum dolor sit amet
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                    <div class="accordion-body font-15">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam rhoncus turpis vel viverra semper. Aenean tristique porta purus, eget pulvinar metus congue ac.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree">
                                    <button class="accordion-button font-18 fw-semibold collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        Lorem ipsum dolor sit amet
                                    </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                    <div class="accordion-body font-15">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam rhoncus turpis vel viverra semper. Aenean tristique porta purus, eget pulvinar metus congue ac.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingFour">
                                    <button class="accordion-button font-18 fw-semibold collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                        Lorem ipsum dolor sit amet
                                    </button>
                                </h2>
                                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                    <div class="accordion-body font-15">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam rhoncus turpis vel viverra semper. Aenean tristique porta purus, eget pulvinar metus congue ac.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </main>
</body>
@endsection
