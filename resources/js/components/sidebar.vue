<template>
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

                    <li style="cursor: pointer" v-for="user in this.$store.state.allUser" class="py-2 px-3 border-bottom"
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
</template>

<script>
    export default {
        name: "sidebar",
        data() {
            return {
                messageReceive:[]
            }

        },
        methods: {
            changeUser(user_id,user) {
                this.$store.commit('changeUser',{ user_id,user})


                window.axios.get('api/chat/messages/' +user_id).then((res) => {
                    for (let msg of res.data.messages) {
                        if (msg.admin==="true"){
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
                    this.$store.commit("changeMessage", this.messageReceive)
                    this.messageReceive=[]

                    window.scrollTo(0, document.body.scrollHeight);


                })


            },
            myActive(user_id) {
                if (user_id == this.$store.state.userId) {
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

</style>
