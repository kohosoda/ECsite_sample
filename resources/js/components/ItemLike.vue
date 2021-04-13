<template>
  <div>
    <button type="button" class="btn btn-block border mt-2"
      :class="buttonColor"
      @click="clickLike">
      <i class="fas fa-heart mr-1"
        :class="{'red-text' : this.isLikedBy}"></i>
      {{ buttonText }}
    </button>
  </div>
</template>

<script>
export default {
  props: {
    initialIsLikedBy: {
      type: Boolean,
      default: false,
    },
    endpoint: {
      type: String
    },
  },
  data() {
    return {
      isLikedBy: this.initialIsLikedBy,
    }
  },
  computed: {
    buttonColor() {
      return this.isLikedBy
        ? 'bg-info text-white'
        : 'bg-white'
    },
    buttonText() {
      return this.isLikedBy
        ? 'お気に入りを解除する'
        : 'お気に入りに追加する'
    }
  },
  methods: {
    clickLike() {
      this.isLikedBy
        ? this.unlike()
        : this.like()
    },
    async like() {
      this.isLikedBy = true
      const response = await axios.put(this.endpoint)
    },
    async unlike() {
      this.isLikedBy = false
      const response = await axios.delete(this.endpoint)
    },
  },
}

</script>