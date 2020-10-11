<template>
  <div class="container">
    <div class="row">
      <div class="col-md-8">
     
        <form v-on:submit.prevent="formSubmit" enctype="multipart/form-data">
          <strong>Meeting Name:</strong>
          <input type="text" class="form-control" v-model="title" />
          
          <strong>Total Resolution:</strong>
          <input type="number" class="form-control" v-model="totalNo" />
          
          <div>
            <label>Counter</label>
            <multiselect class="select-custom" v-model="counter"  label="counter_name" placeholder="Select one" :options="counters" :searchable="true" :allow-empty="false">
              <!-- <template slot="singleLabel" slot-scope="{ option }"><strong>{{ option.name }}</strong> is written in<strong>  {{ option.language }}</strong></template> -->
            </multiselect>
          </div>
          <div>
            <label>Counter</label>
            <div class="form-group ">
											<label class="form-label">Beast</label>
											<select class="form-control select2 custom-select" data-placeholder="Choose one">
												<option label="Choose one">
												</option>
												<option value="1">Chuck Testa</option>
												<option value="2">Sage Cattabriga-Alosa</option>
												<option value="3">Nikola Tesla</option>
												<option value="4">Cattabriga-Alosa</option>
												<option value="5">Nikola Alosa</option>
											</select>
										</div>
          </div>

          <button type="button" @click="addField">
            New Field
          </button>
          <div class="border" v-for="(reso, key) in resoData" :key="key">
              <input type="number" class="form-control" v-model="reso.reso_no" placeholder="Enter Reson No">
              <input type="text" class="form-control" v-model="reso.reso_description" placeholder="Enter Reso Description">
                <span v-if="resoData.length > 1" class="ml-3 pointer" @click="deleteRow(key)">X</span>
              <span>{{key}}</span>
          </div>
         
          Total Resolution: {{totalQty}}<br>

          
          <button type="submit" class="btn btn-success">Submit</button>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
import Multiselect from 'vue-multiselect'
import _ from "lodash";
export default {
  props: ["counters"],
  components: { Multiselect },
  created() {},
  data() {
    return {
      title: "",
      totalNo: 0,
      counter:'',
      resoData: [{
        reso_no: "",
        reso_description: ""
        
      }],
   
      
    };
  },
   computed: {
    totalQty: function () {
      return this.totalNo = this.resoData.length;
    },
  },
  methods: {
    formSubmit(event) {
        
        let orderData = {
          title : this.title,
          total_no : this.totalNo,
          reso_data : this.resoData,
          counter_id : this.counter.counter_id
        }
        axios
            .post("/meeting", orderData)
            // .post("/meeting", data)
            .then(response => {
                console.log("response", response);
            })
            .catch(function(error) {
                console.log("response", error);
            });
    },
    addField: function () {
      this.resoData.push({ reso_no: '',reso_description: '' });
    },
    deleteRow(index) {
      this.resoData.splice(index,1)
    }




  },
};
</script>

<style scoped>
.border {
  border: 1px solid black;
  padding: 3px;
  margin-bottom: 5px;
}
.multiselect__tags{
  background: #343b4a;
  background-color: #343b4a
}

.select-custom {
    background: #343b4a;
    outline: none;
    color: #fff;
}

.multiselect__tags{
  background-color: #343b4a !important;
}
  .multiselect__tags {
        min-height: 32px;
        display: block;
        padding: 3px 40px 0 8px;
        border-radius: 5px;
        border: 1px solid #e8e8e8;
        background: #343b4a;
        font-size: 14px;
    }
</style>
