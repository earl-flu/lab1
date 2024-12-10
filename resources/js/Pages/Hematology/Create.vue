<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, useForm } from "@inertiajs/vue3";
import { useToast } from "vue-toastification";
import { ref } from "vue";

const currentDateTime = ref(
  new Date()
    .toLocaleString("sv-SE", { timeZone: "Asia/Manila" })
    .replace(" ", "T")
);

const props = defineProps({
  medicalTechnologists: Array,
});

const form = useForm({
  date_of_report: currentDateTime.value,
  first_name: "",
  last_name: "",
  middle_name: "",
  age: "",
  sex: "",
  cs: "",
  requesting_physician: "",
  clinical_diagnosis: "",
  ward: "",
  bed_no: "",
  hematocrit_m: "",
  hematocrit_f: "",
  hemoglobin_m: "",
  hemoglobin_f: "",
  rbc_count: "",
  wbc_count: "",
  differential_count: "",
  neutrophils: "",
  segmenters: "",
  stabs: "",
  juveniles: "",
  myclocytes: "",
  lymphocytes: "",
  monocytes: "",
  eusinophils: "",
  basophils: "",
  esr_m: "",
  esr_f: "",
  platelet_count: "",
  bleeding_time: "",
  clotting_time: "",
  crt: "",
  mcv: "",
  mch: "",
  mchc: "",
  blood_type: "",
  others: "",
  medical_technologist_id: "",
});

const submit = () => {
  form.post(route("hematologies.store"), {
    onSuccess: () => {
      const toast = useToast();
      toast.success("Hematology record created successfully", {
        timeout: 3000,
      });
    },
  });
};
</script>

