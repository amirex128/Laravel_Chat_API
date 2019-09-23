import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex);


export default new Vuex.Store({
    state: {
        userId:"",
        currentUser:[],
        Messages:[],
        allUser:[]
    },
    // example
    getters:{
        getMsg:state => {
            return state.Messages;
        }
    },
    mutations: {
        addToArray(state,message) {
            state.Messages.push(message);
        },
        changeUser(state,newUser){
            state.userId=newUser.user_id;
            state.currentUser=newUser.user;
        },
        allUser(state,allUser){
            state.allUser=allUser;
        },
        changeMessage(state,message){
            state.Messages=[];
            state.Messages=message;
        }
    }

});
