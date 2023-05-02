<template>
  <div class="modal fade" id="rainPopup" tabindex="-1" role="dialog" aria-labelledby="rainPopupTitle" style="display: none;" aria-hidden="true">
    <div role="document" class="modal-dialog modal-dialog-centered mwib539v">
      <div class="modal-content avdhkwqbkf">
        <div width="800" class="css-ranbx4 csorwprw">
          <div class="css-3g9l7g srblerwa">
            <div class="css-1he5r9c wrpownokw">
              <div class="css-1f9kk05">
                <div class="css-tqjib3 fowhlaew">Rain
                </div>
              </div>
              <p id="raindetails" class="chnlw405a">rain bla blabllbalblablalblablblblablalb lbllbalbl lblblblb
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  data: () => ({

  }),
  mounted() {
    $(document).on('click', '#rainPopup', () => {
      return false;
    });
  },
  beforeDestroy() {
    $(document).off('click', '#rainPopup');
    $(document).off('click', 'body');
  },
  methods: {
    close() {
      this.$emit('closerainPopup');
    },
  },
  computed: {
    isLogin() {
      return this.$store.getters.isLogin;
    }
  }
}
</script>