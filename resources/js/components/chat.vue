<template>
    <!-- Grid column -->
    <div>

        <div class="chat-message">
            <br>
            <br>
            <ul class="list-unstyled chat-1 scrollbar-light-blue ">
                    <template v-for="msg in  this.$store.state.Message">

                        <li v-if="msg.admin==='true'" class="d-flex justify-content-start my-4">
                            <img :src="msg.avatar" alt="avatar"
                                 class="avatar rounded-circle mr-2 ml-lg-3 ml-0 z-depth-1">
                            <div class="chat-body white p-3 ml-2 z-depth-1">
                                <div class="header">
                                    <strong class="primary-font">{{msg.name}}</strong>
                                    <small class="pull-right text-muted"><i class="far fa-clock"></i> {{msg.time}}</small>
                                </div>
                                <hr class="w-100">
                                <p class="mb-0">
                                    {{msg.text}}
                                </p>
                            </div>
                        </li>



                        <li v-if="msg.admin==='false'" class="d-flex justify-content-end my-4 ">
                            <div class="chat-body white p-3 z-depth-1">
                                <div class="header">
                                    <strong class="primary-font">{{msg.name}}</strong>
                                    <small class="pull-right text-muted"><i class="far fa-clock"></i> {{msg.time}}</small>
                                </div>
                                <hr class="w-100">
                                <p class="mb-0">
                                    {{msg.text}}
                                </p>
                            </div>
                            <img :src="msg.avatar" alt="avatar"
                                 class="avatar rounded-circle mr-0 ml-3 z-depth-1">
                        </li>
                    </template>
            </ul>
            <br>
            <br>

        </div>

        <div class="fixed-bottom">
            <div v-if="!this.$store.state.userId==''" class="form-group shadow-textarea ">
                            <textarea v-model="messageThisChat" v-on:keypress.enter="sendBoxMessage()"
                                      class="form-control text-right pl-2 my-0 z-depth-1"
                                      id="exampleFormControlTextarea6" rows="3"
                                      placeholder="... پیام خود را وارد نمایید">

                            </textarea>
                <button style="position: absolute; top: 2px;" type="button" class=" btn btn-primary btn-rounded  m-3"
                        @click="sendBoxMessage()">ارسال
                </button>

            </div>

        </div>

    </div>
    <!-- Grid column -->

</template>

<script>
    import Message from "./message";

    export default {
        name: "chat",
        components: {Message},
        data() {
            return {
                messageThisChat: "",
            }
        },
        beforeUpdate() {

        },
        updated() {


        },
        methods: {
            sendBoxMessage() {
                window.scrollTo(0, document.body.scrollHeight);

                let messageReceive = {
                    user_id: this.$store.state.currentUser.user_id,
                    avatar: "https://cdn3.iconfinder.com/data/icons/avatars-15/64/_Bearded_Man-17-512.png",
                    name: "پشتیبان",
                    text: this.messageThisChat,
                    time: new Date().getUTCFullYear()
                };

                this.messageThisChat = "";
                this.$store.commit("addToArray", messageReceive);
                this.$forceUpdate();

                window.axios.post('api/chat/messages', {
                    user_id: this.$store.state.currentUser.user_id,
                    messageSend: messageReceive.text,
                    admin: "true",

                })

            }
        }
    }
</script>

<style scoped>

</style>
