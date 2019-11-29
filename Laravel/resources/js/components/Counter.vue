<template>
  <div>
    <span>{{ cnt }}</span>
    <button @click="increment">
      Increment
    </button>
  </div>
</template>

<script>
export default {
  props: {
    count: {
      type: Number, // 型の検査
      default: 0,
      required: true
    }
  },
  data: () => ({
    value: 0
  }),
  computed: {
    cnt: {
      get () {
        return parseInt(this.count) + parseInt(this.value)
      },
      set (value) {
        this.value = value
      }
    }
  },
  methods: {
    increment () {
      // this.cnt = this.cnt++
      this.value++
    }
  }
}
</script>
