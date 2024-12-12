<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, useForm, usePage } from "@inertiajs/vue3";
import { useToast } from "vue-toastification";
import { ref, onMounted, computed } from "vue";

const page = usePage();

const form = useForm({
  hospital_name: "",
  hospital_address: "",
  hospital_tagline: "",
  hospital_email: "",
  hospital_contact_number: "",
  pathologist_name: "",
  pathologist_license_number: "",
  pathologist_esignature: null,
  hospital_logo: null,
  esig_style: "",
});

// New reactive variable to hold setting data
const settingData = ref(null);

// Function to fetch existing settings data
const fetchSettingData = async () => {
  // Replace with your actual API call to fetch settings
  const response = await fetch(route("settings.show", { id: 1 })); // Adjust the route and parameter as necessary
  settingData.value = await response.json();
};

// Populate form with existing data if available
onMounted(() => {
  fetchSettingData().then(() => {
    if (settingData.value) {
      form.hospital_name = settingData.value.hospital_name || "";
      form.hospital_address = settingData.value.hospital_address || "";
      form.esig_style = settingData.value.esig_style || "";
      form.hospital_tagline = settingData.value.hospital_tagline || "";
      form.hospital_email = settingData.value.hospital_email || "";
      form.hospital_contact_number =
        settingData.value.hospital_contact_number || "";
      form.pathologist_name = settingData.value.pathologist_name || "";
      form.pathologist_license_number =
        settingData.value.pathologist_license_number || "";

      // Handle pathologist_esignature if it exists
      if (settingData.value.pathologist_esignature) {
        // Assuming pathologist_esignature is a URL or base64 string
        form.pathologist_esignature = settingData.value.pathologist_esignature;
      }

      if (settingData.value.hospital_logo) {
        // Assuming hospital_logo is a URL or base64 string
        form.hospital_logo = settingData.value.hospital_logo;
      }
    }
  });
});

const submit = () => {
  form.post(route("settings.store"), {
    onSuccess: () => {
      const toast = useToast();
      toast.success("Settings Saved Successfully", {
        timeout: 3000,
      });
      window.location.reload(true); // Hard refresh the page
    },
  });
};

function handleFileUpload(event, inputName) {
  const files = event.target.files;
  this.form[inputName] = files.length > 0 ? files[0] : null; // Set to null if no file is selected
}

const esigImage = computed(() => {
  if (form.pathologist_esignature) {
    return `${page.props.ziggy.url}/storage/${form.pathologist_esignature}`;
  }
});

const hospitalLogo = computed(() => {
  if (form.hospital_logo) {
    return `${page.props.ziggy.url}/storage/${form.hospital_logo}`;
  }
});
</script>

