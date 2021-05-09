<template>
  <div class="main">
    <KanbanBoard />
  </div>
</template>

<script>
import KanbanBoard from './KanbanBoard'

export default {
  components: {
    KanbanBoard,
  },
}
</script>

<style lang="scss" scoped>
  .main {
    display: flex;
    justify-content: center;
    padding: 30px;
  }
</style>
