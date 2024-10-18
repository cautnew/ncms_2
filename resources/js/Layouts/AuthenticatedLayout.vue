<script setup>
import { ref } from "vue";
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";
import { faGear, faAngleDown } from "@fortawesome/free-solid-svg-icons";
import Dropdown from "@/Components/Dropdown.vue";
import DropdownLink from "@/Components/DropdownLink.vue";
import NavLink from "@/Components/NavLink.vue";
import ResponsiveNavLink from "@/Components/ResponsiveNavLink.vue";
import Footer from "@/Layouts/FooterLayout.vue";
import { Head } from "@inertiajs/vue3";
import { Link } from "@inertiajs/vue3";
import { faNfcSymbol } from "@fortawesome/free-brands-svg-icons";

const showingNavigationDropdown = ref(false);

const sectionList = [
  {
    name: "Dashboard",
    route: "ncms.dashboard",
  },
  {
    name: "Ponto",
    route: "ncms.ponto",
  },
  {
    name: "Financeiro",
    route: "ncms.financeiro",
  },
];

const sectionManagerList = [
  {
    name: "Enterprises",
    route: "ncms.manager.enterprises",
  },
];

const sectionAccountList = [
  {
    name: "Profile",
    route: "ncms.profile.edit",
  },
  {
    name: "Log Out",
    route: "ncms.logout",
  },
];

</script>

<template>
  <Head>
    <link rel="icon" type="image/svg+xml" href="/resources/img/logo.jpeg" />
  </Head>
  <div>
    <div class="min-h-screen bg-gray-100">
      <nav class="bg-white border-b border-gray-100">
        <!-- Primary Navigation Menu -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div class="flex justify-between h-16">
            <div class="flex">
              <!-- Logo -->
              <div class="shrink-0 flex items-center">
                <Link :href="route('ncms.dashboard')" title="NCMS">
                <ApplicationLogo class="block h-9 w-auto fill-current text-gray-800" />
                </Link>
              </div>

              <!-- Navigation Links -->
              <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                <NavLink v-for="section in sectionList" :key="section.name" :href="route(section.route)" :active="route().current(section.route)">
                  {{ section.name }}
                </NavLink>
              </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ms-6">
              <!-- Settings Dropdown -->
              <div class="ms-1 relative">
                <Dropdown>
                  <template #trigger>
                    <span class="inline-flex rounded-md">
                      <button type="button"
                        class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                        <FontAwesomeIcon :icon="faGear" />
                      </button>
                    </span>
                  </template>
                  <template #content>
                    <DropdownLink v-for="section in sectionManagerList" :key="section" :href="route(section.route)">
                      {{ section.name }}
                    </DropdownLink>
                  </template>
                </Dropdown>
              </div>
              <div class="ms-1 relative">
                <Dropdown align="right" width="48">
                  <template #trigger>
                    <span class="inline-flex rounded-md">
                      <button type="button"
                        class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                        Account

                        <FontAwesomeIcon :icon="faAngleDown" class="ms-2" />
                      </button>
                    </span>
                  </template>

                  <template #content>
                    <DropdownLink :href="route('ncms.profile.edit')">
                      Profile
                    </DropdownLink>
                    <DropdownLink :href="route('ncms.logout')" method="post" as="button">
                      Log Out
                    </DropdownLink>
                  </template>
                </Dropdown>
              </div>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
              <button @click="
                showingNavigationDropdown =
                !showingNavigationDropdown
                "
                class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                  <path :class="{
                    hidden: showingNavigationDropdown,
                    'inline-flex':
                      !showingNavigationDropdown,
                  }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M4 6h16M4 12h16M4 18h16" />
                  <path :class="{
                    hidden: !showingNavigationDropdown,
                    'inline-flex':
                      showingNavigationDropdown,
                  }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M6 18L18 6M6 6l12 12" />
                </svg>
              </button>
            </div>
          </div>
        </div>

        <!-- Responsive Navigation Menu -->
        <div :class="{
          block: showingNavigationDropdown,
          hidden: !showingNavigationDropdown,
        }" class="sm:hidden">
          <div class="py-2 space-y-1">
            <ResponsiveNavLink v-for="section in sectionList" :key="section" :href="route(section.route)" :active="route().current(section.route)">
              {{ section.name }}
            </ResponsiveNavLink>
          </div>

          <div class="py-2 border-t border-gray-200">
            <ResponsiveNavLink :href="route('ncms.manager')" :active="route().current('ncms.manager')">
              <FontAwesomeIcon :icon="faGear" class="me-3" />Gerenciar
            </ResponsiveNavLink>
          </div>

          <!-- Responsive Settings Options -->
          <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
              <div class="font-medium text-base text-gray-800">
                {{ $page.props.auth.person.name }}
              </div>
              <div class="font-medium text-sm text-gray-500">
                {{ $page.props.auth.user.email }}
              </div>
            </div>

            <div class="mt-3 space-y-1">
              <ResponsiveNavLink :href="route('ncms.profile.edit')">
                Profile
              </ResponsiveNavLink>
              <ResponsiveNavLink :href="route('ncms.logout')" method="post" as="button">
                Log Out
              </ResponsiveNavLink>
            </div>
          </div>
        </div>
      </nav>

      <!-- Page Heading -->
      <header class="bg-white shadow" v-if="$slots.header">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
          <slot name="header" />
        </div>
      </header>

      <!-- Page Content -->
      <main>
        <slot />
      </main>

      <!-- Footer -->
      <Footer />
    </div>
  </div>
</template>
