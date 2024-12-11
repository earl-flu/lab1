<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, useForm, Link } from "@inertiajs/vue3";
import { useToast } from "vue-toastification";

const props = defineProps({
  medicalTechnologist: {
    type: Object,
    required: true,
  },
});

const form = useForm({
  name: props.medicalTechnologist.name,
  license_number: props.medicalTechnologist.license_number,
  is_active: props.medicalTechnologist.is_active,
});

const submit = () => {
  form.put(route("medical-technologists.update", props.medicalTechnologist), {
    onSuccess: () => {
      const toast = useToast();
      toast.success("Medical Technologist Updated Successfully", {
        timeout: 3000,
      });
    },
  });
};
</script>

<template>
  <Head title="Edit Medical Technologist" />

  <AuthenticatedLayout>
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
      <div class="breadcrumb-title pe-3">Medical Technologist</div>
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
    <!-- sub breadcrumb -->
    <div
      class="product-count d-flex align-items-center gap-3 gap-lg-4 mb-4 fw-bold flex-wrap font-text1"
    >
      <Link :href="route('medical-technologists.index')"
        ><span class="me-1">Medical Technologists</span></Link
      >
      <div>></div>
      <div><span class="me-1">Edit</span></div>
      <div>></div>
      <div>
        <span class="me-1">{{ medicalTechnologist.name }}</span
        ><span class="text-secondary">({{ medicalTechnologist.id }})</span>
      </div>
    </div>
    <!-- end sub breadcrumb -->

    <div class="row mt-5">
      <div class="col-12 col-xl-6">
        <div class="card">
          <div class="card-body p-4">
            <h5 class="mb-4">Edit Medical Technologist Form</h5>
            <form class="row g-3" @submit.prevent="submit">
              <div class="col-md-12">
                <label for="name" class="form-label">Name</label>
                <input
                  type="text"
                  class="form-control"
                  v-model="form.name"
                  autofocus
                  id="name"
                />
                <div class="invalid-feedback d-block">
                  {{ form.errors.name }}
                </div>
              </div>
              <div class="col-md-12">
                <label for="license_number" class="form-label">License Number</label>
                <input
                  type="text"
                  class="form-control"
                  v-model="form.license_number"
                  id="license_number"
                />
                <div class="invalid-feedback d-block">
                  {{ form.errors.license_number }}
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-check">
                  <input
                    class="form-check-input"
                    type="checkbox"
                    v-model="form.is_active"
                    id="is_active"
                  />
                  <label class="form-check-label" for="is_active">
                    Active
                  </label>
                </div>
              </div>

              <div class="col-md-12 mt-4">
                <div class="d-md-flex d-grid align-items-center gap-3">
                  <button
                    class="btn btn-grd btn-grd-primary px-4"
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
                  >
                    Save
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
