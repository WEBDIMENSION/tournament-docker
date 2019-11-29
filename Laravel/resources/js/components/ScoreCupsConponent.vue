<template>
  <div class="row">
    <div
      v-for="(cup, index) in dataCupsArray"
      :key="index"
      class="col-md-3"
    >
      <a :href="'/score/' + cup.cup_number">
        <img
          class="card-img-top"
          :src="
            'https://placehold.jp/888888/ffffff/800x600.png?text=' +
              cup.cup_name
          "
          :alt="cup.cup_name"
        >
      </a>
      <div class="card-body">
        <h3 class="card-title">
          {{ cup.cup_name }}
        </h3>
        <h4>subtitle</h4>
        <p class="card-text">
          Description
        </p>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  props: {
    dataCups: {
      type: String,
      default: ''
    }
  },
  data: () => ({
    dataCupsArray: ''
  }),
  mounted: function () {
    this.dataCupsArray = JSON.parse(this.dataCups)
  }
}
</script>

<style scoped></style>
