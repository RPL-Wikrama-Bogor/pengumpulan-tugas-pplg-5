<template>
  <div class="container">
    <div class="portofolio">
      <h3>Portfolio Kami</h3>
      <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>
      <div class="category">
        <span v-for="category in DataCategories" :key="category.id" @click="filter(category.id)">{{ category.title
        }}</span>
      </div>
      <div class="row-portofolio">
        <Card v-for="item in DataPortfolio" :portofolio="item"></Card>
      </div>
    </div>
  </div>
</template>
<script>
import Card from "@/components/Portfolio/Card.vue";
import { Get } from '@/Api/index.js';
export default {
  components: {
    Card
  },
  data() {
    return {
      DataPortfolio: [],
      DataCategories: [],
    }
  },
  methods: {
    async filter(id) {
      // alert(id)
      const response = await Get('portfolio?category_id=' + id);
      this.DataPortfolio = response.data.data;

    },

  },
  
  // beforeCreate() {
  //   console.log(document.querySelector('.portofolio'));
  //   console.log(this.DataPortfolio);
  //   console.log('beforeCreate');
  // },
  // created() {
  //   console.log(document.querySelector('.portofolio'));
  //   console.log(this.DataPortfolio);
  //   console.log('created');
  // },
  // beforeMount() {
  //   console.log(document.querySelector('.portofolio'));
  //   console.log('beforeMount');
  // },
  // mount() {
  //   console.log('mounted')
  // },

  async mounted() {
    const response = await Get('portfolio');
    this.DataPortfolio = response.data.data;

    const responseCategories = await Get('categories');
    // console.log(responseCategories);
    this.DataCategories = responseCategories.data;
  },
}
</script>

<style>
.category {
  margin: 10px 0 35px 0;
  display: flex;
  flex-wrap: wrap;
}

.category span {
  background-color: #bdcdff;
  padding: 10px 15px;
  font-weight: 500;
  border-radius: 20px;
  margin: 5px;
  cursor: pointer;
}

.row-portofolio {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  grid-gap: 10px;

}

.portofolio {
  margin-top: 10px;
}

.portofolio h4 {
  margin-top: 10px;
  font-weight: 900;
  font-size: 30px;
  line-height: 35px;
  margin-bottom: 0;
  color: #042181;
}

.portofolio p {
  font-weight: 900;
  font-size: 14px;
  line-height: 20px;
  color: #4F556A;
  max-width: 680px;
  margin: auto;
  margin-top: 14px;
  margin-bottom: 25px;
  text-align: center;
}

.portofolio p span {
  color: gray;
}

@media screen and (max-width : 600px) {
  .row-portofolio {
    display: grid;
    grid-template-columns: repeat(1, 1fr);
    grid-gap: 10px;
  }

  .portofolio h4 {
    font-size: 20px;
  }
}
</style>