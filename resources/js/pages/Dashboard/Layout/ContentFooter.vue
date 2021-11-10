<template>
  <footer class="footer">
    <div class="container">
      <nav>
        <ul>
          <li>
            <a v-if="$route.meta.rtlActive" href="https://virtusinvestmentgroup.com" target="_blank">
              منزل
            </a>
            <a v-else href="https://virtusinvestmentgroup.com" target="_blank">
              Virtus Investment Group
            </a>
          </li>
          <li>
            <a href="https://virtusinvestmentgroup.com/jv" target="_blank">
              Joint Venture
            </a>
          </li>
          <li>
            <a v-if="$route.meta.rtlActive" href="https://virtusinvestmentgroup.com/about" target="_blank">
              شركة
            </a>
            <a v-else href="https://virtusinvestmentgroup.com/about">
              About Us
            </a>
          </li>
        </ul>
      </nav>
      <div class="copyright text-center">
        &copy; {{ new Date().getFullYear() }},
        Developed by
        <a href="https://j4lconnect.com" target="_blank">J4L Connect</a>
      </div>
    </div>
  </footer>
</template>
<script>
export default {};
</script>
<style></style>
