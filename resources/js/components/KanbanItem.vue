<template>
  <div class="kanban-item" :class="{'kanban-item--is-dragging': isDragging}">
    <div class="kanban-item__content">
      <textarea v-model="newValue" v-if="isEditing" @blur="endEdit" ref="editor" class="kanban-item__textarea"></textarea>
      <div v-else>{{ value }}</div>
    </div>
    <button class="kanban-item__button" @click="startEdit">
      <span class="material-icons" style="font-size: 23px;">edit</span>
    </button>
    <button class="kanban-item__button" @click="$emit('delete')">
      <span class="material-icons" style="font-size: 23px;">delete</span>
    </button>
  </div>
</template>

<script>
export default {
  model: {
    prop: 'value',
    event: 'change'
  },

  props: {
    value: {
      type: String,
      default: '',
    },
  },

  data() {
    return {
      newValue: this.value,
      isEditing: false,
      isDragging: false,
    }
  },

  methods: {
    startEdit() {
      this.isEditing = true
      this.$nextTick(function () {
        this.$refs.editor.focus()
      })
    },

    endEdit() {
      this.isEditing = false
      this.$emit('change', this.newValue)
    }
  }
}
</script>

<style lang="scss" scoped>
.kanban-item {
  background-color: #FFF;
  padding: 15px;
  border-radius: 5px;
  display: flex;
  margin-bottom: 7px;
}

.kanban-item__content {
  flex: 1;
}

.kanban-item__button {
  background: transparent;
  color: #8A94A5;
  outline: 0;
  border: 0;
  cursor: pointer;
  padding: 0;
}

.kanban-item__textarea {
  width: 100%;
}
</style>
