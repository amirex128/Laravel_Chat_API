<template>
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

</template>

<script>
    export default {
        name: "navBar"
    }
</script>

<style scoped>

</style>
