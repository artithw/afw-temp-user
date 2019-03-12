<template>
  <div>
    <div>
      <div class="container">
        <!--h2 class="table tables-boardered">แสดงข้อมูล</h2-->
        <table class="table table-striped">
          <thead class="thead-dark">
            <tr>
              <th scope="col"></th>
              <th scope="col">ชื่อโครงการ</th>
              <th scope="col">ผู้รับผิดชอบ</th>
              <th scope="col">สังกัด</th>
              <th scope="col">เอกสาร</th>
              <th scope="col">วันที่เริ่ม</th>
              <th scope="col">วันที่สิ้นสุด</th>
              <th scope="col">สถานะ</th>
              <th scope="col">แก้ไข</th>
              <th scope="col">ลบ</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(user, index) in users" :key="user.id">
              <td>{{user.id}}</td>
              <td>ชื่อโครงการ</td>
              <td>{{user.name}}</td>
              <td>{{user.city}}</td>
              <td><i class="fa fa-file-pdf-o" style="font-size:36px;color:red"></i></td>
              <td>10/4/2562</td>
              <td>18/4/2562</td>
              <td>
                <button type="button" class="btn btn-success">อนุมัติ</button>
              </td>
              <td>
                <a :href="'/users/'+user.id+'/edit'" class="btn btn-primary">Edit</a>
              </td>
              <td>
                <a
                  href="javascript:;"
                  class="btn btn-warning"
                  v-on:click="deleteUser(user.id,index)"
                >Delete</a>
              </td>
            </tr>
          </tbody>
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
    deleteUser(id, index) {
      axios.delete("api/users/" + id).then(response => {
        this.users.splice(index, 1);
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

