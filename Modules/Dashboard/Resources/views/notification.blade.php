@extends('admin.layout.main')
@section('title')
    <title>{{env('APP_NAME')}} | Notification</title>
@endsection
@section('header-page')
    <div class="page-title-area">
        <div class="row align-items-center">
            <div class="col-sm-6 top-header-sub">
                <div class="breadcrumbs-area clearfix">
                    <div class="breadcrumbs-sub">
                        <h4 class="page-title pull-left proxima_nova_semibold">Notification
                        </h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="notification-main-sec">
        <ul class="">
            <div class="app-border app-borderRadius py-4">
                <div class="notification-section">
                    <div class="noti-left-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="6" height="6" viewBox="0 0 6 6" fill="none">
                            <circle cx="3" cy="3" r="3" fill="#2F8CFF" />
                        </svg>
                    </div>
                    <div>
                        <h6 class="noti-sub-text proxima_nova_semibold">New staff " Sweta Vaghasiya" is added sucessfully</h6>
                        <span class="noti-time">20min ago</span>
                    </div>
                </div>
                <div class="notification-section">
                    <div class="noti-left-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="6" height="6" viewBox="0 0 6 6" fill="none">
                            <circle cx="3" cy="3" r="3" fill="#2F8CFF" />
                        </svg>
                    </div>
                    <div>
                        <h6 class="noti-sub-text proxima_nova_semibold">Nihal Desai is marked as absent in yesterday attendance</h6>
                        <span class="noti-time">20min ago</span>
                    </div>
                </div>
                <div class="notification-section">
                    <div class="noti-left-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="6" height="6" viewBox="0 0 6 6" fill="none">
                            <circle cx="3" cy="3" r="3" fill="#2F8CFF" />
                        </svg>
                    </div>
                    <div>
                        <h6 class="noti-sub-text proxima_nova_semibold">Admin has added 100+ new staff in Web Developer department</h6>
                        <span class="noti-time">20min ago</span>
                    </div>
                </div>
                <div class="notification-section">
                    <div class="noti-left-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="6" height="6" viewBox="0 0 6 6" fill="none">
                            <circle cx="3" cy="3" r="3" fill="#2F8CFF" />
                        </svg>
                    </div>
                    <div>
                        <h6 class="noti-sub-text proxima_nova_semibold">"Sheikh Hamza" has been removed from Node.js Department</h6>
                        <span class="noti-time">20min ago</span>
                    </div>
                </div>
                <div class="notification-section">
                    <div class="noti-left-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="6" height="6" viewBox="0 0 6 6" fill="none">
                            <circle cx="3" cy="3" r="3" fill="#2F8CFF" />
                        </svg>
                    </div>
                    <div>
                        <h6 class="noti-sub-text proxima_nova_semibold">New department "ios Developer " is created</h6>
                        <span class="noti-time">20min ago</span>
                    </div>
                </div>
                <div class="notification-section">
                    <div class="noti-left-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="6" height="6" viewBox="0 0 6 6" fill="none">
                            <circle cx="3" cy="3" r="3" fill="#2F8CFF" />
                        </svg>
                    </div>
                    <div>
                        <h6 class="noti-sub-text proxima_nova_semibold">Compliance report of "Looms Factory" is generated</h6>
                        <span class="noti-time">5min ago</span>
                    </div>
                </div>
                <div class="notification-section">
                    <div class="noti-left-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="6" height="6" viewBox="0 0 6 6" fill="none">
                            <circle cx="3" cy="3" r="3" fill="#2F8CFF" />
                        </svg>
                    </div>
                    <div>
                        <h6 class="noti-sub-text proxima_nova_semibold">Daily work entry report is generated for "Tupple Day Shift"</h6>
                        <span class="noti-time">10min ago</span>
                    </div>
                </div>
                <div class="notification-section">
                    <div class="noti-left-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="6" height="6" viewBox="0 0 6 6" fill="none">
                            <circle cx="3" cy="3" r="3" fill="#2F8CFF" />
                        </svg>
                    </div>
                    <div>
                        <h6 class="noti-sub-text proxima_nova_semibold">12 staff members from app team is required attention in leave approval</h6>
                        <span class="noti-time">15min ago</span>
                    </div>
                </div>
            </div>
        </ul>
    </div>
@endsection
@section('scripts')
    <script>
    </script>
@endsection