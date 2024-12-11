<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
import { ref } from "vue";

const props = defineProps({
  settings: Array,
});

const editSetting = (id) => {
  // Redirect to the edit page for the specific setting
  window.location.href = route('settings.edit', id);
};
</script>

<template>
  <Head title="Settings Index" />

  <AuthenticatedLayout>
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
      <div class="breadcrumb-title pe-3">Settings</div>
      <div class="ps-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0 p-0">
            <li class="breadcrumb-item active" aria-current="page">Index</li>
          </ol>
        </nav>
      </div>
    </div>

    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body p-4">
            <h5 class="mb-4">Settings List</h5>
            <table class="table">
              <thead>
                <tr>
                  <th>Hospital Name</th>
                  <th>Hospital Tagline</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="setting in settings" :key="setting.id">
                  <td>{{ setting.hospital_name }}</td>
                  <td>{{ setting.hospital_tagline }}</td>
                  <td>
                    <button
                      class="btn btn-primary"
                      @click="editSetting(setting.id)"
                    >
                      Edit
                    </button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
