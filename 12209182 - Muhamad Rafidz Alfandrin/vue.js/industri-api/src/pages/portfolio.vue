<template>
    <portfolio :data="DataPortfolio"></portfolio>
</template>

<script>

import portfolio from '@/components/beranda/portfolio.vue';
import { Get } from '@/Api/index.js';
export default {
    components: {
        portfolio
    },
    data() {
        return {
            DataPortfolio: []
        }
    },

    async created() {
        const responsePortfolio = await Get('http://127.0.0.1:9000/api/portfolio');
        this.DataPortfolio = responsePortfolio.data.data;
    },
}

</script>