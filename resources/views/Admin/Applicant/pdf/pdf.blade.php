<style type="text/css">
    table {
        width: 100%;
        margin-bottom: 30px;
    }

    table tbody {
        font-size: 13px !important;
        font-weight: 300 !important;
    }

    table tbody tr td {
        font-size: 14px !important;
        font-weight: 300 !important;
    }

    .center {
        text-align: center;
    }

    .h1Style {
        display: block;
        text-align: center;
        color: #e3342f;
    }

    .thbg {
        background: #007bff;
        color: #fff;
    }
</style>
@if($applicant)
    <h1 class="h1Style">Applicant's Detail</h1>
    <table>
        <thead>
        <tr class="thbg">
            <th style="width:25%;padding:7px">Id</th>
            <th style="width:25%;padding:7px">First Name</th>
            <th style="width:25%;padding:7px">Middle Name</th>
            <th style="width:25%;padding:7px">Last Name</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="font center" style="height:30px">{{$applicant->id}}</td>
            <td class="font center" style="height:30px">{{$applicant->first_name}}</td>
            <td class="font center" style="height:30px">{{$applicant->middle_name}}</td>
            <td class="font center" style="height:30px">{{$applicant->last_name}}</td>

        </tr>
        </tbody>
    </table>

    <table>
        <thead>
        <tr class="thbg">
            <th style="width:25%;padding:7px">Gender</th>
            <th style="width:25%;padding:7px">Date OF Birth</th>
            <th style="width:25%;padding:7px">Address</th>
            <th style="width:25%;padding:7px">Subject</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="font center" style="height:30px">{{$applicant->gender}}</td>
            <td class="font center" style="height:30px">{{$applicant->dob}}</td>
            <td class="font center" style="height:30px">{{$applicant->address}}</td>
            <td class="font center" style="height:30px">{{$applicant->subject}}</td>

        </tr>
        </tbody>
    </table>

    <table>
        <thead>
        <tr class="thbg">
            <th style="width:25%;padding:7px">Qualification</th>
            <th style="width:25%;padding:7px">Experience</th>
            <th style="width:25%;padding:7px">Interested Country</th>
            <th style="width:25%;padding:7px">Interested Service</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="font center" style="height:30px">{{$applicant->qualification}}</td>
            <td class="font center" style="height:30px">{{$applicant->experience}}</td>
            <td class="font center" style="height:30px">{{$applicant->country_interested}}</td>
            <td class="font center" style="height:30px">{{$applicant->service_interested}}</td>

        </tr>
        </tbody>
    </table>

    <table>
        <thead>
        <tr class="thbg">
            <th style="width:25%;padding:7px">Maiden Name</th>
            <th style="width:25%;padding:7px">Identity Type</th>
            <th style="width:25%;padding:7px">Citizenship Number</th>
            <th style="width:25%;padding:7px">Passport Number</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="font center" style="height:30px">{{$applicant->maiden_name}}</td>
            <td class="font center" style="height:30px">{{$applicant->identity_type}}</td>
            <td class="font center" style="height:30px">{{$applicant->citizen_no}}</td>
            <td class="font center" style="height:30px">{{$applicant->passport_no}}</td>

        </tr>
        </tbody>
    </table>

    <table>
        <thead>
        <tr class="thbg">
            <th style="width:25%;padding:7px">Mobile Number</th>
            <th style="width:25%;padding:7px">Nationality</th>
            <th style="width:25%;padding:7px">Email</th>
            <th style="width:25%;padding:7px">Passport Document</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="font center" style="height:30px">{{$applicant->phone}}</td>
            <td class="font center" style="height:30px">{{$applicant->nationality}}</td>
            <td class="font center" style="height:30px">{{$applicant->email}}</td>
            <td class="font center" style="height:30px"> @if($applicant->passport_docs)
                    <p><a target="_blank"
                          style="color: blue"
                          href="{{asset('/upload/Applicant/'.$applicant->passport_docs)}}">Click here
                            for Passport
                            Document</a>
                @else
                    <p>No Document File</p>
                @endif</td>

        </tr>
        </tbody>
    </table>

    <table>
        <thead>
        <tr class="thbg">
            <th style="width:25%;padding:7px">Status</th>
            <th style="width:25%;padding:7px">Applicant Profession</th>
            <th style="width:25%;padding:7px">Color Code</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="font center" style="height:30px">{{$applicant->status}}</td>
            <td class="font center" style="height:30px">{{@$applicant->Category_Applicant->Name}}</td>
            <td class="font center" style="height:30px">{{@$applicant->color_code}}</td>
        </tr>
        </tbody>
    </table>
