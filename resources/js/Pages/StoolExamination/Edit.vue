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
  stoolExamination: Object,
});

const form = useForm({
  date_of_report: currentDateTime.value,
  first_name: props.stoolExamination.first_name,
  last_name: props.stoolExamination.last_name,
  middle_name: props.stoolExamination.middle_name,
  age: props.stoolExamination.age,
  sex: props.stoolExamination.sex,
  requesting_physician: props.stoolExamination.requesting_physician,
  ward: props.stoolExamination.ward,
  color: props.stoolExamination.color,
  consistency: props.stoolExamination.consistency,
  occult_blood: props.stoolExamination.occult_blood,
  red_cells: props.stoolExamination.red_cells,
  pus_cells: props.stoolExamination.pus_cells,
  macrophages: props.stoolExamination.macrophages,
  trichuris_ova: props.stoolExamination.trichuris_ova,
  ascaris_ova: props.stoolExamination.ascaris_ova,
  hookworm: props.stoolExamination.hookworm,
  t_hominis: props.stoolExamination.t_hominis,
  g_lambia_a_cyst: props.stoolExamination.g_lambia_a_cyst,
  g_lambia_b_trophozoite: props.stoolExamination.g_lambia_b_trophozoite,
  e_histolyca_a_cyst: props.stoolExamination.e_histolyca_a_cyst,
  e_histolyca_b_trophozoite: props.stoolExamination.e_histolyca_b_trophozoite,
  bacteria: props.stoolExamination.bacteria,
  others: props.stoolExamination.others,
  medical_technologist_id: props.stoolExamination.medical_technologist_id,
});

const submit = () => {
  form.put(route("stool-examinations.update", props.stoolExamination.id), {
    onSuccess: () => {
      const toast = useToast();
      toast.success("Stool examination record updated successfully", {
        timeout: 3000,
      });
    },
  });
};
</script>