<template>
  <Head title="Create Hematology" />

  <AuthenticatedLayout>
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
      <div class="breadcrumb-title pe-3">Hematology</div>
      <div class="ps-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0 p-0">
            <li class="breadcrumb-item">
              <a href="javascript:;"><i class="bx bx-home-alt"></i></a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Add</li>
          </ol>
        </nav>
      </div>
    </div>
    <!--end breadcrumb-->

    <div class="row">
      <div class="col-8">
        <div class="card">
          <div class="card-body p-4">
            <h5 class="mb-16">Add Hematology Result</h5>
            <form class="row g-3" @submit.prevent="submit">
              <div class="row mb-3">
                <label for="date_of_report" class="col-sm-3 col-form-label"
                  >Date of Report</label
                >
                <div class="col-sm-9">
                  <input
                    type="datetime-local"
                    class="form-control"
                    v-model="form.date_of_report"
                    id="date_of_report"
                    required
                    disabled
                  />
                  <div class="invalid-feedback d-block">
                    {{ form.errors.date_of_report }}
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label
                  for="medical_technologist"
                  class="col-sm-3 col-form-label"
                  >Medical Technologist</label
                >
                <div class="col-sm-9">
                  <select
                    class="form-select"
                    v-model="form.medical_technologist_id"
                    id="medical_technologist"
                    required
                  >
                    <option value="">Select Medical Technologist</option>
                    <option
                      v-for="technologist in medicalTechnologists"
                      :key="technologist.id"
                      :value="technologist.id"
                    >
                      {{ technologist.name }}
                    </option>
                  </select>
                  <div class="invalid-feedback d-block">
                    {{ form.errors.medical_technologist_id }}
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label for="first_name" class="col-sm-3 col-form-label"
                  >First Name</label
                >
                <div class="col-sm-9">
                  <input
                    type="text"
                    class="form-control"
                    v-model="form.first_name"
                    id="first_name"
                    required
                  />
                  <div class="invalid-feedback d-block">
                    {{ form.errors.first_name }}
                  </div>
                </div>
              </div>

              <div class="row mb-3">
                <label for="middle_name" class="col-sm-3 col-form-label"
                  >Middle Name</label
                >
                <div class="col-sm-9">
                  <input
                    type="text"
                    class="form-control"
                    v-model="form.middle_name"
                    id="middle_name"
                  />
                  <div class="invalid-feedback d-block">
                    {{ form.errors.middle_name }}
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label for="last_name" class="col-sm-3 col-form-label"
                  >Last Name</label
                >
                <div class="col-sm-9">
                  <input
                    type="text"
                    class="form-control"
                    v-model="form.last_name"
                    id="last_name"
                    required
                  />
                  <div class="invalid-feedback d-block">
                    {{ form.errors.last_name }}
                  </div>
                </div>
              </div>

              <div class="row mb-3">
                <label for="age" class="col-sm-3 col-form-label">Age</label>
                <div class="col-sm-9">
                  <input
                    type="text"
                    class="form-control"
                    v-model="form.age"
                    id="age"
                  />
                  <div class="invalid-feedback d-block">
                    {{ form.errors.age }}
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label for="sex" class="col-sm-3 col-form-label">Sex</label>
                <div class="col-sm-9">
                  <select
                    class="form-select"
                    v-model="form.sex"
                    id="sex"
                    required
                  >
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                  </select>
                  <div class="invalid-feedback d-block">
                    {{ form.errors.sex }}
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label for="cs" class="col-sm-3 col-form-label">CS</label>
                <div class="col-sm-9">
                  <input
                    type="text"
                    class="form-control"
                    v-model="form.cs"
                    id="cs"
                  />
                  <div class="invalid-feedback d-block">
                    {{ form.errors.cs }}
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label
                  for="requesting_physician"
                  class="col-sm-3 col-form-label"
                  >Requesting Physician</label
                >
                <div class="col-sm-9">
                  <input
                    type="text"
                    class="form-control"
                    v-model="form.requesting_physician"
                    id="requesting_physician"
                  />
                  <div class="invalid-feedback d-block">
                    {{ form.errors.requesting_physician }}
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label for="clinical_diagnosis" class="col-sm-3 col-form-label"
                  >Clinical Diagnosis</label
                >
                <div class="col-sm-9">
                  <input
                    type="text"
                    class="form-control"
                    v-model="form.clinical_diagnosis"
                    id="clinical_diagnosis"
                  />
                  <div class="invalid-feedback d-block">
                    {{ form.errors.clinical_diagnosis }}
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label for="ward" class="col-sm-3 col-form-label">Ward</label>
                <div class="col-sm-9">
                  <input
                    type="text"
                    class="form-control"
                    v-model="form.ward"
                    id="ward"
                  />
                  <div class="invalid-feedback d-block">
                    {{ form.errors.ward }}
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label for="bed_no" class="col-sm-3 col-form-label"
                  >Bed No.</label
                >
                <div class="col-sm-9">
                  <input
                    type="text"
                    class="form-control"
                    v-model="form.bed_no"
                    id="bed_no"
                  />
                  <div class="invalid-feedback d-block">
                    {{ form.errors.bed_no }}
                  </div>
                </div>
              </div>
              <div class="row mb-3" v-if="form.sex === 'Male'">
                <label for="hematocrit_m" class="col-sm-3 col-form-label"
                  >Hematocrit (Male)</label
                >
                <div class="col-sm-9">
                  <input
                    type="text"
                    class="form-control"
                    v-model="form.hematocrit_m"
                    id="hematocrit_m"
                  />
                  <div class="invalid-feedback d-block">
                    {{ form.errors.hematocrit_m }}
                  </div>
                </div>
              </div>
              <div class="row mb-3" v-if="form.sex === 'Female'">
                <label for="hematocrit_f" class="col-sm-3 col-form-label"
                  >Hematocrit (Female)</label
                >
                <div class="col-sm-9">
                  <input
                    type="text"
                    class="form-control"
                    v-model="form.hematocrit_f"
                    id="hematocrit_f"
                  />
                  <div class="invalid-feedback d-block">
                    {{ form.errors.hematocrit_f }}
                  </div>
                </div>
              </div>
              <div class="row mb-3" v-if="form.sex === 'Male'">
                <label for="hemoglobin_m" class="col-sm-3 col-form-label"
                  >Hemoglobin (Male)</label
                >
                <div class="col-sm-9">
                  <input
                    type="text"
                    class="form-control"
                    v-model="form.hemoglobin_m"
                    id="hemoglobin_m"
                  />
                  <div class="invalid-feedback d-block">
                    {{ form.errors.hemoglobin_m }}
                  </div>
                </div>
              </div>
              <div class="row mb-3" v-if="form.sex === 'Female'">
                <label for="hemoglobin_f" class="col-sm-3 col-form-label"
                  >Hemoglobin (Female)</label
                >
                <div class="col-sm-9">
                  <input
                    type="text"
                    class="form-control"
                    v-model="form.hemoglobin_f"
                    id="hemoglobin_f"
                  />
                  <div class="invalid-feedback d-block">
                    {{ form.errors.hemoglobin_f }}
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label for="rbc_count" class="col-sm-3 col-form-label"
                  >RBC Count</label
                >
                <div class="col-sm-9">
                  <input
                    type="text"
                    class="form-control"
                    v-model="form.rbc_count"
                    id="rbc_count"
                  />
                  <div class="invalid-feedback d-block">
                    {{ form.errors.rbc_count }}
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label for="wbc_count" class="col-sm-3 col-form-label"
                  >WBC Count</label
                >
                <div class="col-sm-9">
                  <input
                    type="text"
                    class="form-control"
                    v-model="form.wbc_count"
                    id="wbc_count"
                  />
                  <div class="invalid-feedback d-block">
                    {{ form.errors.wbc_count }}
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label for="differential_count" class="col-sm-3 col-form-label"
                  >Differential Count</label
                >
                <div class="col-sm-9">
                  <input
                    type="text"
                    class="form-control"
                    v-model="form.differential_count"
                    id="differential_count"
                  />
                  <div class="invalid-feedback d-block">
                    {{ form.errors.differential_count }}
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label for="neutrophils" class="col-sm-3 col-form-label"
                  >Neutrophils</label
                >
                <div class="col-sm-9">
                  <input
                    type="text"
                    class="form-control"
                    v-model="form.neutrophils"
                    id="neutrophils"
                  />
                  <div class="invalid-feedback d-block">
                    {{ form.errors.neutrophils }}
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label for="segmenters" class="col-sm-3 col-form-label"
                  >Segmenters</label
                >
                <div class="col-sm-9">
                  <input
                    type="text"
                    class="form-control"
                    v-model="form.segmenters"
                    id="segmenters"
                  />
                  <div class="invalid-feedback d-block">
                    {{ form.errors.segmenters }}
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label for="stabs" class="col-sm-3 col-form-label">Stabs</label>
                <div class="col-sm-9">
                  <input
                    type="text"
                    class="form-control"
                    v-model="form.stabs"
                    id="stabs"
                  />
                  <div class="invalid-feedback d-block">
                    {{ form.errors.stabs }}
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label for="juveniles" class="col-sm-3 col-form-label"
                  >Juveniles</label
                >
                <div class="col-sm-9">
                  <input
                    type="text"
                    class="form-control"
                    v-model="form.juveniles"
                    id="juveniles"
                  />
                  <div class="invalid-feedback d-block">
                    {{ form.errors.juveniles }}
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label for="myclocytes" class="col-sm-3 col-form-label"
                  >Myclocytes</label
                >
                <div class="col-sm-9">
                  <input
                    type="text"
                    class="form-control"
                    v-model="form.myclocytes"
                    id="myclocytes"
                  />
                  <div class="invalid-feedback d-block">
                    {{ form.errors.myclocytes }}
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label for="lymphocytes" class="col-sm-3 col-form-label"
                  >Lymphocytes</label
                >
                <div class="col-sm-9">
                  <input
                    type="text"
                    class="form-control"
                    v-model="form.lymphocytes"
                    id="lymphocytes"
                  />
                  <div class="invalid-feedback d-block">
                    {{ form.errors.lymphocytes }}
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label for="monocytes" class="col-sm-3 col-form-label"
                  >Monocytes</label
                >
                <div class="col-sm-9">
                  <input
                    type="text"
                    class="form-control"
                    v-model="form.monocytes"
                    id="monocytes"
                  />
                  <div class="invalid-feedback d-block">
                    {{ form.errors.monocytes }}
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label for="eusinophils" class="col-sm-3 col-form-label"
                  >Eusinophils</label
                >
                <div class="col-sm-9">
                  <input
                    type="text"
                    class="form-control"
                    v-model="form.eusinophils"
                    id="eusinophils"
                  />
                  <div class="invalid-feedback d-block">
                    {{ form.errors.eusinophils }}
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label for="basophils" class="col-sm-3 col-form-label"
                  >Basophils</label
                >
                <div class="col-sm-9">
                  <input
                    type="text"
                    class="form-control"
                    v-model="form.basophils"
                    id="basophils"
                  />
                  <div class="invalid-feedback d-block">
                    {{ form.errors.basophils }}
                  </div>
                </div>
              </div>
              <div class="row mb-3" v-if="form.sex === 'Male'">
                <label for="esr_m" class="col-sm-3 col-form-label"
                  >ESR (Male)</label
                >
                <div class="col-sm-9">
                  <input
                    type="text"
                    class="form-control"
                    v-model="form.esr_m"
                    id="esr_m"
                  />
                  <div class="invalid-feedback d-block">
                    {{ form.errors.esr_m }}
                  </div>
                </div>
              </div>
              <div class="row mb-3" v-if="form.sex === 'Female'">
                <label for="esr_f" class="col-sm-3 col-form-label"
                  >ESR (Female)</label
                >
                <div class="col-sm-9">
                  <input
                    type="text"
                    class="form-control"
                    v-model="form.esr_f"
                    id="esr_f"
                  />
                  <div class="invalid-feedback d-block">
                    {{ form.errors.esr_f }}
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label for="platelet_count" class="col-sm-3 col-form-label"
                  >Platelet Count</label
                >
                <div class="col-sm-9">
                  <input
                    type="text"
                    class="form-control"
                    v-model="form.platelet_count"
                    id="platelet_count"
                  />
                  <div class="invalid-feedback d-block">
                    {{ form.errors.platelet_count }}
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label for="bleeding_time" class="col-sm-3 col-form-label"
                  >Bleeding Time</label
                >
                <div class="col-sm-9">
                  <input
                    type="text"
                    class="form-control"
                    v-model="form.bleeding_time"
                    id="bleeding_time"
                  />
                  <div class="invalid-feedback d-block">
                    {{ form.errors.bleeding_time }}
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label for="clotting_time" class="col-sm-3 col-form-label"
                  >Clotting Time</label
                >
                <div class="col-sm-9">
                  <input
                    type="text"
                    class="form-control"
                    v-model="form.clotting_time"
                    id="clotting_time"
                  />
                  <div class="invalid-feedback d-block">
                    {{ form.errors.clotting_time }}
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label for="crt" class="col-sm-3 col-form-label">CRT</label>
                <div class="col-sm-9">
                  <input
                    type="text"
                    class="form-control"
                    v-model="form.crt"
                    id="crt"
                  />
                  <div class="invalid-feedback d-block">
                    {{ form.errors.crt }}
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label for="mcv" class="col-sm-3 col-form-label">MCV</label>
                <div class="col-sm-9">
                  <input
                    type="text" 
                    class="form-control"
                    v-model="form.mcv"
                    id="mcv"
                  />
                  <div class="invalid-feedback d-block">
                    {{ form.errors.mcv }}
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label for="mch" class="col-sm-3 col-form-label">MCH</label>
                <div class="col-sm-9">
                  <input
                    type="text"
                    class="form-control"
                    v-model="form.mch"
                    id="mch"
                  />
                  <div class="invalid-feedback d-block">
                    {{ form.errors.mch }}
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label for="mchc" class="col-sm-3 col-form-label">MCHC</label>
                <div class="col-sm-9">
                  <input
                    type="text" 
                    class="form-control"
                    v-model="form.mchc"
                    id="mchc"
                  />
                  <div class="invalid-feedback d-block">
                    {{ form.errors.mchc }}
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label for="blood_type" class="col-sm-3 col-form-label"
                  >Blood Type</label
                >
                <div class="col-sm-9">
                  <input
                    type="text"
                    class="form-control"
                    v-model="form.blood_type"
                    id="blood_type"
                  />
                  <div class="invalid-feedback d-block">
                    {{ form.errors.blood_type }}
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label for="others" class="col-sm-3 col-form-label"
                  >Others</label
                >
                <div class="col-sm-9">
                  <textarea
                    class="form-control"
                    v-model="form.others"
                    id="others"
                    rows="3"
                  ></textarea>
                  <div class="invalid-feedback d-block">
                    {{ form.errors.others }}
                  </div>
                </div>
              </div>
              <div class="col-12 mt-4">
                <button
                  type="submit"
                  class="btn btn-primary px-4"
                  :disabled="form.processing"
                >
                  Save Hematology Record
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
