<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card card-default">
          <div class="card-header">
            Example Component
          </div>
          a
          <div class="card-body">
            I'm an example component. <br>
            <span class="test">{{ test }}</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<style>
  .test {
    margin-bottom: 10px;
  }
</style>
<script>
export default {
  props: {
    test: {
      type: String,
      default: ''
    }
  },

  mounted () {
    console.log('ExampleComponent mounted.')
  }
}
</script>
