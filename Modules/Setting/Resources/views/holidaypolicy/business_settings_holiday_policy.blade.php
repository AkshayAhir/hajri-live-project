@extends('admin.layout.main')
@section('title')
    <title>{{env('APP_NAME')}} | Holiday Policy</title>
@endsection
@section('header-page')
    <div class="page-title-area">
        <div class="row align-items-center">
            <div class="col-sm-6 top-header-sub">
                <div class="breadcrumbs-area clearfix">
                    <div class="breadcrumbs-sub" >
                    <a onclick="history.back()" class="back_button"><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M8.73102 1.26898C9.08966 1.62763 9.08966 2.20911 8.73102 2.56775L5.29877 6L8.73102 9.43225C9.08966 9.79089 9.08966 10.3724 8.73102 10.731C8.37237 11.0897 7.79089 11.0897 7.43225 10.731L3.35061 6.64938C2.99197 6.29074 2.99197 5.70926 3.35061 5.35062L7.43225 1.26898C7.79089 0.910339 8.37237 0.910339 8.73102 1.26898Z" fill="#050E17"></path>
                        </svg></a>
                        <h4 class="page-title pull-left proxima_nova_semibold">Holiday Policy
                        </h4>
                    </div>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="{{route('setting')}}">Settings</a></li>
                        <li class="section_sub_title">/  Business settings</li>
                        <li class="section_sub_title">/  Holiday Policy</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
        <div class="main-content-inner leave-policy-main">
            <p class="section_sub_title proxima_nova_semibold">Create templates to give automatic paid leaves to staff on public holidays</p>
            <div class="approve_staff_data holiday_policy_table">
                <table id="busines-setting-manager" class="display busines-setting-manager" style="width:100%">
                    <thead>
                        <tr>
                            <th>Template Name</th>
                            <th>Number of Holiday</th>
                            <th>Apply to</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    </tbody>
                </table>
            </div>

            <div>
                <div class="create-leave-bttn">
                    <a name="" href="{{route('holiday_template')}}" class="createleave-btn-btn proxima_nova_semibold">Create Template</a>
                </div>
            </div>
        </div>
@endsection

@section('scripts')
    <script>
        //  datatable 

        $(document).ready(function () {
            var table;
            
            function datatable() {

                table = $('#busines-setting-manager').DataTable({
                    // "lengthMenu": [[5, 10, 20], [5, 10, 20]],
                    searching: false,
                    lengthChange: false,
                    info: false,
                    responsive: true,
                    // pagingType: "full_numbers",
                    bPaginate: false,
                    order: [
                        // [0, "desc"]
                    ],
                    ajax: {
                        "url": "{{ route('holiday_template_list') }}",
                        "dataType": "json",
                        "type": "POST",
                        "data": {_token: "{{csrf_token()}}"}
                    },
                    columns: [
                        { "data": "name",},
                        { "data": "number_of_holiday"},
                        { "data": "apply_to"},
                        { "data": "action"},
                    ],
                    // createdRow: function (row, data, dataIndex) {
                    //     $(row).attr('id', 'storie_col_' + data['id']);
                    // },
                    columnDefs: [
                        // { "width": "40%", "targets": 3 },
                        // {'targets': [1,2], 'orderable': false}
                    ]
                });
                $('.dataTables_length').addClass('bs-select');
            }
            datatable();
        })

        // function editTemplate(id){
            
        // }
    </script>
@endsection