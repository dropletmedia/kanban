import axios from "axios";

/**
 * Initial State.
 */
const state = {
  taskLists: [
    {
      label: "Todo",
      tasks: [
        {
          content: "hello world"
        }
      ]
    },
    {
      label: "In Progress",
      tasks: []
    },
    {
      label: "Done",
      tasks: []
    }
  ]
};

/**
 * Retrieve data from state.
 */
const getters = {
  taskLists(state) {
    return state.taskLists;
  }
};

/**
 * save and get data from api
 */
const actions = {
  async getTasklists(context) {
    try {
      const { data } = await axios.get("http://localhost/api/kanban/");

      // need to decode the json for the tasks!
      data.data.forEach(data => {
        data.tasks = JSON.parse(data.tasks);
      });
      // update state
      context.commit("updateLists", data.data);
    } catch (error) {
      console.error("Oh No: ", error.message);
    }
  },

  async putTasklists(context, data) {
    // set the headers
    const config = {
      headers: {
        "Content-Type": "application/x-www-form-urlencoded",
        Accept: "application/json"
      }
    };
    // save into state first
    context.commit("updateLists", data);
    // send to api
    try {
      const { statusText } = await axios.post(
        "http://localhost/api/kanban/",
        data,
        config
      );
      console.log(statusText);
    } catch (error) {
      console.error("Oh No: ", error.message);
    }
  }
};

/**
 * Modify the data in state.
 */
const mutations = {
  updateLists(state, value) {
    state.taskLists = value;
  }
};

export default {
  namespaced: true,
  state,
  getters,
  actions,
  mutations
};
