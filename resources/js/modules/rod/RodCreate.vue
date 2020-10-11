<template>
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <form v-on:submit.prevent="formSubmit" enctype="multipart/form-data">
          <strong>Name:</strong>
          <input type="text" class="form-control" v-model="name" />
          <strong>File:</strong>
          <input type="file" class="form-control" v-on:change="onFileChange" />
          <button class="btn btn-success">Submit</button>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
import _ from "lodash";
export default {
  props: [],
  components: {},
  created() {},
  data() {
    return {
      name: "",
      file: ""
    };
  },
  computed: {},
  methods: {
    onFileChange(e) {
      this.file = e.target.files[0];
    },
    formSubmit(event) {
      const data = new FormData();
      data.append("rod_file", this.file);
      data.append("name", this.name);

      axios
        .post("/rod", data)
        .then(response => {
          console.log("response", response);
        })
        .catch(function(error) {
          console.log("response", error);
        });
    }
  }
};
</script>
