<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hematology Result - {{ $hematology->first_name }}</title>
</head>

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-size: 12px;
    }

    .container {
        padding: 10px;
        width: 580px;
        font-family: Arial, Helvetica, sans-serif;
    }

    .bold {
        font-weight: bold;
    }

    .uppercase {
        text-transform: uppercase;
    }

    .text-right {
        text-align: right;
    }

    .ebmc-logo {
        width: 80px;
        height: 80px;
    }

    .logo-div {
        display: flex;
        gap: 10px;
        align-items: center;
    }

    .email {
        font-style: italic;
        color: blue;
        font-size: 12px;
        margin-top: 2px;
    }

    .ebmc-details p {
        margin-bottom: 2px;
    }

    .patient-id {
        font-size: 12px;
    }

    .datereport-div {
        display: flex;
        justify-content: space-between;
    }

    .result-table {
        width: 100%;
        border-collapse: collapse;
        font-size: 14px;
        margin-top: 20px;
    }

    .result-table th {
        border: 1px solid black;
        padding: 4px;
    }

    .result-table td {
        border: 1px solid black;
        padding: 4px;
    }

    .text-gray {
        color: gray;
    }
</style>

<body>
    <div class="container">
        <div class="logo-div">
            <div>
                <img class="ebmc-logo" src="{{ asset('/images/EBMC.jpg') }}" alt="Eastern Bicol Medical Center Logo">
            </div>
            <div class="ebmc-details">
                <p class="uppercase bold">Eastern Bicol Medical Center</p>
                <p>Virac, Catanduanes</p>
                <p class="bold">"PHIC Accredited Health Care Provider"</p>
                <p class="email">ebmc@yahoo.com</p>
            </div>
        </div>

        <hr style="margin-top: 10px;">
        <p style="text-align: center; font-weight: bold; margin-top:10px; font-size:14px;">LABORATORY RESULTS</p>
        <div class="datereport-div">
            <div>
                <p class="patient-id"><!--ID SHOULD BE HERE --></p>
            </div>
            <div>
                <table>
                    <tr>
                        <td>Date of Report</td>
                        <td>:</td>
                        <td>
                            @if (is_object($hematology) && isset($hematology->date_of_report))
                                {{ date('m/d/Y', strtotime($hematology->date_of_report)) }}
                            @else
                                N/A
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>Time of Report</td>
                        <td>:</td>
                        <td>{{ date('g:iA', strtotime($hematology->date_of_report)) }}</td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="patient-info">
            <div
                style="display: flex; justify-content: space-between; margin-top: 15px; padding:3px; border:1px solid black;">
                <div>Name: <span class="bold uppercase">{{ $hematology->last_name }}, {{ $hematology->first_name }}
                        {{ $hematology->middle_name }}</span></div>
                <div>Age: <span class="bold uppercase">{{ $hematology->age }} y/o</span></div>
                <div>Sex: <span class="bold uppercase">{{ $hematology->sex }}</span></div>
                <div>C.S. <span class="bold uppercase"
                        style="min-width: 25px; display:inline-block;">{{ $hematology->cs }}</span></div>
            </div>
            <div
                style="display: flex; justify-content: space-between; padding:3px; border:1px solid black; border-top:none;">
                <div>Requesting Physician: <span class="bold uppercase">{{ $hematology->requesting_physician }}</span>
                </div>
                <div></div>
            </div>
            <div
                style="display: flex; justify-content: space-between; padding:3px; border:1px solid black; border-top:none;">
                <div>Clinical Diagnosis: <span class="bold uppercase">{{ $hematology->clinical_diagnosis }}</span>
                </div>
                <div>Ward: <span class="bold uppercase">{{ $hematology->ward }}</span></div>
                <div>Bed No. <span class="bold uppercase"
                        style="min-width: 25px; display:inline-block;">{{ $hematology->bed_no }}</span></div>
            </div>
        </div>

        <p class="bold uppercase" style="margin-top: 15px; text-align: center; font-size:14px;">Hematology</p>
        <p style="text-align: center;">MINDRAY BC-5150 (Fully Automatic Hematology Analyzer)</p>

        <table class="result-table">
            <tr>
                <th></th>
                <th>SI Result</th>
                <th>SI Value</th>
                <th></th>
                <th>SI Result</th>
                <th>SI Value</th>
            </tr>
            <tr>
                <td>Hematocrit</td>
                <td>{{ $hematology->hematocrit_m }}</td>
                <td class="text-right text-gray">M = 0.40-0.54</td>
                <td>Eusinophils</td>
                <td>{{ $hematology->eusinophils }}</td>
                <td class="text-right text-gray">0.02-0.04</td>
            </tr>
            <tr>
                <td></td>
                <td>{{ $hematology->hematocrit_f }}</td>
                <td class="text-right text-gray">F = 0.37-0.47</td>
                <td>Basophils</td>
                <td>{{ $hematology->basophils }}</td>
                <td class="text-right text-gray">0.00-0.01</td>
            </tr>
            <tr>
                <td>Hemoglobin</td>
                <td>{{ $hematology->hemoglobin_m }}</td>
                <td class="text-right text-gray">M = 140-160 g/L</td>
                <td>ESR</td>
                <td>{{ $hematology->esr_m }}</td>
                <td class="text-right text-gray">M = 0-10 mm/hr</td>
            </tr>
            <tr>
                <td></td>
                <td>{{ $hematology->hemoglobin_f }}</td>
                <td class="text-right text-gray">F = 120-140 g/L</td>
                <td></td>
                <td>{{ $hematology->esr_f }}</td>
                <td class="text-right text-gray">F = 0-20 mm/hr</td>
            </tr>
            <tr>
                <td>RBC Count</td>
                <td>{{ $hematology->rbc_count }}</td>
                <td class="text-right text-gray">4.0-4.2×10¹²/L</td>
                <td>Platelet Count</td>
                <td>{{ $hematology->platelet_count }}</td>
                <td class="text-right text-gray">150-350×10⁹/L</td>
            </tr>
            <tr>
                <td>WBC Count</td>
                <td>{{ $hematology->wbc_count }}</td>
                <td class="text-right text-gray">5-10×10⁹/L</td>
                <td>Bleeding Time</td>
                <td>{{ $hematology->bleeding_time }}</td>
                <td class="text-right text-gray">2-2.30 minutes</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td class="text-right text-gray"></td>
                <td>Clotting Time</td>
                <td>{{ $hematology->clotting_time }}</td>
                <td class="text-right text-gray">2-4 minutes</td>
            </tr>
            <tr>
                <td>Differential Count</td>
                <td>{{ $hematology->differential_count }}</td>
                <td class="text-right text-gray"></td>
                <td>CRT</td>
                <td>{{ $hematology->crt }}</td>
                <td class="text-right text-gray">14-45 minutes</td>
            </tr>
            <tr>
                <td>Neutrophils</td>
                <td></td>
                <td class="text-right text-gray"></td>
                <td>MCV</td>
                <td>{{ $hematology->mcv }}</td>
                <td class="text-right text-gray">77.5-85.5</td>
            </tr>
            <tr>
                <td class="text-right">Segmenters</td>
                <td>{{ $hematology->segmenters }}</td>
                <td class="text-right text-gray">0.58-0.66</td>
                <td>MCH</td>
                <td>{{ $hematology->mch }}</td>
                <td class="text-right text-gray">26.5-31.3</td>
            </tr>
            <tr>
                <td class="text-right">Stabs</td>
                <td>{{ $hematology->stabs }}</td>
                <td class="text-right text-gray">0.03-0.05</td>
                <td>MCHC</td>
                <td>{{ $hematology->mchc }}</td>
                <td class="text-right text-gray">26.5-31.3</td>
            </tr>
            <tr>
                <td class="text-right">Juveniles</td>
                <td>{{ $hematology->juveniles }}</td>
                <td class="text-right text-gray">0.00-0.02</td>
                <td>Blood Type</td>
                <td>{{ $hematology->blood_type }}</td>
                <td class="text-right text-gray"></td>
            </tr>
            <tr>
                <td class="text-right">Myclocytes</td>
                <td>{{ $hematology->myclocytes }}</td>
                <td class="text-right text-gray">0.00-0.01</td>
                <td>Others:</td>
                <td>{{ $hematology->others }}</td>
                <td class="text-right text-gray"></td>
            </tr>
            <tr>
                <td>Lymphocytes</td>
                <td>{{ $hematology->lymphocytes }}</td>
                <td class="text-right text-gray">0.21-0.3</td>
                <td></td>
                <td></td>
                <td class="text-right text-gray"></td>
            </tr>
            <tr>
                <td>Monocytes</td>
                <td>{{ $hematology->monocytes }}</td>
                <td class="text-right text-gray">0.04-0.06</td>
                <td></td>
                <td></td>
                <td class="text-right text-gray"></td>
            </tr>
        </table>

        <div style="display: flex; justify-content: space-evenly; margin-top: 50px;">
            <div style="font-size: 12px; text-align: center;">
                <p style="font-weight: bold; text-transform: uppercase; text-decoration: underline;">
                    {{ $hematology->medicalTechnologist->name }}</p>
                <p>Medical Technologist</p>
                <p>License No. {{ $hematology->medicalTechnologist->license_number }}</p>
            </div>
            <div style="font-size: 12px; text-align: center;">
                <img style="width: 250px; margin-top: -29px; transform: rotate(-1deg);"
                    src="{{ asset('/images/signature.png') }}" alt="Signature">
                <p style="margin-top: -17px; position: relative; z-index: 10;">License No. 0078995</p>
            </div>
        </div>
    </div>
</body>

</html>
