<script setup>
import { ref, onMounted, onBeforeUnmount } from "vue";
import { Link } from "@inertiajs/vue3";
import $ from "jquery";
import "metismenu";

const props = defineProps({
  isToggled: {
    type: Boolean,
  },
  isSidebarHovered: {
    type: Boolean,
  },
});

const emit = defineEmits(["update:isSidebarHovered", "close-sidebar"]);

const sidenav = ref(null);

const onSidebarHover = () => {
  if (props.isToggled) {
    emit("update:isSidebarHovered", true);
    document.body.classList.add("sidebar-hovered");
  }
};

//ACTIVE MENU
function isActive(route) {
  if (route) return "mm-active";
  return "";
}

const onSidebarLeave = () => {
  if (props.isToggled) {
    emit("update:isSidebarHovered", false);
    document.body.classList.remove("sidebar-hovered");
  }
};

onMounted(() => {
  $(sidenav.value).metisMenu();
});

onBeforeUnmount(() => {
  $(sidenav.value).metisMenu("dispose");
});
</script>


<template>
  <aside
    class="sidebar-wrapper"
    :class="{ 'sidebar-hovered': isSidebarHovered }"
    @mouseover="onSidebarHover"
    @mouseleave="onSidebarLeave"
    data-simplebar="true"
  >
    <div class="sidebar-header">
      <div class="logo-icon">
        <img
          style="width: 35px"
          src="/images/react.svg"
          class="logo-img"
          alt="Laboratory Logo"
        />
      </div>
      <div class="logo-name flex-grow-1">
        <h5 class="mb-0 ml-2">Laboratory</h5>
      </div>
      <div @click="$emit('close-sidebar')" class="sidebar-close">
        <span class="material-icons-outlined">close</span>
      </div>
    </div>
    <div class="sidebar-nav">
      <!-- Navigation content here -->
      <!--navigation-->
      <ul class="metismenu" id="sidenav" ref="sidenav">
        <!-- <li>
          <a href="javascript:;" class="has-arrow">
            <div class="parent-icon">
              <i class="material-icons-outlined">home</i>
            </div>
            <div class="menu-title">Dashboard</div>
          </a>
          <ul>
            <li :class="isActive(route().current('papers.dashboard'))">
              <Link :href="route('papers.dashboard')"
                ><i class="material-icons-outlined">arrow_right</i
                >Papers</Link
              >
            </li>
          </ul>
        </li> -->
        <li>
          <a href="javascript:;" class="has-arrow">
            <div class="parent-icon">
              <i class="material-icons-outlined">water_drop</i>
            </div>
            <div class="menu-title">Blood Chemistry</div>
          </a>
          <ul>
            <li
              :class="
                isActive(
                  route().current('blood-chemistries.index') ||
                    route().current('blood-chemistries.edit')
                )
              "
            >
              <Link :href="route('blood-chemistries.index')"
                ><i class="material-icons-outlined">arrow_right</i>All</Link
              >
            </li>
            <li :class="isActive(route().current('blood-chemistries.create'))">
              <Link :href="route('blood-chemistries.create')"
                ><i class="material-icons-outlined">arrow_right</i>Create</Link
              >
            </li>
          </ul>
        </li>
        <li>
          <a href="javascript:;" class="has-arrow">
            <div class="parent-icon">
              <i class="material-icons-outlined">bloodtype</i>
            </div>
            <div class="menu-title">Hematology</div>
          </a>

          <ul>
            <li
              :class="
                isActive(
                  route().current('hematologies.index') ||
                    route().current('hematologies.edit')
                )
              "
            >
              <Link :href="route('hematologies.index')"
                ><i class="material-icons-outlined">arrow_right</i>All</Link
              >
            </li>
            <li :class="isActive(route().current('hematologies.create'))">
              <Link :href="route('hematologies.create')"
                ><i class="material-icons-outlined">arrow_right</i>Create</Link
              >
            </li>
          </ul>
        </li>
        <li>
          <a href="javascript:;" class="has-arrow">
            <div class="parent-icon">
              <i class="material-icons-outlined">biotech</i>
            </div>
            <div class="menu-title">Urine</div>
          </a>
          <ul>
            <li
              :class="
                isActive(
                  route().current('urines.index') ||
                    route().current('urines.edit')
                )
              "
            >
              <Link :href="route('urines.index')"
                ><i class="material-icons-outlined">arrow_right</i>All</Link
              >
            </li>
            <li :class="isActive(route().current('urines.create'))">
              <Link :href="route('urines.create')"
                ><i class="material-icons-outlined">arrow_right</i>Create</Link
              >
            </li>
          </ul>
        </li>

        <li>
          <a href="javascript:;" class="has-arrow">
            <div class="parent-icon">
              <i class="material-icons-outlined">radio_button_unchecked</i>
            </div>
            <div class="menu-title">Stool Exam.</div>
          </a>
          <ul>
            <li
              :class="
                isActive(
                  route().current('stool-examinations.index') ||
                    route().current('stool-examinations.edit')
                )
              "
            >
              <Link :href="route('stool-examinations.index')"
                ><i class="material-icons-outlined">arrow_right</i>All</Link
              >
            </li>
            <li :class="isActive(route().current('stool-examinations.create'))">
              <Link :href="route('stool-examinations.create')"
                ><i class="material-icons-outlined">arrow_right</i>Create</Link
              >
            </li>
          </ul>
        </li>

        <li class="menu-label">Library</li>

        <li>
          <a href="javascript:;" class="has-arrow">
            <div class="parent-icon">
              <i class="material-icons-outlined">person</i>
            </div>
            <div class="menu-title">Med. Tech.</div>
          </a>
          <ul>
            <li
              :class="
                isActive(
                  route().current('medical-technologists.index') ||
                    route().current('medical-technologists.edit')
                )
              "
            >
              <Link :href="route('medical-technologists.index')"
                ><i class="material-icons-outlined">arrow_right</i>All</Link
              >
            </li>
            <li
              :class="isActive(route().current('medical-technologists.create'))"
            >
              <Link :href="route('medical-technologists.create')"
                ><i class="material-icons-outlined">arrow_right</i>Create</Link
              >
            </li>
          </ul>
        </li>

        <li class="menu-label">Settings</li>

        <li>
          <a href="javascript:;" class="has-arrow">
            <div class="parent-icon">
              <i class="material-icons-outlined">person</i>
            </div>
            <div class="menu-title">Form Settings</div>
          </a>
          <ul>
            <li :class="isActive(route().current('settings.create'))">
              <Link :href="route('settings.create')"
                ><i class="material-icons-outlined">arrow_right</i>Edit</Link
              >
            </li>
          </ul>
        </li>
      </ul>
      <!--end navigation-->
    </div>
  </aside>
</template>
<style>
</style>
