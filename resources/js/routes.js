import LoginComponent from "./components/LoginComponent.vue"
import IndexComponent from "./components/IndexComponent.vue"

import HomeComponent from "./components/HomeComponent.vue"


import SkirtsCategoryComponent from "./components/products/SkirtsCategoryComponent.vue"
import DressCategoryComponent from "./components/products/DressCategoryComponent.vue"
import CasualCategoryComponent from "./components/products/CasualCategoryComponent.vue"


import InsetProductComponent from "./components/products/InsetProductComponent.vue"
import UpdateProductComponent from "./components/products/UpdateProductComponent.vue"
import ResultSerchComponent from "./components/products/ResultSerchComponent.vue"




export const routes = [
  // { path: '/', component: MainComponent},

  // { path: '/HomeComponent', component: HomeComponent},
  { path: '/', component: LoginComponent
  ,meta: { Auth: true },
  beforeEnter: (to, from,next) => {
    // reject the navigation
    const token=localStorage.getItem('token')
    if (token) {
   return  next('/IndexComponent')
    }else{ return  next() }
  },
},
  { path: '/HomeComponent', component: HomeComponent},
  { path: '/ResultSerchComponent', component: ResultSerchComponent},



  { path: '/IndexComponent', component: IndexComponent
  ,meta: { Auth: true },
  beforeEnter: (to, from,next) => {
    // reject the navigation
    const token=localStorage.getItem('token')
    if (!token) {
      
   return  next('/')

    }else{ return  next() }
  },

},

  { path: '/SkirtsCategoryComponent', component: SkirtsCategoryComponent
  ,meta: { Auth: true },
  beforeEnter: (to, from,next) => {
    // reject the navigation
    const token=localStorage.getItem('token')
    if (!token) {
      
   return  next('/')

    }else{ return  next() }
  },

},
  { path: '/DressCategoryComponent', component: DressCategoryComponent
  ,meta: { Auth: true },
  beforeEnter: (to, from,next) => {
    // reject the navigation
    const token=localStorage.getItem('token')
    if (!token) {
      
   return  next('/')

    }else{ return  next() }
  },

},
  { path: '/CasualCategoryComponent', component: CasualCategoryComponent
  ,meta: { Auth: true },
  beforeEnter: (to, from,next) => {
    // reject the navigation
    const token=localStorage.getItem('token')
    if (!token) {
      
   return  next('/')

    }else{ return  next() }
  },

},

  { path: '/InsetProductComponent', component: InsetProductComponent
  ,meta: { Auth: true },
  beforeEnter: (to, from,next) => {
    // reject the navigation
    const token=localStorage.getItem('token')
    if (!token) {
      
   return  next('/')

    }else{ return  next() }
  },

},
  { path: '/UpdateProductComponent/:productId', component: UpdateProductComponent
  ,meta: { Auth: true },
  beforeEnter: (to, from,next) => {
    // reject the navigation
    const token=localStorage.getItem('token')
    if (!token) {
      
   return  next('/')

    }else{ return  next() }
  },

},


//   { path: '/:notfound(.*)', component: NotfoundComponent },
]


// GOOD
// routes.beforeEach((to, from, next) => {
//   const isAuthenticated=localStorage.getItem("token");
//   if (!isAuthenticated) next({ name: '/' })
//   else next()
// })