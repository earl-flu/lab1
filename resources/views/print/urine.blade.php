<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Urine Examination Result - {{ $urine->first_name }}</title>
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
        <p style="text-align: center; font-weight: bold; margin-top:10px; font-size:14px;">URINE EXAMINATION RESULTS</p>
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
                            @if (is_object($urine) && isset($urine->date_of_report))
                                {{ date('m/d/Y', strtotime($urine->date_of_report)) }}
                            @else
                                N/A
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>Time of Report</td>
                        <td>:</td>
                        <td>{{ date('g:iA', strtotime($urine->date_of_report)) }}</td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="patient-info">
            <div
                style="display: flex; justify-content: space-between; margin-top: 15px; padding:3px; border:1px solid black;">
                <div>Name: <span class="bold uppercase">{{ $urine->last_name }}, {{ $urine->first_name }}
                        {{ $urine->middle_name }}</span></div>
                <div>Age: <span class="bold uppercase">{{ $urine->age }} y/o</span></div>
                <div>Sex: <span class="bold uppercase">{{ $urine->sex }}</span></div>
            </div>
            <div
                style="display: flex; justify-content: space-between; padding:3px; border:1px solid black; border-top:none;">
                <div>Requesting Physician: <span class="bold uppercase">{{ $urine->requesting_physician }}</span>
                </div>
            </div>
            <div
                style="display: flex; justify-content: space-between; padding:3px; border:1px solid black; border-top:none;">
                <div>Ward: <span class="bold uppercase">{{ $urine->ward }}</span></div>
            </div>
        </div>

        <table class="result-table">
            <tr>
                <th colspan="2">Macroscopic</th>
                <th colspan="2">Microscopic</th>
            </tr>
            <tr>
                <td width="25%">Color</td>
                <td width="25%" class="bold">{{ $urine->macro_color }}</td>
                <td width="25%">Epithelial Cells</td>
                <td width="25%" class="bold">{{ $urine->micro_epithelial_cells }}</td>
            </tr>
            <tr>
                <td>Transparency</td>
                <td class="bold">{{ $urine->macro_transparency }}</td>
                <td>Red Cells</td>
                <td class="bold">{{ $urine->micro_red_cells }}</td>
            </tr>
            <tr>
                <td>Sp. Gravity</td>
                <td class="bold">{{ $urine->macro_sp_gravity }}</td>
                <td>Pus Cells</td>
                <td class="bold">{{ $urine->micro_pus_cells }}</td>
            </tr>
            <tr>
                <td>Reaction (pH)</td>
                <td class="bold">{{ $urine->macro_reaction_ph }}</td>
                <td>Bacteria</td>
                <td class="bold">{{ $urine->micro_bacteria }}</td>
            </tr>
            <tr>
                <td>Albumin</td>
                <td class="bold">{{ $urine->macro_albumin }}</td>
                <td>Casts</td>
                <td class="bold">{{ $urine->micro_casts }}</td>
            </tr>
            <tr>
                <td>Sugar</td>
                <td class="bold">{{ $urine->macro_sugar }}</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td style="height: 25px;"></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Others</td>
                <td colspan="3" class="bold">{{ $urine->others }}</td>
            </tr>
        </table>

        <table class="result-table">
            <tr class="bold">
                <td style="font-size: 11px;">EXAMINATION</td>
                <td style="font-size: 11px;">RESULT</td>
                <td style="font-size: 11px;">BRAND NAME</td>
                <td style="font-size: 11px;">LOT NO.</td>
                <td style="font-size: 11px;">EXPIRY DATE</td>
            </tr>
            <tr>
                <td style="font-size: 11px;" class="bold">Pregnancy Test</td>
                <td style="font-size: 11px;">{{ $urine->pt_result }}</td>
                <td style="font-size: 11px;">{{ $urine->pt_brand_name }}</td>
                <td style="font-size: 11px;">{{ $urine->pt_lot_no }}</td>
                <td style="font-size: 11px;">{{ $urine->pt_expiry_date }}</td>
            </tr>
        </table>

        <div style="display: flex; justify-content: space-evenly; margin-top: 50px;">
            <div style="font-size: 12px; text-align: center;">
                <p style="font-weight: bold; text-transform: uppercase; text-decoration: underline;">
                    {{ $urine->medicalTechnologist->name }}</p>
                <p>Medical Technologist</p>
                <p>License No. {{ $urine->medicalTechnologist->license_number }}</p>
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
