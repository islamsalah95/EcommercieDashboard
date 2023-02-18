<template>

    <form class="card mb-4" @submit.prevent="update">
      <h5 class="card-header">Update product</h5>
      <div class="card-body">

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">name</label>
            <input type="text" class="form-control" id="exampleFormControlInput1"   v-model.trim="name" >
            <div v-if="nameVald" class="alert alert-danger" >Name is required , must be string </div> 

          </div>

          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">price</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" v-model.number="price">
            <div v-if="priceVald" class="alert alert-danger" >price is required , must be number </div> 
          </div>

          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">xl</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" v-model.number="xl">
            <div v-if="xlVald" class="alert alert-danger" >size is required , must be number </div> 

          </div>

          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">xxl</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" v-model.number="xxl">
            <div v-if="xxlVald" class="alert alert-danger" >size is required , must be number </div> 

          </div>

          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">xxxl</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" v-model.number="xxxl">
            <div v-if="xxxlVald" class="alert alert-danger" >size is required , must be number </div> 

          </div>


          <div class="mb-3">
            <img :src="Images1" alt="Girl in a jacket" width="100" height="100">
          </div>
          <div class="mb-3">
            <label for="formFile" class="form-label">img1</label>
            <input class="form-control" type="file" id="Images1" @change="uploadFile1" ref="file1">
            <div v-if="Images1Vald" class="alert alert-danger" >img1 is required , must be picture only</div> 

          </div>



          <div class="mb-3">
            <img :src="Images2" alt="Girl in a jacket" width="100" height="100">
          </div>
          <div class="mb-3">
            <label for="formFile" class="form-label">img2</label>
            <input class="form-control" type="file" id="Images2" @change="uploadFile1" ref="file2">
            <div  v-if="Images2Vald" class="alert alert-danger" >img1 is required , must be picture only</div> 

          </div>



          <div class="mb-3">
            <img :src="Images3" alt="Girl in a jacket" width="100" height="100">
          </div>
          <div class="mb-3">
            <label for="formFile" class="form-label">img3</label>
            <input class="form-control" type="file" id="Images3" @change="uploadFile1" ref="file3">
            <div v-if="Images3Vald"  class="alert alert-danger" >img1 is required , must be picture only</div> 

          </div>



          <div>
            <label for="exampleFormControlTextarea1" class="form-label">desc</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" v-model.trim="desc"></textarea>
            <div v-if="descVald" class="alert alert-danger" >desc is required , must be string </div> 

          </div>



        <div class="mb-3">
          <label for="exampleFormControlSelect1" class="form-label">Category</label>
          <select class="form-select" v-model="selected">
            <option disabled value="">Please select one</option>
            <option :value="1">Dress</option>
            <option :value="2">Skirts</option>
            <option :value="3">Casual</option>
          </select>
          <div v-if="selectedVald" class="alert alert-danger" >must choese one of selected category </div> 
          <span>Selected: {{ selected }}</span>
        </div>


        <div class="d-grid gap-2 col-lg-6 mx-auto">
            <button class="btn btn-primary btn-lg" @click="update" type="button">update</button>
          </div>       
     
     
        </div>
    </form>

</template>
<script>

export default {

data() {

return {
name:'' ,
price:'',
xl:'',
xxl:'',
xxxl:'',
Images1:'',
Images2:'',
Images3:'',
desc:'',
selected: '', 
nameVald:false ,
priceVald:false,
xlVald:false,
xxlVald:false,
xxxlVald:false,
Images1Vald:false,
Images2Vald:false,
Images3Vald:false,
descVald:false,
selectedVald:false, 
}

}
,created(){
  
    axios.get(`http://127.0.0.1:8000/api/oneProductDetails/${this.$route.params.productId}`).then((res) => {
      console.log(res.data.data.oneProductDetails)
        this.name=res.data.data.oneProductDetails.name
        this.price=res.data.data.oneProductDetails.price
        this.xl=res.data.data.oneProductDetails.xl
        this.xxl=res.data.data.oneProductDetails.xxl
        this.xxxl=res.data.data.oneProductDetails.xxxl
        this.Images1=res.data.data.oneProductDetails.img1
        this.Images2=res.data.data.oneProductDetails.img2
        this.Images3=res.data.data.oneProductDetails.img3
        this.desc=res.data.data.oneProductDetails.desc
        this.selected= res.data.data.oneProductDetails.category_id
        // console.log(this.$route.params.productId)

    });
},
methods: {
  uploadFile1() {
    this.Images1 = this.$refs.file1.files[0];
    this.Images2 = this.$refs.file2.files[0];
    this.Images3 = this.$refs.file3.files[0];
  },
  
  update() {

    const headers = {'Authorization': localStorage.getItem("token") };
    
         this.priceVald=false
         this.xlVald=false
         this.xxlVald=false
         this.xxxlVald=false
         this.Images1Vald=false
         this.Images2Vald=false
         this.Images3Vald=false
         this.descVald=false
         this.selectedVald=false 
         this.nameVald=false

        //  console.log(typeof this.price)
        //  console.log(typeof this.desc)


         if(this.name == '' || typeof this.name !=='string'){
         this.nameVald=true;
        }
        // else if(!this.name.match("^[A-Za-z][A-Za-z0-9_]{7,29}$")){
        //     this.nameVald=true; 
        // }
        else if(this.price == '' || typeof this.price !=='number'){
          this.priceVald=true;
        }
        else if(this.xl == '' || typeof this.price !=='number'){
         this.xlVald=true;
        }
        else if(this.xxl == '' || typeof this.price !=='number'){
         this.xxlVald=true;
        }
        else if(this.xxxl == '' || typeof this.price !=='number'){
         this.xxxlVald=true;
        }
        else if(this.desc == ''){
         this.descVald=true;
        }
        else if(typeof this.desc !=='string' || typeof this.desc ==''){
         this.descVald=true;
        }
        else if(this.selected == ''){
         this.selectedVald=true;
        }else{
    const formData = new FormData();
    formData.append('name', this.name);
    formData.append('price', this.price);
    formData.append('xl', this.xl);
    formData.append('xxl', this.xxl);
    formData.append('xxxl', this.xxxl);
    formData.append('img1', this.Images1);
    formData.append('img2', this.Images2);
    formData.append('img3', this.Images3);
    formData.append('desc', this.desc);
    formData.append('category_id',this.selected);
    console.log(formData)

    axios.post(`http://127.0.0.1:8000/api/updateNewProduct/${this.$route.params.productId}`, formData, { headers }).then((res) => {
          res.data.files; // binary representation of the file
          res.status; // HTTP status
          console.log(res.data.data)
          Notification.success();

        });
  }
  }
}


}

</script>