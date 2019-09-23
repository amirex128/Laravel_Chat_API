<template>
    <div>
        <!--Double navigation-->
        <header class="fixed-top">


            <nav class="navbar navbar-expand-lg navbar-dark indigo">
                <a class="navbar-brand" href="#"><div data-activates="slide-out" class="button-collapse" style="font-size: 17px">منوی کاربران</div></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02"
                        aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                    <ul class="navbar-nav mr-auto mt-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="#" >صفحه اصلی</a>
                        </li>

                    </ul>
                </div>
            </nav>
        </header>
        <!--/.Double navigation-->
        <!-- Sidebar navigation -->
        <div id="slide-out" style="width: 20rem;" class="side-nav ">
            <ul class="custom-scrollbar">
                <!--Social-->
                <li>
                    <ul class="social">
                        <li><a href="#" class="icons-sm fb-ic"><i class="fab fa-facebook-f"> </i></a></li>
                        <li><a href="#" class="icons-sm pin-ic"><i class="fab fa-pinterest"> </i></a></li>
                        <li><a href="#" class="icons-sm gplus-ic"><i class="fab fa-google-plus-g"> </i></a></li>
                        <li><a href="#" class="icons-sm tw-ic"><i class="fab fa-twitter"> </i></a></li>
                    </ul>
                </li>
                <!--/Social-->
                <li>
                    <ul class="list-unstyled friend-list">

                        <li style="cursor: pointer" v-for="user in allUser" class="py-2 px-3 border-bottom"
                            :class="myActive(user.user_id)"
                            @click="changeUser(user.user_id,user)">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <img style="width: 50px;height: 50px;"
                                         :src="user.avatar"
                                         alt="avatar" class="avatar rounded-circle d-flex align-self-center mr-2 z-depth-1">
                                </div>
                                <div class="text-smaller text-mute text-dark d-flex flex-column justify-content-around">
                                    <div>
                                        {{user.name}}
                                    </div>
                                    <div>
                                        <div style="font-size: 10px;" class=" text-right text-smaller text-mute text-dark">
                                            {{user.last_time}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>


                    </ul>

                </li>
            </ul>
            <div class="sidenav-bg mask-light"></div>
        </div>
        <!--/. Sidebar navigation -->
        <div class="card rare-wind-gradient chat-room">
            <div class="card-body">

                <!-- Grid row -->
                <div class="row px-lg-2 px-2">

                    <!--                <member class="col-md-6 col-xl-4 px-0"></member>-->
                    <div class="col-md-12 col-xl-12 pl-md-12 px-lg-auto px-0">

                        <div class="chat-message">
                            <br>
                            <br>
                            <ul id="scrollbar" class="list-unstyled chat-1 scrollbar-light-blue ">
                                <template v-for="msg in Messages">

                                    <li v-if='msg.admin=="admin"' class="d-flex justify-content-start my-4">
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

                                    <li v-if='msg.admin=="user"' class="d-flex justify-content-end my-4 ">
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
                            <div v-if="!this.userId==''" class="form-group shadow-textarea ">
                            <input v-model="messageThisChat" v-on:keypress.enter="sendBoxMessage()"
                                      class="form-control text-right pl-2 my-0 z-depth-1"
                                      id="exampleFormControlTextarea6"
                                      placeholder="... پیام خود را وارد نمایید"/>

                                <button style="position: absolute; top: 2px;" type="button" class=" btn btn-primary btn-rounded  m-3"
                                        @click="sendBoxMessage()">ارسال
                                </button>

                            </div>

                        </div>

                    </div>

                </div>
                <!-- Grid row -->

            </div>
        </div>
    </div>
</template>

<script>

    export default {
        name: "main-chat",
        data() {
            return {
                userId:"",
                messageThisChat: "",
                messageReceive:[],
                currentUser:[],
                Messages:[],
                allUser:[]


            }
        },
        created() {
            // window.Echo.private(`chat.user.1`)
            window.Echo.channel("public-channel")
                .listen('ChatEvent', (e) => {
                    if(e.message.admin==="user"){
                        console.log(e)
                        let messageReceive = {
                            admin:e.message.admin,
                            user_id: e.user.id,
                            avatar: e.user.avatar,
                            name: e.user.name,
                            text: e.message.message,
                            time: e.message.created
                        };
                        // this.Messages.push(messageReceive);
                        this.$set(this.Messages,this.Messages.length++,messageReceive);

                    }

                    window.axios.post('api/chat/all').then((res) => {
                        this.allUser=res.data.data;
                    })
                });


            window.axios.post('api/chat/all').then((res) => {
                this.allUser=res.data.data;

            })



        },
        methods:{
            sendBoxMessage() {
                window.scrollTo(0, document.body.scrollHeight);
                let messageReceive = {
                    admin:"admin",
                    user_id: this.user_id,
                    avatar: "https://cdn3.iconfinder.com/data/icons/avatars-15/64/_Bearded_Man-17-512.png",
                    name: "پشتیبان",
                    text: this.messageThisChat,
                    time: new Date().getUTCFullYear()
                };

                this.messageThisChat = "";

                this.$set(this.Messages,this.Messages.length++,messageReceive);


                window.axios.post('api/chat/messages', {
                    user_id: this.currentUser.user_id,
                    messageSend: messageReceive.text,
                    admin: "admin",

                })

            },
            changeUser(user_id,user) {

                this.userId=user_id;
                this.currentUser=user;

                window.axios.get('api/chat/messages/' +user_id).then((res) => {
                    for (let msg of res.data.messages) {
                        if (msg.admin==="admin"){
                            this.messageReceive.push({
                                user_id: msg.user_id,
                                avatar: "https://cdn3.iconfinder.com/data/icons/avatars-15/64/_Bearded_Man-17-512.png",
                                name: "پشتیبان",
                                text: msg.message,
                                admin: msg.admin,
                                time: msg.created,
                                visited: msg.visited,
                            })
                        }else{
                            this.messageReceive.push({
                                user_id: msg.user_id,
                                avatar: msg.avatar,
                                name: msg.name,
                                text: msg.message,
                                admin: msg.admin,
                                time: msg.created,
                                visited: msg.visited,
                            })

                        }

                    }
                    this.Messages=[];
                    this.Messages=this.messageReceive;
                    this.messageReceive=[]

                    window.scrollTo(0, document.body.scrollHeight);


                })


            },
            myActive(user_id) {
                if (user_id == this.userId) {
                    return {
                        active: true,
                        grey: true,
                        'lighten-3': true

                    }
                } else {
                    return {

                        active: false,
                        grey: false,
                        'lighten-3': false

                    }
                }

            }

        }
    }
</script>

<style scoped>
#exampleFormControlTextarea6{
    width: 100%;
    height: 110px;
}
html{
    min-height: 100%;
}
    body{
        min-height: 100%;
    }
</style>
