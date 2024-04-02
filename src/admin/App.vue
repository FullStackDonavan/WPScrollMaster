<template>
  <div id="vue-backend-app">
    <div
      id="wpscrollmaster-ui"
      class="metaslider wpscrollmaster-ui block min-h-screen p-0 pb-24 bg-gray-lightest -mx-4"
      style="display: block"
    >
      <div
        id="ms-toolbar"
        class="flex-col items-center bg-white h-16 shadow-sm lg:sticky z-999 flex"
        style="top: 32px"
      >
        <div class="container h-full px-6">
          <div class="flex items-center h-full -mx-4">
            <a
              href="http://localhost/Vue/wp-admin/admin.php?page=wp-scroll-master"
              class="flex items-center h-full py-2 px-4 hidden sm:block"
              ><img
                src="http://localhost/Vue/wp-content/plugins/wp-scroll-master/src//assets/images/WPScrollMaster_logo.png"
                alt="MetaSlider"
                class="mr-2 rtl:mr-0 rtl:ml-2"
                style="height: 46px; width: auto"
            /></a>
            <div class="flex-grow h-full px-4">
              <div class="-mx-4 items-center flex h-full">
                <div
                  class="flex items-center flex-grow px-4 h-full toolbar-separator"
                ></div>
                <div class="px-4 h-full toolbar-actions">
                  <div class="flex justify-end items-center h-full text-gray">
                    <button
                      id="add-new-slide"
                      class="ms-toolbar-button tipsy-tooltip-bottom-toolbar"
                      original-title="Add a new slide"
                    >
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        class="w-6 p-0.5 text-gray-dark"
                      >
                        <path
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M12 6v6m0 0v6m0-6h6m-6 0H6"
                        ></path>
                      </svg>
                      <span class="text-sm text-gray-darkest">Add Slide</span>
                    </button>
                    <button
                      id="preview-slideshow"
                      class="ms-toolbar-button tipsy-tooltip-bottom-toolbar"
                      original-title="Save &amp; open the preview (alt + p)"
                    >
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        class="w-6 p-0.5 text-gray-dark"
                      >
                        <path
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"
                        ></path>
                      </svg>
                      <span class="text-sm">Preview</span>
                    </button>
                    <span class="border-l h-8 mx-2"></span>
                    <a
                      href="http://localhost/Vue/wp-admin/admin-post.php?action=metaslider_create_slider&amp;_wpnonce=374bbb82e3"
                      class="ms-toolbar-button tipsy-tooltip-bottom-toolbar"
                      original-title="Add a new slideshow"
                      ><svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        class="w-6 p-0.5 text-gray-dark"
                      >
                        <path
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"
                        ></path>
                      </svg>
                      <span class="text-sm text-gray-darkest">New</span>
                    </a>
                    <button
                      class="ms-toolbar-button tipsy-tooltip-bottom-toolbar"
                      original-title="Duplicate this slideshow"
                    >
                      <svg
                        mlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        class="w-6 p-0.5 text-gray-dark"
                      >
                        <path
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"
                        ></path>
                      </svg>
                      <span class="text-sm text-gray-darkest">Duplicate</span>
                    </button>
                    <button
                      class="ms-toolbar-button tipsy-tooltip-bottom-toolbar disabled"
                      original-title="Adding custom CSS is a MetaSlider Pro feature. Click to learn more."
                    >
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        class="w-6 p-0.5 text-gray-dark"
                      >
                        <path
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"
                        ></path>
                      </svg>
                      <span class="text-sm text-gray-darkest">Add CSS</span>
                    </button>
                    <span class="border-l h-8 mx-2"></span>
                    <button
                      id="ms-save"
                      class="ms-toolbar-button tipsy-tooltip-bottom-toolbar"
                      original-title="Save slideshow"
                    >
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        class="w-6 p-0.5 text-gray-dark"
                      >
                        <path
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"
                        ></path>
                      </svg>
                      <span class="text-sm text-gray-darkest">Save</span>
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <h1>WP Scroll Master</h1>
      <router-view name="tab"></router-view>
      <router-view></router-view>
    </div>
  </div>
</template>

<script>
import TabNavigation from "./components/tabs/Navigation.vue";
export default {
  name: "App",
  components: {
    "tab-navigation": TabNavigation,
  },
};
</script>