<template>
  <Head title="Edit Stool Examination" />

  <AuthenticatedLayout>
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
      <div class="breadcrumb-title pe-3">Stool Examination</div>
      <div class="ps-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0 p-0">
            <li class="breadcrumb-item">
              <a href="javascript:;"><i class="bx bx-home-alt"></i></a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Edit</li>
          </ol>
        </nav>
      </div>
    </div>
    <!--end breadcrumb-->

    <div class="row">
      <div class="col-8">
        <div class="card">
          <div class="card-body p-4">
            <h5 class="mb-16">Stool Examination Result</h5>
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
              <!-- Add other form fields here -->
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
                  <select class="form-select" v-model="form.sex" id="sex">
                    <option value="">Select Sex</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                  </select>
                  <div class="invalid-feedback d-block">
                    {{ form.errors.sex }}
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

              <!-- Macro fields -->
              <div class="row mb-3">
                <label for="color" class="col-sm-3 col-form-label">Color</label>
                <div class="col-sm-9">
                  <input
                    type="text"
                    class="form-control"
                    v-model="form.color"
                    id="color"
                  />
                  <div class="invalid-feedback d-block">
                    {{ form.errors.color }}
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label for="consistency" class="col-sm-3 col-form-label"
                  >Consistency</label
                >
                <div class="col-sm-9">
                  <input
                    type="text"
                    class="form-control"
                    v-model="form.consistency"
                    id="consistency"
                  />
                  <div class="invalid-feedback d-block">
                    {{ form.errors.consistency }}
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label for="occult_blood" class="col-sm-3 col-form-label"
                  >Occult Blood</label
                >
                <div class="col-sm-9">
                  <input
                    type="text"
                    class="form-control"
                    v-model="form.occult_blood"
                    id="occult_blood"
                  />
                  <div class="invalid-feedback d-block">
                    {{ form.errors.occult_blood }}
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label for="red_cells" class="col-sm-3 col-form-label"
                  >Red Cells</label
                >
                <div class="col-sm-9">
                  <input
                    type="text"
                    class="form-control"
                    v-model="form.red_cells"
                    id="red_cells"
                  />
                  <div class="invalid-feedback d-block">
                    {{ form.errors.red_cells }}
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label for="pus_cells" class="col-sm-3 col-form-label"
                  >Pus Cells</label
                >
                <div class="col-sm-9">
                  <input
                    type="text"
                    class="form-control"
                    v-model="form.pus_cells"
                    id="pus_cells"
                  />
                  <div class="invalid-feedback d-block">
                    {{ form.errors.pus_cells }}
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label for="macrophages" class="col-sm-3 col-form-label"
                  >Macrophages</label
                >
                <div class="col-sm-9">
                  <input
                    type="text"
                    class="form-control"
                    v-model="form.macrophages"
                    id="macrophages"
                  />
                  <div class="invalid-feedback d-block">
                    {{ form.errors.macrophages }}
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label for="trichuris_ova" class="col-sm-3 col-form-label"
                  >Trichuris Ova</label
                >
                <div class="col-sm-9">
                  <input
                    type="text"
                    class="form-control"
                    v-model="form.trichuris_ova"
                    id="trichuris_ova"
                  />
                  <div class="invalid-feedback d-block">
                    {{ form.errors.trichuris_ova }}
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label for="ascaris_ova" class="col-sm-3 col-form-label"
                  >Ascaris Ova</label
                >
                <div class="col-sm-9">
                  <input
                    type="text"
                    class="form-control"
                    v-model="form.ascaris_ova"
                    id="ascaris_ova"
                  />
                  <div class="invalid-feedback d-block">
                    {{ form.errors.ascaris_ova }}
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label for="hookworm" class="col-sm-3 col-form-label"
                  >Hookworm</label
                >
                <div class="col-sm-9">
                  <input
                    type="text"
                    class="form-control"
                    v-model="form.hookworm"
                    id="hookworm"
                  />
                  <div class="invalid-feedback d-block">
                    {{ form.errors.hookworm }}
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label for="t_hominis" class="col-sm-3 col-form-label"
                  >T. Hominis</label
                >
                <div class="col-sm-9">
                  <input
                    type="text"
                    class="form-control"
                    v-model="form.t_hominis"
                    id="t_hominis"
                  />
                  <div class="invalid-feedback d-block">
                    {{ form.errors.t_hominis }}
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label for="g_lambia_a_cyst" class="col-sm-3 col-form-label"
                  >G. Lambia - (a) Cyst</label
                >
                <div class="col-sm-9">
                  <input
                    type="text"
                    class="form-control"
                    v-model="form.g_lambia_a_cyst"
                    id="g_lambia_a_cyst"
                  />
                  <div class="invalid-feedback d-block">
                    {{ form.errors.g_lambia_a_cyst }}
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label
                  for="g_lambia_b_trophozoite"
                  class="col-sm-3 col-form-label"
                  >G. Lambia - (b)) Trophozoite</label
                >
                <div class="col-sm-9">
                  <input
                    type="text"
                    class="form-control"
                    v-model="form.g_lambia_b_trophozoite"
                    id="g_lambia_b_trophozoite"
                  />
                  <div class="invalid-feedback d-block">
                    {{ form.errors.g_lambia_b_trophozoite }}
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label for="e_histolyca_a_cyst" class="col-sm-3 col-form-label"
                  >E. Histolyca - (a) Cyst</label
                >
                <div class="col-sm-9">
                  <input
                    type="text"
                    class="form-control"
                    v-model="form.e_histolyca_a_cyst"
                    id="e_histolyca_a_cyst"
                  />
                  <div class="invalid-feedback d-block">
                    {{ form.errors.e_histolyca_a_cyst }}
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label
                  for="e_histolyca_b_trophozoite"
                  class="col-sm-3 col-form-label"
                  >E. Histolyca - (b) Trophozoite</label
                >
                <div class="col-sm-9">
                  <input
                    type="text"
                    class="form-control"
                    v-model="form.e_histolyca_b_trophozoite"
                    id="e_histolyca_b_trophozoite"
                  />
                  <div class="invalid-feedback d-block">
                    {{ form.errors.e_histolyca_b_trophozoite }}
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label for="bacteria" class="col-sm-3 col-form-label"
                  >Bacteria</label
                >
                <div class="col-sm-9">
                  <input
                    type="text"
                    class="form-control"
                    v-model="form.bacteria"
                    id="bacteria"
                  />
                  <div class="invalid-feedback d-block">
                    {{ form.errors.bacteria }}
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
                  Save Stool Examination Record
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>