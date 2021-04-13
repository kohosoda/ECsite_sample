<template>
  <div>
    <button type="button" class="btn"
     @click="clickUpdate">
      更新
    </button>
  </div>
</template>

<script>
export default {
  props: {
    endpoint: {
      type: String,
    },
  },
  methods: {
    async clickUpdate() {
      const response = await axios.put(this.endpoint)
     
      alert('カートを更新しました')
    }
    },
}
</script>

<style>

</style>