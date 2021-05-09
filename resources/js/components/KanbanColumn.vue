<template>
  <div class="kanban-column">
    <header class="kanban-column__header">
      <h1 class="kanban-column__label">{{ label }}</h1>
    </header>
    <slot />
    <footer class="kanban-column__footer">
      <button class="kanban-column__add-button" @click="$emit('create')">
        <span class="material-icons" style="font-size: 16px; margin-right: 5px;">add</span> Add a card...
      </button>
    </footer>
  </div>
</template>

<script>
export default {
  props: {
    label: {
      type: String,
      required: true,
    },
  },
}
</script>

<style lang="scss" scoped>
.kanban-column {
  background-color: #E2E4E6;
  flex: 1;
  width: 100%;
  max-width: 400px;
  padding: 10px;
  border-radius: 5px;
}

.kanban-column__header {
  padding-bottom: 10px;
}

.kanban-column__footer {
  padding-top: 10px;
}

.kanban-column__label {
  padding: 0;
  margin: 0;
  font-size: 25px;
}

.kanban-column__add-button {
  background: transparent;
  color: #8A94A5;
  display: flex;
  align-items: center;
  font-size: 16px;
  cursor: pointer;
  padding: 0;
  outline: 0;
  border: 0;
}
</style>
