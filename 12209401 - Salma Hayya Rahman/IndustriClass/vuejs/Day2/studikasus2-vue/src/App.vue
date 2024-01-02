<template>
  <Card v-for="(item, index) in cardContent" :key="index" :title="item.title" :desc="item.desc" :image="item.image" :name="item.name" :date="item.date" :profil="item.profil">
  </Card>
</template>
<script>
//panggil file
import Card from '@/components/Card.vue' ;
export default {
  //component apa saja yang akkan ditampilkan
  components: {
    // definisi component agar bisa digunakan di template
    Card,
  },
  data() {
    return {
      cardContent: [
        {
          title: 'B E A C H' ,
          desc: 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur, iusto esse placeat, repellat voluptatibus eveniet ad commodi totam.' ,
          image: 'pinbeach.jpg',
          name: 'Salma Hayya',
          date: '13 Dec 2022',
          profil: 'sal.png' ,
        },
        {
          title: 'M O O N' ,
          desc: 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur, iusto esse placeat, repellat voluptatibus eveniet ad commodi totam.' ,
          image: 'm.jpg',
          name: 'Salma Hayya',
          date: '28 Oct 2022',
          profil: 'sal.png' ,
        },
      ]
    } 
  }
}
</script>
<style></style>
