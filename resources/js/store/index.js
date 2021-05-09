import Vue from "vue";
import Vuex from "vuex";
import kanban from "./modules/kanban";

Vue.use(Vuex);

const debug = process.env.NODE_ENV !== "production";

export default new Vuex.Store({
  modules: {
    kanban
  },
  strict: false,
  devtools: debug
});
