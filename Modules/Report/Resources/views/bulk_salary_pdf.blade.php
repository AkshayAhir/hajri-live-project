<!doctype html>
<html lang="en">
    <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link type="text/css" media="dompdf" href="{{asset('assets\css\style.css')}}" rel="stylesheet" /> -->
    <!-- Bootstrap CSS -->
    <title>Laravel 9 PDF Generate Example - Webappfix</title>
    <style>
        .main-div {position: relative;margin-top: 50px;}
        .main-div .inner-div-1{width: 22%;float: left;}
        .main-div .inner-div-2{width: 22%;float: left;}
        .main-div .inner-div-3{width: 22%;float: left;}
        .main-div .inner-div-4{width: 34%;float: left;}
        .main-div p,.payslip-info p{ margin: 0px !important; margin-bottom:10px !important;}
        .payslip-info { text-align: center;}
        .payslip-table{margin-top:165px;}
        table { border-collapse: collapse; border: 1px solid black;}
        thead th { border: 1px solid black; padding: 8px; text-align: center; background-color: #f2f2f2; }
        td, th { padding: 8px;}
        td:first-child, th:first-child { border-left: none;}
        td { border-left: 1px solid black;}
        .right-td{ text-align: right;}
        .signature-container {margin-top:100px;}
        .signature-container > div {width: 50%;float: left; }
        .signature-container p {text-align: center;}
        .emp-sign {text-align: end;}
        .signature-line{ border-bottom: 1px solid black; margin-top: 20%; width: 300px;margin-left: 23%;}
    </style>
    </head>
    <body>
        {{-- @foreach($staff_pdf as $staff) --}}
            <div class="payslip-info">
                <h3>PaySlip</h3>
                <p>{{ $staff_pdf['address'] }}</p>
                {{-- <p>21023 Pearson Point Road</p>
                <p>Gateway Avenue</p> --}}
            </div>
            <div class="main-div">
                <div class="inner-div-1">
                    <p>Date of joining</p>
                    <p>Pay Period</p>
                    <p>Working days</p>
                </div>
                <div class="inner-div-2">
                    <p>: {{ ($staff_pdf['date_of_joining']) ? $staff_pdf['date_of_joining'] : '-' }}</p>
                    <p>: {{ ($staff_pdf['pay_period']) ? $staff_pdf['pay_period'] : '-' }}</p>
                    <p>: {{ ($staff_pdf['working_days']) ? $staff_pdf['working_days'] : '-' }}</p>
                </div>
                <div class="inner-div-3">
                    <p>Employee Name</p>
                    <p>Designation</p>
                    <p>Department</p>
                </div>
                <div class="inner-div-4">
                    <p>: {{ ($staff_pdf['employee_name']) ? $staff_pdf['employee_name'] : '-' }}</p>
                    <p>: {{ ($staff_pdf['designation']) ? $staff_pdf['designation'] : '-' }}</p>
                    <p>: {{ ($staff_pdf['department']) ? $staff_pdf['department'] : '-' }}</p>
                </div>
            </div>
            <div class="payslip-table">
                <table width="100%">
                    <thead>
                        <tr>
                            <th>Earning</th>
                            <th>Amount</th>
                            <th>Deduction</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Basic</td>
                            <td class="right-td">{{ $staff_pdf['salary'] }}</td>
                            <td>Provident Fund</td>
                            <td class="right-td">{{ $staff_pdf['provident_fund'] }}</td>
                        </tr>
                        <tr>
                            <td>Incentive Pay</td>
                            <td class="right-td">{{ $staff_pdf['incentive_pay'] }}</td>
                            <td>Profesional Tax</td>
                            <td class="right-td">{{ $staff_pdf['profesional_tax'] }}</td>
                        </tr>
                        <tr>
                            <td>House Rent Allowance</td>
                            <td class="right-td">{{ $staff_pdf['house_rent_allowance'] }}</td>
                            <td>lone</td>
                            <td class="right-td">{{ $staff_pdf['lone'] }}</td>
                        </tr>
                        <tr>
                            <td>Meal Allowance </td>
                            <td class="right-td">{{ $staff_pdf['meal_allowance'] }}</td>
                            <td>Net Pay</td>
                            <td class="right-td">{{ $staff_pdf['net_pay'] }}</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td class="right-td">Total Earnings</td>
                            <td class="right-td">{{ $staff_pdf['total_earnings'] }}</td>
                            <td class="right-td">Total Deduction</td>
                            <td class="right-td">{{ $staff_pdf['total_deduction'] }}</td>
                        </tr>
                        <tr >
                            <td></td>
                            <td></td>
                            <td class="right-td">Net Pay</td>
                            <td class="right-td">{{ $staff_pdf['net_pay'] }}</td>
                        </tr>
                        <!-- <tr>
                            <td rowspan="4">dd</td>
                        </tr> -->
                    </tbody>
                </table>
            </div>
            <div class="signature-container">
                <div>
                    <p>Employer Signature</p>
                    <div class="signature-line"></div>
                </div>
                <div>
                    <p class="emp-sign">Employee Signature</p>
                    <p class="signature-line"></p>
                </div>
            </div>
        {{-- @endforeach --}}
    </body>
</html>