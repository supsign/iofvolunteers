@extends('layouts.app')
@section('content')
    <section class="page_img">
        <img src="{{ asset('images/pg_template1.jpg') }}"/>
            <img class="conn_worldwide" src="{{ asset('images/connectingworldwide.png') }}" alt=""/>
    </section>

    <section class="news_list">
        <div class="container">
  
            <h1 class="page_img-title">Connecting orienteers around the globe</h1>
            <div class="row">              
                <div class="pt-3 pb-3 col-12 col-md-6">
                    <div class="shadow NI_wrap">
                        <div class="p-4 NI_details">
                            <h3 class="subtitle">
                                @if($user?->volunteer)
                                    <img src="{{ asset('images/icon-add.svg') }}" width="50" height="50" alt="add">
                                    <a href="{{ route('volunteer.edit', $user->volunteer) }}">
                                        Edit Volunteer
                                    </a>
                                @else
                                    <img src="{{ asset('images/icon-add.svg') }}" width="50" height="50" alt="add">
                                    <a href="{{ route('volunteer.register') }}">
                                        Register as a Volunteer
                                    </a>
                                @endif
                            </h3>
                            <p>
                                Are you skilled in some orienteering topics? Do you want to make new
                                friends and while help others develop orienteering?
                            </p>
                            <div class="warn">
                                (You need to be 18+ to volunteer!)
                            </div>
                        </div>
                    </div>
                </div>

                <div class="pt-3 pb-3 col-12 col-md-6">
                    <div class="shadow NI_wrap">
                        <div class="p-4 NI_details">
                            <h3 class="subtitle">
                                <img src="{{ asset('images/icon-search1.svg') }}" width="50" height="50">
                                <a href="volunteer/search">
                                    Search a Volunteer
                                </a>
                            </h3>
                            <p>
                                Find volunteers with different skills who can help you develop
                                orienteering or help you realize a project!
                            </p>
                            <div class="warn">
                                (You must create project first!)
                            </div>
                        </div>
                    </div>
                </div>

                <div class="pt-3 pb-3 col-12 col-md-6">
                    <div class="shadow NI_wrap">
                        <div class="p-4 NI_details">
                            <h3 class="subtitle">
                                <img src="{{ asset('images/icon-add3.svg') }}" width="50" height="50">
                                <a href="project/register">
                                    Register a Project
                                </a>
                            </h3>
                            <p>
                                Your club or organisation wants to work in orienteering but you need extra
                                help? Register your project and ask for volunteers!
                            </p>
                        </div>
                    </div>
                </div>

                <div class="pt-3 pb-3 col-12 col-md-6">
                    <div class="shadow NI_wrap">
                        <div class="p-4 NI_details">
                            <h3 class="subtitle">
                                <img src="{{ asset('images/icon-search3.svg') }}" width="50" height="50">
                                <a href="project/search">
                                    Search a Project
                                </a>
                            </h3>
                            <p>There are many clubs and organisations in different countries in need of
                                volunteers to help with mapping, coaching, teaching and more!
                            </p>
                        </div>
                    </div>
                </div>

                <div class="pt-3 pb-3 col-12 col-md-6">
                    <div class="shadow NI_wrap">
                        <div class="p-4 NI_details">
                            <h3 class="subtitle">
                                <img src="{{ asset('images/icon-add4.svg') }}" width="50" height="50">
                                <a href="host/register">
                                    Register as a Host Family
                                </a>
                            </h3>
                            <p>
                                You are an orienteering family and you would like to host a young
                                orienteer? Help a future star go training with you!
                            </p>
                        </div>
                    </div>
                </div>

                <div class="pt-3 pb-3 col-12 col-md-6">
                    <div class="shadow NI_wrap">
                        <div class="p-4 NI_details">
                            <h3 class="subtitle">
                                <img src="{{ asset('images/icon-search4.svg') }}" width="50" height="50">
                                <a href="host/search">
                                    Find a host family
                                </a>
                            </h3>
                            <p>
                                There are orienteering families in different countries where you can stay
                                and go orienteering with them! Find a host family!
                            </p>
                            <div class="warn">
                                (You need to be 18+ to apply!)
                            </div>
                        </div>
                    </div>
                </div>

                <div class="pt-3 pb-3 col-12 col-md-6">
                    <div class="shadow NI_wrap">
                        <div class="p-4 NI_details">
                            <h3 class="subtitle">
                                <img src="{{ asset('images/icon-add5.svg') }}" width="50" height="50">
                                <a href="guest/register">
                                    Register as a Guest
                                </a>
                            </h3>
                            <p>
                                You want to develop your o-skills more by training in different terrains?
                                Apply to stay with an orienteering family and go training with them!
                            </p>
                            <div class="warn">
                                (You need to be 18+ to register!)
                            </div>
                        </div>
                    </div>
                </div>

                <div class="pt-3 pb-3 col-12 col-md-6">
                    <div class="shadow NI_wrap">
                        <div class="p-4 NI_details">
                            <h3 class="subtitle">
                                <img src="{{ asset('images/icon-search5.svg') }}" width="50" height="50">
                                <a href="guest/search">
                                    Search a guest
                                </a>
                            </h3>
                            <p>
                                There are some future stars out there waiting for a helping hand! Find a
                                young orienteer who could stay with your family and go orienteering with you!
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