<template>
  <Head title="Create Settings" />

  <AuthenticatedLayout>
    <!-- <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
      <div class="breadcrumb-title pe-3">Settings</div>
      <div class="ps-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0 p-0">
            <li class="breadcrumb-item active" aria-current="page">Edit</li>
          </ol>
        </nav>
      </div>
    </div> -->

    <div class="row">
      <div class="col-12 col-xl-6">
        <div class="card">
          <div class="card-body p-4">
            <h5 class="mb-4">Settings</h5>
            <form class="row g-3" @submit.prevent="submit">
              <div class="col-md-12">
                <label for="hospital_name" class="form-label"
                  >Hospital Name</label
                >
                <input
                  type="text"
                  class="form-control"
                  v-model="form.hospital_name"
                  id="hospital_name"
                />
                <div class="invalid-feedback d-block">
                  {{ form.errors.hospital_name }}
                </div>
              </div>
              <div class="col-md-12">
                <label for="hospital_address" class="form-label"
                  >Hospital Address</label
                >
                <input
                  type="text"
                  class="form-control"
                  v-model="form.hospital_address"
                  id="hospital_address"
                />
                <div class="invalid-feedback d-block">
                  {{ form.errors.hospital_address }}
                </div>
              </div>
              <div class="col-md-12">
                <label for="hospital_logo" class="form-label"
                  >Hospital Logo</label
                ><br />
                <input
                  type="file"
                  @input="handleFileUpload($event, 'hospital_logo')"
                />
                <!-- Display the uploaded image if it exists -->
                <div v-if="form.hospital_logo">
                  <img
                    :src="hospitalLogo"
                    alt="hospital-logo"
                    class="img-thumbnail mt-2 max-w-20 max-h-20"
                  />
                </div>
                <progress
                  v-if="form.progress"
                  :value="form.progress.percentage"
                  max="100"
                >
                  {{ form.progress.percentage }}%
                </progress>
                <div class="invalid-feedback d-block">
                  {{ form.errors.hospital_logo }}
                </div>
              </div>
              <div class="col-md-12">
                <label for="hospital_tagline" class="form-label"
                  >Hospital Tagline</label
                >
                <input
                  type="text"
                  class="form-control"
                  v-model="form.hospital_tagline"
                  id="hospital_tagline"
                />
                <div class="invalid-feedback d-block">
                  {{ form.errors.hospital_tagline }}
                </div>
              </div>
              <div class="col-md-12">
                <label for="hospital_email" class="form-label"
                  >Hospital Email</label
                >
                <input
                  type="email"
                  class="form-control"
                  v-model="form.hospital_email"
                  id="hospital_email"
                />
                <div class="invalid-feedback d-block">
                  {{ form.errors.hospital_email }}
                </div>
              </div>
              <div class="col-md-12">
                <label for="hospital_contact_number" class="form-label"
                  >Hospital Contact Number</label
                >
                <input
                  type="text"
                  class="form-control"
                  v-model="form.hospital_contact_number"
                  id="hospital_contact_number"
                />
                <div class="invalid-feedback d-block">
                  {{ form.errors.hospital_contact_number }}
                </div>
              </div>
              <div class="col-md-12">
                <label for="pathologist_name" class="form-label"
                  >Pathologist Name</label
                >
                <input
                  type="text"
                  class="form-control"
                  v-model="form.pathologist_name"
                  id="pathologist_name"
                />
                <div class="invalid-feedback d-block">
                  {{ form.errors.pathologist_name }}
                </div>
              </div>
              <div class="col-md-12">
                <label for="pathologist_license_number" class="form-label"
                  >Pathologist License Number</label
                >
                <input
                  type="text"
                  class="form-control"
                  v-model="form.pathologist_license_number"
                  id="pathologist_license_number"
                />
                <div class="invalid-feedback d-block">
                  {{ form.errors.pathologist_license_number }}
                </div>
              </div>
              <div class="col-md-12">
                <label for="pathologist_esignature" class="form-label"
                  >Pathologist E-Signature</label
                ><br />
                <input
                  type="file"
                  @input="handleFileUpload($event, 'pathologist_esignature')"
                  :required="false"
                />
                <!-- Display the uploaded image if it exists -->
                <div v-if="form.pathologist_esignature">
                  <img
                    :src="esigImage"
                    alt="E-Signature"
                    style="max-width: 300px"
                    class="img-thumbnail mt-2"
                  />
                </div>
                <progress
                  v-if="form.progress"
                  :value="form.progress.percentage"
                  max="100"
                >
                  {{ form.progress.percentage }}%
                </progress>
                <div class="invalid-feedback d-block">
                  {{ form.errors.pathologist_esignature }}
                </div>
              </div>
              <div class="col-md-12">
                <label for="esig_style" class="form-label"
                  >eSignature CSS Style</label
                >
                <input
                  type="text"
                  class="form-control"
                  v-model="form.esig_style"
                  id="esig_style"
                />
                <div class="invalid-feedback d-block">
                  {{ form.errors.esig_style }}
                </div>
              </div>
              <div class="col-md-12 mt-4">
                <button
                  class="btn btn-grd btn-grd-primary px-4"
                  :class="{ 'opacity-25': form.processing }"
                  :disabled="form.processing"
                >
                  Save
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