<style>
.wpscrollmaster-ui,
.wpscrollmaster-ui * {
  box-sizing: border-box;
}
.z-999 {
  z-index: 999 !important;
}
.shadow-sm {
  box-shadow: 0 2px 10px 0 rgba(0, 0, 0, 0.06) !important;
}
.h-16 {
  height: 4rem !important;
}
.items-center {
  align-items: center !important;
}
.flex-col {
  flex-direction: column !important;
}
.flex {
  display: flex !important;
}
.bg-white {
  --bg-opacity: 1 !important;
  background-color: #fff !important;
  background-color: rgba(255, 255, 255, 1) !important;
}
.bg-gray-lightest {
  --bg-opacity: 1 !important;
  background-color: #f8fafc !important;
  background-color: rgba(248, 250, 252, 1) !important;
}
#wpscrollmaster-ui,
.container {
  min-width: auto;
  width: 100%;
}

@media (min-width: 768px) {
  .toolbar-actions,
  .toolbar-separator {
    padding-left: 1rem !important;
    padding-right: 1rem !important;
  }
}
@media only screen and (min-width: 320px) {
  .toolbar-actions,
  .toolbar-separator {
    padding: 0 !important;
  }
}

.lg\:sticky {
  position: sticky !important;
}

.wpscrollmaster-ui,
.wpscrollmaster-ui * {
  box-sizing: border-box;
}
.px-4 {
  padding-left: 1rem !important;
  padding-right: 1rem !important;
}
.h-full {
  height: 100% !important;
}

.wpscrollmaster-ui * {
  box-sizing: border-box;
}
.text-gray {
  --text-opacity: 1 !important;
  color: #b8c2cc !important;
  color: rgba(184, 194, 204, 1) !important;
}
.h-full {
  height: 100% !important;
}
.justify-end {
  justify-content: flex-end !important;
}
.flex {
  display: flex !important;
}

@media (min-width: 768px) {
  .ms-toolbar-button {
    padding-left: 0.5rem !important;
    padding-right: 0.5rem !important;
  }
}
@media only screen and (min-width: 320px) {
  .ms-toolbar-button {
    padding-left: 4px !important;
    padding-right: 4px !important;
  }
}
.wpscrollmaster-ui,
.wpscrollmaster-ui * {
  box-sizing: border-box;
}
.ms-toolbar-button {
  --text-opacity: 1 !important;
  align-items: center !important;
  color: #606f7b !important;
  color: rgba(96, 111, 123, 1) !important;
  display: flex !important;
  flex-direction: column !important;
  height: 100% !important;
  justify-content: flex-end !important;
  line-height: 1 !important;
  padding-bottom: 1rem !important;
  padding-left: 0.5rem !important;
  padding-right: 0.5rem !important;
  text-decoration: none !important;
  transition-duration: 0.3s !important;
  transition-property: background-color, border-color, color, fill, stroke,
    opacity, box-shadow, transform !important;
  transition-timing-function: cubic-bezier(0.4, 0, 1, 1) !important;
}
button,
input,
optgroup,
select,
textarea {
  color: inherit;
  line-height: inherit;
  padding: 0;
}
[role="button"],
button {
  cursor: pointer;
}
button {
  background-color: transparent;
  background-image: none;
}
[type="button"],
[type="reset"],
[type="submit"],
button {
  -webkit-appearance: button;
}
button,
select {
  text-transform: none;
}
button,
input {
  overflow: visible;
}
button,
input,
optgroup,
select,
textarea {
  font-family: inherit;
  font-size: 100%;
  line-height: 1.15;
  margin: 0;
}
button,
input,
select,
textarea {
  box-sizing: border-box;
  font-family: inherit;
  font-size: inherit;
  font-weight: inherit;
}

wpscrollmaster-ui * {
  box-sizing: border-box;
}
.mx-2 {
  margin-left: 0.5rem !important;
  margin-right: 0.5rem !important;
}
.h-8 {
  height: 2rem !important;
}
.border-l {
  border-left-width: 1px !important;
}
*,
:after,
:before {
  border: 0 solid;
  box-sizing: border-box;
}

.flex-grow {
  flex-grow: 1 !important;
}

.-mx-4 {
  margin-left: -1rem !important;
  margin-right: -1rem !important;
}

.px-6 {
  padding-left: 1.5rem !important;
  padding-right: 1.5rem !important;
}

.pb-24 {
  padding-bottom: 6rem !important;
}
.p-0 {
  padding: 0 !important;
}
.min-h-screen {
  min-height: 100vh !important;
}
.block {
  display: block !important;
}
</style>