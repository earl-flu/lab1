<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Stool Examination Result - {{ $stoolExamination->first_name }}</title>
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
                <img class="ebmc-logo" src="{{ asset('/storage/' . $setting->hospital_logo) }}"
                    alt="Eastern Bicol Medical Center Logo">
            </div>
            <div class="ebmc-details">
                <p class="uppercase bold">{{ $setting->hospital_name }}</p>
                <p>{{ $setting->hospital_address }}</p>
                <p class="bold">{{ $setting->hospital_tagline }}</p>
                <p class="email">{{ $setting->hospital_email }}</p>
            </div>
        </div>

        <hr style="margin-top: 10px;">
        <p style="text-align: center; font-weight: bold; margin-top:10px; font-size:14px;">STOOL EXAMINATION RESULTS</p>
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
                            @if (is_object($stoolExamination) && isset($stoolExamination->date_of_report))
                                {{ date('m/d/Y', strtotime($stoolExamination->date_of_report)) }}
                            @else
                                N/A
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>Time of Report</td>
                        <td>:</td>
                        <td>{{ date('g:iA', strtotime($stoolExamination->date_of_report)) }}</td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="patient-info">
            <div
                style="display: flex; justify-content: space-between; margin-top: 15px; padding:3px; border:1px solid black;">
                <div>Name: <span class="bold uppercase">{{ $stoolExamination->last_name }},
                        {{ $stoolExamination->first_name }}
                        {{ $stoolExamination->middle_name }}</span></div>
                <div>Age: <span class="bold uppercase">{{ $stoolExamination->age }} y/o</span></div>
                <div>Sex: <span class="bold uppercase">{{ $stoolExamination->sex }}</span></div>
            </div>
            <div
                style="display: flex; justify-content: space-between; padding:3px; border:1px solid black; border-top:none;">
                <div>Requesting Physician: <span
                        class="bold uppercase">{{ $stoolExamination->requesting_physician }}</span>
                </div>
            </div>
            <div
                style="display: flex; justify-content: space-between; padding:3px; border:1px solid black; border-top:none;">
                <div>Ward: <span class="bold uppercase">{{ $stoolExamination->ward }}</span></div>
            </div>
        </div>

        <table class="result-table">
            <tr>
                <th colspan="4">MACROSCOPIC</th>
            </tr>
            <tr>
                <td width="25%">Color</td>
                <td width="25%" class="bold">{{ $stoolExamination->color }}</td>
                <td width="25%">Occult Blood</td>
                <td width="25%" class="bold">{{ $stoolExamination->occult_blood }}</td>
            </tr>
            <tr>
                <td>Consistency</td>
                <td class="bold">{{ $stoolExamination->consistency }}</td>
                <td></td>
                <td class="bold"></td>
            </tr>
            {{--  --}}
            <tr>
                <th colspan="4">MICROSCOPIC</th>
            </tr>
            <tr>
                <td width="25%">Red Cells</td>
                <td width="25%" class="bold">{{ $stoolExamination->red_cells }}</td>
                <td width="25%"><span class="bold" style="color:#515151;">Gardia lambia</span> (a) Cyst</td>
                <td width="25%" class="bold">{{ $stoolExamination->g_lambia_a_cyst }}</td>
            </tr>
            <tr>
                <td>Pus Cells</td>
                <td class="bold">{{ $stoolExamination->pus_cells }}</td>
                <td>(b) Trophozoite</td>
                <td class="bold">{{ $stoolExamination->g_lambia_b_trophozoite }}</td>
            </tr>
            <tr>
                <td>Macrophages</td>
                <td class="bold">{{ $stoolExamination->macrophages }}</td>
                <td><span class="bold" style="color:#515151;">Entamoeba histolyca</span> (a) Cyst</td>
                <td class="bold">{{ $stoolExamination->e_histolyca_a_cyst }}</td>
            </tr>
            <tr>
                <td>Trichuris trichiura</td>
                <td class="bold">{{ $stoolExamination->trichuris_ova }}</td>
                <td>(b) Trophozoite</td>
                <td class="bold">{{ $stoolExamination->e_histolyca_b_trophozoite }}</td>
            </tr>
            <tr>
                <td>Ascaris lumbricoides</td>
                <td class="bold">{{ $stoolExamination->ascaris_ova }}</td>
                <td>Bacteria</td>
                <td class="bold">{{ $stoolExamination->bacteria }}</td>
            </tr>
            <tr>
                <td>Hookworm</td>
                <td class="bold">{{ $stoolExamination->hookworm }}</td>
                <td colspan="2" rowspan="3">Others: {{ $stoolExamination->others }}</td>
            </tr>
            <tr>
                <td style="height: 25px;">Trichomonos hominis</td>
                <td class="bold">{{ $stoolExamination->t_hominis }}</td>
            </tr>
            <tr style="height:25px;">
                <td></td>
                <td></td>
            </tr>

        </table>
        <div style="display: flex; justify-content: space-evenly; margin-top: 50px; gap:10px;">
            <div style="font-size: 12px; text-align: center;">
                <p style="font-weight: bold; text-transform: uppercase; text-decoration: underline;">
                    {{ $stoolExamination->medicalTechnologist->name }}</p>
                <p>Medical Technologist</p>
                <p>License No. {{ $stoolExamination->medicalTechnologist->license_number }}</p>
            </div>
            <div style="font-size: 12px; text-align: center; position:relative;">
                <img style="{{ $setting->esig_style }}"
                    src="{{ asset('/storage/' . $setting->pathologist_esignature) }}" alt="Signature">
                <p style="text-decoration:underline; font-weight:600;">
                    {{ $setting->pathologist_name }}</p>
                <p style="position: relative; z-index: 10;">Pathologist</p>
                <p style="position: relative; z-index: 10;">License No. {{ $setting->pathologist_license_number }}</p>
            </div>
        </div>
    </div>
</body>

</html>
