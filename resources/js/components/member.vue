<template>
    <!-- Grid column -->
    <div>

        <h6 class="font-weight-bold mb-3 text-center text-lg-left">کاربران</h6>
        <div class="white z-depth-1 px-2 pt-3 pb-0 members-panel-1 scrollbar-light-blue">
            <ul class="list-unstyled friend-list">

                <li class="active grey lighten-3 p-2">
                    <a href="#" class="d-flex justify-content-between">
                        <img src="https://mdbootstrap.com/img/Photos/Avatars/avatar-8.jpg" alt="avatar" class="avatar rounded-circle d-flex align-self-center mr-2 z-depth-1">
                        <div class="text-small">
                            <strong>امیر شیردل</strong>
                            <p class="last-message text-muted">سلام خوب هستی</p>
                        </div>
                        <div class="chat-footer">
                            <p class="text-smaller text-muted mb-0">همین الان</p>
                            <span class="badge badge-danger float-right">1</span>
                        </div>
                    </a>
                </li>



                <li class="p-2">
                    <a href="#" class="d-flex justify-content-between">
                        <img src="https://mdbootstrap.com/img/Photos/Avatars/avatar-1.jpg" alt="avatar" class="avatar rounded-circle d-flex align-self-center mr-2 z-depth-1">
                        <div class="text-small">
                            <strong>ممدرضا سرسرابی</strong>
                            <p class="last-message text-muted">الوووووو </p>
                        </div>
                        <div class="chat-footer">
                            <p class="text-smaller text-muted mb-0">5 دقیقه پیش</p>
                            <span class="text-muted float-right"><i class="fas fa-mail-reply" aria-hidden="true"></i></span>
                        </div>
                    </a>
                </li>



            </ul>
        </div>

    </div>
    <!-- Grid column -->

</template>

<script>
    export default {
        name: "member"
    }
</script>

<style scoped>

</style>
