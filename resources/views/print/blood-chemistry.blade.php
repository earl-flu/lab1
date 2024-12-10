<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blood Chemistry Result - {{ $bloodChemistry->first_name }}</title>
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

    .text-sm {
        font-size: 11px;
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
                            @if (is_object($bloodChemistry) && isset($bloodChemistry->date_of_report))
                                {{ date('m/d/Y', strtotime($bloodChemistry->date_of_report)) }}
                            @else
                                N/A
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>Time of Report</td>
                        <td>:</td>
                        <td>{{ date('g:iA', strtotime($bloodChemistry->date_of_report)) }}</td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="patient-info">
            <div
                style="display: flex; justify-content: space-between; margin-top: 15px; padding:3px; border:1px solid black;">
                <div>Name: <span class="bold uppercase">{{ $bloodChemistry->last_name }},
                        {{ $bloodChemistry->first_name }}
                        {{ $bloodChemistry->middle_name }}</span></div>
                <div>Age: <span class="bold uppercase">{{ $bloodChemistry->age }} y/o</span></div>
                <div>Sex: <span class="bold uppercase">{{ $bloodChemistry->sex }}</span></div>
            </div>
            <div
                style="display: flex; justify-content: space-between; padding:3px; border:1px solid black; border-top:none;">
                <div>Requesting Physician: <span
                        class="bold uppercase">{{ $bloodChemistry->requesting_physician }}</span>
                </div>
            </div>
            <div
                style="display: flex; justify-content: space-between; padding:3px; border:1px solid black; border-top:none;">
                <div>Ward: <span class="bold uppercase">{{ $bloodChemistry->ward }}</span></div>
            </div>
        </div>

        <p class="bold uppercase" style="margin-top: 15px; text-align: center; font-size:14px;">BLOOD CHEMISTRY</p>
        <p style="text-align: center;">BA 200 BIOSYSTEMS</p>

        <table class="result-table">
            <tr>
                <th></th>
                <th>Results</th>
                <th>Normal Values</th>
                <th></th>
                <th>Results</th>
                <th>Normal Values</th>
            </tr>
            <tr>
                <td>FBS</td>
                <td class="bold">{{ $bloodChemistry->fbs }}</td>
                <td class="text-gray text-sm">3.30-5.60 mmol/L</td>
                <td>Triglyceride</td>
                <td class="bold">{{ $bloodChemistry->triglyceride }}</td>
                <td class="text-gray text-sm">0.0-1.70 mmol/L</td>
            </tr>
            <tr>
                <td>SGOT (AST)</td>
                <td class="bold">{{ $bloodChemistry->sgot }}</td>
                <td class="text-gray text-sm">0-40.0 u/L</td>
                <td>HDL Cholesterol</td>
                <td class="bold">{{ $bloodChemistry->hdl_cholesterol }}</td>
                <td class="text-gray text-sm">0.93-1.56 mmol/L</td>
            </tr>
            <tr>
                <td>SGPT (ALT)</td>
                <td class="bold">{{ $bloodChemistry->sgpt }}</td>
                <td class="text-gray text-sm">0-41 u/L</td>
                <td>LDL Cholesterol</td>
                <td class="bold">{{ $bloodChemistry->ldl_cholesterol }}</td>
                <td class="text-gray text-sm">
                    < 2.6 mmol/L</td>
            </tr>
            <tr>
                <td>Creatinine</td>
                <td class="bold">{{ $bloodChemistry->creatinine }}</td>
                <td class="text-gray text-sm">53-115.0 umol/L</td>
                <td>VLDL Cholesterol</td>
                <td class="bold">{{ $bloodChemistry->vldl_cholesterol }}</td>
                <td class="text-gray text-sm">mmol/L</td>
            </tr>
            <tr>
                <td>BUN/Urea</td>
                <td class="bold">{{ $bloodChemistry->bun_urea }}</td>
                <td class="text-gray text-sm">2.14-7.4 mmol/L</td>
                <td>HbA1c</td>
                <td class="bold">{{ $bloodChemistry->hba1c }}</td>
                <td class="text-gray text-sm">4.0-6.0%</td>
            </tr>
            <tr>
                <td>Uric Acid</td>
                <td class="bold">{{ $bloodChemistry->uric_acid }}</td>
                <td class="text-gray text-sm">150-420 umol/L</td>
                <td style="text-align:center;" class="bold" colspan="3" rowspan="3">SERUM ELECTROLYTES <br>
                    CBS-50</td>
            </tr>
            <tr>
                <td>Total Bilirubin</td>
                <td class="bold">{{ $bloodChemistry->total_bilirubin }}</td>
                <td class="text-gray text-sm">0.0-34.0 umol/L</td>
            </tr>
            <tr>
                <td>Direct Bilirubin</td>
                <td class="bold">{{ $bloodChemistry->direct_bilirubin }}</td>
                <td class="text-gray text-sm">0.0-6.8 umol/L</td>
            </tr>
            <tr>
                <td>Indirect Bilirubin</td>
                <td class="bold">{{ $bloodChemistry->indirect_bilirubin }}</td>
                <td class="text-gray text-sm">umol/L</td>
                <td>Sodium (Na+)</td>
                <td class="bold">{{ $bloodChemistry->sodium }}</td>
                <td class="text-gray text-sm">136.9-145 mmol/L</td>
            </tr>
            <tr>
                <td>Total Protein</td>
                <td class="bold">{{ $bloodChemistry->total_protein }}</td>
                <td class="text-gray text-sm">60.0-83.0 g/dL</td>
                <td>Potassium (K+)</td>
                <td class="bold">{{ $bloodChemistry->potassium }}</td>
                <td class="text-gray text-sm">3.5-5.5 mmol/L</td>
            </tr>
            <tr>
                <td>Albumin</td>
                <td class="bold">{{ $bloodChemistry->albumin }}</td>
                <td class="text-gray text-sm">35.0-50.0 g/L</td>
                <td>Chloride (Cl-)</td>
                <td class="bold">{{ $bloodChemistry->chloride }}</td>
                <td class="text-gray text-sm">96-108 mmol/L</td>
            </tr>
            <tr>
                <td>Globulin</td>
                <td class="bold">{{ $bloodChemistry->globulin }}</td>
                <td class="text-gray text-sm">g/L</td>
                <td>Ionized Calcium (iCa)</td>
                <td class="bold">{{ $bloodChemistry->ionized_calcium }}</td>
                <td class="text-gray text-sm">1.04-1.35 mmol/L</td>
            </tr>
            <tr>
                <td>A/G Ratio</td>
                <td class="bold">{{ $bloodChemistry->ag_ratio }}</td>
                <td class="text-gray text-sm">g/L</td>
                <td>Non-Ionized Calcium (nCa)</td>
                <td class="bold">{{ $bloodChemistry->nonionized_calcium }}</td>
                <td class="text-gray text-sm">1.04-1.35 mmol/L</td>
            </tr>
            <tr>
                <td>Cholesterol</td>
                <td class="bold">{{ $bloodChemistry->cholesterol }}</td>
                <td class="text-gray text-sm">0.00-5.20 mmol/L</td>
                <td>Total Calcium</td>
                <td class="bold">{{ $bloodChemistry->total_calcium }}</td>
                <td class="text-gray text-sm">2.08-2.70 mmol/L</td>
            </tr>
        </table>

        <div style="display: flex; justify-content: space-evenly; margin-top: 50px;">
            <div style="font-size: 12px; text-align: center;">
                <p style="font-weight: bold; text-transform: uppercase; text-decoration: underline;">
                    {{ $bloodChemistry->medicalTechnologist->name }}</p>
                <p>Medical Technologist</p>
                <p>License No. {{ $bloodChemistry->medicalTechnologist->license_number }}</p>
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
