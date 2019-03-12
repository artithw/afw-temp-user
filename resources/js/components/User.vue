<template>
  <div>
    <div>
      <div class="container">
        <h2 class="table tables-boardered">แสดงข้อมูล</h2>
        <table class="table tables-boardered">
          <tr>
            <th>รหัส</th>
            <th>ชื่อ</th>
            <th>จังหวัด</th>
            <th>แก้ไข</th>
            <th>ลบ</th>
          </tr>
          <tr v-for="(user, index) in users" :key="user.id">
            <td>{{user.id}}</td>
            <td>{{user.name}}</td>
            <td>{{user.city}}</td>
            <td>
              <a :href="'/users/'+user.id+'/edit'" class="btn btn-primary">Edit</a>
            </td>
            <td>
              <a href="javascript:;" class="btn btn-warning" v-on:click="deleteUser(user.id,index)">Delete</a>
            </td>
          </tr>
        </table>
        <a href="/users/create" class="btn btn-primary">เพิ่มข้อมูล</a>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  mounted() {
    this.getUserData();
  },
  methods: {
    getUserData() {
      axios.get("api/users").then(response => {
        this.users = response.data;
      });
    },
    deleteUser(id,index) {
      axios.delete("api/users/"+id).then(response => {
        this.users.splice(index,1);
      });
    }
  },
  data() {
    return {
      users: [],
      user: {
        id: 0,
        name: "",
        city: ""
      }
    };
  }
};
</script>

