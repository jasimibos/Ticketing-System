<!DOCTYPE html>
<html>
<head>
	<title>Application Preview</title>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<style type="text/css">
	    body {
            font-weight: 500;
            color: #000;
        }
	    p {
	        margin: 0px;
	    }
	    .print-table {
	        width: 100%
	    }
	    .print-table tr th,td {
	        padding: 1px;
	    }
        #code {
            display : none;
        }
		@media print {
		    .pagebreak { page-break-before: always; } /* page-break-after works, as well */
		}
	</style>
</head>
<body onload="window.print()">
	<div class="print_body" style="font-size: 19px;">
		<div style="height: 2in;"></div>
        <div class="first_page" style="font-size: 25px;padding: 60px;">
            <div class="row">
                <div class="col-md-12">
                    <b><p>TO</p></b>
                    <p>THE CHIEF OF CONSULATE SECTION</p>
                    <p>THE ROYEL EMBASSY OF SAUDI ARABIA</p>
                    <p>GULSHAN, DHAKA, BANGLADESH</p>
                    <div style="height: 0.5in;"></div>
                    <b><p>EXCELLENCY,</p></b>
                    <p>WITH DUE RESPECT WE ARE SUBMITTING ONE PASSPORT FOR WORK VISA WITH ALL
                        NECESSARY DOCUMENTS AND PARTICULARS MENTIONED AS BELOW , KNOWING ALL INSTRUCTION AND REGULATION OF THE CONSULATE SECTION:</p>

                </div>
            </div>
            <div style="height: 0.6in;"></div>
            <div class="row">
                <div class="col-md-12">
                    <table style="width : 100%; border: 1px solid #fff important;">
                        <tbody>
                            <tr>
                                <th valign="top" style="border: none;" scope="row">1.</th>
                                <td valign="top" style="border: none;">NAME OF THE EMPLOYMENT IN SAUDIA ARABIA</td>
                                <td valign="top" style="border: none;">:</td>
                                <td colspan="2" style="border: none;font-family: Calibri; font-size: 400;"><b>{{ $request->sponsor_name }}</b></td>
                            </tr>
                            <tr>
                                <th scope="row">2.</th>
                                <td style="border: none;">VISA NUMBER & DATE</td>
                                <td style="border: none;">:</td>
                                <td style="border: none;"><b>{{ $request->visa_no }}</b> </td>
                                <td style="border: none;">&nbsp;DATE: <b>{{ $request->visa_issue_date }}</b></td>
                            </tr>
                            <tr>
                                <th scope="row">3.</th>
                                <td style="border: none;">FULL NAME OF THE EMPLOYEE</td>
                                <td style="border: none;">:</td>
                                <td colspan="2" style="border: none;"><b>{{ $request->name }}</b></td>
                            </tr>
                            <tr>
                                <th scope="row">4.</th>
                                <td style="border: none;">PASSPORT NO. WITH DATE</td>
                                <td style="border: none;">:</td>
                                <td style="border: none;"><b>{{ $request->passport_no }}</b> </td>
                                <td style="border: none;">&nbsp;DATE: <b>{{ $request->passport_issued_date }}</b></td>
                            </tr>
                            <tr>
                                <th scope="row">5.</th>
                                <td style="border: none;">PROFESSION</td>
                                <td style="border: none;">:</td>
                                <td colspan="2" style="border: none;"><b>{{ $request->profession }}</b></td>
                            </tr>
                            <tr>
                                <th scope="row">6.</th>
                                <td style="border: none;">RELIGIOUS</td>
                                <td style="border: none;">:</td>
                                <td colspan="2" style="border: none;"><b>{{ $request->religion }}</b></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <br><br>
            <div class="row">
                <div class="col-md-12">
                    <p>I DO HEREBY CONFIRM AND DECLARE THAT THE RIGION STATED INTHE VISA FROM AND FORWARDING LETTER IS FULLY CORRECT.
                        I ALSO UNDER TAKE WITH MY OWN RESPONSIBILITY TO CANEL THE VISA AND TO STOP FUNCTIONING WITH MY OFFICE,
                        IF THE STATEMENT IS FOUND INCORRECT.
                    </p>
                    <br>
                    <p>WE THEREFORE, REQUEST YOUR EXELLENCY TO KINDLY ISSUE WORK VISA OUT OF -05 - VISAS AND OBLIGE THERE BY.</p>
                </div>
            </div>

            <footer style="bottom: 150px; position: absolute; width: 100%">
                <div class="row">
                    <div class="col-md-6">
                        <p>SL NO.............</p>
                    </div>
                    <div class="col-md-6">
                        <p style="text-align : center;">YOUR FAITHFULLY</p>
                    </div>
                </div>
            </footer>
        </div>
        <div class="pagebreak"> </div>
        <div style="height: -0.8in;"></div>
        <div class="row" style="margin-bottom:0px;">
            <div class="col-md-4">
                <img style="width: 40%;" src="{{asset('assets/img/pass_photo.png')}}">
                <!-- <span style="border: 0.5px solid #1b1b1b; padding: 35px 20px 35px 20px;">PHOTO</span> -->
            </div>
            <div class="col-md-4">
                <center>
                    <img style="width: 35%;" src="{{asset('assets/img/log.png')}}">
                    <p style="margin-top: 5px;font-size:20px""><b style="padding: 4px 35px 4px 35px;">{{ $request->mofa_no }}</b></p>
                </center>
            </div>
            <div class="col-md-4">
                <center style="margin-top: 20px;">
                    <p>VISA NO: <b>{{ $request->visa_no }}</b></p>
                    <span>{!! DNS1D::getBarcodeSVG($request->visa_no, "C128")!!}</span>
                    <p style="font-family: Calibri; font-size: 400;">    ?????????? ??????????????</p>
                    <p>EMBASSY OF SAUDI ARABIA <br> CONSULAR SECTION</p>
                </center>
            </div>
        </div>

        <br>
        <br>
        
        <!-- Extra Div - added by Nahid -->
        <div style="padding:0px 10px;">

            <div class="row">
                <div class="col-lg-12">
                    <table style="width : 100%;">
                        <tbody>
                            <tr>
                                <td colspan="2" style="border-bottom: 0.5px solid #1b1b1b;">Full Name:</td>
                                <td colspan="3" style="border-bottom: 0.5px solid #1b1b1b;"><b>{{ $request->name }}</b></td>
                                <td style="border-bottom: 0.5px solid #1b1b1b;font-family: Calibri; font-size: 400;text-align : right;">:   ???????? ????????????</td>
                            </tr>
                            <tr>
                                <td colspan="2" style="border-bottom: 0.5px solid #1b1b1b;">Mother's Name:</td>
                                <td colspan="3" style="border-bottom: 0.5px solid #1b1b1b;"><b>{{ $request->mother_name }}</b></td>
                                <td style="border-bottom: 0.5px solid #1b1b1b;font-family: Calibri; font-size: 400;text-align : right;">:   ?????? ????????</td>
                            </tr>
                            <tr >
                                <td style="border-bottom: 0.5px solid #1b1b1b;">Date of birth:</td>
                                <td style="border-bottom: 0.5px solid #1b1b1b;"><b>{{ $request->dob }}</b></td>
                                <td style="border-bottom: 0.5px solid #1b1b1b;font-family: Calibri; font-size: 400;text-align : center;">:   ?????????? ??????????????</td>
                                <td style="border-bottom: 0.5px solid #1b1b1b;">Place of birth:</td>
                                <td style="border-bottom: 0.5px solid #1b1b1b;"><b>{{ $request->pob }}</b></td>
                                <td style="border-bottom: 0.5px solid #1b1b1b;font-family: Calibri; font-size: 400;text-align : right;">:   ?????? ??????????????</td>
                            </tr>
                            <tr >
                                <td style="border-bottom: 0.5px solid #1b1b1b;">Previous nationality:</td>
                                <td style="border-bottom: 0.5px solid #1b1b1b;"><b>BANGLADESH</b></td>
                                <td style="border-bottom: 0.5px solid #1b1b1b;font-family: Calibri; font-size: 400;text-align : center;">:   ?????????????? ??????????????</td>
                                <td style="border-bottom: 0.5px solid #1b1b1b;">Present nationality:</td>
                                <td style="border-bottom: 0.5px solid #1b1b1b;"><b>BANGLADESH</b></td>
                                <td style="border-bottom: 0.5px solid #1b1b1b;font-family: Calibri; font-size: 400;text-align : right;">:   ?????????????? ??????????????</td>
                            </tr>
                            <tr >
                                <td style="border-bottom: 0.5px solid #1b1b1b;">Sex:</td>
                                <td style="border-bottom: 0.5px solid #1b1b1b;"><b>{{ $request->sex }}</b></td>
                                <td style="border-bottom: 0.5px solid #1b1b1b;font-family: Calibri; font-size: 400;text-align : center;">:   ??????????</td>
                                <td style="border-bottom: 0.5px solid #1b1b1b;">Marital Status:</td>
                                <td style="border-bottom: 0.5px solid #1b1b1b;"><b>{{ $request->marital_status == 1 ? 'Married' : 'Unmarried' }}</b></td>
                                <td style="border-bottom: 0.5px solid #1b1b1b;font-family: Calibri; font-size: 400; text-align : right;">:   ???????????? ????????????????????</td>
                            </tr>
                            <tr>
                                <td style="border-bottom: 0.5px solid #1b1b1b;">Sect:</td>
                                <td style="border-bottom: 0.5px solid #1b1b1b;"><b></b></td>
                                <td style="border-bottom: 0.5px solid #1b1b1b;font-family: Calibri; font-size: 400;text-align : center;">:   ????????????????</td>
                                <td style="border-bottom: 0.5px solid #1b1b1b;">Religion:</td>
                                <td style="border-bottom: 0.5px solid #1b1b1b;"><b>{{ $request->religion }}</b></td>
                                <td style="border-bottom: 0.5px solid #1b1b1b;font-family: Calibri; font-size: 400;text-align : right;">:   ??????????????????</td>
                            </tr>
                            <tr>
                                <td style="border-bottom: 0.5px solid #1b1b1b;"><b></b></td>
                                <td style="border-bottom: 0.5px solid #1b1b1b;font-family: Calibri; font-size: 400;text-align: left;">:   ??????????</td>
                                <td style="border-bottom: 0.5px solid #1b1b1b;"><b></b></td>
                                <td style="border-bottom: 0.5px solid #1b1b1b;font-family: Calibri; font-size: 400;">    ???????????? ????????????</td>
                                <td style="border-bottom: 0.5px solid #1b1b1b;font-family: Calibri; font-size: 400;"><b>{{ $request->profesion_arabic }}</b></td>
                                <td style="border-bottom: 0.5px solid #1b1b1b;font-family: Calibri; font-size: 400;text-align : right;">:   ??????????????</td>
                            </tr>
                            <tr>
                                <td style="border-bottom: 0.5px solid #1b1b1b;">Place of issue:</td>
                                <td style="border-bottom: 0.5px solid #1b1b1b;"><b></b></td>
                                <td style="border-bottom: 0.5px solid #1b1b1b;">Qualification:</td>
                                <td style="border-bottom: 0.5px solid #1b1b1b;"><b></b></td>
                                <td style="border-bottom: 0.5px solid #1b1b1b;">Profession:</td>
                                <td style="border-bottom: 0.5px solid #1b1b1b;"><b>{{ $request->profession }}</b></td>
                            </tr>
                            <tr>
                                <td colspan="2" style="border-bottom: 0.5px solid #1b1b1b;">Home address and phone number:</td>
                                <td colspan="2" style="border-bottom: 0.5px solid #1b1b1b;" class="text-center"><b >{{ $request->home_address }}</b></td>
                                <td colspan="2" style="border-bottom: 0.5px solid #1b1b1b; text-align : right;font-family: Calibri; font-size: 400;">:?????????? ???????????? ???????? ??????????????</td>
                            </tr>
                            <tr>
                                <td colspan="2" style="border-bottom: 0.5px solid #1b1b1b;">Business address and telephone no:</td>
                                <td colspan="2" style="border-bottom: 0.5px solid #1b1b1b;" class="text-center"><b>{{ $license->name }}</b></td>
                                <td colspan="2" style="border-bottom: 0.5px solid #1b1b1b; text-align : right;font-family: Calibri; font-size: 400;">:???????????? ???????????? (??????????????) ???????? ??????????????</td>
                            </tr>
                            <tr>
                                <td colspan="6" style="text-align: center;" class="text-center"><b>{{ $license->address }}</b></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <table class="print-table">
                        <tbody>
                            <tr>
                                <td style="border : 1px solid;">Purpose of travel:</td>
                                <td style="border : 1px solid; text-align : center;font-family: Calibri; ">?????? <br> Work</td>
                                <td style="border : 1px solid; text-align : center;font-family: Calibri; ">????????  <br> Transit</td>
                                <td style="border : 1px solid; text-align : center;font-family: Calibri; ">??????????  <br>  Visit</td>
                                <td style="border : 1px solid; text-align : center;font-family: Calibri; ">??????????  <br> Umrah</td>
                                <td style="border : 1px solid; text-align : center;font-family: Calibri; ">??????????????  <br> Residence</td>
                                <td style="border : 1px solid; text-align : center;font-family: Calibri; ">????????  <br> Hajj</td>
                                <td style="border : 1px solid; text-align : center;font-family: Calibri; ">??????????????????   <br>  Diplomacy</td>
                                <td style="border : 1px solid;font-family: Calibri; font-size: 400;" class="text-right">???????????? ???? ??????????:</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
    
                <div class="col-md-3"><p style="text-align : center;font-family: Calibri; font-size: 400;">:?????? ?????????????? </p></div>
                <div class="col-md-4"><p style="text-align : center;font-family: Calibri; font-size: 400;">:?????????? ?????????????? </p></div>
                <div class="col-md-4"><p style="text-align : center;font-family: Calibri; font-size: 400;">:?????? ???????????? </p></div>
            </div>
            <div style="height: 5px;"></div>
            <div class="row">
                <div class="col-md-12">
                    <table style="width : 100%">
                        <tbody>
                            <tr>
                                <td style="border-bottom: 0.5px solid #1b1b1b;">Place of issue:</td>
                                <td style="border-bottom: 0.5px solid #1b1b1b;"><b>DHAKA</b></td>
                                <td style="border-bottom: 0.5px solid #1b1b1b;">Date of issue:</td>
                                <td style="border-bottom: 0.5px solid #1b1b1b;"><b>{{ $request->passport_issued_date }}</b></td>
                                <td style="border-bottom: 0.5px solid #1b1b1b;">Date of Expiry:</td>
                                <td style="border-bottom: 0.5px solid #1b1b1b;"><b>{{ $request->passport_expiry_date }}</b></td>
                                <td style="border-bottom: 0.5px solid #1b1b1b;">Passport No:</td>
                                <td style="border-bottom: 0.5px solid #1b1b1b;"><b>{{ $request->passport_no }}</b></td>
                            </tr>
                            <tr>
                                <td colspan="4" class="text-left" style="border-bottom: 0.5px solid #1b1b1b;font-family: Calibri; font-size: 400;">: ?????? ?????????????? ????????????????</td>
                                <td colspan="4" style="text-align : center; border-bottom: 0.5px solid #1b1b1b;font-family: Calibri; font-size: 400; text-align : right;">:    ?????????? ????????????????</td>
                            </tr>
                            <tr>
                                <td colspan="2" style="border-bottom: 0.5px solid #1b1b1b;">Duration of stay in the Kingdom:</td>
                                <td colspan="2" style="border-bottom: 0.5px solid #1b1b1b;">2 Years</td>
                                <td colspan="2" style="border-bottom: 0.5px solid #1b1b1b;">Date of departure :</td>
                                <td colspan="2" style="border-bottom: 0.5px solid #1b1b1b;"><b></b></td>
                            </tr>
                            <tr>
                                <td colspan="1" style="text-align : center; border-bottom: 0.5px solid #1b1b1b;font-family: Calibri;text-align : left; ">??????????:</td>
                                <td colspan="1" style="text-align : center; border-bottom: 0.5px solid #1b1b1b;font-family: Calibri; "> ?????????? ??????( )</td>
                                <td colspan="1" style="text-align : center; border-bottom: 0.5px solid #1b1b1b;font-family: Calibri; ">  ??????????:</td>
                                <td colspan="1" style="text-align : center; border-bottom: 0.5px solid #1b1b1b;font-family: Calibri; "> ???????? ??????:( ) </td>
                                <td colspan="1" style="text-align : center; border-bottom: 0.5px solid #1b1b1b;font-family: Calibri; "> ??????????( )</td>
                                <td colspan="1" style="text-align : center; border-bottom: 0.5px solid #1b1b1b;font-family: Calibri; "> ???????????? ( )</td>
                                <td colspan="2" style="text-align : center; border-bottom: 0.5px solid #1b1b1b;font-family: Calibri;text-align : right; ">?????????? ?????????? :</td>
                            </tr>
                            <tr>
                                <td colspan="1" style="border-bottom: 0.5px solid #1b1b1b;">Mode of payment:</td>
                                <td colspan="1" style="border-bottom: 0.5px solid #1b1b1b;">( )Free</td>
                                <td colspan="1" style="border-bottom: 0.5px solid #1b1b1b;">( )Cash</td>
                                <td colspan="1" style="border-bottom: 0.5px solid #1b1b1b;">( )Cheque No.</td>
                                <td colspan="1" style="border-bottom: 0.5px solid #1b1b1b;">Date ( )</td>
                                <td colspan="1" style="border-bottom: 0.5px solid #1b1b1b;">No.</td>
                                <td colspan="2" style="border-bottom: 0.5px solid #1b1b1b;">Date: </td>
                            </tr>
                            <tr>
                                <td colspan="2" style="border-bottom: 0.5px solid #1b1b1b;">Relationship : </td>
                                <td colspan="2" style="border-bottom: 0.5px solid #1b1b1b;"><b>SPONSOR:</b></td>
                                <td colspan="3" style="border-bottom: 0.5px solid #1b1b1b;font-family: Calibri; font-size: 400;">:   ??????????</td>
                                <td colspan="1" style="border-bottom: 0.5px solid #1b1b1b;font-family: Calibri; font-size: 400;text-align : right;" class="test-right">: ?????? ????????????</td>
                            </tr>
                            <tr>
                                <td colspan="2" style="border-bottom: 0.5px solid #1b1b1b;">Destination : </td>
                                <td colspan="2" style="border-bottom: 0.5px solid #1b1b1b;font-family: Calibri; font-size: 400;">:   ?????? ???????????? ????????????????</td>
                                <td colspan="3" style="border-bottom: 0.5px solid #1b1b1b;">Carrier's name:</td>
                                <td colspan="1" style="border-bottom: 0.5px solid #1b1b1b;font-family: Calibri; font-size: 400; text-align : right;" class="test-right">: ?????? ???????????? ??????????????</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
    
            <div style="height: 10px;"></div>
    
            <div class="row">
                <div class="col-md-12">
                    <p><b>Dependents traveling in the same passport:</b></p>
                    <table style="width : 100%";>
                        <tbody>
                            <tr>
                                <td style="border: 0.5px solid #1b1b1b;font-family: Calibri;width: 20%; font-size: 400; text-align : center">?????? ?????????? <br> Relationship</td>
                                <td style="border: 0.5px solid #1b1b1b;font-family: Calibri;width: 20%; font-size: 400; text-align : center">?????????????? ?????????????????? <br> Date of birth</td>
                                <td style="border: 0.5px solid #1b1b1b;font-family: Calibri;width: 30%; font-size: 400; text-align : center">???????????????? <br> Sex</td>
                                <td style="border: 0.5px solid #1b1b1b;font-family: Calibri;width: 30%; font-size: 400; text-align : center">?????????? ???????????????????? <br> Full Name</td>
                            </tr>
                            <tr>
                                <td style="border: 0.5px solid #1b1b1b; text-align : center">Group</td>
                                <td style="border: 0.5px solid #1b1b1b;" ></td>
                                <td style="border: 0.5px solid #1b1b1b;"></td>
                                <td style="border: 0.5px solid #1b1b1b;"></td>
                            </tr>
                            <tr>
                                <td style="border: 0.5px solid #1b1b1b;" height="35"></td>
                                <td style="border: 0.5px solid #1b1b1b;" ></td>
                                <td style="border: 0.5px solid #1b1b1b;"></td>
                                <td style="border: 0.5px solid #1b1b1b;"></td>
                            </tr>
                            <tr>
                                <td style="border: 0.5px solid #1b1b1b;" height="35"></td>
                                <td style="border: 0.5px solid #1b1b1b;"></td>
                                <td style="border: 0.5px solid #1b1b1b;"></td>
                                <td style="border: 0.5px solid #1b1b1b;"></td>
                            </tr>
                            
                        </tbody>
                    </table>
                </div>
            
                    <div class="col-md-7">
                     <p style="text-align: left;"><u>Name and address of company or individual in the kingdom:</u></p>
                </div>
                <div class="col-md-5">
                    <u> <p style="text-align: right;font-family: Calibri; font-size: 400; ">:?????? ???????????? ???????????? ???? ?????? ?????????? ???????????? ????????????????     </p></u>
                </div>
          
                <div class="col-md-7">
                    <p>I the undersigned hereby certify that all the information I have provided are correct.</p>
                </div>
                <div class="col-md-5">
                    <p style="text-align : right;font-family: Calibri; font-size: 400;">?????? ???????????? ?????????? ?????? ?????? ???? ?????????????????? ???????? ?????????? ??????????.   </p>
                </div>
    
                <div class="col-md-7">
                    <p>I will abide by the laws of the Kingdom during the period of my residence in it.</p>
                </div>
                <div class="col-md-5">
                    <p style="text-align : right;font-family: Calibri; font-size: 400;">???????????? ???????????? ?????????????? ?????????????? ?????????? ???????? ?????????? ??????    </p>
                </div>
            </div>
    
            <div style="height: 10px;"></div>
    
            <div class="row">
                <div class="col-md-2"><p><b>Date : </b></p></div>
                <div class="col-md-1"><p style="font-family: Calibri; font-size: 400;">:??????????????</p></div>
                <div class="col-md-2"><b>Signature:</b></div>
                <div class="col-md-2" style="font-family: Calibri; font-size: 400;">:??????????????</div>
                <div class="col-md-1"><p><b>Name:</b></p></div>
                <div class="col-md-3"><p><b>{{ $request->name }}</b></p></div>
                <div class="col-md-1" style="text-align : right;font-family: Calibri; font-size: 400;">:??????????</div>
            </div>
    
            <div class="row">
                <div class="col-md-6">
                    <p class="text-left" style="text-decoration: underline;"><b>For official use only</b></p>
                </div>
    
                <div class="col-md-6">
                    <p style="text-align : right; text-decoration: underline;font-family: Calibri; font-size: 400;">: ?????????????????? ???????????? ?????? </p>
                </div>
            </div>
    
            <div class="row">
                <div class="col-md-12">
                    <table style="width : 100%">
                        <tbody>
                            <tr>
                                <td style="border-bottom : 0.5px solid #1b1b1b;">Date:</td>
                                <td style="border-bottom : 0.5px solid #1b1b1b;"><b>{{ $request->visa_issue_date }}</b></td>
                                <td style="border-bottom : 0.5px solid #1b1b1b;font-family: Calibri; font-size: 400;">:????????????:</td>
                                <td style="border-bottom : 0.5px solid #1b1b1b;">Authorization:</td>
                                <td style="border-bottom : 0.5px solid #1b1b1b;"><b>{{ $request->visa_no }}</b></td>
                                <td style="border-bottom : 0.5px solid #1b1b1b;font-family: Calibri; font-size: 400;text-align : right;">:?????? ?????????? ?????????????? ???????? ???? ?????????? ???????????????? </td>
                            </tr>
                            <tr>
                                <td style="border-bottom : 0.5px solid #1b1b1b;" colspan="2">Visit / Work for:</td>
                                <!-- ?????????? ?????? ???????? ??????????????    -->
                                <td style="border-bottom : 0.5px solid #1b1b1b; text-align : center;font-family: Calibri; font-size: 400;" colspan="3"><b> {{ $request->sponsor_name }}</b></td>
                                <td style="border-bottom : 0.5px solid #1b1b1b; text-align : right;font-family: Calibri; font-size: 400;" colspan="1">:???????????? </td>
                            </tr>
                            <tr>
                                <td style="border-bottom : 0.5px solid #1b1b1b;">Date :</td>
                                <td style="border-bottom : 0.5px solid #1b1b1b;"><b></b></td>
                                <td style="border-bottom : 0.5px solid #1b1b1b;font-family: Calibri; font-size: 400;">:????????????:</td>
                                <td style="border-bottom : 0.5px solid #1b1b1b;" colspan="2">Visa No:</td>
                                <!-- <td style="border-bottom : 0.5px solid #1b1b1b;" style="text-align : center;"><b></b></td> -->
                                <td style="border-bottom : 0.5px solid #1b1b1b; text-align : right;font-family: Calibri; font-size: 400;">:?????? ???? ???????? :</td>
                            </tr>
                            <tr>
                                <td style="border-bottom : 0.5px solid #1b1b1b;">Fee collected:</td>
                                <td style="border-bottom : 0.5px solid #1b1b1b; text-align : center;font-family: Calibri; font-size: 400;">:???????????? ???????????? </td>
                                <td style="border-bottom : 0.5px solid #1b1b1b;">Type:</td>
                                <td style="border-bottom : 0.5px solid #1b1b1b; text-align : center;font-family: Calibri; font-size: 400;">:?????????? </td>
                                <td style="border-bottom : 0.5px solid #1b1b1b;"><b>Duration:</b></td>
                                <td style="border-bottom : 0.5px solid #1b1b1b; text-align : right;font-family: Calibri; font-size: 400;">:???????????? </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-6">
                    <p class="text-left" style="font-family: Calibri; font-size: 400;">?? ?????? ?????????? ??????????????</p>
                    <p class="text-left">Head of consular section :</p>
                </div>
                <div class="col-md-6">
                    <p class="text-right" style="font-family: Calibri; font-size: 400;">???????? ????????????????    </p>
                    <p class="text-right">Checked By :</p>
                </div>
                <br><br>
                <div class="col-md-12">
                    <center>
                        <span>{!! DNS1D::getBarcodeSVG($request->passport_no, "C128")!!}</span><br>
                        <span>{{ $request->passport_no }}</span>
                    </center>
                </div>
            </div>
        
        </div>

        <!-- <p style="text-align : center;">End of second page</p> -->
        <div class="pagebreak"> </div>

        <div style="height: 0in;"></div>
        <!-- 3rd page -->
        <div class="third_page" style="font-size: 25px; padding: 40px;">
            <h2 style="text-align: center; text-decoration: underline;">EMPLOYMENT AGREEMENT</h2>

            <br><br>

            <div class="row">

                <div class="col-md-6">
                    <p>NAME OF COMPANY :</p>
                </div>
                <div class="col-md-6">
                <!-- ?????????? ?????? ???????? ??????????????          -->
                    <p style="font-family: Calibri; font-size: 400;"><b>{{ $request->sponsor_name }}</b></p>
                </div>
                <div class="col-md-6">
                    <p>HERRE BY APPOINTED :</p>
                </div>
                <div class="col-md-6">
                    <p><b>{{ $request->name }}</b></p>
                </div>
                <div class="col-md-6">
                    <p>HOLDER OF BANGLADESH PASSPORT NO:</p>
                </div>
                <div class="col-md-4">
                    <p><b>{{ $request->passport_no }}</b></p>
                </div>
                <div class="col-md-2">
                    <p>KSA</p>
                </div>

                <br><br>

                <div class="col-md-6">
                    <p style="font-family: Calibri; font-size: 400;"><b>{{ $request->profession }}</b></p>
                </div>
                
            </div>

            <br>

            <div class="row">
                <div class="col-md-12">
                    <p style="text-decoration: underline;"><b>UNDER THE FOLLOWING TERMS AND CONDITIONS:</b></p>
                    <table class="print-table">
                        <tbody>
                            <tr style="height: 50px;">
                                <td>01. </td>
                                <td style="width : 50%">MONTHLY SALARY</td>
                                <td>:</td>
                                <td>{{ $request->monthly_salary }}</td>
                            </tr>
                            <tr style="height: 50px;">
                                <td>02. </td>
                                <td style="width : 50%">FOOD AND ACCOMMODATION</td>
                                <td>:</td>
                                <td>{{ $request->food_acco }}</td>
                            </tr>
                            <tr style="height: 50px;">
                                <td>03. </td>
                                <td style="width : 50%">AIR PASSAGE</td>
                                <td>:</td>
                                <td>{{ $request->air_passage }}</td>
                            </tr>
                            <tr style="height: 50px;">
                                <td>04. </td>
                                <td style="width : 50%">DUTY HOUR</td>
                                <td>:</td>
                                <td>{{ $request->duty_hour }}</td>
                            </tr>
                            <tr style="height: 50px;">
                                <td>05. </td>
                                <td style="width : 50%">HOLIDAY</td>
                                <td>:</td>
                                <td>{{ $request->duty_hour }}</td>
                            </tr>
                            <tr style="height: 50px;">
                                <td>06. </td>
                                <td style="width : 50%">LEAVE</td>
                                <td>:</td>
                                <td>{{ $request->leave }}</td>
                            </tr>
                            <tr style="height: 50px;">
                                <td>07. </td>
                                <td style="width : 50%">OVERTIME & OTHER BENEFIT</td>
                                <td>:</td>
                                <td>{{ $request->overtime_benifit }}</td>
                            </tr>
                            <tr style="height: 50px;">
                                <td>08. </td>
                                <td style="width : 50%">MEDICAL FACILITES</td>
                                <td>:</td>
                                <td>{{ $request->medical_fecilities }}</td>
                            </tr>
                            <tr style="height: 50px;">
                                <td>09. </td>
                                <td style="width : 50%">PERIOD OF CONTRACT</td>
                                <td>:</td>
                                <td>{{ $request->period_contact }}</td>
                            </tr>
                            <tr style="height: 50px;">
                                <td valign="top">10. </td>
                                <td style="width : 50%">REPATRIATION ARRANGEMENT INCLUDING RETURN OF DEAD BODY & SERVICE BENEFIT TO THE LEGAL HEIR OF THE EMPLOYEE</td>
                                <td valign="top">:</td>
                                <td valign="top">{{ $request->repatriation_arrang }}</td>
                            </tr>
                            <tr style="height: 50px;">
                                <td valign="top">11. </td>
                                <td>OTHER TERMS & CONDITIONS NOT COVERED BY THIS AGREEMENT</td>
                                <td valign="top">:</td>
                                <td valign="top">{{ $request->other_team_condition }}</td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
            <br> <br> <br> <br> <br>
            <br> <br> <br>
            <div class="row">
                <div class="col-md-6"><p style="text-align : left">SIGNATURE OF FIRST PARTY</p></div>
                <div class="col-md-6"><p style="text-align : right">SIGNATURE OF SECOND PARTY</p></div>
            </div>
        </div>
    </div>
</body>
</html>
