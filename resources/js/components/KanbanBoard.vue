<template>
  <div v-if="taskLists">
    <draggable
      class="kanban-board"
      group="groups"
      v-model="taskLists"
      @end="updateTaskList"
    >
      <kanban-column
        v-for="(group, groupId) in taskLists"
        :key="'group_' + groupId"
        :label="group.label || 'Untitled'"
        @create="createTask(groupId)"
      >
        <draggable
          v-if="taskLists[groupId].tasks"
          class="kanban-board__drop-area"
          group="{name: 'tasks_' + groupId, put: true}"
          v-model="taskLists[groupId].tasks"
          @end="updateTaskList"
        >
          <kanban-item
            v-for="(card, cardId) in group.tasks"
            :key="'card_' + cardId"
            v-model="card.content"
            @change="updateTaskList"
            @delete="deleteTask(groupId, cardId)"
          />
        </draggable>
      </kanban-column>
    </draggable>
  </div>
</template>

<script>
// Components
import KanbanColumn from "./KanbanColumn";
import KanbanItem from "./KanbanItem";
import draggable from "vuedraggable";

export default {
  components: {
    KanbanColumn,
    KanbanItem,
    draggable
  },
  computed: {
    // get the tasklists from state
    taskLists: {
      get() {
        return this.$store.getters["kanban/taskLists"];
      }
    }
  },
  mounted() {
    // lets poll the api
    this.$store.dispatch("kanban/getTasklists");
  },
  methods: {
    createTask(groupId) {
      // add a task to the board
      if (this.taskLists[groupId].tasks !== null) {
        this.taskLists[groupId].tasks.push({ content: "new task" });
      } else {
        this.taskLists[groupId].tasks = [{ content: "new task" }];
      }
      this.updateTaskList();
    },

    deleteTask(groupId, taskId) {
      // remove a task
      this.taskLists[groupId].tasks.splice(taskId, 1);
      this.updateTaskList();
    },

    updateTaskList() {
      // tell the store to save to state and api
      this.$store.dispatch("kanban/putTasklists", this.taskLists);
    }
  }
};
</script>

<style lang="scss" scoped>
.kanban-board {
  width: 1200px;
  display: flex;
  gap: 15px;

  font-family: "Nunito", sans-serif;
  color: #8a94a5;
}

.kanban-board__drop-area {
  flex: 1;
  min-height: 400px;
}
</style>
