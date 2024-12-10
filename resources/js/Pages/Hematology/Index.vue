<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link, router } from "@inertiajs/vue3";
import { ref, watch, computed } from "vue";
import { debounce } from "lodash";
import Pagination from "@/Components/Pagination.vue";

const props = defineProps({
  hematologies: {
    type: Object,
    required: true,
  },
  filters: {
    type: Object,
  },
});

let firstName = ref(props.filters.first_name);
let middleName = ref(props.filters.middle_name);
let lastName = ref(props.filters.last_name);

const formatDate = computed(() => {
  return (dateString) => {
    const options = {
      year: "numeric",
      month: "long",
      day: "numeric",
      hour: "2-digit",
      minute: "2-digit",
    };
    return new Date(dateString).toLocaleString("en-US", options);
  };
});

const debouncedFetch = debounce((first_name, middle_name, last_name) => {
  router.get(
    route("hematologies.index"),
    { first_name, middle_name, last_name },
    {
      preserveState: true,
      preserveScroll: true,
    }
  );
}, 300);

watch([firstName, middleName, lastName], (values) => {
  const [first_name, middle_name, last_name] = values;
  debouncedFetch(first_name, middle_name, last_name);
});
</script>

<template>
  <Head title="Hematologies" />

  <AuthenticatedLayout>
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-4">
      <div class="breadcrumb-title pe-3">Hematologies</div>
      <div class="ps-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0 p-0">
            <li class="breadcrumb-item">
              <a href="javascript:;"><i class="bx bx-home-alt"></i></a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">All</li>
          </ol>
        </nav>
      </div>
    </div>
    <!--end breadcrumb-->

    <div class="row">
      <div class="d-flex align-items-stretch">
        <div class="card w-100 rounded-4">
          <div class="card-body">
            <div class="d-flex align-items-start justify-content-between mb-4">
              <div class="">
                <h5 class="mb-0 mt-3">All Hematology Results</h5>
              </div>
            </div>

            <!-- Search inputs -->
            <form class="row g-3 mb-5 mt-3">
              <div class="col-md-4">
                <label for="first_name" class="form-label">First Name</label>
                <input
                  type="text"
                  class="form-control"
                  id="first_name"
                  placeholder="First Name"
                  v-model="firstName"
                  autocomplete="off"
                />
              </div>
              <div class="col-md-4">
                <label for="middle_name" class="form-label">Middle Name</label>
                <input
                  type="text"
                  class="form-control"
                  id="middle_name"
                  placeholder="Middle Name"
                  v-model="middleName"
                  autocomplete="off"
                />
              </div>
              <div class="col-md-4">
                <label for="last_name" class="form-label">Last Name</label>
                <input
                  type="text"
                  class="form-control"
                  id="last_name"
                  placeholder="Last Name"
                  v-model="lastName"
                  autocomplete="off"
                />
              </div>
            </form>
            <!-- End of search inputs -->

            <!-- Add hematology -->
            <div class="d-flex align-items-start justify-content-between mb-4">
              <div></div>
              <Link
                class="btn btn-primary px-4"
                :href="route('hematologies.create')"
              >
                <i class="bi bi-plus-lg me-2"></i>Add New Hematology
              </Link>
            </div>
            <!-- End of add hematology -->

            <!-- Table -->
            <div class="table-responsive">
              <table class="table align-middle table-hover">
                <thead class="table-dark">
                  <tr>
                    <th>Patient Name</th>
                    <th>Age</th>
                    <th>Sex</th>
                    <th>Date of Report</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <tr
                    v-for="hematology in hematologies.data"
                    :key="hematology.id"
                  >
                    <td>
                      <div class="d-flex align-items-center gap-3">
                        <p class="mb-0 fw-bold">
                          {{ hematology.last_name }},
                          {{ hematology.first_name }}
                          {{ hematology.middle_name }}
                        </p>
                      </div>
                    </td>
                    <td>{{ hematology.age }}</td>
                    <td>{{ hematology.sex }}</td>
                    <td>{{ formatDate(hematology.date_of_report) }}</td>
                    <td>
                      <div class="d-flex align-items-center gap-1">
                        <div class="dropdown">
                          <button
                            class="btn btn-sm dropdown-toggle dropdown-toggle-nocaret"
                            type="button"
                            data-bs-toggle="dropdown"
                            aria-expanded="false"
                          >
                            <i class="bi bi-three-dots"></i>
                          </button>
                          <ul class="dropdown-menu" style="">
                            <Link
                              :href="route('hematologies.edit', hematology)"
                            >
                              <a class="dropdown-item" href="javascript:;"
                                ><i class="bi bi-pencil-square me-2"></i>Edit</a
                              >
                            </Link>
                            <a :href="route('hematologies.print', hematology)" target="_blank" class="dropdown-item">
                              <i class="bi bi-printer me-2"></i>Print
                            </a>
                          </ul>
                        </div>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
              <Pagination :links="hematologies.links" />
            </div>
          </div>
          <!-- End of table -->
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