@endif
@if($checklist)
    <h1 class="h1Style">Applicant's Document Checklist</h1>
    <table>
        <thead>
        <tr class="thbg">
            <th style="width:50%;padding:7px">MRP Size Photo</th>
            <th style="width:50%;padding:7px">Passport</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="font center" style="height:30px">{{$checklist->mrp_size_photo}}</td>
            <td class="font center" style="height:30px">{{$checklist->passport}}</td>
        </tr>
        </tbody>
    </table>
    <table>
        <thead>
        <tr class="thbg">
            <th style="width:50%;padding:7px">Citizen</th>
            <th style="width:50%;padding:7px">SLC Marksheet</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="font center" style="height:30px">{{$checklist->citizen}}</td>
            <td class="font center" style="height:30px">{{$checklist->slc_marksheet}}</td>
        </tr>
        </tbody>
    </table>
    <table>
        <thead>
        <tr class="thbg">
            <th style="width:50%;padding:7px">SLC Certificate</th>
            <th style="width:50%;padding:7px">SLC Character Certificate</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="font center" style="height:30px">{{$checklist->slc_certificate}}</td>
            <td class="font center" style="height:30px">{{$checklist->slc_character_certificate}}</td>
        </tr>
        </tbody>
    </table>

    <table>
        <thead>
        <tr class="thbg">
            <th style="width:50%;padding:7px">+2 Transcript</th>
            <th style="width:50%;padding:7px">+2 Certificate</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="font center" style="height:30px">{{$checklist->plus2transcript}}</td>
            <td class="font center" style="height:30px">{{$checklist->plus2certificate}}</td>
        </tr>
        </tbody>
    </table>

    <table>
        <thead>
        <tr class="thbg">
            <th style="width:50%;padding:7px">+2 Character Certificate</th>
            <th style="width:50%;padding:7px">PCL/Diploma Transcript</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="font center" style="height:30px">{{$checklist->plus2character_certificate}}</td>
            <td class="font center" style="height:30px">{{$checklist->diploma_transcript}}</td>
        </tr>
        </tbody>
    </table>
    <table>
        <thead>
        <tr class="thbg">
            <th style="width:50%;padding:7px">PCL/Diploma Certificate</th>
            <th style="width:50%;padding:7px">PCL/Diploma Character Certificate</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="font center" style="height:30px">{{$checklist->diploma_certificate}}</td>
            <td class="font center" style="height:30px">{{$checklist->diploma_character_certificate}}</td>
        </tr>
        </tbody>
    </table>

    <table>
        <thead>
        <tr class="thbg">
            <th style="width:50%;padding:7px">Equivalent Certificate</th>
            <th style="width:50%;padding:7px">Council Registration Certificate Front</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="font center" style="height:30px">{{$checklist->equivalent_certificate}}</td>
            <td class="font center" style="height:30px">{{$checklist->council_registration_certificate_front}}</td>
        </tr>
        </tbody>
    </table>

    <table>
        <thead>
        <tr class="thbg">
            <th style="width:50%;padding:7px">Council Registration Certificate Back</th>
            <th style="width:50%;padding:7px">Council Good Standing Letter</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="font center" style="height:30px">{{$checklist->council_registration_certificate_back}}</td>
            <td class="font center" style="height:30px">{{$checklist->council_good_standing_letter}}</td>
        </tr>
        </tbody>
    </table>

    <table>
        <thead>
        <tr class="thbg">
            <th style="width:50%;padding:7px">Work Experience Letter 1</th>
            <th style="width:50%;padding:7px">Work Experience Letter 2</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="font center" style="height:30px">{{$checklist->work_experience_letter1}}</td>
            <td class="font center" style="height:30px">{{$checklist->work_experience_letter2}}</td>
        </tr>
        </tbody>
    </table>

    <table>
        <thead>
        <tr class="thbg">
            <th style="width:50%;padding:7px">Work Experience Letter 3</th>
            <th style="width:50%;padding:7px">Basic Life Support For Certificate</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="font center" style="height:30px">{{$checklist->work_experience_letter3}}</td>
            <td class="font center" style="height:30px">{{$checklist->basic_life_support_certificate}}</td>
        </tr>
        </tbody>
    </table>

    <table>
        <thead>
        <tr class="thbg">
            <th style="width:50%;padding:7px">Signed Letter of Authorization</th>
            <th style="width:50%;padding:7px">Signed Service Agreement</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="font center" style="height:30px">{{$checklist->signed_letter_authorization}}</td>
            <td class="font center" style="height:30px">{{$checklist->signed_service_agreement}}</td>
        </tr>
        </tbody>
    </table>
