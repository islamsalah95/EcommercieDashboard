<template>
    <form class="card mb-4" @submit.prevent="add">
        <h5 class="card-header">Add New product</h5>
        <div class="card-body">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label"
                    >name</label
                >
                <input
                    type="text"
                    class="form-control"
                    id="exampleFormControlInput1"
                    v-model.trim="name"
                />
                <div v-if="nameVald" class="alert alert-danger">
                    Name is required , must be string
                </div>
            </div>

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label"
                    >price</label
                >
                <input
                    type="text"
                    class="form-control"
                    id="exampleFormControlInput1"
                    v-model.number="price"
                />
                <div v-if="priceVald" class="alert alert-danger">
                    price is required , must be number
                </div>
            </div>

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label"
                    >xl</label
                >
                <input
                    type="text"
                    class="form-control"
                    id="exampleFormControlInput1"
                    v-model.number="xl"
                />
                <div v-if="xlVald" class="alert alert-danger">
                    size is required , must be number
                </div>
            </div>

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label"
                    >xxl</label
                >
                <input
                    type="text"
                    class="form-control"
                    id="exampleFormControlInput1"
                    v-model.number="xxl"
                />
                <div v-if="xxlVald" class="alert alert-danger">
                    size is required , must be number
                </div>
            </div>

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label"
                    >xxxl</label
                >
                <input
                    type="text"
                    class="form-control"
                    id="exampleFormControlInput1"
                    v-model.number="xxxl"
                />
                <div v-if="xxxlVald" class="alert alert-danger">
                    size is required , must be number
                </div>
            </div>

            <div class="mb-3">
                <label for="formFile" class="form-label">img1</label>
                <input
                    class="form-control"
                    type="file"
                    id="Images1"
                    @change="uploadFile1"
                    ref="file1"
                />
                <div v-if="Images1Vald" class="alert alert-danger">
                    img1 is required , must be picture only
                </div>
            </div>

            <div class="mb-3">
                <label for="formFile" class="form-label">img2</label>
                <input
                    class="form-control"
                    type="file"
                    id="Images2"
                    @change="uploadFile1"
                    ref="file2"
                />
                <div v-if="Images2Vald" class="alert alert-danger">
                    img1 is required , must be picture only
                </div>
            </div>

            <div class="mb-3">
                <label for="formFile" class="form-label">img3</label>
                <input
                    class="form-control"
                    type="file"
                    id="Images3"
                    @change="uploadFile1"
                    ref="file3"
                />
                <div v-if="Images3Vald" class="alert alert-danger">
                    img1 is required , must be picture only
                </div>
            </div>

            <div>
                <label for="exampleFormControlTextarea1" class="form-label"
                    >desc</label
                >
                <textarea
                    class="form-control"
                    id="exampleFormControlTextarea1"
                    rows="3"
                    v-model.trim="desc"
                ></textarea>
                <div v-if="descVald" class="alert alert-danger">
                    desc is required , must be string
                </div>
            </div>

            <div class="mb-3">
                <label for="exampleFormControlSelect1" class="form-label"
                    >Category</label
                >
                <select class="form-select" v-model="selected">
                    <option disabled value="">Please select one</option>
                    <option :value="1">Dress</option>
                    <option :value="2">Skirts</option>
                    <option :value="3">Casual</option>
                </select>
                <div v-if="selectedVald" class="alert alert-danger">
                    must choese one of selected category
                </div>
                <span>Selected: {{ selected }}</span>
            </div>

            <!-- <div>
                <b-form-file
                  v-model="file1"
                  :state="Boolean(file1)"
                  placeholder="Choose a file or drop it here..."
                  drop-placeholder="Drop file here..."
                ></b-form-file>
                <div class="mt-3">Selected file: {{ file1 ? file1.name : '' }}</div>
                <b-form-file v-model="file2" class="mt-3" plain></b-form-file>
                <div class="mt-3">Selected file: {{ file2 ? file2.name : '' }}</div>
              </div> -->

            <div class="d-grid gap-2 col-lg-6 mx-auto">
                <button
                    class="btn btn-primary btn-lg"
                    @click="add"
                    type="button"
                >
                    Add
                </button>
            </div>
        </div>
    </form>
</template>
<script>
import Noty from "noty";

export default {
    data() {
        return {
            name: "",
            price: "",
            xl: "",
            xxl: "",
            xxxl: "",
            Images1: "",
            Images2: "",
            Images3: "",
            desc: "",
            selected: "",

            nameVald: false,
            priceVald: false,
            xlVald: false,
            xxlVald: false,
            xxxlVald: false,
            Images1Vald: false,
            Images2Vald: false,
            Images3Vald: false,
            descVald: false,
            selectedVald: false,
        };
    },
    methods: {
        uploadFile1() {
            this.Images1 = this.$refs.file1.files[0];
            this.Images2 = this.$refs.file2.files[0];
            this.Images3 = this.$refs.file3.files[0];
        },

        add() {
            const headers = { Authorization: localStorage.getItem("token") };

            this.priceVald = false;
            this.xlVald = false;
            this.xxlVald = false;
            this.xxxlVald = false;
            this.Images1Vald = false;
            this.Images2Vald = false;
            this.Images3Vald = false;
            this.descVald = false;
            this.selectedVald = false;
            this.nameVald = false;

            if (this.name == "" || typeof this.name !== "string") {
                this.nameVald = true;
            } else if (this.price == "" || typeof this.price !== "number") {
                this.priceVald = true;
            } else if (this.xl == "" || typeof this.price !== "number") {
                this.xlVald = true;
            } else if (this.xxl == "" || typeof this.price !== "number") {
                this.xxlVald = true;
            } else if (this.xxxl == "" || typeof this.price !== "number") {
                this.xxxlVald = true;
            } else if (this.Images1 == "") {
                this.Images1Vald = true;
            } else if (this.Images2 == "") {
                this.Images2Vald = true;
            } else if (this.Images3 == "") {
                this.Images3Vald = true;
            } else if (this.desc == "" || typeof this.desc !== "string") {
                this.descVald = true;
            } else if (this.selected == "") {
                this.selectedVald = true;
            } else {
                const formData = new FormData();
                formData.append("name", this.name);
                formData.append("price", this.price);
                formData.append("xl", this.xl);
                formData.append("xxl", this.xxl);
                formData.append("xxxl", this.xxxl);
                formData.append("img1", this.Images1);
                formData.append("img2", this.Images2);
                formData.append("img3", this.Images3);
                formData.append("desc", this.desc);
                formData.append("category_id", this.selected);
                console.log(formData);

                axios
                    .post(
                        "http://127.0.0.1:8000/api/insertNewProduct",
                        formData,
                        { headers }
                    )
                    .then((res) => {
                        res.data.files; // binary representation of the file
                        res.status; // HTTP status
                        console.log(res.data.data);
                        Notification.success();
                    });
            }
        },
    },
};
</script>
