<template>
    <div class="card">
        <h5 class="card-header">Skirts Categoryd</h5>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead class="table-dark">
                    <tr>
                        <th>name</th>
                        <th>img1</th>
                        <th>xl</th>
                        <th>xxl</th>
                        <th>xxxl</th>
                        <th>category_id</th>
                        <th>created_at</th>
                        <th>updated_at</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    <tr v-for="product in products" :key="product.id">
                        <td>
                            <i class="fab fa-angular fa-lg text-danger me-3"></i
                            >{{ product.name }}
                        </td>
                        <td>
                            <img
                                :src="product.img1"
                                alt="Girl in a jacket"
                                width="100"
                                height="100"
                            />
                        </td>

                        <td>
                            <i class="fab fa-angular fa-lg text-danger me-3"></i
                            >{{ product.xl }}
                        </td>
                        <td>
                            <i class="fab fa-angular fa-lg text-danger me-3"></i
                            >{{ product.xxl }}
                        </td>
                        <td>
                            <i class="fab fa-angular fa-lg text-danger me-3"></i
                            >{{ product.xxxl }}
                        </td>
                        <td>
                            <i class="fab fa-angular fa-lg text-danger me-3"></i
                            >{{ product.category_id }}
                        </td>
                        <td>
                            <i class="fab fa-angular fa-lg text-danger me-3"></i
                            >{{ product.created_at }}
                        </td>
                        <td>
                            <i class="fab fa-angular fa-lg text-danger me-3"></i
                            >{{ product.updated_at }}
                        </td>

                        <td>
                            <div class="dropdown">
                                <router-link
                                    type="button"
                                    class="btn btn-primary"
                                    :to="{
                                        path: `/UpdateProductComponent/${product.id}`,
                                        params: { productId: product.id },
                                    }"
                                    >Edit</router-link
                                >
                                <button
                                    type="button"
                                    class="btn btn-danger"
                                    @click="Delete(product.id)"
                                >
                                    Delete
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            products: [],
        };
    },
    components: {},
    created() {
        axios
            .get("http://127.0.0.1:8000/api/SkirtsCategory")
            .then((response) => {
                console.log(response.data.data.SkirtsCategory);
                this.products = response.data.data.SkirtsCategory;
            })
            .catch((error) => console.log(error));
    },
    methods: {
        Delete(productId) {
            console.log(productId);

            Swal.fire({
                title: "Do you want to save the changes?",
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: "delete",
                denyButtonText: `Don't delete`,
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    Swal.fire("delete!", "", "success");

                    axios
                        .delete(
                            `http://127.0.0.1:8000/api/deleteProduct/${productId}`,
                            {
                                headers: {
                                    "Content-Type": "multipart/form-data",
                                    Authorization:
                                        localStorage.getItem("token"),
                                },
                            }
                        )
                        .then((response) => {
                            console.log(response.data.data);
                            console.log(response);
                            this.products = this.products.filter((object) => {
                                return object.id !== productId;
                            });
                            console.log(myproducts);
                        })
                        .catch((error) => console.log(error));
                } else if (result.isDenied) {
                    Swal.fire("Changes are not saved", "", "info");
                }
            });
        },
    },
};
</script>
