@extends('admin.layout.main')
@section('title')
<title>{{env('APP_NAME')}} | Payroll</title>
@endsection
@section('content')
<div class="payroll-main">
    <p><b>Introducing Payroll - The all-in-one solution for managing employee compensation. Here's what you can expect</b></p>
    <p>
        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" class="payroll-right-svg">
        <path fill-rule="evenodd" clip-rule="evenodd" d="M13.6867 3.98043C13.882 4.17569 13.882 4.49228 13.6867 4.68754L6.35339 12.0209C6.15813 12.2161 5.84155 12.2161 5.64628 12.0209L2.31295 8.68754C2.11769 8.49228 2.11769 8.17569 2.31295 7.98043C2.50821 7.78517 2.8248 7.78517 3.02006 7.98043L5.99984 10.9602L12.9796 3.98043C13.1749 3.78517 13.4915 3.78517 13.6867 3.98043Z" fill="#17B643"/>
        </svg>Freeze cycles when you need to - giving you greater control over your payroll
    </p>
    <p>
        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" class="payroll-right-svg">
        <path fill-rule="evenodd" clip-rule="evenodd" d="M13.6867 3.98043C13.882 4.17569 13.882 4.49228 13.6867 4.68754L6.35339 12.0209C6.15813 12.2161 5.84155 12.2161 5.64628 12.0209L2.31295 8.68754C2.11769 8.49228 2.11769 8.17569 2.31295 7.98043C2.50821 7.78517 2.8248 7.78517 3.02006 7.98043L5.99984 10.9602L12.9796 3.98043C13.1749 3.78517 13.4915 3.78517 13.6867 3.98043Z" fill="#17B643"/>
        </svg>Flexibility to make payments online or offline - whatever works best for you
    </p>
    <p>
        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" class="payroll-right-svg">
        <path fill-rule="evenodd" clip-rule="evenodd" d="M13.6867 3.98043C13.882 4.17569 13.882 4.49228 13.6867 4.68754L6.35339 12.0209C6.15813 12.2161 5.84155 12.2161 5.64628 12.0209L2.31295 8.68754C2.11769 8.49228 2.11769 8.17569 2.31295 7.98043C2.50821 7.78517 2.8248 7.78517 3.02006 7.98043L5.99984 10.9602L12.9796 3.98043C13.1749 3.78517 13.4915 3.78517 13.6867 3.98043Z" fill="#17B643"/>
        </svg>Downloadable payroll reports - giving you instant access to important data for your records
    </p>
    <p>
        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" class="payroll-right-svg">
        <path fill-rule="evenodd" clip-rule="evenodd" d="M13.6867 3.98043C13.882 4.17569 13.882 4.49228 13.6867 4.68754L6.35339 12.0209C6.15813 12.2161 5.84155 12.2161 5.64628 12.0209L2.31295 8.68754C2.11769 8.49228 2.11769 8.17569 2.31295 7.98043C2.50821 7.78517 2.8248 7.78517 3.02006 7.98043L5.99984 10.9602L12.9796 3.98043C13.1749 3.78517 13.4915 3.78517 13.6867 3.98043Z" fill="#17B643"/>
        </svg>Streamlined reviews and approvals- no more searching through multiple sections of the application
    </p>
    <p>
        <b>with payroll, managing your employee compensation has never been easier</b>
    </p>
    <button class="staff-manage-summary-btn payroll-btn">
        <a class="dropdown-toggle text-decoration-none filter_staff_data" href="{{ route('payroll-summary') }}">
        Opt-In For Payroll
        </a>
    </button>
</div>
@endsection