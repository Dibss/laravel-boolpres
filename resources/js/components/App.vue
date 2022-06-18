<template>
    <div>
        <header>
            <HeaderComp/>
        </header>
        <main>
            <MainComp/>
        </main>
        <footer>
            <FooterComp/>
        </footer>
    </div>
</template>

<script>
import HeaderComp from './partials/HeaderComp.vue';
import MainComp from './partials/MainComp.vue';
import FooterComp from './partials/FooterComp.vue';

export default{
    name: "App",
    components: {
        HeaderComp,
        MainComp,
        FooterComp,
    }
}
</script>

<style lang="scss">
*{padding: 0; margin: 0; box-sizing: border-box;}
li{list-style-type: none;}
a{text-decoration: none;}

header{
    width: 85%;
    margin: 0 auto;
    padding: 1em 0;
}
main{
    width: 80%;
    margin: 0 auto;
    display: flex;
    justify-content: center;
    align-items: center;
}
</style>