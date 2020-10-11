<template>
  <div class="container">
    <div class="row">
      <div class="col-md-8">
     
        <form v-on:submit.prevent="formSubmit" enctype="multipart/form-data">
          <strong>meeting Name:</strong>
          <input type="text" class="form-control" v-model="meeting_name" />
          
          <strong>meeting Description </strong>
          <input type="text" class="form-control" v-model="description" />

          <button type="submit" class="btn btn-success">Submit</button>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
export default {
    props:["meeting"],
    data() {
        return {
            meeting_id: "",
            meeting_name: "",
            description: "",
        };
    },
    created () {
        if (!this.meeting.empty) {
            this.meeting_id = this.meeting.meeting_id
            this.meeting_name = this.meeting.meeting_name
            this.description = this.meeting.description
        }
    },
    methods: {
        formSubmit(event) {
            
            let param = {
                meeting_name : this.meeting_name,
                description : this.description
            }
        
            axios
                .put("/meeting/"+this.meeting.meeting_id, param)
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