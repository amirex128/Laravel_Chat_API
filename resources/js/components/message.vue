<template>
    <div>
        <template v-for="msg in  messagesUser=this.getMsg">

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
    </div>
</template>

<script>
    import { mapGetters } from 'vuex'

    export default {
        name: "message",
        data(){
          return{
              messagesUser:[]
          }
        },
        updated(){
            for (let i=0;i<this.getMsg;i++){
                this.$set(this.messagesUser,i,this.getMsg[i])
            }
        },
        computed: {
            ...mapGetters([
                'getMsg',
            ])
        }
    }
</script>

<style scoped>

</style>
