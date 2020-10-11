<template>
  <div class="container">
    <div class="row">
      <div class="col-md-8">
     
        <form v-on:submit.prevent="formSubmit" enctype="multipart/form-data">
          <strong>Counter Name:</strong>
          <input type="text" class="form-control" v-model="counter_name" />
          
          <strong>Counter Description </strong>
          <input type="text" class="form-control" v-model="description" />

          <button type="submit" class="btn btn-success">Submit</button>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      counter_name: "",
      description: "",
    };
  },
  methods: {
    formSubmit(event) {
        
        let param = {
          counter_name : this.counter_name,
          description : this.description
        }
       
        axios
            .post("/counter", param)
            .then(response => {
                console.log("response", response);
            })
            .catch(function(error) {
                console.log("response", error);
            });
    },
  },
};
</script>