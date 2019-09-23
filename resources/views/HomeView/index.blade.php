@extends('layouts.master')

@section('content')

    <div style="overflow-y: hidden;">
        <main-chat V-bind:userNow="'amir'"></main-chat>
    </div>


@stop
@section('script')

    <script>
        // SideNav Button Initialization
        $(".button-collapse").sideNav();
        // SideNav Scrollbar Initialization
        var sideNavScrollbar = document.querySelector('.custom-scrollbar');
        var ps = new PerfectScrollbar(sideNavScrollbar);
    </script>

@stop
@section('style')
    <style>

        .side-nav {
            overflow: scroll;
            width: 35%;
        }

        .card.chat-room .members-panel-1,
        .card.chat-room .chat-1 {
            position: relative;
            overflow-y: scroll;
        }

        .card.chat-room .members-panel-1 {
            height: 500px;
        }

        .card.chat-room .chat-1 {
            height: 550px;
        }

        .card.chat-room .friend-list li {
            border-bottom: 1px solid #e0e0e0;
        }

        .card.chat-room .friend-list li:last-of-type {
            border-bottom: none;
        }

        .scrollbar-light-blue::-webkit-scrollbar-track {
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
            background-color: #F5F5F5;
            border-radius: 10px;
        }

        .scrollbar-light-blue::-webkit-scrollbar {
            width: 12px;
            background-color: #F5F5F5;
        }

        .scrollbar-light-blue::-webkit-scrollbar-thumb {
            border-radius: 10px;
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
            background-color: #82B1FF;
        }

        .rare-wind-gradient {
            background-image: -webkit-gradient(linear, left bottom, left top, from(#a8edea), to(#fed6e3));
            background-image: -webkit-linear-gradient(bottom, #a8edea 0%, #fed6e3 100%);
            background-image: linear-gradient(to top, #a8edea 0%, #fed6e3 100%);
        }

    </style>
@stop
