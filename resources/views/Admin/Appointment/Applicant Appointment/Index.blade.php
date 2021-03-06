@extends('Admin.Layout.master')
@section('main_content')
    <div class="page-container" style="margin-top:-30px;">
        <div class="page-content-wrapper">
            <div class="page-content">
                <div class="page-bar">
                    <div class="page-title-breadcrumb">
                        <div class=" pull-left">
                            <div class="page-title">View Applicant Appointment Detail</div>
                        </div>
                        <ol class="breadcrumb page-breadcrumb pull-right">
                            <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="{{route('admin.home')}}">Dashboard</a>&nbsp;<i
                                        class="fa fa-angle-right"></i>
                            </li>
                            <li class="active">Applicant Appointment Detail</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-topline-aqua">
                            <div class="card-head">
                                <header>Applicant Appointment Detail Table</header>
                                <div class="cards pull-right">
                                    <a href="{{route('ApplicantAppointment.create')}}"
                                       class="btn btn-success fa fa-plus">Add
                                        New</a>
                                </div>
                            </div>
                            <div class="card-body ">
                                <div class="table-scrollable">
                                    <table id="example1" class="display" style="width:100%;">
                                        <thead>
                                        <tr>
                                            <th style="font-size:13px;">Applicant</th>
                                            <th style="font-size:13px;">Appointment Date</th>
                                            <th style="font-size:13px;">Appointment Time</th>
                                            <th style="font-size:13px; ">Appointment With</th>
                                            <th style="font-size:13px;">Remarks</th>
                                            <th style="font-size:13px;">Applicant's Contact No.</th>
                                            <th style="font-size:13px;">APPLICANT'S Email</th>
                                            @if(Auth::user()->role=='Admin')
                                                <th style="font-size:13px;">Action</th>
                                            @endif
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($appointment as $appointment)
                                            <tr>
                                                <td style="font-size:13px;"><a
                                                            href="{{route('ApplicantDetail',$appointment->applicant_id)}}">{{$appointment->Applicant_Appointment->first_name}} {{$appointment->Applicant_Appointment->middle_name}} {{$appointment->Applicant_Appointment->last_name}}</a>
                                                </td>
                                                <td style="font-size:13px;">{{$appointment->date}}</td>
                                                <td style="font-size:13px;">{{date('h:i A',strtotime($appointment->time))}}</td>
                                                @if(Auth::user()->id==$appointment->appointment_with)
                                                    <td>You</td>
                                                @else
                                                    <td>{{$appointment->Applicant_Admin->name}}</td>
                                                @endif
                                                <td style="font-size:13px;">{{$appointment->remarks}}</td>
                                                <td style="font-size:13px;">{{$appointment->Applicant_Appointment->phone}}</td>
                                                <td style="font-size:13px;">{{$appointment->Applicant_Appointment->email}}</td>
                                                @if(Auth::user()->role=='Admin')
                                                    <td class="text-left">
                                                        <form action="{{ route('ApplicantAppointment.edit', $appointment->id)}}"
                                                              method="GET"
                                                              style="display: inline-block">
                                                            {{csrf_field()}}
                                                            {{method_field('PUT')}}
                                                            <button class="btn btn-primary btn-sm" type="submit">Edit
                                                            </button>
                                                        </form>
                                                        <form action="{{ route('ApplicantAppointment.destroy', $appointment->id)}}"
                                                              method="post" style="display: inline-block">
                                                            {{csrf_field()}}
                                                            {{method_field('DELETE')}}
                                                            <button class="btn btn-danger btn-sm" type="submit">Delete
                                                            </button>
                                                        </form>
                                                    </td>
                                                @endif
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection