<template>
  <div>
    <div>
      <div class="container">
        <h2>แก้ไขข้อมูล</h2>
        <form action="/users">
          <div class="form-group">
            <label>ชื่อ:</label>
            <input type="text" class="form-control" v-model="name">
          </div>
          <div class="form-group">
            <label>จังหวัด:</label>
            <input type="text" class="form-control" v-model="city">
          </div>
          <div class="form-group">
            <button class="btn btn-primary" v-on:click="updateUser()">อัพเดตข้อมูล</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>
<script>
export default {
    props:['id'],
    data(){
        return{
            name:'',
            city:''
        }

    },
    mounted(){
        axios.get('/api/users/'+this.id).then(Response=>{
            var user = Response.data;
            this.name = user.name;
            this.city = user.city;
            });
    },
    methods: {
    updateUser() {
      axios.put('/api/users/'+this.id,{
            name:this.name,
            city:this.city
      });

      }
    }

};
</script>