@endif
@if($progressflow)
    <h1 class="h1Style">Applicant Progress Flow Report</h1>

    <table>
        <thead>
        <tr class="thbg">
            <th style="width:25%;padding:7px">Profession</th>
            <th style="width:25%;padding:7px">Email</th>
            <th style="width:25%;padding:7px">Contact Number</th>
            <th style="width:25%;padding:7px">Date of Birth</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="font center" style="height:30px">{{$progressflow->profession}}</td>
            <td class="font center" style="height:30px">{{$progressflow->email}}</td>
            <td class="font center" style="height:30px">{{$progressflow->contact_number}}</td>
            <td class="font center" style="height:30px">{{$progressflow->date_of_birth}}</td>

        </tr>
        </tbody>
    </table>


    <table>
        <thead>
        <tr class="thbg">
            <th style="width:25%;padding:7px">Passport Number</th>
            <th style="width:25%;padding:7px">Signed By Appliant?</th>
            <th style="width:25%;padding:7px">Service Agreement Document</th>
            <th style="width:25%;padding:7px">Service Charge</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="font center" style="height:30px">{{$progressflow->passport_number}}</td>
            <td class="font center" style="height:30px">{{$progressflow->signed_by_applicant}}</td>
            <td class="font center" style="height:30px">@if($progressflow->signed_docs)
                    <a target="_blank"
                       style="color: blue"
                       href="{{asset('/upload/Progress flow/'.$progressflow->signed_docs)}}">Click
                        here for Service Agreement Document</a>
                @else
                    <p>No Signed document found</p>
                @endif</td>
            <td class="font center" style="height:30px">{{$progressflow->service_charge}}</td>

        </tr>
        </tbody>
    </table>

    <table>
        <thead>
        <tr class="thbg">
            <th style="width:25%;padding:7px">Service Paid Date</th>
            <th style="width:25%;padding:7px">Service Mode Of Payment</th>
            <th style="width:25%;padding:7px">Service Charge Received By</th>
            <th style="width:25%;padding:7px">DHAMCQ Fee</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="font center" style="height:30px">{{$progressflow->service_paid_date}}</td>
            <td class="font center" style="height:30px">{{$progressflow->service_mode_of_payment}}</td>
            <td class="font center" style="height:30px">{{$progressflow->service_charge_received_by}}</td>
            <td class="font center" style="height:30px">{{$progressflow->dhamcq_fee}}</td>

        </tr>
        </tbody>
    </table>


    <table>
        <thead>
        <tr class="thbg">
            <th style="width:25%;padding:7px">DHAMCQ Mode Of Payment</th>
            <th style="width:25%;padding:7px">DHAMCQ Subject</th>
            <th style="width:25%;padding:7px">DHAMCQ UserName</th>
            <th style="width:25%;padding:7px">DHAMCQ Password</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="font center" style="height:30px">{{$progressflow->dhamcq_mode_of_payment}}</td>
            <td class="font center" style="height:30px">{{$progressflow->dhamcq_subject}}</td>
            <td class="font center" style="height:30px">{{$progressflow->dhamcq_username}}</td>
            <td class="font center" style="height:30px">{{$progressflow->dhamcq_password}}</td>

        </tr>
        </tbody>
    </table>


    <table>
        <thead>
        <tr class="thbg">
            <th style="width:25%;padding:7px">DHAMCQ Email Sent</th>
            <th style="width:25%;padding:7px">Book Provided</th>
            <th style="width:25%;padding:7px">BLS Training Completed Date</th>
            <th style="width:25%;padding:7px">Good Standing Certificate Issue Date</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="font center" style="height:30px">{{$progressflow->dhamcq_email_sent}}</td>
            <td class="font center" style="height:30px">{{$progressflow->books_provided}}</td>
            <td class="font center" style="height:30px">{{$progressflow->bls_training_completed_date}}</td>
            <td class="font center" style="height:30px">{{$progressflow->good_standing_certificate_issue_date}}</td>

        </tr>
        </tbody>
    </table>


    <table>
        <thead>
        <tr class="thbg">
            <th style="width:25%;padding:7px">Equivalent Certificate</th>
            <th style="width:25%;padding:7px">DHa Email Account</th>
            <th style="width:25%;padding:7px">DHA Unique ID</th>
            <th style="width:25%;padding:7px">DHA UserName</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="font center" style="height:30px">{{$progressflow->equivalent_certificate}}</td>
            <td class="font center" style="height:30px">{{$progressflow->dha_email_account}}</td>
            <td class="font center" style="height:30px">{{$progressflow->dha_unique_id}}</td>
            <td class="font center" style="height:30px">{{$progressflow->dha_username}}</td>

        </tr>
        </tbody>
    </table>


    <table>
        <thead>
        <tr class="thbg">
            <th style="width:25%;padding:7px">DHA Password</th>
            <th style="width:25%;padding:7px">DHA Applicanf REF Number</th>
            <th style="width:25%;padding:7px">DHA Fee First Installment</th>
            <th style="width:25%;padding:7px">First Installment Paid Dates</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="font center" style="height:30px">{{$progressflow->dha_password}}</td>
            <td class="font center" style="height:30px">{{$progressflow->dha_application_ref_number}}</td>
            <td class="font center" style="height:30px">{{$progressflow->dha_fees_first_installment}}</td>
            <td class="font center" style="height:30px">{{$progressflow->first_installment_paid_date}}</td>

        </tr>
        </tbody>
    </table>

    <table>
        <thead>
        <tr class="thbg">
            <th style="width:25%;padding:7px">First Installment Mode Of Payment</th>
            <th style="width:25%;padding:7px">First Installment Received By</th>
            <th style="width:25%;padding:7px">DHA Fee Second Installment</th>
            <th style="width:25%;padding:7px">Second Installment Paid Date</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="font center" style="height:30px">{{$progressflow->first_installment_mode_of_payment}}</td>
            <td class="font center" style="height:30px">{{$progressflow->first_installment_received_by}}</td>
            <td class="font center" style="height:30px">{{$progressflow->dha_fees_second_installment}}</td>
            <td class="font center" style="height:30px">{{$progressflow->second_installment_paid_date}}</td>

        </tr>
        </tbody>
    </table>


    <table>
        <thead>
        <tr class="thbg">
            <th style="width:25%;padding:7px">Second Installment Mode Of Payment</th>
            <th style="width:25%;padding:7px">Second Installment Received By</th>
            <th style="width:25%;padding:7px">DataFlow Email</th>
            <th style="width:25%;padding:7px">DataFlow UserName</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="font center" style="height:30px">{{$progressflow->second_installment_mode_of_payment}}</td>
            <td class="font center" style="height:30px">{{$progressflow->second_installment_received_by}}</td>
            <td class="font center" style="height:30px">{{$progressflow->dataflow_email}}</td>
            <td class="font center" style="height:30px">{{$progressflow->dataflow_username}}</td>

        </tr>
        </tbody>
    </table>


    <table>
        <thead>
        <tr class="thbg">
            <th style="width:25%;padding:7px">DataFlow Password</th>
            <th style="width:25%;padding:7px">DataFlow REF Number</th>
            <th style="width:25%;padding:7px">DHA Exam Eligibility ID</th>
            <th style="width:25%;padding:7px">Eligibility Date</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="font center" style="height:30px">{{$progressflow->dataflow_password}}</td>
            <td class="font center" style="height:30px">{{$progressflow->dataflow_ref_no}}</td>
            <td class="font center" style="height:30px">{{$progressflow->dha_exam_eligibility_id}}</td>
            <td class="font center" style="height:30px">{{$progressflow->eligibility_date}}</td>

        </tr>
        </tbody>
    </table>

    <table>
        <thead>
        <tr class="thbg">
            <th style="width:25%;padding:7px">Exam Date Confirmed</th>
            <th style="width:25%;padding:7px">Send Confirmation To Candidate</th>
            <th style="width:25%;padding:7px">Exam Result</th>
            <th style="width:25%;padding:7px">Data Flow Report</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="font center" style="height:30px">{{$progressflow->exam_date_confirmed}}</td>
            <td class="font center" style="height:30px">{{$progressflow->send_confirmation_to_candidate}}</td>
            <td class="font center" style="height:30px">{{$progressflow->exam_result}}</td>
            <td class="font center" style="height:30px">{{$progressflow->data_flow_report}}</td>
        </tr>
        </tbody>
    </table>



    <table>
        <thead>
        <tr class="thbg">
            <th style="width:100%;padding:7px">Remarks</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="font center" style="height:30px">{{$progressflow->remarks}}</td>
        </tr>
        </tbody>
    </table>
@endif
