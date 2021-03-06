@extends('Admin.Layout.master')
@section('main_content')
    <div class="page-container" style="margin-top:-30px;">
        <div class="page-content-wrapper">
            <div class="page-content">
                <div class="page-bar">
                    <div class="page-title-breadcrumb">
                        <div class=" pull-left">
                            <div class="page-title">View Applicant Detail</div>
                        </div>
                        <ol class="breadcrumb page-breadcrumb pull-right">
                            <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="{{route('admin.home')}}">Dashboard</a>&nbsp;<i
                                        class="fa fa-angle-right"></i>
                            </li>
                            <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                                                                   href="{{route('Applicant.index')}}">Applicant
                                    View</a>&nbsp;<i
                                        class="fa fa-angle-right"></i>
                            </li>
                            <li class="active">Applicant Detail</li>
                        </ol>
                    </div>
                </div>
                <div class="card" id="printableArea">
                    <h3 class="text-center text-danger">Applicant's Detail</h3>
                    <hr>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3">
                                <h5 class="text-primary">ID</h5>
                                <p>{{$applicant->id}}</p>
                            </div>
                            <div class="col-md-3">
                                <h5 class="text-primary">First Name</h5>
                                <p>{{$applicant->first_name}}</p>
                            </div>
                            <div class="col-md-3">
                                <h5 class="text-primary">Middle Name</h5>
                                <p>{{$applicant->middle_name}}</p>
                            </div>
                            <div class="col-md-3">
                                <h5 class="text-primary">Last Name</h5>
                                <p>{{$applicant->last_name}}</p>
                            </div>
                            <div class="col-md-3">
                                <h5 class="text-primary">Gender</h5>
                                <p>{{$applicant->gender}}</p>
                            </div>
                            <div class="col-md-3">
                                <h5 class="text-primary">Date OF Birth</h5>
                                <p>{{$applicant->dob}}</p>
                            </div>
                            <div class="col-md-3">
                                <h5 class="text-primary">Address</h5>
                                <p>{{$applicant->address}}</p>
                            </div>
                            <div class="col-md-3">
                                <h5 class="text-primary">Subject</h5>
                                <p>{{$applicant->subject}}</p>
                            </div>
                            <div class="col-md-3">
                                <h5 class="text-primary">Qualification </h5>
                                <p>{{$applicant->qualification_level}}</p>
                            </div>
                            <div class="col-md-3">
                                <h5 class="text-primary">Experience </h5>
                                <p>{{$applicant->experience}}</p>
                            </div>
                            <div class="col-md-3">
                                <h5 class="text-primary">Interested Country </h5>
                                <p>{{$applicant->country_interested}}</p>
                            </div>
                            <div class="col-md-3">
                                <h5 class="text-primary">Interested Service</h5>
                                <p>{{$applicant->service_interested}}</p>
                            </div>
                            <div class="col-md-3">
                                <h5 class="text-primary">Maiden Name</h5>
                                <p>{{$applicant->maiden_name}}</p>
                            </div>
                            <div class="col-md-3">
                                <h5 class="text-primary">Identity Type</h5>
                                <p>{{$applicant->identity_type}}</p>
                            </div>
                            <div class="col-md-3">
                                <h5 class="text-primary">Citizenship Number</h5>
                                <p>{{$applicant->citizen_no}}</p>
                            </div>
                            <div class="col-md-3">
                                <h5 class="text-primary">Passport Number</h5>
                                <p>{{$applicant->passport_no}}</p>
                            </div>
                            <div class="col-md-3">
                                <h5 class="text-primary">Mobile Number</h5>
                                <p>{{$applicant->phone}}</p>
                            </div>
                            <div class="col-md-3">
                                <h5 class="text-primary">Nationality</h5>
                                <p>{{$applicant->nationality}}</p>
                            </div>
                            <div class="col-md-3">
                                <h5 class="text-primary">Email</h5>
                                <p>{{$applicant->email}}</p>
                            </div>
                            <div class="col-md-3">
                                <h5 class="text-primary">Passport Document</h5>
                                @if($applicant->passport_docs)
                                    <p><a target="_blank"
                                          style="color: blue"
                                          href="{{asset('/upload/Applicant/'.$applicant->passport_docs)}}">Click here
                                            for Passport
                                            Document</a>
                                @else
                                    <p>No Document File</p>
                                @endif
                            </div>
                            <div class="col-md-3">
                                <h5 class="text-primary">Status</h5>
                                <p>{{$applicant->status}}</p>
                            </div>
                            <div class="col-md-3">
                                <h5 class="text-primary">Applicant Profession</h5>
                                <p>{{@$applicant->Category_Applicant->Name}}</p>
                            </div>
                            <div class="col-md-3">
                                <h5 class="text-primary">Color Code</h5>
                                <p>{{@$applicant->color_code}}</p>
                            </div>
                        </div>
                        <hr>
                        <div>
                            @if($checklist)
                                <div>
                                    <h3 class="text-center text-danger">Applicant's Document Checklist</h3>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <h5 style="font-size: 20px;" class="control-label text-primary ">MRP Size
                                            Photo</h5>
                                        <div class="col-md-6">
                                            <h5 style="font-size: 20px;" class="control-label text-primary ">
                                                Passport</h5>
                                            <input type="checkbox" @if($checklist->passport=='Yes') checked
                                                   @endif disabled name="passport"
                                                   value="Yes">
                                        </div>
                                    </div>
                                        <div class="col-md-6">
                                            <h5 style="font-size: 20px;" class="control-label text-primary ">
                                                Citizen</h5>
                                            <input type="checkbox" @if($checklist->citizen=='Yes') checked
                                                   @endif disabled name="citizen"
                                                   value="Yes">
                                        </div>
                                        <div class="col-md-6">
                                            <h5 style="font-size: 20px;" class="control-label text-primary ">SLC
                                                Marksheet</h5>
                                            <input type="checkbox"
                                                   @if($checklist->slc_marksheet=='Yes') checked @endif disabled
                                                   name="slc_marksheet" value="Yes">
                                        </div>
                                        <div class="col-md-6">
                                            <h5 style="font-size: 20px;" class="control-label text-primary ">SLC
                                                Certificate</h5>
                                            <input type="checkbox"
                                                   @if($checklist->slc_certificate=='Yes') checked @endif disabled
                                                   name="slc_certificate" value="Yes">
                                        </div>
                                        <div class="col-md-6">
                                            <h5 style="font-size: 20px;" class="control-label text-primary ">SLC
                                                Character Certificate</h5>
                                            <input type="checkbox"
                                                   @if($checklist->slc_character_certificate=='Yes') checked
                                                   @endif disabled
                                                   name="slc_character_certificate" value="Yes">
                                        </div>
                                        <div class="col-md-6">
                                            <h5 style="font-size: 20px;" class="control-label text-primary ">+2
                                                Transcript</h5>
                                            <input type="checkbox"
                                                   @if($checklist->plus2transcript=='Yes') checked @endif disabled
                                                   name="plus2transcript" value="Yes">
                                        </div>
                                        <div class="col-md-6">
                                            <h5 style="font-size: 20px;" class="control-label text-primary ">+2
                                                Certificate</h5>
                                            <input type="checkbox"
                                                   @if($checklist->plus2certificate=='Yes') checked @endif disabled
                                                   name="plus2certificate" value="Yes">
                                        </div>
                                        <div class="col-md-6">
                                            <h5 style="font-size: 20px;" class="control-label text-primary ">+2
                                                Character Certificate</h5>
                                            <input type="checkbox"
                                                   @if($checklist->plus2character_certificate=='Yes') checked
                                                   @endif disabled
                                                   name="plus2character_certificate" value="Yes">
                                        </div>
                                        <div class="col-md-6">
                                            <h5 style="font-size: 20px;" class="control-label text-primary ">
                                                PCL/Diploma Transcript</h5>
                                            <input type="checkbox"
                                                   @if($checklist->diploma_transcript=='Yes') checked @endif disabled
                                                   name="diploma_transcript" value="Yes">
                                        </div>
                                        <div class="col-md-6">
                                            <h5 style="font-size: 20px;" class="control-label text-primary ">
                                                PCL/Diploma Certificate</h5>
                                            <input type="checkbox"
                                                   @if($checklist->diploma_certificate=='Yes') checked @endif disabled
                                                   name="diploma_certificate" value="Yes">
                                        </div>
                                        <div class="col-md-6">
                                            <h5 style="font-size: 20px;" class="control-label text-primary ">
                                                PCL/Diploma Character Certificate</h5>
                                            <input type="checkbox"
                                                   @if($checklist->diploma_character_certificate=='Yes') checked
                                                   @endif disabled
                                                   name="diploma_character_certificate" value="Yes">
                                        </div>
                                        <div class="col-md-6">
                                            <h5 style="font-size: 20px;" class="control-label text-primary ">
                                                Equivalent
                                                Certificate</h5>
                                            <input type="checkbox"
                                                   @if($checklist->equivalent_certificate=='Yes') checked
                                                   @endif disabled
                                                   name="equivalent_certificate" value="Yes">
                                        </div>
                                        <div class="col-md-6">
                                            <h5 style="font-size: 20px;" class="control-label text-primary ">
                                                Council
                                                Registration Certificate Front</h5>
                                            <input type="checkbox"
                                                   @if($checklist->council_registration_certificate_front=='Yes') checked
                                                   @endif disabled name="council_registration_certificate_front"
                                                   value="Yes">
                                        </div>
                                        <div class="col-md-6">
                                            <h5 style="font-size: 20px;" class="control-label text-primary ">
                                                Council
                                                Registration Certificate Back</h5>
                                            <input type="checkbox"
                                                   @if($checklist->council_registration_certificate_back=='Yes') checked
                                                   @endif disabled name="council_registration_certificate_back"
                                                   value="Yes">
                                        </div>
                                        <div class="col-md-6">
                                            <h5 style="font-size: 20px;" class="control-label text-primary ">
                                                Council
                                                Good Standing Letter</h5>
                                            <input type="checkbox"
                                                   @if($checklist->council_good_standing_letter=='Yes') checked
                                                   @endif disabled
                                                   name="council_good_standing_letter" value="Yes">
                                        </div>
                                        <div class="col-md-6">
                                            <h5 style="font-size: 20px;" class="control-label text-primary ">Work
                                                Experience Letter 1</h5>
                                            <input type="checkbox"
                                                   @if($checklist->work_experience_letter1=='Yes') checked
                                                   @endif disabled
                                                   name="work_experience_letter1" value="Yes">
                                        </div>
                                        <div class="col-md-6">
                                            <h5 style="font-size: 20px;" class="control-label text-primary ">Work
                                                Experience Letter 2</h5>
                                            <input type="checkbox"
                                                   @if($checklist->work_experience_letter2=='Yes') checked
                                                   @endif disabled
                                                   name="work_experience_letter2" value="Yes">
                                        </div>
                                        <div class="col-md-6">
                                            <h5 style="font-size: 20px;" class="control-label text-primary ">Work
                                                Experience Letter 3</h5>
                                            <input type="checkbox"
                                                   @if($checklist->work_experience_letter3=='Yes') checked
                                                   @endif disabled
                                                   name="work_experience_letter3" value="Yes">
                                        </div>
                                        <div class="col-md-6">
                                            <h5 style="font-size: 20px;" class="control-label text-primary ">Basic
                                                Life
                                                Support For Certificate</h5>
                                            <input type="checkbox"
                                                   @if($checklist->basic_life_support_certificate=='Yes') checked
                                                   @endif disabled name="basic_life_support_certificate" value="Yes">
                                        </div>
                                        <div class="col-md-6">
                                            <h5 style="font-size: 20px;" class="control-label text-primary ">Signed
                                                Letter of Authorization</h5>
                                            <input type="checkbox"
                                                   @if($checklist->signed_letter_authorization=='Yes') checked
                                                   @endif disabled
                                                   name="signed_letter_authorization" value="Yes">
                                        </div>
                                        <div class="col-md-6">
                                            <h5 style="font-size: 20px;" class="control-label text-primary ">Signed
                                                Service Agreement</h5>
                                            <input type="checkbox"
                                                   @if($checklist->signed_service_agreement=='Yes') checked
                                                   @endif disabled
                                                   name="signed_service_agreement" value="Yes">
                                        </div>
                                        <div class="col-md-6">
                                        </div>
                                    </div>
                                    <hr>
                                    @endif
                                    @if($education)
                                        <div>
                                            <h3 class="text-center text-danger">Applicant's Education Detail1</h3>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <h5 class="text-primary">Authority's Name</h5>
                                                    <p>{{$education->authority_name}}</p>
                                                </div>
                                                <div class="col-md-3">
                                                    <h5 class="text-primary">Authority's Address</h5>
                                                    <p>{{$education->authority_address}}</p>
                                                </div>
                                                <div class="col-md-3">
                                                    <h5 class="text-primary">Authority's City</h5>
                                                    <p>{{$education->authority_city}}</p>
                                                </div>
                                                <div class="col-md-3">
                                                    <h5 class="text-primary">Authority's State</h5>
                                                    <p>{{$education->authority_state}}</p>
                                                </div>
                                                <div class="col-md-3">
                                                    <h5 class="text-primary">Authority's Country</h5>
                                                    <p>{{$education->authority_country}}</p>
                                                </div>
                                                <div class="col-md-3">
                                                    <h5 class="text-primary">Authority's Country Code</h5>
                                                    <p>{{$education->authority_country_code}}</p>
                                                </div>
                                                <div class="col-md-3">
                                                    <h5 class="text-primary">Authority's Phone</h5>
                                                    <p>{{$education->authority_phone}}</p>
                                                </div>
                                                <div class="col-md-3">
                                                    <h5 class="text-primary">Authority's Email</h5>
                                                    <p>{{$education->authority_email}}</p>
                                                </div>
                                                <div class="col-md-3">
                                                    <h5 class="text-primary">Authority's Website</h5>
                                                    <p>{{$education->authority_website}}.com.np</p>
                                                </div>
                                                <div class="col-md-3">
                                                    <h5 class="text-primary">Qualification</h5>
                                                    <p>{{$education->qualification}}</p>
                                                </div>
                                                <div class="col-md-3">
                                                    <h5 class="text-primary">Institution</h5>
                                                    <p>{{$education->institution}}</p>
                                                </div>
                                                <div class="col-md-3">
                                                    <h5 class="text-primary">Mode</h5>
                                                    <p>{{$education->mode}}</p>
                                                </div>
                                                <div class="col-md-3">
                                                    <h5 class="text-primary">Major Subject</h5>
                                                    <p>{{$education->major_subject}}</p>
                                                </div>
                                                <div class="col-md-3">
                                                    <h5 class="text-primary">Minor Subject</h5>
                                                    <p>{{$education->minor_subject}}</p>
                                                </div>
                                                <div class="col-md-3">
                                                    <h5 class="text-primary">Roll</h5>
                                                    <p>{{$education->roll}}</p>
                                                </div>
                                                <div class="col-md-3">
                                                    <h5 class="text-primary">Study From</h5>
                                                    <p>{{$education->study_from}}</p>
                                                </div>
                                                <div class="col-md-3">
                                                    <h5 class="text-primary">Study To</h5>
                                                    <p>{{$education->study_to}}</p>
                                                </div>
                                                <div class="col-md-3">
                                                    <h5 class="text-primary">Confered Date</h5>
                                                    <p>{{$education->conferred_date}}</p>
                                                </div>
                                                <div class="col-md-3">
                                                    <h5 class="text-primary">Degree Issue Date</h5>
                                                    <p>{{$education->degree_issue_date}}</p>
                                                </div>
                                                <div class="col-md-3">
                                                    <h5 class="text-primary">Expected Degree Issue Date</h5>
                                                    <p>{{$education->expected_degree_issue_date}}</p>
                                                </div>
                                                <div class="col-md-3">
                                                    <h5 class="text-primary">Qualification Certificate</h5>
                                                    @if($education->qualification_certificate)
                                                        <p><a target="_blank"
                                                              style="color: blue"
                                                              href="{{asset('/upload/Education/'.$education->qualification_certificate)}}">Click
                                                                here for Qualification
                                                                Certificate</a></p>
                                                    @else
                                                        <p>No Qualification Certificate Found</p>
                                                    @endif
                                                </div>
                                                <div class="col-md-3">
                                                    <h5 class="text-primary">Character Certificate</h5>
                                                    @if($education->character_certificate)
                                                        <p><a target="_blank"
                                                              style="color: blue"
                                                              href="{{asset('/upload/Education/'.$education->character_certificate)}}">Click
                                                                here for Character
                                                                Certificate</a></p>
                                                    @else
                                                        <p>No Character Certificate Found</p>
                                                    @endif
                                                </div>
                                                <div class="col-md-3">
                                                    <h5 class="text-primary">Marksheet</h5>
                                                    @if($education->marksheet)
                                                        <p><a target="_blank"
                                                              style="color: blue"
                                                              href="{{asset('/upload/Education/'.$education->marksheet)}}">Click
                                                                Here for MarkSheet</a></p>
                                                    @else
                                                        <p>No Marksheet found</p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                    @endif
                                    @if($education2)
                                        <div>
                                            <h3 class="text-center text-danger">Applicant's Second Education
                                                Detail1</h3>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <h5 class="text-primary">Authority's Name</h5>
                                                    <p>{{$education2->authority_name}}</p>
                                                </div>
                                                <div class="col-md-3">
                                                    <h5 class="text-primary">Authority's Address</h5>
                                                    <p>{{$education2->authority_address}}</p>
                                                </div>
                                                <div class="col-md-3">
                                                    <h5 class="text-primary">Authority's City</h5>
                                                    <p>{{$education2->authority_city}}</p>
                                                </div>
                                                <div class="col-md-3">
                                                    <h5 class="text-primary">Authority's State</h5>
                                                    <p>{{$education2->authority_state}}</p>
                                                </div>
                                                <div class="col-md-3">
                                                    <h5 class="text-primary">Authority's Country</h5>
                                                    <p>{{$education2->authority_country}}</p>
                                                </div>
                                                <div class="col-md-3">
                                                    <h5 class="text-primary">Authority's Country Code</h5>
                                                    <p>{{$education2->authority_country_code}}</p>
                                                </div>
                                                <div class="col-md-3">
                                                    <h5 class="text-primary">Authority's Phone</h5>
                                                    <p>{{$education2->authority_phone}}</p>
                                                </div>
                                                <div class="col-md-3">
                                                    <h5 class="text-primary">Authority's Email</h5>
                                                    <p>{{$education2->authority_email}}</p>
                                                </div>
                                                <div class="col-md-3">
                                                    <h5 class="text-primary">Authority's Website</h5>
                                                    <p>{{$education2->authority_website}}.com.np</p>
                                                </div>
                                                <div class="col-md-3">
                                                    <h5 class="text-primary">Qualification</h5>
                                                    <p>{{$education2->qualification}}</p>
                                                </div>
                                                <div class="col-md-3">
                                                    <h5 class="text-primary">Institution</h5>
                                                    <p>{{$education2->institution}}</p>
                                                </div>
                                                <div class="col-md-3">
                                                    <h5 class="text-primary">Mode</h5>
                                                    <p>{{$education2->mode}}</p>
                                                </div>
                                                <div class="col-md-3">
                                                    <h5 class="text-primary">Major Subject</h5>
                                                    <p>{{$education2->major_subject}}</p>
                                                </div>
                                                <div class="col-md-3">
                                                    <h5 class="text-primary">Minor Subject</h5>
                                                    <p>{{$education2->minor_subject}}</p>
                                                </div>
                                                <div class="col-md-3">
                                                    <h5 class="text-primary">Roll</h5>
                                                    <p>{{$education2->roll}}</p>
                                                </div>
                                                <div class="col-md-3">
                                                    <h5 class="text-primary">Study From</h5>
                                                    <p>{{$education2->study_from}}</p>
                                                </div>
                                                <div class="col-md-3">
                                                    <h5 class="text-primary">Study To</h5>
                                                    <p>{{$education2->study_to}}</p>
                                                </div>
                                                <div class="col-md-3">
                                                    <h5 class="text-primary">Confered Date</h5>
                                                    <p>{{$education2->conferred_date}}</p>
                                                </div>
                                                <div class="col-md-3">
                                                    <h5 class="text-primary">Degree Issue Date</h5>
                                                    <p>{{$education2->degree_issue_date}}</p>
                                                </div>
                                                <div class="col-md-3">
                                                    <h5 class="text-primary">Expected Degree Issue Date</h5>
                                                    <p>{{$education2->expected_degree_issue_date}}</p>
                                                </div>
                                                <div class="col-md-3">
                                                    <h5 class="text-primary">Qualification Certificate</h5>
                                                    @if($education2->qualification_certificate)
                                                        <p><a target="_blank"
                                                              style="color: blue"
                                                              href="{{asset('/upload/Education/'.$education2->qualification_certificate)}}">Click
                                                                here for Qualification
                                                                Certificate</a></p>
                                                    @else
                                                        <p>No Qualification Certificate Found</p>
                                                    @endif
                                                </div>
                                                <div class="col-md-3">
                                                    <h5 class="text-primary">Character Certificate</h5>
                                                    @if($education2->character_certificate)
                                                        <p><a target="_blank"
                                                              style="color: blue"
                                                              href="{{asset('/upload/Education/'.$education2->character_certificate)}}">Click
                                                                here for Character
                                                                Certificate</a></p>
                                                    @else
                                                        <p>No Character Certificate Found</p>
                                                    @endif
                                                </div>
                                                <div class="col-md-3">
                                                    <h5 class="text-primary">Marksheet</h5>
                                                    @if($education2->marksheet)
                                                        <p><a target="_blank"
                                                              style="color: blue"
                                                              href="{{asset('/upload/Education/'.$education2->marksheet)}}">Click
                                                                Here for MarkSheet</a></p>
                                                    @else
                                                        <p>No Marksheet found</p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                    @endif
                                    @if($education3)
                                        <div>
                                            <h3 class="text-center text-danger">Applicant's Third Education Detail1</h3>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <h5 class="text-primary">Authority's Name</h5>
                                                    <p>{{$education3->authority_name}}</p>
                                                </div>
                                                <div class="col-md-3">
                                                    <h5 class="text-primary">Authority's Address</h5>
                                                    <p>{{$education3->authority_address}}</p>
                                                </div>
                                                <div class="col-md-3">
                                                    <h5 class="text-primary">Authority's City</h5>
                                                    <p>{{$education3->authority_city}}</p>
                                                </div>
                                                <div class="col-md-3">
                                                    <h5 class="text-primary">Authority's State</h5>
                                                    <p>{{$education3->authority_state}}</p>
                                                </div>
                                                <div class="col-md-3">
                                                    <h5 class="text-primary">Authority's Country</h5>
                                                    <p>{{$education3->authority_country}}</p>
                                                </div>
                                                <div class="col-md-3">
                                                    <h5 class="text-primary">Authority's Country Code</h5>
                                                    <p>{{$education3->authority_country_code}}</p>
                                                </div>
                                                <div class="col-md-3">
                                                    <h5 class="text-primary">Authority's Phone</h5>
                                                    <p>{{$education3->authority_phone}}</p>
                                                </div>
                                                <div class="col-md-3">
                                                    <h5 class="text-primary">Authority's Email</h5>
                                                    <p>{{$education3->authority_email}}</p>
                                                </div>
                                                <div class="col-md-3">
                                                    <h5 class="text-primary">Authority's Website</h5>
                                                    <p>{{$education3->authority_website}}.com.np</p>
                                                </div>
                                                <div class="col-md-3">
                                                    <h5 class="text-primary">Qualification</h5>
                                                    <p>{{$education3->qualification}}</p>
                                                </div>
                                                <div class="col-md-3">
                                                    <h5 class="text-primary">Institution</h5>
                                                    <p>{{$education3->institution}}</p>
                                                </div>
                                                <div class="col-md-3">
                                                    <h5 class="text-primary">Mode</h5>
                                                    <p>{{$education3->mode}}</p>
                                                </div>
                                                <div class="col-md-3">
                                                    <h5 class="text-primary">Major Subject</h5>
                                                    <p>{{$education3->major_subject}}</p>
                                                </div>
                                                <div class="col-md-3">
                                                    <h5 class="text-primary">Minor Subject</h5>
                                                    <p>{{$education3->minor_subject}}</p>
                                                </div>
                                                <div class="col-md-3">
                                                    <h5 class="text-primary">Roll</h5>
                                                    <p>{{$education3->roll}}</p>
                                                </div>
                                                <div class="col-md-3">
                                                    <h5 class="text-primary">Study From</h5>
                                                    <p>{{$education3->study_from}}</p>
                                                </div>
                                                <div class="col-md-3">
                                                    <h5 class="text-primary">Study To</h5>
                                                    <p>{{$education3->study_to}}</p>
                                                </div>
                                                <div class="col-md-3">
                                                    <h5 class="text-primary">Confered Date</h5>
                                                    <p>{{$education3->conferred_date}}</p>
                                                </div>
                                                <div class="col-md-3">
                                                    <h5 class="text-primary">Degree Issue Date</h5>
                                                    <p>{{$education3->degree_issue_date}}</p>
                                                </div>
                                                <div class="col-md-3">
                                                    <h5 class="text-primary">Expected Degree Issue Date</h5>
                                                    <p>{{$education3->expected_degree_issue_date}}</p>
                                                </div>
                                                <div class="col-md-3">
                                                    <h5 class="text-primary">Qualification Certificate</h5>
                                                    @if($education3->qualification_certificate)
                                                        <p><a target="_blank"
                                                              style="color: blue"
                                                              href="{{asset('/upload/Education/'.$education3->qualification_certificate)}}">Click
                                                                here for Qualification
                                                                Certificate</a></p>
                                                    @else
                                                        <p>No Qualification Certificate Found</p>
                                                    @endif
                                                </div>
                                                <div class="col-md-3">
                                                    <h5 class="text-primary">Character Certificate</h5>
                                                    @if($education3->character_certificate)
                                                        <p><a target="_blank"
                                                              style="color: blue"
                                                              href="{{asset('/upload/Education/'.$education3->character_certificate)}}">Click
                                                                here for Character
                                                                Certificate</a></p>
                                                    @else
                                                        <p>No Character Certificate Found</p>
                                                    @endif
                                                </div>
                                                <div class="col-md-3">
                                                    <h5 class="text-primary">Marksheet</h5>
                                                    @if($education3->marksheet)
                                                        <p><a target="_blank"
                                                              style="color: blue"
                                                              href="{{asset('/upload/Education/'.$education3->marksheet)}}">Click
                                                                Here for MarkSheet</a></p>
                                                    @else
                                                        <p>No Marksheet found</p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                    @endif
                                    @if($progressflow)
                                        <div>
                                            <h3 class="text-center text-danger">Applicant Progress Flow Report</h3>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <h5 class="text-primary">Profession</h5>
                                                    <p>{{$progressflow->profession}}</p>
                                                </div>
                                                <div class="col-md-3">
                                                    <h5 class="text-primary">Email</h5>
                                                    <p>{{$progressflow->email}}</p>
                                                </div>
                                                <div class="col-md-3">
                                                    <h5 class="text-primary">Contact Number</h5>
                                                    <p>{{$progressflow->contact_number}}</p>
                                                </div>
                                                <div class="col-md-3">
                                                    <h5 class="text-primary">Date of Birth</h5>
                                                    <p>{{$progressflow->date_of_birth}}</p>
                                                </div>
                                                <div class="col-md-3">
                                                    <h5 class="text-primary">Passport Number</h5>
                                                    <p>{{$progressflow->passport_number}}</p>
                                                </div>
                                                <div class="col-md-3">
                                                    <h5 class="text-primary">Signed By Appliant?</h5>
                                                    <p>{{$progressflow->signed_by_applicant}}</p>
                                                </div>
                                                <div class="col-md-3">
                                                    <h5 class="text-primary">Service Agreement Document</h5>
                                                    @if($progressflow->signed_docs)
                                                        <a target="_blank"
                                                           style="color: blue"
                                                           href="{{asset('/upload/Progress flow/'.$progressflow->signed_docs)}}">Click
                                                            here for Service Agreement Document</a>
                                                    @else
                                                        <p>No Signed document found</p>
                                                    @endif
                                                </div>
                                                <div class="col-md-3">
                                                    <h5 class="text-primary">Service Charge</h5>
                                                    <p>{{$progressflow->service_charge}}</p>
                                                </div>
                                                <div class="col-md-3">
                                                    <h5 class="text-primary">Service Paid Date</h5>
                                                    <p>{{$progressflow->service_paid_date}}</p>
                                                </div>
                                                <div class="col-md-3">
                                                    <h5 class="text-primary">Service Mode Of Payment</h5>
                                                    <p>{{$progressflow->service_mode_of_payment}}</p>
                                                </div>
                                                <div class="col-md-3">
                                                    <h5 class="text-primary">Service Charge Received By</h5>
                                                    <p>{{$progressflow->service_charge_received_by}}</p>
                                                </div>
                                                <div class="col-md-3">
                                                    <h5 class="text-primary">DHAMCQ Fee</h5>
                                                    <p>{{$progressflow->dhamcq_fee}}</p>
                                                </div>
                                                <div class="col-md-3">
                                                    <h5 class="text-primary">DHAMCQ Mode Of Payment</h5>
                                                    <p>{{$progressflow->dhamcq_mode_of_payment}}</p>
                                                </div>
                                                <div class="col-md-3">
                                                    <h5 class="text-primary">DHAMCQ Subject</h5>
                                                    <p>{{$progressflow->dhamcq_subject}}</p>
                                                </div>
                                                <div class="col-md-3">
                                                    <h5 class="text-primary">DHAMCQ UserName</h5>
                                                    <p>{{$progressflow->dhamcq_username}}</p>
                                                </div>
                                                <div class="col-md-3">
                                                    <h5 class="text-primary">DHAMCQ Password</h5>
                                                    <p>{{$progressflow->dhamcq_password}}</p>
                                                </div>
                                                <div class="col-md-3">
                                                    <h5 class="text-primary">DHAMCQ Email Sent</h5>
                                                    <p>{{$progressflow->dhamcq_email_sent}}</p>
                                                </div>
                                                <div class="col-md-3">
                                                    <h5 class="text-primary">Book Provided</h5>
                                                    <p>{{$progressflow->books_provided}}</p>
                                                </div>
                                                <div class="col-md-3">
                                                    <h5 class="text-primary">BLS Training Completed Date</h5>
                                                    <p>{{$progressflow->bls_training_completed_date}}</p>
                                                </div>
                                                <div class="col-md-3">
                                                    <h5 class="text-primary">Good Standing Certificate Issue Date</h5>
                                                    <p>{{$progressflow->good_standing_certificate_issue_date}}</p>
                                                </div>
                                                <div class="col-md-3">
                                                    <h5 class="text-primary">Equivalent Certificate</h5>
                                                    <p>{{$progressflow->equivalent_certificate}}</p>
                                                </div>
                                                <div class="col-md-3">
                                                    <h5 class="text-primary">DHa Email Account</h5>
                                                    <p>{{$progressflow->dha_email_account}}</p>
                                                </div>
                                                <div class="col-md-3">
                                                    <h5 class="text-primary">DHA Unique ID</h5>
                                                    <p>{{$progressflow->dha_unique_id}}</p>
                                                </div>
                                                <div class="col-md-3">
                                                    <h5 class="text-primary">DHA UserName</h5>
                                                    <p>{{$progressflow->dha_username}}</p>
                                                </div>
                                                <div class="col-md-3">
                                                    <h5 class="text-primary">DHA Password</h5>
                                                    <p>{{$progressflow->dha_password}}</p>
                                                </div>
                                                <div class="col-md-3">
                                                    <h5 class="text-primary">DHA Applicanf REF Number</h5>
                                                    <p>{{$progressflow->dha_application_ref_number}}</p>
                                                </div>
                                                <div class="col-md-3">
                                                    <h5 class="text-primary">DHA Fee First Installment</h5>
                                                    <p>{{$progressflow->dha_fees_first_installment}}</p>
                                                </div>
                                                <div class="col-md-3">
                                                    <h5 class="text-primary">First Installment Paid Date</h5>
                                                    <p>{{$progressflow->first_installment_paid_date}}</p>
                                                </div>
                                                <div class="col-md-3">
                                                    <h5 class="text-primary">First Installment Mode Of Payment</h5>
                                                    <p>{{$progressflow->first_installment_mode_of_payment}}</p>
                                                </div>
                                                <div class="col-md-3">
                                                    <h5 class="text-primary">First Installment Received By</h5>
                                                    <p>{{$progressflow->first_installment_received_by}}</p>
                                                </div>
                                                <div class="col-md-3">
                                                    <h5 class="text-primary">DHA Fee Second Installment</h5>
                                                    <p>{{$progressflow->dha_fees_second_installment}}</p>
                                                </div>
                                                <div class="col-md-3">
                                                    <h5 class="text-primary">Second Installment Paid Date</h5>
                                                    <p>{{$progressflow->second_installment_paid_date}}</p>
                                                </div>
                                                <div class="col-md-3">
                                                    <h5 class="text-primary">Second Installment Mode Of Payment</h5>
                                                    <p>{{$progressflow->second_installment_mode_of_payment}}</p>
                                                </div>
                                                <div class="col-md-3">
                                                    <h5 class="text-primary">Second Installment Received By</h5>
                                                    <p>{{$progressflow->second_installment_received_by}}</p>
                                                </div>
                                                <div class="col-md-3">
                                                    <h5 class="text-primary">DataFlow Email</h5>
                                                    <p>{{$progressflow->dataflow_email}}</p>
                                                </div>
                                                <div class="col-md-3">
                                                    <h5 class="text-primary">DataFlow UserName</h5>
                                                    <p>{{$progressflow->dataflow_username}}</p>
                                                </div>
                                                <div class="col-md-3">
                                                    <h5 class="text-primary">DataFlow Password</h5>
                                                    <p>{{$progressflow->dataflow_password}}</p>
                                                </div>
                                                <div class="col-md-3">
                                                    <h5 class="text-primary">DataFlow REF Number</h5>
                                                    <p>{{$progressflow->dataflow_ref_no}}</p>
                                                </div>
                                                <div class="col-md-3">
                                                    <h5 class="text-primary">DHA Exam Eligibility ID</h5>
                                                    <p>{{$progressflow->dha_exam_eligibility_id}}</p>
                                                </div>
                                                <div class="col-md-3">
                                                    <h5 class="text-primary">Eligibility Date</h5>
                                                    <p>{{$progressflow->eligibility_date}}</p>
                                                </div>
                                                <div class="col-md-3">
                                                    <h5 class="text-primary">Exam Date Confirmed</h5>
                                                    <p>{{$progressflow->exam_date_confirmed}}</p>
                                                </div>
                                                <div class="col-md-3">
                                                    <h5 class="text-primary">Send Confirmation To Candidate</h5>
                                                    <p>{{$progressflow->send_confirmation_to_candidate}}</p>
                                                </div>
                                                <div class="col-md-3">
                                                    <h5 class="text-primary">Exam Result</h5>
                                                    <p>{{$progressflow->exam_result}}</p>
                                                </div>

                                                <div class="col-md-3">
                                                    <h5 class="text-primary">Data Flow Report</h5>
                                                    <p>{{$progressflow->data_flow_report}}</p>
                                                </div>

                                                <div class="col-md-3">
                                                    <h5 class="text-primary">Remarks</h5>
                                                    <p>{{$progressflow->remarks}}</p>
                                                </div>
                                            </div>

                                        </div>
                                    @endif
                                    
                                </div>
                        </div>
                        <div class="row">
                                        <div class="col-md-8"></div>
                                        <div class="col-md-4">
                                            <button class="btn btn-info" onclick="printDiv('printableArea')">Print this
                                                page
                                            </button>
                                            <a href="{{route('ApplicantDetailPdf',$applicant->id)}}"
                                               class="btn btn-warning"
                                               target="_blank">Export Pdf</a>
                                        </div>
                                    </div>
                    </div>
                </div>
            </div>
@endsection