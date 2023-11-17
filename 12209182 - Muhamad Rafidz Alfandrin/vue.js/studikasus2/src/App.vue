  <template>
    <div>
      <card v-for="(item, index) in cardContents" 
      :key="index" 
      :judul="item.title" 
      :text="item.text" 
      :image="item.image"
      :name="item.name"
      :date="item.date">
      </card>
    </div>
  </template>

  <script>
  // Panggilan file
  import card from '@/components/card.vue';
  export default {
    components: {
      card,
    },
    data() {
      return {
        cardContents: [
          {
            title: 'Muhamad Rafidz',
            text: `
              <ul>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                Proin vitae neque lobortis, dictum dolor et, sagittis purus.
                Proin sagittis dictum molestie.
              </ul>`,
              image : 'pinterest2.jpg',
          },
          {
            title: 'Alfandrin',
            text: `
              <ul>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                Proin vitae neque lobortis, dictum dolor et, sagittis purus.
                Proin sagittis dictum molestie.
              </ul>`,
              image : 'pinterest.jpg',
          }
        ]
      }
    }
  }
  </script>

  <style></style>
