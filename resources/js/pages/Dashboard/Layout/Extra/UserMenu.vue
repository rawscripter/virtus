<template>
  <div class="user">
    <div class="photo">
      <img :src="avatar" alt="avatar" />
    </div>
    <div class="user-info">
      <a
        data-toggle="collapse"
        :aria-expanded="!isClosed"
        @click.stop="toggleMenu"
        @click.capture="clicked"
      >
        <span v-if="$route.meta.rtlActive">
          {{ rtlTitle }}
          <b class="caret"></b>
        </span>
        <span v-else>
          {{ title }}
          <b class="caret"></b>
        </span>
      </a>

      <collapse-transition>
        <div v-show="!isClosed">
          <ul class="nav nav-profile">
            <slot>
              <li>
                <a v-if="$route.meta.rtlActive" @click="goToProfile">
                  <span class="sidebar-mini">مع</span>
                  <span class="sidebar-normal">ملف</span>
                </a>
                <a v-else @click="goToProfile">
                  <span class="sidebar-mini">MP</span>
                  <span class="sidebar-normal">My Profile</span>
                </a>
              </li>
              <li>
                <a v-if="$route.meta.rtlActive" @click="logout">
                  <span class="sidebar-mini">و</span>
                  <span class="sidebar-normal">إعدادات</span>
                </a>
                <a v-else @click="logout">
                  <span class="sidebar-mini">L</span>
                  <span class="sidebar-normal">Logout</span>
                </a>
              </li>
            </slot>
          </ul>
        </div>
      </collapse-transition>
    </div>
  </div>
</template>
<script>
export default {

  data() {
    return {
      isClosed: true,
      title: 'Profile',
      rtlTitle: "تانيا أندرو",
      avatar: "/images/avatar.jpg"
    };
  },

  async created() {
    this.$store.watch(() => this.$store.getters["USER"], (me) => {
      this.title = me.name
    })
    await this.$store.dispatch("getUser", this.$store.getters['AUTH_ID'])
  },

  methods: {
    clicked: function(e) {
      e.preventDefault();
    },
    toggleMenu: function() {
      this.isClosed = !this.isClosed;
    },
    goToProfile() {
      this.$router.push({name: "UserResource Profile"})
    },
    logout() {
      this.$store.dispatch("logout");
    }
  }
}
</script>
<style>
.collapsed {
  transition: opacity 1s;
}

.nav-profile{
    display: block !important;
}
</style>
